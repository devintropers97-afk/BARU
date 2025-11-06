<?php
/**
 * SITUNEO DIGITAL - Hero Section Component
 * Reusable hero section with multiple variants
 * 
 * Usage:
 * $heroConfig = [
 *     'variant' => 'default', // default, minimal, full, split
 *     'title' => 'Main Title',
 *     'subtitle' => 'Subtitle text',
 *     'description' => 'Description text',
 *     'cta_primary' => ['text' => 'Button Text', 'url' => '/url'],
 *     'cta_secondary' => ['text' => 'Button Text', 'url' => '/url'],
 *     'image' => 'path/to/image.jpg',
 *     'video' => 'path/to/video.mp4',
 *     'background' => 'gradient', // gradient, image, video
 *     'height' => 'normal', // normal, tall, full
 *     'animation' => true
 * ];
 * include 'includes/hero.php';
 */

// Default configuration
$variant = $heroConfig['variant'] ?? 'default';
$title = $heroConfig['title'] ?? 'Welcome to SITUNEO DIGITAL';
$subtitle = $heroConfig['subtitle'] ?? '';
$description = $heroConfig['description'] ?? 'Platform Digital Agency Terlengkap';
$ctaPrimary = $heroConfig['cta_primary'] ?? ['text' => 'Get Started', 'url' => '/auth/register'];
$ctaSecondary = $heroConfig['cta_secondary'] ?? ['text' => 'Learn More', 'url' => '/about'];
$image = $heroConfig['image'] ?? '';
$video = $heroConfig['video'] ?? '';
$background = $heroConfig['background'] ?? 'gradient';
$height = $heroConfig['height'] ?? 'normal';
$animation = $heroConfig['animation'] ?? true;
$particles = $heroConfig['particles'] ?? true;

// Height classes
$heightClasses = [
    'normal' => 'hero-normal',
    'tall' => 'hero-tall',
    'full' => 'hero-full'
];
$heightClass = $heightClasses[$height] ?? 'hero-normal';
?>

