<?php
// ========================================
// Covil do Pai Hiago - Página Sobre o Mentor (versão isolada definitiva com loader místico)
// ========================================

require_once __DIR__ . '/../helpers/env_loader.php';
loadEnv();
require __DIR__ . '/../helpers/utils.php';
$config = require __DIR__ . '/../config/config.php';
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Sobre o Mentor | Pai Hiago Salles - Covil do Pai Hiago</title>
  <meta name="description" content="Conheça a jornada espiritual de Pai Hiago Salles, N’ganga Ngunjiletango — sacerdote da Quimbanda Nago e fundador do Covil Chama Negra. Descubra a metodologia que já transformou mais de mil pessoas.">

  <!-- CSS principal -->
  <link rel="stylesheet" href="/assets/css/sobre-mentor.css?v=<?php echo time(); ?>">

  <style>
    /* ======== RESET E BASE ======== */
    body {
      margin: 0;
      background-color: #0a0a0a;
      color: #fff;
      font-family: 'Montserrat', sans-serif;
      overflow-x: hidden;
      opacity: 0;
      animation: fadeIn 1s ease forwards 0.5s;
    }

    /* ======== BOTÃO VOLTAR ======== */
    .btn-voltar {
      position: fixed;
      top: 20px;
      left: 20px;
      background: rgba(0, 0, 0, 0.6);
      border: 1px solid #DAA520;
      color: #DAA520;
      font-weight: 600;
      padding: 0.7rem 1.5rem;
      border-radius: 30px;
      text-decoration: none;
      z-index: 999;
      transition: all 0.3s ease;
    }
    .btn-voltar:hover {
      background: #DAA520;
      color: #000;
      transform: translateY(-2px);
    }

    /* ======== LOADER MÍSTICO ======== */
    #loader {
      position: fixed;
      inset: 0;
      background: radial-gradient(circle at center, #000 60%, #1a1a1a 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 1000;
      transition: opacity 0.8s ease;
    }

    .flame {
      position: relative;
      width: 60px;
      height: 60px;
      background: radial-gradient(ellipse at center, #FFD700 0%, #FF8C00 80%, transparent 100%);
      border-radius: 50% 50% 20% 20%;
      transform-origin: bottom center;
      animation: flicker 1.2s infinite ease-in-out;
      box-shadow: 0 0 40px 10px rgba(218,165,32,0.4);
    }

    .flame::before,
    .flame::after {
      content: "";
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 100%;
      height: 100%;
      border-radius: 50% 50% 20% 20%;
      background: radial-gradient(ellipse at center, #FFA500 0%, #B22222 90%, transparent 100%);
      opacity: 0.7;
      animation: flicker 1.5s infinite ease-in-out alternate;
    }

    @keyframes flicker {
      0% { transform: scaleY(1) scaleX(1); opacity: 0.9; }
      50% { transform: scaleY(1.2) scaleX(0.95); opacity: 1; }
      100% { transform: scaleY(1) scaleX(1); opacity: 0.85; }
    }

    /* Fade-out do loader */
    #loader.fade-out {
      opacity: 0;
      pointer-events: none;
    }

    /* Fade-in do conteúdo */
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
  </style>
</head>

<body>
  <!-- ======== LOADER MÍSTICO ======== -->
  <div id="loader">
    <div class="flame"></div>
  </div>

  <!-- ======== BOTÃO VOLTAR ======== -->
  <a href="/" class="btn-voltar">← Voltar ao Covil</a>

  <!-- ======== CONTEÚDO PRINCIPAL ======== -->
  <section id="sobre-pai-hiago" class="sobre-section">

    <!-- HERO -->
    <div class="sobre-hero" style="background-image: url('/assets/img/hero-pai-hiago.png');">
      <div class="overlay"></div>
      <div class="container text-center">
        <h2 class="sobre-title">PAI HIAGO SALLES</h2>        
        <h4 class="sobre-subtitle">N'ganga Ngunjiletango – Sacerdote da Quimbanda Nago</h4>
        <p class="sobre-intro">
          Nascido e criado dentro da macumba, carrego comigo uma linhagem viva, formada no fogo da experiência e no axé dos ancestrais.
          Hoje, como sacerdote à frente do <strong>Templo Covil Chama Negra</strong>, sigo guiando pessoas no caminho da verdadeira espiritualidade — aquela que liberta, transforma e aproxima cada um de suas entidades de poder.
        </p>
      </div>
    </div>

    <!-- BLOCO 1 -->
    <section class="sobre-bloco">
      <div class="container">
        <h3>A Jornada e a Missão</h3>
        <p>
          Desde cedo, compreendi que a espiritualidade não é teoria — é vivência.
          Ao longo dos anos, mergulhei em fundamentos antigos da <strong>Quimbanda Nago</strong>,
          aprendendo com mestres, entidades e experiências diretas o valor da disciplina espiritual
          e do respeito às forças que nos regem.
        </p>
        <p>
          Foi dessa vivência profunda que nasceu minha missão:
          <strong>trazer clareza, firmeza e fundamento</strong> para quem deseja trilhar o caminho
          da magia e da feitiçaria com consciência e segurança.
        </p>
      </div>
    </section>

    <!-- PARALLAX 1 -->
    <div class="parallax" style="background-image: url('/assets/img/parallax-1.png');"></div>

    <!-- BLOCO 2 -->
    <section class="sobre-bloco dark">
      <div class="container">
        <h3>O Método e o Legado</h3>
        <p>
          Criei uma metodologia exclusiva, inspirada nos próprios ensinamentos dos Exus e Pombagiras que me acompanham,
          para que qualquer pessoa — mesmo sem experiência — possa desenvolver sua espiritualidade de forma estruturada.
        </p>
        <p>
          Hoje, <strong>mais de mil pessoas</strong> já vivenciaram esse processo e alcançaram algo que poucos compreendem:
          a verdadeira <strong>liberdade espiritual</strong>, o contato direto e respeitoso com suas entidades e a força necessária
          para transformar a própria vida.
        </p>
      </div>
    </section>

    <!-- PARALLAX 2 -->
    <div class="parallax" style="background-image: url('/assets/img/parallax-2.png');"></div>

    <!-- BLOCO 3 -->
    <section class="sobre-bloco">
      <div class="container">
        <h3>O Chamado</h3>
        <p>
          Se o seu chamado é real, e você sente que chegou o momento de caminhar com fundamento, com verdade
          e com sucesso na sua jornada espiritual — <strong>então este é o seu lugar</strong>.
        </p>
        <p>
          A feitiçaria não é um brinquedo. É poder, ancestralidade e responsabilidade.
          E o primeiro passo é ser conduzido por quem vive isso todos os dias, com respeito e seriedade.
        </p>
        <p>
          Clique abaixo e <strong>conheça a metodologia</strong> que pode mudar sua forma de se conectar com o espiritual.
        </p>

        <div class="cta-center">
          <a href="/" class="btn-cta">Voltar ao Covil 🔥</a>
        </div>
      </div>
    </section>

    <!-- PARALLAX 3 -->
    <div class="parallax" style="background-image: url('/assets/img/parallax-3.png');"></div>

    <!-- BLOCO FINAL -->
    <section class="sobre-bloco final dark text-center">
      <div class="container">
        <h3>Caminhe com fundamento. Viva com liberdade.</h3>
        <a href="/" class="btn-cta">Retornar ao Covil</a>
      </div>
    </section>
  </section>

  <script>
    // Remove o loader quando a página estiver pronta
    window.addEventListener("load", () => {
      const loader = document.getElementById("loader");
      loader.classList.add("fade-out");
      setTimeout(() => loader.remove(), 800);
    });
  </script>
</body>
</html>
