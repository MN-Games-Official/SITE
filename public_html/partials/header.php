<?php
/**
 * Header / Navigation Partial — Astroyds
 *
 * Sticky glassmorphism header with:
 *   - Logo + wordmark
 *   - Desktop navigation (with Companies dropdown)
 *   - Mobile hamburger menu with slide-out panel
 *   - Dark-mode toggle
 *   - Language selector placeholder
 *   - "Get in Touch" CTA
 *   - Skip-to-content link (a11y)
 *   - Cookie consent banner (hidden by default)
 *   - Floating support-chat trigger button
 *
 * @package    Astroyds
 * @author     Astroyds <letstalk@astroyds.com>
 * @copyright  Astroyds
 * @link       https://astroyds.com
 *
 * <!-- DRAFT COPY — subject to revision before launch -->
 */

require_once __DIR__ . '/../src/php/template_helpers.php';
require_once __DIR__ . '/../src/php/config.php';

$base_url = defined('SITE_URL') ? SITE_URL : 'https://astroyds.com';
?>
<!-- ====================================================================
     SKIP-TO-CONTENT (accessibility)
     ==================================================================== -->
<a href="#main-content"
   class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-[9999]
          focus:px-4 focus:py-2 focus:bg-electric focus:text-white focus:rounded-lg
          focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2
          focus:ring-offset-navy font-body text-sm transition-all"
   aria-label="Skip to main content">
    Skip to main content
</a>

<!-- ====================================================================
     SITE HEADER
     ==================================================================== -->
