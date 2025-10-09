(() => {
  const modal = document.getElementById('vslModal');
  if (!modal) return;

  const dialog = modal.querySelector('.modal-vsl__dialog');
  const target = modal.querySelector('[data-vsl-target]');
  const btnCloseEls = modal.querySelectorAll('[data-close]');
  const ctaBtn = modal.querySelector('#vslCtaBtn');
  let lastFocused = null;

  // Util: extrai embed a partir de URLs do YouTube, Vimeo ou MP4
  function getEmbed(url) {
    try {
      const u = new URL(url);
      const href = u.href;

      // MP4 direto
      if (/\.(mp4|webm|ogg)(\?.*)?$/i.test(href)) {
        return { type: 'mp4', src: href };
      }

      // YouTube (watch ou youtu.be)
      if (u.hostname.includes('youtube.com') || u.hostname.includes('youtu.be')) {
        let id = '';
        if (u.hostname.includes('youtu.be')) id = u.pathname.replace('/', '');
        else id = u.searchParams.get('v');
        const embed = `https://www.youtube.com/embed/${id}?autoplay=1&rel=0&modestbranding=1&controls=1&playsinline=1&hl=pt-BR`;
        return { type: 'youtube', src: embed };
      }

      // Vimeo
      if (u.hostname.includes('vimeo.com')) {
        const id = u.pathname.split('/').filter(Boolean)[0];
        const embed = `https://player.vimeo.com/video/${id}?autoplay=1&title=0&byline=0&portrait=0`;
        return { type: 'vimeo', src: embed };
      }

      // Fallback: usa como é (iframe)
      return { type: 'unknown', src: href };
    } catch {
      return { type: 'unknown', src: url };
    }
  }

  function setCtaHref(href) {
    if (!ctaBtn) return;
    if (!href) return;
    // adiciona UTM se não existir
    const u = new URL(href, window.location.origin);
    if (!u.searchParams.has('utm_source')) {
      u.searchParams.set('utm_source', 'covil_site');
      u.searchParams.set('utm_medium', 'vsl_modal');
      u.searchParams.set('utm_campaign', 'curso');
    }
    ctaBtn.setAttribute('href', u.toString());
  }

  function openModal(videoUrl, ctaHref) {
    lastFocused = document.activeElement;
    document.body.classList.add('vsl-no-scroll');

    // injeta mídia
    const { type, src } = getEmbed(videoUrl);
    target.innerHTML = '';
    if (type === 'mp4') {
      const video = document.createElement('video');
      video.src = src;
      video.controls = true;
      video.autoplay = true;
      video.playsInline = true;
      target.appendChild(video);
    } else {
      const iframe = document.createElement('iframe');
      iframe.src = src;
      iframe.allow = 'autoplay; encrypted-media; picture-in-picture';
      iframe.allowFullscreen = true;
      iframe.referrerPolicy = 'strict-origin-when-cross-origin';
      target.appendChild(iframe);
    }

    setCtaHref(ctaHref);

    modal.classList.add('is-open');
    setTimeout(() => dialog.focus(), 10); // acessibilidade
  }

  function closeModal() {
    modal.classList.remove('is-open');
    document.body.classList.remove('vsl-no-scroll');
    target.innerHTML = ''; // remove iframe/video => pausa
    if (lastFocused) lastFocused.focus();
  }

  // Fechar: overlay, X e Esc
  btnCloseEls.forEach(el => el.addEventListener('click', closeModal));
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modal.classList.contains('is-open')) closeModal();
  });
  modal.addEventListener('click', (e) => {
    if (e.target.dataset.close === 'true') closeModal();
  });

  // Triggers globais: qualquer elemento com data-vsl-src
  document.querySelectorAll('[data-vsl-src]').forEach(trigger => {
    trigger.addEventListener('click', (e) => {
      e.preventDefault();
      const vsl = trigger.getAttribute('data-vsl-src');
      const cta = trigger.getAttribute('data-cta') || (ctaBtn ? ctaBtn.getAttribute('href') : '#');
      if (vsl) openModal(vsl, cta);
    });
  });
})();