<section class="hero <?= $heightClass ?> <?= $variant ?>" id="heroSection">
    <!-- Background -->
    <?php if ($background === 'gradient'): ?>
        <div class="hero-background gradient-bg"></div>
    <?php elseif ($background === 'image' && $image): ?>
        <div class="hero-background image-bg" style="background-image: url('<?= $image ?>');"></div>
    <?php elseif ($background === 'video' && $video): ?>
        <div class="hero-background video-bg">
            <video autoplay muted loop playsinline>
                <source src="<?= $video ?>" type="video/mp4">
            </video>
        </div>
    <?php endif; ?>
    
    <!-- Overlay -->
    <div class="hero-overlay"></div>
    
    <!-- Particles Background (if enabled) -->
    <?php if ($particles): ?>
        <canvas id="particleCanvas" class="particle-canvas"></canvas>
    <?php endif; ?>
    
    <!-- Content -->
    <div class="container position-relative">
        <?php if ($variant === 'default' || $variant === 'minimal'): ?>
            <!-- Default/Minimal: Centered Content -->
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <?php if ($subtitle): ?>
                        <p class="hero-subtitle mb-3" <?= $animation ? 'data-aos="fade-down"' : '' ?>>
                            <?= $subtitle ?>
                        </p>
                    <?php endif; ?>
                    
                    <h1 class="hero-title mb-4" <?= $animation ? 'data-aos="fade-up" data-aos-delay="100"' : '' ?>>
                        <?= $title ?>
                    </h1>
                    
                    <?php if ($description): ?>
                        <p class="hero-description mb-5" <?= $animation ? 'data-aos="fade-up" data-aos-delay="200"' : '' ?>>
                            <?= $description ?>
                        </p>
                    <?php endif; ?>
                    
                    <div class="hero-actions" <?= $animation ? 'data-aos="fade-up" data-aos-delay="300"' : '' ?>>
                        <?php if ($ctaPrimary): ?>
                            <a href="<?= $ctaPrimary['url'] ?>" class="btn btn-gold btn-lg me-3 mb-3">
                                <?= $ctaPrimary['text'] ?>
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        <?php endif; ?>
                        
                        <?php if ($ctaSecondary && $variant !== 'minimal'): ?>
                            <a href="<?= $ctaSecondary['url'] ?>" class="btn btn-outline-light btn-lg mb-3">
                                <?= $ctaSecondary['text'] ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
        <?php elseif ($variant === 'split'): ?>
            <!-- Split: Content Left, Image Right -->
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <?php if ($subtitle): ?>
                        <p class="hero-subtitle mb-3" <?= $animation ? 'data-aos="fade-right"' : '' ?>>
                            <?= $subtitle ?>
                        </p>
                    <?php endif; ?>
                    
                    <h1 class="hero-title mb-4" <?= $animation ? 'data-aos="fade-right" data-aos-delay="100"' : '' ?>>
                        <?= $title ?>
                    </h1>
                    
                    <?php if ($description): ?>
                        <p class="hero-description mb-5" <?= $animation ? 'data-aos="fade-right" data-aos-delay="200"' : '' ?>>
                            <?= $description ?>
                        </p>
                    <?php endif; ?>
                    
                    <div class="hero-actions" <?= $animation ? 'data-aos="fade-right" data-aos-delay="300"' : '' ?>>
                        <?php if ($ctaPrimary): ?>
                            <a href="<?= $ctaPrimary['url'] ?>" class="btn btn-gold btn-lg me-3 mb-3">
                                <?= $ctaPrimary['text'] ?>
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        <?php endif; ?>
                        
                        <?php if ($ctaSecondary): ?>
                            <a href="<?= $ctaSecondary['url'] ?>" class="btn btn-outline-light btn-lg mb-3">
                                <?= $ctaSecondary['text'] ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="hero-image" <?= $animation ? 'data-aos="fade-left" data-aos-delay="400"' : '' ?>>
                        <?php if ($image): ?>
                            <img src="<?= $image ?>" alt="<?= $title ?>" class="img-fluid">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
        <?php elseif ($variant === 'full'): ?>
            <!-- Full: Full-screen with centered content -->
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-lg-8 text-center">
                    <?php if ($subtitle): ?>
                        <p class="hero-subtitle mb-3" <?= $animation ? 'data-aos="zoom-in"' : '' ?>>
                            <?= $subtitle ?>
                        </p>
                    <?php endif; ?>
                    
                    <h1 class="hero-title display-1 mb-4" <?= $animation ? 'data-aos="zoom-in" data-aos-delay="100"' : '' ?>>
                        <?= $title ?>
                    </h1>
                    
                    <?php if ($description): ?>
                        <p class="hero-description fs-4 mb-5" <?= $animation ? 'data-aos="zoom-in" data-aos-delay="200"' : '' ?>>
                            <?= $description ?>
                        </p>
                    <?php endif; ?>
                    
                    <div class="hero-actions" <?= $animation ? 'data-aos="zoom-in" data-aos-delay="300"' : '' ?>>
                        <?php if ($ctaPrimary): ?>
                            <a href="<?= $ctaPrimary['url'] ?>" class="btn btn-gold btn-lg me-3 mb-3">
                                <?= $ctaPrimary['text'] ?>
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        <?php endif; ?>
                        
                        <?php if ($ctaSecondary): ?>
                            <a href="<?= $ctaSecondary['url'] ?>" class="btn btn-outline-light btn-lg mb-3">
                                <?= $ctaSecondary['text'] ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    
    <!-- Scroll Down Indicator -->
    <?php if ($height === 'full'): ?>
        <div class="scroll-indicator" <?= $animation ? 'data-aos="fade-up" data-aos-delay="500"' : '' ?>>
            <i class="bi bi-chevron-down"></i>
        </div>
    <?php endif; ?>
</section>

<style>
/* Hero Base Styles */
.hero {
    position: relative;
    overflow: hidden;
    color: white;
}

.hero-normal {
    padding: 8rem 0 5rem;
}

.hero-tall {
    padding: 12rem 0 8rem;
}

.hero-full {
    min-height: 100vh;
    display: flex;
    align-items: center;
}

/* Background */
.hero-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.gradient-bg {
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
}

