// ================================
// Covil do Pai Hiago
// Transição visual entre páginas
// ================================

document.addEventListener("DOMContentLoaded", () => {
  const body = document.body;

  // Efeito de entrada
  body.classList.add("fade-in");

  // Intercepta cliques em links internos
  document.querySelectorAll('a[href]').forEach(link => {
    const href = link.getAttribute('href');
    if (href.startsWith('/') || href.startsWith('./') || href.startsWith('../')) {
      link.addEventListener('click', e => {
        // Evita comportamento padrão se for mesmo domínio
        if (!link.hasAttribute('target') && !link.href.includes('#')) {
          e.preventDefault();
          body.classList.remove("fade-in");
          body.classList.add("fade-out");

          setTimeout(() => {
            window.location.href = link.href;
          }, 300); // tempo igual ao do CSS
        }
      });
    }
  });
});
