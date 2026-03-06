<?php

/**
 * Submission Storage Abstraction for Astroyds
 *
 * Provides a unified interface for storing and retrieving contact-form
 * submissions. The back-end is chosen by the CONTACT_STORAGE constant
 * defined in config.php:
 *
 *   "file"   — One JSON file per submission in data/submissions/
 *   "sqlite" — A single SQLite database at data/submissions.db
 *
 * @package    Astroyds
 * @author     Astroyds <letstalk@astroyds.com>
 * @copyright  Astroyds
 * @link       https://astroyds.com
 */

declare(strict_types=1);

/** Base data directory (two levels up from src/php/) */
define('DATA_DIR', __DIR__ . '/../../data');

/** Directory for JSON file submissions */
define('SUBMISSIONS_DIR', DATA_DIR . '/submissions');

/** Path to the SQLite database */
define('SQLITE_DB_PATH', DATA_DIR . '/submissions.db');

/*
|--------------------------------------------------------------------------
| Directory Bootstrapping
|--------------------------------------------------------------------------
*/

/**
 * Ensure a directory exists with restrictive permissions.
 *
 * @param  string $dir  Absolute path to the directory.
 * @param  int    $mode Octal permission mask (default 0750).
 * @return void
 */
function ensure_directory(string $dir, int $mode = 0750): void
{
    if (!is_dir($dir)) {
        if (!mkdir($dir, $mode, true) && !is_dir($dir)) {
            throw new \RuntimeException("Failed to create directory: {$dir}");
        }
    }
}

/*
|--------------------------------------------------------------------------
| Public API
|--------------------------------------------------------------------------
*/

/**
 * Store a submission using the configured back-end.
 *
 * @param  array $data Associative array of submission fields.
 * @return bool  True on success.
 *
 * @throws \RuntimeException When the write fails.
 */
function store_submission(array $data): bool
{
    $storage = defined('CONTACT_STORAGE') ? CONTACT_STORAGE : 'file';

    return match ($storage) {
        'sqlite' => store_submission_sqlite($data),
        default  => store_submission_file($data),
    };
}

/**
 * Retrieve stored submissions (newest first).
 *
 * @param  int   $limit  Maximum number of results.
 * @param  int   $offset Number of results to skip.
 * @return array List of submission arrays.
 */
function get_submissions(int $limit = 50, int $offset = 0): array
{
    $storage = defined('CONTACT_STORAGE') ? CONTACT_STORAGE : 'file';

    return match ($storage) {
        'sqlite' => get_submissions_sqlite($limit, $offset),
        default  => get_submissions_file($limit, $offset),
    };
}

/**
 * Count the total number of stored submissions.
 *
 * @return int
 */
function count_submissions(): int
{
    $storage = defined('CONTACT_STORAGE') ? CONTACT_STORAGE : 'file';

    return match ($storage) {
        'sqlite' => count_submissions_sqlite(),
        default  => count_submissions_file(),
    };
}

/*
|--------------------------------------------------------------------------
| File-based Storage
|--------------------------------------------------------------------------
*/

/**
 * Store a submission as a JSON file.
 *
 * Filenames are timestamped with a unique suffix to avoid collisions.
 *
 * @param  array $data Submission data.
 * @return bool
 */
function store_submission_file(array $data): bool
{
    ensure_directory(SUBMISSIONS_DIR);

    $filename = date('Ymd_His') . '_' . bin2hex(random_bytes(4)) . '.json';
    $path     = SUBMISSIONS_DIR . '/' . $filename;

    $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    if ($json === false) {
        throw new \RuntimeException('Failed to encode submission data as JSON.');
    }

    $written = file_put_contents($path, $json, LOCK_EX);
    if ($written === false) {
        throw new \RuntimeException("Failed to write submission file: {$path}");
    }

    return true;
}

/**
 * Retrieve submissions from JSON files (newest first).
 *
 * @param  int   $limit  Max results.
 * @param  int   $offset Skip count.
 * @return array
 */
