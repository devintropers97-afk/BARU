<?php
/**
 * SITUNEO DIGITAL - Automatic Installation Script
 * 
 * This script automatically installs the SITUNEO system including:
 * - Database creation
 * - Table creation (63 tables)
 * - Initial data seeding
 * - Configuration setup
 * - Permission setting
 * 
 * @package    SITUNEO
 * @subpackage Install
 * @version    1.0.0
 */

// Start session
session_start();

// Define initialization constant
define('SITUNEO_INIT', true);

// Set error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set timezone
date_default_timezone_set('Asia/Jakarta');

// Define base paths
define('INSTALL_DIR', __DIR__);
define('ROOT_DIR', dirname(INSTALL_DIR));
define('CONFIG_DIR', ROOT_DIR . '/config');
define('DATABASE_DIR', ROOT_DIR . '/database');

/**
 * Installation Class
 */
class Installer {
    private $db;
    private $errors = [];
    private $success = [];
    private $warnings = [];
    
    /**
     * Constructor
     */
    public function __construct() {
        // Check if already installed
        if ($this->isAlreadyInstalled()) {
            die('SITUNEO is already installed. Please delete install.lock file to reinstall.');
        }
    }
    
    /**
     * Check if already installed
     */
    private function isAlreadyInstalled() {
        return file_exists(INSTALL_DIR . '/install.lock');
    }
    
    /**
     * Run Installation
     */
    public function run() {
        echo $this->getHeader();
        
        // Step 1: Check Requirements
        echo "<h2>Step 1: Checking System Requirements</h2>";
        $this->checkRequirements();
        
        // Step 2: Test Database Connection
        echo "<h2>Step 2: Testing Database Connection</h2>";
        $this->testDatabaseConnection();
        
        // Step 3: Create Tables
        echo "<h2>Step 3: Creating Database Tables</h2>";
        $this->createTables();
        
        // Step 4: Seed Initial Data
        echo "<h2>Step 4: Seeding Initial Data</h2>";
        $this->seedData();
        
        // Step 5: Create Admin User
        echo "<h2>Step 5: Creating Admin User</h2>";
        $this->createAdminUser();
        
        // Step 6: Set Permissions
        echo "<h2>Step 6: Setting File Permissions</h2>";
        $this->setPermissions();
        
        // Step 7: Finalize
        echo "<h2>Step 7: Finalizing Installation</h2>";
        $this->finalize();
        
        // Show Summary
        echo $this->getSummary();
        
        echo $this->getFooter();
    }
    
    /**
     * Check System Requirements
     */
    private function checkRequirements() {
        $requirements = [
            'PHP Version >= 7.4' => version_compare(PHP_VERSION, '7.4.0', '>='),
            'PDO Extension' => extension_loaded('pdo'),
            'PDO MySQL Extension' => extension_loaded('pdo_mysql'),
            'MySQLi Extension' => extension_loaded('mysqli'),
            'cURL Extension' => extension_loaded('curl'),
            'GD Extension' => extension_loaded('gd'),
            'mbstring Extension' => extension_loaded('mbstring'),
            'OpenSSL Extension' => extension_loaded('openssl'),
            'JSON Extension' => extension_loaded('json'),
            'Fileinfo Extension' => extension_loaded('fileinfo')
        ];
        
        echo "<table class='req-table'>";
        echo "<tr><th>Requirement</th><th>Status</th></tr>";
        
        $allPassed = true;
        foreach ($requirements as $name => $status) {
            $statusIcon = $status ? '✓' : '✗';
            $statusClass = $status ? 'success' : 'error';
            echo "<tr><td>$name</td><td class='$statusClass'>$statusIcon " . ($status ? 'OK' : 'MISSING') . "</td></tr>";
            
            if (!$status) {
                $this->errors[] = "$name is missing";
                $allPassed = false;
            }
        }
        
        echo "</table>";
        
        if ($allPassed) {
            $this->success[] = "All system requirements passed";
        } else {
            die("<p class='error'>Some requirements are missing. Please install them before continuing.</p>");
        }
    }
    
