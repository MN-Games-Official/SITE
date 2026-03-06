<?php
// sitemap.php — Astroyds XML Sitemap Generator
// <!-- DRAFT COPY -->

require __DIR__ . '/src/php/config.php';
require __DIR__ . '/src/php/headers.php';
require __DIR__ . '/src/php/sitemap_generator.php';

header('Content-Type: application/xml; charset=UTF-8');
header('X-Robots-Tag: noindex');

echo generate_sitemap();
