<?php
/**
 * SITUNEO DIGITAL - Homepage
 * Main landing page with all sections
 */

// Define root path (go up 2 levels from /pages/public/)
define('ROOT_PATH', dirname(dirname(__DIR__)));

// Start session and get configuration
session_start();
require_once ROOT_PATH . '/config/app.php';
require_once ROOT_PATH . '/config/database.php';

// Page configuration
$pageTitle = 'SITUNEO DIGITAL - Platform Digital Agency Terlengkap';
$pageDesc = '232+ layanan digital dalam 10 divisi. Website Development, Digital Marketing, AI Automation, Branding, Content Marketing, dan lebih banyak lagi. Demo GRATIS 24 Jam!';
$pageKeywords = 'digital agency, website development, digital marketing, AI automation, branding, content marketing, freelancer platform';
$bodyClass = 'home-page';

// Get language
$lang = $_SESSION['lang'] ?? 'id';

// Content translations
$content = [
    'id' => [
        'hero_subtitle' => 'Platform Digital Agency #1 di Indonesia',
        'hero_title' => 'Solusi Digital Lengkap untuk Bisnis Anda',
        'hero_desc' => '232+ layanan profesional dalam 10 divisi. Dari website hingga AI automation. Demo GRATIS 24 jam!',
        'hero_cta1' => 'Mulai Sekarang',
        'hero_cta2' => 'Lihat Demo',
        
        'features_title' => 'Kenapa Memilih SITUNEO?',
        'features_subtitle' => 'Keunggulan Platform Kami',
        
        'services_title' => 'Layanan Kami',
        'services_subtitle' => '232+ Layanan Profesional',
        'services_desc' => 'Solusi digital lengkap dalam 10 divisi untuk semua kebutuhan bisnis Anda',
        
        'portfolio_title' => 'Portfolio Kami',
        'portfolio_subtitle' => '50+ Demo Website Siap Pakai',
        
        'pricing_title' => 'Paket Harga',
        'pricing_subtitle' => 'Pilih Paket Sesuai Kebutuhan',
        
        'testimonials_title' => 'Testimoni Klien',
        'testimonials_subtitle' => 'Apa Kata Mereka',
        
        'cta_title' => 'Siap Memulai Project Anda?',
        'cta_desc' => 'Konsultasi GRATIS dengan tim kami. Demo 24 jam tersedia!',
        'cta_button' => 'Hubungi Kami Sekarang'
    ],
    'en' => [
        'hero_subtitle' => '#1 Digital Agency Platform in Indonesia',
        'hero_title' => 'Complete Digital Solutions for Your Business',
        'hero_desc' => '232+ professional services across 10 divisions. From websites to AI automation. FREE 24-hour demo!',
        'hero_cta1' => 'Get Started',
        'hero_cta2' => 'View Demo',
        
        'features_title' => 'Why Choose SITUNEO?',
        'features_subtitle' => 'Our Platform Advantages',
        
        'services_title' => 'Our Services',
        'services_subtitle' => '232+ Professional Services',
        'services_desc' => 'Complete digital solutions across 10 divisions for all your business needs',
        
        'portfolio_title' => 'Our Portfolio',
        'portfolio_subtitle' => '50+ Ready-to-Use Website Demos',
        
        'pricing_title' => 'Pricing Plans',
        'pricing_subtitle' => 'Choose Your Perfect Plan',
        
        'testimonials_title' => 'Client Testimonials',
        'testimonials_subtitle' => 'What They Say',
        
        'cta_title' => 'Ready to Start Your Project?',
        'cta_desc' => 'FREE consultation with our team. 24-hour demo available!',
        'cta_button' => 'Contact Us Now'
    ]
];

$t = $content[$lang];

// Start output buffering for page content
ob_start();
?>

<!-- Hero Section -->
<?php
$heroConfig = [
    'variant' => 'split',
    'title' => $t['hero_title'],
    'subtitle' => $t['hero_subtitle'],
    'description' => $t['hero_desc'],
    'cta_primary' => ['text' => $t['hero_cta1'], 'url' => '/auth/register'],
    'cta_secondary' => ['text' => $t['hero_cta2'], 'url' => '/portfolio'],
    'image' => 'assets/images/hero-dashboard.png',
    'background' => 'gradient',
    'height' => 'normal',
    'animation' => true,
    'particles' => true
];
include ROOT_PATH . '/includes/hero.php';
?>

