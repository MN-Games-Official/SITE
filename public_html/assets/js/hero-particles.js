/* ==========================================================================
   Astroyds — Hero Particle System
   Canvas-based cosmic particle animation for the hero section.
   Features: star field, nebula dots, shooting stars, constellation lines,
   mouse interaction, and performance optimisation.
   ========================================================================== */

(function () {
  "use strict";

  /* -----------------------------------------------------------------------
     Early exit: honour prefers-reduced-motion
     ----------------------------------------------------------------------- */
  if (
    window.matchMedia &&
    window.matchMedia("(prefers-reduced-motion: reduce)").matches
  ) {
    return;
  }

  /* -----------------------------------------------------------------------
     Configuration
     ----------------------------------------------------------------------- */
  var CONFIG = {
    // Canvas target selector
    canvasSelector: "#hero-particles",

    // Particle counts (scaled down for mobile)
    stars:          120,
    nebulaDots:     40,
    shootingStars:  3,

    // Appearance
    starMinRadius:     0.4,
    starMaxRadius:     2.0,
    nebulaMinRadius:   1.5,
    nebulaMaxRadius:   4.0,

    // Colours — brand palette
    starColors: [
      "rgba(255, 255, 255, 0.9)",
      "rgba(255, 255, 255, 0.7)",
      "rgba(255, 255, 255, 0.5)",
      "rgba(59, 130, 246, 0.8)",    // electric blue
      "rgba(139, 92, 246, 0.7)",    // purple
    ],
    nebulaColors: [
      "rgba(59, 130, 246, 0.12)",
      "rgba(139, 92, 246, 0.10)",
      "rgba(99, 102, 241, 0.08)",
      "rgba(14, 165, 233, 0.10)",
    ],
    lineColor: "rgba(59, 130, 246, 0.08)",

    // Constellation lines
    lineDistance:   120,   // px — max distance to draw a line
    lineWidth:     0.5,

    // Movement
    baseSpeed:     0.15,
    mouseInfluence: 80,   // px radius of mouse repulsion
    mouseForce:     0.6,

    // Shooting stars
    shootingStarSpeed:    8,
    shootingStarLength:   80,
    shootingStarInterval: 6000, // ms between spawns

    // Performance
    fpsTarget:     60,
    mobileBreakpoint: 768,
    mobileParticleRatio: 0.5,
  };

  /* -----------------------------------------------------------------------
     State
     ----------------------------------------------------------------------- */
  var canvas, ctx;
  var width = 0;
  var height = 0;
  var dpr = 1;
  var particles = [];
  var nebulaParticles = [];
  var shootingStarPool = [];
  var mouse = { x: -9999, y: -9999, active: false };
  var animationId = null;
  var isTabVisible = true;
  var lastFrameTime = 0;
  var frameInterval = 1000 / CONFIG.fpsTarget;

  /* -----------------------------------------------------------------------
     Utility helpers
     ----------------------------------------------------------------------- */
  function rand(min, max) {
    return Math.random() * (max - min) + min;
  }

  function pick(arr) {
    return arr[Math.floor(Math.random() * arr.length)];
  }

  function dist(x1, y1, x2, y2) {
    var dx = x1 - x2;
    var dy = y1 - y2;
    return Math.sqrt(dx * dx + dy * dy);
  }

  function isMobile() {
    return window.innerWidth < CONFIG.mobileBreakpoint;
  }

  /* -----------------------------------------------------------------------
     Particle class — Stars
     ----------------------------------------------------------------------- */
  function Star() {
    this.reset(true);
  }

  Star.prototype.reset = function (initial) {
    this.x = initial ? rand(0, width) : rand(0, width);
    this.y = initial ? rand(0, height) : rand(0, height);
    this.radius = rand(CONFIG.starMinRadius, CONFIG.starMaxRadius);
    this.color = pick(CONFIG.starColors);
    this.vx = rand(-CONFIG.baseSpeed, CONFIG.baseSpeed);
    this.vy = rand(-CONFIG.baseSpeed, CONFIG.baseSpeed);
    this.opacity = rand(0.3, 1);
    this.twinkleSpeed = rand(0.005, 0.02);
    this.twinkleOffset = rand(0, Math.PI * 2);
    this.baseOpacity = this.opacity;
  };

  Star.prototype.update = function (time) {
    // Twinkle
    this.opacity =
      this.baseOpacity *
      (0.6 + 0.4 * Math.sin(time * this.twinkleSpeed + this.twinkleOffset));

    // Move
    this.x += this.vx;
    this.y += this.vy;

    // Mouse repulsion
    if (mouse.active) {
      var d = dist(this.x, this.y, mouse.x, mouse.y);
      if (d < CONFIG.mouseInfluence && d > 0) {
        var force = (CONFIG.mouseInfluence - d) / CONFIG.mouseInfluence * CONFIG.mouseForce;
        var angle = Math.atan2(this.y - mouse.y, this.x - mouse.x);
        this.x += Math.cos(angle) * force;
        this.y += Math.sin(angle) * force;
      }
    }

    // Wrap edges
    if (this.x < -10) this.x = width + 10;
    if (this.x > width + 10) this.x = -10;
    if (this.y < -10) this.y = height + 10;
    if (this.y > height + 10) this.y = -10;
  };

  Star.prototype.draw = function () {
    ctx.beginPath();
    ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
    ctx.fillStyle = this.color.replace(
      /[\d.]+\)$/,
      this.opacity.toFixed(2) + ")"
    );
    ctx.fill();
  };

  /* -----------------------------------------------------------------------
     Nebula Dot class
     ----------------------------------------------------------------------- */
  function NebulaDot() {
    this.reset(true);
  }

  NebulaDot.prototype.reset = function (initial) {
    this.x = initial ? rand(0, width) : rand(0, width);
    this.y = initial ? rand(0, height) : rand(0, height);
    this.radius = rand(CONFIG.nebulaMinRadius, CONFIG.nebulaMaxRadius);
    this.color = pick(CONFIG.nebulaColors);
    this.vx = rand(-CONFIG.baseSpeed * 0.3, CONFIG.baseSpeed * 0.3);
    this.vy = rand(-CONFIG.baseSpeed * 0.3, CONFIG.baseSpeed * 0.3);
    this.pulseSpeed = rand(0.003, 0.01);
    this.pulseOffset = rand(0, Math.PI * 2);
    this.baseRadius = this.radius;
  };

  NebulaDot.prototype.update = function (time) {
    this.radius =
      this.baseRadius *
      (0.7 + 0.3 * Math.sin(time * this.pulseSpeed + this.pulseOffset));

    this.x += this.vx;
    this.y += this.vy;

    // Mouse attraction (gentle)
    if (mouse.active) {
      var d = dist(this.x, this.y, mouse.x, mouse.y);
      if (d < CONFIG.mouseInfluence * 2 && d > 0) {
        var force = (CONFIG.mouseInfluence * 2 - d) / (CONFIG.mouseInfluence * 2) * 0.15;
        var angle = Math.atan2(mouse.y - this.y, mouse.x - this.x);
        this.x += Math.cos(angle) * force;
        this.y += Math.sin(angle) * force;
      }
    }

    // Wrap
    if (this.x < -20) this.x = width + 20;
    if (this.x > width + 20) this.x = -20;
    if (this.y < -20) this.y = height + 20;
    if (this.y > height + 20) this.y = -20;
  };

  NebulaDot.prototype.draw = function () {
    var gradient = ctx.createRadialGradient(
      this.x,
      this.y,
      0,
      this.x,
      this.y,
      this.radius * 3
    );
    gradient.addColorStop(0, this.color);
    gradient.addColorStop(1, "rgba(0, 0, 0, 0)");

    ctx.beginPath();
    ctx.arc(this.x, this.y, this.radius * 3, 0, Math.PI * 2);
    ctx.fillStyle = gradient;
    ctx.fill();
  };

  /* -----------------------------------------------------------------------
     Shooting Star class
     ----------------------------------------------------------------------- */
  function ShootingStar() {
    this.active = false;
    this.reset();
  }

  ShootingStar.prototype.reset = function () {
    this.x = rand(0, width);
    this.y = rand(0, height * 0.4);
    this.length = rand(CONFIG.shootingStarLength * 0.6, CONFIG.shootingStarLength);
    this.speed = rand(CONFIG.shootingStarSpeed * 0.7, CONFIG.shootingStarSpeed);
    this.angle = rand(Math.PI * 0.1, Math.PI * 0.4);
    this.opacity = 1;
    this.decay = rand(0.015, 0.03);
    this.vx = Math.cos(this.angle) * this.speed;
    this.vy = Math.sin(this.angle) * this.speed;
    this.active = false;
    this.trail = [];
  };

  ShootingStar.prototype.activate = function () {
    this.reset();
    this.active = true;
    this.x = rand(width * 0.1, width * 0.9);
    this.y = rand(0, height * 0.3);
  };

  ShootingStar.prototype.update = function () {
    if (!this.active) return;

    this.x += this.vx;
    this.y += this.vy;
    this.opacity -= this.decay;

    // Store trail positions
    this.trail.push({ x: this.x, y: this.y, opacity: this.opacity });
    if (this.trail.length > 20) {
      this.trail.shift();
    }

    if (this.opacity <= 0 || this.x > width + 50 || this.y > height + 50) {
      this.active = false;
      this.trail = [];
    }
  };

  ShootingStar.prototype.draw = function () {
    if (!this.active || this.trail.length < 2) return;

    for (var i = 1; i < this.trail.length; i++) {
      var p0 = this.trail[i - 1];
      var p1 = this.trail[i];
      var progress = i / this.trail.length;

      ctx.beginPath();
      ctx.moveTo(p0.x, p0.y);
      ctx.lineTo(p1.x, p1.y);
      ctx.strokeStyle =
        "rgba(255, 255, 255, " + (progress * this.opacity * 0.8).toFixed(3) + ")";
      ctx.lineWidth = progress * 2;
      ctx.stroke();
    }

    // Head glow
    var head = this.trail[this.trail.length - 1];
    var glow = ctx.createRadialGradient(head.x, head.y, 0, head.x, head.y, 6);
    glow.addColorStop(0, "rgba(255, 255, 255, " + (this.opacity * 0.6).toFixed(3) + ")");
    glow.addColorStop(1, "rgba(255, 255, 255, 0)");
    ctx.beginPath();
    ctx.arc(head.x, head.y, 6, 0, Math.PI * 2);
    ctx.fillStyle = glow;
    ctx.fill();
  };

  /* -----------------------------------------------------------------------
     Constellation Lines
     ----------------------------------------------------------------------- */
  function drawConstellationLines() {
    var len = particles.length;
    var maxDist = CONFIG.lineDistance;
    var maxDistSq = maxDist * maxDist;

    for (var i = 0; i < len; i++) {
      for (var j = i + 1; j < len; j++) {
        var dx = particles[i].x - particles[j].x;
        var dy = particles[i].y - particles[j].y;
        var dSq = dx * dx + dy * dy;

        if (dSq < maxDistSq) {
          var d = Math.sqrt(dSq);
          var opacity = 1 - d / maxDist;

          ctx.beginPath();
          ctx.moveTo(particles[i].x, particles[i].y);
          ctx.lineTo(particles[j].x, particles[j].y);
          ctx.strokeStyle =
            "rgba(59, 130, 246, " + (opacity * 0.12).toFixed(3) + ")";
          ctx.lineWidth = CONFIG.lineWidth;
          ctx.stroke();
        }
      }
    }

    // Lines to mouse
    if (mouse.active) {
      for (var k = 0; k < len; k++) {
        var mDist = dist(particles[k].x, particles[k].y, mouse.x, mouse.y);
        if (mDist < maxDist * 1.5) {
          var mOpacity = 1 - mDist / (maxDist * 1.5);
          ctx.beginPath();
          ctx.moveTo(particles[k].x, particles[k].y);
          ctx.lineTo(mouse.x, mouse.y);
          ctx.strokeStyle =
            "rgba(139, 92, 246, " + (mOpacity * 0.15).toFixed(3) + ")";
          ctx.lineWidth = CONFIG.lineWidth;
          ctx.stroke();
        }
      }
    }
  }

  /* -----------------------------------------------------------------------
     Initialisation
     ----------------------------------------------------------------------- */
  function init() {
    canvas = document.querySelector(CONFIG.canvasSelector);
    if (!canvas) return;

    ctx = canvas.getContext("2d");
    if (!ctx) return;

    dpr = Math.min(window.devicePixelRatio || 1, 2);

    resize();
    createParticles();
    setupEvents();
    startAnimation();
    setupShootingStarTimer();
  }

  function createParticles() {
    var ratio = isMobile() ? CONFIG.mobileParticleRatio : 1;

    var starCount = Math.round(CONFIG.stars * ratio);
    var nebulaCount = Math.round(CONFIG.nebulaDots * ratio);

    particles = [];
    nebulaParticles = [];
    shootingStarPool = [];

    for (var i = 0; i < starCount; i++) {
      particles.push(new Star());
    }

    for (var j = 0; j < nebulaCount; j++) {
      nebulaParticles.push(new NebulaDot());
    }

    for (var k = 0; k < CONFIG.shootingStars; k++) {
      shootingStarPool.push(new ShootingStar());
    }
  }

  /* -----------------------------------------------------------------------
     Resize handler
     ----------------------------------------------------------------------- */
  function resize() {
    if (!canvas) return;

    var container = canvas.parentElement;
    width = container ? container.clientWidth : window.innerWidth;
    height = container ? container.clientHeight : window.innerHeight;

    canvas.width = width * dpr;
    canvas.height = height * dpr;
    canvas.style.width = width + "px";
    canvas.style.height = height + "px";
    ctx.scale(dpr, dpr);
  }

  /* -----------------------------------------------------------------------
     Event listeners
     ----------------------------------------------------------------------- */
  function setupEvents() {
    // Resize (debounced)
    var debouncedResize = debounce(function () {
      resize();
      // Re-distribute particles for new dimensions
      particles.forEach(function (p) {
        if (p.x > width) p.x = rand(0, width);
        if (p.y > height) p.y = rand(0, height);
      });
      nebulaParticles.forEach(function (p) {
        if (p.x > width) p.x = rand(0, width);
        if (p.y > height) p.y = rand(0, height);
      });
    }, 200);

    window.addEventListener("resize", debouncedResize);

    // Mouse tracking
    canvas.addEventListener("mousemove", function (e) {
      var rect = canvas.getBoundingClientRect();
      mouse.x = e.clientX - rect.left;
      mouse.y = e.clientY - rect.top;
      mouse.active = true;
    });

    canvas.addEventListener("mouseleave", function () {
      mouse.active = false;
    });

    // Touch support
    canvas.addEventListener(
      "touchmove",
      function (e) {
        if (e.touches.length > 0) {
          var rect = canvas.getBoundingClientRect();
          mouse.x = e.touches[0].clientX - rect.left;
          mouse.y = e.touches[0].clientY - rect.top;
          mouse.active = true;
        }
      },
      { passive: true }
    );

    canvas.addEventListener("touchend", function () {
      mouse.active = false;
    });

    // Page Visibility API — throttle when tab not visible
    document.addEventListener("visibilitychange", function () {
      isTabVisible = !document.hidden;
      if (isTabVisible && !animationId) {
        startAnimation();
      }
    });
  }

  /* -----------------------------------------------------------------------
     Shooting star timer
     ----------------------------------------------------------------------- */
  function setupShootingStarTimer() {
    setInterval(function () {
      if (!isTabVisible) return;

      for (var i = 0; i < shootingStarPool.length; i++) {
        if (!shootingStarPool[i].active) {
          shootingStarPool[i].activate();
          break;
        }
      }
    }, CONFIG.shootingStarInterval);
  }

  /* -----------------------------------------------------------------------
     Animation loop
     ----------------------------------------------------------------------- */
  function startAnimation() {
    lastFrameTime = performance.now();
    animationLoop(lastFrameTime);
  }

  function animationLoop(timestamp) {
    if (!isTabVisible) {
      animationId = null;
      return;
    }

    animationId = requestAnimationFrame(animationLoop);

    var delta = timestamp - lastFrameTime;
    if (delta < frameInterval) return;
    lastFrameTime = timestamp - (delta % frameInterval);

    // Clear
    ctx.clearRect(0, 0, width, height);

    // Draw nebula (behind everything)
    for (var n = 0; n < nebulaParticles.length; n++) {
      nebulaParticles[n].update(timestamp);
      nebulaParticles[n].draw();
    }

    // Draw constellation lines
    drawConstellationLines();

    // Draw stars
    for (var s = 0; s < particles.length; s++) {
      particles[s].update(timestamp);
      particles[s].draw();
    }

    // Draw shooting stars
    for (var ss = 0; ss < shootingStarPool.length; ss++) {
      shootingStarPool[ss].update();
      shootingStarPool[ss].draw();
    }
  }

  /* -----------------------------------------------------------------------
     Debounce (local copy to avoid dependency on main.js load order)
     ----------------------------------------------------------------------- */
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

  /* -----------------------------------------------------------------------
     Bootstrap — use requestIdleCallback when available
     ----------------------------------------------------------------------- */
  function bootstrap() {
    if (document.readyState === "loading") {
      document.addEventListener("DOMContentLoaded", init);
    } else {
      init();
    }
  }

  if ("requestIdleCallback" in window) {
    requestIdleCallback(bootstrap, { timeout: 2000 });
  } else {
    setTimeout(bootstrap, 100);
  }
})();
