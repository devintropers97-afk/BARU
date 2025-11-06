# 🧪 SITUNEO DIGITAL - BATCH 1 TESTING GUIDE

## 📋 Overview

Panduan ini akan membantu Anda melakukan testing terhadap **Batch 1: Setup & Core System**.

---

## ✅ Pre-Testing Checklist

Sebelum mulai testing, pastikan:

- [ ] Files sudah di-upload ke cPanel
- [ ] Database credentials sudah benar
- [ ] PHP Version >= 7.4
- [ ] MySQL Version >= 8.0
- [ ] SSL Certificate aktif (HTTPS)
- [ ] Extensions required terinstall

---

## 🔧 Testing Steps

### **TEST 1: Installation Process** ⭐

**Objective:** Memastikan automatic installation berjalan dengan baik

**Steps:**
1. Buka browser
2. Akses: `https://situneo.my.id/install/install.php`
3. Tunggu proses installation
4. Perhatikan setiap step:
   - ✓ Step 1: System requirements check
   - ✓ Step 2: Database connection
   - ✓ Step 3: Table creation
   - ✓ Step 4: Data seeding
   - ✓ Step 5: Admin user creation
   - ✓ Step 6: Permissions
   - ✓ Step 7: Finalization

**Expected Result:**
```
✓ All system requirements passed
✓ Database connection successful
✓ Created 63 database tables successfully
✓ System settings inserted
✓ Payment methods inserted
✓ Email templates inserted
✓ Admin user created successfully
✓ Set permission 755 for uploads/
✓ Set permission 755 for cache/
✓ Set permission 755 for logs/
✓ Installation lock file created
✓ Installation completed successfully!
```

**Admin Credentials yang Harus Muncul:**
```
Username: admin
Email: admin@situneo.my.id
Password: Situneo2025!
```

**❌ Jika Ada Error:**
- Screenshot error message
- Check PHP error log di cPanel
- Verify database credentials
- Contact support

---

### **TEST 2: Database Verification**

**Objective:** Memastikan 63 tables sudah dibuat dengan benar

**Steps:**
1. Login cPanel
2. Buka phpMyAdmin
3. Pilih database: `nrrskfvk_situneo_digital`
4. Klik tab "Structure"

**Expected Result:**
Harus muncul **63 tables**:

**User Management (6):**
- users
- user_sessions
- user_devices
- user_activity
- password_resets
- activity_logs

**Services & Packages (8):**
- service_categories
- services
- service_addons
- service_reviews
- packages
- package_services
- discount_codes
- tax_settings

**Orders & Invoices (10):**
- orders
- order_items
- order_status_history
- order_files
- order_revisions
- order_feedback
- invoices
- orders_payments
- payment_methods
- payment_gateways

**Freelancer System (14):**
- freelancer_referrals
- freelancer_referral_clicks
- freelancer_clients
- freelancer_orders
- freelancer_tiers
- freelancer_tier_history
- freelancer_commissions
- freelancer_payments_in
- freelancer_payments_out
- freelancer_withdrawals
- freelancer_analytics
- payment_reconciliation
- affiliate_links
- freelancer_performance

**Portfolio & Demo (5):**
- portfolio_categories
- portfolios
- portfolio_images
- demo_requests
- demo_requests_files

**Reviews (3):**
- reviews
- testimonials
- faq

**Support (7):**
- support_tickets
- support_replies
- contact_messages
- notifications
- notification_settings
- email_logs
- email_templates

**Blog (4):**
- blog_categories
- blog_posts
- career_posts
- job_applications

**Newsletter (2):**
- newsletter_subscribers
- sms_logs

**Admin (4):**
- admin_roles
- admin_permissions
- admin_actions
- system_settings

**Testing Query:**
```sql
SHOW TABLES;
```

Count harus = **63**

**❌ Jika Kurang:**
- Check mana yang missing
- Re-run installer atau import SQL manual

---

### **TEST 3: Admin User Check**

**Objective:** Memastikan admin user sudah dibuat

**Steps:**
1. Buka phpMyAdmin
2. Klik table `users`
3. Browse data

**Testing Query:**
```sql
SELECT id, username, email, full_name, role, status, email_verified_at 
FROM users 
WHERE role = 'admin';
```

**Expected Result:**
| id | username | email | full_name | role | status | email_verified_at |
|----|----------|-------|-----------|------|--------|-------------------|
| 1 | admin | admin@situneo.my.id | Devin Prasetyo Hermawan | admin | active | 2025-11-06 ... |

**❌ Jika Tidak Ada:**
- Insert manual admin user
- Re-run installer