<header id="site-header"
        role="banner"
        class="fixed top-0 left-0 right-0 z-50 transition-all duration-300
               bg-brand-glass backdrop-blur-xl border-b border-brand-border
               supports-[backdrop-filter]:bg-brand-glass">

    <nav aria-label="Primary navigation"
         class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="flex h-16 items-center justify-between lg:h-20">

            <!-- ── Logo ──────────────────────────────────────────────── -->
            <div class="flex-shrink-0">
                <a href="<?= e(page_url('/')) ?>"
                   class="group flex items-center gap-3"
                   aria-label="Astroyds — Home">
                    <!-- SVG logo placeholder -->
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-lg
                                 bg-gradient-to-br from-electric to-purple text-white
                                 font-heading font-bold text-lg shadow-glow-blue
                                 group-hover:shadow-glow-purple transition-shadow duration-300"
                          aria-hidden="true">A</span>
                    <span class="hidden sm:block text-white font-heading text-xl tracking-wide
                                 group-hover:text-electric-light transition-colors duration-200">
                        Astroyds
                    </span>
                </a>
            </div>

            <!-- ── Desktop Navigation ────────────────────────────────── -->
            <div class="hidden lg:flex lg:items-center lg:gap-1" role="menubar">

                <!-- Home -->
                <a href="<?= e(page_url('/')) ?>"
                   class="nav-link px-4 py-2 rounded-lg text-sm font-medium font-body
                          text-slate-300 hover:text-white hover:bg-white/5
                          transition-colors duration-200 <?= active_page('/') ?>"
                   role="menuitem">
                    Home
                </a>

                <!-- About -->
                <a href="<?= e(page_url('/about')) ?>"
                   class="nav-link px-4 py-2 rounded-lg text-sm font-medium font-body
                          text-slate-300 hover:text-white hover:bg-white/5
                          transition-colors duration-200 <?= active_page('/about') ?>"
                   role="menuitem">
                    About
                </a>

                <!-- Companies (dropdown) -->
                <div class="relative" x-data="{ open: false }">
                    <button type="button"
                            class="nav-link group inline-flex items-center gap-1 px-4 py-2 rounded-lg
                                   text-sm font-medium font-body text-slate-300
                                   hover:text-white hover:bg-white/5
                                   transition-colors duration-200 <?= active_page('/companies') ?>"
                            role="menuitem"
                            aria-haspopup="true"
                            aria-expanded="false"
                            id="companies-menu-btn"
                            onclick="var dd=document.getElementById('companies-dropdown');
                                     dd.classList.toggle('hidden');
                                     this.setAttribute('aria-expanded', dd.classList.contains('hidden')?'false':'true')">
                        Companies
                        <!-- Chevron icon -->
                        <svg class="h-4 w-4 text-slate-400 group-hover:text-white transition-transform duration-200"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <!-- Dropdown panel -->
                    <div id="companies-dropdown"
                         class="hidden absolute left-0 top-full mt-2 w-56 origin-top-left
                                rounded-xl border border-brand-border bg-navy-light/95
                                backdrop-blur-xl shadow-xl animate-slide-down"
                         role="menu"
                         aria-labelledby="companies-menu-btn">
                        <div class="p-2 space-y-1">
                            <a href="<?= e(page_url('/companies/idle')) ?>"
                               class="flex items-center gap-3 rounded-lg px-3 py-2.5
                                      text-sm text-slate-300 hover:text-white hover:bg-white/5
                                      transition-colors duration-150"
                               role="menuitem">
                                <span class="inline-flex h-8 w-8 items-center justify-center rounded-md
                                             bg-electric/10 text-electric text-xs font-bold" aria-hidden="true">ID</span>
                                <div>
                                    <div class="font-medium font-body">IDLE</div>
                                    <div class="text-xs text-slate-500">Software &amp; Platforms</div>
                                </div>
                            </a>
                            <a href="<?= e(page_url('/companies/rift')) ?>"
                               class="flex items-center gap-3 rounded-lg px-3 py-2.5
                                      text-sm text-slate-300 hover:text-white hover:bg-white/5
                                      transition-colors duration-150"
                               role="menuitem">
                                <span class="inline-flex h-8 w-8 items-center justify-center rounded-md
                                             bg-purple/10 text-purple text-xs font-bold" aria-hidden="true">RF</span>
                                <div>
                                    <div class="font-medium font-body">RIFT</div>
                                    <div class="text-xs text-slate-500">Research &amp; Development</div>
                                </div>
                            </a>
                            <a href="<?= e(page_url('/companies/bulletproof')) ?>"
                               class="flex items-center gap-3 rounded-lg px-3 py-2.5
                                      text-sm text-slate-300 hover:text-white hover:bg-white/5
                                      transition-colors duration-150"
                               role="menuitem">
                                <span class="inline-flex h-8 w-8 items-center justify-center rounded-md
                                             bg-green-500/10 text-green-400 text-xs font-bold" aria-hidden="true">BP</span>
                                <div>
                                    <div class="font-medium font-body">BulletPROOF</div>
                                    <div class="text-xs text-slate-500">Security &amp; Infrastructure</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div><!-- /Companies dropdown -->

                <!-- Research -->
                <a href="<?= e(page_url('/research')) ?>"
                   class="nav-link px-4 py-2 rounded-lg text-sm font-medium font-body
                          text-slate-300 hover:text-white hover:bg-white/5
                          transition-colors duration-200 <?= active_page('/research') ?>"
                   role="menuitem">
                    Research
                </a>

                <!-- Blog -->
                <a href="<?= e(page_url('/blog')) ?>"
                   class="nav-link px-4 py-2 rounded-lg text-sm font-medium font-body
                          text-slate-300 hover:text-white hover:bg-white/5
                          transition-colors duration-200 <?= active_page('/blog') ?>"
                   role="menuitem">
                    Blog
                </a>

                <!-- Contact -->
                <a href="<?= e(page_url('/contact')) ?>"
                   class="nav-link px-4 py-2 rounded-lg text-sm font-medium font-body
                          text-slate-300 hover:text-white hover:bg-white/5
                          transition-colors duration-200 <?= active_page('/contact') ?>"
                   role="menuitem">
                    Contact
                </a>
            </div><!-- /Desktop Navigation -->

            <!-- ── Right-side controls ───────────────────────────────── -->
            <div class="flex items-center gap-2 sm:gap-3">

                <!-- Language selector (placeholder) -->
                <div class="relative hidden md:block">
                    <button type="button"
                            id="lang-selector-btn"
                            class="inline-flex items-center gap-1.5 rounded-lg px-3 py-2
                                   text-xs font-medium text-slate-400 hover:text-white
                                   hover:bg-white/5 border border-transparent
                                   hover:border-brand-border transition-all duration-200"
                            aria-label="Select language"
                            aria-haspopup="true"
                            aria-expanded="false"
                            onclick="document.getElementById('lang-dropdown').classList.toggle('hidden')">
                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5a17.92 17.92 0 01-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418"/>
                        </svg>
                        EN
                    </button>
                    <!-- Language dropdown -->
                    <div id="lang-dropdown"
                         class="hidden absolute right-0 top-full mt-2 w-44 rounded-xl border
                                border-brand-border bg-navy-light/95 backdrop-blur-xl shadow-xl
                                animate-slide-down z-50"
                         role="menu"
                         aria-labelledby="lang-selector-btn">
                        <div class="p-2 space-y-1">
                            <span class="flex items-center gap-2 rounded-lg px-3 py-2 text-sm
                                        text-white bg-white/5 font-medium cursor-default"
                                  role="menuitem" aria-current="true">
                                🇺🇸 English
                            </span>
                            <span class="flex items-center gap-2 rounded-lg px-3 py-2 text-sm
                                        text-slate-500 cursor-not-allowed"
                                  role="menuitem" aria-disabled="true">
                                🇪🇸 Español <span class="ml-auto text-xs text-slate-600">coming soon</span>
                            </span>
                            <span class="flex items-center gap-2 rounded-lg px-3 py-2 text-sm
                                        text-slate-500 cursor-not-allowed"
                                  role="menuitem" aria-disabled="true">
                                🇫🇷 Français <span class="ml-auto text-xs text-slate-600">coming soon</span>
                            </span>
                            <span class="flex items-center gap-2 rounded-lg px-3 py-2 text-sm
                                        text-slate-500 cursor-not-allowed"
                                  role="menuitem" aria-disabled="true">
                                🇯🇵 日本語 <span class="ml-auto text-xs text-slate-600">coming soon</span>
                            </span>
                        </div>
                    </div>
                </div><!-- /Language selector -->

                <!-- Dark mode toggle -->
                <button type="button"
                        id="theme-toggle"
                        class="relative inline-flex h-9 w-9 items-center justify-center rounded-lg
                               text-slate-400 hover:text-white hover:bg-white/5
                               border border-transparent hover:border-brand-border
                               transition-all duration-200"
                        aria-label="Toggle dark mode"
                        title="Toggle dark mode">
                    <!-- Sun icon (shown in dark mode) -->
                    <svg class="h-5 w-5 dark:hidden" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"/>
                    </svg>
                    <!-- Moon icon (shown in light mode) -->
                    <svg class="hidden h-5 w-5 dark:block" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"/>
                    </svg>
                </button>

                <!-- CTA — Get in Touch -->
                <a href="<?= e(page_url('/contact')) ?>"
                   class="hidden sm:inline-flex items-center gap-2 rounded-full px-5 py-2
                          bg-gradient-to-r from-electric to-purple text-white text-sm
                          font-semibold font-body shadow-lg shadow-electric/25
                          hover:shadow-xl hover:shadow-electric/30 hover:scale-105
                          active:scale-95 transition-all duration-200"
                   aria-label="Get in Touch">
                    Get in Touch
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                    </svg>
                </a>

                <!-- Mobile menu toggle -->
                <button type="button"
                        id="mobile-menu-btn"
                        class="lg:hidden inline-flex h-10 w-10 items-center justify-center
                               rounded-lg text-slate-300 hover:text-white hover:bg-white/5
                               transition-colors duration-200"
                        aria-label="Open navigation menu"
                        aria-expanded="false"
                        aria-controls="mobile-menu-panel"
                        onclick="document.getElementById('mobile-menu-panel').classList.toggle('translate-x-full');
                                 this.setAttribute('aria-expanded', this.getAttribute('aria-expanded')==='false'?'true':'false');">
                    <!-- Hamburger icon -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                    </svg>
                </button>

            </div><!-- /Right-side controls -->
        </div>
    </nav>
