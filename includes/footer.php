<?php
/**
 * SITUNEO DIGITAL - Footer Component
 * Universal footer for all pages
 * 
 * Features:
 * - Company info & contact
 * - Quick links (4 columns)
 * - Social media links
 * - Newsletter subscription
 * - Payment methods
 * - Copyright & legal
 */

$lang = $_SESSION['lang'] ?? 'id';

$footerText = [
    'id' => [
        'about_title' => 'Tentang SITUNEO',
        'about_desc' => 'Platform digital agency terlengkap dengan 232+ layanan dalam 10 divisi. Kami membantu bisnis Anda berkembang dengan solusi digital terbaik.',
        'quick_links' => 'Tautan Cepat',
        'services' => 'Layanan',
        'legal' => 'Legal',
        'contact' => 'Kontak',
        'newsletter_title' => 'Newsletter',
        'newsletter_desc' => 'Dapatkan update terbaru dan promo eksklusif',
        'email_placeholder' => 'Email Anda',
        'subscribe' => 'Berlangganan',
        'payment_methods' => 'Metode Pembayaran',
        'follow_us' => 'Ikuti Kami',
        'copyright' => 'Hak Cipta',
        'all_rights' => 'Semua hak dilindungi',
        'made_with' => 'Dibuat dengan',
        'in' => 'di'
    ],
    'en' => [
        'about_title' => 'About SITUNEO',
        'about_desc' => 'The most comprehensive digital agency platform with 232+ services across 10 divisions. We help your business grow with the best digital solutions.',
        'quick_links' => 'Quick Links',
        'services' => 'Services',
        'legal' => 'Legal',
        'contact' => 'Contact',
        'newsletter_title' => 'Newsletter',
        'newsletter_desc' => 'Get latest updates and exclusive offers',
        'email_placeholder' => 'Your Email',
        'subscribe' => 'Subscribe',
        'payment_methods' => 'Payment Methods',
        'follow_us' => 'Follow Us',
        'copyright' => 'Copyright',
        'all_rights' => 'All rights reserved',
        'made_with' => 'Made with',
        'in' => 'in'
    ]
];

$t = $footerText[$lang];
?>

