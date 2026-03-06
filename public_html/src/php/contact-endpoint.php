<?php

/**
 * Contact Form POST Endpoint for Astroyds
 *
 * Accepts POST submissions from the contact form, validates input,
 * enforces rate limits, stores the message, and optionally sends an
 * email notification via SMTP.
 *
 * Response format: JSON with appropriate HTTP status codes.
 *   200 — Success
 *   403 — CSRF validation failure
 *   422 — Validation errors
 *   429 — Rate limit exceeded
 *   405 — Method not allowed
 *   500 — Internal error
 *
 * @package    Astroyds
 * @author     Astroyds <letstalk@astroyds.com>
 * @copyright  Astroyds
 * @link       https://astroyds.com
 */

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/csrf.php';
require_once __DIR__ . '/submit_storage.php';

header('Content-Type: application/json; charset=utf-8');

/*
|--------------------------------------------------------------------------
| Only accept POST requests
|--------------------------------------------------------------------------
*/
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed.']);
    exit;
}

/*
|--------------------------------------------------------------------------
| CSRF Validation
|--------------------------------------------------------------------------
*/
$csrf_token = $_POST['_csrf_token'] ?? '';

if (!csrf_validate($csrf_token)) {
    http_response_code(403);
    echo json_encode(['error' => 'Invalid or expired CSRF token. Please reload the page and try again.']);
    exit;
}

/*
|--------------------------------------------------------------------------
| Rate Limiting (file-based, per IP)
|--------------------------------------------------------------------------
| Max 5 submissions per hour per IP address.
*/
$rate_limit_dir = __DIR__ . '/../../data/rate_limits';

if (!is_dir($rate_limit_dir)) {
    if (!mkdir($rate_limit_dir, 0750, true) && !is_dir($rate_limit_dir)) {
        error_log('[Astroyds] Failed to create rate limit directory: ' . $rate_limit_dir);
        // Allow the request through rather than blocking all submissions
    }
}

/**
 * Check and enforce the per-IP rate limit.
 *
 * Uses a JSON file per IP address containing an array of timestamps.
 * Expired entries are pruned on each check.
 *
 * @param  string $dir     Directory for rate limit files.
 * @param  string $ip      Client IP address.
 * @param  int    $max     Maximum allowed submissions in the window.
 * @param  int    $window  Window size in seconds (default: 3600 = 1 hour).
 * @return bool   True if the request is within the limit.
 */
function check_rate_limit(string $dir, string $ip, int $max = 5, int $window = 3600): bool
{
    // Hash the IP to avoid filesystem issues with IPv6 colons
    $file = $dir . '/' . hash('sha256', $ip) . '.json';
    $now  = time();

    $timestamps = [];
    if (is_file($file)) {
        $contents = file_get_contents($file);
        if ($contents !== false) {
            $data = json_decode($contents, true);
            if (is_array($data)) {
                $timestamps = $data;
            }
        }
    }

    // Prune entries outside the current window
    $timestamps = array_values(array_filter(
        $timestamps,
        static fn(int $ts): bool => ($now - $ts) < $window
    ));

    if (count($timestamps) >= $max) {
        return false;
    }

    $timestamps[] = $now;

    if (file_put_contents($file, json_encode($timestamps), LOCK_EX) === false) {
        // If we can't write the counter, allow the request but log the issue
        error_log('[Astroyds] Failed to write rate limit file: ' . $file);
    }

    return true;
}

$client_ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';

if (!check_rate_limit($rate_limit_dir, $client_ip)) {
    http_response_code(429);
    echo json_encode(['error' => 'Too many submissions. Please try again later.']);
    exit;
}

/*
|--------------------------------------------------------------------------
| Input Sanitisation & Validation
|--------------------------------------------------------------------------
*/

/**
 * Sanitise a user-supplied string.
 *
 * Strips tags and trims whitespace. Returns an empty string for null input.
 *
 * @param  mixed $value Raw input.
 * @return string       Cleaned string.
 */
function sanitise(mixed $value): string
{
    if (!is_string($value)) {
        return '';
    }
    return trim(strip_tags($value));
}