function get_submissions_file(int $limit = 50, int $offset = 0): array
{
    if (!is_dir(SUBMISSIONS_DIR)) {
        return [];
    }

    $files = glob(SUBMISSIONS_DIR . '/*.json');
    if ($files === false || $files === []) {
        return [];
    }

    // Sort descending by filename (which starts with a timestamp)
    rsort($files);

    $files  = array_slice($files, $offset, $limit);
    $result = [];

    foreach ($files as $file) {
        $contents = file_get_contents($file);
        if ($contents === false) {
            continue;
        }

        $data = json_decode($contents, true);
        if (is_array($data)) {
            $result[] = $data;
        }
    }

    return $result;
}

/**
 * Count JSON submission files.
 *
 * @return int
 */
function count_submissions_file(): int
{
    if (!is_dir(SUBMISSIONS_DIR)) {
        return 0;
    }

    $files = glob(SUBMISSIONS_DIR . '/*.json');
    return $files !== false ? count($files) : 0;
}

/*
|--------------------------------------------------------------------------
| SQLite Storage
|--------------------------------------------------------------------------
*/

/**
 * Get (or create) a PDO connection to the SQLite database.
 *
 * The database and table are created automatically on first use.
 *
 * @return \PDO
 */
function get_sqlite_connection(): \PDO
{
    static $pdo = null;

    if ($pdo !== null) {
        return $pdo;
    }

    ensure_directory(DATA_DIR);

    $pdo = new \PDO('sqlite:' . SQLITE_DB_PATH, null, null, [
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    ]);

    // Enable WAL mode for better concurrent read performance
    $pdo->exec('PRAGMA journal_mode=WAL');

    // Create the submissions table if it doesn't exist
    $pdo->exec('
        CREATE TABLE IF NOT EXISTS submissions (
            id         INTEGER PRIMARY KEY AUTOINCREMENT,
            name       TEXT NOT NULL,
            email      TEXT NOT NULL,
            company    TEXT DEFAULT "",
            role       TEXT DEFAULT "",
            message    TEXT NOT NULL,
            ip         TEXT DEFAULT "",
            user_agent TEXT DEFAULT "",
            submitted  TEXT NOT NULL,
            created_at TEXT DEFAULT (datetime("now"))
        )
    ');

    return $pdo;
}

/**
 * Store a submission in the SQLite database.
 *
 * Uses a prepared statement to prevent SQL injection.
 *
 * @param  array $data Submission data.
 * @return bool
 */
function store_submission_sqlite(array $data): bool
{
    $pdo = get_sqlite_connection();

    $stmt = $pdo->prepare('
        INSERT INTO submissions (name, email, company, role, message, ip, user_agent, submitted)
        VALUES (:name, :email, :company, :role, :message, :ip, :user_agent, :submitted)
    ');

    return $stmt->execute([
        ':name'       => $data['name']       ?? '',
        ':email'      => $data['email']      ?? '',
        ':company'    => $data['company']    ?? '',
        ':role'       => $data['role']       ?? '',
        ':message'    => $data['message']    ?? '',
        ':ip'         => $data['ip']         ?? '',
        ':user_agent' => $data['user_agent'] ?? '',
        ':submitted'  => $data['submitted'] ?? date('c'),
    ]);
}

/**
 * Retrieve submissions from SQLite (newest first).
 *
 * @param  int   $limit  Max results.
 * @param  int   $offset Skip count.
 * @return array
 */
function get_submissions_sqlite(int $limit = 50, int $offset = 0): array
{
    $pdo  = get_sqlite_connection();

    $stmt = $pdo->prepare('
        SELECT * FROM submissions
        ORDER BY id DESC
        LIMIT :limit OFFSET :offset
    ');
    $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll();
}

/**
 * Count submissions in the SQLite database.
 *
 * @return int
 */
function count_submissions_sqlite(): int
{
    $pdo  = get_sqlite_connection();
    $stmt = $pdo->query('SELECT COUNT(*) AS total FROM submissions');
    $row  = $stmt->fetch();

    return (int) ($row['total'] ?? 0);
}
