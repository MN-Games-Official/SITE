<?php
// 404.php — Astroyds Custom 404 "Lost in Space" Page
// <!-- DRAFT COPY -->

require __DIR__ . '/src/php/config.php';
require __DIR__ . '/src/php/headers.php';
require __DIR__ . '/src/php/template_helpers.php';

send_security_headers();
http_response_code(404);

$pageTitle = '404 — Lost in Space — Astroyds';
$pageDescription = 'The page you are looking for could not be found. You seem to have drifted into uncharted space.';
$pageKeywords = '404, page not found, Astroyds';
$canonicalURL = SITE_URL . '/404';
$currentPage = '404';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include __DIR__ . '/partials/meta.php'; ?>
    <style>
        /* Animated Stars Background */
        .stars-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
            pointer-events: none;
        }

        .star {
            position: absolute;
            background: white;
            border-radius: 50%;
            animation: twinkle var(--duration) ease-in-out infinite alternate,
                       drift var(--drift-duration) linear infinite;
        }

        @keyframes twinkle {
            0% { opacity: 0.1; transform: scale(0.8); }
            100% { opacity: 1; transform: scale(1.2); }
        }

        @keyframes drift {
            0% { transform: translateY(0) translateX(0); }
            100% { transform: translateY(-20px) translateX(10px); }
        }

        .shooting-star {
            position: absolute;
            width: 3px;
            height: 3px;
            background: linear-gradient(to right, rgba(255, 255, 255, 0), white);
            border-radius: 50%;
            animation: shoot 3s ease-in-out infinite;
            opacity: 0;
        }

        .shooting-star::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 80px;
            height: 1px;
            background: linear-gradient(to right, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.8));
        }

        @keyframes shoot {
            0% {
                transform: translateX(0) translateY(0) rotate(-45deg);
                opacity: 0;
            }
            5% {
                opacity: 1;
            }
            15% {
                transform: translateX(-300px) translateY(300px) rotate(-45deg);
                opacity: 0;
            }
            100% {
                opacity: 0;
            }
        }

        .shooting-star:nth-child(2) {
            top: 20%;
            right: 10%;
            animation-delay: 4s;
            animation-duration: 5s;
        }

        .shooting-star:nth-child(3) {
            top: 40%;
            right: 30%;
            animation-delay: 7s;
            animation-duration: 4s;
        }

        .planet-404 {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        .astronaut {
            animation: spin-drift 20s linear infinite;
        }

        @keyframes spin-drift {
            0% { transform: rotate(0deg) translateX(5px); }
            25% { transform: rotate(90deg) translateX(-5px); }
            50% { transform: rotate(180deg) translateX(5px); }
            75% { transform: rotate(270deg) translateX(-5px); }
            100% { transform: rotate(360deg) translateX(5px); }
        }

        .pulse-glow {
            animation: pulse-glow 3s ease-in-out infinite;
        }

        @keyframes pulse-glow {
            0%, 100% { text-shadow: 0 0 10px rgba(96, 165, 250, 0.3); }
            50% { text-shadow: 0 0 30px rgba(96, 165, 250, 0.6), 0 0 60px rgba(96, 165, 250, 0.2); }
        }
    </style>
</head>
<body class="bg-black text-white font-sans antialiased overflow-x-hidden">
    <!-- DRAFT COPY -->
    <?php include __DIR__ . '/partials/header.php'; ?>

    <main class="relative min-h-screen flex items-center justify-center">
        <!-- Animated Stars Background -->
        <div class="stars-container" aria-hidden="true">
            <?php for ($i = 0; $i < 80; $i++): ?>
                <div class="star" style="
                    left: <?php echo e(rand(0, 100)); ?>%;
                    top: <?php echo e(rand(0, 100)); ?>%;
                    width: <?php echo e(rand(1, 3)); ?>px;
                    height: <?php echo e(rand(1, 3)); ?>px;
                    --duration: <?php echo e(rand(15, 40) / 10); ?>s;
                    --drift-duration: <?php echo e(rand(30, 80)); ?>s;
                    animation-delay: <?php echo e(rand(0, 50) / 10); ?>s;
                "></div>
            <?php endfor; ?>

            <!-- Shooting Stars -->
            <div class="shooting-star" style="top: 10%; right: 20%;"></div>
            <div class="shooting-star" style="top: 30%; right: 5%;"></div>
            <div class="shooting-star" style="top: 50%; right: 40%;"></div>
        </div>

        <!-- 404 Content -->
        <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-3xl mx-auto">
            <!-- Large 404 Number -->
            <div class="planet-404 mb-8">
                <h1 class="text-[10rem] md:text-[14rem] font-black leading-none tracking-tighter pulse-glow">
                    <span class="bg-gradient-to-b from-blue-400 via-purple-400 to-transparent bg-clip-text text-transparent">
                        404
                    </span>
                </h1>
            </div>

            <!-- Astronaut Emoji -->
            <div class="astronaut text-5xl mb-6" aria-hidden="true">🧑‍🚀</div>

            <!-- Lost in Space Message -->
            <h2 class="text-2xl md:text-4xl font-bold text-white mb-4">
                Lost in Space
            </h2>
            <p class="text-gray-400 text-lg md:text-xl mb-8 max-w-xl mx-auto">
                Houston, we have a problem. The page you're looking for has drifted beyond our galaxy.
                It may have been moved, deleted, or never existed in this universe.
            </p>

            <!-- Search Bar -->
            <div class="mb-10 max-w-md mx-auto">
                <form action="/" method="GET" class="relative">
                    <input
                        type="text"
                        name="q"
                        placeholder="Search for something..."
                        class="w-full px-6 py-4 bg-gray-900/80 border border-gray-700 rounded-full text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent backdrop-blur-sm"
                        aria-label="Search"
                    >
                    <button
                        type="submit"
                        class="absolute right-2 top-1/2 -translate-y-1/2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-full transition-colors duration-200 font-medium"
                        aria-label="Submit search"
                    >
                        Search
                    </button>
                </form>
            </div>

            <!-- Quick Links -->
            <div class="mb-8">
                <p class="text-gray-500 text-sm uppercase tracking-wider mb-4 font-semibold">Navigate Back to Safety</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="/" class="group flex items-center gap-2 px-6 py-3 bg-gray-900/60 hover:bg-gray-800 border border-gray-700 hover:border-blue-500 rounded-xl text-gray-300 hover:text-white transition-all duration-200 backdrop-blur-sm">
                        <span class="text-lg">🏠</span>
                        <span class="font-medium">Home</span>
                    </a>
                    <a href="/about" class="group flex items-center gap-2 px-6 py-3 bg-gray-900/60 hover:bg-gray-800 border border-gray-700 hover:border-blue-500 rounded-xl text-gray-300 hover:text-white transition-all duration-200 backdrop-blur-sm">
                        <span class="text-lg">ℹ️</span>
                        <span class="font-medium">About</span>
                    </a>
                    <a href="/contact" class="group flex items-center gap-2 px-6 py-3 bg-gray-900/60 hover:bg-gray-800 border border-gray-700 hover:border-blue-500 rounded-xl text-gray-300 hover:text-white transition-all duration-200 backdrop-blur-sm">
                        <span class="text-lg">✉️</span>
                        <span class="font-medium">Contact</span>
                    </a>
                    <a href="/blog" class="group flex items-center gap-2 px-6 py-3 bg-gray-900/60 hover:bg-gray-800 border border-gray-700 hover:border-blue-500 rounded-xl text-gray-300 hover:text-white transition-all duration-200 backdrop-blur-sm">
                        <span class="text-lg">📝</span>
                        <span class="font-medium">Blog</span>
                    </a>
                </div>
            </div>

            <!-- Return Home Button -->
            <a href="/" class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-500 hover:to-purple-500 text-white font-semibold rounded-full transition-all duration-300 shadow-lg hover:shadow-blue-500/25 transform hover:scale-105">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Return to Mission Control
            </a>
        </div>
    </main>

    <?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>
