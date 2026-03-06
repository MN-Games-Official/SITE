<?php
/**
 * Hero Concept: Immersive — Astroyds
 *
 * Full-viewport animated hero section featuring:
 *   - Canvas-based particle animation (hero-particles.js)
 *   - Gradient overlay
 *   - Large serif headline (with alternate candidates commented out)
 *   - Tagline sub-headline
 *   - Dual CTA buttons (primary + outline)
 *   - Scroll-down indicator animation
 *   - Lottie animation placeholder
 *   - prefers-reduced-motion: static gradient fallback
 *   - ARIA labels on all interactive elements
 *
 * @package    Astroyds
 * @author     Astroyds <letstalk@astroyds.com>
 * @copyright  Astroyds
 * @link       https://astroyds.com
 *
 * <!-- DRAFT COPY — subject to revision before launch -->
 */

require_once __DIR__ . '/../../src/php/template_helpers.php';
require_once __DIR__ . '/../../src/php/config.php';
?>
<!-- ====================================================================
     HERO — Immersive Concept
     Full-viewport animated hero with particle canvas.
     DRAFT COPY — subject to revision before launch
     ==================================================================== -->
<section id="hero"
         class="relative min-h-screen flex items-center justify-center overflow-hidden
                bg-navy"
         aria-label="Hero section"
         role="banner">

    <!-- ── Particle canvas (animated via hero-particles.js) ──────────── -->
    <!-- Reduced-motion: canvas is hidden and a static gradient is shown instead -->
    <canvas id="hero-particles-canvas"
            class="absolute inset-0 w-full h-full motion-safe:block motion-reduce:hidden"
            aria-hidden="true"
            role="presentation"></canvas>

    <!-- ── Static gradient fallback (prefers-reduced-motion) ─────────── -->
    <div class="absolute inset-0 bg-gradient-to-br from-navy via-navy-light to-navy
                motion-safe:hidden motion-reduce:block"
         aria-hidden="true"></div>

    <!-- ── Gradient overlay ──────────────────────────────────────────── -->
    <div class="absolute inset-0 bg-gradient-to-b from-navy/40 via-transparent to-navy"
         aria-hidden="true"></div>

    <!-- ── Accent glow orbs (decorative) ─────────────────────────────── -->
    <div class="absolute top-1/4 left-1/4 w-[500px] h-[500px] rounded-full
                bg-electric/5 blur-[120px] motion-safe:animate-pulse-slow
                motion-reduce:opacity-30 pointer-events-none"
         aria-hidden="true"></div>
    <div class="absolute bottom-1/4 right-1/4 w-[400px] h-[400px] rounded-full
                bg-purple/5 blur-[100px] motion-safe:animate-pulse-slow motion-safe:animation-delay-1000
                motion-reduce:opacity-20 pointer-events-none"
         aria-hidden="true"></div>

    <!-- ── Lottie animation placeholder ──────────────────────────────── -->
    <!-- Load a Lottie animation here as a decorative complement. Falls back gracefully. -->
    <div id="hero-lottie"
         class="absolute inset-0 pointer-events-none motion-reduce:hidden"
         aria-hidden="true"
         data-lottie-src="/assets/animations/hero-ambient.json"
         role="presentation">
        <!-- Populated by lottie-web or @lottiefiles/lottie-player -->
    </div>

    <!-- ── Hero content ──────────────────────────────────────────────── -->
    <div class="relative z-10 mx-auto max-w-5xl px-4 sm:px-6 lg:px-8
                text-center py-24 sm:py-32">

        <!-- Overline / eyebrow -->
        <p class="mb-6 inline-flex items-center gap-2 rounded-full border border-brand-border
                  bg-white/5 px-4 py-1.5 text-xs sm:text-sm font-medium text-slate-300 font-body
                  backdrop-blur-sm motion-safe:animate-fade-in"
           style="animation-delay: 0.1s;">
            <span class="inline-block h-1.5 w-1.5 rounded-full bg-electric animate-pulse"
                  aria-hidden="true"></span>
            Building the future, so you don&rsquo;t have to.
        </p>

        <!-- ── Main headline ─────────────────────────────────────────── -->
        <!--
            HEADLINE CANDIDATES — uncomment the preferred option:

            Alt 1: "Pioneering the Frontier of Innovation"
            <h1 class="font-heading text-hero font-bold text-white leading-tight tracking-tight
                        motion-safe:animate-fade-in-up"
                 style="animation-delay: 0.2s;">
                Pioneering the Frontier<br class="hidden sm:inline"> of Innovation
            </h1>

            Alt 2: "Where Vision Meets Infinite Possibility"
            <h1 class="font-heading text-hero font-bold text-white leading-tight tracking-tight
                        motion-safe:animate-fade-in-up"
                 style="animation-delay: 0.2s;">
                Where Vision Meets<br class="hidden sm:inline"> Infinite Possibility
            </h1>
        -->
        <!-- DEFAULT: "We Build Tomorrow's World Today" -->
        <h1 class="font-heading text-hero font-bold text-white leading-tight tracking-tight
                    motion-safe:animate-fade-in-up"
             style="animation-delay: 0.2s;">
            We Build Tomorrow&rsquo;s<br class="hidden sm:inline"> World Today
        </h1>

        <!-- ── Sub-headline (tagline) ────────────────────────────────── -->
        <p class="mt-6 sm:mt-8 mx-auto max-w-2xl text-lg sm:text-xl text-slate-300 font-body
                  leading-relaxed motion-safe:animate-fade-in-up"
           style="animation-delay: 0.4s;">
            Moving humanity forward for a better future.
        </p>

        <!-- ── Gradient accent bar ───────────────────────────────────── -->
        <div class="mx-auto mt-8 h-1 w-24 rounded-full bg-gradient-to-r from-electric to-purple
                    motion-safe:animate-fade-in"
             style="animation-delay: 0.5s;"
             aria-hidden="true"></div>

        <!-- ── CTA Buttons ───────────────────────────────────────────── -->
        <div class="mt-10 sm:mt-12 flex flex-col sm:flex-row items-center justify-center gap-4
                    motion-safe:animate-fade-in-up"
             style="animation-delay: 0.6s;">

            <!-- Primary CTA -->
            <a href="<?= e(page_url('/about')) ?>"
               class="group inline-flex items-center gap-2 rounded-full px-8 py-3.5
                      bg-gradient-to-r from-electric to-purple text-white text-base
                      font-semibold font-body shadow-xl shadow-electric/25
                      hover:shadow-2xl hover:shadow-electric/35 hover:scale-105
                      active:scale-95 transition-all duration-300"
               aria-label="Explore Our Vision — learn more about Astroyds">
                Explore Our Vision
                <svg class="h-5 w-5 group-hover:translate-x-1 transition-transform duration-200"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="2" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                </svg>
            </a>

            <!-- Secondary / Outline CTA -->
            <a href="<?= e(page_url('/companies')) ?>"
               class="group inline-flex items-center gap-2 rounded-full px-8 py-3.5
                      border border-white/20 text-white text-base font-semibold font-body
                      backdrop-blur-sm hover:bg-white/5 hover:border-white/30
                      hover:scale-105 active:scale-95 transition-all duration-300"
               aria-label="Meet Our Companies — IDLE, RIFT, BulletPROOF">
                Meet Our Companies
                <svg class="h-5 w-5 text-slate-400 group-hover:text-white
                            group-hover:translate-x-1 transition-all duration-200"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="2" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                </svg>
            </a>
        </div>
    </div><!-- /Hero content -->

    <!-- ── Scroll-down indicator ─────────────────────────────────────── -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10
                motion-safe:animate-bounce-slow motion-reduce:hidden"
         aria-hidden="true">
        <a href="#main-content"
           class="inline-flex flex-col items-center gap-2 text-slate-500 hover:text-white
                  transition-colors duration-300"
           aria-label="Scroll down to content">
            <span class="text-xs font-body uppercase tracking-widest">Scroll</span>
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3"/>
            </svg>
        </a>
    </div>

    <!-- ── Bottom gradient fade to content ───────────────────────────── -->
    <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-navy to-transparent
                pointer-events-none"
         aria-hidden="true"></div>

