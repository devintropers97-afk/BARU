# 🚀 SITUNEO DIGITAL - BATCH 1: SETUP & CORE SYSTEM

## 📋 Daftar Isi
- [Overview](#overview)
- [Apa yang Sudah Dibuat](#apa-yang-sudah-dibuat)
- [Struktur Folder](#struktur-folder)
- [Cara Instalasi](#cara-instalasi)
- [Cara Testing](#cara-testing)
- [Database Schema](#database-schema)
- [Konfigurasi](#konfigurasi)
- [Troubleshooting](#troubleshooting)
- [Next Steps](#next-steps)

---

## 🎯 Overview

**Batch 1** adalah foundation/pondasi dari seluruh sistem SITUNEO DIGITAL. Batch ini mencakup:

✅ **Database Schema** (63 Tables Complete!)
✅ **Configuration System** (Modular & Flexible)
✅ **Automatic Installation** (One-Click Setup)
✅ **Security Functions** (CSRF, XSS, SQL Injection Protection)
✅ **Helper Functions** (Common Tasks Made Easy)
✅ **Folder Structure** (Modular & Scalable)

---

## 📦 Apa yang Sudah Dibuat

### 1. **Database Schema** (63 Tables)
File: `/database/schema/full_schema.sql`

**Sections:**
- **User Management** (6 tables)
  - users, user_sessions, user_devices, user_activity, password_resets, activity_logs

- **Services & Packages** (8 tables)
  - service_categories, services, service_addons, service_reviews, packages, package_services, discount_codes, tax_settings

- **Orders & Invoices** (10 tables)
  - orders, order_items, order_status_history, order_files, order_revisions, order_feedback, invoices, orders_payments, payment_methods, payment_gateways

- **Freelancer System** (14 tables) ⭐ **CORE BUSINESS**
  - freelancer_referrals, freelancer_referral_clicks, freelancer_clients, freelancer_orders, freelancer_tiers, freelancer_tier_history, freelancer_commissions, freelancer_payments_in, freelancer_payments_out, freelancer_withdrawals, freelancer_analytics, payment_reconciliation, affiliate_links, freelancer_performance

- **Portfolio & Demo** (5 tables)
  - portfolio_categories, portfolios, portfolio_images, demo_requests, demo_requests_files

- **Reviews & Testimonials** (3 tables)
  - reviews, testimonials, faq

- **Support & Communication** (7 tables)
  - support_tickets, support_replies, contact_messages, notifications, notification_settings, email_logs, email_templates, sms_logs

- **Blog & Content** (4 tables)
  - blog_categories, blog_posts, career_posts, job_applications

- **Newsletter & Marketing** (2 tables)
  - newsletter_subscribers, sms_logs

- **Admin & System** (4 tables)
  - admin_roles, admin_permissions, admin_actions, system_settings

**Total: 63 TABLES** ✅

---

### 2. **Configuration Files**

#### `/config/database.php`
Database connection dengan PDO + Singleton pattern
- DB_HOST: localhost
- DB_NAME: nrrskfvk_situneo_digital
- DB_USER: nrrskfvk_user_situneo_digital
- DB_PASS: Devin1922$
- Charset: utf8mb4
- Collation: utf8mb4_unicode_ci

#### `/config/app.php`
Main application configuration
- Company Information
- Contact Details
- Social Media Links
- Directory Paths
- Session Settings
- Security Settings
- File Upload Settings
- Email/SMTP Settings
- Freelancer Commission Tiers
- Pagination, Cache, Logs
- API, SEO Settings

---

### 3. **Automatic Installation**

#### `/install/install.php`
One-click installation wizard dengan features:

✅ **System Requirements Check**
- PHP Version >= 7.4
- PDO, PDO MySQL, MySQLi Extensions
- cURL, GD, mbstring, OpenSSL, JSON, Fileinfo

✅ **Database Creation**
- Auto create database if not exists
- UTF-8 charset setup

✅ **Table Creation**
- Automatic creation of 63 tables
- Error handling for existing tables

✅ **Initial Data Seeding**
- System settings
- Payment methods (BCA, Mandiri, DANA, GoPay)
- Email templates (Welcome, Order Confirmation, Payment Received, Password Reset)

✅ **Admin User Creation**
- Username: admin
- Email: admin@situneo.my.id
- Password: Situneo2025!
- Role: admin
- Status: active

✅ **File Permissions**
- Auto set correct permissions for uploads, cache, logs

✅ **Lock File**
- Create install.lock to prevent reinstallation

---

### 4. **Security Functions**

#### `/core/functions/security.php`

**Input Validation & Sanitization:**
- `sanitize_input()` - Clean user input (array support)
- `validate_email()` - Email validation
- `validate_phone()` - Indonesian phone format

**CSRF Protection:**
- `generate_csrf_token()` - Generate unique token
- `verify_csrf_token()` - Verify token with lifetime check

**Password Security:**
- `hash_password()` - BCrypt hashing
- `verify_password()` - Verify hashed password

**Authentication Helpers:**
- `is_logged_in()` - Check login status
- `is_admin()` - Check admin role
- `is_freelancer()` - Check freelancer role
- `get_client_ip()` - Get real client IP

---

### 5. **Helper Functions**

#### `/core/helpers/general.php`

**Navigation & URLs:**
- `redirect()` - Safe redirect (header or JS)
- `base_url()` - Get base application URL
- `asset_url()` - Get asset file URL

**Formatting:**
- `format_currency()` - Format to IDR (Rp 1.000.000)
- `format_date()` - Format date
- `format_datetime()` - Format datetime
- `time_ago()` - Relative time (5 menit lalu)

**String Utilities:**
- `generate_random_string()` - Random alphanumeric
- `generate_slug()` - URL-friendly slug
- `truncate_string()` - Truncate with ellipsis

**Order/Invoice Generators:**
- `generate_order_number()` - ORD-20251106-ABC123
- `generate_invoice_number()` - INV-20251106-ABC123
- `generate_ticket_number()` - TKT-20251106-ABC123

**File Upload:**
- `upload_file()` - Safe file upload with validation
- `delete_file()` - Delete file safely

**API Response:**
- `json_response()` - Send JSON with status code

**Messages:**
- `success_message()` - Bootstrap alert success
- `error_message()` - Bootstrap alert danger
- `warning_message()` - Bootstrap alert warning

**Debug:**
- `dd()` - Dump and die for debugging

---

## 📁 Struktur Folder

```
situneo-batch1/
├── install/
│   └── install.php              (Automatic Installation Wizard)
│
├── config/
│   ├── database.php             (Database Connection)
│   └── app.php                  (Application Configuration)
│
├── core/
│   ├── classes/                 (OOP Classes - will be in next batches)
│   ├── functions/
│   │   └── security.php         (Security Functions)
│   ├── helpers/
│   │   └── general.php          (General Helper Functions)
│   └── middleware/              (Middleware - will be in next batches)
│
├── database/
│   ├── migrations/              (Database Migrations - will be in next batches)
│   ├── seeds/                   (Data Seeders - will be in next batches)
│   └── schema/
│       └── full_schema.sql      (Complete 63 Tables Schema)
│
├── docs/                        (Documentation)
│
├── assets/
│   ├── css/                     (CSS files - will be in next batches)
│   ├── js/                      (JavaScript files - will be in next batches)
│   └── images/                  (Images - will be in next batches)
│
├── modules/
│   ├── auth/                    (Authentication Module - will be in next batches)
│   ├── user/                    (User Module - will be in next batches)
│   ├── order/                   (Order Module - will be in next batches)
│   ├── payment/                 (Payment Module - will be in next batches)
│   ├── freelancer/              (Freelancer Module - will be in next batches)
│   ├── admin/                   (Admin Module - will be in next batches)
│   ├── services/                (Services Module - will be in next batches)
│   └── referral/                (Referral Module - will be in next batches)
│
├── components/                  (UI Components - will be in next batches)
│
└── templates/                   (Page Templates - will be in next batches)
```

---

## 🔧 Cara Instalasi

### **Metode 1: Automatic Installation (RECOMMENDED)**

1. **Extract ZIP ke cPanel**
   - Login ke cPanel (https://situneo.my.id:2083)
   - File Manager → public_html
   - Upload `situneo-batch1.zip`
   - Extract All

2. **Jalankan Installer**
   - Buka browser: https://situneo.my.id/install/install.php
   - Ikuti wizard installation
   - Tunggu sampai selesai (biasanya 2-3 menit)
   - Catat Admin Credentials yang ditampilkan

3. **Selesai!**
   - Login Admin: https://situneo.my.id/modules/auth/login.php
   - Username: admin
   - Password: Situneo2025!

### **Metode 2: Manual Installation**

1. **Upload Files**
   - Upload semua files ke public_html/

2. **Create Database** (jika belum ada)
   ```sql
   CREATE DATABASE nrrskfvk_situneo_digital CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```

3. **Import SQL**
   - phpMyAdmin → Import
   - Pilih file: database/schema/full_schema.sql
   - Execute

4. **Seed Data**
   - Jalankan query manual untuk insert system_settings, payment_methods, email_templates
   (lihat di file install/install.php method seedData())

5. **Create Admin User**
   ```sql
   INSERT INTO users (username, email, password, full_name, phone, role, status, email_verified_at) 
   VALUES ('admin', 'admin@situneo.my.id', '[hashed_password]', 'Devin Prasetyo Hermawan', '+62 831-7386-8915', 'admin', 'active', NOW());
   ```

6. **Set Permissions**
   ```bash
   chmod 755 uploads/
   chmod 755 cache/
   chmod 755 logs/
   ```

---

## 🧪 Cara Testing

### **Test 1: Database Connection**

Buat file `test_db.php` di root:
```php
<?php
define('SITUNEO_INIT', true);
require_once 'config/database.php';

if (Database::testConnection()) {
    echo "✓ Database connection successful!";
} else {
    echo "✗ Database connection failed!";
}
?>
```

Akses: https://situneo.my.id/test_db.php

### **Test 2: Check Tables**

Jalankan di phpMyAdmin:
```sql
SHOW TABLES;
```

Harus muncul 63 tables.

### **Test 3: Check Admin User**

```sql
SELECT * FROM users WHERE role = 'admin';
```

Harus ada 1 row dengan username 'admin'.

### **Test 4: Login Test**

- Buka: https://situneo.my.id/modules/auth/login.php (akan dibuat di Batch selanjutnya)
- Username: admin
- Password: Situneo2025!

---

## 💾 Database Schema

### **Freelancer Referral System** (Core Business Logic)

```
CLIENT REGISTER → freelancer_referrals (unique code)
                ↓
           freelancer_clients (client assigned to freelancer)
                ↓
CLIENT ORDER → freelancer_orders (100% payment to freelancer)
             ↓
        freelancer_commissions (komisi calculation)
             ↓
        freelancer_payments_in (payment received)
             ↓
        freelancer_payments_out (pay commission to SITUNEO)
             ↓
        freelancer_tiers (auto tier upgrade/downgrade)
```

### **Commission Tiers**

```
Tier 1: 0-10 orders   = 30% commission to SITUNEO, 70% for freelancer
Tier 2: 11-25 orders  = 40% commission to SITUNEO, 60% for freelancer
Tier 3: 26+ orders    = 50% commission to SITUNEO, 50% for freelancer
Bonus:  75+ orders/mo = +5% bonus
```

---

## ⚙️ Konfigurasi

### **Database Credentials**

Jika perlu ubah, edit file `/config/database.php`:

```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'nrrskfvk_situneo_digital');
define('DB_USER', 'nrrskfvk_user_situneo_digital');
define('DB_PASS', 'Devin1922$');
```

### **Application Settings**

Edit file `/config/app.php`:

```php
define('APP_URL', 'https://situneo.my.id');
define('APP_ENV', 'production'); // or 'development'
define('APP_DEBUG', false); // true for development
```

### **Session Settings**

```php
define('SESSION_LIFETIME', 86400); // 24 hours
define('SESSION_SECURE', true); // HTTPS only
```

### **Upload Settings**

```php
define('MAX_UPLOAD_SIZE', 10485760); // 10MB
```

---

## 🐛 Troubleshooting

### **Problem: Database Connection Failed**

**Solution:**
1. Check credentials in `/config/database.php`
2. Verify database exists in cPanel → MySQL Databases
3. Check user has correct permissions
4. Test connection: `mysql -u username -p database_name`

### **Problem: Tables Not Created**

**Solution:**
1. Check MySQL version (must be 8.0+)
2. Run SQL manually via phpMyAdmin
3. Check for errors in install log
4. Verify user has CREATE TABLE permission

### **Problem: Permission Denied on Upload**

**Solution:**
```bash
chmod 755 uploads/
chmod 755 uploads/avatars/
chmod 755 uploads/documents/
chmod 755 uploads/payments/
```

### **Problem: Install.php Shows Blank Page**

**Solution:**
1. Check PHP version (must be >= 7.4)
2. Enable error display:
   ```php
   ini_set('display_errors', 1);
   error_reporting(E_ALL);
   ```
3. Check PHP error log in cPanel

### **Problem: "Already Installed" Message**

**Solution:**
- Delete file: `/install/install.lock`
- Re-run installer

---

## 📊 Statistics

**Batch 1 Deliverables:**
- ✅ Files Created: 7 files
- ✅ Database Tables: 63 tables
- ✅ Lines of Code: ~5,000+ lines
- ✅ Security Functions: 15+ functions
- ✅ Helper Functions: 20+ functions
- ✅ Configuration Options: 100+ constants

---

## 🎯 Next Steps (Batch 2)

**Batch 2** akan mencakup:
1. ✅ Assets (CSS, JavaScript, Images)
2. ✅ Bootstrap 5 integration
3. ✅ Custom styling (Blue & Gold theme)
4. ✅ JavaScript utilities (GSAP, AOS animations)
5. ✅ Responsive framework

---

## 📞 Support

**Issues or Questions?**
- Email: vins@situneo.my.id
- WhatsApp: +62 831-7386-8915

---

## 📝 Changelog

### Version 1.0.0 (2025-11-06)
- ✅ Initial release
- ✅ Database schema complete (63 tables)
- ✅ Configuration system
- ✅ Automatic installation
- ✅ Security functions
- ✅ Helper functions

---

**🚀 BATCH 1 COMPLETE! Ready for Batch 2!**
