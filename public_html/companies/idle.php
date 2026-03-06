<?php
require_once __DIR__ . '/../src/php/config.php';
require_once __DIR__ . '/../src/php/headers.php';
require_once __DIR__ . '/../src/php/template_helpers.php';
send_security_headers();
$page_title = 'IDLE — Interactive Entertainment & Idle Gaming | Astroyds';
$page_description = 'IDLE redefines interactive entertainment and idle gaming experiences with captivating worlds, innovative mechanics, and rewarding progression systems.';
$page_url = page_url('/companies/idle');
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
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900/40 via-navy to-navy"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-72 h-72 bg-blue-400/5 rounded-full blur-2xl"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <a href="<?= e(page_url('/companies')) ?>" class="inline-flex items-center text-sm text-blue-400 hover:text-blue-300 mb-6 transition-colors">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    <?= e('Back to Companies') ?>
                </a>
                <h1 class="text-5xl md:text-7xl font-heading font-bold mb-6 text-blue-400">
                    <?= e('IDLE') ?>
                </h1>
                <p class="text-xl md:text-2xl text-gray-300 mb-4 font-heading">
                    <?= e('Interactive Entertainment & Idle Gaming') ?>
                </p>
                <p class="text-lg text-gray-400 leading-relaxed max-w-2xl">
                    <?= e('Redefining interactive entertainment and idle gaming experiences. We build captivating worlds that engage players through innovative mechanics, rewarding progression systems, and experiences that respect your time.') ?>
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
                        <?= e('The Future of Idle Gaming') ?>
                    </h2>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        <?= e('At IDLE, we believe gaming should be accessible, enjoyable, and deeply satisfying. Our titles are designed to provide meaningful progression whether you\'re playing actively or stepping away — your world keeps growing.') ?>
                    </p>
                    <p class="text-gray-400 leading-relaxed">
                        <?= e('From incremental mechanics to narrative-driven idle experiences, we push the genre forward with fresh ideas and polished execution. Every game we create is crafted to engage, surprise, and delight.') ?>
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-brand-card border border-brand-border rounded-xl p-6 text-center">
                        <span class="block text-3xl font-heading font-bold text-blue-400 mb-2"><?= e('3+') ?></span>
                        <span class="text-sm text-gray-400"><?= e('Titles in Development') ?></span>
                    </div>
                    <div class="bg-brand-card border border-brand-border rounded-xl p-6 text-center">
                        <span class="block text-3xl font-heading font-bold text-blue-400 mb-2"><?= e('Idle') ?></span>
                        <span class="text-sm text-gray-400"><?= e('Genre Focus') ?></span>
                    </div>
                    <div class="bg-brand-card border border-brand-border rounded-xl p-6 text-center">
                        <span class="block text-3xl font-heading font-bold text-blue-400 mb-2"><?= e('Cross') ?></span>
                        <span class="text-sm text-gray-400"><?= e('Platform') ?></span>
                    </div>
                    <div class="bg-brand-card border border-brand-border rounded-xl p-6 text-center">
                        <span class="block text-3xl font-heading font-bold text-blue-400 mb-2"><?= e('F2P') ?></span>
                        <span class="text-sm text-gray-400"><?= e('Model') ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features / Products Section -->
    <section class="py-20 md:py-28 bg-brand-card/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-heading font-bold mb-4">
                    <?= e('What We Build') ?>
                </h2>
                <p class="text-gray-400 max-w-2xl mx-auto">
                    <?= e('Our products span the idle and incremental gaming spectrum — each one designed to push the genre forward.') ?>
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- Feature 1 -->
                <div class="bg-brand-card border border-brand-border rounded-2xl p-8 hover:shadow-glow-blue transition-shadow duration-300">
                    <div class="flex items-center justify-center w-12 h-12 bg-blue-500/10 rounded-lg mb-5">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold mb-3"><?= e('Incremental Engines') ?></h3>
                    <p class="text-gray-400 leading-relaxed">
                        <?= e('Proprietary progression systems that deliver satisfying growth curves and meaningful prestige loops. Our engines power deep, layered gameplay that keeps players engaged for months.') ?>
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-brand-card border border-brand-border rounded-2xl p-8 hover:shadow-glow-blue transition-shadow duration-300">
                    <div class="flex items-center justify-center w-12 h-12 bg-blue-500/10 rounded-lg mb-5">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold mb-3"><?= e('Persistent Worlds') ?></h3>
                    <p class="text-gray-400 leading-relaxed">
                        <?= e('Living game worlds that evolve whether you\'re online or offline. Come back to discover new resources, events, and opportunities that grew while you were away.') ?>
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-brand-card border border-brand-border rounded-2xl p-8 hover:shadow-glow-blue transition-shadow duration-300">
                    <div class="flex items-center justify-center w-12 h-12 bg-blue-500/10 rounded-lg mb-5">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold mb-3"><?= e('Community-Driven Design') ?></h3>
                    <p class="text-gray-400 leading-relaxed">
                        <?= e('We build with our players, not just for them. Community feedback drives feature prioritization, balance updates, and new content — ensuring every update matters.') ?>
                    </p>
                </div>

                <!-- Feature 4 -->
                <div class="bg-brand-card border border-brand-border rounded-2xl p-8 hover:shadow-glow-blue transition-shadow duration-300">
                    <div class="flex items-center justify-center w-12 h-12 bg-blue-500/10 rounded-lg mb-5">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold mb-3"><?= e('Cross-Platform Play') ?></h3>
                    <p class="text-gray-400 leading-relaxed">
                        <?= e('Seamless gaming across mobile, desktop, and web. Your progress syncs everywhere so you can pick up right where you left off — on any device, anytime.') ?>
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
                    <?= e('The Team Behind IDLE') ?>
                </h2>
                <p class="text-gray-400 max-w-2xl mx-auto">
                    <?= e('A passionate group of game designers, engineers, and artists dedicated to crafting the next generation of idle experiences.') ?>
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-brand-card border border-brand-border rounded-2xl p-8 text-center">
                    <div class="w-20 h-20 bg-blue-500/10 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-10 h-10 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-heading font-bold mb-1"><?= e('Game Design') ?></h3>
                    <p class="text-gray-400 text-sm"><?= e('Crafting compelling mechanics and progression systems that keep players coming back.') ?></p>
                </div>
                <div class="bg-brand-card border border-brand-border rounded-2xl p-8 text-center">
                    <div class="w-20 h-20 bg-blue-500/10 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-10 h-10 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-heading font-bold mb-1"><?= e('Engineering') ?></h3>
                    <p class="text-gray-400 text-sm"><?= e('Building scalable, performant engines that power seamless idle gameplay across platforms.') ?></p>
                </div>
                <div class="bg-brand-card border border-brand-border rounded-2xl p-8 text-center">
                    <div class="w-20 h-20 bg-blue-500/10 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-10 h-10 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-heading font-bold mb-1"><?= e('Art & Design') ?></h3>
                    <p class="text-gray-400 text-sm"><?= e('Creating beautiful, cohesive visual identities that make each title feel unique and polished.') ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 md:py-24 bg-gradient-to-t from-blue-900/20 to-transparent">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-heading font-bold mb-6">
                <?= e('Want to Build the Future of Gaming?') ?>
            </h2>
            <p class="text-gray-400 mb-8 max-w-2xl mx-auto">
                <?= e('We\'re always looking for passionate people who love idle games and want to push the genre forward. Reach out and let\'s talk.') ?>
            </p>
            <a href="<?= e(page_url('/contact')) ?>" class="inline-flex items-center px-8 py-4 bg-blue-600 hover:bg-blue-500 text-white font-heading font-semibold rounded-xl transition-all duration-300 shadow-glow-blue">
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