</header>

<!-- ====================================================================
     MOBILE MENU — Slide-out Panel
     ==================================================================== -->
<div id="mobile-menu-panel"
     class="fixed inset-y-0 right-0 z-[60] w-full max-w-sm transform translate-x-full
            transition-transform duration-300 ease-in-out lg:hidden"
     role="dialog"
     aria-modal="true"
     aria-label="Mobile navigation">

    <!-- Backdrop -->
    <div class="absolute inset-0 -left-full w-[200vw] bg-black/60 backdrop-blur-sm"
         onclick="document.getElementById('mobile-menu-panel').classList.add('translate-x-full');
                  document.getElementById('mobile-menu-btn').setAttribute('aria-expanded','false');"
         aria-hidden="true"></div>

    <!-- Panel content -->
    <div class="relative h-full overflow-y-auto bg-navy border-l border-brand-border
                shadow-2xl flex flex-col">

        <!-- Panel header -->
        <div class="flex items-center justify-between px-6 py-5 border-b border-brand-border">
            <span class="text-white font-heading text-lg">Menu</span>
            <button type="button"
                    class="inline-flex h-9 w-9 items-center justify-center rounded-lg
                           text-slate-400 hover:text-white hover:bg-white/5
                           transition-colors duration-200"
                    aria-label="Close navigation menu"
                    onclick="document.getElementById('mobile-menu-panel').classList.add('translate-x-full');
                             document.getElementById('mobile-menu-btn').setAttribute('aria-expanded','false');">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Mobile nav links -->
        <nav class="flex-1 px-4 py-6 space-y-1" aria-label="Mobile navigation">
            <a href="<?= e(page_url('/')) ?>"
               class="block rounded-lg px-4 py-3 text-base font-medium font-body
                      text-slate-300 hover:text-white hover:bg-white/5
                      transition-colors duration-150 <?= active_page('/') ?>">
                Home
            </a>
            <a href="<?= e(page_url('/about')) ?>"
               class="block rounded-lg px-4 py-3 text-base font-medium font-body
                      text-slate-300 hover:text-white hover:bg-white/5
                      transition-colors duration-150 <?= active_page('/about') ?>">
                About
            </a>

            <!-- Companies (mobile accordion) -->
            <div>
                <button type="button"
                        class="flex w-full items-center justify-between rounded-lg px-4 py-3
                               text-base font-medium font-body text-slate-300
                               hover:text-white hover:bg-white/5 transition-colors duration-150"
                        aria-expanded="false"
                        onclick="var sub=document.getElementById('mobile-companies-sub');
                                 sub.classList.toggle('hidden');
                                 this.setAttribute('aria-expanded', sub.classList.contains('hidden')?'false':'true');">
                    Companies
                    <svg class="h-4 w-4 text-slate-500 transition-transform duration-200"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div id="mobile-companies-sub" class="hidden pl-4 space-y-1 mt-1">
                    <a href="<?= e(page_url('/companies/idle')) ?>"
                       class="block rounded-lg px-4 py-2.5 text-sm text-slate-400
                              hover:text-white hover:bg-white/5 transition-colors duration-150">
                        IDLE
                    </a>
                    <a href="<?= e(page_url('/companies/rift')) ?>"
                       class="block rounded-lg px-4 py-2.5 text-sm text-slate-400
                              hover:text-white hover:bg-white/5 transition-colors duration-150">
                        RIFT
                    </a>
                    <a href="<?= e(page_url('/companies/bulletproof')) ?>"
                       class="block rounded-lg px-4 py-2.5 text-sm text-slate-400
                              hover:text-white hover:bg-white/5 transition-colors duration-150">
                        BulletPROOF
                    </a>
                </div>
            </div>

            <a href="<?= e(page_url('/research')) ?>"
               class="block rounded-lg px-4 py-3 text-base font-medium font-body
                      text-slate-300 hover:text-white hover:bg-white/5
                      transition-colors duration-150 <?= active_page('/research') ?>">
                Research
            </a>
            <a href="<?= e(page_url('/blog')) ?>"
               class="block rounded-lg px-4 py-3 text-base font-medium font-body
                      text-slate-300 hover:text-white hover:bg-white/5
                      transition-colors duration-150 <?= active_page('/blog') ?>">
                Blog
            </a>
            <a href="<?= e(page_url('/contact')) ?>"
               class="block rounded-lg px-4 py-3 text-base font-medium font-body
                      text-slate-300 hover:text-white hover:bg-white/5
                      transition-colors duration-150 <?= active_page('/contact') ?>">
                Contact
            </a>
        </nav>

        <!-- Mobile CTA -->
        <div class="px-4 pb-6">
            <a href="<?= e(page_url('/contact')) ?>"
               class="flex w-full items-center justify-center gap-2 rounded-full px-6 py-3
                      bg-gradient-to-r from-electric to-purple text-white text-sm
                      font-semibold font-body shadow-lg shadow-electric/25
                      hover:shadow-xl transition-all duration-200">
                Get in Touch
                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                </svg>
            </a>
        </div>
    </div>
