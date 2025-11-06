# SITUNEO DIGITAL - BATCH 2: ASSETS & STYLING

## 📋 Overview

**Batch 2** berisi semua assets, styling system, dan utilities untuk SITUNEO DIGITAL website. Ini adalah foundation visual dan interaktif dari website.

**Version:** 2.0.0  
**Date:** 2025  
**Status:** ✅ READY FOR PRODUCTION

---

## 📦 What's Included

### **CSS Files** (4 files)
1. **variables.css** - Design system variables (colors, typography, spacing, shadows, etc.)
2. **global.css** - Base styles, resets, typography, utilities
3. **components.css** - Reusable UI components (buttons, cards, forms, modals, etc.)
4. **animations.css** - All animation effects and transitions

### **JavaScript Files** (2 files)
1. **main.js** - Core utilities and functions
2. **cdn-config.js** - Vendor/CDN library configuration

### **Folders**
- `/css/` - All stylesheets
- `/js/` - JavaScript files
- `/vendor/` - Third-party library configs
- `/images/placeholders/` - Placeholder images (ready for real images)
- `/fonts/` - Custom fonts (if needed)

---

## 🎨 Design System

### **Color Palette**

#### Primary Colors:
- **Blue**: `#1E5C99` (Primary), `#0F3057` (Dark), `#2A7FD5` (Light)
- **Gold**: `#FFB400`, `#FFD700` (Bright), `#CC9000` (Dark)

#### Semantic Colors:
- **Success**: `#10B981`
- **Warning**: `#F59E0B`
- **Error**: `#EF4444`
- **Info**: `#3B82F6`

#### Neutral Colors:
- **Grays**: From `#F9FAFB` (lightest) to `#111827` (darkest)
- **White**: `#FFFFFF`
- **Black**: `#000000`

### **Typography**

#### Fonts:
- **Primary**: Inter (body text)
- **Heading**: Plus Jakarta Sans (headings)
- **Monospace**: Courier New (code)

#### Font Sizes:
```css
--font-xs: 0.75rem;    /* 12px */
--font-sm: 0.875rem;   /* 14px */
--font-base: 1rem;     /* 16px */
--font-lg: 1.125rem;   /* 18px */
--font-xl: 1.25rem;    /* 20px */
--font-2xl: 1.5rem;    /* 24px */
--font-3xl: 1.875rem;  /* 30px */
--font-4xl: 2.25rem;   /* 36px */
--font-5xl: 3rem;      /* 48px */
--font-6xl: 3.75rem;   /* 60px */
--font-7xl: 4.5rem;    /* 72px */
```

#### Font Weights:
```css
--font-light: 300;
--font-normal: 400;
--font-medium: 500;
--font-semibold: 600;
--font-bold: 700;
--font-extrabold: 800;
--font-black: 900;
```

### **Spacing System**
```css
--space-1: 0.25rem;   /* 4px */
--space-2: 0.5rem;    /* 8px */
--space-3: 0.75rem;   /* 12px */
--space-4: 1rem;      /* 16px */
--space-5: 1.25rem;   /* 20px */
--space-6: 1.5rem;    /* 24px */
--space-8: 2rem;      /* 32px */
--space-10: 2.5rem;   /* 40px */
--space-12: 3rem;     /* 48px */
--space-16: 4rem;     /* 64px */
--space-20: 5rem;     /* 80px */
--space-24: 6rem;     /* 96px */
--space-32: 8rem;     /* 128px */
```

### **Shadows**
```css
--shadow-xs: Small shadow
--shadow-sm: Small shadow
--shadow-base: Base shadow
--shadow-md: Medium shadow
--shadow-lg: Large shadow
--shadow-xl: Extra large shadow
--shadow-2xl: Super large shadow
--shadow-blue: Blue colored shadow
--shadow-gold: Gold colored shadow
```

