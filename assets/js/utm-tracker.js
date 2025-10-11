// === Covil do Pai Hiago – Rastreamento Ritualístico de UTMs ===
document.addEventListener("DOMContentLoaded", () => {
  const params = new URLSearchParams(window.location.search);
  const utmKeys = ["utm_source", "utm_medium", "utm_campaign", "utm_content", "utm_term", "fbclid", "gclid"];

  utmKeys.forEach(key => {
    const value = params.get(key);
    if (value) {
      localStorage.setItem(key, value);
    }
  });

  // Caso não exista utm_source, define "organic" como padrão
  if (!localStorage.getItem("utm_source")) {
    localStorage.setItem("utm_source", "organic");
  }

  // Torna acessível globalmente
  window.CovilUTM = {};
  utmKeys.forEach(key => {
    window.CovilUTM[key] = localStorage.getItem(key);
  });
});
