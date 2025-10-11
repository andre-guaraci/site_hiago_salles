document.addEventListener("DOMContentLoaded", () => {
  const btn = document.querySelector("#btn-hotmart");
  const target = document.querySelector("#planos");
  if (!btn || !target) return;

  btn.addEventListener("click", (event) => {
    event.preventDefault();
    target.scrollIntoView({ behavior: "smooth", block: "start" });

    // Efeito de aura dourada
    const aura = document.createElement("div");
    aura.className = "aura-scroll";
    document.body.appendChild(aura);

    setTimeout(() => aura.classList.add("active"), 10);
    setTimeout(() => aura.remove(), 1000);
  });
});
