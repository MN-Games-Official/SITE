<?php

/**
 * CSRF Protection Utilities for Astroyds
 *
 * Provides token generation, HTML field rendering, and validation
 * helpers to guard against cross-site request forgery attacks.
 *
 * Tokens are stored in the user's session and are single-use by default.
 *
 * @package    Astroyds
 * @author     Astroyds <letstalk@astroyds.com>
 * @copyright  Astroyds
 * @link       https://astroyds.com
 */

declare(strict_types=1);

/**
 * Ensure a PHP session is active.
 *
 * Starts a session with secure defaults if one has not already been
 * started. Designed to be called automatically by the CSRF helpers.
 *
 * @return void
 */
function csrf_ensure_session(): void
{
    if (session_status() === PHP_SESSION_ACTIVE) {
        return;
    }

    // Harden session cookie settings
    session_set_cookie_params([
        'lifetime' => 0,
        'path'     => '/',
        'domain'   => '',
        'secure'   => true,
        'httponly'  => true,
        'samesite' => 'Strict',
    ]);

    session_start();
}

/**
 * Generate or retrieve the current CSRF token.
 *
 * A new token is created per session. If a token already exists in
 * the session, it is reused to allow multiple forms on the same page.
 *
 * @return string 64-character hex token.
 */
function csrf_token(): string
{
    csrf_ensure_session();

    if (empty($_SESSION['_csrf_token'])) {
        $_SESSION['_csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['_csrf_token'];
}

/**
 * Return a hidden HTML input element containing the CSRF token.
 *
 * Drop this inside any <form> to include the token automatically.
 *
 * @return string HTML hidden input element.
 */
function csrf_field(): string
{
    $token = csrf_token();
    return '<input type="hidden" name="_csrf_token" value="' . htmlspecialchars($token, ENT_QUOTES, 'UTF-8') . '">';
}

/**
 * Validate a submitted CSRF token.
 *
 * Compares the provided token against the one stored in the session
 * using a timing-safe comparison. The token is rotated after a
 * successful validation to prevent replay attacks.
 *
 * @param  string $token The token value from the submitted form.
 * @return bool   True when the token is valid.
 */
function csrf_validate(string $token): bool
{
    csrf_ensure_session();

    if (empty($_SESSION['_csrf_token'])) {
        return false;
    }

    $valid = hash_equals($_SESSION['_csrf_token'], $token);

    if ($valid) {
        // Rotate token after successful validation (single-use)
        unset($_SESSION['_csrf_token']);
    }

    return $valid;
}
