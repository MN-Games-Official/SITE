<?php
/**
 * Meta Tags Partial — Astroyds
 *
 * Renders the full <head> section including SEO meta tags, Open Graph,
 * Twitter Cards, structured data, Tailwind CSS CDN, critical CSS,
 * font preloads, and analytics injection.
 *
 * Expected variables (set before including or passed via render_partial):
 *   $page_title       — Page title (suffixed with "| Astroyds")
 *   $page_description — Meta description
 *   $page_url         — Canonical / OG URL
 *   $page_image       — OG / Twitter image URL
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

/* -----------------------------------------------------------------------
   Defaults — fall back to site-wide values when a variable is absent.
   ----------------------------------------------------------------------- */
$page_title       = $page_title       ?? 'Astroyds — Sole Proprietorship';
$page_description = $page_description ?? 'Astroyds is a sole proprietorship based in Maple Grove, Minnesota. Home of IDLE, RIFT, and BulletPROOF. Moving humanity forward for a better future.';
$page_url         = $page_url         ?? page_url('/');
$page_image       = $page_image       ?? page_url('/assets/images/og-default.png');

/* Build the display title with brand suffix */
$display_title = (stripos($page_title, 'Astroyds') === false)
    ? $page_title . ' | Astroyds'
    : $page_title;

$base_url  = defined('SITE_URL') ? SITE_URL : 'https://astroyds.com';
$theme_cls = is_dark_mode() ? 'dark' : '';
?>
<!-- ====================================================================
     HEAD — Astroyds
     DRAFT COPY — subject to revision before launch
     ==================================================================== -->
