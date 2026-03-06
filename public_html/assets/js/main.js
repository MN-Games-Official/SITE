/* ==========================================================================
   Astroyds — Main JavaScript
   Vanilla JS — no external dependencies.
   ========================================================================== */

(function () {
  "use strict";

  /* ========================================================================
     0. UTILITIES
     ======================================================================== */

  /**
   * Debounce — delays execution until after `wait` ms of silence.
   * @param {Function} fn
   * @param {number} wait
   * @returns {Function}
   */
  function debounce(fn, wait) {
    var timer;
    return function () {
      var context = this;
      var args = arguments;
      clearTimeout(timer);
      timer = setTimeout(function () {
        fn.apply(context, args);
      }, wait);
    };
  }

  /**
   * Throttle — invokes fn at most once per `limit` ms.
   * @param {Function} fn
   * @param {number} limit
   * @returns {Function}
   */
  function throttle(fn, limit) {
    var lastCall = 0;
    return function () {
      var now = Date.now();
      if (now - lastCall >= limit) {
        lastCall = now;
        fn.apply(this, arguments);
      }
    };
  }

  /**
   * Query helper — short alias for querySelector / querySelectorAll.
   */
  function $(selector, parent) {
    return (parent || document).querySelector(selector);
  }

  function $$(selector, parent) {
    return Array.from((parent || document).querySelectorAll(selector));
  }

  /** Detect prefers-reduced-motion */
  var prefersReducedMotion =
    window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  /* ========================================================================
     1. DOM-CONTENT-LOADED INITIALISATION
     ======================================================================== */
  document.addEventListener("DOMContentLoaded", function () {
    initThemeToggle();
    initMobileNav();
    initSmoothScroll();
    initScrollAnimations();
    initNavbarScroll();
    initBackToTop();
    initLazyImages();
    initFormValidation();
    initTypewriter();
    initCounterAnimation();
    initParallax();
    initDynamicFooterYear();
    initPageTransitions();
    initKeyboardHelpers();
    initCookieConsent();
    initToastSystem();
    removePageLoader();
  });

  /* ========================================================================
     2. DARK MODE TOGGLE
     ======================================================================== */
  function initThemeToggle() {
    var toggle = $(".theme-toggle");
    if (!toggle) return;

    // Restore saved preference
    var saved = localStorage.getItem("astroyds-theme");
    if (saved) {
      document.documentElement.setAttribute("data-theme", saved);
    }

    toggle.addEventListener("click", function () {
      var current = document.documentElement.getAttribute("data-theme");
      var next = current === "light" ? "dark" : "light";
      document.documentElement.setAttribute("data-theme", next);
      localStorage.setItem("astroyds-theme", next);

      // Announce to screen readers
      var label = next === "light" ? "Light mode enabled" : "Dark mode enabled";
      announceToScreenReader(label);
    });
  }

  /** Push a transient announcement into an aria-live region. */
  function announceToScreenReader(message) {
    var region = $("#aria-live-region");
    if (!region) {
      region = document.createElement("div");
      region.id = "aria-live-region";
      region.setAttribute("aria-live", "polite");
      region.setAttribute("aria-atomic", "true");
      region.className = "sr-only";
      document.body.appendChild(region);
    }
    region.textContent = message;
    setTimeout(function () {
      region.textContent = "";
    }, 3000);
  }

  /* ========================================================================
     3. MOBILE NAVIGATION
     ======================================================================== */
  function initMobileNav() {
    var toggleBtn = $(".nav-mobile-toggle");
    var menu = $(".nav-mobile-menu");
    if (!toggleBtn || !menu) return;

    toggleBtn.addEventListener("click", function () {
      var expanded = toggleBtn.getAttribute("aria-expanded") === "true";
      toggleBtn.setAttribute("aria-expanded", String(!expanded));
      menu.setAttribute("aria-hidden", String(expanded));
      document.body.classList.toggle("nav-open", !expanded);

      // Focus trap
      if (!expanded) {
        trapFocusIn(menu, function onClose() {
          toggleBtn.setAttribute("aria-expanded", "false");
          menu.setAttribute("aria-hidden", "true");
          document.body.classList.remove("nav-open");
          toggleBtn.focus();
        });
      }
    });

    // Close on link click
    $$("a", menu).forEach(function (link) {
      link.addEventListener("click", function () {
        toggleBtn.setAttribute("aria-expanded", "false");
        menu.setAttribute("aria-hidden", "true");
        document.body.classList.remove("nav-open");
      });
    });
  }

  /* ========================================================================
     4. SMOOTH SCROLL
     ======================================================================== */
  function initSmoothScroll() {
    $$('a[href^="#"]').forEach(function (anchor) {
      anchor.addEventListener("click", function (e) {
        var targetId = this.getAttribute("href");
        if (targetId === "#" || targetId === "") return;

        var target = $(targetId);
        if (!target) return;

        e.preventDefault();

        var navHeight = parseInt(
          getComputedStyle(document.documentElement)
            .getPropertyValue("--nav-height")
            .trim(),
          10
        ) || 72;

        var top = target.getBoundingClientRect().top + window.pageYOffset - navHeight;

        if (prefersReducedMotion) {
          window.scrollTo(0, top);
        } else {
          window.scrollTo({ top: top, behavior: "smooth" });
        }

        // Update URL without scroll jump
        history.pushState(null, "", targetId);

        // Move focus for accessibility
        target.setAttribute("tabindex", "-1");
        target.focus({ preventScroll: true });
      });
    });
  }

  /* ========================================================================
     5. SCROLL-TRIGGERED ANIMATIONS (IntersectionObserver)
     ======================================================================== */
  function initScrollAnimations() {
    if (prefersReducedMotion) {
      // Instantly show all animated elements
      $$(".animate-on-scroll, .fade-in, .fade-in-up, .fade-in-down, .fade-in-left, .fade-in-right, .scale-in, .scale-in-up, .rotate-in, .blur-in").forEach(
        function (el) {
          el.classList.add("animated");
        }
      );
      return;
    }

    if (!("IntersectionObserver" in window)) {
      // Fallback: show everything
      $$(".animate-on-scroll, .fade-in, .fade-in-up, .fade-in-down, .fade-in-left, .fade-in-right, .scale-in, .scale-in-up, .rotate-in, .blur-in").forEach(
        function (el) {
          el.classList.add("animated");
        }
      );
      return;
    }

    var observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add("animated");
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.15, rootMargin: "0px 0px -40px 0px" }
    );

    $$(".animate-on-scroll, .fade-in, .fade-in-up, .fade-in-down, .fade-in-left, .fade-in-right, .scale-in, .scale-in-up, .rotate-in, .blur-in").forEach(
      function (el) {
        observer.observe(el);
      }
    );
  }

  /* ========================================================================
     6. NAVBAR SCROLL BEHAVIOUR (shrink on scroll)
     ======================================================================== */
  function initNavbarScroll() {
    var nav = $(".site-nav");
    if (!nav) return;

    var onScroll = throttle(function () {
      if (window.scrollY > 60) {
        nav.classList.add("scrolled");
      } else {
        nav.classList.remove("scrolled");
      }
    }, 100);

    window.addEventListener("scroll", onScroll, { passive: true });
    onScroll(); // initial check
  }

  /* ========================================================================
     7. BACK-TO-TOP BUTTON
     ======================================================================== */
  function initBackToTop() {
    var btn = $(".back-to-top");
    if (!btn) return;

    var onScroll = throttle(function () {
      if (window.scrollY > 600) {
        btn.classList.add("visible");
      } else {
        btn.classList.remove("visible");
      }
    }, 200);

    window.addEventListener("scroll", onScroll, { passive: true });

    btn.addEventListener("click", function () {
      if (prefersReducedMotion) {
        window.scrollTo(0, 0);
      } else {
        window.scrollTo({ top: 0, behavior: "smooth" });
      }
    });
  }

  /* ========================================================================
     8. LAZY LOADING IMAGES
     ======================================================================== */
  function initLazyImages() {
    // Use native lazy loading where supported; polyfill with IO otherwise.
    if ("loading" in HTMLImageElement.prototype) {
      $$("img[data-src]").forEach(function (img) {
        img.src = img.dataset.src;
        if (img.dataset.srcset) img.srcset = img.dataset.srcset;
        img.removeAttribute("data-src");
        img.removeAttribute("data-srcset");
      });
      return;
    }

    if (!("IntersectionObserver" in window)) {
      // Fallback
      $$("img[data-src]").forEach(function (img) {
        img.src = img.dataset.src;
        if (img.dataset.srcset) img.srcset = img.dataset.srcset;
      });
      return;
    }

    var observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            var img = entry.target;
            img.src = img.dataset.src;
            if (img.dataset.srcset) img.srcset = img.dataset.srcset;
            img.removeAttribute("data-src");
            img.removeAttribute("data-srcset");
            img.classList.add("loaded");
            observer.unobserve(img);
          }
        });
      },
      { rootMargin: "200px" }
    );

    $$("img[data-src]").forEach(function (img) {
      observer.observe(img);
    });
  }

  /* ========================================================================
     9. FORM VALIDATION (Progressive Enhancement)
     ======================================================================== */
  function initFormValidation() {
    $$("form[data-validate]").forEach(function (form) {
      // Disable native validation in favour of custom UI
      form.setAttribute("novalidate", "");

      var inputs = $$("input, textarea, select", form);

      // Live validation on blur
      inputs.forEach(function (input) {
        input.addEventListener("blur", function () {
          validateField(input);
        });

        input.addEventListener("input", function () {
          // Clear error on type if previously invalid
          var group = input.closest(".form-group");
          if (group && group.classList.contains("error")) {
            validateField(input);
          }
        });
      });

      // Submit handler
      form.addEventListener("submit", function (e) {
        var valid = true;

        inputs.forEach(function (input) {
          if (!validateField(input)) valid = false;
        });

        if (!valid) {
          e.preventDefault();
          // Focus first invalid field
          var firstError = $(".form-group.error input, .form-group.error textarea, .form-group.error select", form);
          if (firstError) firstError.focus();
        }
      });
    });
  }

  /**
   * Validate a single field and update its parent .form-group.
   * @param {HTMLElement} input
   * @returns {boolean}
   */
  function validateField(input) {
    var group = input.closest(".form-group");
    if (!group) return true;

    var errorEl = $(".form-error", group);
    var isValid = input.checkValidity();

    group.classList.remove("error", "success");

    if (!isValid) {
      group.classList.add("error");
      if (errorEl) {
        errorEl.textContent = getValidationMessage(input);
        errorEl.removeAttribute("hidden");
      }
      return false;
    }

    // Only add success if field has a value
    if (input.value.trim()) {
      group.classList.add("success");
    }
    if (errorEl) {
      errorEl.textContent = "";
      errorEl.setAttribute("hidden", "");
    }
    return true;
  }

  function getValidationMessage(input) {
    if (input.validity.valueMissing) {
      return input.dataset.errorRequired || "This field is required.";
    }
    if (input.validity.typeMismatch) {
      return input.dataset.errorType || "Please enter a valid " + input.type + ".";
    }
    if (input.validity.tooShort) {
      return input.dataset.errorMinlength || "Minimum " + input.minLength + " characters.";
    }
    if (input.validity.tooLong) {
      return input.dataset.errorMaxlength || "Maximum " + input.maxLength + " characters.";
    }
    if (input.validity.patternMismatch) {
      return input.dataset.errorPattern || "Please match the required format.";
    }
    return input.validationMessage || "Invalid value.";
  }

  /* ========================================================================
     10. TYPEWRITER EFFECT
     ======================================================================== */
  function initTypewriter() {
    var el = $("[data-typewriter]");
    if (!el || prefersReducedMotion) return;

    var phrases = (el.dataset.typewriter || "").split("|").filter(Boolean);
    if (phrases.length === 0) return;

    var cursor = document.createElement("span");
    cursor.className = "typewriter-cursor";
    cursor.setAttribute("aria-hidden", "true");
    el.parentNode.insertBefore(cursor, el.nextSibling);

    var phraseIndex = 0;
    var charIndex = 0;
    var isDeleting = false;
    var typeSpeed = 80;
    var deleteSpeed = 40;
    var pauseEnd = 2000;
    var pauseStart = 500;

    function tick() {
      var current = phrases[phraseIndex];

      if (isDeleting) {
        el.textContent = current.substring(0, charIndex - 1);
        charIndex--;
      } else {
        el.textContent = current.substring(0, charIndex + 1);
        charIndex++;
      }

      var delay = isDeleting ? deleteSpeed : typeSpeed;

      if (!isDeleting && charIndex === current.length) {
        delay = pauseEnd;
        isDeleting = true;
      } else if (isDeleting && charIndex === 0) {
        isDeleting = false;
        phraseIndex = (phraseIndex + 1) % phrases.length;
        delay = pauseStart;
      }

      setTimeout(tick, delay);
    }

    // Start after a short delay
    setTimeout(tick, 800);
  }

  /* ========================================================================
     11. COUNTER ANIMATION (Stats)
     ======================================================================== */
  function initCounterAnimation() {
    var counters = $$("[data-counter]");
    if (counters.length === 0) return;

    if (prefersReducedMotion || !("IntersectionObserver" in window)) {
      counters.forEach(function (el) {
        el.textContent = el.dataset.counter;
      });
      return;
    }

    var observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            animateCounter(entry.target);
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.5 }
    );

    counters.forEach(function (el) {
      observer.observe(el);
    });
  }

  function animateCounter(el) {
    var target = parseFloat(el.dataset.counter);
    var duration = parseInt(el.dataset.counterDuration, 10) || 2000;
    var suffix = el.dataset.counterSuffix || "";
    var prefix = el.dataset.counterPrefix || "";
    var decimals = (el.dataset.counterDecimals !== undefined) ? parseInt(el.dataset.counterDecimals, 10) : 0;
    var start = 0;
    var startTime = null;

    function step(timestamp) {
      if (!startTime) startTime = timestamp;
      var progress = Math.min((timestamp - startTime) / duration, 1);

      // Ease out cubic
      var eased = 1 - Math.pow(1 - progress, 3);
      var current = start + (target - start) * eased;

      el.textContent = prefix + current.toFixed(decimals) + suffix;

      if (progress < 1) {
        requestAnimationFrame(step);
      } else {
        el.textContent = prefix + target.toFixed(decimals) + suffix;
      }
    }

    requestAnimationFrame(step);
  }

  /* ========================================================================
     12. PARALLAX SCROLLING (Performance-Optimised)
     ======================================================================== */
  function initParallax() {
    if (prefersReducedMotion) return;

    var elements = $$("[data-parallax]");
    if (elements.length === 0) return;

    var ticking = false;

    function updateParallax() {
      var scrollY = window.pageYOffset;

      elements.forEach(function (el) {
        var speed = parseFloat(el.dataset.parallax) || 0.3;
        var rect = el.getBoundingClientRect();
        var elementTop = rect.top + scrollY;
        var offset = (scrollY - elementTop) * speed;

        el.style.transform = "translate3d(0, " + offset + "px, 0)";
      });

      ticking = false;
    }

    window.addEventListener(
      "scroll",
      function () {
        if (!ticking) {
          requestAnimationFrame(updateParallax);
          ticking = true;
        }
      },
      { passive: true }
    );
  }

  /* ========================================================================
     13. DYNAMIC FOOTER YEAR
     ======================================================================== */
  function initDynamicFooterYear() {
    var el = $("#footer-year");
    if (el) {
      el.textContent = new Date().getFullYear();
    }
  }

  /* ========================================================================
     14. PAGE TRANSITION EFFECTS
     ======================================================================== */
  function initPageTransitions() {
    if (prefersReducedMotion) return;

    var overlay = $(".page-transition-overlay");
    if (!overlay) return;

    // Intercept internal navigation links
    $$('a[href]').forEach(function (link) {
      var href = link.getAttribute("href");
      // Only intercept same-origin, non-anchor, non-special links
      if (
        !href ||
        href.startsWith("#") ||
        href.startsWith("mailto:") ||
        href.startsWith("tel:") ||
        href.startsWith("javascript:") ||
        link.target === "_blank" ||
        link.hasAttribute("download")
      ) {
        return;
      }

      // Check same origin
      try {
        var url = new URL(href, window.location.origin);
        if (url.origin !== window.location.origin) return;
      } catch (_) {
        return;
      }

      link.addEventListener("click", function (e) {
        e.preventDefault();
        overlay.classList.add("active");
        setTimeout(function () {
          window.location.href = href;
        }, 300);
      });
    });
  }

  /* ========================================================================
     15. PAGE LOADER REMOVAL
     ======================================================================== */
  function removePageLoader() {
    var loader = $(".page-loader");
    if (loader) {
      // Small delay to avoid FOUC
      setTimeout(function () {
        loader.classList.add("loaded");
        // Remove from DOM after transition
        setTimeout(function () {
          if (loader.parentNode) loader.parentNode.removeChild(loader);
        }, 600);
      }, 200);
    }
  }

  /* ========================================================================
     16. KEYBOARD NAVIGATION HELPERS
     ======================================================================== */
  function initKeyboardHelpers() {
    // Show focus ring only for keyboard users
    document.body.addEventListener("mousedown", function () {
      document.body.classList.add("using-mouse");
    });
    document.body.addEventListener("keydown", function (e) {
      if (e.key === "Tab") {
        document.body.classList.remove("using-mouse");
      }
    });

    // Escape key: close modals, mobile nav, chat, etc.
    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape") {
        closeAllOverlays();
      }
    });
  }

  function closeAllOverlays() {
    // Close mobile nav
    var navToggle = $(".nav-mobile-toggle");
    var navMenu = $(".nav-mobile-menu");
    if (
      navToggle &&
      navMenu &&
      navToggle.getAttribute("aria-expanded") === "true"
    ) {
      navToggle.setAttribute("aria-expanded", "false");
      navMenu.setAttribute("aria-hidden", "true");
      document.body.classList.remove("nav-open");
      navToggle.focus();
    }

    // Close modals
    $$(".modal-overlay.active").forEach(function (modal) {
      modal.classList.remove("active");
    });

    // Close chat
    var chatWindow = $(".chat-window.open");
    var chatBubble = $(".chat-bubble");
    if (chatWindow && chatBubble) {
      chatWindow.classList.remove("open");
      chatBubble.setAttribute("aria-expanded", "false");
      chatBubble.focus();
    }
  }

  /* ========================================================================
     17. FOCUS TRAP (for modals, drawers)
     ======================================================================== */
  function trapFocusIn(container, onEscape) {
    var focusableSelectors =
      'a[href], button:not([disabled]), input:not([disabled]), textarea:not([disabled]), select:not([disabled]), [tabindex]:not([tabindex="-1"])';

    function getFocusable() {
      return $$(focusableSelectors, container).filter(function (el) {
        return el.offsetParent !== null; // visible
      });
    }

    function handleKeydown(e) {
      if (e.key === "Escape" && typeof onEscape === "function") {
        onEscape();
        document.removeEventListener("keydown", handleKeydown);
        return;
      }

      if (e.key !== "Tab") return;

      var focusable = getFocusable();
      if (focusable.length === 0) return;

      var first = focusable[0];
      var last = focusable[focusable.length - 1];

      if (e.shiftKey) {
        if (document.activeElement === first) {
          e.preventDefault();
          last.focus();
        }
      } else {
        if (document.activeElement === last) {
          e.preventDefault();
          first.focus();
        }
      }
    }

    document.addEventListener("keydown", handleKeydown);

    // Focus first element
    var focusable = getFocusable();
    if (focusable.length > 0) {
      focusable[0].focus();
    }

    // Return cleanup function
    return function () {
      document.removeEventListener("keydown", handleKeydown);
    };
  }

  // Expose for external use (chat widget, modals)
  window.AstroydsUI = window.AstroydsUI || {};
  window.AstroydsUI.trapFocusIn = trapFocusIn;
  window.AstroydsUI.debounce = debounce;
  window.AstroydsUI.throttle = throttle;
  window.AstroydsUI.announceToScreenReader = announceToScreenReader;

  /* ========================================================================
     18. COOKIE CONSENT MANAGER
     ======================================================================== */
  function initCookieConsent() {
    var banner = $(".cookie-banner");
    if (!banner) return;

    var CONSENT_KEY = "astroyds-cookie-consent";
    var consent = getCookieConsent();

    // If already consented, don't show banner
    if (consent !== null) {
      banner.setAttribute("aria-hidden", "true");
      banner.classList.remove("visible");
      if (consent === "accepted") {
        enableAnalytics();
      }
      return;
    }

    // Show banner
    setTimeout(function () {
      banner.setAttribute("aria-hidden", "false");
      banner.classList.add("visible");
    }, 1500);

    // Accept button
    var acceptBtn = $("[data-cookie-accept]", banner);
    if (acceptBtn) {
      acceptBtn.addEventListener("click", function () {
        setCookieConsent("accepted");
        hideBanner();
        enableAnalytics();
      });
    }

    // Decline button
    var declineBtn = $("[data-cookie-decline]", banner);
    if (declineBtn) {
      declineBtn.addEventListener("click", function () {
        setCookieConsent("declined");
        hideBanner();
      });
    }

    function hideBanner() {
      banner.setAttribute("aria-hidden", "true");
      banner.classList.remove("visible");
    }
  }

  function getCookieConsent() {
    try {
      return localStorage.getItem("astroyds-cookie-consent");
    } catch (_) {
      return null;
    }
  }

  function setCookieConsent(value) {
    try {
      localStorage.setItem("astroyds-cookie-consent", value);
    } catch (_) {
      // Storage unavailable
    }
  }

  function enableAnalytics() {
    // Dispatch custom event for analytics modules to listen to
    document.dispatchEvent(new CustomEvent("astroyds:consent-granted"));
  }

  // Expose consent helpers
  window.AstroydsUI.getCookieConsent = getCookieConsent;
  window.AstroydsUI.setCookieConsent = setCookieConsent;

  /* ========================================================================
     19. TOAST NOTIFICATION SYSTEM
     ======================================================================== */
  var toastContainer = null;

  function initToastSystem() {
    // Create container if needed
    toastContainer = $(".toast-container");
    if (!toastContainer) {
      toastContainer = document.createElement("div");
      toastContainer.className = "toast-container";
      toastContainer.setAttribute("role", "status");
      toastContainer.setAttribute("aria-live", "polite");
      document.body.appendChild(toastContainer);
    }
  }

  /**
   * Show a toast notification.
   * @param {Object} options
   * @param {string} options.title
   * @param {string} options.message
   * @param {string} [options.type='info'] - 'success' | 'error' | 'warning' | 'info'
   * @param {number} [options.duration=5000]
   */
  function showToast(options) {
    if (!toastContainer) initToastSystem();

    var type = options.type || "info";
    var duration = options.duration !== undefined ? options.duration : 5000;

    var toast = document.createElement("div");
    toast.className = "toast toast-" + type;
    toast.setAttribute("role", "alert");

    var iconMap = {
      success: "✓",
      error: "✕",
      warning: "⚠",
      info: "ℹ",
    };

    toast.innerHTML =
      '<span class="toast-icon" aria-hidden="true">' +
      iconMap[type] +
      "</span>" +
      '<div class="toast-content">' +
      (options.title
        ? '<div class="toast-title">' + escapeHtml(options.title) + "</div>"
        : "") +
      (options.message
        ? '<div class="toast-message">' + escapeHtml(options.message) + "</div>"
        : "") +
      "</div>" +
      '<button class="toast-close" aria-label="Dismiss notification">&times;</button>';

    // Progress bar
    if (duration > 0) {
      var progress = document.createElement("div");
      progress.className = "toast-progress";
      progress.style.animationDuration = duration + "ms";
      toast.style.position = "relative";
      toast.appendChild(progress);
    }

    toastContainer.appendChild(toast);

    // Close button
    $(".toast-close", toast).addEventListener("click", function () {
      removeToast(toast);
    });

    // Auto-dismiss
    if (duration > 0) {
      setTimeout(function () {
        removeToast(toast);
      }, duration);
    }

    return toast;
  }

  function removeToast(toast) {
    if (!toast || !toast.parentNode) return;
    toast.classList.add("removing");
    setTimeout(function () {
      if (toast.parentNode) toast.parentNode.removeChild(toast);
    }, 300);
  }

  function escapeHtml(str) {
    var div = document.createElement("div");
    div.appendChild(document.createTextNode(str));
    return div.innerHTML;
  }

  // Expose toast globally
  window.AstroydsUI.showToast = showToast;

  /* ========================================================================
     20. MODAL HELPERS
     ======================================================================== */
  function openModal(modalId) {
    var overlay = $("#" + modalId);
    if (!overlay) return;

    overlay.classList.add("active");
    document.body.style.overflow = "hidden";

    var modal = $(".modal", overlay);
    var cleanup = null;

    if (modal) {
      cleanup = trapFocusIn(modal, function () {
        closeModal(modalId);
      });
    }

    // Click outside to close
    overlay.addEventListener("click", function handler(e) {
      if (e.target === overlay) {
        closeModal(modalId);
        overlay.removeEventListener("click", handler);
        if (cleanup) cleanup();
      }
    });

    // Close buttons
    $$("[data-modal-close]", overlay).forEach(function (btn) {
      btn.addEventListener("click", function () {
        closeModal(modalId);
        if (cleanup) cleanup();
      });
    });
  }

  function closeModal(modalId) {
    var overlay = $("#" + modalId);
    if (!overlay) return;
    overlay.classList.remove("active");
    document.body.style.overflow = "";
  }

  // Wire up data-modal-open triggers
  document.addEventListener("click", function (e) {
    var trigger = e.target.closest("[data-modal-open]");
    if (trigger) {
      openModal(trigger.dataset.modalOpen);
    }
  });

  window.AstroydsUI.openModal = openModal;
  window.AstroydsUI.closeModal = closeModal;

  /* ========================================================================
     21. ACCORDION
     ======================================================================== */
  document.addEventListener("click", function (e) {
    var trigger = e.target.closest(".accordion-trigger");
    if (!trigger) return;

    var item = trigger.closest(".accordion-item");
    var content = item ? $(".accordion-content", item) : null;
    if (!content) return;

    var expanded = trigger.getAttribute("aria-expanded") === "true";
    trigger.setAttribute("aria-expanded", String(!expanded));

    if (expanded) {
      content.style.maxHeight = "0";
      content.setAttribute("hidden", "");
    } else {
      content.removeAttribute("hidden");
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });

  /* ========================================================================
     22. TABS
     ======================================================================== */
  document.addEventListener("click", function (e) {
    var tab = e.target.closest(".tab-btn");
    if (!tab) return;

    var tabsContainer = tab.closest("[data-tabs]");
    if (!tabsContainer) return;

    var targetId = tab.dataset.tab;
    if (!targetId) return;

    // Deactivate siblings
    $$(".tab-btn", tabsContainer).forEach(function (t) {
      t.classList.remove("active");
      t.setAttribute("aria-selected", "false");
    });

    $$(".tab-panel", tabsContainer).forEach(function (p) {
      p.classList.remove("active");
      p.setAttribute("hidden", "");
    });

    // Activate clicked
    tab.classList.add("active");
    tab.setAttribute("aria-selected", "true");

    var panel = $("#" + targetId, tabsContainer);
    if (panel) {
      panel.classList.add("active");
      panel.removeAttribute("hidden");
    }
  });

  // Arrow key navigation within tabs
  document.addEventListener("keydown", function (e) {
    var tab = e.target.closest('.tab-btn');
    if (!tab) return;
    if (e.key !== "ArrowLeft" && e.key !== "ArrowRight") return;

    var tabs = $$(".tab-btn", tab.closest("[data-tabs]"));
    var idx = tabs.indexOf(tab);

    if (e.key === "ArrowRight") {
      idx = (idx + 1) % tabs.length;
    } else {
      idx = (idx - 1 + tabs.length) % tabs.length;
    }

    tabs[idx].focus();
    tabs[idx].click();
  });

  /* ========================================================================
     23. COPY TO CLIPBOARD (code blocks)
     ======================================================================== */
  document.addEventListener("click", function (e) {
    var btn = e.target.closest(".copy-btn");
    if (!btn) return;

    var codeBlock = btn.closest(".code-block");
    var code = codeBlock ? $("code, pre", codeBlock) : null;
    if (!code) return;

    navigator.clipboard
      .writeText(code.textContent)
      .then(function () {
        var original = btn.textContent;
        btn.textContent = "Copied!";
        setTimeout(function () {
          btn.textContent = original;
        }, 2000);
      })
      .catch(function () {
        // Fallback
        showToast({ title: "Copy failed", message: "Please copy manually.", type: "error" });
      });
  });

  /* ========================================================================
     24. NEWSLETTER FORM (footer)
     ======================================================================== */
  document.addEventListener("submit", function (e) {
    var form = e.target.closest(".footer-newsletter-form");
    if (!form) return;

    e.preventDefault();

    var input = $("input[type='email']", form);
    if (!input || !input.value.trim()) return;

    // Basic email regex
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(input.value)) {
      showToast({ title: "Invalid email", message: "Please enter a valid email address.", type: "error" });
      return;
    }

    showToast({ title: "Subscribed!", message: "Thank you for joining our newsletter.", type: "success" });
    input.value = "";
  });

  /* ========================================================================
     25. SCROLL DEPTH TRACKING (exposed for analytics.js)
     ======================================================================== */
  var scrollDepthMarks = { 25: false, 50: false, 75: false, 100: false };

  window.addEventListener(
    "scroll",
    throttle(function () {
      var docHeight = document.documentElement.scrollHeight - window.innerHeight;
      if (docHeight <= 0) return;
      var percent = Math.round((window.scrollY / docHeight) * 100);

      [25, 50, 75, 100].forEach(function (mark) {
        if (percent >= mark && !scrollDepthMarks[mark]) {
          scrollDepthMarks[mark] = true;
          document.dispatchEvent(
            new CustomEvent("astroyds:scroll-depth", { detail: { depth: mark } })
          );
        }
      });
    }, 500),
    { passive: true }
  );

  /* ========================================================================
     26. CTA CLICK TRACKING (exposed for analytics.js)
     ======================================================================== */
  document.addEventListener("click", function (e) {
    var cta = e.target.closest("[data-track-cta]");
    if (cta) {
      document.dispatchEvent(
        new CustomEvent("astroyds:cta-click", {
          detail: {
            label: cta.dataset.trackCta || cta.textContent.trim(),
            href: cta.href || "",
          },
        })
      );
    }
  });

  /* ========================================================================
     27. ANNOUNCEMENT BAR DISMISS
     ======================================================================== */
  document.addEventListener("click", function (e) {
    var btn = e.target.closest(".announcement-bar-close");
    if (!btn) return;

    var bar = btn.closest(".announcement-bar");
    if (bar) {
      bar.style.display = "none";
      try {
        sessionStorage.setItem("astroyds-announcement-dismissed", "1");
      } catch (_) {}
    }
  });

  // Restore dismissed state
  (function () {
    try {
      if (sessionStorage.getItem("astroyds-announcement-dismissed") === "1") {
        var bar = $(".announcement-bar");
        if (bar) bar.style.display = "none";
      }
    } catch (_) {}
  })();
})();