### **Border Radius**
```css
--radius-sm: 0.25rem;    /* 4px */
--radius-base: 0.5rem;   /* 8px */
--radius-md: 0.75rem;    /* 12px */
--radius-lg: 1rem;       /* 16px */
--radius-xl: 1.5rem;     /* 24px */
--radius-2xl: 2rem;      /* 32px */
--radius-full: 9999px;   /* Fully rounded */
```

---

## 🚀 Installation & Usage

### **Step 1: Extract Files**
```bash
# Extract SITUNEO-BATCH-2.zip to your website root
unzip SITUNEO-BATCH-2.zip

# Your structure should look like:
/your-website/
├── assets/
│   ├── css/
│   │   ├── variables.css
│   │   ├── global.css
│   │   ├── components.css
│   │   └── animations.css
│   ├── js/
│   │   └── main.js
│   └── vendor/
│       └── cdn-config.js
```

### **Step 2: Add to HTML**

#### In `<head>` section:
```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SITUNEO DIGITAL</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- AOS (Animate On Scroll) -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
    
    <!-- Custom CSS - IMPORTANT: Load in this order! -->
    <link rel="stylesheet" href="assets/css/variables.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <link rel="stylesheet" href="assets/css/animations.css">
</head>
```

#### Before `</body>`:
```html
    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- GSAP -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    
    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    
    <!-- Custom JavaScript -->
    <script src="assets/js/main.js"></script>
    
    <!-- Initialize AOS -->
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
    </script>
</body>
</html>
```

---

## 💡 Usage Examples

### **1. Buttons**

```html
<!-- Primary Button -->
<button class="btn btn-primary">Click Me</button>

<!-- Gold Button -->
<button class="btn btn-gold">Get Started</button>

<!-- Outline Button -->
<button class="btn btn-outline-primary">Learn More</button>

<!-- Button Sizes -->
<button class="btn btn-primary btn-sm">Small</button>
<button class="btn btn-primary">Normal</button>
<button class="btn btn-primary btn-lg">Large</button>
<button class="btn btn-primary btn-xl">Extra Large</button>

<!-- Rounded Button -->
<button class="btn btn-primary btn-rounded">Rounded</button>

<!-- Block Button -->
<button class="btn btn-primary btn-block">Full Width</button>
```

### **2. Cards**

```html
<!-- Basic Card -->
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Card Title</h5>
    </div>
    <div class="card-body">
        <p class="card-text">Card content goes here.</p>
        <button class="btn btn-primary">Action</button>
    </div>
    <div class="card-footer">
        Footer content
    </div>
</div>

<!-- Primary Card -->
<div class="card card-primary">
    <div class="card-body">
        <h5 class="card-title">Featured Service</h5>
        <p class="card-text">Description here.</p>
    </div>
</div>

<!-- Hover Effect Card -->
<div class="card hover-lift">
    <div class="card-body">
        <p>Hover me!</p>
    </div>
</div>
```

### **3. Forms**

```html
<!-- Form with Validation -->
<form data-validate>
    <div class="form-group">
        <label class="form-label" for="name">Name *</label>
        <input type="text" class="form-control" id="name" required>
    </div>
    
    <div class="form-group">
        <label class="form-label" for="email">Email *</label>
        <input type="email" class="form-control" id="email" required>
    </div>
    
    <div class="form-group">
        <label class="form-label" for="message">Message *</label>
        <textarea class="form-control" id="message" required></textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
```

### **4. Animations**

```html
<!-- Fade In Animation -->
<div class="animate-fade-in">
    Content fades in
</div>

<!-- Fade In Up with AOS -->
<div data-aos="fade-up">
    Animates when scrolling into view
</div>

<!-- Bounce Animation -->
<div class="animate-bounce">
    Bouncing element
</div>

<!-- Pulse Animation -->
<div class="animate-pulse">
    Pulsing element
</div>

<!-- Hover Effects -->
<div class="hover-lift">Lifts on hover</div>
<div class="hover-scale">Scales on hover</div>
<div class="hover-glow">Glows on hover</div>
```

### **5. Modals**