<footer class="footer">
    <!-- Main Footer -->
    <div class="footer-main">
        <div class="container">
            <div class="row g-4">
                <!-- About Column -->
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget">
                        <div class="footer-logo mb-3">
                            <img src="assets/images/logo.png" alt="SITUNEO" height="40" class="mb-3">
                            <h4 class="text-gold fw-bold">SITUNEO DIGITAL</h4>
                        </div>
                        <p class="text-light mb-4"><?= $t['about_desc'] ?></p>
                        
                        <!-- Contact Info -->
                        <div class="footer-contact">
                            <div class="d-flex align-items-start mb-2">
                                <i class="bi bi-geo-alt-fill text-gold me-3"></i>
                                <span class="text-light">
                                    Jl. Bekasi Timur IX Dalam No. 27<br>
                                    RT 002/RW 003, Jakarta Timur 13450
                                </span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-telephone-fill text-gold me-3"></i>
                                <a href="tel:02188807229" class="text-light">021-8880-7229</a>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-whatsapp text-gold me-3"></i>
                                <a href="https://wa.me/6283173868915" class="text-light">+62 831-7386-8915</a>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-envelope-fill text-gold me-3"></i>
                                <a href="mailto:vins@situneo.my.id" class="text-light">vins@situneo.my.id</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Links Column -->
                <div class="col-lg-2 col-md-6">
                    <div class="footer-widget">
                        <h5 class="footer-title text-white mb-4"><?= $t['quick_links'] ?></h5>
                        <ul class="footer-links">
                            <li><a href="/">Home</a></li>
                            <li><a href="/about">About</a></li>
                            <li><a href="/services">Services <span class="badge bg-gold">232+</span></a></li>
                            <li><a href="/portfolio">Portfolio</a></li>
                            <li><a href="/pricing">Pricing</a></li>
                            <li><a href="/contact">Contact</a></li>
                            <li><a href="/blog">Blog</a></li>
                            <li><a href="/career">Career</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Services Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h5 class="footer-title text-white mb-4"><?= $t['services'] ?></h5>
                        <ul class="footer-links">
                            <li><a href="/services?div=1">Website Development</a></li>
                            <li><a href="/services?div=2">Digital Marketing</a></li>
                            <li><a href="/services?div=3">Automation & AI</a></li>
                            <li><a href="/services?div=4">Branding & Design</a></li>
                            <li><a href="/services?div=5">Content & Copy</a></li>
                            <li><a href="/services?div=6">Data & Analytics</a></li>
                            <li><a href="/services?div=7">Legal & Domain</a></li>
                            <li><a href="/services">View All (232+)</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Newsletter & Social Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h5 class="footer-title text-white mb-4"><?= $t['newsletter_title'] ?></h5>
                        <p class="text-light mb-3"><?= $t['newsletter_desc'] ?></p>
                        
                        <!-- Newsletter Form -->
                        <form class="newsletter-form mb-4" id="newsletterForm">
                            <div class="input-group">
                                <input type="email" 
                                       class="form-control" 
                                       placeholder="<?= $t['email_placeholder'] ?>" 
                                       required>
                                <button class="btn btn-gold" type="submit">
                                    <i class="bi bi-send-fill"></i>
                                </button>
                            </div>
                        </form>

                        <!-- Social Media -->
                        <h6 class="text-white mb-3"><?= $t['follow_us'] ?></h6>
                        <div class="social-links">
                            <a href="https://facebook.com/situneo" target="_blank" class="social-link">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="https://instagram.com/situneo" target="_blank" class="social-link">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="https://twitter.com/situneo" target="_blank" class="social-link">
                                <i class="bi bi-twitter"></i>
                            </a>
                            <a href="https://linkedin.com/company/situneo" target="_blank" class="social-link">
                                <i class="bi bi-linkedin"></i>
                            </a>
                            <a href="https://youtube.com/@situneo" target="_blank" class="social-link">
                                <i class="bi bi-youtube"></i>
                            </a>
                            <a href="https://wa.me/6283173868915" target="_blank" class="social-link">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment Methods -->
    <div class="footer-payment">
        <div class="container">
            <div class="text-center">
                <h6 class="text-white mb-3"><?= $t['payment_methods'] ?></h6>
                <div class="payment-methods">
                    <img src="assets/images/payment/bca.png" alt="BCA" height="30">
                    <img src="assets/images/payment/mandiri.png" alt="Mandiri" height="30">
                    <img src="assets/images/payment/bni.png" alt="BNI" height="30">
                    <img src="assets/images/payment/bri.png" alt="BRI" height="30">
                    <img src="assets/images/payment/gopay.png" alt="GoPay" height="30">
                    <img src="assets/images/payment/ovo.png" alt="OVO" height="30">
                    <img src="assets/images/payment/dana.png" alt="DANA" height="30">
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <p class="mb-0 text-light">
                        &copy; <?= date('Y') ?> SITUNEO DIGITAL. <?= $t['all_rights'] ?>
                    </p>
                    <p class="mb-0 text-light small">
                        NIB: 20250-9261-4570-4515-5453 | NPWP: 90.296.264.6-002.000
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <ul class="footer-legal">
                        <li><a href="/privacy-policy">Privacy Policy</a></li>
                        <li><a href="/terms-conditions">Terms & Conditions</a></li>
                        <li><a href="/sitemap">Sitemap</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to Top Button -->
    <button class="back-to-top" id="backToTop" aria-label="Back to top">
        <i class="bi bi-arrow-up"></i>
    </button>
</footer>

