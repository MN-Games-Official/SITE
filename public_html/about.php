<?php
require_once __DIR__ . '/src/php/config.php';
require_once __DIR__ . '/src/php/headers.php';
require_once __DIR__ . '/src/php/template_helpers.php';

send_security_headers();

// ════════════════════════════════════════════════════════════════
// Page meta
// ════════════════════════════════════════════════════════════════
$page_title       = 'About';
$page_description = 'Learn about Astroyds — our origin story, mission, values, and the teams behind IDLE, RIFT, and BulletPROOF. Moving humanity forward for a better future.';
$page_url         = page_url('/about');
$page_image       = page_url('/assets/images/og-about.png');
?>
<!-- DRAFT COPY -->
<?php include __DIR__ . '/partials/meta.php'; ?>

<body class="bg-navy text-white font-body antialiased">
<?php include __DIR__ . '/partials/header.php'; ?>

<main id="main-content" class="flex-1">

    <!-- ═══════════════════════════════════════════════════════════
         HERO
    ════════════════════════════════════════════════════════════ -->
    <section id="hero"
             class="relative py-28 sm:py-36 lg:py-44 overflow-hidden"
             aria-labelledby="hero-heading">

        <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
            <div class="absolute top-1/4 -left-40 w-[32rem] h-[32rem] bg-electric/5 rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 -right-40 w-[28rem] h-[28rem] bg-purple/5 rounded-full blur-3xl"></div>
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-px bg-gradient-to-r from-transparent via-electric/20 to-transparent"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-block text-electric text-sm font-semibold tracking-widest uppercase mb-4 animate-fade-in">
                Our Story
            </span>
            <h1 id="hero-heading"
                class="font-heading text-5xl sm:text-6xl lg:text-7xl font-bold mb-6 leading-tight animate-fade-in-up">
                About <span class="text-electric">Astroyds</span>
            </h1>
            <p class="text-gray-400 text-lg sm:text-xl lg:text-2xl leading-relaxed max-w-3xl mx-auto animate-fade-in-up">
                Moving humanity forward for a better future.
            </p>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════
         ORIGIN STORY
    ════════════════════════════════════════════════════════════ -->
    <section id="origin"
             class="relative py-24 sm:py-32 overflow-hidden"
             aria-labelledby="origin-heading">

        <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple/5 rounded-full blur-3xl"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                <div class="js-reveal">
                    <span class="inline-block text-electric text-sm font-semibold tracking-widest uppercase mb-4">
                        Where It Began
                    </span>
                    <h2 id="origin-heading"
                        class="font-heading text-4xl sm:text-5xl font-bold mb-6 leading-tight">
                        Born From a <span class="text-electric">Bold</span> Idea
                    </h2>
                    <div class="space-y-5 text-gray-400 text-lg leading-relaxed">
                        <p>
                            Astroyds started with a simple conviction: the tools shaping tomorrow
                            shouldn't be locked behind corporate gatekeepers. Founded in Maple&nbsp;Grove,
                            Minnesota, we set out to build technology that empowers people — not
                            the other way around.
                        </p>
                        <p>
                            What began as a one-person mission quickly grew into a family of
                            focused sub-companies — <strong class="text-white">IDLE</strong>,
                            <strong class="text-white">RIFT</strong>, and
                            <strong class="text-white">BulletPROOF</strong> — each tackling a
                            different frontier of innovation while sharing the same DNA of
                            craftsmanship and purpose.
                        </p>
                        <p>
                            We believe great work happens when talented minds are given room to
                            experiment, fail fast, and iterate relentlessly. That ethos is baked
                            into everything we ship.
                        </p>
                    </div>
                </div>

                <div class="js-reveal flex items-center justify-center" aria-hidden="true">
                    <div class="relative w-72 h-72 sm:w-80 sm:h-80 lg:w-96 lg:h-96">
                        <div class="absolute inset-0 rounded-full border border-electric/20 animate-pulse-slow"></div>
                        <div class="absolute inset-6 rounded-full border border-purple/20 animate-pulse-slow" style="animation-delay:.4s"></div>
                        <div class="absolute inset-12 rounded-full border border-electric/20 animate-pulse-slow" style="animation-delay:.8s"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <svg class="w-20 h-20 text-electric animate-float" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.58-5.84a14.927 14.927 0 0 1-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                            </svg>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════
         VISION & MISSION
    ════════════════════════════════════════════════════════════ -->
    <section id="vision-mission"
             class="relative py-24 sm:py-32 overflow-hidden"
             aria-labelledby="vision-heading">

        <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
            <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-brand-border to-transparent"></div>
            <div class="absolute top-1/3 left-1/4 w-80 h-80 bg-electric/5 rounded-full blur-3xl"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 sm:mb-20 js-reveal">
                <span class="inline-block text-electric text-sm font-semibold tracking-widest uppercase mb-4">
                    Why We Exist
                </span>
                <h2 id="vision-heading"
                    class="font-heading text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                    Vision &amp; <span class="text-purple-400">Mission</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 lg:gap-14">
                <!-- Vision -->
                <div class="js-reveal rounded-2xl bg-brand-card border border-brand-border p-10 lg:p-12
                            hover:border-electric/40 hover:shadow-glow-blue transition-all duration-500">
                    <div class="flex items-center justify-center w-14 h-14 rounded-xl bg-electric/10 text-electric mb-6">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>
                    </div>
                    <h3 class="font-heading text-2xl sm:text-3xl font-bold mb-4">Our Vision</h3>
                    <p class="text-gray-400 text-lg leading-relaxed">
                        A world where breakthrough technology is accessible to everyone — where
                        innovation isn't a luxury but a universal catalyst for progress. We
                        envision a future shaped by builders who put people first.
                    </p>
                </div>

                <!-- Mission -->
                <div class="js-reveal rounded-2xl bg-brand-card border border-brand-border p-10 lg:p-12
                            hover:border-purple/40 hover:shadow-glow-purple transition-all duration-500">
                    <div class="flex items-center justify-center w-14 h-14 rounded-xl bg-purple/10 text-purple-400 mb-6">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.58-5.84a14.927 14.927 0 0 1-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                        </svg>
                    </div>
                    <h3 class="font-heading text-2xl sm:text-3xl font-bold mb-4">Our Mission</h3>
                    <p class="text-gray-400 text-lg leading-relaxed">
                        Building the future, so you don't have to. We create the platforms,
                        tools, and systems that let people focus on what matters most — while
                        we handle the heavy engineering underneath.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════
         CORE VALUES
    ════════════════════════════════════════════════════════════ -->
    <section id="values"
             class="relative py-24 sm:py-32 overflow-hidden"
             aria-labelledby="values-heading">

        <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
            <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-brand-border to-transparent"></div>
            <div class="absolute bottom-1/3 -right-32 w-96 h-96 bg-purple/5 rounded-full blur-3xl"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 sm:mb-20 js-reveal">
                <span class="inline-block text-electric text-sm font-semibold tracking-widest uppercase mb-4">
                    What We Stand For
                </span>
                <h2 id="values-heading"
                    class="font-heading text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                    Core <span class="text-electric">Values</span>
                </h2>
                <p class="text-gray-400 text-lg sm:text-xl leading-relaxed max-w-2xl mx-auto">
                    Six principles guide every decision we make — from the code we write to
                    the partnerships we forge.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">

                <!-- Innovation -->
                <div class="js-reveal group rounded-2xl bg-brand-card border border-brand-border p-8 lg:p-10
                            hover:border-electric/40 hover:shadow-glow-blue transition-all duration-500">
                    <div class="flex items-center justify-center w-14 h-14 rounded-xl bg-electric/10 text-electric mb-6
                                group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 18v-5.25m0 0a6.01 6.01 0 0 0 1.5-.189m-1.5.189a6.01 6.01 0 0 1-1.5-.189m3.75 7.478a12.06 12.06 0 0 1-4.5 0m3.75 2.383a14.406 14.406 0 0 1-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 1 0-7.517 0c.85.493 1.509 1.333 1.509 2.316V18"/>
                        </svg>
                    </div>
                    <h3 class="font-heading text-2xl font-bold mb-3
                              group-hover:text-electric transition-colors duration-300">Innovation</h3>
                    <p class="text-gray-400 leading-relaxed">
                        We challenge the status quo relentlessly. Every product starts with the
                        question "What if?" — and we don't stop until the answer ships.
                    </p>
                </div>

                <!-- Integrity -->
                <div class="js-reveal group rounded-2xl bg-brand-card border border-brand-border p-8 lg:p-10
                            hover:border-purple/40 hover:shadow-glow-purple transition-all duration-500">
                    <div class="flex items-center justify-center w-14 h-14 rounded-xl bg-purple/10 text-purple-400 mb-6
                                group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/>
                        </svg>
                    </div>
                    <h3 class="font-heading text-2xl font-bold mb-3
                              group-hover:text-purple-400 transition-colors duration-300">Integrity</h3>
                    <p class="text-gray-400 leading-relaxed">
                        Trust is earned in drops and lost in buckets. We operate with radical
                        transparency — in our code, our communication, and our commitments.
                    </p>
                </div>

                <!-- Impact -->
                <div class="js-reveal group rounded-2xl bg-brand-card border border-brand-border p-8 lg:p-10
                            hover:border-electric/40 hover:shadow-glow-blue transition-all duration-500">
                    <div class="flex items-center justify-center w-14 h-14 rounded-xl bg-electric/10 text-electric mb-6
                                group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z"/>
                        </svg>
                    </div>
                    <h3 class="font-heading text-2xl font-bold mb-3
                              group-hover:text-electric transition-colors duration-300">Impact</h3>
                    <p class="text-gray-400 leading-relaxed">
                        We measure success not by lines of code but by lives improved. Every
                        feature we build must move the needle for real people in meaningful ways.
                    </p>
                </div>

                <!-- Excellence -->
                <div class="js-reveal group rounded-2xl bg-brand-card border border-brand-border p-8 lg:p-10
                            hover:border-purple/40 hover:shadow-glow-purple transition-all duration-500">
                    <div class="flex items-center justify-center w-14 h-14 rounded-xl bg-purple/10 text-purple-400 mb-6
                                group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"/>
                        </svg>
                    </div>
                    <h3 class="font-heading text-2xl font-bold mb-3
                              group-hover:text-purple-400 transition-colors duration-300">Excellence</h3>
                    <p class="text-gray-400 leading-relaxed">
                        Good enough never is. We obsess over craft — from pixel-perfect
                        interfaces to battle-tested back-ends — because details compound into
                        extraordinary products.
                    </p>
                </div>

                <!-- Collaboration -->
                <div class="js-reveal group rounded-2xl bg-brand-card border border-brand-border p-8 lg:p-10
                            hover:border-electric/40 hover:shadow-glow-blue transition-all duration-500">
                    <div class="flex items-center justify-center w-14 h-14 rounded-xl bg-electric/10 text-electric mb-6
                                group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/>
                        </svg>
                    </div>
                    <h3 class="font-heading text-2xl font-bold mb-3
                              group-hover:text-electric transition-colors duration-300">Collaboration</h3>
                    <p class="text-gray-400 leading-relaxed">
                        The best ideas emerge at intersections. We cultivate an open culture
                        where designers, engineers, and dreamers build together across every
                        boundary.
                    </p>
                </div>

                <!-- Sustainability -->
                <div class="js-reveal group rounded-2xl bg-brand-card border border-brand-border p-8 lg:p-10
                            hover:border-purple/40 hover:shadow-glow-purple transition-all duration-500">
                    <div class="flex items-center justify-center w-14 h-14 rounded-xl bg-purple/10 text-purple-400 mb-6
                                group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12.75 3.03v.568c0 .334.148.65.405.864a4.5 4.5 0 0 1 0 6.635 .626.626 0 0 0-.405.864v.568m0-9.5a4.49 4.49 0 0 0-3.397 1.549 4.49 4.49 0 0 0-3.397-1.549 4.49 4.49 0 0 0-3.689 1.926C.979 6.27.75 8.012.75 9.824c0 4.83 4.396 8.342 9.065 11.274a5.76 5.76 0 0 0 5.87 0c4.669-2.932 9.065-6.443 9.065-11.274 0-1.812-.228-3.554-.906-5.143A4.49 4.49 0 0 0 20.147 2.53a4.49 4.49 0 0 0-3.397 1.549A4.49 4.49 0 0 0 12.75 3.03Z"/>
                        </svg>
                    </div>
                    <h3 class="font-heading text-2xl font-bold mb-3
                              group-hover:text-purple-400 transition-colors duration-300">Sustainability</h3>
                    <p class="text-gray-400 leading-relaxed">
                        We build to last — sustainable code, sustainable teams, sustainable
                        impact. Short-term hacks have no home here; long-term thinking drives
                        every architecture decision.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════
         TIMELINE
    ════════════════════════════════════════════════════════════ -->
    <section id="timeline"
             class="relative py-24 sm:py-32 overflow-hidden"
             aria-labelledby="timeline-heading">

        <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
            <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-brand-border to-transparent"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[40rem] h-[40rem] bg-electric/3 rounded-full blur-3xl"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 sm:mb-20 js-reveal">
                <span class="inline-block text-electric text-sm font-semibold tracking-widest uppercase mb-4">
                    Milestones
                </span>
                <h2 id="timeline-heading"
                    class="font-heading text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                    Our <span class="text-electric">Journey</span>
                </h2>
                <p class="text-gray-400 text-lg sm:text-xl leading-relaxed max-w-2xl mx-auto">
                    Key moments that have shaped Astroyds from day one.
                </p>
            </div>

            <!-- Vertical timeline -->
            <div class="relative max-w-3xl mx-auto">
                <!-- Center line -->
                <div class="absolute left-4 sm:left-1/2 sm:-translate-x-px top-0 bottom-0 w-0.5 bg-brand-border" aria-hidden="true"></div>

                <!-- 2023 -->
                <div class="js-reveal relative pl-14 sm:pl-0 sm:grid sm:grid-cols-2 sm:gap-10 mb-16">
                    <div class="sm:text-right sm:pr-10">
                        <span class="text-electric font-heading text-2xl font-bold">2023</span>
                        <h3 class="font-heading text-xl font-bold mt-2 mb-2">The Spark</h3>
                        <p class="text-gray-400 leading-relaxed">
                            Astroyds is founded in Maple Grove, MN as a sole proprietorship.
                            Initial research begins on core platform architecture and the first
                            lines of code are written.
                        </p>
                    </div>
                    <div class="hidden sm:block" aria-hidden="true"></div>
                    <div class="absolute left-2 sm:left-1/2 sm:-translate-x-1/2 top-1 w-5 h-5 rounded-full bg-electric border-4 border-navy" aria-hidden="true"></div>
                </div>

                <!-- 2024 -->
                <div class="js-reveal relative pl-14 sm:pl-0 sm:grid sm:grid-cols-2 sm:gap-10 mb-16">
                    <div class="hidden sm:block" aria-hidden="true"></div>
                    <div class="sm:pl-10">
                        <span class="text-purple-400 font-heading text-2xl font-bold">2024</span>
                        <h3 class="font-heading text-xl font-bold mt-2 mb-2">Sub-Companies Launch</h3>
                        <p class="text-gray-400 leading-relaxed">
                            IDLE, RIFT, and BulletPROOF are established as focused
                            sub-companies. The team grows, and the first products enter private
                            beta with early adopters.
                        </p>
                    </div>
                    <div class="absolute left-2 sm:left-1/2 sm:-translate-x-1/2 top-1 w-5 h-5 rounded-full bg-purple-400 border-4 border-navy" aria-hidden="true"></div>
                </div>

                <!-- 2025 -->
                <div class="js-reveal relative pl-14 sm:pl-0 sm:grid sm:grid-cols-2 sm:gap-10 mb-16">
                    <div class="sm:text-right sm:pr-10">
                        <span class="text-electric font-heading text-2xl font-bold">2025</span>
                        <h3 class="font-heading text-xl font-bold mt-2 mb-2">Public Launch</h3>
                        <p class="text-gray-400 leading-relaxed">
                            Core products reach general availability. Strategic partnerships
                            are forged, and the Astroyds ecosystem opens to a wider community
                            of developers and creators.
                        </p>
                    </div>
                    <div class="hidden sm:block" aria-hidden="true"></div>
                    <div class="absolute left-2 sm:left-1/2 sm:-translate-x-1/2 top-1 w-5 h-5 rounded-full bg-electric border-4 border-navy" aria-hidden="true"></div>
                </div>

                <!-- Future -->
                <div class="js-reveal relative pl-14 sm:pl-0 sm:grid sm:grid-cols-2 sm:gap-10">
                    <div class="hidden sm:block" aria-hidden="true"></div>
                    <div class="sm:pl-10">
                        <span class="text-purple-400 font-heading text-2xl font-bold">Beyond</span>
                        <h3 class="font-heading text-xl font-bold mt-2 mb-2">The Horizon</h3>
                        <p class="text-gray-400 leading-relaxed">
                            New verticals, deeper integrations, and a growing global presence.
                            The roadmap is ambitious — and we're just getting started.
                        </p>
                    </div>
                    <div class="absolute left-2 sm:left-1/2 sm:-translate-x-1/2 top-1 w-5 h-5 rounded-full bg-purple-400 border-4 border-navy animate-pulse-slow" aria-hidden="true"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════
         LEADERSHIP
    ════════════════════════════════════════════════════════════ -->
    <section id="leadership"
             class="relative py-24 sm:py-32 overflow-hidden"
             aria-labelledby="leadership-heading">

        <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
            <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-brand-border to-transparent"></div>
            <div class="absolute top-1/4 -right-32 w-80 h-80 bg-electric/5 rounded-full blur-3xl"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 sm:mb-20 js-reveal">
                <span class="inline-block text-electric text-sm font-semibold tracking-widest uppercase mb-4">
                    The Team
                </span>
                <h2 id="leadership-heading"
                    class="font-heading text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                    Leadership
                </h2>
                <p class="text-gray-400 text-lg sm:text-xl leading-relaxed max-w-2xl mx-auto">
                    A lean team of builders and thinkers steering the Astroyds mission.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-10">

                <!-- CEO -->
                <div class="js-reveal group rounded-2xl bg-brand-card border border-brand-border p-8
                            hover:border-electric/40 hover:shadow-glow-blue transition-all duration-500 text-center">
                    <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-gradient-to-br from-electric/20 to-purple/20 border-2 border-brand-border
                                flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                        <svg class="w-10 h-10 text-electric" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                        </svg>
                    </div>
                    <h3 class="font-heading text-xl font-bold mb-1 group-hover:text-electric transition-colors duration-300">
                        Chief Executive Officer
                    </h3>
                    <p class="text-electric text-sm font-medium mb-3">CEO &amp; Founder</p>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Visionary leader charting the course for Astroyds and its family of companies.
                    </p>
                </div>

                <!-- CTO -->
                <div class="js-reveal group rounded-2xl bg-brand-card border border-brand-border p-8
                            hover:border-purple/40 hover:shadow-glow-purple transition-all duration-500 text-center">
                    <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-gradient-to-br from-purple/20 to-electric/20 border-2 border-brand-border
                                flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                        <svg class="w-10 h-10 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                        </svg>
                    </div>
                    <h3 class="font-heading text-xl font-bold mb-1 group-hover:text-purple-400 transition-colors duration-300">
                        Chief Technology Officer
                    </h3>
                    <p class="text-purple-400 text-sm font-medium mb-3">CTO</p>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Architecting the technical backbone that powers every Astroyds product.
                    </p>
                </div>

                <!-- COO -->
                <div class="js-reveal group rounded-2xl bg-brand-card border border-brand-border p-8
                            hover:border-electric/40 hover:shadow-glow-blue transition-all duration-500 text-center">
                    <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-gradient-to-br from-electric/20 to-purple/20 border-2 border-brand-border
                                flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                        <svg class="w-10 h-10 text-electric" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                        </svg>
                    </div>
                    <h3 class="font-heading text-xl font-bold mb-1 group-hover:text-electric transition-colors duration-300">
                        Chief Operating Officer
                    </h3>
                    <p class="text-electric text-sm font-medium mb-3">COO</p>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Keeping the engine running — operations, strategy, and cross-team alignment.
                    </p>
                </div>

                <!-- Head of Security -->
                <div class="js-reveal group rounded-2xl bg-brand-card border border-brand-border p-8
                            hover:border-purple/40 hover:shadow-glow-purple transition-all duration-500 text-center">
                    <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-gradient-to-br from-purple/20 to-electric/20 border-2 border-brand-border
                                flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                        <svg class="w-10 h-10 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                        </svg>
                    </div>
                    <h3 class="font-heading text-xl font-bold mb-1 group-hover:text-purple-400 transition-colors duration-300">
                        Head of Security
                    </h3>
                    <p class="text-purple-400 text-sm font-medium mb-3">CISO</p>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Safeguarding systems, data, and trust across the entire Astroyds ecosystem.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════
         CULTURE
    ════════════════════════════════════════════════════════════ -->
    <section id="culture"
             class="relative py-24 sm:py-32 overflow-hidden"
             aria-labelledby="culture-heading">

        <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
            <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-brand-border to-transparent"></div>
            <div class="absolute bottom-1/4 left-1/4 w-96 h-96 bg-purple/5 rounded-full blur-3xl"></div>
            <div class="absolute top-1/4 right-1/4 w-80 h-80 bg-electric/5 rounded-full blur-3xl"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                <div class="js-reveal">
                    <span class="inline-block text-electric text-sm font-semibold tracking-widest uppercase mb-4">
                        Life at Astroyds
                    </span>
                    <h2 id="culture-heading"
                        class="font-heading text-4xl sm:text-5xl font-bold mb-6 leading-tight">
                        Where <span class="text-electric">Builders</span> Thrive
                    </h2>
                    <div class="space-y-5 text-gray-400 text-lg leading-relaxed">
                        <p>
                            We're remote-first and results-driven. No micromanagement, no
                            pointless meetings — just focused time to do your best work. Our
                            team spans disciplines but shares one trait: an obsession with
                            shipping things that matter.
                        </p>
                        <p>
                            Continuous learning is woven into our DNA. Whether it's
                            experimenting with a new framework, diving into a research paper,
                            or pair-programming through a gnarly bug, growth is the default
                            setting.
                        </p>
                    </div>
                </div>

                <div class="js-reveal grid grid-cols-2 gap-6">
                    <div class="rounded-2xl bg-brand-card border border-brand-border p-6 text-center
                                hover:border-electric/40 hover:shadow-glow-blue transition-all duration-500">
                        <span class="block font-heading text-3xl sm:text-4xl font-bold text-electric mb-2">100%</span>
                        <span class="text-gray-400 text-sm">Remote-First</span>
                    </div>
                    <div class="rounded-2xl bg-brand-card border border-brand-border p-6 text-center
                                hover:border-purple/40 hover:shadow-glow-purple transition-all duration-500">
                        <span class="block font-heading text-3xl sm:text-4xl font-bold text-purple-400 mb-2">3</span>
                        <span class="text-gray-400 text-sm">Sub-Companies</span>
                    </div>
                    <div class="rounded-2xl bg-brand-card border border-brand-border p-6 text-center
                                hover:border-purple/40 hover:shadow-glow-purple transition-all duration-500">
                        <span class="block font-heading text-3xl sm:text-4xl font-bold text-purple-400 mb-2">∞</span>
                        <span class="text-gray-400 text-sm">Curiosity</span>
                    </div>
                    <div class="rounded-2xl bg-brand-card border border-brand-border p-6 text-center
                                hover:border-electric/40 hover:shadow-glow-blue transition-all duration-500">
                        <span class="block font-heading text-3xl sm:text-4xl font-bold text-electric mb-2">24/7</span>
                        <span class="text-gray-400 text-sm">Building</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════
         JOIN US CTA
    ════════════════════════════════════════════════════════════ -->
    <section id="join-us"
             class="relative py-24 sm:py-32 overflow-hidden"
             aria-labelledby="join-heading">

        <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
            <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-brand-border to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-electric/5 to-transparent"></div>
        </div>

        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center js-reveal">
            <span class="inline-block text-electric text-sm font-semibold tracking-widest uppercase mb-4">
                Get Involved
            </span>
            <h2 id="join-heading"
                class="font-heading text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                Ready to Build the <span class="text-electric">Future</span>?
            </h2>
            <p class="text-gray-400 text-lg sm:text-xl leading-relaxed max-w-2xl mx-auto mb-10">
                Whether you want to collaborate, partner, or just say hello — we'd love to
                hear from you. Let's move humanity forward, together.
            </p>
            <a href="<?= e(page_url('/contact')) ?>"
               class="inline-flex items-center gap-2 px-8 py-4 rounded-xl font-semibold text-lg
                      bg-electric text-white hover:bg-blue-600
                      shadow-glow-blue hover:shadow-lg
                      transition-all duration-300
                      focus:outline-none focus:ring-2 focus:ring-electric focus:ring-offset-2 focus:ring-offset-navy">
                Let's Talk
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                </svg>
            </a>
        </div>
    </section>

