/**
 * Fátima Gavioli - Campanha 2026
 * Main JavaScript
 */

(function () {
  'use strict';

  /* ==========================================
     Mobile menu toggle
     ========================================== */
  const toggle = document.getElementById('navbar-toggle');
  const mobileMenu = document.getElementById('navbar-mobile');

  if (toggle && mobileMenu) {
    const iconMenu = toggle.querySelector('.icon-menu');
    const iconClose = toggle.querySelector('.icon-close');

    toggle.addEventListener('click', function () {
      const isOpen = mobileMenu.classList.toggle('open');
      toggle.setAttribute('aria-expanded', isOpen);

      if (iconMenu && iconClose) {
        iconMenu.style.display = isOpen ? 'none' : '';
        iconClose.style.display = isOpen ? '' : 'none';
      }
    });

    // Close mobile menu on link click
    mobileMenu.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        mobileMenu.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
        if (iconMenu && iconClose) {
          iconMenu.style.display = '';
          iconClose.style.display = 'none';
        }
      });
    });
  }

  /* ==========================================
     Smooth scroll for anchor links
     ========================================== */
  document.querySelectorAll('a[href*="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      var href = this.getAttribute('href');
      if (!href || href === '#') return;

      var parsedUrl;
      try {
        parsedUrl = new URL(href, window.location.href);
      } catch (err) {
        return;
      }

      // Only intercept same-page hash links; keep default behavior for other pages.
      if (
        parsedUrl.origin !== window.location.origin ||
        parsedUrl.pathname.replace(/\/+$/, '') !== window.location.pathname.replace(/\/+$/, '') ||
        !parsedUrl.hash
      ) {
        return;
      }

      var targetId = parsedUrl.hash;

      var target = document.querySelector(targetId);
      if (target) {
        e.preventDefault();
        var navHeight = 64;
        var top = target.getBoundingClientRect().top + window.pageYOffset - navHeight;
        window.scrollTo({ top: top, behavior: 'smooth' });
      }
    });
  });

  /* ==========================================
     Intersection Observer — reveal animations
     ========================================== */
  var revealElements = document.querySelectorAll('.reveal');

  if ('IntersectionObserver' in window && revealElements.length) {
    var observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.15 }
    );

    revealElements.forEach(function (el) {
      observer.observe(el);
    });
  } else {
    // Fallback: show all elements
    revealElements.forEach(function (el) {
      el.classList.add('visible');
    });
  }

  /* ==========================================
     Contact form AJAX
     ========================================== */
  var form = document.getElementById('gavioli-contact-form');

  if (form && typeof gavioliAjax !== 'undefined') {
    form.addEventListener('submit', function (e) {
      e.preventDefault();

      var nameField = form.querySelector('[name="name"]');
      var emailField = form.querySelector('[name="email"]');
      var messageField = form.querySelector('[name="message"]');
      var msgContainer = document.getElementById('form-message');

      if (!nameField || !emailField || !messageField) return;

      var data = new FormData();
      data.append('action', 'gavioli_contact');
      data.append('nonce', gavioliAjax.nonce);
      data.append('name', nameField.value);
      data.append('email', emailField.value);
      data.append('message', messageField.value);

      var submitBtn = form.querySelector('.form-submit');
      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.textContent = 'Enviando...';
      }

      fetch(gavioliAjax.ajaxurl, {
        method: 'POST',
        credentials: 'same-origin',
        body: data,
      })
        .then(function (response) {
          return response.json();
        })
        .then(function (result) {
          if (msgContainer) {
            msgContainer.className = 'form-message ' + (result.success ? 'success' : 'error');
            msgContainer.textContent = result.data.message;
          }

          if (result.success) {
            form.reset();
            showToast('Mensagem enviada!', 'Agradecemos seu contato. Responderemos em breve.');
          }
        })
        .catch(function () {
          if (msgContainer) {
            msgContainer.className = 'form-message error';
            msgContainer.textContent = 'Erro ao enviar. Tente novamente.';
          }
        })
        .finally(function () {
          if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.textContent = 'Enviar Mensagem';
          }
        });
    });
  }

  /* ==========================================
     Gallery lightbox
     ========================================== */
  var galleryImages = document.querySelectorAll('#galeria .gallery-item img, #galeria .wp-block-gallery img, #galeria .wp-block-image img');

  if (galleryImages.length) {
    var lightbox = document.createElement('div');
    lightbox.className = 'gallery-lightbox';
    lightbox.setAttribute('aria-hidden', 'true');
    lightbox.innerHTML =
      '<button type="button" class="gallery-lightbox-close" aria-label="Fechar imagem">&times;</button>' +
      '<img class="gallery-lightbox-image" alt="">';

    document.body.appendChild(lightbox);

    var lightboxImage = lightbox.querySelector('.gallery-lightbox-image');
    var closeButton = lightbox.querySelector('.gallery-lightbox-close');

    function openLightbox(src, alt) {
      if (!src || !lightboxImage) return;
      lightboxImage.src = src;
      lightboxImage.alt = alt || '';
      lightbox.classList.add('open');
      lightbox.setAttribute('aria-hidden', 'false');
      document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
      if (!lightboxImage) return;
      lightbox.classList.remove('open');
      lightbox.setAttribute('aria-hidden', 'true');
      lightboxImage.src = '';
      document.body.style.overflow = '';
    }

    galleryImages.forEach(function (img) {
      img.style.cursor = 'zoom-in';
      img.addEventListener('click', function (event) {
        event.preventDefault();
        event.stopPropagation();

        var parentLink = img.closest('a');
        var fullSrc = (parentLink && parentLink.getAttribute('href')) || img.currentSrc || img.src;
        openLightbox(fullSrc, img.getAttribute('alt'));
      });
    });

    if (closeButton) {
      closeButton.addEventListener('click', closeLightbox);
    }

    lightbox.addEventListener('click', function (event) {
      if (event.target === lightbox) {
        closeLightbox();
      }
    });

    document.addEventListener('keydown', function (event) {
      if (event.key === 'Escape' && lightbox.classList.contains('open')) {
        closeLightbox();
      }
    });
  }

  /* ==========================================
     Toast notification helper
     ========================================== */
  function showToast(title, description) {
    var container = document.getElementById('toast-container');
    if (!container) return;

    var toast = document.createElement('div');
    toast.className = 'toast';
    toast.innerHTML =
      '<div class="toast-title">' + escapeHtml(title) + '</div>' +
      '<div class="toast-desc">' + escapeHtml(description) + '</div>';

    container.appendChild(toast);

    setTimeout(function () {
      toast.style.opacity = '0';
      toast.style.transition = 'opacity 0.3s';
      setTimeout(function () {
        if (toast.parentNode) toast.parentNode.removeChild(toast);
      }, 300);
    }, 4000);
  }

  function escapeHtml(str) {
    var div = document.createElement('div');
    div.appendChild(document.createTextNode(str));
    return div.innerHTML;
  }
})();
