<?php
require_once __DIR__ . '/src/php/config.php';
require_once __DIR__ . '/src/php/headers.php';
require_once __DIR__ . '/src/php/template_helpers.php';

send_security_headers();

$page_title       = 'Home';
$page_description = 'Astroyds — Moving humanity forward for a better future. We build tomorrow\'s world today through IDLE, RIFT, and BulletPROOF.';
$page_url         = page_url('/');
$page_image       = page_url('/assets/images/og-home.jpg');
?>
<!-- DRAFT COPY -->
<?php include __DIR__ . '/partials/meta.php'; ?>

<body class="bg-navy text-white font-body antialiased">
<?php include __DIR__ . '/partials/header.php'; ?>

<main id="main-content" class="flex-1">

    <!-- ═══════════════════════════════════════════════════════════
         HERO SECTION — Dynamic concept loader
    ════════════════════════════════════════════════════════════ -->
    <?php
    $hero_file = __DIR__ . '/partials/hero-concepts/concept-' . HERO_CONCEPT . '.php';
    if (file_exists($hero_file)) {
        include $hero_file;
    } else {
        include __DIR__ . '/partials/hero-concepts/concept-immersive.php';
    }
    ?>

    <!-- ═══════════════════════════════════════════════════════════
         WHO WE ARE
    ════════════════════════════════════════════════════════════ -->
    <section id="who-we-are" class="relative py-24 sm:py-32 overflow-hidden" aria-labelledby="who-heading">
        <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
            <div class="absolute top-1/4 -left-32 w-96 h-96 bg-electric/5 rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 -right-32 w-96 h-96 bg-purple/5 rounded-full blur-3xl"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 sm:mb-20 js-reveal">
                <span class="inline-block text-electric text-sm font-semibold tracking-widest uppercase mb-4">Who We Are</span>
                <h2 id="who-heading" class="font-heading text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                    Building the future,<br class="hidden sm:inline"> so you don't have to.
                </h2>
                <p class="text-gray-400 text-lg sm:text-xl leading-relaxed max-w-2xl mx-auto">
                    Astroyds is a sole proprietorship headquartered in Maple Grove, Minnesota.
                    We operate at the intersection of technology, security, and entertainment&mdash;pushing
                    boundaries so the next generation inherits a world worth living in.
                </p>
            </div>

            <!-- Animated Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 max-w-4xl mx-auto">
                <div class="js-reveal text-center p-8 rounded-2xl bg-brand-card border border-brand-border hover:shadow-glow-blue transition-all duration-500">
                    <span class="block text-5xl sm:text-6xl font-bold bg-gradient-to-r from-electric to-purple bg-clip-text text-transparent js-counter" data-target="3">0</span>
                    <span class="block mt-2 text-gray-400 text-sm uppercase tracking-wider">Companies Launched</span>
                </div>
                <div class="js-reveal text-center p-8 rounded-2xl bg-brand-card border border-brand-border hover:shadow-glow-purple transition-all duration-500" style="transition-delay:100ms">
                    <span class="block text-5xl sm:text-6xl font-bold bg-gradient-to-r from-purple to-electric bg-clip-text text-transparent js-counter" data-target="12" data-suffix="+">0</span>
                    <span class="block mt-2 text-gray-400 text-sm uppercase tracking-wider">Projects</span>
                </div>
                <div class="js-reveal text-center p-8 rounded-2xl bg-brand-card border border-brand-border hover:shadow-glow-blue transition-all duration-500" style="transition-delay:200ms">
                    <span class="block text-5xl sm:text-6xl font-bold bg-gradient-to-r from-electric to-purple bg-clip-text text-transparent js-counter" data-target="25" data-suffix="+">0</span>
                    <span class="block mt-2 text-gray-400 text-sm uppercase tracking-wider">Team Members</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════
         OUR COMPANIES
    ════════════════════════════════════════════════════════════ -->
    <section id="our-companies" class="relative py-24 sm:py-32 overflow-hidden" aria-labelledby="companies-heading">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-electric/[0.02] to-transparent pointer-events-none" aria-hidden="true"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 sm:mb-20 js-reveal">
                <span class="inline-block text-purple text-sm font-semibold tracking-widest uppercase mb-4">Our Companies</span>
                <h2 id="companies-heading" class="font-heading text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                    Three ventures.<br class="hidden sm:inline"> One vision.
                </h2>
                <p class="text-gray-400 text-lg sm:text-xl leading-relaxed">
                    Each company tackles a distinct frontier, united by our mission to move humanity forward.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-10">
                <!-- IDLE -->
                <a href="<?= e(page_url('/companies/idle')) ?>"
                   class="group js-reveal relative flex flex-col rounded-2xl bg-brand-card border border-brand-border p-8 lg:p-10 hover:border-electric/40 hover:shadow-glow-blue transition-all duration-500 focus:outline-none focus:ring-2 focus:ring-electric focus:ring-offset-2 focus:ring-offset-navy"
                   aria-label="Learn more about IDLE">
                    <div class="flex items-center justify-center w-14 h-14 rounded-xl bg-electric/10 text-electric mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 6.087c0-.355.186-.676.401-.959.221-.29.349-.634.349-1.003 0-1.036-1.007-1.875-2.25-1.875S10.5 3.089 10.5 4.125c0 .369.128.713.349 1.003.215.283.401.604.401.959v0a.64.64 0 0 1-.657.643 48.39 48.39 0 0 1-4.163-.3c.186 1.613.293 3.25.315 4.907a.656.656 0 0 1-.658.663v0c-.355 0-.676-.186-.959-.401a1.647 1.647 0 0 0-1.003-.349c-1.036 0-1.875 1.007-1.875 2.25s.84 2.25 1.875 2.25c.369 0 .713-.128 1.003-.349.283-.215.604-.401.959-.401v0c.31 0 .555.26.532.57a48.039 48.039 0 0 1-.642 5.056c1.518.19 3.058.309 4.616.354a.64.64 0 0 0 .657-.643v0c0-.355-.186-.676-.401-.959a1.647 1.647 0 0 1-.349-1.003c0-1.035 1.008-1.875 2.25-1.875 1.243 0 2.25.84 2.25 1.875 0 .369-.128.713-.349 1.003-.215.283-.4.604-.4.959v0c0 .333.277.599.61.58a48.1 48.1 0 0 0 5.427-.63 48.05 48.05 0 0 0 .582-4.717.532.532 0 0 0-.533-.57v0c-.355 0-.676.186-.959.401-.29.221-.634.349-1.003.349-1.035 0-1.875-1.007-1.875-2.25s.84-2.25 1.875-2.25c.37 0 .713.128 1.003.349.283.215.604.401.959.401v0a.656.656 0 0 0 .658-.663 48.422 48.422 0 0 0-.37-5.36c-1.886.342-3.81.574-5.766.689a.578.578 0 0 1-.61-.58v0Z" />
                        </svg>
                    </div>
                    <h3 class="font-heading text-2xl font-bold mb-3 group-hover:text-electric transition-colors duration-300">IDLE</h3>
                    <p class="text-gray-400 leading-relaxed flex-1">
                        Redefining interactive entertainment and idle gaming experiences.
                        We craft worlds that captivate, engage, and inspire players everywhere.
                    </p>
                    <span class="inline-flex items-center mt-6 text-electric text-sm font-medium group-hover:gap-3 gap-2 transition-all duration-300">
                        Explore IDLE
                        <svg class="w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" /></svg>
                    </span>
                </a>

                <!-- RIFT -->
                <a href="<?= e(page_url('/companies/rift')) ?>"
                   class="group js-reveal relative flex flex-col rounded-2xl bg-brand-card border border-brand-border p-8 lg:p-10 hover:border-purple/40 hover:shadow-glow-purple transition-all duration-500 focus:outline-none focus:ring-2 focus:ring-purple focus:ring-offset-2 focus:ring-offset-navy"
                   style="transition-delay:100ms"
                   aria-label="Learn more about RIFT">
                    <div class="flex items-center justify-center w-14 h-14 rounded-xl bg-purple/10 text-purple mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5a17.92 17.92 0 0 1-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                        </svg>
                    </div>
                    <h3 class="font-heading text-2xl font-bold mb-3 group-hover:text-purple transition-colors duration-300">RIFT</h3>
                    <p class="text-gray-400 leading-relaxed flex-1">
                        Bridging the gap between virtual and physical realities.
                        We create immersive technologies that blur the line between worlds.
                    </p>
                    <span class="inline-flex items-center mt-6 text-purple text-sm font-medium group-hover:gap-3 gap-2 transition-all duration-300">
                        Explore RIFT
                        <svg class="w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" /></svg>
                    </span>
                </a>

                <!-- BulletPROOF -->
                <a href="<?= e(page_url('/companies/bulletproof')) ?>"
                   class="group js-reveal relative flex flex-col rounded-2xl bg-brand-card border border-brand-border p-8 lg:p-10 hover:border-electric/40 hover:shadow-glow-blue transition-all duration-500 focus:outline-none focus:ring-2 focus:ring-electric focus:ring-offset-2 focus:ring-offset-navy"
                   style="transition-delay:200ms"
                   aria-label="Learn more about BulletPROOF">
                    <div class="flex items-center justify-center w-14 h-14 rounded-xl bg-electric/10 text-electric mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                        </svg>
                    </div>
                    <h3 class="font-heading text-2xl font-bold mb-3 group-hover:text-electric transition-colors duration-300">BulletPROOF</h3>
                    <p class="text-gray-400 leading-relaxed flex-1">
                        Unbreakable security solutions for the modern enterprise.
                        We defend digital infrastructure so businesses can focus on growth.
                    </p>
                    <span class="inline-flex items-center mt-6 text-electric text-sm font-medium group-hover:gap-3 gap-2 transition-all duration-300">
                        Explore BulletPROOF
                        <svg class="w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" /></svg>
                    </span>
                </a>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════
         OUR APPROACH — Four Pillars
    ════════════════════════════════════════════════════════════ -->
    <section id="our-approach" class="relative py-24 sm:py-32 overflow-hidden" aria-labelledby="approach-heading">
        <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-px bg-gradient-to-r from-transparent via-brand-border to-transparent"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 sm:mb-20 js-reveal">
                <span class="inline-block text-electric text-sm font-semibold tracking-widest uppercase mb-4">Our Approach</span>
                <h2 id="approach-heading" class="font-heading text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                    Four pillars that<br class="hidden sm:inline"> guide everything.
                </h2>
                <p class="text-gray-400 text-lg sm:text-xl leading-relaxed">
                    Every decision we make, every product we ship, and every team we build is rooted in these principles.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Innovation -->
                <div class="js-reveal group text-center p-8 rounded-2xl bg-brand-glass border border-brand-border hover:border-electric/30 transition-all duration-500">
                    <div class="flex items-center justify-center w-16 h-16 mx-auto rounded-2xl bg-gradient-to-br from-electric/20 to-purple/20 text-electric mb-6 group-hover:shadow-glow-blue transition-shadow duration-500">
                        <svg class="w-8 h-8" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 0 0 1.5-.189m-1.5.189a6.01 6.01 0 0 1-1.5-.189m3.75 7.478a12.06 12.06 0 0 1-4.5 0m3.75 2.383a14.406 14.406 0 0 1-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 1 0-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
                        </svg>
                    </div>
                    <h3 class="font-heading text-xl font-bold mb-3">Innovation</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        We challenge assumptions and explore uncharted territory. If it hasn't been done, we want to be the first.
                    </p>
                </div>

                <!-- People -->
                <div class="js-reveal group text-center p-8 rounded-2xl bg-brand-glass border border-brand-border hover:border-purple/30 transition-all duration-500" style="transition-delay:80ms">
                    <div class="flex items-center justify-center w-16 h-16 mx-auto rounded-2xl bg-gradient-to-br from-purple/20 to-electric/20 text-purple mb-6 group-hover:shadow-glow-purple transition-shadow duration-500">
                        <svg class="w-8 h-8" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>
                    </div>
                    <h3 class="font-heading text-xl font-bold mb-3">People</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Brilliant minds deserve brilliant environments. We invest in our people because they are our greatest asset.
                    </p>
                </div>

                <!-- Impact -->
                <div class="js-reveal group text-center p-8 rounded-2xl bg-brand-glass border border-brand-border hover:border-electric/30 transition-all duration-500" style="transition-delay:160ms">
                    <div class="flex items-center justify-center w-16 h-16 mx-auto rounded-2xl bg-gradient-to-br from-electric/20 to-purple/20 text-electric mb-6 group-hover:shadow-glow-blue transition-shadow duration-500">
                        <svg class="w-8 h-8" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864a4.5 4.5 0 0 1 0 6.636.884.884 0 0 0-.405.864v.568m0-8.5A11.952 11.952 0 0 0 3 12.001c0 2.85.994 5.466 2.654 7.521m6.096-16.492A11.952 11.952 0 0 1 21 12.001a11.95 11.95 0 0 1-2.654 7.521m-6.596-16.492v.568c0 .334-.148.65-.405.864a4.5 4.5 0 0 0 0 6.636c.257.214.405.53.405.864v.568m0 0a11.97 11.97 0 0 1-2.654 7.521M12.75 20.47v-.568c0-.334-.148-.65-.405-.864a4.5 4.5 0 0 1 0-6.636.884.884 0 0 0 .405-.864v-.568m-1.5 0v.568c0 .334.148.65.405.864a4.5 4.5 0 0 1 0 6.636.884.884 0 0 0-.405.864v.568m0 0A11.952 11.952 0 0 0 5.654 19.522" />
                        </svg>
                    </div>
                    <h3 class="font-heading text-xl font-bold mb-3">Impact</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        We measure success not only by revenue but by the positive change we create in the world around us.
                    </p>
                </div>

                <!-- Excellence -->
                <div class="js-reveal group text-center p-8 rounded-2xl bg-brand-glass border border-brand-border hover:border-purple/30 transition-all duration-500" style="transition-delay:240ms">
                    <div class="flex items-center justify-center w-16 h-16 mx-auto rounded-2xl bg-gradient-to-br from-purple/20 to-electric/20 text-purple mb-6 group-hover:shadow-glow-purple transition-shadow duration-500">
                        <svg class="w-8 h-8" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                        </svg>
                    </div>
                    <h3 class="font-heading text-xl font-bold mb-3">Excellence</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Good enough never is. We hold ourselves to the highest standard in craft, code, and communication.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════
         LATEST FROM THE BLOG
    ════════════════════════════════════════════════════════════ -->
    <section id="blog" class="relative py-24 sm:py-32 overflow-hidden" aria-labelledby="blog-heading">
        <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
            <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[600px] h-px bg-gradient-to-r from-transparent via-brand-border to-transparent"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between mb-16 sm:mb-20 gap-6 js-reveal">
                <div>
                    <span class="inline-block text-purple text-sm font-semibold tracking-widest uppercase mb-4">Blog</span>
                    <h2 id="blog-heading" class="font-heading text-4xl sm:text-5xl font-bold leading-tight">
                        Latest from<br class="hidden sm:inline"> the blog.
                    </h2>
                </div>
                <a href="<?= e(page_url('/blog')) ?>" class="inline-flex items-center gap-2 text-electric hover:text-white text-sm font-medium transition-colors duration-300 shrink-0">
                    View all posts
                    <svg class="w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" /></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-10">
                <?php
                $blog_posts = [
                    [
                        'slug'    => 'sample-post-1',
                        'title'   => 'The Future of Idle Gaming and Interactive Worlds',
                        'excerpt' => 'How passive gameplay mechanics are reshaping player engagement and what IDLE is doing to lead the charge.',
                        'date'    => 'December 15, 2024',
                        'tag'     => 'Gaming',
                    ],
                    [
                        'slug'    => 'sample-post-2',
                        'title'   => 'Bridging Realities: Our Vision for Spatial Computing',
                        'excerpt' => 'RIFT\'s approach to merging virtual and physical environments in ways that feel natural and intuitive.',
                        'date'    => 'November 28, 2024',
                        'tag'     => 'Technology',
                    ],
                    [
                        'slug'    => 'sample-post-3',
                        'title'   => 'Zero-Trust Architecture in a Post-Perimeter World',
                        'excerpt' => 'BulletPROOF\'s take on why traditional security models are failing and what comes next.',
                        'date'    => 'November 10, 2024',
                        'tag'     => 'Security',
                    ],
                ];

                foreach ($blog_posts as $i => $post): ?>
                <a href="<?= e(page_url('/blog/posts/' . $post['slug'])) ?>"
                   class="group js-reveal flex flex-col rounded-2xl bg-brand-card border border-brand-border overflow-hidden hover:border-electric/30 hover:shadow-glow-blue transition-all duration-500 focus:outline-none focus:ring-2 focus:ring-electric focus:ring-offset-2 focus:ring-offset-navy"
                   style="transition-delay:<?= $i * 100 ?>ms">
                    <div class="aspect-video bg-gradient-to-br from-electric/10 to-purple/10 relative overflow-hidden">
                        <div class="absolute inset-0 flex items-center justify-center text-gray-600">
                            <svg class="w-12 h-12 opacity-30" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0 0 22.5 18.75V5.25A2.25 2.25 0 0 0 20.25 3H3.75A2.25 2.25 0 0 0 1.5 5.25v13.5A2.25 2.25 0 0 0 3.75 21Z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex flex-col flex-1 p-6 lg:p-8">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="text-xs font-semibold uppercase tracking-wider text-electric bg-electric/10 px-3 py-1 rounded-full"><?= e($post['tag']) ?></span>
                            <time class="text-xs text-gray-500" datetime="2024-12-15"><?= e($post['date']) ?></time>
                        </div>
                        <h3 class="font-heading text-lg font-bold mb-3 group-hover:text-electric transition-colors duration-300 line-clamp-2"><?= e($post['title']) ?></h3>
                        <p class="text-gray-400 text-sm leading-relaxed flex-1 line-clamp-3"><?= e($post['excerpt']) ?></p>
                        <span class="inline-flex items-center mt-4 text-electric text-sm font-medium group-hover:gap-3 gap-2 transition-all duration-300">
                            Read more
                            <svg class="w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" /></svg>
                        </span>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════
         RESEARCH & DEVELOPMENT
    ════════════════════════════════════════════════════════════ -->
    <section id="research" class="relative py-24 sm:py-32 overflow-hidden" aria-labelledby="research-heading">
        <div class="absolute inset-0 bg-gradient-to-br from-electric/[0.03] via-transparent to-purple/[0.03] pointer-events-none" aria-hidden="true"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                <div class="js-reveal">
                    <span class="inline-block text-electric text-sm font-semibold tracking-widest uppercase mb-4">R&amp;D</span>
                    <h2 id="research-heading" class="font-heading text-4xl sm:text-5xl font-bold mb-6 leading-tight">
                        Research &amp;<br class="hidden sm:inline"> Development
                    </h2>
                    <p class="text-gray-400 text-lg leading-relaxed mb-6">
                        Our R&amp;D division explores emerging technologies before they reach the mainstream&mdash;from
                        generative AI and spatial computing to next-generation cryptographic protocols.
                    </p>
                    <p class="text-gray-400 leading-relaxed mb-8">
                        We publish our findings, open-source our tools, and collaborate with academic
                        institutions to accelerate progress across every frontier we touch.
                    </p>
                    <a href="<?= e(page_url('/research')) ?>"
                       class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-gradient-to-r from-electric to-purple text-white font-semibold text-sm hover:opacity-90 transition-opacity duration-300 focus:outline-none focus:ring-2 focus:ring-electric focus:ring-offset-2 focus:ring-offset-navy">
                        Explore Our Research
                        <svg class="w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" /></svg>
                    </a>
                </div>

                <div class="js-reveal relative" style="transition-delay:150ms">
                    <div class="aspect-square rounded-2xl bg-brand-card border border-brand-border p-8 lg:p-12 flex flex-col justify-center relative overflow-hidden">
                        <div class="absolute -top-20 -right-20 w-60 h-60 bg-electric/5 rounded-full blur-3xl" aria-hidden="true"></div>
                        <div class="absolute -bottom-20 -left-20 w-60 h-60 bg-purple/5 rounded-full blur-3xl" aria-hidden="true"></div>

                        <div class="relative space-y-6">
                            <div class="flex items-center gap-4">
                                <div class="w-3 h-3 rounded-full bg-electric animate-pulse-slow"></div>
                                <span class="text-gray-400 text-sm font-mono">Generative AI &amp; LLMs</span>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="w-3 h-3 rounded-full bg-purple animate-pulse-slow" style="animation-delay:0.5s"></div>
                                <span class="text-gray-400 text-sm font-mono">Spatial Computing &amp; XR</span>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="w-3 h-3 rounded-full bg-electric animate-pulse-slow" style="animation-delay:1s"></div>
                                <span class="text-gray-400 text-sm font-mono">Post-Quantum Cryptography</span>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="w-3 h-3 rounded-full bg-purple animate-pulse-slow" style="animation-delay:1.5s"></div>
                                <span class="text-gray-400 text-sm font-mono">Edge Computing &amp; IoT</span>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="w-3 h-3 rounded-full bg-electric animate-pulse-slow" style="animation-delay:2s"></div>
                                <span class="text-gray-400 text-sm font-mono">Autonomous Systems</span>
                            </div>
                        </div>

                        <div class="mt-10 pt-6 border-t border-brand-border">
                            <p class="text-gray-500 text-xs uppercase tracking-wider">Active research tracks</p>
                            <p class="text-3xl font-bold bg-gradient-to-r from-electric to-purple bg-clip-text text-transparent mt-1">5 Programs</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════
         CALL TO ACTION
    ════════════════════════════════════════════════════════════ -->
    <section id="cta" class="relative py-24 sm:py-32 overflow-hidden" aria-labelledby="cta-heading">
        <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-electric/[0.04] rounded-full blur-3xl"></div>
        </div>

        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center js-reveal">
            <h2 id="cta-heading" class="font-heading text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                Ready to build<br class="hidden sm:inline"> the future?
            </h2>
            <p class="text-gray-400 text-lg sm:text-xl leading-relaxed max-w-2xl mx-auto mb-10">
                Whether you have a bold idea, a tough challenge, or simply want to say hello&mdash;we'd love to hear from you.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="<?= e(page_url('/contact')) ?>"
                   class="inline-flex items-center gap-2 px-8 py-4 rounded-lg bg-gradient-to-r from-electric to-purple text-white font-semibold hover:opacity-90 transition-opacity duration-300 shadow-glow-blue focus:outline-none focus:ring-2 focus:ring-electric focus:ring-offset-2 focus:ring-offset-navy">
                    Get in Touch
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" /></svg>
                </a>
                <a href="mailto:<?= e(SITE_EMAIL) ?>"
                   class="inline-flex items-center gap-2 px-8 py-4 rounded-lg border border-brand-border text-gray-300 font-semibold hover:border-electric/40 hover:text-white transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-electric focus:ring-offset-2 focus:ring-offset-navy">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" /></svg>
                    <?= e(SITE_EMAIL) ?>
                </a>
            </div>
        </div>
    </section>

