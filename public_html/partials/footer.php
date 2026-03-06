<?php
/**
 * Footer Partial — Astroyds
 *
 * Multi-column footer with:
 *   - Logo, tagline & social links
 *   - Quick Links, Companies, Legal columns
 *   - Newsletter signup form
 *   - Copyright bar with dynamic year
 *   - Back-to-top button
 *   - Support chat widget window
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

$base_url     = defined('SITE_URL') ? SITE_URL : 'https://astroyds.com';
$current_year = date('Y');
?>
<!-- ====================================================================
     SITE FOOTER
     ==================================================================== -->
<footer id="site-footer"
        role="contentinfo"
        class="relative bg-navy border-t border-brand-border mt-auto">

    <!-- ── Decorative top gradient line ──────────────────────────────── -->
    <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-electric/50 to-transparent"
         aria-hidden="true"></div>

    <!-- ── Main footer grid ──────────────────────────────────────────── -->
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-16 pb-8">
        <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-5 lg:gap-8">

            <!-- Column 1 — Brand & Social ────────────────────────────── -->
            <div class="sm:col-span-2 lg:col-span-1">
                <!-- Logo -->
                <a href="<?= e(page_url('/')) ?>" class="group inline-flex items-center gap-3" aria-label="Astroyds — Home">
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-lg
                                 bg-gradient-to-br from-electric to-purple text-white
                                 font-heading font-bold text-lg shadow-glow-blue
                                 group-hover:shadow-glow-purple transition-shadow duration-300"
                          aria-hidden="true">A</span>
                    <span class="text-white font-heading text-xl tracking-wide
                                 group-hover:text-electric-light transition-colors duration-200">
                        Astroyds
                    </span>
                </a>

                <!-- Tagline -->
                <p class="mt-4 text-sm text-slate-400 font-body leading-relaxed max-w-xs">
                    Moving humanity forward for a better future.
                </p>

                <!-- Social links -->
                <div class="mt-6 flex items-center gap-3" aria-label="Social media links">
                    <!-- Twitter / X -->
                    <a href="https://twitter.com/astroyds"
                       class="inline-flex h-9 w-9 items-center justify-center rounded-lg
                              text-slate-500 hover:text-white hover:bg-white/5
                              border border-transparent hover:border-brand-border
                              transition-all duration-200"
                       aria-label="Follow Astroyds on Twitter"
                       target="_blank" rel="noopener noreferrer">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                        </svg>
                    </a>
                    <!-- LinkedIn -->
                    <a href="https://linkedin.com/company/astroyds"
                       class="inline-flex h-9 w-9 items-center justify-center rounded-lg
                              text-slate-500 hover:text-white hover:bg-white/5
                              border border-transparent hover:border-brand-border
                              transition-all duration-200"
                       aria-label="Follow Astroyds on LinkedIn"
                       target="_blank" rel="noopener noreferrer">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                    <!-- GitHub -->
                    <a href="https://github.com/astroyds"
                       class="inline-flex h-9 w-9 items-center justify-center rounded-lg
                              text-slate-500 hover:text-white hover:bg-white/5
                              border border-transparent hover:border-brand-border
                              transition-all duration-200"
                       aria-label="Astroyds on GitHub"
                       target="_blank" rel="noopener noreferrer">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844a9.59 9.59 0 012.504.337c1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/>
                        </svg>
                    </a>
                    <!-- Instagram -->
                    <a href="https://instagram.com/astroyds"
                       class="inline-flex h-9 w-9 items-center justify-center rounded-lg
                              text-slate-500 hover:text-white hover:bg-white/5
                              border border-transparent hover:border-brand-border
                              transition-all duration-200"
                       aria-label="Follow Astroyds on Instagram"
                       target="_blank" rel="noopener noreferrer">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"/>
                        </svg>
                    </a>
                </div>
            </div><!-- /Column 1 -->

            <!-- Column 2 — Quick Links ───────────────────────────────── -->
            <div>
                <h3 class="text-white font-heading text-sm uppercase tracking-widest mb-4">
                    Quick Links
                </h3>
                <ul class="space-y-3" role="list">
                    <li><a href="<?= e(page_url('/')) ?>"
                           class="text-sm text-slate-400 hover:text-white font-body transition-colors duration-200">Home</a></li>
                    <li><a href="<?= e(page_url('/about')) ?>"
                           class="text-sm text-slate-400 hover:text-white font-body transition-colors duration-200">About</a></li>
                    <li><a href="<?= e(page_url('/companies')) ?>"
                           class="text-sm text-slate-400 hover:text-white font-body transition-colors duration-200">Companies</a></li>
                    <li><a href="<?= e(page_url('/research')) ?>"
                           class="text-sm text-slate-400 hover:text-white font-body transition-colors duration-200">Research</a></li>
                    <li><a href="<?= e(page_url('/blog')) ?>"
                           class="text-sm text-slate-400 hover:text-white font-body transition-colors duration-200">Blog</a></li>
                    <li><a href="<?= e(page_url('/contact')) ?>"
                           class="text-sm text-slate-400 hover:text-white font-body transition-colors duration-200">Contact</a></li>
                </ul>
            </div><!-- /Column 2 -->

            <!-- Column 3 — Companies ─────────────────────────────────── -->
            <div>
                <h3 class="text-white font-heading text-sm uppercase tracking-widest mb-4">
                    Companies
                </h3>
                <ul class="space-y-3" role="list">
                    <li>
                        <a href="<?= e(page_url('/companies/idle')) ?>"
                           class="group flex items-center gap-2 text-sm text-slate-400 hover:text-white
                                  font-body transition-colors duration-200">
                            <span class="inline-block h-1.5 w-1.5 rounded-full bg-electric
                                         group-hover:shadow-glow-blue transition-shadow duration-200"
                                  aria-hidden="true"></span>
                            IDLE
                        </a>
                    </li>
                    <li>
                        <a href="<?= e(page_url('/companies/rift')) ?>"
                           class="group flex items-center gap-2 text-sm text-slate-400 hover:text-white
                                  font-body transition-colors duration-200">
                            <span class="inline-block h-1.5 w-1.5 rounded-full bg-purple
                                         group-hover:shadow-glow-purple transition-shadow duration-200"
                                  aria-hidden="true"></span>
                            RIFT
                        </a>
                    </li>
                    <li>
                        <a href="<?= e(page_url('/companies/bulletproof')) ?>"
                           class="group flex items-center gap-2 text-sm text-slate-400 hover:text-white
                                  font-body transition-colors duration-200">
                            <span class="inline-block h-1.5 w-1.5 rounded-full bg-green-400
                                         group-hover:shadow-[0_0_12px_rgba(74,222,128,0.3)] transition-shadow duration-200"
                                  aria-hidden="true"></span>
                            BulletPROOF
                        </a>
                    </li>
                </ul>

                <!-- Mission statement -->
                <p class="mt-6 text-xs text-slate-500 font-body italic leading-relaxed">
                    "Building the future, so you don't have to."
                </p>
            </div><!-- /Column 3 -->

            <!-- Column 4 — Legal ─────────────────────────────────────── -->
            <div>
                <h3 class="text-white font-heading text-sm uppercase tracking-widest mb-4">
                    Legal
                </h3>
                <ul class="space-y-3" role="list">
                    <li><a href="<?= e(page_url('/privacy')) ?>"
                           class="text-sm text-slate-400 hover:text-white font-body transition-colors duration-200">Privacy Policy</a></li>
                    <li><a href="<?= e(page_url('/terms')) ?>"
                           class="text-sm text-slate-400 hover:text-white font-body transition-colors duration-200">Terms of Service</a></li>
                    <li><a href="<?= e(page_url('/safety')) ?>"
                           class="text-sm text-slate-400 hover:text-white font-body transition-colors duration-200">Safety</a></li>
                    <li>
                        <button type="button"
                                id="footer-cookie-prefs-btn"
                                class="text-sm text-slate-400 hover:text-white font-body
                                       transition-colors duration-200 cursor-pointer"
                                aria-label="Open cookie preferences"
                                onclick="var banner=document.getElementById('cookie-consent-banner');
                                         if(banner){banner.style.display='';
                                         requestAnimationFrame(function(){requestAnimationFrame(function(){
                                         banner.classList.remove('translate-y-full');});});}">
                            Cookie Preferences
                        </button>
                    </li>
                </ul>
            </div><!-- /Column 4 -->

            <!-- Column 5 — Newsletter ────────────────────────────────── -->
            <div class="sm:col-span-2 lg:col-span-1">
                <h3 class="text-white font-heading text-sm uppercase tracking-widest mb-4">
                    Stay Updated
                </h3>
                <p class="text-sm text-slate-400 font-body mb-4 leading-relaxed">
                    Get the latest from Astroyds — news, launches, and insights delivered to your inbox.
                </p>
                <form id="newsletter-form"
                      class="flex flex-col gap-3"
                      aria-label="Newsletter signup"
                      onsubmit="event.preventDefault();
                                var em=this.querySelector('input[type=email]');
                                if(em&&em.value){
                                    this.querySelector('.newsletter-success').classList.remove('hidden');
                                    em.value='';
                                }">
                    <div class="flex">
                        <label for="newsletter-email" class="sr-only">Email address</label>
                        <input type="email"
                               id="newsletter-email"
                               name="email"
                               required
                               placeholder="you@example.com"
                               autocomplete="email"
                               class="flex-1 min-w-0 rounded-l-lg border border-brand-border
                                      bg-white/5 px-4 py-2.5 text-sm text-white font-body
                                      placeholder:text-slate-500 focus:outline-none focus:ring-2
                                      focus:ring-electric/50 focus:border-electric
                                      transition-colors duration-200">
                        <button type="submit"
                                class="rounded-r-lg bg-electric px-4 py-2.5 text-sm font-semibold
                                       text-white font-body hover:bg-electric-hover
                                       transition-colors duration-200"
                                aria-label="Subscribe to newsletter">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                            </svg>
                        </button>
                    </div>
                    <!-- Success message (hidden by default) -->
                    <p class="newsletter-success hidden text-xs text-green-400 font-body">
                        ✓ Thanks for subscribing! Check your inbox to confirm.
                    </p>
                    <p class="text-xs text-slate-500 font-body">
                        No spam, ever. Unsubscribe anytime.
                    </p>
                </form>
            </div><!-- /Column 5 -->

        </div><!-- /Grid -->
    </div><!-- /Main footer content -->

    <!-- ── Bottom bar ────────────────────────────────────────────────── -->
    <div class="border-t border-brand-border">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-6
                    flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-xs text-slate-500 font-body text-center sm:text-left">
                &copy; <?= e($current_year) ?> Astroyds. All rights reserved. &middot; Maple Grove, Minnesota
            </p>
            <div class="flex items-center gap-4">
                <a href="<?= e(page_url('/sitemap.xml')) ?>"
                   class="text-xs text-slate-500 hover:text-slate-300 font-body transition-colors duration-200">
                    Sitemap
                </a>
                <a href="<?= e(page_url('/accessibility')) ?>"
                   class="text-xs text-slate-500 hover:text-slate-300 font-body transition-colors duration-200">
                    Accessibility
                </a>
                <a href="mailto:<?= e(defined('SITE_EMAIL') ? SITE_EMAIL : 'letstalk@astroyds.com') ?>"
                   class="text-xs text-slate-500 hover:text-slate-300 font-body transition-colors duration-200">
                    <?= e(defined('SITE_EMAIL') ? SITE_EMAIL : 'letstalk@astroyds.com') ?>
                </a>
            </div>
        </div>
    </div><!-- /Bottom bar -->

    <!-- ── Back-to-top button ────────────────────────────────────────── -->
    <button type="button"
            id="back-to-top"
            class="fixed bottom-6 right-24 z-50 inline-flex h-10 w-10 items-center
                   justify-center rounded-full border border-brand-border bg-navy/90
                   backdrop-blur-sm text-slate-400 hover:text-white hover:bg-white/10
                   shadow-lg opacity-0 translate-y-4 pointer-events-none
                   transition-all duration-300"
            aria-label="Scroll back to top"
            title="Back to top">
        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5"/>
        </svg>
    </button>

    <!-- Back-to-top visibility logic -->
    <script>
    (function(){
        var btn = document.getElementById('back-to-top');
        if (!btn) return;
        var shown = false;
        function toggle() {
            var shouldShow = window.scrollY > 400;
            if (shouldShow === shown) return;
            shown = shouldShow;
            if (shouldShow) {
                btn.classList.remove('opacity-0','translate-y-4','pointer-events-none');
                btn.classList.add('opacity-100','translate-y-0','pointer-events-auto');
            } else {
                btn.classList.add('opacity-0','translate-y-4','pointer-events-none');
                btn.classList.remove('opacity-100','translate-y-0','pointer-events-auto');
            }
        }
        window.addEventListener('scroll', toggle, { passive: true });
        btn.addEventListener('click', function(){
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    })();
    </script>
</footer>

<!-- ====================================================================
     SUPPORT CHAT WIDGET — Floating window
     Toggled by #support-chat-trigger in header.php
     ==================================================================== -->
<div id="support-chat-widget"
     class="hidden fixed bottom-24 right-6 z-[56] w-80 sm:w-96
            rounded-2xl border border-brand-border bg-navy/95 backdrop-blur-xl
            shadow-2xl overflow-hidden animate-fade-in-up"
     role="dialog"
     aria-modal="false"
     aria-label="Support chat">

    <!-- Chat header -->
    <div class="flex items-center justify-between px-5 py-4 border-b border-brand-border
                bg-gradient-to-r from-electric/10 to-purple/10">
        <div class="flex items-center gap-3">
            <span class="inline-flex h-8 w-8 items-center justify-center rounded-full
                         bg-gradient-to-br from-electric to-purple text-white text-xs font-bold"
                  aria-hidden="true">A</span>
            <div>
                <h4 class="text-white text-sm font-semibold font-body">Astroyds Support</h4>
                <p class="text-xs text-slate-400 font-body flex items-center gap-1">
                    <span class="inline-block h-1.5 w-1.5 rounded-full bg-green-400" aria-hidden="true"></span>
                    Online
                </p>
            </div>
        </div>
        <button type="button"
                class="inline-flex h-7 w-7 items-center justify-center rounded-md
                       text-slate-400 hover:text-white hover:bg-white/10
                       transition-colors duration-200"
                aria-label="Close support chat"
                onclick="document.getElementById('support-chat-widget').classList.add('hidden');">
            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- Chat messages area -->
    <div id="chat-messages"
         class="h-64 overflow-y-auto px-5 py-4 space-y-4 scrollbar-thin scrollbar-thumb-white/10"
         aria-live="polite">
        <!-- Automated greeting -->
        <div class="flex gap-3">
            <span class="flex-shrink-0 inline-flex h-7 w-7 items-center justify-center rounded-full
                         bg-electric/20 text-electric text-xs font-bold mt-0.5"
                  aria-hidden="true">A</span>
            <div class="rounded-xl rounded-tl-none bg-white/5 border border-brand-border
                        px-4 py-3 max-w-[80%]">
                <p class="text-sm text-slate-300 font-body leading-relaxed">
                    Hi there! 👋 Welcome to Astroyds. How can we help you today?
                </p>
                <time class="block mt-1 text-[10px] text-slate-500 font-body">Just now</time>
            </div>
        </div>
    </div>

    <!-- Chat input -->
    <div class="border-t border-brand-border px-4 py-3">
        <form id="chat-form"
              class="flex items-center gap-2"
              aria-label="Send a message"
              onsubmit="event.preventDefault();
                        var inp=this.querySelector('input');
                        if(inp&&inp.value.trim()){
                            var area=document.getElementById('chat-messages');
                            var msg=document.createElement('div');
                            msg.className='flex justify-end';
                            msg.innerHTML='<div class=&quot;rounded-xl rounded-tr-none bg-electric/20 border border-electric/20 px-4 py-3 max-w-[80%]&quot;><p class=&quot;text-sm text-white font-body&quot;>'+inp.value.replace(/</g,'&lt;')+'</p></div>';
                            area.appendChild(msg);
                            area.scrollTop=area.scrollHeight;
                            inp.value='';
                        }">
            <label for="chat-input" class="sr-only">Type your message</label>
            <input type="text"
                   id="chat-input"
                   name="message"
                   placeholder="Type a message…"
                   autocomplete="off"
                   class="flex-1 min-w-0 rounded-lg bg-white/5 border border-brand-border
                          px-3 py-2 text-sm text-white font-body placeholder:text-slate-500
                          focus:outline-none focus:ring-1 focus:ring-electric/50
                          transition-colors duration-200">
            <button type="submit"
                    class="inline-flex h-9 w-9 items-center justify-center rounded-lg
                           bg-electric text-white hover:bg-electric-hover
                           transition-colors duration-200"
                    aria-label="Send message">
                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/>
                </svg>
            </button>
        </form>
    </div>
</div><!-- /Support chat widget -->
