<?php

/**
 * Sitemap XML Generator for Astroyds
 *
 * Outputs a valid XML sitemap (protocol 0.9) listing all public pages
 * of astroyds.com with last-modified dates, change frequencies, and
 * priority hints for search-engine crawlers.
 *
 * Usage:
 *   Access directly at /src/php/sitemap_generator.php or route to it
 *   from a front controller / .htaccess rewrite.
 *
 * @package    Astroyds
 * @author     Astroyds <letstalk@astroyds.com>
 * @copyright  Astroyds
 * @link       https://astroyds.com
 * @see        https://www.sitemaps.org/protocol.html
 */

declare(strict_types=1);

require_once __DIR__ . '/config.php';

/**
 * Define all public pages for the sitemap.
 *
 * Each entry contains:
 *   - loc        : Path relative to site root
 *   - lastmod    : ISO 8601 date of last meaningful change
 *   - changefreq : Expected change frequency
 *   - priority   : Relative priority (0.0–1.0)
 *
 * Update this array whenever pages are added, removed, or substantially
 * changed.
 *
 * @return array<int, array{loc: string, lastmod: string, changefreq: string, priority: string}>
 */
function get_sitemap_entries(): array
{
    return [
        [
            'loc'        => '/',
            'lastmod'    => date('Y-m-d'),
            'changefreq' => 'weekly',
            'priority'   => '1.0',
        ],
        [
            'loc'        => '/about',
            'lastmod'    => date('Y-m-d'),
            'changefreq' => 'monthly',
            'priority'   => '0.8',
        ],
        [
            'loc'        => '/contact',
            'lastmod'    => date('Y-m-d'),
            'changefreq' => 'monthly',
            'priority'   => '0.7',
        ],
        [
            'loc'        => '/companies',
            'lastmod'    => date('Y-m-d'),
            'changefreq' => 'monthly',
            'priority'   => '0.8',
        ],
        [
            'loc'        => '/companies/idle',
            'lastmod'    => date('Y-m-d'),
            'changefreq' => 'monthly',
            'priority'   => '0.6',
        ],
        [
            'loc'        => '/companies/rift',
            'lastmod'    => date('Y-m-d'),
            'changefreq' => 'monthly',
            'priority'   => '0.6',
        ],
        [
            'loc'        => '/companies/bulletproof',
            'lastmod'    => date('Y-m-d'),
            'changefreq' => 'monthly',
            'priority'   => '0.6',
        ],
        [
            'loc'        => '/blog',
            'lastmod'    => date('Y-m-d'),
            'changefreq' => 'weekly',
            'priority'   => '0.7',
        ],
        [
            'loc'        => '/research',
            'lastmod'    => date('Y-m-d'),
            'changefreq' => 'monthly',
            'priority'   => '0.5',
        ],
    ];
}

/**
 * Generate and output the XML sitemap.
 *
 * Sets the Content-Type header to application/xml and writes a
 * well-formed sitemap document.
 *
 * @return void
 */
function generate_sitemap(): void
{
    $base_url = defined('SITE_URL') ? SITE_URL : 'https://astroyds.com';
    $entries  = get_sitemap_entries();

    header('Content-Type: application/xml; charset=utf-8');

    echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

    foreach ($entries as $entry) {
        $loc        = htmlspecialchars(rtrim($base_url, '/') . $entry['loc'], ENT_XML1, 'UTF-8');
        $lastmod    = htmlspecialchars($entry['lastmod'], ENT_XML1, 'UTF-8');
        $changefreq = htmlspecialchars($entry['changefreq'], ENT_XML1, 'UTF-8');
        $priority   = htmlspecialchars($entry['priority'], ENT_XML1, 'UTF-8');

        echo "  <url>\n";
        echo "    <loc>{$loc}</loc>\n";
        echo "    <lastmod>{$lastmod}</lastmod>\n";
        echo "    <changefreq>{$changefreq}</changefreq>\n";
        echo "    <priority>{$priority}</priority>\n";
        echo "  </url>\n";
    }

    echo '</urlset>' . "\n";
}

// When accessed directly, output the sitemap
if (php_sapi_name() !== 'cli') {
    generate_sitemap();
}