</div><!-- /Mobile menu panel -->

<!-- ====================================================================
     COOKIE CONSENT BANNER
     Initially hidden — shown via JS when no consent cookie is found.
     ==================================================================== -->
<div id="cookie-consent-banner"
     class="fixed bottom-0 left-0 right-0 z-[70] transform translate-y-full
            transition-transform duration-500 ease-out"
     role="dialog"
     aria-modal="false"
     aria-label="Cookie consent"
     aria-describedby="cookie-consent-text"
     style="display:none;">

    <div class="mx-auto max-w-5xl px-4 pb-4 sm:px-6">
        <div class="rounded-2xl border border-brand-border bg-navy/95 backdrop-blur-xl
                    shadow-2xl p-6 sm:flex sm:items-start sm:gap-6">

            <!-- Icon -->
            <div class="hidden sm:flex flex-shrink-0 h-10 w-10 items-center justify-center
                        rounded-full bg-electric/10 text-electric" aria-hidden="true">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
                </svg>
            </div>

            <!-- Text -->
            <div class="flex-1">
                <h3 class="text-white font-heading text-lg mb-1">We value your privacy</h3>
                <p id="cookie-consent-text" class="text-sm text-slate-400 font-body leading-relaxed">
                    We use cookies and similar technologies to improve your experience, analyse
                    traffic, and personalise content. You can choose which categories to allow.
                    Read our <a href="<?= e(page_url('/privacy')) ?>" class="underline text-electric hover:text-electric-light transition-colors">Privacy&nbsp;Policy</a>.
                </p>
            </div>

            <!-- Actions -->
            <div class="mt-4 sm:mt-0 flex flex-col sm:flex-row gap-2 flex-shrink-0">
                <button type="button"
                        id="cookie-accept-all"
                        class="rounded-full px-5 py-2.5 bg-electric text-white text-sm
                               font-semibold font-body hover:bg-electric-hover
                               transition-colors duration-200">
                    Accept All
                </button>
                <button type="button"
                        id="cookie-reject-nonessential"
                        class="rounded-full px-5 py-2.5 border border-brand-border
                               text-slate-300 text-sm font-medium font-body
                               hover:bg-white/5 transition-colors duration-200">
                    Essential Only
                </button>
                <button type="button"
                        id="cookie-manage-prefs"
                        class="rounded-full px-5 py-2.5 text-slate-400 text-sm font-body
                               hover:text-white transition-colors duration-200">
                    Manage
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Cookie consent initialisation script -->
<script>
(function(){
    var banner = document.getElementById('cookie-consent-banner');
    if (!banner) return;
    // Show banner if no consent cookie exists
    if (!document.cookie.match(/(?:^|;\s*)cookie_consent=/)) {
        banner.style.display = '';
        requestAnimationFrame(function(){
            requestAnimationFrame(function(){
                banner.classList.remove('translate-y-full');
            });
        });
    }
    function hideBanner() {
        banner.classList.add('translate-y-full');
        setTimeout(function(){ banner.style.display = 'none'; }, 500);
    }
    function setConsent(prefs) {
        var val = encodeURIComponent(JSON.stringify(prefs));
        document.cookie = 'cookie_consent=' + val + ';path=/;max-age=31536000;SameSite=Lax;Secure';
        window.dispatchEvent(new CustomEvent('cookie-consent-updated', { detail: prefs }));
        hideBanner();
    }
    document.getElementById('cookie-accept-all').addEventListener('click', function(){
        setConsent({ essential: true, analytics: true, marketing: true });
    });
    document.getElementById('cookie-reject-nonessential').addEventListener('click', function(){
        setConsent({ essential: true, analytics: false, marketing: false });
    });
    document.getElementById('cookie-manage-prefs').addEventListener('click', function(){
        /* Placeholder: open preferences modal */
        setConsent({ essential: true, analytics: false, marketing: false });
    });
})();
</script>