---

### **TEST 4: System Settings Check**

**Objective:** Memastikan initial settings sudah ter-insert

**Steps:**
1. Buka phpMyAdmin
2. Klik table `system_settings`
3. Browse data

**Testing Query:**
```sql
SELECT * FROM system_settings ORDER BY id;
```

**Expected Result:**
Minimal ada 9 settings:
- site_name = "SITUNEO DIGITAL"
- site_tagline = "Your Digital Partner"
- site_email = "vins@situneo.my.id"
- site_phone = "+62 831-7386-8915"
- maintenance_mode = "0"
- user_registration = "1"
- email_verification = "1"
- default_currency = "IDR"
- default_language = "id"

**❌ Jika Tidak Ada:**
- Run seeder manual
- Re-run installer

---

### **TEST 5: Payment Methods Check**

**Objective:** Memastikan payment methods sudah ada

**Testing Query:**
```sql
SELECT id, name, type, account_number, is_active 
FROM payment_methods 
ORDER BY sort_order;
```

**Expected Result:**
Minimal 4 payment methods:
1. Bank Transfer - BCA (active)
2. Bank Transfer - Mandiri (active)
3. E-Wallet - DANA (active)
4. E-Wallet - GoPay (active)

**❌ Jika Tidak Ada:**
- Insert manual payment methods
- Re-run installer

---

### **TEST 6: Email Templates Check**

**Objective:** Memastikan email templates sudah ada

**Testing Query:**
```sql
SELECT id, template_name, template_slug, status 
FROM email_templates 
ORDER BY id;
```

**Expected Result:**
Minimal 4 templates:
1. Welcome Email (welcome) - active
2. Order Confirmation (order_confirmation) - active
3. Payment Received (payment_received) - active
4. Password Reset (password_reset) - active

---

### **TEST 7: Database Connection Test**

**Objective:** Test koneksi database via PHP

**Steps:**
1. Buat file `test_connection.php` di root folder
2. Paste code berikut:

```php
<?php
define('SITUNEO_INIT', true);
require_once 'config/database.php';

echo "<h1>Database Connection Test</h1>";

if (Database::testConnection()) {
    echo "<p style='color: green;'>✓ Database connection successful!</p>";
    
    $db = getDB();
    $stmt = $db->query("SELECT COUNT(*) as total FROM users");
    $result = $stmt->fetch();
    
    echo "<p>Total users in database: <strong>" . $result['total'] . "</strong></p>";
    
    $stmt = $db->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    echo "<p>Total tables: <strong>" . count($tables) . "</strong></p>";
    echo "<p>Expected: <strong>63 tables</strong></p>";
    
    if (count($tables) === 63) {
        echo "<p style='color: green;'>✓ All tables exist!</p>";
    } else {
        echo "<p style='color: red;'>✗ Missing " . (63 - count($tables)) . " tables!</p>";
    }
} else {
    echo "<p style='color: red;'>✗ Database connection failed!</p>";
}
?>
```

3. Akses: `https://situneo.my.id/test_connection.php`

**Expected Result:**
```
✓ Database connection successful!
Total users in database: 1
Total tables: 63
Expected: 63 tables
✓ All tables exist!
```

**❌ Jika Failed:**
- Check config/database.php credentials
- Verify database exists
- Check user permissions
- Contact hosting support

---

### **TEST 8: File Permissions Test**

**Objective:** Memastikan folder permissions sudah benar

**Steps via cPanel:**
1. Login cPanel → File Manager
2. Navigate ke folder website
3. Check permissions untuk:
   - `uploads/` → 755
   - `uploads/avatars/` → 755
   - `uploads/documents/` → 755
   - `uploads/payments/` → 755
   - `uploads/demos/` → 755
   - `uploads/temp/` → 755
   - `cache/` → 755
   - `logs/` → 755

**Via SSH:**
```bash
ls -la | grep uploads
ls -la | grep cache
ls -la | grep logs
```

**Expected Output:**
```
drwxr-xr-x  uploads
drwxr-xr-x  cache
drwxr-xr-x  logs
```

**❌ Jika Wrong Permission:**
```bash
chmod 755 uploads/ -R
chmod 755 cache/ -R
chmod 755 logs/ -R
```

---

### **TEST 9: Security Headers Test**

**Objective:** Memastikan .htaccess security berjalan

**Steps:**
1. Buka browser DevTools (F12)
2. Akses: `https://situneo.my.id`
3. Check tab "Network"
4. Click request pertama
5. Lihat "Response Headers"