$name    = sanitise($_POST['name']    ?? null);
$email   = sanitise($_POST['email']   ?? null);
$company = sanitise($_POST['company'] ?? null);
$role    = sanitise($_POST['role']    ?? null);
$message = sanitise($_POST['message'] ?? null);
$consent = isset($_POST['consent']) && $_POST['consent'];

$errors = [];

// Name: required, max 100
if ($name === '') {
    $errors['name'] = 'Name is required.';
} elseif (mb_strlen($name) > 100) {
    $errors['name'] = 'Name must not exceed 100 characters.';
}

// Email: required, valid format
if ($email === '') {
    $errors['email'] = 'Email is required.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Please provide a valid email address.';
}

// Company: optional, max 100
if ($company !== '' && mb_strlen($company) > 100) {
    $errors['company'] = 'Company name must not exceed 100 characters.';
}

// Role: optional, max 100
if ($role !== '' && mb_strlen($role) > 100) {
    $errors['role'] = 'Role must not exceed 100 characters.';
}

// Message: required, 10–5000 characters
if ($message === '') {
    $errors['message'] = 'Message is required.';
} elseif (mb_strlen($message) < 10) {
    $errors['message'] = 'Message must be at least 10 characters.';
} elseif (mb_strlen($message) > 5000) {
    $errors['message'] = 'Message must not exceed 5000 characters.';
}

// Consent: must be checked
if (!$consent) {
    $errors['consent'] = 'You must consent to your data being stored.';
}

if (!empty($errors)) {
    http_response_code(422);
    echo json_encode(['errors' => $errors]);
    exit;
}

/*
|--------------------------------------------------------------------------
| Store the Submission
|--------------------------------------------------------------------------
*/
$submission = [
    'name'       => $name,
    'email'      => $email,
    'company'    => $company,
    'role'       => $role,
    'message'    => $message,
    'ip'         => $client_ip,
    'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? '',
    'submitted'  => date('c'), // ISO 8601
];

try {
    store_submission($submission);
} catch (\Throwable $e) {
    error_log('[Astroyds] Failed to store contact submission: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['error' => 'An internal error occurred. Please try again later.']);
    exit;
}

/*
|--------------------------------------------------------------------------
| Optional SMTP Notification
|--------------------------------------------------------------------------
*/
if (defined('SMTP_ENABLED') && SMTP_ENABLED) {
    try {
        send_notification_email($submission);
    } catch (\Throwable $e) {
        // Log the failure but still report success to the user — the
        // submission has been stored and can be reviewed from the admin.
        error_log('[Astroyds] SMTP notification failed: ' . $e->getMessage());
    }
}

/**
 * Send a notification email for a new contact submission.
 *
 * Uses PHP's built-in mail() function. In production you would
 * typically swap this for a proper SMTP library (e.g. PHPMailer).
 *
 * @param  array $data Submission data.
 * @return void
 */
function send_notification_email(array $data): void
{
    $to      = defined('SMTP_TO') ? SMTP_TO : 'letstalk@astroyds.com';
    $from    = defined('SMTP_FROM') ? SMTP_FROM : 'letstalk@astroyds.com';
    $subject = 'New Contact Submission from ' . ($data['name'] ?? 'Unknown');

    $body  = "New contact form submission\n";
    $body .= "========================\n\n";
    $body .= "Name:    {$data['name']}\n";
    $body .= "Email:   {$data['email']}\n";
    $body .= "Company: {$data['company']}\n";
    $body .= "Role:    {$data['role']}\n";
    $body .= "Message:\n{$data['message']}\n\n";
    $body .= "IP:      {$data['ip']}\n";
    $body .= "Time:    {$data['submitted']}\n";

    $headers = implode("\r\n", [
        "From: {$from}",
        'Content-Type: text/plain; charset=UTF-8',
        'X-Mailer: Astroyds/1.0',
    ]);

    mail($to, $subject, $body, $headers);
}

/*
|--------------------------------------------------------------------------
| Success Response
|--------------------------------------------------------------------------
*/
http_response_code(200);
echo json_encode([
    'success' => true,
    'message' => 'Thank you for reaching out! We\'ll get back to you soon.',
]);
