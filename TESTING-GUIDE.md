# SITUNEO DIGITAL - BATCH 2 TESTING GUIDE

## 🧪 Testing Procedures

This guide will help you test all components, styles, and utilities in Batch 2.

---

## ✅ PRE-TESTING SETUP

### **1. Create Test HTML File**

Create a file named `test-batch-2.html` in your website root:

```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SITUNEO BATCH 2 - Test Page</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/variables.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <link rel="stylesheet" href="assets/css/animations.css">
</head>
<body>
    
    <div class="container my-6">
        <h1 class="text-center mb-6">SITUNEO BATCH 2 - Test Page</h1>
        
        <!-- Add test sections here -->
    </div>
    
    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- GSAP -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    
    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    
    <!-- Custom JavaScript -->
    <script src="assets/js/main.js"></script>
    
    <!-- Initialize -->
    <script>
        AOS.init({ duration: 800, once: true });
    </script>
</body>
</html>
```

### **2. Access the Test Page**

Open in browser:
- Local: `http://localhost/test-batch-2.html`
- cPanel: `https://situneo.my.id/test-batch-2.html`

---

## 🧪 TEST PROCEDURES

### **TEST 1: CSS Variables Loading**

**Purpose:** Verify all CSS variables are loaded correctly.

**Steps:**
1. Add this to your test page body:

```html
<section id="test-variables" class="py-6">
    <h2>Test 1: CSS Variables</h2>
    
    <!-- Test Colors -->
    <div class="d-flex gap-3 mb-4">
        <div style="width: 100px; height: 100px; background-color: var(--primary-blue);"></div>
        <div style="width: 100px; height: 100px; background-color: var(--primary-blue-dark);"></div>
        <div style="width: 100px; height: 100px; background-color: var(--gold);"></div>
        <div style="width: 100px; height: 100px; background-color: var(--gold-bright);"></div>
    </div>
    
    <!-- Test Typography -->
    <div class="mb-4">
        <p style="font-family: var(--font-primary);">Inter Font (Body)</p>
        <h3 style="font-family: var(--font-heading);">Plus Jakarta Sans (Heading)</h3>
    </div>
</section>
```

2. Open in browser
3. Check DevTools Console for errors
4. Verify colors display correctly (blue and gold boxes)
5. Verify fonts load (should look different from default)

**Expected Result:**
- ✅ 4 colored boxes visible (2 blue, 2 gold)
- ✅ Fonts render correctly
- ✅ No console errors

---

### **TEST 2: Buttons**

**Steps:**
1. Add this section:

```html
<section id="test-buttons" class="py-6">
    <h2>Test 2: Buttons</h2>
    
    <div class="d-flex flex-wrap gap-3 mb-4">
        <button class="btn btn-primary">Primary</button>
        <button class="btn btn-gold">Gold</button>
        <button class="btn btn-outline-primary">Outline</button>
        <button class="btn btn-white">White</button>
        <button class="btn btn-ghost">Ghost</button>
    </div>
    
    <div class="d-flex flex-wrap gap-3 mb-4">
        <button class="btn btn-primary btn-sm">Small</button>
        <button class="btn btn-primary">Normal</button>
        <button class="btn btn-primary btn-lg">Large</button>
        <button class="btn btn-primary btn-xl">Extra Large</button>
    </div>
    
    <div class="mb-4">
        <button class="btn btn-primary btn-rounded">Rounded Button</button>
    </div>
</section>
```

2. Test each button:
   - [ ] Click each button
   - [ ] Hover over each button
   - [ ] Check hover effects (lift, shadow, color change)
   - [ ] Verify all sizes render correctly

**Expected Result:**
- ✅ All buttons clickable
- ✅ Hover effects work (transform, shadow)
- ✅ Colors match design (blue, gold)
- ✅ Sizes are proportional

---

### **TEST 3: Cards**

**Steps:**
1. Add this section:

