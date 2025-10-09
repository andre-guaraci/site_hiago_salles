<?php
// === Covil do Pai Hiago - Index Principal ===

// === Enviroment loader ===
require_once __DIR__ . '/helpers/env_loader.php';
loadEnv();

// utilitários e variáveis globais
require __DIR__ . '/helpers/utils.php';

// configuração geral do site (links, nome, etc.)
$config = require __DIR__ . '/config/config.php';

// header padrão
include __DIR__ . '/includes/header.php';
?>

<!-- HERO -->
<?php include __DIR__ . '/components/hero.php'; ?>

<!-- SEÇÃO SOBRE -->
<?php include __DIR__ . '/components/sobre.php'; ?>

<!-- SEÇÃO DE DEPOIMENTOS -->
<?php include __DIR__ . '/components/testimonials.php'; ?>

<!-- SEÇÃO VSL -->
<?php include __DIR__ . '/components/vsl-section.php'; ?>

<!-- SEÇÃO DE PLANOS -->
<?php include __DIR__ . '/partials/planos.php'; ?>

<!-- Inclui o modal da VSL -->
<?php include __DIR__ . '/../partials/modal-vsl.php'; ?>

<!-- ===================== -->
<!-- SEÇÃO DE PLANOS -->
<!-- ===================== -->
<?php include __DIR__ . '/../partials/planos.php'; ?>

<!-- CTA FINAL -->
<?php include __DIR__ . '/../components/cta.php'; ?>

<?php
// rodapé global
include __DIR__ . '/../includes/footer.php';
?>

<!-- Scripts dos módulos -->
<link rel="stylesheet" href="/assets/css/vsl-modal.css">
<link rel="stylesheet" href="/assets/css/planos.css">
<script src="/assets/js/vsl-modal.js" defer></script>
<script src="/assets/js/planos.js" defer></script>
