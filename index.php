<?php
// === Covil do Pai Hiago - Index Principal ===

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

<!-- SEÇÃO DE DEPOIMENTOS-->
<?php include __DIR__ . '/components/testimonials.php'; ?>

<!-- CTA FINAL -->
<?php 
include __DIR__ . '/components/cta.php'; 
?>

<?php
// rodapé global
include __DIR__ . '/includes/footer.php';
?>