```html
<!-- Modal Trigger -->
<button class="btn btn-primary" data-modal-open="myModal">
    Open Modal
</button>

<!-- Modal -->
<div class="modal" id="myModal">
    <div class="modal-backdrop"></div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal Title</h5>
                <button class="btn-close" data-modal-close>&times;</button>
            </div>
            <div class="modal-body">
                <p>Modal content goes here.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-ghost" data-modal-close>Cancel</button>
                <button class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
```

### **6. Alerts**

```html
<!-- Show alert via JavaScript -->
<script>
    SITUNEO.showAlert('success', 'Operation successful!');
    SITUNEO.showAlert('error', 'Something went wrong');
    SITUNEO.showAlert('warning', 'Please be careful');
    SITUNEO.showAlert('info', 'Here is some information');
</script>
```

### **7. Utility Classes**

```html
<!-- Spacing -->
<div class="mt-4 mb-6 p-5">Margin top 4, margin bottom 6, padding 5</div>

<!-- Display -->
<div class="d-flex justify-center align-center gap-4">
    Flex container with center alignment and gap
</div>

<!-- Text -->
<p class="text-center text-primary fw-bold fs-xl">
    Centered, blue, bold, extra large text
</p>

<!-- Background -->
<div class="bg-gradient-primary text-white p-6 rounded-lg">
    Gradient background with padding and rounded corners
</div>

<!-- Shadows -->
<div class="shadow-lg hover-lift">
    Large shadow with hover lift effect
</div>
```

---

## 🎯 Component Library

### **Available Components:**
1. ✅ Buttons (9 variants)
2. ✅ Cards (5 variants)
3. ✅ Forms & Inputs
4. ✅ Alerts (4 types)
5. ✅ Badges (6 types)
6. ✅ Modals
7. ✅ Dropdowns
8. ✅ Navigation & Tabs
9. ✅ Tables (3 variants)
10. ✅ Pagination
11. ✅ Breadcrumbs
12. ✅ Progress Bars
13. ✅ Spinners
14. ✅ Tooltips

### **Available Animations:**
1. ✅ Fade (in/out/up/down/left/right)
2. ✅ Slide (up/down/left/right)
3. ✅ Zoom (in/out)
4. ✅ Bounce (in/regular)
5. ✅ Pulse & Heartbeat
6. ✅ Rotate & Spin
7. ✅ Shake
8. ✅ Glow (blue/gold)
9. ✅ Shimmer & Gradient
10. ✅ Float
11. ✅ Typing Effect
12. ✅ Skeleton Loading
13. ✅ Particle Effects
14. ✅ Wave Animation
15. ✅ Neon Effect

### **Available Utilities:**
1. ✅ Spacing (margin/padding)
2. ✅ Display (flex/grid/block/inline)
3. ✅ Colors (text/background)
4. ✅ Typography (size/weight/alignment)
5. ✅ Borders & Radius
6. ✅ Shadows
7. ✅ Opacity
8. ✅ Position
9. ✅ Overflow
10. ✅ Width & Height
11. ✅ Cursor
12. ✅ Transitions

---

## 📱 Responsive Design

### **Breakpoints:**
```css
/* Mobile First Approach */
/* Default: 0-639px (Mobile) */

@media (min-width: 640px)  { /* Small tablets */ }
@media (min-width: 768px)  { /* Tablets */ }
@media (min-width: 1024px) { /* Small desktops */ }
@media (min-width: 1280px) { /* Desktops */ }
@media (min-width: 1536px) { /* Large desktops */ }
```

### **Responsive Classes:**
```html
<!-- Hide on mobile, show on tablet+ -->
<div class="d-none d-md-block">Visible on tablet and up</div>

<!-- Show on mobile only -->
<div class="d-block d-md-none">Visible on mobile only</div>

<!-- Grid columns -->
<div class="grid-cols-1 grid-cols-md-2 grid-cols-lg-3">
    1 column mobile, 2 on tablet, 3 on desktop
</div>
```

---