```html
<section id="test-cards" class="py-6">
    <h2>Test 3: Cards</h2>
    
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Basic Card</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">This is a basic card with header and body.</p>
                    <button class="btn btn-primary btn-sm">Action</button>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-body">
                    <h5 class="card-title">Primary Card</h5>
                    <p class="card-text">This card has primary gradient background.</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card hover-lift">
                <div class="card-body">
                    <h5 class="card-title">Hover Card</h5>
                    <p class="card-text">Hover to see lift effect.</p>
                </div>
            </div>
        </div>
    </div>
</section>
```

2. Test:
   - [ ] Hover over cards
   - [ ] Check lift effect on 3rd card
   - [ ] Verify colors on primary card
   - [ ] Check shadows

**Expected Result:**
- ✅ Cards display correctly
- ✅ Hover lift works
- ✅ Primary card has blue gradient
- ✅ Shadows visible

---

### **TEST 4: Forms & Validation**

**Steps:**
1. Add this section:

```html
<section id="test-forms" class="py-6">
    <h2>Test 4: Forms</h2>
    
    <form data-validate class="mb-4" style="max-width: 500px;">
        <div class="form-group">
            <label class="form-label" for="test-name">Name *</label>
            <input type="text" class="form-control" id="test-name" required>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="test-email">Email *</label>
            <input type="email" class="form-control" id="test-email" required>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="test-phone">Phone</label>
            <input type="tel" class="form-control" id="test-phone">
        </div>
        
        <div class="form-group">
            <label class="form-label" for="test-message">Message *</label>
            <textarea class="form-control" id="test-message" required></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</section>
```

2. Test validation:
   - [ ] Submit empty form (should show errors)
   - [ ] Fill name only, submit (email error)
   - [ ] Enter invalid email (validation error)
   - [ ] Fill all correctly (should work)
   - [ ] Check focus states (blue border)

**Expected Result:**
- ✅ Empty fields show "wajib diisi"
- ✅ Invalid email shows "Email tidak valid"
- ✅ Focus has blue border + shadow
- ✅ Valid form can submit

---

### **TEST 5: Modals**

**Steps:**
1. Add this section:

```html
<section id="test-modals" class="py-6">
    <h2>Test 5: Modals</h2>
    
    <button class="btn btn-primary" data-modal-open="testModal">Open Modal</button>
    
    <div class="modal" id="testModal">
        <div class="modal-backdrop"></div>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Test Modal</h5>
                    <button class="btn-close" data-modal-close>&times;</button>
                </div>
                <div class="modal-body">
                    <p>This is a test modal. Try closing it with:</p>
                    <ul>
                        <li>X button</li>
                        <li>Cancel button</li>
                        <li>Click outside</li>
                        <li>ESC key</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-ghost" data-modal-close>Cancel</button>
                    <button class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</section>
```

2. Test modal:
   - [ ] Click "Open Modal" button
   - [ ] Modal appears with backdrop
   - [ ] Close with X button
   - [ ] Open again, close with Cancel
   - [ ] Open again, click outside modal
   - [ ] Open again, press ESC key

**Expected Result:**
- ✅ Modal opens smoothly
- ✅ Backdrop visible (blurred background)
- ✅ All 4 close methods work
- ✅ Body scroll disabled when open

---

### **TEST 6: Animations**

**Steps:**
1. Add this section:

```html
<section id="test-animations" class="py-6">
    <h2>Test 6: Animations</h2>
    
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card animate-fade-in-up">
                <div class="card-body text-center">
                    <p>Fade In Up</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card animate-bounce-in">
                <div class="card-body text-center">
                    <p>Bounce In</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card animate-pulse">
                <div class="card-body text-center">
                    <p>Pulse</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card hover-lift">
                <div class="card-body text-center">
                    <p>Hover Lift</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- AOS Animations -->
    <div class="row g-4">
        <div class="col-md-3">
            <div class="card" data-aos="fade-up">
                <div class="card-body text-center">
                    <p>AOS Fade Up</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card" data-aos="fade-left">
                <div class="card-body text-center">
                    <p>AOS Fade Left</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card" data-aos="zoom-in">
                <div class="card-body text-center">
                    <p>AOS Zoom In</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card" data-aos="flip-left">
                <div class="card-body text-center">
                    <p>AOS Flip</p>
                </div>
            </div>
        </div>
    </div>
</section>
```

