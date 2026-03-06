<?php
// maintenance.php — Astroyds Maintenance Mode Page
// <!-- DRAFT COPY -->
// Self-contained: no partials, inline styles, Tailwind CDN

http_response_code(503);
header('Retry-After: 3600');
header('Content-Type: text/html; charset=UTF-8');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Maintenance — Astroyds</title>
    <meta name="description" content="Astroyds is currently undergoing scheduled maintenance. We'll be back soon.">
    <!-- DRAFT COPY -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Space-themed background */
        body {
            background: radial-gradient(ellipse at center, #0a0e27 0%, #000000 70%);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Animated stars */
        .stars {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
        }

        .stars::before,
        .stars::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .stars::before {
            background-image:
                radial-gradient(1px 1px at 10% 20%, rgba(255,255,255,0.8), transparent),
                radial-gradient(1px 1px at 20% 40%, rgba(255,255,255,0.6), transparent),
                radial-gradient(2px 2px at 30% 10%, rgba(255,255,255,0.9), transparent),
                radial-gradient(1px 1px at 40% 60%, rgba(255,255,255,0.5), transparent),
                radial-gradient(1px 1px at 50% 30%, rgba(255,255,255,0.7), transparent),
                radial-gradient(2px 2px at 60% 80%, rgba(255,255,255,0.6), transparent),
                radial-gradient(1px 1px at 70% 50%, rgba(255,255,255,0.8), transparent),
                radial-gradient(1px 1px at 80% 20%, rgba(255,255,255,0.5), transparent),
                radial-gradient(2px 2px at 90% 70%, rgba(255,255,255,0.7), transparent),
                radial-gradient(1px 1px at 15% 85%, rgba(255,255,255,0.6), transparent),
                radial-gradient(1px 1px at 25% 55%, rgba(255,255,255,0.4), transparent),
                radial-gradient(2px 2px at 35% 75%, rgba(255,255,255,0.8), transparent),
                radial-gradient(1px 1px at 45% 15%, rgba(255,255,255,0.5), transparent),
                radial-gradient(1px 1px at 55% 45%, rgba(255,255,255,0.7), transparent),
                radial-gradient(1px 1px at 65% 25%, rgba(255,255,255,0.6), transparent),
                radial-gradient(2px 2px at 75% 90%, rgba(255,255,255,0.5), transparent),
                radial-gradient(1px 1px at 85% 35%, rgba(255,255,255,0.8), transparent),
                radial-gradient(1px 1px at 95% 65%, rgba(255,255,255,0.4), transparent),
                radial-gradient(1px 1px at 5% 50%, rgba(255,255,255,0.7), transparent),
                radial-gradient(2px 2px at 50% 90%, rgba(255,255,255,0.6), transparent);
            animation: twinkle-layer 4s ease-in-out infinite alternate;
        }

        .stars::after {
            background-image:
                radial-gradient(1px 1px at 12% 35%, rgba(255,255,255,0.5), transparent),
                radial-gradient(2px 2px at 22% 65%, rgba(255,255,255,0.7), transparent),
                radial-gradient(1px 1px at 32% 45%, rgba(255,255,255,0.6), transparent),
                radial-gradient(1px 1px at 42% 85%, rgba(255,255,255,0.4), transparent),
                radial-gradient(2px 2px at 52% 15%, rgba(255,255,255,0.8), transparent),
                radial-gradient(1px 1px at 62% 55%, rgba(255,255,255,0.5), transparent),
                radial-gradient(1px 1px at 72% 75%, rgba(255,255,255,0.7), transparent),
                radial-gradient(2px 2px at 82% 5%, rgba(255,255,255,0.6), transparent),
                radial-gradient(1px 1px at 92% 45%, rgba(255,255,255,0.5), transparent),
                radial-gradient(1px 1px at 8% 95%, rgba(255,255,255,0.8), transparent),
                radial-gradient(1px 1px at 18% 15%, rgba(255,255,255,0.4), transparent),
                radial-gradient(2px 2px at 28% 25%, rgba(255,255,255,0.6), transparent),
                radial-gradient(1px 1px at 38% 35%, rgba(255,255,255,0.7), transparent),
                radial-gradient(1px 1px at 48% 55%, rgba(255,255,255,0.5), transparent),
                radial-gradient(2px 2px at 58% 75%, rgba(255,255,255,0.8), transparent),
                radial-gradient(1px 1px at 68% 95%, rgba(255,255,255,0.4), transparent),
                radial-gradient(1px 1px at 78% 40%, rgba(255,255,255,0.6), transparent),
                radial-gradient(2px 2px at 88% 60%, rgba(255,255,255,0.7), transparent),
                radial-gradient(1px 1px at 98% 80%, rgba(255,255,255,0.5), transparent),
                radial-gradient(1px 1px at 3% 70%, rgba(255,255,255,0.8), transparent);
            animation: twinkle-layer 5s ease-in-out 1s infinite alternate;
        }

        @keyframes twinkle-layer {
            0% { opacity: 0.6; }
            100% { opacity: 1; }
        }

        /* Nebula glow */
        .nebula {
            position: fixed;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            filter: blur(100px);
            opacity: 0.15;
            pointer-events: none;
            z-index: 0;
        }

        .nebula-1 {
            background: radial-gradient(circle, #3b82f6, transparent);
            top: -200px;
            right: -200px;
            animation: nebula-pulse 8s ease-in-out infinite alternate;
        }

        .nebula-2 {
            background: radial-gradient(circle, #8b5cf6, transparent);
            bottom: -200px;
            left: -200px;
            animation: nebula-pulse 10s ease-in-out 2s infinite alternate;
        }

        @keyframes nebula-pulse {
            0% { opacity: 0.1; transform: scale(1); }
            100% { opacity: 0.2; transform: scale(1.1); }
        }

        /* Floating animation */
        .float-animation {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }

        /* Gear spin */
        .gear-spin {
            animation: gear-rotate 4s linear infinite;
        }

        @keyframes gear-rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Countdown styling */
        .countdown-item {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        .countdown-item:hover {
            border-color: rgba(59, 130, 246, 0.5);
            background: rgba(59, 130, 246, 0.1);
        }

        /* Progress bar */
        .progress-bar {
            background: linear-gradient(90deg, #3b82f6, #8b5cf6, #3b82f6);
            background-size: 200% 100%;
            animation: progress-shimmer 2s linear infinite;
        }

        @keyframes progress-shimmer {
            0% { background-position: 0% 0%; }
            100% { background-position: 200% 0%; }
        }
    </style>
</head>
<body class="text-white font-sans antialiased flex items-center justify-center min-h-screen p-4">
    <!-- DRAFT COPY -->

    <!-- Background Effects -->
    <div class="stars" aria-hidden="true"></div>
    <div class="nebula nebula-1" aria-hidden="true"></div>
    <div class="nebula nebula-2" aria-hidden="true"></div>

    <!-- Main Content -->
    <div class="relative z-10 text-center max-w-2xl mx-auto">

        <!-- Astroyds Logo/Brand -->
        <div class="float-animation mb-8">
            <div class="inline-flex items-center gap-3 mb-4">
                <div class="gear-spin text-4xl" aria-hidden="true">⚙️</div>
                <h1 class="text-3xl md:text-4xl font-bold tracking-wider">
                    <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
                        ASTROYDS
                    </span>
                </h1>
                <div class="gear-spin text-4xl" style="animation-direction: reverse;" aria-hidden="true">⚙️</div>
            </div>
        </div>

        <!-- Rocket Icon -->
        <div class="text-6xl mb-6 float-animation" style="animation-delay: 0.5s;" aria-hidden="true">
            🚀
        </div>

        <!-- Main Message -->
        <h2 class="text-3xl md:text-5xl font-bold text-white mb-4">
            We'll Be Back Soon
        </h2>
        <p class="text-gray-400 text-lg md:text-xl mb-2 max-w-lg mx-auto">
            Our systems are undergoing scheduled maintenance to bring you an even better experience.
        </p>
        <p class="text-gray-500 text-base mb-10">
            We apologize for the inconvenience and appreciate your patience.
        </p>

        <!-- Animated Progress Bar -->
        <div class="max-w-sm mx-auto mb-10">
            <div class="h-1.5 bg-gray-800 rounded-full overflow-hidden">
                <div class="progress-bar h-full rounded-full w-3/4"></div>
            </div>
            <p class="text-gray-500 text-xs mt-2 uppercase tracking-wider">Maintenance in progress...</p>
        </div>

        <!-- Countdown Timer -->
        <div class="mb-10">
            <p class="text-gray-500 text-sm uppercase tracking-wider mb-4 font-semibold">Estimated Time Remaining</p>
            <div class="flex justify-center gap-4" id="countdown">
                <div class="countdown-item rounded-xl px-5 py-4 min-w-[80px] transition-all duration-300">
                    <div class="text-3xl md:text-4xl font-bold text-white" id="hours">00</div>
                    <div class="text-xs text-gray-500 uppercase tracking-wider mt-1">Hours</div>
                </div>
                <div class="text-3xl font-bold text-gray-600 self-center">:</div>
                <div class="countdown-item rounded-xl px-5 py-4 min-w-[80px] transition-all duration-300">
                    <div class="text-3xl md:text-4xl font-bold text-white" id="minutes">00</div>
                    <div class="text-xs text-gray-500 uppercase tracking-wider mt-1">Minutes</div>
                </div>
                <div class="text-3xl font-bold text-gray-600 self-center">:</div>
                <div class="countdown-item rounded-xl px-5 py-4 min-w-[80px] transition-all duration-300">
                    <div class="text-3xl md:text-4xl font-bold text-white" id="seconds">00</div>
                    <div class="text-xs text-gray-500 uppercase tracking-wider mt-1">Seconds</div>
                </div>
            </div>
        </div>

        <!-- Contact Info -->
        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-6 max-w-md mx-auto mb-8">
            <p class="text-gray-400 text-sm mb-3">
                Need to reach us? We're still available via email:
            </p>
            <a href="mailto:letstalk@astroyds.com"
               class="inline-flex items-center gap-2 text-blue-400 hover:text-blue-300 transition-colors duration-200 text-lg font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                letstalk@astroyds.com
            </a>
        </div>

        <!-- Footer Note -->
        <p class="text-gray-600 text-xs">
            &copy; <?php echo date('Y'); ?> Astroyds. All rights reserved.
        </p>
    </div>

    <!-- Countdown Timer Script -->
    <script>
        (function() {
            // Set maintenance end time to 1 hour from page load
            var endTime = new Date().getTime() + (1 * 60 * 60 * 1000);

            var hoursEl = document.getElementById('hours');
            var minutesEl = document.getElementById('minutes');
            var secondsEl = document.getElementById('seconds');

            function padZero(num) {
                return num < 10 ? '0' + num : String(num);
            }

            function updateCountdown() {
                var now = new Date().getTime();
                var remaining = endTime - now;

                if (remaining <= 0) {
                    hoursEl.textContent = '00';
                    minutesEl.textContent = '00';
                    secondsEl.textContent = '00';
                    // Attempt to reload the page
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                    return;
                }

                var hours = Math.floor(remaining / (1000 * 60 * 60));
                var minutes = Math.floor((remaining % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((remaining % (1000 * 60)) / 1000);

                hoursEl.textContent = padZero(hours);
                minutesEl.textContent = padZero(minutes);
                secondsEl.textContent = padZero(seconds);
            }

            updateCountdown();
            setInterval(updateCountdown, 1000);
        })();
    </script>
</body>
</html>