<style>
/* Footer Styles */
.footer {
    background: var(--primary-blue-dark, #0F3057);
    color: var(--text-light, rgba(255,255,255,0.9));
}

.footer-main {
    padding: 4rem 0 2rem;
    border-bottom: 1px solid rgba(255,255,255,0.1);
}

.footer-logo img {
    filter: brightness(0) invert(1);
}

.footer-title {
    position: relative;
    padding-bottom: 0.75rem;
}

.footer-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 50px;
    height: 3px;
    background: var(--gold, #FFB400);
}

.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links li {
    margin-bottom: 0.75rem;
}

.footer-links a {
    color: rgba(255,255,255,0.7);
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-block;
}

.footer-links a:hover {
    color: var(--gold, #FFB400);
    padding-left: 0.5rem;
}

.footer-contact a {
    color: rgba(255,255,255,0.7);
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-contact a:hover {
    color: var(--gold, #FFB400);
}

/* Newsletter Form */
.newsletter-form .form-control {
    border: none;
    border-radius: var(--border-radius, 8px) 0 0 var(--border-radius, 8px);
    padding: 0.75rem 1rem;
}

.newsletter-form .btn {
    border-radius: 0 var(--border-radius, 8px) var(--border-radius, 8px) 0;
    padding: 0.75rem 1.5rem;
}

/* Social Links */
.social-links {
    display: flex;
    gap: 0.75rem;
    flex-wrap: wrap;
}

.social-link {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255,255,255,0.1);
    border-radius: 50%;
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-link:hover {
    background: var(--gold, #FFB400);
    color: var(--primary-blue-dark, #0F3057);
    transform: translateY(-3px);
}

/* Payment Methods */
.footer-payment {
    padding: 2rem 0;
    border-bottom: 1px solid rgba(255,255,255,0.1);
}

.payment-methods {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 1.5rem;
    flex-wrap: wrap;
}

.payment-methods img {
    filter: brightness(0) invert(1);
    opacity: 0.7;
    transition: all 0.3s ease;
}

.payment-methods img:hover {
    opacity: 1;
    transform: scale(1.1);
}

/* Footer Bottom */
.footer-bottom {
    padding: 1.5rem 0;
}

.footer-legal {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    gap: 1.5rem;
    justify-content: center;
}

.footer-legal a {
    color: rgba(255,255,255,0.7);
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-legal a:hover {
    color: var(--gold, #FFB400);
}

/* Back to Top Button */
.back-to-top {
    position: fixed;
    bottom: 2rem;
    right: 2rem;
    width: 50px;
    height: 50px;
    background: var(--gold, #FFB400);
    color: var(--primary-blue-dark, #0F3057);
    border: none;
    border-radius: 50%;
    font-size: 1.5rem;
    cursor: pointer;
    display: none;
    align-items: center;
    justify-content: center;
    box-shadow: var(--shadow-lg, 0 10px 40px rgba(0,0,0,0.15));
    transition: all 0.3s ease;
    z-index: 1000;
}

.back-to-top:hover {
    background: var(--bright-gold);
    transform: translateY(-3px);
}

.back-to-top.show {
    display: flex;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .footer-main {
        padding: 3rem 0 1.5rem;
    }
    
    .footer-widget {
        margin-bottom: 2rem;
    }
    
    .social-links {
        justify-content: center;
    }
    
    .payment-methods {
        gap: 1rem;
    }
    
    .footer-legal {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .back-to-top {
        bottom: 1rem;
        right: 1rem;
        width: 45px;
        height: 45px;
    }
}
</style>

<script>
// Newsletter Form Submission
document.getElementById('newsletterForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const email = this.querySelector('input[type="email"]').value;
    
    // Send AJAX request
    fetch('/api/newsletter/subscribe', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ email: email })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showAlert('success', 'Terima kasih! Email Anda berhasil didaftarkan.');
            this.reset();
        } else {
            showAlert('error', data.message || 'Terjadi kesalahan. Silakan coba lagi.');
        }
    })
    .catch(error => {
        showAlert('error', 'Terjadi kesalahan. Silakan coba lagi.');
    });
});

// Back to Top Button
const backToTop = document.getElementById('backToTop');

window.addEventListener('scroll', function() {
    if (window.scrollY > 300) {
        backToTop.classList.add('show');
    } else {
        backToTop.classList.remove('show');
    }
});

backToTop.addEventListener('click', function() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});
</script>
