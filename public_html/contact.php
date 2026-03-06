<?php
require_once __DIR__ . '/src/php/config.php';
require_once __DIR__ . '/src/php/headers.php';
require_once __DIR__ . '/src/php/template_helpers.php';
require_once __DIR__ . '/src/php/csrf.php';

send_security_headers();

$page_title       = 'Contact';
$page_description = 'Get in touch with Astroyds — reach out for partnerships, inquiries, or just to say hello. We\'d love to hear from you.';
$page_url         = page_url('/contact');
$page_image       = page_url('/assets/images/og-contact.png');
?>
<!-- DRAFT COPY -->
<?php include __DIR__ . '/partials/meta.php'; ?>

<body class="bg-navy text-white font-body antialiased">
<?php include __DIR__ . '/partials/header.php'; ?>

<main id="main-content" class="flex-1">

    <!-- ═══════════════════════════════════════════════════════════
         HERO SECTION — Get in Touch
    ════════════════════════════════════════════════════════════ -->
    <section class="relative py-24 sm:py-32 overflow-hidden" aria-labelledby="contact-hero-heading">
        <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
            <div class="absolute top-1/4 -left-32 w-96 h-96 bg-electric/5 rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 -right-32 w-96 h-96 bg-purple/5 rounded-full blur-3xl"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-block text-electric text-sm font-semibold tracking-widest uppercase mb-4">Contact Us</span>
            <h1 id="contact-hero-heading" class="font-heading text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                Get in Touch
            </h1>
            <p class="text-gray-400 text-lg sm:text-xl leading-relaxed max-w-2xl mx-auto">
                Have a question, partnership idea, or just want to say hello?
                We&rsquo;d love to hear from you. Fill out the form below and our team will get back to you shortly.
            </p>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════
         CONTACT FORM + SIDEBAR — Two-column layout
    ════════════════════════════════════════════════════════════ -->
    <section class="relative py-16 sm:py-24 overflow-hidden" aria-labelledby="contact-form-heading">
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 lg:gap-16">

                <!-- ── Left Column: Contact Form ── -->
                <div class="lg:col-span-2">
                    <h2 id="contact-form-heading" class="font-heading text-2xl sm:text-3xl font-bold mb-8">
                        Send Us a Message
                    </h2>

                    <!-- Success / Error banners -->
                    <div id="contact-success" class="hidden mb-6 p-4 rounded-xl bg-green-500/10 border border-green-500/30 text-green-400" role="alert">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <p>Your message has been sent successfully! We&rsquo;ll get back to you soon.</p>
                        </div>
                    </div>

                    <div id="contact-error" class="hidden mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/30 text-red-400" role="alert">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            <p id="contact-error-msg">Something went wrong. Please try again later.</p>
                        </div>
                    </div>

                    <form id="contact-form" class="space-y-6" novalidate>
                        <?= csrf_field() ?>

                        <!-- Name -->
                        <div>
                            <label for="contact-name" class="block text-sm font-medium text-gray-300 mb-2">
                                Full Name <span class="text-electric">*</span>
                            </label>
                            <input
                                type="text"
                                id="contact-name"
                                name="name"
                                required
                                minlength="2"
                                maxlength="100"
                                autocomplete="name"
                                placeholder="Jane Doe"
                                class="w-full px-4 py-3 rounded-xl bg-brand-card border border-brand-border text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-electric focus:border-transparent transition-all duration-300"
                            >
                            <p class="mt-1 text-sm text-red-400 hidden" data-error="name">Please enter your full name.</p>
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="contact-email" class="block text-sm font-medium text-gray-300 mb-2">
                                Email Address <span class="text-electric">*</span>
                            </label>
                            <input
                                type="email"
                                id="contact-email"
                                name="email"
                                required
                                maxlength="255"
                                autocomplete="email"
                                placeholder="jane@example.com"
                                class="w-full px-4 py-3 rounded-xl bg-brand-card border border-brand-border text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-electric focus:border-transparent transition-all duration-300"
                            >
                            <p class="mt-1 text-sm text-red-400 hidden" data-error="email">Please enter a valid email address.</p>
                        </div>

                        <!-- Company & Role (side-by-side) -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Company -->
                            <div>
                                <label for="contact-company" class="block text-sm font-medium text-gray-300 mb-2">
                                    Company
                                </label>
                                <input
                                    type="text"
                                    id="contact-company"
                                    name="company"
                                    maxlength="150"
                                    autocomplete="organization"
                                    placeholder="Acme Inc."
                                    class="w-full px-4 py-3 rounded-xl bg-brand-card border border-brand-border text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-electric focus:border-transparent transition-all duration-300"
                                >
                            </div>

                            <!-- Role -->
                            <div>
                                <label for="contact-role" class="block text-sm font-medium text-gray-300 mb-2">
                                    Role
                                </label>
                                <input
                                    type="text"
                                    id="contact-role"
                                    name="role"
                                    maxlength="100"
                                    autocomplete="organization-title"
                                    placeholder="CTO"
                                    class="w-full px-4 py-3 rounded-xl bg-brand-card border border-brand-border text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-electric focus:border-transparent transition-all duration-300"
                                >
                            </div>
                        </div>

                        <!-- Message -->
                        <div>
                            <label for="contact-message" class="block text-sm font-medium text-gray-300 mb-2">
                                Message <span class="text-electric">*</span>
                            </label>
                            <textarea
                                id="contact-message"
                                name="message"
                                required
                                minlength="10"
                                maxlength="5000"
                                rows="6"
                                placeholder="Tell us about your project, question, or idea&hellip;"
                                class="w-full px-4 py-3 rounded-xl bg-brand-card border border-brand-border text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-electric focus:border-transparent transition-all duration-300 resize-y"
                            ></textarea>
                            <p class="mt-1 text-sm text-red-400 hidden" data-error="message">Please enter a message (at least 10 characters).</p>
                        </div>

                        <!-- Consent Checkbox -->
                        <div class="flex items-start gap-3">
                            <input
                                type="checkbox"
                                id="contact-consent"
                                name="consent"
                                required
                                class="mt-1 w-5 h-5 rounded bg-brand-card border-brand-border text-electric focus:ring-electric focus:ring-2 shrink-0"
                            >
                            <label for="contact-consent" class="text-sm text-gray-400 leading-relaxed">
                                I agree to the processing of my personal data in accordance with the
                                <a href="<?= e(page_url('/docs/privacy')) ?>" class="text-electric hover:text-white underline transition-colors duration-300">Privacy Policy</a>.
                                <span class="text-electric">*</span>
                            </label>
                        </div>
                        <p class="text-sm text-red-400 hidden -mt-4" data-error="consent">You must agree before submitting.</p>

                        <!-- Submit Button -->
                        <div>
                            <button
                                type="submit"
                                id="contact-submit"
                                class="inline-flex items-center justify-center gap-2 px-8 py-3 rounded-xl bg-electric text-navy font-semibold text-sm uppercase tracking-wider hover:bg-white focus:outline-none focus:ring-2 focus:ring-electric focus:ring-offset-2 focus:ring-offset-navy transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed"
                            >
                                <span id="contact-submit-text">Send Message</span>
                                <svg id="contact-submit-spinner" class="hidden w-5 h-5 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- ── Right Column: Info Sidebar ── -->
                <div class="lg:col-span-1 space-y-8">

                    <!-- Email -->
                    <div class="p-6 rounded-2xl bg-brand-card border border-brand-border">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 rounded-lg bg-electric/10 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-electric" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <h3 class="font-heading text-lg font-semibold">Email</h3>
                        </div>
                        <a href="mailto:letstalk@astroyds.com" class="text-electric hover:text-white transition-colors duration-300 break-all">
                            letstalk@astroyds.com
                        </a>
                    </div>

                    <!-- Location -->
                    <div class="p-6 rounded-2xl bg-brand-card border border-brand-border">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 rounded-lg bg-electric/10 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-electric" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <h3 class="font-heading text-lg font-semibold">Location</h3>
                        </div>
                        <p class="text-gray-400 leading-relaxed">
                            Maple Grove, MN 55311<br>
                            United States
                        </p>
                    </div>

                    <!-- Office Hours -->
                    <div class="p-6 rounded-2xl bg-brand-card border border-brand-border">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 rounded-lg bg-electric/10 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-electric" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <h3 class="font-heading text-lg font-semibold">Office Hours</h3>
                        </div>
                        <ul class="text-gray-400 space-y-1 text-sm">
                            <li class="flex justify-between"><span>Monday &ndash; Friday</span><span class="text-white">9 AM &ndash; 5 PM CST</span></li>
                            <li class="flex justify-between"><span>Saturday</span><span class="text-gray-500">Closed</span></li>
                            <li class="flex justify-between"><span>Sunday</span><span class="text-gray-500">Closed</span></li>
                        </ul>
                    </div>

                    <!-- Map Placeholder -->
                    <div class="rounded-2xl bg-brand-card border border-brand-border overflow-hidden">
                        <div class="w-full h-48 bg-gray-800 flex items-center justify-center" aria-label="Map placeholder">
                            <div class="text-center">
                                <svg class="w-10 h-10 text-gray-600 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                                </svg>
                                <p class="text-gray-500 text-xs">Map coming soon</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════
         FAQ SECTION
    ════════════════════════════════════════════════════════════ -->
    <section class="relative py-16 sm:py-24 overflow-hidden" aria-labelledby="faq-heading">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-electric/[0.02] to-transparent pointer-events-none" aria-hidden="true"></div>

        <div class="relative max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 sm:mb-16">
                <span class="inline-block text-electric text-sm font-semibold tracking-widest uppercase mb-4">FAQ</span>
                <h2 id="faq-heading" class="font-heading text-3xl sm:text-4xl font-bold">
                    Frequently Asked Questions
                </h2>
            </div>

            <div class="space-y-4">

                <!-- FAQ 1 -->
                <details class="group rounded-2xl bg-brand-card border border-brand-border overflow-hidden">
                    <summary class="flex items-center justify-between gap-4 px-6 py-5 cursor-pointer select-none list-none text-white font-medium hover:text-electric transition-colors duration-300">
                        <span>What is the best way to reach your team?</span>
                        <svg class="w-5 h-5 shrink-0 text-gray-500 group-open:rotate-180 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </summary>
                    <div class="px-6 pb-5 text-gray-400 leading-relaxed">
                        The fastest way to reach us is through this contact form or by emailing
                        <a href="mailto:letstalk@astroyds.com" class="text-electric hover:text-white transition-colors duration-300">letstalk@astroyds.com</a>.
                        We typically respond within one business day.
                    </div>
                </details>

                <!-- FAQ 2 -->
                <details class="group rounded-2xl bg-brand-card border border-brand-border overflow-hidden">
                    <summary class="flex items-center justify-between gap-4 px-6 py-5 cursor-pointer select-none list-none text-white font-medium hover:text-electric transition-colors duration-300">
                        <span>Do you accept partnership or collaboration requests?</span>
                        <svg class="w-5 h-5 shrink-0 text-gray-500 group-open:rotate-180 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </summary>
                    <div class="px-6 pb-5 text-gray-400 leading-relaxed">
                        Absolutely! We&rsquo;re always open to exploring partnerships that align with our mission
                        of moving humanity forward. Send us a message with details about your proposal and we&rsquo;ll
                        set up a conversation.
                    </div>
                </details>

                <!-- FAQ 3 -->
                <details class="group rounded-2xl bg-brand-card border border-brand-border overflow-hidden">
                    <summary class="flex items-center justify-between gap-4 px-6 py-5 cursor-pointer select-none list-none text-white font-medium hover:text-electric transition-colors duration-300">
                        <span>Are you currently hiring?</span>
                        <svg class="w-5 h-5 shrink-0 text-gray-500 group-open:rotate-180 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </summary>
                    <div class="px-6 pb-5 text-gray-400 leading-relaxed">
                        We&rsquo;re growing across our three companies&mdash;IDLE, RIFT, and BulletPROOF.
                        Keep an eye on our website for open positions, or send us your resume and a note about
                        what excites you. We love hearing from talented people.
                    </div>
                </details>

                <!-- FAQ 4 -->
                <details class="group rounded-2xl bg-brand-card border border-brand-border overflow-hidden">
                    <summary class="flex items-center justify-between gap-4 px-6 py-5 cursor-pointer select-none list-none text-white font-medium hover:text-electric transition-colors duration-300">
                        <span>How long does it take to get a response?</span>
                        <svg class="w-5 h-5 shrink-0 text-gray-500 group-open:rotate-180 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </summary>
                    <div class="px-6 pb-5 text-gray-400 leading-relaxed">
                        We aim to respond to all inquiries within one business day. During busy periods it may
                        take up to 48 hours. If your matter is urgent, please mention that in the subject
                        or message body and we&rsquo;ll prioritize it.
                    </div>
                </details>

                <!-- FAQ 5 -->
                <details class="group rounded-2xl bg-brand-card border border-brand-border overflow-hidden">
                    <summary class="flex items-center justify-between gap-4 px-6 py-5 cursor-pointer select-none list-none text-white font-medium hover:text-electric transition-colors duration-300">
                        <span>Where is Astroyds located?</span>
                        <svg class="w-5 h-5 shrink-0 text-gray-500 group-open:rotate-180 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </summary>
                    <div class="px-6 pb-5 text-gray-400 leading-relaxed">
                        Astroyds is headquartered in Maple Grove, Minnesota (55311). While our primary operations
                        are based there, our teams collaborate remotely across multiple time zones to build
                        products that serve a global audience.
                    </div>
                </details>

            </div>
        </div>
    </section>