</main>

<!-- ═══════════════════════════════════════════════════════════
     STRUCTURED DATA
════════════════════════════════════════════════════════════ -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Astroyds",
    "url": "<?= e(page_url('/')) ?>",
    "description": "Moving humanity forward for a better future.",
    "address": {
        "@type": "PostalAddress",
        "addressLocality": "Maple Grove",
        "addressRegion": "MN",
        "postalCode": "55311",
        "addressCountry": "US"
    },
    "email": "letstalk@astroyds.com",
    "subOrganization": [
        { "@type": "Organization", "name": "IDLE" },
        { "@type": "Organization", "name": "RIFT" },
        { "@type": "Organization", "name": "BulletPROOF" }
    ]
}
</script>

<!-- ═══════════════════════════════════════════════════════════
     SCROLL REVEAL
════════════════════════════════════════════════════════════ -->
<script>
(function () {
    'use strict';

    var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ── Intersection-observer reveal ─────────────────────── */
    var reveals = document.querySelectorAll('.js-reveal');
    if (!reveals.length || prefersReduced) {
        reveals.forEach(function (el) { el.style.opacity = '1'; });
        return;
    }

    reveals.forEach(function (el) { el.style.opacity = '0'; el.style.transform = 'translateY(24px)'; });

    var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.style.transition = 'opacity .6s ease, transform .6s ease';
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                io.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });

    reveals.forEach(function (el) { io.observe(el); });
})();
</script>

<?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>
