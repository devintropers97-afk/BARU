/**
 * SITUNEO DIGITAL - Main JavaScript
 * Core utilities and functions
 * Version: 2.0.0
 */

(function () {
  'use strict';

  /**
   * ===== UTILITY FUNCTIONS =====
   */

  // Debounce function
  function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
      const later = () => {
        clearTimeout(timeout);
        func(...args);
      };
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
    };
  }

  // Throttle function
  function throttle(func, limit) {
    let inThrottle;
    return function (...args) {
      if (!inThrottle) {
        func.apply(this, args);
        inThrottle = true;
        setTimeout(() => (inThrottle = false), limit);
      }
    };
  }

  // Get element(s)
  const $ = (selector) => document.querySelector(selector);
  const $$ = (selector) => document.querySelectorAll(selector);

  // Wait for DOM ready
  function ready(fn) {
    if (document.readyState !== 'loading') {
      fn();
    } else {
      document.addEventListener('DOMContentLoaded', fn);
    }
  }

  /**
   * ===== SMOOTH SCROLLING =====
   */
  function initSmoothScroll() {
    // Smooth scroll for anchor links
    $$('a[href^="#"]').forEach((anchor) => {
      anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href === '#' || href === '') return;

        const target = $(href);
        if (target) {
          e.preventDefault();
          const headerOffset = 80;
          const elementPosition = target.getBoundingClientRect().top;
          const offsetPosition =
            elementPosition + window.pageYOffset - headerOffset;

          window.scrollTo({
            top: offsetPosition,
            behavior: 'smooth',
          });

          // Update URL without jumping
          history.pushState(null, null, href);
        }
      });
    });
  }

  /**
   * ===== NAVIGATION =====
   */
  function initNavigation() {
    const navbar = $('.navbar');
    const mobileToggle = $('.mobile-toggle');
    const navMenu = $('.nav-menu');
    const body = document.body;

    if (!navbar) return;

    // Sticky navbar on scroll
    const handleScroll = () => {
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    };

    window.addEventListener('scroll', throttle(handleScroll, 100));
    handleScroll(); // Initial check

    // Mobile menu toggle
    if (mobileToggle && navMenu) {
      mobileToggle.addEventListener('click', () => {
        navMenu.classList.toggle('active');
        mobileToggle.classList.toggle('active');
        body.classList.toggle('menu-open');
      });

      // Close menu when clicking outside
      document.addEventListener('click', (e) => {
        if (
          !navMenu.contains(e.target) &&
          !mobileToggle.contains(e.target) &&
          navMenu.classList.contains('active')
        ) {
          navMenu.classList.remove('active');
          mobileToggle.classList.remove('active');
          body.classList.remove('menu-open');
        }
      });

      // Close menu on link click
      $$('.nav-menu a').forEach((link) => {
        link.addEventListener('click', () => {
          navMenu.classList.remove('active');
          mobileToggle.classList.remove('active');
          body.classList.remove('menu-open');
        });
      });
    }

    // Active nav link on scroll
    const sections = $$('section[id]');
    const navLinks = $$('.nav-link');

    const highlightNav = () => {
      const scrollY = window.pageYOffset;

      sections.forEach((section) => {
        const sectionHeight = section.offsetHeight;
        const sectionTop = section.offsetTop - 100;
        const sectionId = section.getAttribute('id');

        if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
          navLinks.forEach((link) => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${sectionId}`) {
              link.classList.add('active');
            }
          });
        }
      });
    };

    window.addEventListener('scroll', throttle(highlightNav, 100));
  }

  /**
   * ===== FORM VALIDATION =====
   */
  function initFormValidation() {
    const forms = $$('form[data-validate]');

    forms.forEach((form) => {
      form.addEventListener('submit', function (e) {
        e.preventDefault();

        // Remove previous errors
        $$('.is-invalid', form).forEach((el) =>
          el.classList.remove('is-invalid')
        );
        $$('.invalid-feedback', form).forEach((el) => el.remove());

        let isValid = true;

        // Validate required fields
        $$('[required]', form).forEach((field) => {
          if (!field.value.trim()) {
            showError(field, 'Field ini wajib diisi');
            isValid = false;
          }
        });

        // Validate email
        $$('[type="email"]', form).forEach((field) => {
          if (field.value && !isValidEmail(field.value)) {
            showError(field, 'Email tidak valid');
            isValid = false;
          }
        });

        // Validate phone
        $$('[type="tel"]', form).forEach((field) => {
          if (field.value && !isValidPhone(field.value)) {
            showError(field, 'Nomor telepon tidak valid');
            isValid = false;
          }
        });

        // Validate URL
        $$('[type="url"]', form).forEach((field) => {
          if (field.value && !isValidUrl(field.value)) {
            showError(field, 'URL tidak valid');
            isValid = false;
          }
        });

        // If valid, submit form
        if (isValid) {
          if (form.hasAttribute('data-ajax')) {
            submitFormAjax(form);
          } else {
            form.submit();
          }
        }
      });
    });
  }

  function showError(field, message) {
    field.classList.add('is-invalid');
    const error = document.createElement('div');
    error.className = 'invalid-feedback';
    error.textContent = message;
    field.parentElement.appendChild(error);
  }

  function isValidEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
  }

  function isValidPhone(phone) {
    const re = /^[\d\s\-\+\(\)]+$/;
    return re.test(phone) && phone.replace(/\D/g, '').length >= 10;
  }

  function isValidUrl(url) {
    try {
      new URL(url);
      return true;
    } catch {
      return false;
    }
  }

  function submitFormAjax(form) {
    const formData = new FormData(form);
    const url = form.getAttribute('action') || window.location.href;
    const submitBtn = $('button[type="submit"]', form);

    // Show loading state
    if (submitBtn) {
      submitBtn.disabled = true;
      submitBtn.innerHTML =
        '<span class="spinner spinner-sm"></span> Mengirim...';
    }

    fetch(url, {
      method: 'POST',
      body: formData,
      headers: {
        'X-Requested-With': 'XMLHttpRequest',
      },
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          showAlert('success', data.message || 'Berhasil!');
          form.reset();
        } else {
          showAlert('error', data.message || 'Terjadi kesalahan');
        }
      })
      .catch((error) => {
        console.error('Error:', error);
        showAlert('error', 'Terjadi kesalahan jaringan');
      })
      .finally(() => {
        if (submitBtn) {
          submitBtn.disabled = false;
          submitBtn.innerHTML = submitBtn.getAttribute('data-original-text') || 'Kirim';
        }
      });
  }

  /**
   * ===== ALERTS & NOTIFICATIONS =====
   */
  function showAlert(type, message, duration = 5000) {
    const alertContainer = $('#alert-container') || createAlertContainer();
    const alert = document.createElement('div');
    alert.className = `alert alert-${type} alert-dismissible animate-slide-in-down`;
    alert.innerHTML = `
      ${message}
      <button type="button" class="btn-close" data-dismiss="alert">&times;</button>
    `;

    alertContainer.appendChild(alert);

    // Auto dismiss
    setTimeout(() => {
      alert.classList.add('animate-fade-out');
      setTimeout(() => alert.remove(), 300);
    }, duration);

    // Manual dismiss
    $('.btn-close', alert).addEventListener('click', () => {
      alert.classList.add('animate-fade-out');
      setTimeout(() => alert.remove(), 300);
    });
  }

  function createAlertContainer() {
    const container = document.createElement('div');
    container.id = 'alert-container';
    container.style.cssText = `
      position: fixed;
      top: 20px;
      right: 20px;
      z-index: 9999;
      max-width: 400px;
    `;
    document.body.appendChild(container);
    return container;
  }

  /**
   * ===== MODALS =====
   */
  function initModals() {
    // Open modal
    $$('[data-modal-open]').forEach((trigger) => {
      trigger.addEventListener('click', function (e) {
        e.preventDefault();
        const modalId = this.getAttribute('data-modal-open');
        const modal = $(`#${modalId}`);
        if (modal) {
          openModal(modal);
        }
      });
    });

    // Close modal
    $$('[data-modal-close]').forEach((trigger) => {
      trigger.addEventListener('click', function () {
        const modal = this.closest('.modal');
        if (modal) {
          closeModal(modal);
        }
      });
    });

    // Close on backdrop click
    $$('.modal').forEach((modal) => {
      modal.addEventListener('click', function (e) {
        if (e.target === this) {
          closeModal(this);
        }
      });
    });

    // Close on Escape key
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') {
        const openModal = $('.modal.show');
        if (openModal) {
          closeModal(openModal);
        }
      }
    });
  }

  function openModal(modal) {
    modal.classList.add('show');
    document.body.style.overflow = 'hidden';
  }

  function closeModal(modal) {
    modal.classList.remove('show');
    document.body.style.overflow = '';
  }

  /**
   * ===== DROPDOWNS =====
   */
  function initDropdowns() {
    $$('[data-dropdown-toggle]').forEach((toggle) => {
      toggle.addEventListener('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        const dropdownId = this.getAttribute('data-dropdown-toggle');
        const dropdown = $(`#${dropdownId}`);

        if (dropdown) {
          // Close other dropdowns
          $$('.dropdown-menu.show').forEach((menu) => {
            if (menu !== dropdown) {
              menu.classList.remove('show');
            }
          });

          dropdown.classList.toggle('show');
        }
      });
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', () => {
      $$('.dropdown-menu.show').forEach((menu) => {
        menu.classList.remove('show');
      });
    });
  }

  /**
   * ===== TABS =====
   */
  function initTabs() {
    $$('[data-tab]').forEach((tab) => {
      tab.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute('data-tab');
        const target = $(`#${targetId}`);

        if (!target) return;

        // Remove active from all tabs and contents
        const tabGroup = this.closest('.nav-tabs, .nav');
        $$('.nav-link', tabGroup).forEach((link) =>
          link.classList.remove('active')
        );
        $$('.tab-pane').forEach((pane) => pane.classList.remove('active'));

        // Add active to current
        this.classList.add('active');
        target.classList.add('active');
      });
    });
  }

  /**
   * ===== SCROLL TO TOP =====
   */
  function initScrollToTop() {
    const btn = $('#scroll-to-top');
    if (!btn) return;

    const toggleBtn = () => {
      if (window.scrollY > 300) {
        btn.classList.add('show');
      } else {
        btn.classList.remove('show');
      }
    };

    window.addEventListener('scroll', throttle(toggleBtn, 100));

    btn.addEventListener('click', () => {
      window.scrollTo({
        top: 0,
        behavior: 'smooth',
      });
    });
  }

  /**
   * ===== LAZY LOADING IMAGES =====
   */
  function initLazyLoading() {
    const images = $$('img[data-src]');

    if ('IntersectionObserver' in window) {
      const imageObserver = new IntersectionObserver(
        (entries, observer) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              const img = entry.target;
              img.src = img.dataset.src;
              img.classList.add('loaded');
              observer.unobserve(img);
            }
          });
        },
        {
          rootMargin: '50px',
        }
      );

      images.forEach((img) => imageObserver.observe(img));
    } else {
      // Fallback for older browsers
      images.forEach((img) => {
        img.src = img.dataset.src;
        img.classList.add('loaded');
      });
    }
  }

  /**
   * ===== COPY TO CLIPBOARD =====
   */
  function initCopyToClipboard() {
    $$('[data-copy]').forEach((btn) => {
      btn.addEventListener('click', function () {
        const text = this.getAttribute('data-copy');
        navigator.clipboard.writeText(text).then(() => {
          showAlert('success', 'Copied to clipboard!', 2000);
        });
      });
    });
  }

  /**
   * ===== TOOLTIPS =====
   */
  function initTooltips() {
    $$('[data-tooltip]').forEach((el) => {
      el.addEventListener('mouseenter', function () {
        const text = this.getAttribute('data-tooltip');
        const tooltip = document.createElement('div');
        tooltip.className = 'tooltip show';
        tooltip.innerHTML = `<div class="tooltip-inner">${text}</div>`;
        document.body.appendChild(tooltip);

        const rect = this.getBoundingClientRect();
        tooltip.style.top = `${rect.top - tooltip.offsetHeight - 5}px`;
        tooltip.style.left = `${
          rect.left + rect.width / 2 - tooltip.offsetWidth / 2
        }px`;

        this._tooltip = tooltip;
      });

      el.addEventListener('mouseleave', function () {
        if (this._tooltip) {
          this._tooltip.remove();
          this._tooltip = null;
        }
      });
    });
  }

  /**
   * ===== COUNTER ANIMATION =====
   */
  function initCounters() {
    const counters = $$('[data-counter]');

    const animateCounter = (counter) => {
      const target = parseInt(counter.getAttribute('data-counter'));
      const duration = parseInt(counter.getAttribute('data-duration')) || 2000;
      const step = target / (duration / 16);
      let current = 0;

      const updateCounter = () => {
        current += step;
        if (current < target) {
          counter.textContent = Math.ceil(current);
          requestAnimationFrame(updateCounter);
        } else {
          counter.textContent = target;
        }
      };

      updateCounter();
    };

    if ('IntersectionObserver' in window) {
      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              animateCounter(entry.target);
              observer.unobserve(entry.target);
            }
          });
        },
        { threshold: 0.5 }
      );

      counters.forEach((counter) => observer.observe(counter));
    }
  }

  /**
   * ===== INITIALIZE ALL =====
   */
  ready(() => {
    initSmoothScroll();
    initNavigation();
    initFormValidation();
    initModals();
    initDropdowns();
    initTabs();
    initScrollToTop();
    initLazyLoading();
    initCopyToClipboard();
    initTooltips();
    initCounters();

    // Add loaded class to body
    document.body.classList.add('loaded');
  });

  // Export utilities to window
  window.SITUNEO = {
    ready,
    showAlert,
    openModal,
    closeModal,
    debounce,
    throttle,
    $,
    $$,
  };
})();
