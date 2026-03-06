<?php
require_once __DIR__ . '/../src/php/config.php';
require_once __DIR__ . '/../src/php/headers.php';
require_once __DIR__ . '/../src/php/template_helpers.php';
send_security_headers();
$page_title = 'RIFT — Virtual & Physical Reality Bridging | Astroyds';
$page_description = 'RIFT bridges the gap between virtual and physical realities through pioneering XR, AR, and VR technologies that transform how people interact with digital worlds.';
$page_url = page_url('/companies/rift');
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
        <div class="absolute inset-0 bg-gradient-to-br from-purple-900/40 via-navy to-navy"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-72 h-72 bg-purple-400/5 rounded-full blur-2xl"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <a href="<?= e(page_url('/companies')) ?>" class="inline-flex items-center text-sm text-purple-400 hover:text-purple-300 mb-6 transition-colors">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    <?= e('Back to Companies') ?>
                </a>
                <h1 class="text-5xl md:text-7xl font-heading font-bold mb-6 text-purple-400">
                    <?= e('RIFT') ?>
                </h1>
                <p class="text-xl md:text-2xl text-gray-300 mb-4 font-heading">
                    <?= e('Bridging Virtual & Physical Realities') ?>
                </p>
                <p class="text-lg text-gray-400 leading-relaxed max-w-2xl">
                    <?= e('Bridging the gap between virtual and physical realities. We pioneer XR, AR, and VR technologies that transform how people interact with digital worlds — making the impossible feel tangible.') ?>
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
                        <?= e('Redefining Reality') ?>
                    </h2>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        <?= e('RIFT sits at the intersection of the physical and digital worlds. We develop cutting-edge extended reality (XR) platforms that blur the line between what\'s real and what\'s rendered — creating experiences that feel natural, intuitive, and deeply immersive.') ?>
                    </p>
                    <p class="text-gray-400 leading-relaxed">
                        <?= e('From augmented reality overlays that enhance everyday life to fully immersive virtual environments for training, collaboration, and entertainment — RIFT is building the infrastructure for the spatial computing era.') ?>
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-brand-card border border-brand-border rounded-xl p-6 text-center">
                        <span class="block text-3xl font-heading font-bold text-purple-400 mb-2"><?= e('XR') ?></span>
                        <span class="text-sm text-gray-400"><?= e('Core Platform') ?></span>
                    </div>
                    <div class="bg-brand-card border border-brand-border rounded-xl p-6 text-center">
                        <span class="block text-3xl font-heading font-bold text-purple-400 mb-2"><?= e('AR') ?></span>
                        <span class="text-sm text-gray-400"><?= e('Augmented Reality') ?></span>
                    </div>
                    <div class="bg-brand-card border border-brand-border rounded-xl p-6 text-center">
                        <span class="block text-3xl font-heading font-bold text-purple-400 mb-2"><?= e('VR') ?></span>
                        <span class="text-sm text-gray-400"><?= e('Virtual Reality') ?></span>
                    </div>
                    <div class="bg-brand-card border border-brand-border rounded-xl p-6 text-center">
                        <span class="block text-3xl font-heading font-bold text-purple-400 mb-2"><?= e('MR') ?></span>
                        <span class="text-sm text-gray-400"><?= e('Mixed Reality') ?></span>
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
                    <?= e('Our Technology') ?>
                </h2>
                <p class="text-gray-400 max-w-2xl mx-auto">
                    <?= e('Pushing the boundaries of what\'s possible in spatial computing and immersive technology.') ?>
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- Feature 1: Spatial Computing -->
                <div class="bg-brand-card border border-brand-border rounded-2xl p-8 hover:shadow-glow-purple transition-shadow duration-300">
                    <div class="flex items-center justify-center w-12 h-12 bg-purple-500/10 rounded-lg mb-5">
                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold mb-3"><?= e('Spatial Computing Platform') ?></h3>
                    <p class="text-gray-400 leading-relaxed">
                        <?= e('A unified development platform for building spatial applications that work across AR, VR, and MR headsets. Write once, deploy everywhere with our abstraction layer.') ?>
                    </p>
                </div>

                <!-- Feature 2: Hand & Eye Tracking -->
                <div class="bg-brand-card border border-brand-border rounded-2xl p-8 hover:shadow-glow-purple transition-shadow duration-300">
                    <div class="flex items-center justify-center w-12 h-12 bg-purple-500/10 rounded-lg mb-5">
                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold mb-3"><?= e('Advanced Interaction Systems') ?></h3>
                    <p class="text-gray-400 leading-relaxed">
                        <?= e('Natural hand tracking, eye tracking, and gesture recognition that make interacting with virtual objects feel as intuitive as the real world. No controllers required.') ?>
                    </p>
                </div>

                <!-- Feature 3: Digital Twin -->
                <div class="bg-brand-card border border-brand-border rounded-2xl p-8 hover:shadow-glow-purple transition-shadow duration-300">
                    <div class="flex items-center justify-center w-12 h-12 bg-purple-500/10 rounded-lg mb-5">
                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold mb-3"><?= e('Digital Twin Technology') ?></h3>
                    <p class="text-gray-400 leading-relaxed">
                        <?= e('Create precise digital replicas of physical spaces and objects. Simulate, analyze, and interact with real-world environments in a fully immersive virtual workspace.') ?>
                    </p>
                </div>

                <!-- Feature 4: Collaborative XR -->
                <div class="bg-brand-card border border-brand-border rounded-2xl p-8 hover:shadow-glow-purple transition-shadow duration-300">
                    <div class="flex items-center justify-center w-12 h-12 bg-purple-500/10 rounded-lg mb-5">
                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold mb-3"><?= e('Collaborative XR Spaces') ?></h3>
                    <p class="text-gray-400 leading-relaxed">
                        <?= e('Shared virtual environments where remote teams can collaborate as if they\'re in the same room. Real-time presence, spatial audio, and persistent workspaces.') ?>
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
                    <?= e('The Team Behind RIFT') ?>
                </h2>
                <p class="text-gray-400 max-w-2xl mx-auto">
                    <?= e('Visionaries and engineers building the next generation of immersive reality experiences.') ?>
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-brand-card border border-brand-border rounded-2xl p-8 text-center">
                    <div class="w-20 h-20 bg-purple-500/10 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-10 h-10 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-heading font-bold mb-1"><?= e('XR Research') ?></h3>
                    <p class="text-gray-400 text-sm"><?= e('Exploring the frontiers of spatial computing, perception science, and human-computer interaction.') ?></p>
                </div>
                <div class="bg-brand-card border border-brand-border rounded-2xl p-8 text-center">
                    <div class="w-20 h-20 bg-purple-500/10 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-10 h-10 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-heading font-bold mb-1"><?= e('Platform Engineering') ?></h3>
                    <p class="text-gray-400 text-sm"><?= e('Building the low-level rendering, tracking, and networking systems that power immersive experiences.') ?></p>
                </div>
                <div class="bg-brand-card border border-brand-border rounded-2xl p-8 text-center">
                    <div class="w-20 h-20 bg-purple-500/10 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-10 h-10 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-heading font-bold mb-1"><?= e('3D Art & Design') ?></h3>
                    <p class="text-gray-400 text-sm"><?= e('Crafting photorealistic and stylized 3D environments that feel alive and spatially coherent.') ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 md:py-24 bg-gradient-to-t from-purple-900/20 to-transparent">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-heading font-bold mb-6">
                <?= e('Ready to Step Into the Future?') ?>
            </h2>
            <p class="text-gray-400 mb-8 max-w-2xl mx-auto">
                <?= e('Whether you\'re exploring XR for your business or want to join our team — we\'d love to connect and explore what\'s possible together.') ?>
            </p>
            <a href="<?= e(page_url('/contact')) ?>" class="inline-flex items-center px-8 py-4 bg-purple-600 hover:bg-purple-500 text-white font-heading font-semibold rounded-xl transition-all duration-300 shadow-glow-purple">
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
