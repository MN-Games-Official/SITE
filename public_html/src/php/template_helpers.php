<?php

/**
 * Template Helpers for Astroyds
 *
 * A collection of small utility functions used throughout the
 * front-end templates. Keeps views clean and logic centralised.
 *
 * @package    Astroyds
 * @author     Astroyds <letstalk@astroyds.com>
 * @copyright  Astroyds
 * @link       https://astroyds.com
 */

declare(strict_types=1);

/**
 * HTML-escape a string.
 *
 * Shorthand for htmlspecialchars with secure defaults (double-encode
 * turned off so already-escaped entities are not double-escaped).
 *
 * @param  string|null $str The raw string.
 * @return string           The escaped string, safe for HTML output.
 */
function e(?string $str): string
{
    return htmlspecialchars($str ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8', false);
}

/**
 * Return the CSS class "active" when the current request matches a page slug.
 *
 * Useful for highlighting the current navigation item.
 *
 * @param  string $page The page slug to test (e.g. "/about", "/contact").
 * @return string       "active" or an empty string.
 */
function active_page(string $page): string
{
    $current = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);
    $current = rtrim($current ?: '', '/') ?: '/';
    $page    = rtrim($page, '/') ?: '/';

    return ($current === $page) ? 'active' : '';
}

/**
 * Render a partial template file.
 *
 * Partials are expected under public_html/partials/. The $data array
 * is extracted into local variables available inside the partial.
 *
 * @param  string $name Partial filename without extension (e.g. "header").
 * @param  array  $data Associative array of variables to expose.
 * @return void
 */
function render_partial(string $name, array $data = []): void
{
    $file = __DIR__ . '/../../partials/' . basename($name) . '.php';

    if (!is_file($file)) {
        return;
    }

    extract($data, EXTR_SKIP);
    include $file;
}

/**
 * Generate a full URL for a given path.
 *
 * Uses SITE_URL when defined (see config.php) so links work in both
 * development and production environments.
 *
 * @param  string $path The path segment (e.g. "/about").
 * @return string       Fully-qualified URL.
 */
function page_url(string $path = '/'): string
{
    $base = defined('SITE_URL') ? SITE_URL : 'https://astroyds.com';
    return rtrim($base, '/') . '/' . ltrim($path, '/');
}

/**
 * Format a date string for display.
 *
 * Accepts any format recognised by strtotime(). Returns a
 * human-friendly representation such as "January 15, 2025".
 *
 * @param  string $date   A date string or timestamp.
 * @param  string $format PHP date() format string.
 * @return string         Formatted date or empty string on failure.
 */
function format_date(string $date, string $format = 'F j, Y'): string
{
    $ts = strtotime($date);
    return $ts !== false ? date($format, $ts) : '';
}

/**
 * Truncate a string to a given length and append an ellipsis.
 *
 * Avoids splitting in the middle of a word when possible.
 *
 * @param  string $str The original string.
 * @param  int    $len Maximum character length (including ellipsis).
 * @return string      Truncated string.
 */
function truncate(string $str, int $len = 120): string
{
    if (mb_strlen($str) <= $len) {
        return $str;
    }

    $truncated = mb_substr($str, 0, $len);

    // Try to break at the last space to avoid cutting a word
    $last_space = mb_strrpos($truncated, ' ');
    if ($last_space !== false && $last_space > $len * 0.75) {
        $truncated = mb_substr($truncated, 0, $last_space);
    }

    return rtrim($truncated) . '…';
}

/**
 * Return page-level meta data (title, description, Open Graph).
 *
 * Centralises SEO metadata so every page template can pull from one
 * source of truth. Unknown pages fall back to a generic entry.
 *
 * @param  string $page The page slug (e.g. "/", "/about", "/contact").
 * @return array{title: string, description: string, og_title: string, og_description: string, og_image: string, og_url: string}
 */
function get_meta(string $page = '/'): array
{
    $base_url = defined('SITE_URL') ? SITE_URL : 'https://astroyds.com';

    $meta = [
        '/' => [
            'title'          => 'Astroyds — Sole Proprietorship',
            'description'    => 'Astroyds is a sole proprietorship based in Maple Grove, Minnesota. Home of IDLE, RIFT, and BulletPROOF.',
            'og_title'       => 'Astroyds',
            'og_description' => 'Astroyds is a sole proprietorship based in Maple Grove, Minnesota.',
            'og_image'       => $base_url . '/assets/images/og-default.png',
            'og_url'         => $base_url . '/',
        ],
        '/about' => [
            'title'          => 'About — Astroyds',
            'description'    => 'Learn about Astroyds, a sole proprietorship in Maple Grove, Minnesota, and its sub-companies IDLE, RIFT, and BulletPROOF.',
            'og_title'       => 'About Astroyds',
            'og_description' => 'Learn about Astroyds and its sub-companies.',
            'og_image'       => $base_url . '/assets/images/og-about.png',
            'og_url'         => $base_url . '/about',
        ],
        '/contact' => [
            'title'          => 'Contact — Astroyds',
            'description'    => 'Get in touch with Astroyds. We\'d love to hear from you.',
            'og_title'       => 'Contact Astroyds',
            'og_description' => 'Reach out to Astroyds — let\'s talk.',
            'og_image'       => $base_url . '/assets/images/og-contact.png',
            'og_url'         => $base_url . '/contact',
        ],
        '/companies' => [
            'title'          => 'Companies — Astroyds',
            'description'    => 'Explore IDLE, RIFT, and BulletPROOF — the sub-companies of Astroyds.',
            'og_title'       => 'Astroyds Companies',
            'og_description' => 'IDLE, RIFT, and BulletPROOF under the Astroyds umbrella.',
            'og_image'       => $base_url . '/assets/images/og-companies.png',
            'og_url'         => $base_url . '/companies',
        ],
    ];

    $default = [
        'title'          => 'Astroyds',
        'description'    => 'Astroyds — a sole proprietorship based in Maple Grove, Minnesota.',
        'og_title'       => 'Astroyds',
        'og_description' => 'Astroyds — a sole proprietorship based in Maple Grove, Minnesota.',
        'og_image'       => $base_url . '/assets/images/og-default.png',
        'og_url'         => $base_url . '/',
    ];

    return $meta[$page] ?? $default;
}

/**
 * Check whether the visitor prefers dark mode.
 *
 * Reads a "theme" cookie set by client-side JavaScript. Returns true
 * when the cookie value is "dark".
 *
 * @return bool
 */
function is_dark_mode(): bool
{
    return isset($_COOKIE['theme']) && $_COOKIE['theme'] === 'dark';
}
