// === Validação do Formulário de Brinde ===
document.addEventListener('DOMContentLoaded', () => {
  const form = document.querySelector('#brindeForm');
  if (!form) return;

  form.addEventListener('submit', (e) => {
    const nome = form.querySelector('#nome').value.trim();
    const email = form.querySelector('#email').value.trim();
    const whatsapp = form.querySelector('#whatsapp').value.trim();

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phoneRegex = /^\(?\d{2}\)?\s?9?\d{4}-?\d{4}$/;

    if (!nome || !email || !whatsapp) {
      e.preventDefault();
      alert('Por favor, preencha todos os campos.');
      return;
    }

    if (!emailRegex.test(email)) {
      e.preventDefault();
      alert('Por favor, insira um e-mail válido.');
      return;
    }

    if (!phoneRegex.test(whatsapp)) {
      e.preventDefault();
      alert('Por favor, insira um número de WhatsApp válido. Ex: (11) 91234-5678');
      return;
    }
  });
});