</main>

<!-- ═══════════════════════════════════════════════════════════
     INLINE SCRIPT — Contact form AJAX handler
════════════════════════════════════════════════════════════ -->
<script>
(function () {
    'use strict';

    var form       = document.getElementById('contact-form');
    var submitBtn  = document.getElementById('contact-submit');
    var submitText = document.getElementById('contact-submit-text');
    var spinner    = document.getElementById('contact-submit-spinner');
    var successEl  = document.getElementById('contact-success');
    var errorEl    = document.getElementById('contact-error');
    var errorMsg   = document.getElementById('contact-error-msg');

    if (!form) return;

    function showError(field) {
        var el = form.querySelector('[data-error="' + field + '"]');
        if (el) el.classList.remove('hidden');
    }

    function clearErrors() {
        var errors = form.querySelectorAll('[data-error]');
        for (var i = 0; i < errors.length; i++) {
            errors[i].classList.add('hidden');
        }
        successEl.classList.add('hidden');
        errorEl.classList.add('hidden');
    }

    function validateForm() {
        var valid = true;
        var name    = form.querySelector('[name="name"]');
        var email   = form.querySelector('[name="email"]');
        var message = form.querySelector('[name="message"]');
        var consent = form.querySelector('[name="consent"]');

        if (!name.value.trim() || name.value.trim().length < 2) {
            showError('name');
            valid = false;
        }

        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!email.value.trim() || !emailPattern.test(email.value.trim())) {
            showError('email');
            valid = false;
        }

        if (!message.value.trim() || message.value.trim().length < 10) {
            showError('message');
            valid = false;
        }

        if (!consent.checked) {
            showError('consent');
            valid = false;
        }

        return valid;
    }

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        clearErrors();

        if (!validateForm()) return;

        submitBtn.disabled = true;
        submitText.textContent = 'Sending\u2026';
        spinner.classList.remove('hidden');

        var csrfToken = form.querySelector('[name="_csrf_token"]').value;

        var payload = {
            _csrf_token: csrfToken,
            name:    form.querySelector('[name="name"]').value.trim(),
            email:   form.querySelector('[name="email"]').value.trim(),
            company: form.querySelector('[name="company"]').value.trim(),
            role:    form.querySelector('[name="role"]').value.trim(),
            message: form.querySelector('[name="message"]').value.trim(),
            consent: form.querySelector('[name="consent"]').checked
        };

        fetch('src/php/contact-endpoint.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
            body: JSON.stringify(payload),
            credentials: 'same-origin'
        })
        .then(function (res) {
            return res.json().then(function (data) {
                return { ok: res.ok, data: data };
            });
        })
        .then(function (result) {
            if (result.ok && result.data.success) {
                successEl.classList.remove('hidden');
                form.reset();
            } else {
                errorMsg.textContent = result.data.message || 'Something went wrong. Please try again later.';
                errorEl.classList.remove('hidden');
            }
        })
        .catch(function () {
            errorMsg.textContent = 'A network error occurred. Please check your connection and try again.';
            errorEl.classList.remove('hidden');
        })
        .finally(function () {
            submitBtn.disabled = false;
            submitText.textContent = 'Send Message';
            spinner.classList.add('hidden');
        });
    });
})();
</script>

<?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>
