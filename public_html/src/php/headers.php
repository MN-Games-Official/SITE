<?php

/**
 * Security Headers Helper for Astroyds
 *
 * Provides a single function to emit all recommended HTTP security
 * headers. Call send_security_headers() early in every request before
 * any output is sent.
 *
 * @package    Astroyds
 * @author     Astroyds <letstalk@astroyds.com>
 * @copyright  Astroyds
 * @link       https://astroyds.com
 */

declare(strict_types=1);

/**
 * Build the Content-Security-Policy header value.
 *
 * Allows resources from self, the Tailwind CSS CDN, and Microsoft Clarity
 * analytics. Extend the directives below as new third-party sources are added.
 *
 * @return string
 */
function build_csp(): string
{
    $directives = [
        // Scripts: self, Tailwind CDN, Clarity
        "script-src"  => "'self' https://cdn.tailwindcss.com https://www.clarity.ms",

        // Styles: self, Tailwind CDN, inline styles (required by Tailwind JIT)
        "style-src"   => "'self' 'unsafe-inline' https://cdn.tailwindcss.com",

        // Images: self and data URIs (for inline SVGs / base64 images)
        "img-src"     => "'self' data: https://www.clarity.ms",

        // Fonts: self and common CDNs
        "font-src"    => "'self' https://fonts.gstatic.com",

        // Connect: self and Clarity beacon
        "connect-src" => "'self' https://www.clarity.ms https://*.clarity.ms",

        // Default fallback
        "default-src" => "'self'",

        // Prevent embedding in objects / applets
        "object-src"  => "'none'",

        // Base URI restriction
        "base-uri"    => "'self'",

        // Form submissions target
        "form-action" => "'self'",

        // Frame ancestors — mirrors X-Frame-Options
        "frame-ancestors" => "'self'",
    ];

    $parts = [];
    foreach ($directives as $directive => $value) {
        $parts[] = "{$directive} {$value}";
    }

    return implode('; ', $parts);
}

/**
 * Send all recommended security headers.
 *
 * Must be called before any output is written to the response.
 * Safe to call more than once — duplicate header values are avoided
 * by using header() with the replace flag (default behaviour).
 *
 * @return void
 */
function send_security_headers(): void
{
    if (headers_sent()) {
        return;
    }

    // Content-Security-Policy
    header('Content-Security-Policy: ' . build_csp());

    // Prevent the page from being rendered inside a frame
    header('X-Frame-Options: SAMEORIGIN');

    // Stop browsers from MIME-sniffing the response
    header('X-Content-Type-Options: nosniff');

    // Control how much referrer information is sent
    header('Referrer-Policy: strict-origin-when-cross-origin');

    /*
     * Strict-Transport-Security (HSTS)
     *
     * Enable this header in production once HTTPS is confirmed working
     * on all subdomains. The includeSubDomains directive and a long
     * max-age are recommended.
     *
     * Uncomment the line below when ready:
     * header('Strict-Transport-Security: max-age=63072000; includeSubDomains; preload');
     */

    // Permissions-Policy — restrict browser features not used by the site
    header('Permissions-Policy: camera=(), microphone=(), geolocation=(), payment=(), usb=(), magnetometer=(), gyroscope=(), accelerometer=()');

    // Prevent cross-site information leakage
    header('X-Permitted-Cross-Domain-Policies: none');
}