<head>
    <!-- ── Core ──────────────────────────────────────────────────────── -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#3b82f6">
    <meta name="color-scheme" content="dark light">

    <!-- ── Title & Description ───────────────────────────────────────── -->
    <title><?= e($display_title) ?></title>
    <meta name="description" content="<?= e($page_description) ?>">
    <meta name="author" content="Astroyds">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="generator" content="Astroyds CMS">

    <!-- ── Canonical ─────────────────────────────────────────────────── -->
    <link rel="canonical" href="<?= e($page_url) ?>">

    <!-- ── Open Graph ────────────────────────────────────────────────── -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Astroyds">
    <meta property="og:title" content="<?= e($display_title) ?>">
    <meta property="og:description" content="<?= e($page_description) ?>">
    <meta property="og:url" content="<?= e($page_url) ?>">
    <meta property="og:image" content="<?= e($page_image) ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="<?= e($display_title) ?>">
    <meta property="og:locale" content="en_US">

    <!-- ── Twitter Card ──────────────────────────────────────────────── -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= e($display_title) ?>">
    <meta name="twitter:description" content="<?= e($page_description) ?>">
    <meta name="twitter:image" content="<?= e($page_image) ?>">
    <meta name="twitter:image:alt" content="<?= e($display_title) ?>">
    <!-- <meta name="twitter:site" content="@astroyds"> -->

    <!-- ── Preconnect / DNS-Prefetch ─────────────────────────────────── -->
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.tailwindcss.com" crossorigin>
    <link rel="dns-prefetch" href="https://clarity.ms">

    <!-- ── Font Preload ──────────────────────────────────────────────── -->
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"></noscript>

    <!-- ── Favicons ──────────────────────────────────────────────────── -->
    <link rel="icon" href="/assets/favicons/favicon.svg" type="image/svg+xml">
    <link rel="icon" href="/assets/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/assets/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="apple-touch-icon" href="/assets/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="manifest" href="/manifest.webmanifest">

    <!-- ── Tailwind CSS CDN ──────────────────────────────────────────── -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        darkMode: 'class',
        theme: {
            extend: {
                colors: {
                    navy:    { DEFAULT: '#0a0e27', light: '#111638', dark: '#070b1e' },
                    electric:{ DEFAULT: '#3b82f6', hover: '#2563eb', light: '#60a5fa' },
                    purple:  { DEFAULT: '#8b5cf6', hover: '#7c3aed', light: '#a78bfa' },
                    brand: {
                        bg:      '#0a0e27',
                        card:    'rgba(17, 22, 56, 0.7)',
                        glass:   'rgba(10, 14, 39, 0.65)',
                        border:  'rgba(255, 255, 255, 0.08)',
                    },
                },
                fontFamily: {
                    heading: ['"Times New Roman"', 'Georgia', 'serif'],
                    body:    ['Inter', 'system-ui', '-apple-system', 'sans-serif'],
                    mono:    ['"JetBrains Mono"', '"Fira Code"', 'monospace'],
                },
                fontSize: {
                    hero: 'clamp(2.5rem, 6vw, 5rem)',
                },
                boxShadow: {
                    'glow-blue':   '0 0 30px rgba(59, 130, 246, 0.3)',
                    'glow-purple': '0 0 30px rgba(139, 92, 246, 0.3)',
                },
                animation: {
                    'fade-in':      'fadeIn 0.7s ease forwards',
                    'fade-in-up':   'fadeInUp 0.7s ease forwards',
                    'slide-down':   'slideDown 0.3s ease forwards',
                    'pulse-slow':   'pulse 3s ease-in-out infinite',
                    'bounce-slow':  'bounce 2s ease-in-out infinite',
                    'float':        'float 6s ease-in-out infinite',
                },
                keyframes: {
                    fadeIn:    { '0%': { opacity: '0' }, '100%': { opacity: '1' } },
                    fadeInUp:  { '0%': { opacity: '0', transform: 'translateY(20px)' }, '100%': { opacity: '1', transform: 'translateY(0)' } },
                    slideDown: { '0%': { opacity: '0', transform: 'translateY(-10px)' }, '100%': { opacity: '1', transform: 'translateY(0)' } },
                    float:     { '0%, 100%': { transform: 'translateY(0)' }, '50%': { transform: 'translateY(-20px)' } },
                },
            },
        },
    };
    </script>

    <!-- ── Critical CSS (inline) ─────────────────────────────────────── -->
    <style>
    <?php
    $critical_path = __DIR__ . '/../assets/css/critical.css';
    if (is_file($critical_path)) {
        readfile($critical_path);
    }
    ?>
    </style>

    <!-- ── Main CSS (deferred load) ──────────────────────────────────── -->
    <link rel="preload" as="style" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/main.css" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="/assets/css/main.css"></noscript>

    <!-- ── Microsoft Clarity (consent-gated) ─────────────────────────── -->
    <?php if (defined('CLARITY_ID') && CLARITY_ID !== ''): ?>
    <script>
    (function(){
        // Only inject Clarity if the visitor has given analytics consent
        function hasAnalyticsConsent() {
            try {
                var c = document.cookie.match(/(?:^|;\s*)cookie_consent=([^;]*)/);
                if (!c) return false;
                var prefs = JSON.parse(decodeURIComponent(c[1]));
                return prefs && prefs.analytics === true;
            } catch(e) { return false; }
        }
        function loadClarity() {
            (function(c,l,a,r,i,t,y){
                c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
                t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
                y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
            })(window,document,"clarity","script","<?= e(CLARITY_ID) ?>");
        }
        if (hasAnalyticsConsent()) { loadClarity(); }
        // Listen for future consent changes
        window.addEventListener('cookie-consent-updated', function(e) {
            if (e.detail && e.detail.analytics) { loadClarity(); }
        });
    })();
    </script>
    <?php endif; ?>

    <!-- ── Schema.org Structured Data ────────────────────────────────── -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Astroyds",
        "url": "<?= e($base_url) ?>",
        "logo": "<?= e($base_url) ?>/assets/favicons/favicon.svg",
        "description": "<?= e($page_description) ?>",
        "email": "letstalk@astroyds.com",
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Maple Grove",
            "addressRegion": "MN",
            "addressCountry": "US"
        },
        "sameAs": [],
        "subOrganization": [
            { "@type": "Organization", "name": "IDLE" },
            { "@type": "Organization", "name": "RIFT" },
            { "@type": "Organization", "name": "BulletPROOF" }
        ]
    }
    </script>
</head>
