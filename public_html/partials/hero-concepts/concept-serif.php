<?php
/**
 * Hero Concept: Serif — Astroyds
 *
 * Clean, editorial-style hero section featuring:
 *   - Large Times New Roman headline, centered
 *   - Subtle gradient background (no canvas / particles)
 *   - CSS-only animated text reveal
 *   - Tagline sub-headline
 *   - Dual CTA buttons (primary + outline)
 *   - Minimal decoration — emphasis on typography & whitespace
 *   - prefers-reduced-motion compatible by default
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
     HERO — Serif Concept
     Clean, editorial hero with typographic focus.
     DRAFT COPY — subject to revision before launch
     ==================================================================== -->

<!-- Inline CSS for the serif hero text reveal animation (CSS-only) -->
<style>
/* Text reveal — words clip-path from below */
@keyframes serifRevealWord {
    0%   { opacity: 0; transform: translateY(100%); }
    100% { opacity: 1; transform: translateY(0); }
}
@keyframes serifRevealFade {
    0%   { opacity: 0; }
    100% { opacity: 1; }
}
.serif-reveal-word {
    display: inline-block;
    overflow: hidden;
}
.serif-reveal-word > span {
    display: inline-block;
    opacity: 0;
    transform: translateY(100%);
    animation: serifRevealWord 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}
.serif-fade-in {
    opacity: 0;
    animation: serifRevealFade 1s ease forwards;
}
/* Stagger delays for each word */
.serif-word-1 > span { animation-delay: 0.1s; }
.serif-word-2 > span { animation-delay: 0.2s; }
.serif-word-3 > span { animation-delay: 0.3s; }
.serif-word-4 > span { animation-delay: 0.4s; }
.serif-word-5 > span { animation-delay: 0.5s; }
.serif-word-6 > span { animation-delay: 0.6s; }
/* prefers-reduced-motion: skip animations, show everything immediately */
@media (prefers-reduced-motion: reduce) {
    .serif-reveal-word > span,
    .serif-fade-in {
        opacity: 1 !important;
        transform: none !important;
        animation: none !important;
    }
}
</style>

