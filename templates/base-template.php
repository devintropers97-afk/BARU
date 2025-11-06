<?php
/**
 * SITUNEO DIGITAL - Base HTML Template
 * Used by all pages for consistent structure
 * 
 * Usage:
 * $pageTitle = 'Page Title';
 * $pageDesc = 'Page description';
 * $pageKeywords = 'keywords, here';
 * $bodyClass = 'additional-class';
 * include 'templates/base-template.php';
 */

// Get configuration
require_once __DIR__ . '/../config/app.php';

// Define BASE_URL and CURRENT_URL if not already defined
if (!defined('BASE_URL')) {
    define('BASE_URL', APP_URL);
}
if (!defined('CURRENT_URL')) {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $currentUrl = $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    define('CURRENT_URL', $currentUrl);
}
if (!defined('ENVIRONMENT')) {
    define('ENVIRONMENT', APP_ENV);
}

// Default values
$pageTitle = $pageTitle ?? 'SITUNEO DIGITAL - Digital Agency Platform';
$pageDesc = $pageDesc ?? 'Platform digital agency terlengkap dengan 232+ layanan dalam 10 divisi. Website Development, Digital Marketing, AI Automation, dan lebih banyak lagi.';
$pageKeywords = $pageKeywords ?? 'digital agency, website development, digital marketing, AI automation, branding, content marketing';
$pageImage = $pageImage ?? BASE_URL . '/assets/images/og-image.png';
$bodyClass = $bodyClass ?? '';
$lang = $_SESSION['lang'] ?? 'id';
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- SEO Meta Tags -->
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <meta name="description" content="<?= htmlspecialchars($pageDesc) ?>">
    <meta name="keywords" content="<?= htmlspecialchars($pageKeywords) ?>">
    <meta name="author" content="SITUNEO DIGITAL">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    
    <!-- Open Graph Meta Tags (Facebook, LinkedIn) -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= CURRENT_URL ?>">
    <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($pageDesc) ?>">
    <meta property="og:image" content="<?= $pageImage ?>">
    <meta property="og:site_name" content="SITUNEO DIGITAL">
    <meta property="og:locale" content="<?= $lang == 'id' ? 'id_ID' : 'en_US' ?>">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?= CURRENT_URL ?>">
    <meta name="twitter:title" content="<?= htmlspecialchars($pageTitle) ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($pageDesc) ?>">
    <meta name="twitter:image" content="<?= $pageImage ?>">
    <meta name="twitter:site" content="@situneo">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?= BASE_URL ?>/assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= BASE_URL ?>/assets/images/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= BASE_URL ?>/assets/images/apple-touch-icon.png">
    <link rel="manifest" href="<?= BASE_URL ?>/site.webmanifest">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="<?= CURRENT_URL ?>">
    
    <!-- Alternate Language URLs -->
    <link rel="alternate" hreflang="id" href="<?= BASE_URL ?>?lang=id">
    <link rel="alternate" hreflang="en" href="<?= BASE_URL ?>?lang=en">
    <link rel="alternate" hreflang="x-default" href="<?= BASE_URL ?>">
    
    <!-- Preconnect to CDNs -->
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- CSS Files (From Batch 2) -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/variables.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/global.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/components.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/animations.css">
    
    <!-- Bootstrap 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- AOS (Animate On Scroll) -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Additional Page CSS -->
    <?php if (isset($additionalCSS)): ?>
        <?php foreach ((array)$additionalCSS as $css): ?>
            <link rel="stylesheet" href="<?= $css ?>">
        <?php endforeach; ?>
    <?php endif; ?>
    
    <!-- Inline Page Styles -->
    <?php if (isset($pageStyles)): ?>
        <style><?= $pageStyles ?></style>
    <?php endif; ?>
    
    <!-- JSON-LD Schema Markup -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "SITUNEO DIGITAL",
        "url": "<?= BASE_URL ?>",
        "logo": "<?= BASE_URL ?>/assets/images/logo.png",
        "description": "<?= htmlspecialchars($pageDesc) ?>",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Jl. Bekasi Timur IX Dalam No. 27, RT 002/RW 003",
            "addressLocality": "Jakarta Timur",
            "postalCode": "13450",
            "addressCountry": "ID"
        },
        "contactPoint": [{
            "@type": "ContactPoint",
            "telephone": "+62-831-7386-8915",
            "contactType": "customer service",
            "areaServed": "ID",
            "availableLanguage": ["id", "en"]
        }],
        "sameAs": [
            "https://facebook.com/situneo",
            "https://instagram.com/situneo",
            "https://twitter.com/situneo",
            "https://linkedin.com/company/situneo",
            "https://youtube.com/@situneo"
        ]
    }
    </script>
    
    <!-- Google Analytics (Production only) -->
    <?php if (ENVIRONMENT === 'production'): ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-XXXXXXXXXX');
    </script>
    <?php endif; ?>
</head>
<body class="<?= $bodyClass ?>">
    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <div class="loading-spinner">
            <div class="spinner-border text-gold" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="mt-3 text-white">Loading...</p>
        </div>
    </div>

    <!-- Header -->
    <?php include __DIR__ . '/../includes/header.php'; ?>
    
    <!-- Main Content -->
    <main id="mainContent" class="main-content">
        <?php
        // Content will be injected here by each page
        if (isset($pageContent)) {
            echo $pageContent;
        }
        ?>
    </main>
    
    <!-- Footer -->
    <?php include __DIR__ . '/../includes/footer.php'; ?>
    
    <!-- JavaScript Files -->
    
    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- AOS (Animate On Scroll) -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    
    <!-- GSAP (Animation Library) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    
    <!-- Chart.js (for analytics/graphs) -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    
    <!-- Custom JS (From Batch 2) -->
    <script src="<?= BASE_URL ?>/assets/js/main.js"></script>
    
    <!-- Additional Page JS -->
    <?php if (isset($additionalJS)): ?>
        <?php foreach ((array)$additionalJS as $js): ?>
            <script src="<?= $js ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
    
    <!-- Inline Page Scripts -->
    <?php if (isset($pageScripts)): ?>
        <script><?= $pageScripts ?></script>
    <?php endif; ?>
    
    <!-- Initialize AOS -->
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });
    </script>
    
    <!-- Hide Loading Screen -->
    <script>
        window.addEventListener('load', function() {
            const loadingScreen = document.getElementById('loadingScreen');
            loadingScreen.style.opacity = '0';
            setTimeout(() => {
                loadingScreen.style.display = 'none';
            }, 300);
        });
    </script>
</body>
</html>

<style>
/* Loading Screen */
.loading-screen {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    transition: opacity 0.3s ease;
}

.loading-spinner {
    text-align: center;
}

.loading-spinner .spinner-border {
    width: 3rem;
    height: 3rem;
}

/* Main Content */
.main-content {
    min-height: calc(100vh - 76px - 400px); /* viewport - header - footer */
}

/* Utility Classes */
.section {
    padding: 5rem 0;
}

.section-sm {
    padding: 3rem 0;
}

.section-lg {
    padding: 7rem 0;
}

@media (max-width: 768px) {
    .section {
        padding: 3rem 0;
    }
    
    .section-sm {
        padding: 2rem 0;
    }
    
    .section-lg {
        padding: 4rem 0;
    }
}
</style>