</main>

<!-- ═══════════════════════════════════════════════════════════
     SCHEMA.ORG STRUCTURED DATA (JSON-LD)
════════════════════════════════════════════════════════════ -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@graph": [
        {
            "@type": "Organization",
            "@id": "<?= e(page_url('/')) ?>#organization",
            "name": "Astroyds",
            "url": "<?= e(page_url('/')) ?>",
            "logo": {
                "@type": "ImageObject",
                "url": "<?= e(page_url('/assets/images/logo.png')) ?>"
            },
            "description": "Moving humanity forward for a better future.",
            "email": "letstalk@astroyds.com",
            "address": {
                "@type": "PostalAddress",
                "addressLocality": "Maple Grove",
                "addressRegion": "MN",
                "postalCode": "55311",
                "addressCountry": "US"
            },
            "sameAs": [],
            "subOrganization": [
                {
                    "@type": "Organization",
                    "name": "IDLE",
                    "url": "<?= e(page_url('/companies/idle')) ?>",
                    "description": "Redefining interactive entertainment and idle gaming experiences"
                },
                {
                    "@type": "Organization",
                    "name": "RIFT",
                    "url": "<?= e(page_url('/companies/rift')) ?>",
                    "description": "Bridging the gap between virtual and physical realities"
                },
                {
                    "@type": "Organization",
                    "name": "BulletPROOF",
                    "url": "<?= e(page_url('/companies/bulletproof')) ?>",
                    "description": "Unbreakable security solutions for the modern enterprise"
                }
            ]
        },
        {
            "@type": "WebSite",
            "@id": "<?= e(page_url('/')) ?>#website",
            "name": "Astroyds",
            "url": "<?= e(page_url('/')) ?>",
            "publisher": {
                "@id": "<?= e(page_url('/')) ?>#organization"
            },
            "description": "Moving humanity forward for a better future.",
            "potentialAction": {
                "@type": "SearchAction",
                "target": {
                    "@type": "EntryPoint",
                    "urlTemplate": "<?= e(page_url('/search?q={search_term_string}')) ?>"
                },
                "query-input": "required name=search_term_string"
            }
        }
    ]
}
</script>