    /**
     * Test Database Connection
     */
    private function testDatabaseConnection() {
        try {
            // Load database config
            require_once CONFIG_DIR . '/database.php';
            
            $dsn = "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET;
            $pdo = new PDO($dsn, DB_USER, DB_PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Check if database exists
            $stmt = $pdo->query("SHOW DATABASES LIKE '" . DB_NAME . "'");
            $dbExists = $stmt->rowCount() > 0;
            
            if (!$dbExists) {
                // Create database
                $pdo->exec("CREATE DATABASE IF NOT EXISTS `" . DB_NAME . "` CHARACTER SET " . DB_CHARSET . " COLLATE " . DB_COLLATE);
                echo "<p class='success'>✓ Database '" . DB_NAME . "' created successfully</p>";
            } else {
                echo "<p class='warning'>⚠ Database '" . DB_NAME . "' already exists</p>";
            }
            
            // Connect to database
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
            $this->db = new PDO($dsn, DB_USER, DB_PASS);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            echo "<p class='success'>✓ Database connection successful</p>";
            $this->success[] = "Database connection successful";
            
        } catch (PDOException $e) {
            echo "<p class='error'>✗ Database connection failed: " . $e->getMessage() . "</p>";
            $this->errors[] = "Database connection failed: " . $e->getMessage();
            die();
        }
    }
    
    /**
     * Create Database Tables
     */
    private function createTables() {
        try {
            // Read SQL schema file
            $schemaFile = DATABASE_DIR . '/schema/full_schema.sql';
            
            if (!file_exists($schemaFile)) {
                throw new Exception("Schema file not found: $schemaFile");
            }
            
            $sql = file_get_contents($schemaFile);
            
            // Remove comments
            $sql = preg_replace('/^--.*$/m', '', $sql);
            $sql = preg_replace('/\/\*.*?\*\//s', '', $sql);
            
            // Split by semicolon but preserve in quotes
            $statements = array_filter(array_map('trim', explode(';', $sql)));
            
            $created = 0;
            $errors = 0;
            
            foreach ($statements as $statement) {
                if (empty($statement)) continue;
                
                try {
                    $this->db->exec($statement);
                    $created++;
                } catch (PDOException $e) {
                    // Check if table already exists
                    if (strpos($e->getMessage(), 'already exists') !== false) {
                        echo "<p class='warning'>⚠ Table already exists, skipping...</p>";
                    } else {
                        echo "<p class='error'>✗ Error: " . $e->getMessage() . "</p>";
                        $errors++;
                    }
                }
            }
            
            echo "<p class='success'>✓ Created $created database tables successfully</p>";
            $this->success[] = "Created $created database tables";
            
            if ($errors > 0) {
                echo "<p class='warning'>⚠ $errors tables had errors</p>";
                $this->warnings[] = "$errors tables had errors";
            }
            
        } catch (Exception $e) {
            echo "<p class='error'>✗ Failed to create tables: " . $e->getMessage() . "</p>";
            $this->errors[] = "Failed to create tables: " . $e->getMessage();
            die();
        }
    }
    
    /**
     * Seed Initial Data
     */
    private function seedData() {
        try {
            // Insert system settings
            $settings = [
                ['site_name', 'SITUNEO DIGITAL', 'text', 'general'],
                ['site_tagline', 'Your Digital Partner', 'text', 'general'],
                ['site_email', 'vins@situneo.my.id', 'text', 'general'],
                ['site_phone', '+62 831-7386-8915', 'text', 'general'],
                ['maintenance_mode', '0', 'boolean', 'general'],
                ['user_registration', '1', 'boolean', 'general'],
                ['email_verification', '1', 'boolean', 'general'],
                ['default_currency', 'IDR', 'text', 'general'],
                ['default_language', 'id', 'text', 'general']
            ];
            
            $stmt = $this->db->prepare("INSERT INTO system_settings (setting_key, setting_value, setting_type, setting_group) VALUES (?, ?, ?, ?) ON DUPLICATE KEY UPDATE setting_value = VALUES(setting_value)");
            
            foreach ($settings as $setting) {
                $stmt->execute($setting);
            }
            
            echo "<p class='success'>✓ System settings inserted</p>";
            
            // Insert default payment methods
            $paymentMethods = [
                ['Bank Transfer - BCA', 'bank_transfer', 'SITUNEO DIGITAL', '1234567890', 'Bank Central Asia (BCA)', 'Transfer ke rekening BCA', null, 1, 1],
                ['Bank Transfer - Mandiri', 'bank_transfer', 'SITUNEO DIGITAL', '9876543210', 'Bank Mandiri', 'Transfer ke rekening Mandiri', null, 1, 2],
                ['E-Wallet - DANA', 'e_wallet', 'SITUNEO DIGITAL', '+62 831-7386-8915', null, 'Transfer via DANA', null, 1, 3],
                ['E-Wallet - GoPay', 'e_wallet', 'SITUNEO DIGITAL', '+62 831-7386-8915', null, 'Transfer via GoPay', null, 1, 4]
            ];
            
            $stmt = $this->db->prepare("INSERT INTO payment_methods (name, type, account_name, account_number, bank_name, instructions, logo, is_active, sort_order) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            
            foreach ($paymentMethods as $method) {
                $stmt->execute($method);
            }
            
            echo "<p class='success'>✓ Payment methods inserted</p>";
            
            // Insert default email templates
            $emailTemplates = [
                ['Welcome Email', 'welcome', 'Welcome to SITUNEO DIGITAL', 'Welcome {{name}}! Thank you for registering...', '["name","email"]', 'active'],
                ['Order Confirmation', 'order_confirmation', 'Order Confirmation #{{order_number}}', 'Your order #{{order_number}} has been received...', '["name","order_number","total"]', 'active'],
                ['Payment Received', 'payment_received', 'Payment Received for Order #{{order_number}}', 'Thank you! Your payment has been received...', '["name","order_number","amount"]', 'active'],
                ['Password Reset', 'password_reset', 'Reset Your Password', 'Click here to reset your password: {{reset_link}}', '["name","reset_link"]', 'active']
            ];
            
            $stmt = $this->db->prepare("INSERT INTO email_templates (template_name, template_slug, subject, body, variables, status) VALUES (?, ?, ?, ?, ?, ?)");
            
            foreach ($emailTemplates as $template) {
                $stmt->execute($template);
            }
            
            echo "<p class='success'>✓ Email templates inserted</p>";
            
            $this->success[] = "Initial data seeded successfully";
            
        } catch (PDOException $e) {
            echo "<p class='warning'>⚠ Error seeding data: " . $e->getMessage() . "</p>";
            $this->warnings[] = "Error seeding data: " . $e->getMessage();
        }
    }
    
    /**
     * Create Admin User
     */
    private function createAdminUser() {
        try {
            // Check if admin exists
            $stmt = $this->db->query("SELECT COUNT(*) FROM users WHERE role = 'admin'");
            $adminCount = $stmt->fetchColumn();
            
            if ($adminCount > 0) {
                echo "<p class='warning'>⚠ Admin user already exists, skipping...</p>";
                return;
            }
            
            // Create admin user
            $adminData = [
                'username' => 'admin',
                'email' => 'admin@situneo.my.id',
                'password' => password_hash('Situneo2025!', PASSWORD_BCRYPT),
                'full_name' => 'Devin Prasetyo Hermawan',
                'phone' => '+62 831-7386-8915',
                'role' => 'admin',
                'status' => 'active',
                'email_verified_at' => date('Y-m-d H:i:s')
            ];
            
            $stmt = $this->db->prepare("INSERT INTO users (username, email, password, full_name, phone, role, status, email_verified_at) VALUES (:username, :email, :password, :full_name, :phone, :role, :status, :email_verified_at)");
            
            $stmt->execute($adminData);
            
            echo "<p class='success'>✓ Admin user created successfully</p>";
            echo "<p class='info'>📝 <strong>Admin Credentials:</strong><br>";
            echo "Username: <strong>admin</strong><br>";
            echo "Email: <strong>admin@situneo.my.id</strong><br>";
            echo "Password: <strong>Situneo2025!</strong></p>";
            echo "<p class='warning'>⚠ Please change the admin password after first login!</p>";
            
            $this->success[] = "Admin user created";
            
        } catch (PDOException $e) {
            echo "<p class='error'>✗ Failed to create admin user: " . $e->getMessage() . "</p>";
            $this->errors[] = "Failed to create admin user: " . $e->getMessage();
        }
    }
    
    /**
     * Set File Permissions
     */
    private function setPermissions() {
        $directories = [
            ROOT_DIR . '/uploads' => 0755,
            ROOT_DIR . '/cache' => 0755,
            ROOT_DIR . '/logs' => 0755,
            CONFIG_DIR => 0755
        ];

        foreach ($directories as $dir => $permission) {
            // Create directory if it doesn't exist
            if (!is_dir($dir)) {
                if (@mkdir($dir, $permission, true)) {
                    echo "<p class='success'>✓ Created directory: $dir</p>";
                } else {
                    echo "<p class='error'>✗ Failed to create directory: $dir</p>";
                    $this->errors[] = "Failed to create directory: $dir";
                    continue;
                }
            }

            // Set permissions
            if (@chmod($dir, $permission)) {
                echo "<p class='success'>✓ Set permission $permission for $dir</p>";
            } else {
                echo "<p class='warning'>⚠ Could not set permission for $dir (may need manual setup)</p>";
                $this->warnings[] = "Could not set permission for $dir";
            }
        }

        $this->success[] = "File permissions set";
    }
    
    /**
     * Finalize Installation
     */
    private function finalize() {
        // Create lock file
        $lockContent = "Installation completed at: " . date('Y-m-d H:i:s') . "\n";
        $lockContent .= "Version: 1.0.0\n";
        $lockContent .= "Do not delete this file unless you want to reinstall the system.\n";
        
        file_put_contents(INSTALL_DIR . '/install.lock', $lockContent);
        
        echo "<p class='success'>✓ Installation lock file created</p>";
        echo "<p class='success'>✓ Installation completed successfully!</p>";
        
        $this->success[] = "Installation completed";
    }
    
    /**
     * Get Header HTML
     */
    private function getHeader() {
        return '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SITUNEO DIGITAL - Installation</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: "Segoe UI", Arial, sans-serif; background: linear-gradient(135deg, #1E5C99 0%, #0F3057 100%); padding: 20px; }
        .container { max-width: 900px; margin: 0 auto; background: white; border-radius: 10px; box-shadow: 0 10px 50px rgba(0,0,0,0.3); overflow: hidden; }
        .header { background: linear-gradient(135deg, #FFD700 0%, #FFB400 100%); padding: 30px; text-align: center; color: #0F3057; }
        .header h1 { font-size: 32px; margin-bottom: 10px; }
        .header p { font-size: 16px; opacity: 0.9; }
        .content { padding: 30px; }
        h2 { color: #1E5C99; margin: 30px 0 15px 0; padding-bottom: 10px; border-bottom: 2px solid #FFB400; }
        p { margin: 10px 0; line-height: 1.6; }
        .success { color: #28a745; font-weight: 600; }
        .error { color: #dc3545; font-weight: 600; }
        .warning { color: #ffc107; font-weight: 600; }
        .info { background: #e7f3ff; border-left: 4px solid #2196F3; padding: 15px; margin: 15px 0; }
        .req-table { width: 100%; border-collapse: collapse; margin: 15px 0; }
        .req-table th, .req-table td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        .req-table th { background: #f8f9fa; font-weight: 600; }
        .summary { background: #f8f9fa; padding: 20px; border-radius: 5px; margin: 20px 0; }
        .summary h3 { color: #1E5C99; margin-bottom: 15px; }
        .summary ul { list-style: none; }
        .summary ul li { padding: 5px 0; padding-left: 25px; position: relative; }
        .summary ul li:before { content: "✓"; position: absolute; left: 0; color: #28a745; font-weight: bold; }
        .footer { background: #f8f9fa; padding: 20px; text-align: center; color: #666; }
        .btn { display: inline-block; padding: 12px 30px; background: linear-gradient(135deg, #FFD700 0%, #FFB400 100%); color: #0F3057; text-decoration: none; border-radius: 5px; font-weight: 600; margin: 10px 5px; }
        .btn:hover { opacity: 0.9; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🚀 SITUNEO DIGITAL</h1>
            <p>Automatic Installation Wizard</p>
        </div>
        <div class="content">
';
    }
    
    /**
     * Get Footer HTML
     */
    private function getFooter() {
        return '
        </div>
        <div class="footer">
            <p>&copy; ' . date('Y') . ' SITUNEO DIGITAL. All rights reserved.</p>
            <p>Version 1.0.0</p>
        </div>
    </div>
</body>
</html>
';
    }
    
    /**
     * Get Summary
     */
    private function getSummary() {
        $html = '<div class="summary">';
        $html .= '<h3>📊 Installation Summary</h3>';
        
        if (!empty($this->success)) {
            $html .= '<h4 style="color: #28a745;">✓ Successful Steps:</h4>';
            $html .= '<ul>';
            foreach ($this->success as $item) {
                $html .= '<li>' . $item . '</li>';
            }
            $html .= '</ul>';
        }
        
        if (!empty($this->warnings)) {
            $html .= '<h4 style="color: #ffc107;">⚠ Warnings:</h4>';
            $html .= '<ul style="list-style: disc; padding-left: 40px;">';
            foreach ($this->warnings as $item) {
                $html .= '<li style="color: #ffc107;">' . $item . '</li>';
            }
            $html .= '</ul>';
        }
        
        if (!empty($this->errors)) {
            $html .= '<h4 style="color: #dc3545;">✗ Errors:</h4>';
            $html .= '<ul style="list-style: disc; padding-left: 40px;">';
            foreach ($this->errors as $item) {
                $html .= '<li style="color: #dc3545;">' . $item . '</li>';
            }
            $html .= '</ul>';
        }
        
        $html .= '<div style="margin-top: 30px; text-align: center;">';
        $html .= '<a href="../index.php" class="btn">🏠 Go to Homepage</a>';
        $html .= '<a href="../modules/auth/login.php" class="btn">🔐 Login as Admin</a>';
        $html .= '</div>';
        
        $html .= '</div>';
        
        return $html;
    }
}

// Run Installation
$installer = new Installer();
$installer->run();
