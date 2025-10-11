// === Covil do Pai Hiago – Integração Ritualística com Hotmart ===
document.addEventListener("DOMContentLoaded", () => {
  const btnHotmart = document.querySelector("#btn-hotmart");
  if (!btnHotmart) return;

  const baseUrl = "<?php echo $config['hotmart_link']; ?>";
  const source = localStorage.getItem("utm_source") || "organic";

  // Atualiza o link do botão dinamicamente
  btnHotmart.href = `${baseUrl}?utm_source=${encodeURIComponent(source)}`;

  // Mantém comportamento de scroll e aura
  btnHotmart.addEventListener("click", event => {
    event.preventDefault();

    const target = document.querySelector("#planos");
    if (target) target.scrollIntoView({ behavior: "smooth" });

    const aura = document.createElement("div");
    aura.className = "aura-scroll";
    document.body.appendChild(aura);

    setTimeout(() => aura.classList.add("active"), 10);
    setTimeout(() => aura.remove(), 1000);
  });
});