<!-- ═══════════════════════════════════════════════════════════
     SCROLL ANIMATION & COUNTER SCRIPT
════════════════════════════════════════════════════════════ -->
<script>
(function () {
    'use strict';

    /* ── Intersection Observer for reveal animations ── */
    var revealElements = document.querySelectorAll('.js-reveal');
    if ('IntersectionObserver' in window) {
        var revealObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in-up');
                    entry.target.style.opacity = '1';
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

        revealElements.forEach(function (el) {
            el.style.opacity = '0';
            revealObserver.observe(el);
        });
    } else {
        revealElements.forEach(function (el) { el.style.opacity = '1'; });
    }

    /* ── Animated counters ── */
    var counters = document.querySelectorAll('.js-counter');
    if ('IntersectionObserver' in window && counters.length) {
        var counterObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                var el     = entry.target;
                var target = parseInt(el.getAttribute('data-target'), 10);
                var suffix = el.getAttribute('data-suffix') || '';
                var start  = 0;
                var duration = 1600;
                var startTime = null;

                function step(timestamp) {
                    if (!startTime) startTime = timestamp;
                    var progress = Math.min((timestamp - startTime) / duration, 1);
                    var eased    = 1 - Math.pow(1 - progress, 3);
                    el.textContent = Math.floor(eased * target) + suffix;
                    if (progress < 1) requestAnimationFrame(step);
                }

                requestAnimationFrame(step);
                counterObserver.unobserve(el);
            });
        }, { threshold: 0.5 });

        counters.forEach(function (el) { counterObserver.observe(el); });
    }

    /* ── Respect prefers-reduced-motion ── */
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        revealElements.forEach(function (el) {
            el.style.opacity = '1';
            el.classList.remove('animate-fade-in-up');
        });
        counters.forEach(function (el) {
            el.textContent = el.getAttribute('data-target') + (el.getAttribute('data-suffix') || '');
        });
    }
})();
</script>

<?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>
