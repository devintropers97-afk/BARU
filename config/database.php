<?php
/**
 * SITUNEO DIGITAL - Database Configuration
 * 
 * This file contains database connection credentials and settings
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
 * Database Configuration Constants
 */

// Database Host
define('DB_HOST', 'localhost');

// Database Name
define('DB_NAME', 'nrrskfvk_situneo_digital');

// Database User
define('DB_USER', 'nrrskfvk_user_situneo_digital');

// Database Password
define('DB_PASS', 'Devin1922$');

// Database Charset
define('DB_CHARSET', 'utf8mb4');

// Database Collation
define('DB_COLLATE', 'utf8mb4_unicode_ci');

// Table Prefix (optional, for multi-site)
define('DB_PREFIX', '');

/**
 * Database Connection Settings
 */

// PDO Options
define('DB_PDO_OPTIONS', [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . DB_CHARSET
]);

/**
 * Database Class
 * 
 * Handles database connection using PDO
 */
class Database {
    private static $instance = null;
    private $connection = null;
    
    /**
     * Private constructor to prevent direct instantiation
     */
    private function __construct() {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
            $this->connection = new PDO($dsn, DB_USER, DB_PASS, DB_PDO_OPTIONS);
        } catch (PDOException $e) {
            // Log error and show user-friendly message
            error_log("Database Connection Error: " . $e->getMessage());
            die("Database connection failed. Please contact administrator.");
        }
    }
    
    /**
     * Get Database Instance (Singleton)
     * 
     * @return Database
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    /**
     * Get PDO Connection
     * 
     * @return PDO
     */
    public function getConnection() {
        return $this->connection;
    }
    
    /**
     * Prepare SQL Statement
     * 
     * @param string $sql
     * @return PDOStatement
     */
    public function prepare($sql) {
        return $this->connection->prepare($sql);
    }
    
    /**
     * Execute SQL Query
     * 
     * @param string $sql
     * @return PDOStatement
     */
    public function query($sql) {
        return $this->connection->query($sql);
    }
    
    /**
     * Get Last Insert ID
     * 
     * @return string
     */
    public function lastInsertId() {
        return $this->connection->lastInsertId();
    }
    
    /**
     * Begin Transaction
     */
    public function beginTransaction() {
        return $this->connection->beginTransaction();
    }
    
    /**
     * Commit Transaction
     */
    public function commit() {
        return $this->connection->commit();
    }
    
    /**
     * Rollback Transaction
     */
    public function rollback() {
        return $this->connection->rollBack();
    }
    
    /**
     * Test Database Connection
     * 
     * @return bool
     */
    public static function testConnection() {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
            $pdo = new PDO($dsn, DB_USER, DB_PASS, DB_PDO_OPTIONS);
            return true;
        } catch (PDOException $e) {
            error_log("Database Test Connection Error: " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Prevent cloning
     */
    private function __clone() {}
    
    /**
     * Prevent unserialization
     */
    public function __wakeup() {
        throw new Exception("Cannot unserialize singleton");
    }
}

/**
 * Get Database Connection (Helper Function)
 * 
 * @return PDO
 */
function getDB() {
    return Database::getInstance()->getConnection();
}
