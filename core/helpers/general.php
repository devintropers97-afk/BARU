<?php
/**
 * SITUNEO DIGITAL - Helper Functions
 * 
 * General helper functions for common tasks
 * 
 * @package    SITUNEO
 * @subpackage Core/Helpers
 * @version    1.0.0
 */

// Prevent direct access
if (!defined('SITUNEO_INIT')) {
    die('Direct access not permitted');
}

/**
 * Redirect to URL
 */
function redirect($url) {
    if (headers_sent()) {
        echo "<script>window.location.href='$url';</script>";
    } else {
        header("Location: $url");
    }
    exit;
}

/**
 * Get Base URL
 */
function base_url($path = '') {
    return APP_URL . '/' . ltrim($path, '/');
}

/**
 * Get Asset URL
 */
function asset_url($path) {
    return ASSETS_URL . '/' . ltrim($path, '/');
}

/**
 * Format Currency (IDR)
 */
function format_currency($amount) {
    return 'Rp ' . number_format($amount, 0, ',', '.');
}

/**
 * Format Date
 */
function format_date($date, $format = DISPLAY_DATE_FORMAT) {
    return date($format, strtotime($date));
}

/**
 * Format DateTime
 */
function format_datetime($datetime, $format = DISPLAY_DATETIME_FORMAT) {
    return date($format, strtotime($datetime));
}

/**
 * Time Ago
 */
function time_ago($datetime) {
    $time = strtotime($datetime);
    $diff = time() - $time;
    
    if ($diff < 60) return 'baru saja';
    if ($diff < 3600) return floor($diff/60) . ' menit lalu';
    if ($diff < 86400) return floor($diff/3600) . ' jam lalu';
    if ($diff < 604800) return floor($diff/86400) . ' hari lalu';
    if ($diff < 2592000) return floor($diff/604800) . ' minggu lalu';
    if ($diff < 31536000) return floor($diff/2592000) . ' bulan lalu';
    return floor($diff/31536000) . ' tahun lalu';
}

/**
 * Generate Random String
 */
function generate_random_string($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

/**
 * Generate Slug from String
 */
function generate_slug($string) {
    $slug = strtolower(trim($string));
    $slug = preg_replace('/[^a-z0-9-]/', '-', $slug);
    $slug = preg_replace('/-+/', '-', $slug);
    return $slug;
}

/**
 * Generate Order Number
 */
function generate_order_number() {
    return 'ORD-' . date('Ymd') . '-' . strtoupper(generate_random_string(6));
}

/**
 * Generate Invoice Number
 */
function generate_invoice_number() {
    return 'INV-' . date('Ymd') . '-' . strtoupper(generate_random_string(6));
}

/**
 * Generate Ticket Number
 */
function generate_ticket_number() {
    return 'TKT-' . date('Ymd') . '-' . strtoupper(generate_random_string(6));
}

/**
 * Upload File
 */
function upload_file($file, $directory = 'temp', $allowed_types = null) {
    if ($allowed_types === null) {
        $allowed_types = ALLOWED_FILE_TYPES;
    }
    
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return ['success' => false, 'message' => 'Upload error occurred'];
    }
    
    if ($file['size'] > MAX_UPLOAD_SIZE) {
        return ['success' => false, 'message' => 'File too large'];
    }
    
    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($extension, $allowed_types)) {
        return ['success' => false, 'message' => 'File type not allowed'];
    }
    
    $filename = generate_random_string(20) . '.' . $extension;
    $upload_path = UPLOAD_DIRS[$directory] . '/' . $filename;
    
    if (move_uploaded_file($file['tmp_name'], $upload_path)) {
        return ['success' => true, 'filename' => $filename, 'path' => $upload_path];
    }
    
    return ['success' => false, 'message' => 'Failed to move uploaded file'];
}

/**
 * Delete File
 */
function delete_file($path) {
    if (file_exists($path)) {
        return unlink($path);
    }
    return false;
}

/**
 * Send JSON Response
 */
function json_response($data, $status_code = 200) {
    http_response_code($status_code);
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

/**
 * Get Success Message HTML
 */
function success_message($message) {
    return '<div class="alert alert-success">' . $message . '</div>';
}

/**
 * Get Error Message HTML
 */
function error_message($message) {
    return '<div class="alert alert-danger">' . $message . '</div>';
}

/**
 * Get Warning Message HTML
 */
function warning_message($message) {
    return '<div class="alert alert-warning">' . $message . '</div>';
}

/**
 * Truncate String
 */
function truncate_string($string, $length = 100, $append = '...') {
    if (strlen($string) <= $length) {
        return $string;
    }
    return substr($string, 0, $length) . $append;
}

/**
 * Debug Dump
 */
function dd($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    exit;
}