.image-bg {
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.video-bg video {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Overlay */
.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(15, 48, 87, 0.7);
    z-index: 2;
}

/* Particles Canvas */
.particle-canvas {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 3;
    pointer-events: none;
}

/* Content */
.hero .container {
    z-index: 10;
}

.hero-subtitle {
    color: var(--gold);
    font-size: 1.125rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.hero-title {
    font-size: clamp(2rem, 5vw, 3.5rem);
    font-weight: 800;
    line-height: 1.2;
    color: white;
}

.hero-description {
    font-size: clamp(1rem, 2vw, 1.25rem);
    color: rgba(255,255,255,0.9);
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
}

.hero-actions {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 1rem;
}

.hero.split .hero-description {
    margin-left: 0;
    margin-right: 0;
}

.hero.split .hero-actions {
    justify-content: flex-start;
}

.hero-image img {
    border-radius: var(--border-radius-lg);
    box-shadow: var(--shadow-xl);
}

/* Scroll Indicator */
.scroll-indicator {
    position: absolute;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    z-index: 10;
    animation: bounce 2s infinite;
}

.scroll-indicator i {
    font-size: 2rem;
    color: var(--gold);
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0) translateX(-50%);
    }
    40% {
        transform: translateY(-10px) translateX(-50%);
    }
    60% {
        transform: translateY(-5px) translateX(-50%);
    }
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .hero-normal {
        padding: 5rem 0 3rem;
    }
    
    .hero-tall {
        padding: 6rem 0 4rem;
    }
    
    .hero-actions {
        flex-direction: column;
    }
    
    .hero-actions .btn {
        width: 100%;
    }
}
</style>

<?php if ($particles): ?>
<script>
// Particle Animation
(function() {
    const canvas = document.getElementById('particleCanvas');
    if (!canvas) return;
    
    const ctx = canvas.getContext('2d');
    let particles = [];
    let animationId;
    
    // Set canvas size
    function resizeCanvas() {
        canvas.width = canvas.offsetWidth;
        canvas.height = canvas.offsetHeight;
    }
    
    // Particle class
    class Particle {
        constructor() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.size = Math.random() * 2 + 1;
            this.speedX = Math.random() * 1 - 0.5;
            this.speedY = Math.random() * 1 - 0.5;
            this.opacity = Math.random() * 0.5 + 0.2;
        }
        
        update() {
            this.x += this.speedX;
            this.y += this.speedY;
            
            if (this.x > canvas.width) this.x = 0;
            if (this.x < 0) this.x = canvas.width;
            if (this.y > canvas.height) this.y = 0;
            if (this.y < 0) this.y = canvas.height;
        }
        
        draw() {
            ctx.fillStyle = `rgba(255, 180, 0, ${this.opacity})`;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fill();
        }
    }
    
    // Initialize particles
    function init() {
        resizeCanvas();
        particles = [];
        const numberOfParticles = Math.min(Math.floor((canvas.width * canvas.height) / 10000), 100);
        
        for (let i = 0; i < numberOfParticles; i++) {
            particles.push(new Particle());
        }
    }
    
    // Animation loop
    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        
        particles.forEach(particle => {
            particle.update();
            particle.draw();
        });
        
        // Connect particles
        particles.forEach((p1, i) => {
            particles.slice(i + 1).forEach(p2 => {
                const dx = p1.x - p2.x;
                const dy = p1.y - p2.y;
                const distance = Math.sqrt(dx * dx + dy * dy);
                
                if (distance < 100) {
                    ctx.strokeStyle = `rgba(255, 180, 0, ${0.2 * (1 - distance / 100)})`;
                    ctx.lineWidth = 1;
                    ctx.beginPath();
                    ctx.moveTo(p1.x, p1.y);
                    ctx.lineTo(p2.x, p2.y);
                    ctx.stroke();
                }
            });
        });
        
        animationId = requestAnimationFrame(animate);
    }
    
    // Initialize and start
    init();
    animate();
    
    // Resize handler
    window.addEventListener('resize', () => {
        cancelAnimationFrame(animationId);
        init();
        animate();
    });
})();
</script>
<?php endif; ?>
