<?php
require_once __DIR__ . '/../src/php/config.php';
require_once __DIR__ . '/../src/php/headers.php';
require_once __DIR__ . '/../src/php/template_helpers.php';
send_security_headers();
$page_title = 'BulletPROOF — Enterprise Security Solutions | Astroyds';
$page_description = 'BulletPROOF delivers unbreakable cybersecurity solutions for the modern enterprise — threat detection, penetration testing, compliance, and incident response.';
$page_url = page_url('/companies/bulletproof');
$page_image = page_url('/assets/images/og-companies.png');
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<?php include __DIR__ . '/../partials/meta.php'; ?>
<body class="bg-navy text-white font-body antialiased">
<!-- DRAFT COPY -->
<?php include __DIR__ . '/../partials/header.php'; ?>
<main id="main-content">

    <!-- Hero Section -->
    <section class="relative py-24 md:py-36 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-green-900/30 via-navy to-navy"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-green-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-72 h-72 bg-green-400/5 rounded-full blur-2xl"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <a href="<?= e(page_url('/companies')) ?>" class="inline-flex items-center text-sm text-green-400 hover:text-green-300 mb-6 transition-colors">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    <?= e('Back to Companies') ?>
                </a>
                <h1 class="text-5xl md:text-7xl font-heading font-bold mb-6 text-green-400">
                    <?= e('BulletPROOF') ?>
                </h1>
                <p class="text-xl md:text-2xl text-gray-300 mb-4 font-heading">
                    <?= e('Unbreakable Enterprise Security') ?>
                </p>
                <p class="text-lg text-gray-400 leading-relaxed max-w-2xl">
                    <?= e('Unbreakable security solutions for the modern enterprise. We protect businesses with cutting-edge cybersecurity tools, proactive defense strategies, and around-the-clock vigilance.') ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Description Section -->
    <section class="py-20 md:py-28">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <div>
                    <h2 class="text-3xl md:text-4xl font-heading font-bold mb-6">
                        <?= e('Security Without Compromise') ?>
                    </h2>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        <?= e('In an era of escalating cyber threats, BulletPROOF delivers enterprise-grade security that stays ahead of attackers. Our approach combines AI-driven threat intelligence, battle-tested methodologies, and human expertise to create defense systems that adapt and evolve.') ?>
                    </p>
                    <p class="text-gray-400 leading-relaxed">
                        <?= e('From startups to Fortune 500 companies, we provide the tools and expertise needed to protect critical assets, ensure compliance, and respond to incidents with speed and precision.') ?>
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-brand-card border border-brand-border rounded-xl p-6 text-center">
                        <span class="block text-3xl font-heading font-bold text-green-400 mb-2"><?= e('24/7') ?></span>
                        <span class="text-sm text-gray-400"><?= e('Monitoring') ?></span>
                    </div>
                    <div class="bg-brand-card border border-brand-border rounded-xl p-6 text-center">
                        <span class="block text-3xl font-heading font-bold text-green-400 mb-2"><?= e('0-Day') ?></span>
                        <span class="text-sm text-gray-400"><?= e('Protection') ?></span>
                    </div>
                    <div class="bg-brand-card border border-brand-border rounded-xl p-6 text-center">
                        <span class="block text-3xl font-heading font-bold text-green-400 mb-2"><?= e('SOC 2') ?></span>
                        <span class="text-sm text-gray-400"><?= e('Compliant') ?></span>
                    </div>
                    <div class="bg-brand-card border border-brand-border rounded-xl p-6 text-center">
                        <span class="block text-3xl font-heading font-bold text-green-400 mb-2"><?= e('AI') ?></span>
                        <span class="text-sm text-gray-400"><?= e('Powered') ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 md:py-28 bg-brand-card/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-heading font-bold mb-4">
                    <?= e('Our Security Solutions') ?>
                </h2>
                <p class="text-gray-400 max-w-2xl mx-auto">
                    <?= e('Comprehensive cybersecurity services designed to protect every layer of your organization.') ?>
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- Feature 1: Threat Detection -->
                <div class="bg-brand-card border border-brand-border rounded-2xl p-8 hover:shadow-glow-blue transition-shadow duration-300">
                    <div class="flex items-center justify-center w-12 h-12 bg-green-500/10 rounded-lg mb-5">
                        <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold mb-3"><?= e('Threat Detection & Intelligence') ?></h3>
                    <p class="text-gray-400 leading-relaxed">
                        <?= e('AI-powered threat detection that monitors your infrastructure around the clock. Identify anomalies, zero-day exploits, and advanced persistent threats before they cause damage.') ?>
                    </p>
                </div>

                <!-- Feature 2: Penetration Testing -->
                <div class="bg-brand-card border border-brand-border rounded-2xl p-8 hover:shadow-glow-blue transition-shadow duration-300">
                    <div class="flex items-center justify-center w-12 h-12 bg-green-500/10 rounded-lg mb-5">
                        <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold mb-3"><?= e('Penetration Testing') ?></h3>
                    <p class="text-gray-400 leading-relaxed">
                        <?= e('Rigorous offensive security testing by certified professionals. We simulate real-world attacks against your systems, applications, and networks to uncover vulnerabilities before attackers do.') ?>
                    </p>
                </div>

                <!-- Feature 3: Compliance -->
                <div class="bg-brand-card border border-brand-border rounded-2xl p-8 hover:shadow-glow-blue transition-shadow duration-300">
                    <div class="flex items-center justify-center w-12 h-12 bg-green-500/10 rounded-lg mb-5">
                        <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold mb-3"><?= e('Compliance & Governance') ?></h3>
                    <p class="text-gray-400 leading-relaxed">
                        <?= e('Navigate the complex landscape of regulatory compliance with confidence. SOC 2, HIPAA, GDPR, PCI DSS — we help you achieve and maintain compliance with automated monitoring and reporting.') ?>
                    </p>
                </div>

                <!-- Feature 4: Incident Response -->
                <div class="bg-brand-card border border-brand-border rounded-2xl p-8 hover:shadow-glow-blue transition-shadow duration-300">
                    <div class="flex items-center justify-center w-12 h-12 bg-green-500/10 rounded-lg mb-5">
                        <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold mb-3"><?= e('Incident Response') ?></h3>
                    <p class="text-gray-400 leading-relaxed">
                        <?= e('When a breach occurs, every second counts. Our incident response team provides rapid containment, forensic analysis, and recovery — minimizing damage and getting you back online fast.') ?>
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- Team Highlights -->
    <section class="py-20 md:py-28">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-heading font-bold mb-4">
                    <?= e('The Team Behind BulletPROOF') ?>
                </h2>
                <p class="text-gray-400 max-w-2xl mx-auto">
                    <?= e('Certified security professionals, ethical hackers, and compliance experts protecting what matters most.') ?>
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-brand-card border border-brand-border rounded-2xl p-8 text-center">
                    <div class="w-20 h-20 bg-green-500/10 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-10 h-10 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-heading font-bold mb-1"><?= e('Security Operations') ?></h3>
                    <p class="text-gray-400 text-sm"><?= e('24/7 SOC analysts monitoring threats, triaging alerts, and neutralizing attacks in real time.') ?></p>
                </div>
                <div class="bg-brand-card border border-brand-border rounded-2xl p-8 text-center">
                    <div class="w-20 h-20 bg-green-500/10 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-10 h-10 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-heading font-bold mb-1"><?= e('Offensive Security') ?></h3>
                    <p class="text-gray-400 text-sm"><?= e('Certified ethical hackers and red team operators who think like attackers to find your weaknesses first.') ?></p>
                </div>
                <div class="bg-brand-card border border-brand-border rounded-2xl p-8 text-center">
                    <div class="w-20 h-20 bg-green-500/10 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-10 h-10 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-heading font-bold mb-1"><?= e('Compliance & Audit') ?></h3>
                    <p class="text-gray-400 text-sm"><?= e('Regulatory experts ensuring your organization meets and exceeds industry security standards.') ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 md:py-24 bg-gradient-to-t from-green-900/20 to-transparent">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-heading font-bold mb-6">
                <?= e('Secure Your Business Today') ?>
            </h2>
            <p class="text-gray-400 mb-8 max-w-2xl mx-auto">
                <?= e('Don\'t wait for a breach to take security seriously. Get in touch for a free consultation and learn how BulletPROOF can protect your organization.') ?>
            </p>
            <a href="<?= e(page_url('/contact')) ?>" class="inline-flex items-center px-8 py-4 bg-green-600 hover:bg-green-500 text-white font-heading font-semibold rounded-xl transition-all duration-300 shadow-glow-blue">
                <?= e('Contact Us') ?>
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </section>

</main>
<?php include __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>
