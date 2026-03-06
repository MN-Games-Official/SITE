/* ==========================================================================
   Astroyds — Analytics Wrapper
   Consent-gated analytics: only activates after cookie consent is given.
   Tracks page views, scroll depth, CTA clicks, and Core Web Vitals.
   ========================================================================== */

(function () {
  "use strict";

  /* -----------------------------------------------------------------------
     Configuration
     ----------------------------------------------------------------------- */
  var CONSENT_KEY = "astroyds-cookie-consent";
  var ANALYTICS_ENDPOINT = "/api/analytics"; // Replace with real endpoint
  var DEBUG = false;

  /* -----------------------------------------------------------------------
     State
     ----------------------------------------------------------------------- */
  var initialised = false;
  var sessionId = generateSessionId();
  var eventQueue = [];

  /* -----------------------------------------------------------------------
     Helpers
     ----------------------------------------------------------------------- */

  function log() {
    if (DEBUG && window.console) {
      console.log.apply(console, ["[Astroyds Analytics]"].concat(Array.from(arguments)));
    }
  }

  function generateSessionId() {
    return (
      Date.now().toString(36) +
      "-" +
      Math.random().toString(36).substring(2, 9)
    );
  }

  function hasConsent() {
    try {
      return localStorage.getItem(CONSENT_KEY) === "accepted";
    } catch (_) {
      return false;
    }
  }

  /** Safe JSON POST — fire and forget. */
  function sendBeacon(payload) {
    var data = JSON.stringify(payload);

    if (navigator.sendBeacon) {
      navigator.sendBeacon(ANALYTICS_ENDPOINT, data);
      return;
    }

    // Fallback: XHR keepalive
    try {
      var xhr = new XMLHttpRequest();
      xhr.open("POST", ANALYTICS_ENDPOINT, true);
      xhr.setRequestHeader("Content-Type", "application/json");
      xhr.send(data);
    } catch (_) {
      // Silently fail — analytics should never break the page
    }
  }

  function buildEvent(name, data) {
    return {
      event: name,
      sessionId: sessionId,
      url: window.location.href,
      referrer: document.referrer || "",
      timestamp: new Date().toISOString(),
      userAgent: navigator.userAgent,
      screenWidth: window.innerWidth,
      screenHeight: window.innerHeight,
      data: data || {},
    };
  }

  /* -----------------------------------------------------------------------
     Public API — track custom events
     ----------------------------------------------------------------------- */
  function trackEvent(name, data) {
    if (!initialised) {
      eventQueue.push({ name: name, data: data });
      return;
    }
    var payload = buildEvent(name, data);
    log("Event:", name, data);
    sendBeacon(payload);
  }

  /* -----------------------------------------------------------------------
     Page View Tracking
     ----------------------------------------------------------------------- */
  function trackPageView() {
    trackEvent("page_view", {
      path: window.location.pathname,
      title: document.title,
      hash: window.location.hash,
      search: window.location.search,
    });
  }

  /* -----------------------------------------------------------------------
     Scroll Depth Tracking
     ----------------------------------------------------------------------- */
  function initScrollDepthTracking() {
    document.addEventListener("astroyds:scroll-depth", function (e) {
      trackEvent("scroll_depth", { depth: e.detail.depth });
    });
  }

  /* -----------------------------------------------------------------------
     CTA Click Tracking
     ----------------------------------------------------------------------- */
  function initCtaTracking() {
    document.addEventListener("astroyds:cta-click", function (e) {
      trackEvent("cta_click", {
        label: e.detail.label,
        href: e.detail.href,
      });
    });
  }

  /* -----------------------------------------------------------------------
     Outbound Link Tracking
     ----------------------------------------------------------------------- */
  function initOutboundLinkTracking() {
    document.addEventListener("click", function (e) {
      var link = e.target.closest("a[href]");
      if (!link) return;

      try {
        var url = new URL(link.href);
        if (url.origin !== window.location.origin) {
          trackEvent("outbound_link", {
            href: link.href,
            text: link.textContent.trim().substring(0, 100),
          });
        }
      } catch (_) {
        // Invalid URL — ignore
      }
    });
  }

  /* -----------------------------------------------------------------------
     Core Web Vitals: LCP, FID, CLS
     Uses the Performance Observer API where available.
     ----------------------------------------------------------------------- */
  function initWebVitals() {
    if (!("PerformanceObserver" in window)) return;

    // Largest Contentful Paint (LCP)
    try {
      var lcpObserver = new PerformanceObserver(function (list) {
        var entries = list.getEntries();
        if (entries.length > 0) {
          var last = entries[entries.length - 1];
          trackEvent("web_vital", {
            metric: "LCP",
            value: Math.round(last.startTime),
            unit: "ms",
          });
        }
      });
      lcpObserver.observe({ type: "largest-contentful-paint", buffered: true });
    } catch (_) {}

    // First Input Delay (FID)
    try {
      var fidObserver = new PerformanceObserver(function (list) {
        var entries = list.getEntries();
        if (entries.length > 0) {
          var first = entries[0];
          trackEvent("web_vital", {
            metric: "FID",
            value: Math.round(first.processingStart - first.startTime),
            unit: "ms",
          });
          fidObserver.disconnect();
        }
      });
      fidObserver.observe({ type: "first-input", buffered: true });
    } catch (_) {}

    // Cumulative Layout Shift (CLS)
    try {
      var clsValue = 0;
      var clsObserver = new PerformanceObserver(function (list) {
        list.getEntries().forEach(function (entry) {
          if (!entry.hadRecentInput) {
            clsValue += entry.value;
          }
        });
      });
      clsObserver.observe({ type: "layout-shift", buffered: true });

      // Report CLS on page hide
      document.addEventListener("visibilitychange", function () {
        if (document.visibilityState === "hidden") {
          trackEvent("web_vital", {
            metric: "CLS",
            value: parseFloat(clsValue.toFixed(4)),
            unit: "score",
          });
          clsObserver.disconnect();
        }
      });
    } catch (_) {}

    // Time to First Byte (TTFB) — bonus metric
    try {
      var navEntries = performance.getEntriesByType("navigation");
      if (navEntries.length > 0) {
        var navEntry = navEntries[0];
        trackEvent("web_vital", {
          metric: "TTFB",
          value: Math.round(navEntry.responseStart - navEntry.requestStart),
          unit: "ms",
        });
      }
    } catch (_) {}
  }

  /* -----------------------------------------------------------------------
     Page duration tracking
     ----------------------------------------------------------------------- */
  function initDurationTracking() {
    var startTime = Date.now();

    function reportDuration() {
      var duration = Math.round((Date.now() - startTime) / 1000);
      trackEvent("page_duration", { seconds: duration });
    }

    document.addEventListener("visibilitychange", function () {
      if (document.visibilityState === "hidden") {
        reportDuration();
      }
    });

    window.addEventListener("beforeunload", reportDuration);
  }

  /* -----------------------------------------------------------------------
     Flush queued events
     ----------------------------------------------------------------------- */
  function flushQueue() {
    while (eventQueue.length > 0) {
      var item = eventQueue.shift();
      trackEvent(item.name, item.data);
    }
  }

  /* -----------------------------------------------------------------------
     Initialisation — only when consent is granted
     ----------------------------------------------------------------------- */
  function initAnalytics() {
    if (initialised) return;
    initialised = true;

    log("Initialised with session", sessionId);

    trackPageView();
    initScrollDepthTracking();
    initCtaTracking();
    initOutboundLinkTracking();
    initWebVitals();
    initDurationTracking();
    flushQueue();
  }

  /* -----------------------------------------------------------------------
     Bootstrap
     ----------------------------------------------------------------------- */
  function bootstrap() {
    // If consent already given, start immediately
    if (hasConsent()) {
      initAnalytics();
      return;
    }

    // Otherwise wait for the consent event from main.js cookie consent manager
    document.addEventListener("astroyds:consent-granted", function () {
      initAnalytics();
    });
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", bootstrap);
  } else {
    bootstrap();
  }

  /* -----------------------------------------------------------------------
     Expose limited public API
     ----------------------------------------------------------------------- */
  window.AstroydsAnalytics = {
    trackEvent: trackEvent,
    trackPageView: trackPageView,
  };
})();