## 🎨 Customization

### **Method 1: CSS Variables**
```css
/* Override in your custom CSS */
:root {
    --primary-blue: #YOUR_COLOR;
    --gold: #YOUR_COLOR;
    --font-primary: 'Your Font', sans-serif;
}
```

### **Method 2: Add Custom Classes**
```css
/* In your custom.css */
.my-custom-button {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 1rem 2rem;
    border-radius: 50px;
}
```

---

## ⚡ Performance

### **File Sizes:**
- variables.css: ~12 KB
- global.css: ~20 KB
- components.css: ~35 KB
- animations.css: ~25 KB
- main.js: ~15 KB
- **Total: ~107 KB** (uncompressed)
- **Total: ~25 KB** (gzipped)

### **Optimization Tips:**
1. ✅ Use CDN for external libraries
2. ✅ Enable GZIP compression
3. ✅ Minify CSS and JS for production
4. ✅ Use lazy loading for images
5. ✅ Enable browser caching

---

## 🔧 JavaScript API

### **Global Functions:**

```javascript
// Show alerts
SITUNEO.showAlert('success', 'Message', duration);

// Modals
SITUNEO.openModal(modalElement);
SITUNEO.closeModal(modalElement);

// Selectors
SITUNEO.$('.selector');   // querySelector
SITUNEO.$$('.selector');  // querySelectorAll

// Utilities
SITUNEO.debounce(func, wait);
SITUNEO.throttle(func, limit);
SITUNEO.ready(callback);
```

---

## 🐛 Troubleshooting

### **CSS not loading?**
- Check file paths are correct
- Ensure CSS files are loaded in correct order
- Clear browser cache

### **JavaScript not working?**
- Check console for errors
- Ensure jQuery/Bootstrap is loaded before main.js
- Verify CDN links are accessible

### **Animations not smooth?**
- Check if AOS is initialized
- Verify GSAP is loaded
- Test on different browsers

---

## 📚 External Libraries

### **Required:**
1. Bootstrap 5.3.3 (Grid + Components)
2. Bootstrap Icons 1.11.3 (Icons)
3. Google Fonts (Inter + Plus Jakarta Sans)

### **Optional (for advanced features):**
1. GSAP 3.12.5 (Advanced animations)
2. AOS 2.3.4 (Scroll animations)
3. Chart.js 4.4.1 (Charts/analytics)
4. Swiper 11.0.5 (Sliders)
5. Particles.js 2.0.0 (Particle effects)

See `vendor/cdn-config.js` for complete list and CDN links.

---

## ✅ Testing Checklist

### **Visual Testing:**
- [ ] Colors match design system
- [ ] Typography is consistent
- [ ] Spacing is correct
- [ ] Shadows render properly
- [ ] Gradients display correctly

### **Responsive Testing:**
- [ ] Mobile (320px-639px)
- [ ] Tablet (640px-1023px)
- [ ] Desktop (1024px+)

### **Browser Testing:**
- [ ] Chrome
- [ ] Firefox
- [ ] Safari
- [ ] Edge

### **Component Testing:**
- [ ] Buttons work and have hover states
- [ ] Forms validate correctly
- [ ] Modals open and close
- [ ] Dropdowns toggle
- [ ] Animations play smoothly

### **Performance Testing:**
- [ ] Page load < 3 seconds
- [ ] No console errors
- [ ] All assets load correctly

---

## 🎉 Next Steps

After Batch 2 is approved:
- **Batch 3**: HTML Structure & Templates
- **Batch 4**: Homepage Components
- **Batch 5**: Dashboard Layouts
- **Batch 6-20**: Remaining pages and features

---

## 📞 Support

- **Email**: vins@situneo.my.id
- **WhatsApp**: +62 831-7386-8915
- **Website**: https://situneo.my.id

---

## 📄 License

Copyright © 2025 SITUNEO DIGITAL. All rights reserved.

---

**🚀 Batch 2 Complete! Ready for integration with Batch 1 database and config!**
