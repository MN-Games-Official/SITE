<?php

/**
 * Example Configuration for Astroyds
 *
 * Copy this file to .env in the project root and fill in the values
 * appropriate for your environment. The config.php loader will read
 * these variables automatically.
 *
 * ---------------------------------------------------------------
 *  IMPORTANT: Never commit a real .env file to version control.
 *  Add ".env" to your .gitignore.
 * ---------------------------------------------------------------
 *
 * @package    Astroyds
 * @author     Astroyds <letstalk@astroyds.com>
 * @copyright  Astroyds
 * @link       https://astroyds.com
 */

/*
|--------------------------------------------------------------------------
| How to Use
|--------------------------------------------------------------------------
|
| 1. Copy this file:
|      cp config.example.php .env
|
| 2. Open the new .env file in your editor and update the values below.
|
| 3. The application reads .env automatically — no code changes required.
|
| Variable reference (all optional — defaults are shown after =):
|
|--------------------------------------------------------------------------
| APP_ENV
|--------------------------------------------------------------------------
| Application environment. Set to "development" for verbose error output.
| Default: production
|
|   APP_ENV=production
|
|--------------------------------------------------------------------------
| HERO_CONCEPT
|--------------------------------------------------------------------------
| Landing-page hero variant. Choose between the immersive full-bleed
| layout or the classic serif-focused design.
| Allowed values: immersive, serif
| Default: immersive
|
|   HERO_CONCEPT=immersive
|
|--------------------------------------------------------------------------
| CLARITY_ID
|--------------------------------------------------------------------------
| Microsoft Clarity project ID for behavioural analytics.
| Leave blank to disable Clarity tracking.
| Obtain your ID at: https://clarity.microsoft.com
|
|   CLARITY_ID=
|
|--------------------------------------------------------------------------
| ADMIN_TOKEN
|--------------------------------------------------------------------------
| A secret token required to access admin endpoints (e.g. viewing
| submissions). Generate a strong random string:
|   php -r "echo bin2hex(random_bytes(32));"
|
|   ADMIN_TOKEN=
|
|--------------------------------------------------------------------------
| CONTACT_STORAGE
|--------------------------------------------------------------------------
| Back-end for storing contact-form submissions.
|   "file"   — One JSON file per submission in data/submissions/
|   "sqlite" — SQLite database at data/submissions.db
| Default: file
|
|   CONTACT_STORAGE=file
|
|--------------------------------------------------------------------------
| SMTP Settings
|--------------------------------------------------------------------------
| Enable email notifications for new contact submissions.
| Set SMTP_ENABLED=true and fill in the remaining fields.
|
|   SMTP_ENABLED=false
|   SMTP_HOST=smtp.example.com
|   SMTP_PORT=587
|   SMTP_USER=
|   SMTP_PASS=
|   SMTP_FROM=letstalk@astroyds.com
|   SMTP_TO=letstalk@astroyds.com
|
|--------------------------------------------------------------------------
| MAINTENANCE_MODE
|--------------------------------------------------------------------------
| Set to "true" to display a maintenance page to all visitors.
| Default: false
|
|   MAINTENANCE_MODE=false
|
|--------------------------------------------------------------------------
| SITE_URL
|--------------------------------------------------------------------------
| Base URL of the site (no trailing slash). Used for generating absolute
| URLs in sitemaps, Open Graph tags, and canonical links.
| Default: https://astroyds.com
|
|   SITE_URL=https://astroyds.com
|
*/
