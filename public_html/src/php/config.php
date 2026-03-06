<?php

/**
 * Configuration Loader for Astroyds
 *
 * Loads environment variables from .env files and provides
 * centralized configuration with sensible defaults.
 *
 * @package    Astroyds
 * @author     Astroyds <letstalk@astroyds.com>
 * @copyright  Astroyds
 * @link       https://astroyds.com
 */

declare(strict_types=1);

/**
 * Retrieve an environment variable with an optional default.
 *
 * Checks $_ENV, $_SERVER, and getenv() in order.
 *
 * @param  string      $key     The variable name.
 * @param  string|null $default Fallback value when the variable is not set.
 * @return string|null
 */
function env(string $key, ?string $default = null): ?string
{
    if (isset($_ENV[$key])) {
        return $_ENV[$key];
    }

    if (isset($_SERVER[$key])) {
        return $_SERVER[$key];
    }

    $value = getenv($key);
    return $value !== false ? $value : $default;
}

/**
 * Parse a .env file and inject its values into the environment.
 *
 * Lines starting with # are treated as comments. Empty lines are skipped.
 * Surrounding quotes on values are stripped automatically.
 *
 * @param  string $path Absolute path to the .env file.
 * @return void
 */
function load_env_file(string $path): void
{
    if (!is_file($path) || !is_readable($path)) {
        return;
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines === false) {
        return;
    }

    foreach ($lines as $line) {
        $line = trim($line);

        // Skip comments and lines without an assignment
        if ($line === '' || str_starts_with($line, '#')) {
            continue;
        }

        if (strpos($line, '=') === false) {
            continue;
        }

        [$name, $value] = explode('=', $line, 2);
        $name  = trim($name);
        $value = trim($value);

        // Strip surrounding quotes
        if (
            (str_starts_with($value, '"') && str_ends_with($value, '"')) ||
            (str_starts_with($value, "'") && str_ends_with($value, "'"))
        ) {
            $value = substr($value, 1, -1);
        }

        // Only set if not already defined by the real environment
        if (getenv($name) === false) {
            putenv("{$name}={$value}");
            $_ENV[$name]    = $value;
            $_SERVER[$name] = $value;
        }
    }
}

/*
|--------------------------------------------------------------------------
| Load .env — check common locations relative to this file
|--------------------------------------------------------------------------
*/
$env_paths = [
    __DIR__ . '/../../.env',    // public_html/.env
    __DIR__ . '/../../../.env', // project root .env
];

foreach ($env_paths as $env_path) {
    if (is_file($env_path)) {
        load_env_file($env_path);
        break; // first match wins
    }
}

/*
|--------------------------------------------------------------------------
| Feature Flags & Application Defaults
|--------------------------------------------------------------------------
|
| HERO_CONCEPT    – Landing-page hero variant: "immersive" or "serif"
| CLARITY_ID      – Microsoft Clarity project ID (from environment)
| ADMIN_TOKEN     – Token required for admin endpoints
| CONTACT_STORAGE – "file" (JSON files) or "sqlite"
| SMTP_ENABLED    – "true" to send contact-form emails via SMTP
| MAINTENANCE_MODE– "true" to display the maintenance page
|
*/

if (!defined('HERO_CONCEPT')) {
    define('HERO_CONCEPT', env('HERO_CONCEPT', 'immersive'));
}

if (!defined('CLARITY_ID')) {
    define('CLARITY_ID', env('CLARITY_ID', ''));
}

if (!defined('ADMIN_TOKEN')) {
    define('ADMIN_TOKEN', env('ADMIN_TOKEN', ''));
}

if (!defined('CONTACT_STORAGE')) {
    define('CONTACT_STORAGE', env('CONTACT_STORAGE', 'file'));
}

if (!defined('SMTP_ENABLED')) {
    define('SMTP_ENABLED', env('SMTP_ENABLED', 'false') === 'true');
}

if (!defined('MAINTENANCE_MODE')) {
    define('MAINTENANCE_MODE', env('MAINTENANCE_MODE', 'false') === 'true');
}

/*
|--------------------------------------------------------------------------
| SMTP Configuration (used when SMTP_ENABLED is true)
|--------------------------------------------------------------------------
*/
if (!defined('SMTP_HOST')) {
    define('SMTP_HOST', env('SMTP_HOST', ''));
}
if (!defined('SMTP_PORT')) {
    define('SMTP_PORT', (int) env('SMTP_PORT', '587'));
}
if (!defined('SMTP_USER')) {
    define('SMTP_USER', env('SMTP_USER', ''));
}
if (!defined('SMTP_PASS')) {
    define('SMTP_PASS', env('SMTP_PASS', ''));
}
if (!defined('SMTP_FROM')) {
    define('SMTP_FROM', env('SMTP_FROM', 'letstalk@astroyds.com'));
}
if (!defined('SMTP_TO')) {
    define('SMTP_TO', env('SMTP_TO', 'letstalk@astroyds.com'));
}

/*
|--------------------------------------------------------------------------
| Application Constants
|--------------------------------------------------------------------------
*/
if (!defined('SITE_NAME')) {
    define('SITE_NAME', 'Astroyds');
}
if (!defined('SITE_URL')) {
    define('SITE_URL', env('SITE_URL', 'https://astroyds.com'));
}
if (!defined('SITE_EMAIL')) {
    define('SITE_EMAIL', 'letstalk@astroyds.com');
}
if (!defined('SITE_LOCATION')) {
    define('SITE_LOCATION', 'Maple Grove, Hennepin County, Minnesota 55311, USA');
}

/** Sub-companies under Astroyds */
if (!defined('SUBCOMPANIES')) {
    define('SUBCOMPANIES', ['IDLE', 'RIFT', 'BulletPROOF']);
}

/*
|--------------------------------------------------------------------------
| Timezone
|--------------------------------------------------------------------------
*/
date_default_timezone_set('America/Chicago');

/*
|--------------------------------------------------------------------------
| Error Reporting
|--------------------------------------------------------------------------
| Display errors only when APP_ENV is explicitly set to "development".
*/
$app_env = env('APP_ENV', 'production');

if ($app_env === 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
} else {
    error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
    ini_set('display_errors', '0');
    ini_set('log_errors', '1');
}
