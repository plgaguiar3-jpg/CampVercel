/**
 * Main JavaScript for Campanha Eleitoral Theme
 */

(function() {
    'use strict';

    /**
     * Menu Mobile Toggle
     */
    function initMobileMenu() {
        const header = document.querySelector('.site-header');
        const nav = document.querySelector('.site-navigation');
        
        if (!header || !nav) return;

        // Create mobile toggle button
        const toggleBtn = document.createElement('button');
        toggleBtn.className = 'mobile-menu-toggle';
        toggleBtn.setAttribute('aria-label', 'Menu');
        toggleBtn.innerHTML = '<span></span><span></span><span></span>';

        header.querySelector('.site-branding').appendChild(toggleBtn);

        toggleBtn.addEventListener('click', function() {
            nav.classList.toggle('active');
            toggleBtn.classList.toggle('active');
        });

        // Close menu on link click
        nav.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                nav.classList.remove('active');
                toggleBtn.classList.remove('active');
            });
        });
    }

    /**
     * Smooth Scroll for anchor links
     */
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href === '#') return;
                
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }

    /**
     * Lazy Load Images
     */
    function initLazyLoad() {
        const images = document.querySelectorAll('img[data-src]');
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                        observer.unobserve(img);
                    }
                });
            });

            images.forEach(img => imageObserver.observe(img));
        } else {
            // Fallback for older browsers
            images.forEach(img => {
                img.src = img.dataset.src;
                img.removeAttribute('data-src');
            });
        }
    }

    /**
     * Form Validation
     */
    function initFormValidation() {
        const forms = document.querySelectorAll('form');
        
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                const inputs = form.querySelectorAll('input[required], textarea[required]');
                let isValid = true;

                inputs.forEach(input => {
                    if (!input.value.trim()) {
                        input.classList.add('error');
                        isValid = false;
                    } else {
                        input.classList.remove('error');
                    }
                });

                if (!isValid) {
                    e.preventDefault();
                }
            });

            // Remove error class on input
            form.querySelectorAll('input, textarea').forEach(input => {
                input.addEventListener('focus', function() {
                    this.classList.remove('error');
                });
            });
        });
    }

    /**
     * Counter Animation
     */
    function animateCounters() {
        const counters = document.querySelectorAll('[data-count]');
        const options = {
            threshold: 0.5,
            rootMargin: '0px'
        };

        const counterObserver = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.dataset.count);
                    const duration = 2000;
                    const start = Date.now();

                    const animate = () => {
                        const progress = (Date.now() - start) / duration;
                        const value = Math.floor(target * progress);
                        counter.textContent = value.toLocaleString('pt-BR');

                        if (progress < 1) {
                            requestAnimationFrame(animate);
                        } else {
                            counter.textContent = target.toLocaleString('pt-BR');
                        }
                    };

                    animate();
                    counterObserver.unobserve(counter);
                }
            });
        }, options);

        counters.forEach(counter => counterObserver.observe(counter));
    }

    /**
     * Sticky Header
     */
    function initStickyHeader() {
        const header = document.querySelector('.site-header');
        if (!header) return;

        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }

    /**
     * FAQ Accordion Toggle
     */
    function initFAQToggle() {
        const faqToggles = document.querySelectorAll('.faq-toggle');
        
        faqToggles.forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                
                const faqItem = this.closest('.faq-item');
                const content = faqItem.querySelector('.faq-content');
                const isActive = content.classList.contains('active');
                
                // Close all other FAQs
                document.querySelectorAll('.faq-content.active').forEach(c => {
                    if (c !== content) {
                        c.classList.remove('active');
                        c.closest('.faq-item').querySelector('.faq-toggle').classList.remove('active');
                    }
                });
                
                // Toggle current FAQ
                if (!isActive) {
                    content.classList.add('active');
                    this.classList.add('active');
                } else {
                    content.classList.remove('active');
                    this.classList.remove('active');
                }
            });
        });
    }

    /**
     * Global toggleFAQ function for inline onclick handlers
     */
    window.toggleFAQ = function(button) {
        const faqItem = button.closest('.faq-item');
        const content = faqItem.querySelector('.faq-content');
        const isActive = content.classList.contains('active');
        
        // Close all other FAQs
        document.querySelectorAll('.faq-content.active').forEach(c => {
            if (c !== content) {
                c.classList.remove('active');
                c.closest('.faq-item').querySelector('.faq-toggle').classList.remove('active');
            }
        });
        
        // Toggle current FAQ
        if (!isActive) {
            content.classList.add('active');
            button.classList.add('active');
        } else {
            content.classList.remove('active');
            button.classList.remove('active');
        }
    };

    /**
     * Initialize all functions when DOM is ready
     */
    document.addEventListener('DOMContentLoaded', function() {
        initMobileMenu();
        initSmoothScroll();
        initLazyLoad();
        initFormValidation();
        animateCounters();
        initStickyHeader();
        initFAQToggle();
    });

    /**
     * Back to top button
     */
    window.addEventListener('scroll', function() {
        const scrollTop = window.scrollY;
        if (scrollTop > 300) {
            if (!document.querySelector('.back-to-top')) {
                const backToTop = document.createElement('button');
                backToTop.className = 'back-to-top';
                backToTop.innerHTML = '↑';
                backToTop.setAttribute('aria-label', 'Voltar ao topo');
                document.body.appendChild(backToTop);

                backToTop.addEventListener('click', () => {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            }
        } else {
            const btn = document.querySelector('.back-to-top');
            if (btn) btn.remove();
        }
    });
})();
