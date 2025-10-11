// ===============================================
// Covil do Pai Hiago - Navegação AJAX + Transição
// ===============================================

document.addEventListener("DOMContentLoaded", () => {
  const main = document.getElementById("main-content");
  if (!main) return;

  // Adiciona fade-in na entrada inicial
  document.body.classList.add("fade-in");

  // Captura cliques nos links internos
  document.body.addEventListener("click", e => {
    const link = e.target.closest("a");
    if (!link) return;

    const href = link.getAttribute("href");

    // Ignora links externos, âncoras e com target="_blank"
    if (
      !href ||
      href.startsWith("http") ||
      href.startsWith("#") ||
      link.target === "_blank"
    ) return;

    e.preventDefault();

    // Anima saída
    document.body.classList.remove("fade-in");
    document.body.classList.add("fade-out");

    // Aguarda o fade-out
    setTimeout(() => {
      fetch(href)
        .then(res => res.text())
        .then(html => {
          const parser = new DOMParser();
          const doc = parser.parseFromString(html, "text/html");
          const newMain = doc.querySelector("#main-content");

          if (newMain) {
            main.innerHTML = newMain.innerHTML;
            window.history.pushState({}, "", href);

            // Restaura fade-in
            document.body.classList.remove("fade-out");
            document.body.classList.add("fade-in");

            // Atualiza o título e meta (SEO básico)
            const newTitle = doc.querySelector("title");
            if (newTitle) document.title = newTitle.textContent;

            // Reexecuta scripts inline
            const scripts = newMain.querySelectorAll("script");
            scripts.forEach(oldScript => {
              const newScript = document.createElement("script");
              if (oldScript.src) newScript.src = oldScript.src;
              else newScript.textContent = oldScript.textContent;
              document.body.appendChild(newScript);
            });

            // Scroll para o topo
            window.scrollTo({ top: 0, behavior: "smooth" });
          }
        })
        .catch(err => {
          console.error("Erro ao carregar página via AJAX:", err);
          window.location.href = href; // fallback
        });
    }, 300);
  });

  // Suporte ao botão voltar/avançar
  window.addEventListener("popstate", () => {
    fetch(location.href)
      .then(res => res.text())
      .then(html => {
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, "text/html");
        const newMain = doc.querySelector("#main-content");
        if (newMain) {
          main.innerHTML = newMain.innerHTML;
          document.body.classList.remove("fade-out");
          document.body.classList.add("fade-in");
        }
      });
  });
});