</section><!-- /Hero immersive -->

<!-- ── Particle animation script ─────────────────────────────────────── -->
<script>
(function(){
    /* Skip particle animation if the user prefers reduced motion */
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    var canvas = document.getElementById('hero-particles-canvas');
    if (!canvas) return;

    var ctx = canvas.getContext('2d');
    var particles = [];
    var PARTICLE_COUNT = 80;
    var animId;

    function resize() {
        canvas.width  = canvas.offsetWidth  * (window.devicePixelRatio || 1);
        canvas.height = canvas.offsetHeight * (window.devicePixelRatio || 1);
        ctx.scale(window.devicePixelRatio || 1, window.devicePixelRatio || 1);
    }

    function createParticle() {
        return {
            x:  Math.random() * canvas.offsetWidth,
            y:  Math.random() * canvas.offsetHeight,
            vx: (Math.random() - 0.5) * 0.3,
            vy: (Math.random() - 0.5) * 0.3,
            r:  Math.random() * 2 + 0.5,
            a:  Math.random() * 0.5 + 0.1,
            c:  Math.random() > 0.5 ? '59,130,246' : '139,92,246' // electric blue or purple
        };
    }

    function init() {
        resize();
        particles = [];
        for (var i = 0; i < PARTICLE_COUNT; i++) particles.push(createParticle());
    }

    function draw() {
        var w = canvas.offsetWidth, h = canvas.offsetHeight;
        ctx.clearRect(0, 0, w, h);

        for (var i = 0; i < particles.length; i++) {
            var p = particles[i];
            p.x += p.vx;
            p.y += p.vy;

            // Wrap around edges
            if (p.x < 0) p.x = w;
            if (p.x > w) p.x = 0;
            if (p.y < 0) p.y = h;
            if (p.y > h) p.y = 0;

            ctx.beginPath();
            ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
            ctx.fillStyle = 'rgba(' + p.c + ',' + p.a + ')';
            ctx.fill();

            // Draw connections to nearby particles
            for (var j = i + 1; j < particles.length; j++) {
                var q  = particles[j];
                var dx = p.x - q.x;
                var dy = p.y - q.y;
                var dist = Math.sqrt(dx * dx + dy * dy);
                if (dist < 120) {
                    ctx.beginPath();
                    ctx.moveTo(p.x, p.y);
                    ctx.lineTo(q.x, q.y);
                    ctx.strokeStyle = 'rgba(' + p.c + ',' + (0.08 * (1 - dist / 120)) + ')';
                    ctx.lineWidth = 0.5;
                    ctx.stroke();
                }
            }
        }
        animId = requestAnimationFrame(draw);
    }

    init();
    draw();
    window.addEventListener('resize', function(){ init(); });

    /* Pause when not visible to save resources */
    document.addEventListener('visibilitychange', function(){
        if (document.hidden) { cancelAnimationFrame(animId); }
        else { draw(); }
    });
})();
</script>