2. Test animations:
   - [ ] Refresh page to see load animations
   - [ ] Scroll down to see AOS animations
   - [ ] Hover over "Hover Lift" card
   - [ ] Check pulse animation (continuous)

**Expected Result:**
- ✅ Load animations play on page load
- ✅ AOS animations trigger on scroll
- ✅ Hover lift works smoothly
- ✅ Pulse animation loops

---

### **TEST 7: Alerts & Notifications**

**Steps:**
1. Add this section:

```html
<section id="test-alerts" class="py-6">
    <h2>Test 7: Alerts</h2>
    
    <div class="d-flex gap-3 mb-4">
        <button class="btn btn-primary" onclick="SITUNEO.showAlert('success', 'Success! Operation completed.')">
            Success Alert
        </button>
        <button class="btn btn-warning" onclick="SITUNEO.showAlert('warning', 'Warning! Please be careful.')">
            Warning Alert
        </button>
        <button class="btn btn-danger" onclick="SITUNEO.showAlert('error', 'Error! Something went wrong.')">
            Error Alert
        </button>
        <button class="btn btn-info" onclick="SITUNEO.showAlert('info', 'Info: Here is some information.')">
            Info Alert
        </button>
    </div>
    
    <!-- Static Alerts -->
    <div class="alert alert-success alert-dismissible">
        Static success alert
        <button class="btn-close" data-dismiss="alert">&times;</button>
    </div>
</section>
```

2. Test:
   - [ ] Click each button
   - [ ] Verify alert appears in top-right
   - [ ] Check alert auto-dismisses after 5s
   - [ ] Click X to manually dismiss
   - [ ] Test static alert dismiss

**Expected Result:**
- ✅ Alerts appear in top-right corner
- ✅ Correct colors (green, yellow, red, blue)
- ✅ Auto-dismiss works
- ✅ Manual dismiss works
- ✅ Animation smooth (slide in/out)

---

### **TEST 8: Responsive Design**

**Steps:**
1. Open DevTools (F12)
2. Click "Toggle Device Toolbar" (Ctrl+Shift+M)
3. Test these sizes:
   - [ ] iPhone SE (375px)
   - [ ] iPad (768px)
   - [ ] Desktop (1280px)
   - [ ] Large Desktop (1920px)

4. Check:
   - [ ] Text is readable at all sizes
   - [ ] Buttons don't overflow
   - [ ] Cards stack on mobile
   - [ ] Spacing adjusts properly

**Expected Result:**
- ✅ All content visible at 375px
- ✅ No horizontal scroll
- ✅ Touch targets ≥44px on mobile
- ✅ Readable text (min 14px)

---

### **TEST 9: JavaScript Functions**

**Steps:**
1. Open DevTools Console (F12)
2. Test each function:

```javascript
// Test selector
console.log(SITUNEO.$('body')); // Should return body element
console.log(SITUNEO.$$('button')); // Should return all buttons

// Test alerts
SITUNEO.showAlert('success', 'Test alert');

// Test utilities
const debouncedFn = SITUNEO.debounce(() => console.log('Debounced'), 1000);
const throttledFn = SITUNEO.throttle(() => console.log('Throttled'), 1000);

// Test modals
const modal = SITUNEO.$('#testModal');
SITUNEO.openModal(modal);
setTimeout(() => SITUNEO.closeModal(modal), 2000);
```

3. Check:
   - [ ] No console errors
   - [ ] Selectors return elements
   - [ ] Alert appears
   - [ ] Modal opens/closes
   - [ ] Debounce/throttle work