<!-- Stats Section -->
<section class="stats-section section-sm bg-white">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="0">
                <div class="stat-card text-center">
                    <div class="stat-icon mb-3">
                        <i class="bi bi-people-fill text-primary-blue"></i>
                    </div>
                    <h3 class="stat-number" data-count="500">0</h3>
                    <p class="stat-label">Happy Clients</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-card text-center">
                    <div class="stat-icon mb-3">
                        <i class="bi bi-folder-fill text-primary-blue"></i>
                    </div>
                    <h3 class="stat-number" data-count="1200">0</h3>
                    <p class="stat-label">Projects Done</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-card text-center">
                    <div class="stat-icon mb-3">
                        <i class="bi bi-grid-3x3-gap-fill text-primary-blue"></i>
                    </div>
                    <h3 class="stat-number" data-count="232">0</h3>
                    <p class="stat-label">Services</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-card text-center">
                    <div class="stat-icon mb-3">
                        <i class="bi bi-star-fill text-gold"></i>
                    </div>
                    <h3 class="stat-number" data-count="98">0</h3>
                    <p class="stat-label">Satisfaction %</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section section bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <p class="section-subtitle text-gold"><?= $t['features_subtitle'] ?></p>
            <h2 class="section-title"><?= $t['features_title'] ?></h2>
        </div>
        
        <div class="row g-4">
            <!-- Feature 1 -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="0">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-lightning-charge-fill"></i>
                    </div>
                    <h4 class="feature-title">Demo GRATIS 24 Jam</h4>
                    <p class="feature-description">
                        Dapatkan demo website GRATIS dalam 24 jam. Lihat hasil kerja kami sebelum membeli!
                    </p>
                </div>
            </div>
            
            <!-- Feature 2 -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-gem"></i>
                    </div>
                    <h4 class="feature-title">232+ Layanan Premium</h4>
                    <p class="feature-description">
                        Semua kebutuhan digital dalam satu platform. Dari website hingga AI automation.
                    </p>
                </div>
            </div>
            
            <!-- Feature 3 -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <h4 class="feature-title">Sistem Freelancer</h4>
                    <p class="feature-description">
                        Referral system dengan komisi 30%-50%. Ajak client, dapat penghasilan!
                    </p>
                </div>
            </div>
            
            <!-- Feature 4 -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h4 class="feature-title">Garansi & Support</h4>
                    <p class="feature-description">
                        Garansi kepuasan 100%. Support 24/7 via WhatsApp, email, dan ticketing.
                    </p>
                </div>
            </div>
            
            <!-- Feature 5 -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-rocket-takeoff"></i>
                    </div>
                    <h4 class="feature-title">Delivery Cepat</h4>
                    <p class="feature-description">
                        Website siap dalam 3-7 hari. Urgent? Bisa 24-48 jam dengan fast track!
                    </p>
                </div>
            </div>
            
            <!-- Feature 6 -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-credit-card"></i>
                    </div>
                    <h4 class="feature-title">Harga Fleksibel</h4>
                    <p class="feature-description">
                        Paket bundling hemat. Cicilan 0%. Diskon hingga 30% untuk paket tertentu!
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section section bg-white">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <p class="section-subtitle text-gold"><?= $t['services_subtitle'] ?></p>
            <h2 class="section-title"><?= $t['services_title'] ?></h2>
            <p class="section-description"><?= $t['services_desc'] ?></p>
        </div>
        
        <div class="row g-4">
            <?php
            // Popular services showcase
            $popularServices = [
                ['icon' => 'bi-globe', 'name' => 'Website Development', 'count' => 35, 'color' => 'primary-blue'],
                ['icon' => 'bi-megaphone', 'name' => 'Digital Marketing', 'count' => 28, 'color' => 'success'],
                ['icon' => 'bi-robot', 'name' => 'AI & Automation', 'count' => 24, 'color' => 'danger'],
                ['icon' => 'bi-palette', 'name' => 'Branding & Design', 'count' => 26, 'color' => 'warning'],
                ['icon' => 'bi-chat-text', 'name' => 'Content & Copy', 'count' => 21, 'color' => 'info'],
                ['icon' => 'bi-bar-chart', 'name' => 'Data Analytics', 'count' => 22, 'color' => 'purple'],
                ['icon' => 'bi-shield-check', 'name' => 'Legal & Domain', 'count' => 25, 'color' => 'secondary'],
                ['icon' => 'bi-headset', 'name' => 'Customer Support', 'count' => 20, 'color' => 'teal']
            ];
            
            foreach ($popularServices as $index => $service):
            ?>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="<?= $index * 50 ?>">
                    <a href="/services?category=<?= urlencode($service['name']) ?>" class="service-card-link">
                        <div class="service-card">
                            <div class="service-icon text-<?= $service['color'] ?>">
                                <i class="bi <?= $service['icon'] ?>"></i>
                            </div>
                            <h5 class="service-name"><?= $service['name'] ?></h5>
                            <p class="service-count"><?= $service['count'] ?> Services</p>
                            <div class="service-arrow">
                                <i class="bi bi-arrow-right"></i>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="/services" class="btn btn-gold btn-lg">
                View All 232+ Services
                <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section section bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center" data-aos="zoom-in">
                <h2 class="text-white mb-4"><?= $t['cta_title'] ?></h2>
                <p class="text-white-50 fs-5 mb-5"><?= $t['cta_desc'] ?></p>
                <div class="cta-actions">
                    <a href="/contact" class="btn btn-gold btn-lg me-3">
                        <?= $t['cta_button'] ?>
                        <i class="bi bi-whatsapp ms-2"></i>
                    </a>
                    <a href="/auth/register" class="btn btn-outline-light btn-lg">
                        Register Free
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Stats Section */
.stat-card {
    padding: 2rem;
    background: white;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-sm);
    transition: all 0.3s ease;
}