<section id="hero"
         class="relative min-h-screen flex items-center justify-center overflow-hidden
                bg-navy"
         aria-label="Hero section"
         role="banner">

    <!-- ── Subtle gradient background ────────────────────────────────── -->
    <div class="absolute inset-0 bg-gradient-to-br from-navy via-[#0d1235] to-navy"
         aria-hidden="true"></div>

    <!-- ── Faint radial accent (decorative) ──────────────────────────── -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2
                w-[700px] h-[700px] rounded-full bg-electric/[0.03] blur-[150px]
                pointer-events-none"
         aria-hidden="true"></div>

    <!-- ── Thin horizontal rule accents (editorial decoration) ───────── -->
    <div class="absolute top-1/3 left-0 right-0 h-px bg-gradient-to-r
                from-transparent via-white/[0.04] to-transparent pointer-events-none"
         aria-hidden="true"></div>
    <div class="absolute bottom-1/3 left-0 right-0 h-px bg-gradient-to-r
                from-transparent via-white/[0.04] to-transparent pointer-events-none"
         aria-hidden="true"></div>

    <!-- ── Hero content ──────────────────────────────────────────────── -->
    <div class="relative z-10 mx-auto max-w-4xl px-4 sm:px-6 lg:px-8
                text-center py-24 sm:py-32 lg:py-40">

        <!-- Overline / eyebrow -->
        <p class="serif-fade-in mb-8 text-xs sm:text-sm font-body font-medium uppercase
                  tracking-[0.2em] text-slate-500"
           style="animation-delay: 0s;">
            Astroyds &mdash; Est. Maple Grove, MN
        </p>

        <!-- ── Main headline — animated text reveal ──────────────────── -->
        <!--
            HEADLINE CANDIDATES — uncomment the preferred option:

            Alt 1: "Pioneering the Frontier of Innovation"
            <h1 class="font-heading text-hero font-bold text-white leading-tight tracking-tight">
                <span class="serif-reveal-word serif-word-1"><span>Pioneering</span></span>
                <span class="serif-reveal-word serif-word-2"><span>the</span></span>
                <span class="serif-reveal-word serif-word-3"><span>Frontier</span></span><br class="hidden sm:inline">
                <span class="serif-reveal-word serif-word-4"><span>of</span></span>
                <span class="serif-reveal-word serif-word-5"><span>Innovation</span></span>
            </h1>

            Alt 2: "Where Vision Meets Infinite Possibility"
            <h1 class="font-heading text-hero font-bold text-white leading-tight tracking-tight">
                <span class="serif-reveal-word serif-word-1"><span>Where</span></span>
                <span class="serif-reveal-word serif-word-2"><span>Vision</span></span>
                <span class="serif-reveal-word serif-word-3"><span>Meets</span></span><br class="hidden sm:inline">
                <span class="serif-reveal-word serif-word-4"><span>Infinite</span></span>
                <span class="serif-reveal-word serif-word-5"><span>Possibility</span></span>
            </h1>
        -->
        <!-- DEFAULT: "We Build Tomorrow's World Today" -->
        <h1 class="font-heading text-hero font-bold text-white leading-tight tracking-tight">
            <span class="serif-reveal-word serif-word-1"><span>We</span></span>
            <span class="serif-reveal-word serif-word-2"><span>Build</span></span>
            <span class="serif-reveal-word serif-word-3"><span>Tomorrow&rsquo;s</span></span><br class="hidden sm:inline">
            <span class="serif-reveal-word serif-word-4"><span>World</span></span>
            <span class="serif-reveal-word serif-word-5"><span>Today</span></span>
        </h1>

        <!-- ── Decorative divider ────────────────────────────────────── -->
        <div class="serif-fade-in mx-auto mt-8 flex items-center justify-center gap-3"
             style="animation-delay: 0.7s;"
             aria-hidden="true">
            <span class="block h-px w-12 bg-gradient-to-r from-transparent to-electric/40"></span>
            <span class="block h-1.5 w-1.5 rounded-full bg-electric/60"></span>
            <span class="block h-px w-12 bg-gradient-to-l from-transparent to-electric/40"></span>
        </div>

        <!-- ── Sub-headline (tagline) ────────────────────────────────── -->
        <p class="serif-fade-in mt-8 mx-auto max-w-xl text-lg sm:text-xl text-slate-400
                  font-body leading-relaxed"
           style="animation-delay: 0.8s;">
            Moving humanity forward for a better future.
        </p>

        <!-- ── CTA Buttons ───────────────────────────────────────────── -->
        <div class="serif-fade-in mt-12 sm:mt-14 flex flex-col sm:flex-row items-center
                    justify-center gap-4"
             style="animation-delay: 1s;">

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
                      border border-white/15 text-white text-base font-semibold font-body
                      hover:bg-white/5 hover:border-white/25
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

        <!-- ── Company logos / badges row (editorial accent) ─────────── -->
        <div class="serif-fade-in mt-16 flex items-center justify-center gap-6 sm:gap-10"
             style="animation-delay: 1.2s;">
            <span class="text-sm font-body font-semibold tracking-wider text-slate-500 uppercase
                         hover:text-electric transition-colors duration-200 cursor-default">IDLE</span>
            <span class="h-4 w-px bg-white/10" aria-hidden="true"></span>
            <span class="text-sm font-body font-semibold tracking-wider text-slate-500 uppercase
                         hover:text-purple transition-colors duration-200 cursor-default">RIFT</span>
            <span class="h-4 w-px bg-white/10" aria-hidden="true"></span>
            <span class="text-sm font-body font-semibold tracking-wider text-slate-500 uppercase
                         hover:text-green-400 transition-colors duration-200 cursor-default">BulletPROOF</span>
        </div>
    </div><!-- /Hero content -->

    <!-- ── Scroll-down indicator ─────────────────────────────────────── -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10
                motion-reduce:hidden serif-fade-in"
         style="animation-delay: 1.4s;"
         aria-hidden="true">
        <a href="#main-content"
           class="inline-flex flex-col items-center gap-2 text-slate-500 hover:text-white
                  transition-colors duration-300"
           aria-label="Scroll down to content">
            <span class="text-xs font-body uppercase tracking-widest">Discover</span>
            <svg class="h-5 w-5 motion-safe:animate-bounce-slow"
                 xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3"/>
            </svg>
        </a>
    </div>

    <!-- ── Bottom gradient fade ──────────────────────────────────────── -->
    <div class="absolute bottom-0 left-0 right-0 h-24 bg-gradient-to-t from-navy to-transparent
                pointer-events-none"
         aria-hidden="true"></div>

</section><!-- /Hero serif -->
