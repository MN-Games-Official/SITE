/* ==========================================================================
   Astroyds — Microsoft Clarity Integration
   Consent-gated: only injects the Clarity tracking script when:
     1. A Clarity project ID is provided (via data attribute or config), AND
     2. The user has accepted cookies.
   ========================================================================== */

(function () {
  "use strict";

  /* -----------------------------------------------------------------------
     Configuration
     ----------------------------------------------------------------------- */
  var CONSENT_KEY = "astroyds-cookie-consent";

  /** Resolve the Clarity project ID from multiple sources (in priority order). */
  function getClarityId() {
    // 1. Global config object
    if (
      typeof window.AstroydsConfig === "object" &&
      window.AstroydsConfig !== null &&
      window.AstroydsConfig.clarityId
    ) {
      return window.AstroydsConfig.clarityId;
    }

    // 2. data-clarity-id on the script tag itself
    var scriptTag = document.querySelector("script[data-clarity-id]");
    if (scriptTag) {
      return scriptTag.getAttribute("data-clarity-id");
    }

    // 3. Meta tag
    var meta = document.querySelector('meta[name="clarity-id"]');
    if (meta) {
      return meta.getAttribute("content");
    }

    return null;
  }

  /* -----------------------------------------------------------------------
     Consent check
     ----------------------------------------------------------------------- */
  function hasConsent() {
    try {
      return localStorage.getItem(CONSENT_KEY) === "accepted";
    } catch (_) {
      return false;
    }
  }

  /* -----------------------------------------------------------------------
     Inject the Clarity script
     ----------------------------------------------------------------------- */
  var injected = false;

  function injectClarity(clarityId) {
    if (injected) return;
    if (!clarityId || typeof clarityId !== "string" || !clarityId.trim()) return;
    injected = true;

    // Microsoft Clarity bootstrap snippet (official)
    (function (c, l, a, r, i, t, y) {
      c[a] =
        c[a] ||
        function () {
          (c[a].q = c[a].q || []).push(arguments);
        };
      t = l.createElement(r);
      t.async = 1;
      t.src = "https://www.clarity.ms/tag/" + i;
      y = l.getElementsByTagName(r)[0];
      y.parentNode.insertBefore(t, y);
    })(window, document, "clarity", "script", clarityId);

    logDebug("Clarity injected with ID: " + clarityId);
  }

  /* -----------------------------------------------------------------------
     Debug logging
     ----------------------------------------------------------------------- */
  function logDebug(msg) {
    if (
      typeof window.AstroydsConfig === "object" &&
      window.AstroydsConfig !== null &&
      window.AstroydsConfig.debug
    ) {
      if (window.console) {
        console.log("[Astroyds Clarity] " + msg);
      }
    }
  }

  /* -----------------------------------------------------------------------
     Initialisation
     ----------------------------------------------------------------------- */
  function init() {
    var clarityId = getClarityId();

    if (!clarityId) {
      logDebug("No Clarity ID found — skipping injection.");
      return;
    }

    if (hasConsent()) {
      injectClarity(clarityId);
      return;
    }

    logDebug("Waiting for cookie consent before injecting Clarity.");

    // Listen for consent event dispatched by main.js cookie consent manager
    document.addEventListener("astroyds:consent-granted", function () {
      injectClarity(clarityId);
    });
  }

  /* -----------------------------------------------------------------------
     Bootstrap
     ----------------------------------------------------------------------- */
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }

  /* -----------------------------------------------------------------------
     Public API
     ----------------------------------------------------------------------- */
  window.AstroydsClarity = {
    /** Manually trigger Clarity injection (e.g. after late consent). */
    inject: function () {
      var id = getClarityId();
      if (id) injectClarity(id);
    },

    /** Check if Clarity has been injected. */
    isInjected: function () {
      return injected;
    },
  };
})();