.stat-card:hover {
    box-shadow: var(--shadow-lg);
    transform: translateY(-5px);
}

.stat-icon i {
    font-size: 3rem;
}

.stat-number {
    font-size: 3rem;
    font-weight: 800;
    color: var(--primary-blue);
    margin: 0;
}

.stat-label {
    color: var(--text-secondary);
    margin: 0;
    font-weight: 500;
}

/* Feature Card */
.feature-card {
    padding: 2rem;
    background: white;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-sm);
    transition: all 0.3s ease;
    height: 100%;
}

.feature-card:hover {
    box-shadow: var(--shadow-lg);
    transform: translateY(-5px);
}

.feature-icon {
    width: 70px;
    height: 70px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
    border-radius: 50%;
    margin-bottom: 1.5rem;
}

.feature-icon i {
    font-size: 2rem;
    color: var(--gold);
}

.feature-title {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: var(--primary-blue);
}

.feature-description {
    color: var(--text-secondary);
    margin: 0;
}

/* Service Card */
.service-card-link {
    text-decoration: none;
    color: inherit;
    display: block;
}

.service-card {
    padding: 2rem;
    background: white;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-sm);
    transition: all 0.3s ease;
    text-align: center;
    height: 100%;
    position: relative;
    overflow: hidden;
}

.service-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-blue), var(--gold));
    transform: scaleX(0);
    transition: transform 0.3s ease;
}

.service-card:hover {
    box-shadow: var(--shadow-xl);
    transform: translateY(-10px);
}

.service-card:hover::before {
    transform: scaleX(1);
}

.service-icon {
    width: 80px;
    height: 80px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: rgba(30, 92, 153, 0.1);
    border-radius: 50%;
    margin-bottom: 1.5rem;
    transition: all 0.3s ease;
}

.service-card:hover .service-icon {
    transform: scale(1.1) rotate(5deg);
}

.service-icon i {
    font-size: 2.5rem;
}

.service-name {
    font-size: 1.125rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    color: var(--primary-blue);
}

.service-count {
    color: var(--text-secondary);
    margin: 0;
}

.service-arrow {
    margin-top: 1rem;
    color: var(--gold);
    opacity: 0;
    transform: translateX(-10px);
    transition: all 0.3s ease;
}

.service-card:hover .service-arrow {
    opacity: 1;
    transform: translateX(0);
}

/* CTA Section */
.bg-gradient-primary {
    background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
}

.cta-actions {
    display: flex;
    justify-content: center;
    gap: 1rem;
    flex-wrap: wrap;
}

/* Mobile */
@media (max-width: 768px) {
    .cta-actions {
        flex-direction: column;
    }
    
    .cta-actions .btn {
        width: 100%;
    }
}
</style>

<script>
// Counter Animation
document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('.stat-number');
    
    const animateCounter = (counter) => {
        const target = parseInt(counter.getAttribute('data-count'));
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;
        
        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                counter.textContent = target + (counter.textContent.includes('%') ? '%' : '+');
                clearInterval(timer);
            } else {
                counter.textContent = Math.floor(current);
            }
        }, 16);
    };
    
    // Intersection Observer for counter animation
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });
    
    counters.forEach(counter => observer.observe(counter));
});
</script>

<?php
// Get the page content
$pageContent = ob_get_clean();

// Include base template
include ROOT_PATH . '/templates/base-template.php';
?>
