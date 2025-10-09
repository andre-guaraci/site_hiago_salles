// === Covil do Pai Hiago - Animações Premium ===
document.addEventListener('DOMContentLoaded', () => {
  /* === Scroll suave para links internos === */
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', e => {
      const targetId = anchor.getAttribute('href');
      const targetElement = document.querySelector(targetId);
      if (targetElement) {
        e.preventDefault();
        window.scrollTo({
          top: targetElement.offsetTop - 80,
          behavior: 'smooth'
        });
      }
    });
  });

  /* === Efeito no header ao rolar === */
  const header = document.querySelector('.site__header');
  window.addEventListener('scroll', () => {
    if (window.scrollY > 60) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
  });

  /* === Animação de entrada (fade-in) nos elementos visíveis === */
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('animate-in');
      }
    });
  }, { threshold: 0.2 });

  document.querySelectorAll('.section, .hero__content, .btn').forEach(el => observer.observe(el));

  /* === Efeito de pulsar no botão principal === */
  const mainBtn = document.querySelector('.btn--primary');
  if (mainBtn) {
    setTimeout(() => {
      mainBtn.classList.add('btn-pulse');
      setTimeout(() => mainBtn.classList.remove('btn-pulse'), 4000);
    }, 1000);
  }
});

/* === Swiper: Depoimentos com fade === */
document.addEventListener('DOMContentLoaded', () => {
  if (document.querySelector('.depoimentos-swiper')) {
    new Swiper('.depoimentos-swiper', {
      loop: true,
      effect: 'fade',
      fadeEffect: { crossFade: true },
      autoplay: {
        delay: 6000,
        disableOnInteraction: false,
      },
      speed: 1000,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  }

  /* === Modal para “Ver print” === */
  const modal = document.getElementById('printModal');
  const modalImg = document.getElementById('printImage');
  const closeModal = document.querySelector('.close-modal');

  document.querySelectorAll('.ver-print').forEach(btn => {
    btn.addEventListener('click', () => {
      modalImg.src = btn.getAttribute('data-print');
      modal.style.display = 'flex';
    });
  });

  closeModal.addEventListener('click', () => {
    modal.style.display = 'none';
  });

  modal.addEventListener('click', e => {
    if (e.target === modal) modal.style.display = 'none';
  });
});

// === Alternar tema para "Covil Noturno" após as 18h ===
document.addEventListener('DOMContentLoaded', () => {
  const hour = new Date().getHours();
  const depoimentos = document.querySelector('.depoimentos');
  if (hour >= 18 || hour < 6) {
    depoimentos.classList.add('theme-night');
  }
});