<!-- ====================================================================
     FLOATING SUPPORT CHAT TRIGGER BUTTON
     ==================================================================== -->
<button type="button"
        id="support-chat-trigger"
        class="fixed bottom-6 right-6 z-[55] inline-flex h-14 w-14 items-center
               justify-center rounded-full bg-gradient-to-br from-electric to-purple
               text-white shadow-xl shadow-electric/30 hover:shadow-2xl
               hover:shadow-electric/40 hover:scale-110 active:scale-95
               transition-all duration-300 group"
        aria-label="Open support chat"
        title="Chat with us"
        onclick="document.getElementById('support-chat-widget').classList.toggle('hidden');">
    <!-- Chat icon -->
    <svg class="h-6 w-6 group-hover:scale-110 transition-transform duration-200"
         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
         stroke-width="1.5" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 011.037-.443h.166c3.413 0 6.471-1.814 6.471-4.481 0-2.667-3.058-4.481-6.471-4.481H9.529c-3.413 0-6.471 1.814-6.471 4.481 0 .803.312 1.56.868 2.193z"/>
    </svg>
    <!-- Notification dot (hidden by default) -->
    <span class="absolute -top-1 -right-1 h-4 w-4 rounded-full bg-red-500 border-2
                 border-navy text-[10px] font-bold text-white flex items-center justify-center
                 hidden"
          id="chat-notification-dot"
          aria-hidden="true">1</span>
</button>

<!-- Header spacer — push content below the fixed header -->
<div class="h-16 lg:h-20" aria-hidden="true"></div>

<!-- Close dropdowns when clicking outside -->
<script>
document.addEventListener('click', function(e) {
    // Companies dropdown
    var compBtn = document.getElementById('companies-menu-btn');
    var compDrop = document.getElementById('companies-dropdown');
    if (compBtn && compDrop && !compBtn.contains(e.target) && !compDrop.contains(e.target)) {
        compDrop.classList.add('hidden');
    }
    // Language dropdown
    var langBtn = document.getElementById('lang-selector-btn');
    var langDrop = document.getElementById('lang-dropdown');
    if (langBtn && langDrop && !langBtn.contains(e.target) && !langDrop.contains(e.target)) {
        langDrop.classList.add('hidden');
    }
});
</script>