**Expected Headers:**
```
X-Content-Type-Options: nosniff
X-Frame-Options: SAMEORIGIN
X-XSS-Protection: 1; mode=block
Referrer-Policy: strict-origin-when-cross-origin
Content-Security-Policy: ...
```

**Online Check:**
- https://securityheaders.com/?q=https://situneo.my.id

Target: Grade A atau B

**❌ Jika Headers Missing:**
- Check .htaccess file exists
- Verify mod_headers enabled
- Contact hosting support

---

### **TEST 10: HTTPS/SSL Test**

**Objective:** Memastikan SSL aktif dan redirect HTTPS bekerja

**Steps:**
1. Akses: `http://situneo.my.id` (HTTP tanpa S)
2. Harus auto redirect ke: `https://situneo.my.id` (HTTPS)

**Check SSL Certificate:**
- Click padlock icon di browser
- View certificate details
- Verify:
  - Issued to: situneo.my.id
  - Valid from/to dates
  - Certificate chain complete

**Online Check:**
- https://www.ssllabs.com/ssltest/analyze.html?d=situneo.my.id

Target: Grade A

**❌ Jika Failed:**
- Install/renew SSL certificate di cPanel
- Contact hosting support

---

## 📊 Testing Checklist Summary

Gunakan checklist ini untuk memastikan semua test passed:

- [ ] TEST 1: Installation completed successfully
- [ ] TEST 2: All 63 tables created
- [ ] TEST 3: Admin user exists and correct
- [ ] TEST 4: System settings populated
- [ ] TEST 5: Payment methods exist (4 methods)
- [ ] TEST 6: Email templates exist (4 templates)
- [ ] TEST 7: Database connection working
- [ ] TEST 8: File permissions correct (755)
- [ ] TEST 9: Security headers active
- [ ] TEST 10: HTTPS/SSL working

---

## 🐛 Common Issues & Solutions

### Issue 1: "Database connection failed"
**Solution:**
1. Verify credentials in `/config/database.php`
2. Check database exists in cPanel
3. Check user has correct privileges
4. Test MySQL connection via phpMyAdmin

### Issue 2: "Table already exists" error
**Solution:**
- This is OK if re-installing
- Delete install.lock and re-run if needed
- Or drop tables and re-run

### Issue 3: "Permission denied" on uploads
**Solution:**
```bash
chmod 755 uploads/ -R
```

### Issue 4: Headers already sent
**Solution:**
- Remove any whitespace before `<?php`
- Check for BOM in files
- Save files as UTF-8 without BOM

### Issue 5: 500 Internal Server Error
**Solution:**
1. Check .htaccess syntax
2. Enable error display temporarily
3. Check PHP error log in cPanel
4. Verify PHP version compatibility

---

## 📝 Bug Reporting

Jika menemukan bug atau error saat testing:

**Format Laporan:**
```
BUG REPORT - BATCH 1

Test Number: TEST X
Bug Type: [Installation / Database / Configuration / Security]
Severity: [Critical / High / Medium / Low]

Description:
[Jelaskan bug yang terjadi]

Steps to Reproduce:
1. [Step 1]
2. [Step 2]
3. [Step 3]

Expected Result:
[Apa yang seharusnya terjadi]

Actual Result:
[Apa yang benar-benar terjadi]

Screenshots:
[Attach screenshots jika ada]

Error Messages:
[Copy-paste error messages]

Environment:
- PHP Version: [x.x.x]
- MySQL Version: [x.x.x]
- Browser: [Chrome/Firefox/Safari/etc]
- OS: [Windows/Mac/Linux]
```

**Kirim ke:**
- Email: vins@situneo.my.id
- WhatsApp: +62 831-7386-8915

---

## ✅ Approval Checklist

Sebelum lanjut ke Batch 2, pastikan:

- [ ] Semua 10 tests PASSED
- [ ] No critical bugs found
- [ ] Database structure OK
- [ ] Admin access working
- [ ] Security headers active
- [ ] SSL/HTTPS working
- [ ] Performance acceptable

**Jika SEMUA checklist ✅ → APPROVED untuk lanjut BATCH 2!**

---

## 🎯 Next Batch Preview

**Batch 2: Assets & Styling**
- Bootstrap 5 framework
- Custom CSS (Blue & Gold theme)
- JavaScript libraries (GSAP, AOS)
- Responsive grid system
- Icon fonts
- Images & graphics

**Estimasi: 50+ files**

---

**📞 Need Help?**
- Email: vins@situneo.my.id
- WhatsApp: +62 831-7386-8915

---

**🚀 Happy Testing! Let's make SITUNEO perfect!**
