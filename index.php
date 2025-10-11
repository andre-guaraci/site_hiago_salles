<?php
// ========================================
// Covil do Pai Hiago - Página Principal
// ========================================

// === Environment loader ===
require_once __DIR__ . '/helpers/env_loader.php';
loadEnv();

// === Utilitários e variáveis globais ===
require __DIR__ . '/helpers/utils.php';

// === Configuração geral ===
$config = require __DIR__ . '/config/config.php';

// === Header padrão ===
include __DIR__ . '/includes/header.php';
?>

<!-- ================================
     CONTEÚDO PRINCIPAL
================================ -->
<main id="main-content">

  <!-- HERO -->
  <?php include __DIR__ . '/components/hero.php'; ?>

  <!-- SEÇÃO SOBRE O COVIL -->
  <?php include __DIR__ . '/components/sobre.php'; ?>

  <!-- SEÇÃO DE DEPOIMENTOS -->
  <?php include __DIR__ . '/components/testimonials.php'; ?>

  <!-- SEÇÃO VSL -->
  <?php include __DIR__ . '/components/vsl-section.php'; ?>

  <!-- MODAL DA VSL -->
  <?php include __DIR__ . '/../partials/modal-vsl.php'; ?>

  <!-- SEÇÃO DE PLANOS -->
  <section id="planos">
    <?php include __DIR__ . '/partials/planos.php'; ?>
  </section>

  <!-- CTA FINAL -->
  <?php include __DIR__ . '/../components/cta.php'; ?>

</main>

<?php
// === Rodapé global ===
include __DIR__ . '/../includes/footer.php';
?>

<!-- === ESTILOS DOS MÓDULOS === -->
<link rel="stylesheet" href="/assets/css/vsl-modal.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="/assets/css/planos.css?v=<?php echo time(); ?>">

<!-- === SCRIPTS DOS MÓDULOS === -->
<script src="/assets/js/vsl-modal.js" defer></script>
<script src="/assets/js/planos.js" defer></script>
