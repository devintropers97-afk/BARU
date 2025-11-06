<?php
/**
 * SITUNEO DIGITAL - Application Configuration
 * 
 * Main configuration file for the application
 * 
 * @package    SITUNEO
 * @subpackage Config
 * @version    1.0.0
 */

// Prevent direct access
if (!defined('SITUNEO_INIT')) {
    die('Direct access not permitted');
}

/**
 * Application Settings
 */

// Application Name
define('APP_NAME', 'SITUNEO DIGITAL');

// Application Version
define('APP_VERSION', '1.0.0');

// Application URL
define('APP_URL', 'https://situneo.my.id');

// Application Environment (development, staging, production)
define('APP_ENV', 'production');

// Debug Mode (true for development, false for production)
define('APP_DEBUG', false);

/**
 * Company Information
 */

// Company Name
define('COMPANY_NAME', 'SITUNEO DIGITAL');

// Company Legal Name
define('COMPANY_LEGAL_NAME', 'PT. Situneo Digital Indonesia');

// Company NIB
define('COMPANY_NIB', '20250-9261-4570-4515-5453');

// Company NPWP
define('COMPANY_NPWP', '90.296.264.6-002.000');

// Company Director
define('COMPANY_DIRECTOR', 'Devin Prasetyo Hermawan');

// Company Founded Year
define('COMPANY_FOUNDED', '2020');

/**
 * Contact Information
 */

// Primary Email
define('CONTACT_EMAIL', 'vins@situneo.my.id');

// Support Email
define('SUPPORT_EMAIL', 'support@situneo.my.id');

// WhatsApp Number
define('CONTACT_WHATSAPP', '+62 831-7386-8915');

// Phone Number
define('CONTACT_PHONE', '021-8880-7229');

// Company Address
define('COMPANY_ADDRESS', 'Jl. Bekasi Timur IX Dalam No. 27, RT 002/RW 003');
define('COMPANY_CITY', 'Jakarta Timur');
define('COMPANY_POSTAL', '13450');
define('COMPANY_COUNTRY', 'Indonesia');

/**
 * Social Media Links
 */
define('SOCIAL_FACEBOOK', 'https://facebook.com/situneo');
define('SOCIAL_INSTAGRAM', 'https://instagram.com/situneo');
define('SOCIAL_TWITTER', 'https://twitter.com/situneo');
define('SOCIAL_LINKEDIN', 'https://linkedin.com/company/situneo');
define('SOCIAL_YOUTUBE', 'https://youtube.com/@situneo');

/**
 * Directory Paths
 */

// Root Directory
define('ROOT_DIR', dirname(dirname(__DIR__)));

// Config Directory
define('CONFIG_DIR', ROOT_DIR . '/config');

// Core Directory
define('CORE_DIR', ROOT_DIR . '/core');

// Modules Directory
define('MODULES_DIR', ROOT_DIR . '/modules');

// Templates Directory
define('TEMPLATES_DIR', ROOT_DIR . '/templates');

// Assets Directory
define('ASSETS_DIR', ROOT_DIR . '/assets');

// Uploads Directory
define('UPLOADS_DIR', ROOT_DIR . '/uploads');

// Logs Directory
define('LOGS_DIR', ROOT_DIR . '/logs');

/**
 * URL Paths
 */

// Assets URL
define('ASSETS_URL', APP_URL . '/assets');

// Uploads URL
define('UPLOADS_URL', APP_URL . '/uploads');

// CSS URL
define('CSS_URL', ASSETS_URL . '/css');

// JS URL
define('JS_URL', ASSETS_URL . '/js');

// Images URL
define('IMAGES_URL', ASSETS_URL . '/images');

/**
 * Session Settings
 */

// Session Name
define('SESSION_NAME', 'situneo_session');

// Session Lifetime (in seconds) - 24 hours
define('SESSION_LIFETIME', 86400);

// Session Cookie Path
define('SESSION_PATH', '/');

// Session Cookie Domain
define('SESSION_DOMAIN', '.situneo.my.id');

// Session Cookie Secure (true for HTTPS only)
define('SESSION_SECURE', true);

// Session Cookie HTTP Only
define('SESSION_HTTPONLY', true);

/**
 * Security Settings
 */

// Encryption Key (Change this to a random string)
define('ENCRYPTION_KEY', 'SituNeo_2025_SecureKey_' . md5(COMPANY_NIB));

// CSRF Token Name
define('CSRF_TOKEN_NAME', 'csrf_token');

// CSRF Token Lifetime (in seconds) - 1 hour
define('CSRF_TOKEN_LIFETIME', 3600);

// Password Hash Algorithm
define('PASSWORD_ALGO', PASSWORD_BCRYPT);

// Password Hash Cost
define('PASSWORD_COST', 12);

/**
 * File Upload Settings
 */

// Max Upload Size (in bytes) - 10MB
define('MAX_UPLOAD_SIZE', 10485760);

// Allowed File Types
define('ALLOWED_FILE_TYPES', [
    'jpg', 'jpeg', 'png', 'gif', 'pdf', 
    'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx',
    'zip', 'rar'
]);

// Upload Directory Structure
define('UPLOAD_DIRS', [
    'avatars'    => UPLOADS_DIR . '/avatars',
    'documents'  => UPLOADS_DIR . '/documents',
    'portfolios' => UPLOADS_DIR . '/portfolios',
    'payments'   => UPLOADS_DIR . '/payments',
    'demos'      => UPLOADS_DIR . '/demos',
    'temp'       => UPLOADS_DIR . '/temp'
]);

