<?php
/**
 * SITUNEO DIGITAL - Header Component
 * Universal header for all pages with multi-language support
 * 
 * Features:
 * - Multi-language (ID/EN)
 * - Responsive mobile menu
 * - User authentication state
 * - Dynamic navigation based on user role
 * - Sticky header on scroll
 */

// Get current language (default: ID)
$lang = $_SESSION['lang'] ?? 'id';

// Get current user if logged in
$currentUser = $_SESSION['user'] ?? null;
$isLoggedIn = !empty($currentUser);

// Get current page for active menu
$currentPage = basename($_SERVER['PHP_SELF'], '.php');

// Navigation items (multi-language)
$navItems = [
    'id' => [
        'home' => 'Beranda',
        'about' => 'Tentang',
        'services' => 'Layanan',
        'portfolio' => 'Portfolio',
        'pricing' => 'Harga',
        'contact' => 'Kontak',
        'login' => 'Masuk',
        'register' => 'Daftar',
        'dashboard' => 'Dashboard',
        'logout' => 'Keluar'
    ],
    'en' => [
        'home' => 'Home',
        'about' => 'About',
        'services' => 'Services',
        'portfolio' => 'Portfolio',
        'pricing' => 'Pricing',
        'contact' => 'Contact',
        'login' => 'Login',
        'register' => 'Register',
        'dashboard' => 'Dashboard',
        'logout' => 'Logout'
    ]
];

$nav = $navItems[$lang];
?>

<header class="header sticky-top" id="mainHeader">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="assets/images/logo.png" alt="SITUNEO DIGITAL" class="logo" height="40">
                <span class="ms-2 fw-bold">SITUNEO</span>
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Menu -->
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <!-- Public Navigation -->
                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage == 'index' ? 'active' : '' ?>" href="/">
                            <?= $nav['home'] ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage == 'about' ? 'active' : '' ?>" href="/about">
                            <?= $nav['about'] ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage == 'services' ? 'active' : '' ?>" href="/services">
                            <?= $nav['services'] ?>
                            <span class="badge bg-gold ms-1">232+</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage == 'portfolio' ? 'active' : '' ?>" href="/portfolio">
                            <?= $nav['portfolio'] ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage == 'pricing' ? 'active' : '' ?>" href="/pricing">
                            <?= $nav['pricing'] ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage == 'contact' ? 'active' : '' ?>" href="/contact">
                            <?= $nav['contact'] ?>
                        </a>
                    </li>

                    <!-- Language Switcher -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-globe"></i>
                            <span class="text-uppercase"><?= $lang ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item <?= $lang == 'id' ? 'active' : '' ?>" href="?lang=id">
                                    🇮🇩 Indonesia
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item <?= $lang == 'en' ? 'active' : '' ?>" href="?lang=en">
                                    🇬🇧 English
                                </a>
                            </li>
                        </ul>
                    </li>

                    <?php if ($isLoggedIn): ?>
                        <!-- Logged In User Menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown">
                                <img src="<?= $currentUser['avatar'] ?? 'assets/images/avatar-default.png' ?>" 
                                     alt="<?= $currentUser['name'] ?>" 
                                     class="rounded-circle me-2" 
                                     width="32" 
                                     height="32">
                                <span><?= $currentUser['name'] ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="/<?= strtolower($currentUser['role']) ?>/dashboard">
                                        <i class="bi bi-speedometer2 me-2"></i>
                                        <?= $nav['dashboard'] ?>
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item text-danger" href="/auth/logout">
                                        <i class="bi bi-box-arrow-right me-2"></i>
                                        <?= $nav['logout'] ?>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <!-- Not Logged In -->
                        <li class="nav-item">
                            <a class="nav-link" href="/auth/login">
                                <?= $nav['login'] ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-gold btn-sm ms-lg-2" href="/auth/register">
                                <?= $nav['register'] ?>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Spacer for sticky header -->
<div class="header-spacer"></div>

<style>
/* Header Styles */
.header {
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
    box-shadow: 0 2px 20px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    z-index: 1030;
}

.header.sticky-top {
    position: sticky;
    top: 0;
}

.header .navbar {
    padding: 1rem 0;
}

.header .navbar-brand {
    font-size: 1.5rem;
    color: var(--gold) !important;
    transition: all 0.3s ease;
}

.header .navbar-brand:hover {
    transform: scale(1.05);
}

.header .logo {
    filter: brightness(0) invert(1);
    transition: filter 0.3s ease;
}

.header .nav-link {
    color: rgba(255,255,255,0.9) !important;
    font-weight: 500;
    padding: 0.5rem 1rem !important;
    border-radius: var(--border-radius);
    transition: all 0.3s ease;
    position: relative;
}

.header .nav-link:hover {
    color: var(--gold) !important;
    background: rgba(255,255,255,0.1);
}

.header .nav-link.active {
    color: var(--gold) !important;
}

.header .nav-link.active::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 30px;
    height: 2px;
    background: var(--gold);
}

.header .dropdown-menu {
    background: white;
    border: none;
    box-shadow: var(--shadow-lg);
    border-radius: var(--border-radius);
    margin-top: 0.5rem;
}

.header .dropdown-item {
    padding: 0.75rem 1.5rem;
    transition: all 0.3s ease;
}

.header .dropdown-item:hover {
    background: var(--light-blue);
    color: var(--primary-blue);
    padding-left: 2rem;
}

.header .dropdown-item.active {
    background: var(--primary-blue);
    color: white;
}

.header .btn-gold {
    padding: 0.5rem 1.5rem;
    font-weight: 600;
}

.header-spacer {
    height: 76px;
}

/* Mobile Styles */
@media (max-width: 991px) {
    .header .navbar-collapse {
        background: var(--dark-blue);
        padding: 1rem;
        margin-top: 1rem;
        border-radius: var(--border-radius);
    }
    
    .header .nav-link {
        margin: 0.25rem 0;
    }
    
    .header .btn-gold {
        width: 100%;
        margin-top: 1rem;
    }
    
    .header-spacer {
        height: 66px;
    }
}

/* Scrolled State */
.header.scrolled {
    box-shadow: 0 4px 30px rgba(0,0,0,0.2);
}

.header.scrolled .navbar {
    padding: 0.5rem 0;
}
</style>

<script>
// Header scroll effect
window.addEventListener('scroll', function() {
    const header = document.getElementById('mainHeader');
    if (window.scrollY > 50) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});

// Active menu highlight
document.addEventListener('DOMContentLoaded', function() {
    const currentPath = window.location.pathname;
    document.querySelectorAll('.nav-link').forEach(link => {
        if (link.getAttribute('href') === currentPath) {
            link.classList.add('active');
        }
    });
});
</script>