**Expected Result:**
- ✅ All functions execute
- ✅ No errors in console
- ✅ SITUNEO object accessible
- ✅ Functions return expected values

---

### **TEST 10: Performance**

**Steps:**
1. Open DevTools > Network tab
2. Hard refresh (Ctrl+Shift+R)
3. Check:
   - [ ] Total page size
   - [ ] Load time
   - [ ] Number of requests
   - [ ] Any failed requests

4. Open DevTools > Lighthouse
5. Run audit for:
   - [ ] Performance
   - [ ] Accessibility
   - [ ] Best Practices

**Expected Result:**
- ✅ Page load < 3 seconds
- ✅ Total size < 2MB
- ✅ No failed requests
- ✅ Performance score > 80
- ✅ Accessibility score > 90

---

## 📊 TEST RESULTS TEMPLATE

```
SITUNEO BATCH 2 - TEST RESULTS
Date: _______________
Tester: _____________

TEST 1: CSS Variables
Status: [ ] PASS [ ] FAIL
Notes: _____________________

TEST 2: Buttons
Status: [ ] PASS [ ] FAIL
Notes: _____________________

TEST 3: Cards
Status: [ ] PASS [ ] FAIL
Notes: _____________________

TEST 4: Forms & Validation
Status: [ ] PASS [ ] FAIL
Notes: _____________________

TEST 5: Modals
Status: [ ] PASS [ ] FAIL
Notes: _____________________

TEST 6: Animations
Status: [ ] PASS [ ] FAIL
Notes: _____________________

TEST 7: Alerts
Status: [ ] PASS [ ] FAIL
Notes: _____________________

TEST 8: Responsive Design
Status: [ ] PASS [ ] FAIL
Notes: _____________________

TEST 9: JavaScript Functions
Status: [ ] PASS [ ] FAIL
Notes: _____________________

TEST 10: Performance
Status: [ ] PASS [ ] FAIL
Notes: _____________________

OVERALL STATUS: [ ] APPROVED [ ] NEEDS REVISION

Revisions Needed:
1. _____________________
2. _____________________
3. _____________________
```

---

## 🐛 Common Issues & Solutions

### **Issue 1: CSS not loading**
**Solution:**
- Check file paths
- Clear browser cache (Ctrl+Shift+Delete)
- Check server MIME types

### **Issue 2: Fonts not displaying**
**Solution:**
- Verify Google Fonts link in <head>
- Check internet connection
- Use fallback fonts

### **Issue 3: JavaScript errors**
**Solution:**
- Check if jQuery/Bootstrap loaded first
- Look for typos in function calls
- Verify CDN links accessible

### **Issue 4: Animations not smooth**
**Solution:**
- Check if AOS initialized
- Reduce motion for older devices
- Test in different browsers

### **Issue 5: Modal not closing**
**Solution:**
- Check if main.js loaded
- Verify data attributes correct
- Check console for errors

---

## ✅ APPROVAL CHECKLIST

Before approving Batch 2, verify:

**Visual:**
- [ ] All colors match design system
- [ ] Typography consistent
- [ ] Spacing correct
- [ ] Shadows render properly

**Functionality:**
- [ ] All buttons clickable
- [ ] Forms validate
- [ ] Modals work
- [ ] Animations smooth

**Responsive:**
- [ ] Mobile (375px) works
- [ ] Tablet (768px) works
- [ ] Desktop (1280px+) works

**Performance:**
- [ ] Page load < 3s
- [ ] No console errors
- [ ] All assets load

**Code Quality:**
- [ ] Clean code
- [ ] Well commented
- [ ] Following standards

---

## 📞 Report Issues

If you find any bugs or issues:

1. **Take screenshot** of the issue
2. **Note browser** and device
3. **Describe steps** to reproduce
4. **Send to**: vins@situneo.my.id

Or WhatsApp: +62 831-7386-8915

---

**✅ Happy Testing! Semoga semua test PASS!** 🚀
