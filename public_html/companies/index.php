<?php
require_once __DIR__ . '/../src/php/config.php';
require_once __DIR__ . '/../src/php/headers.php';
require_once __DIR__ . '/../src/php/template_helpers.php';
send_security_headers();
$page_title = 'Our Companies | Astroyds';
$page_description = 'Discover the Astroyds family of companies — IDLE, RIFT, and BulletPROOF — moving humanity forward for a better future.';
$page_url = page_url('/companies');
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
    <section class="relative py-24 md:py-32 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-navy via-navy/95 to-navy"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-heading font-bold mb-6 bg-gradient-to-r from-blue-400 to-purple-500 bg-clip-text text-transparent">
                <?= e('Our Companies') ?>
            </h1>
            <p class="text-lg md:text-xl text-gray-300 max-w-3xl mx-auto mb-8">
                <?= e('Astroyds is a sole proprietorship based in Maple Grove, MN — building ventures that push boundaries across gaming, immersive technology, and cybersecurity.') ?>
            </p>
            <p class="text-base text-gray-400 italic">
                <?= e('Moving humanity forward for a better future.') ?>
            </p>
        </div>
    </section>

    <!-- Companies Grid -->
    <section class="py-20 md:py-28">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-heading font-bold mb-4">
                    <?= e('The Astroyds Portfolio') ?>
                </h2>
                <p class="text-gray-400 max-w-2xl mx-auto">
                    <?= e('Each company operates with its own identity and mission, united under the Astroyds vision of innovation and impact.') ?>
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-10">

                <!-- IDLE Card -->
                <a href="<?= e(page_url('/companies/idle')) ?>" class="group block bg-brand-card border border-brand-border rounded-2xl p-8 transition-all duration-300 hover:shadow-glow-blue hover:border-blue-500/50 hover:-translate-y-1">
                    <div class="flex items-center justify-center w-16 h-16 bg-blue-500/10 rounded-xl mb-6 group-hover:bg-blue-500/20 transition-colors">
                        <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-heading font-bold mb-3 text-white group-hover:text-blue-400 transition-colors">
                        <?= e('IDLE') ?>
                    </h3>
                    <p class="text-gray-400 mb-6 leading-relaxed">
                        <?= e('Redefining interactive entertainment and idle gaming experiences. Building captivating worlds that engage players through innovative mechanics and rewarding progression.') ?>
                    </p>
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-navy/50 rounded-lg p-3 text-center">
                            <span class="block text-xl font-heading font-bold text-blue-400"><?= e('3+') ?></span>
                            <span class="text-xs text-gray-500"><?= e('Titles in Dev') ?></span>
                        </div>
                        <div class="bg-navy/50 rounded-lg p-3 text-center">
                            <span class="block text-xl font-heading font-bold text-blue-400"><?= e('Idle') ?></span>
                            <span class="text-xs text-gray-500"><?= e('Genre Focus') ?></span>
                        </div>
                    </div>
                    <span class="inline-flex items-center text-sm text-blue-400 group-hover:text-blue-300 transition-colors">
                        <?= e('Learn more') ?>
                        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </span>
                </a>

                <!-- RIFT Card -->
                <a href="<?= e(page_url('/companies/rift')) ?>" class="group block bg-brand-card border border-brand-border rounded-2xl p-8 transition-all duration-300 hover:shadow-glow-purple hover:border-purple-500/50 hover:-translate-y-1">
                    <div class="flex items-center justify-center w-16 h-16 bg-purple-500/10 rounded-xl mb-6 group-hover:bg-purple-500/20 transition-colors">
                        <svg class="w-8 h-8 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-heading font-bold mb-3 text-white group-hover:text-purple-400 transition-colors">
                        <?= e('RIFT') ?>
                    </h3>
                    <p class="text-gray-400 mb-6 leading-relaxed">
                        <?= e('Bridging the gap between virtual and physical realities. Pioneering XR, AR, and VR technologies that transform how people interact with digital worlds.') ?>
                    </p>
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-navy/50 rounded-lg p-3 text-center">
                            <span class="block text-xl font-heading font-bold text-purple-400"><?= e('XR') ?></span>
                            <span class="text-xs text-gray-500"><?= e('Platform') ?></span>
                        </div>
                        <div class="bg-navy/50 rounded-lg p-3 text-center">
                            <span class="block text-xl font-heading font-bold text-purple-400"><?= e('AR/VR') ?></span>
                            <span class="text-xs text-gray-500"><?= e('Technologies') ?></span>
                        </div>
                    </div>
                    <span class="inline-flex items-center text-sm text-purple-400 group-hover:text-purple-300 transition-colors">
                        <?= e('Learn more') ?>
                        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </span>
                </a>

                <!-- BulletPROOF Card -->
                <a href="<?= e(page_url('/companies/bulletproof')) ?>" class="group block bg-brand-card border border-brand-border rounded-2xl p-8 transition-all duration-300 hover:shadow-glow-blue hover:border-green-500/50 hover:-translate-y-1">
                    <div class="flex items-center justify-center w-16 h-16 bg-green-500/10 rounded-xl mb-6 group-hover:bg-green-500/20 transition-colors">
                        <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-heading font-bold mb-3 text-white group-hover:text-green-400 transition-colors">
                        <?= e('BulletPROOF') ?>
                    </h3>
                    <p class="text-gray-400 mb-6 leading-relaxed">
                        <?= e('Unbreakable security solutions for the modern enterprise. Protecting businesses with cutting-edge cybersecurity tools and proactive defense strategies.') ?>
                    </p>
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-navy/50 rounded-lg p-3 text-center">
                            <span class="block text-xl font-heading font-bold text-green-400"><?= e('24/7') ?></span>
                            <span class="text-xs text-gray-500"><?= e('Monitoring') ?></span>
                        </div>
                        <div class="bg-navy/50 rounded-lg p-3 text-center">
                            <span class="block text-xl font-heading font-bold text-green-400"><?= e('Enterprise') ?></span>
                            <span class="text-xs text-gray-500"><?= e('Grade') ?></span>
                        </div>
                    </div>
                    <span class="inline-flex items-center text-sm text-green-400 group-hover:text-green-300 transition-colors">
                        <?= e('Learn more') ?>
                        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </span>
                </a>

            </div>
        </div>
    </section>

    <!-- Philosophy Section -->
    <section class="py-20 md:py-28 bg-brand-card/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <div>
                    <h2 class="text-3xl md:text-4xl font-heading font-bold mb-6 bg-gradient-to-r from-blue-400 to-purple-500 bg-clip-text text-transparent">
                        <?= e('Our Parent Brand Philosophy') ?>
                    </h2>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        <?= e('Astroyds operates as a sole proprietorship out of Maple Grove, Minnesota. We believe in building companies that solve real problems and create meaningful experiences — from the games people play, to the realities they explore, to the digital assets they protect.') ?>
                    </p>
                    <p class="text-gray-400 mb-6 leading-relaxed">
                        <?= e('Each brand under Astroyds is empowered to innovate independently while sharing a common mission: moving humanity forward for a better future. We invest in bold ideas, nurture talent, and refuse to settle for the status quo.') ?>
                    </p>
                    <p class="text-gray-400 leading-relaxed">
                        <?= e('Whether it\'s crafting the next great idle game, pioneering immersive XR experiences, or fortifying enterprise security — our companies are united by a relentless drive to push boundaries.') ?>
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-brand-card border border-brand-border rounded-xl p-6 text-center shadow-glow-blue">
                        <span class="block text-3xl font-heading font-bold text-blue-400 mb-2"><?= e('3') ?></span>
                        <span class="text-sm text-gray-400"><?= e('Active Companies') ?></span>
                    </div>
                    <div class="bg-brand-card border border-brand-border rounded-xl p-6 text-center shadow-glow-purple">
                        <span class="block text-3xl font-heading font-bold text-purple-400 mb-2"><?= e('MN') ?></span>
                        <span class="text-sm text-gray-400"><?= e('Headquartered') ?></span>
                    </div>
                    <div class="bg-brand-card border border-brand-border rounded-xl p-6 text-center shadow-glow-purple">
                        <span class="block text-3xl font-heading font-bold text-purple-400 mb-2"><?= e('∞') ?></span>
                        <span class="text-sm text-gray-400"><?= e('Ambition') ?></span>
                    </div>
                    <div class="bg-brand-card border border-brand-border rounded-xl p-6 text-center shadow-glow-blue">
                        <span class="block text-3xl font-heading font-bold text-blue-400 mb-2"><?= e('1') ?></span>
                        <span class="text-sm text-gray-400"><?= e('Mission') ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 md:py-24">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-heading font-bold mb-6">
                <?= e('Interested in Working With Us?') ?>
            </h2>
            <p class="text-gray-400 mb-8 max-w-2xl mx-auto">
                <?= e('Whether you\'re looking to partner, collaborate, or join one of our teams — we\'d love to hear from you.') ?>
            </p>
            <a href="<?= e(page_url('/contact')) ?>" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-500 hover:to-purple-500 text-white font-heading font-semibold rounded-xl transition-all duration-300 shadow-glow-blue hover:shadow-glow-purple">
                <?= e('Get in Touch') ?>
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