/**
 * Email Settings (SMTP)
 */

// SMTP Host
define('SMTP_HOST', 'mail.situneo.my.id');

// SMTP Port
define('SMTP_PORT', 587);

// SMTP Security (tls or ssl)
define('SMTP_SECURITY', 'tls');

// SMTP Username
define('SMTP_USERNAME', 'noreply@situneo.my.id');

// SMTP Password
define('SMTP_PASSWORD', ''); // Set in admin panel

// Email From Address
define('EMAIL_FROM', 'noreply@situneo.my.id');

// Email From Name
define('EMAIL_FROM_NAME', 'SITUNEO DIGITAL');

/**
 * Freelancer Commission Settings
 */

// Tier 1: 0-10 orders = 30% commission
define('TIER_1_MIN', 0);
define('TIER_1_MAX', 10);
define('TIER_1_COMMISSION', 30);

// Tier 2: 11-25 orders = 40% commission
define('TIER_2_MIN', 11);
define('TIER_2_MAX', 25);
define('TIER_2_COMMISSION', 40);

// Tier 3: 26+ orders = 50% commission
define('TIER_3_MIN', 26);
define('TIER_3_MAX', PHP_INT_MAX);
define('TIER_3_COMMISSION', 50);

// Bonus: 75+ orders/month = +5% bonus
define('BONUS_THRESHOLD', 75);
define('BONUS_PERCENTAGE', 5);

// Minimum Withdrawal Amount
define('MIN_WITHDRAWAL', 50000);

/**
 * Pagination Settings
 */

// Items Per Page
define('ITEMS_PER_PAGE', 20);

// Max Pagination Links
define('MAX_PAGINATION_LINKS', 7);

/**
 * Date & Time Settings
 */

// Timezone
define('APP_TIMEZONE', 'Asia/Jakarta');

// Date Format
define('DATE_FORMAT', 'Y-m-d');

// Time Format
define('TIME_FORMAT', 'H:i:s');

// DateTime Format
define('DATETIME_FORMAT', 'Y-m-d H:i:s');

// Display Date Format
define('DISPLAY_DATE_FORMAT', 'd M Y');

// Display DateTime Format
define('DISPLAY_DATETIME_FORMAT', 'd M Y H:i');

/**
 * Language Settings
 */

// Default Language
define('DEFAULT_LANGUAGE', 'id');

// Available Languages
define('AVAILABLE_LANGUAGES', ['id', 'en']);

// Language Directory
define('LANG_DIR', ROOT_DIR . '/languages');

/**
 * Cache Settings
 */

// Cache Enabled
define('CACHE_ENABLED', true);

// Cache Directory
define('CACHE_DIR', ROOT_DIR . '/cache');

// Cache Lifetime (in seconds) - 1 hour
define('CACHE_LIFETIME', 3600);

/**
 * Log Settings
 */

// Log Enabled
define('LOG_ENABLED', true);

// Log Level (debug, info, warning, error, critical)
define('LOG_LEVEL', APP_ENV === 'production' ? 'error' : 'debug');

// Log File Path
define('LOG_FILE', LOGS_DIR . '/situneo_' . date('Y-m-d') . '.log');

/**
 * API Settings
 */

// API Enabled
define('API_ENABLED', true);

// API Version
define('API_VERSION', 'v1');

// API Rate Limit (requests per minute)
define('API_RATE_LIMIT', 60);

/**
 * SEO Settings
 */

// Meta Title Separator
define('META_TITLE_SEPARATOR', ' | ');

// Default Meta Description
define('DEFAULT_META_DESCRIPTION', 'SITUNEO DIGITAL - Your Digital Partner for Website Development, Digital Marketing, and Business Solutions. 232+ Services, Professional Team, Affordable Prices.');

// Default Meta Keywords
define('DEFAULT_META_KEYWORDS', 'website, digital marketing, web development, SEO, freelancer, situneo');

/**
 * Statistics
 */

// Total Services
define('TOTAL_SERVICES', 232);

// Total Clients (will be dynamic)
define('INITIAL_CLIENTS', 500);

// Total Projects (will be dynamic)
define('INITIAL_PROJECTS', 1200);

// Average Rating
define('AVERAGE_RATING', 4.9);

/**
 * Demo Settings
 */

// Free Demo Duration (in hours)
define('FREE_DEMO_DURATION', 24);

// Demo Request Form Fields (26 fields)
define('DEMO_FORM_FIELDS', 26);

/**
 * Initialize Application
 */

// Set Timezone
date_default_timezone_set(APP_TIMEZONE);

// Set Error Reporting
if (APP_DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
    ini_set('display_errors', 0);
    ini_set('log_errors', 1);
    ini_set('error_log', LOGS_DIR . '/php_errors.log');
}

// Create required directories if not exist
$requiredDirs = [
    UPLOADS_DIR,
    LOGS_DIR,
    CACHE_DIR,
    UPLOADS_DIR . '/avatars',
    UPLOADS_DIR . '/documents',
    UPLOADS_DIR . '/portfolios',
    UPLOADS_DIR . '/payments',
    UPLOADS_DIR . '/demos',
    UPLOADS_DIR . '/temp'
];

foreach ($requiredDirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

// Create .htaccess for uploads directory (security)
$htaccessFile = UPLOADS_DIR . '/.htaccess';
if (!file_exists($htaccessFile)) {
    file_put_contents($htaccessFile, "Options -Indexes\n<FilesMatch \"\\.(php|php3|php4|php5|phtml)$\">\n  Order Allow,Deny\n  Deny from all\n</FilesMatch>");
}
