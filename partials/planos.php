<?php
/**
 * =========================================================
 *  SEÇÃO DE PLANOS - COVIL DO PAI HIAGO
 * =========================================================
 * 🔹 Modular, estilizada e responsiva
 * 🔹 Usa variáveis do .env ou config.php
 * 🔹 Destaque para o plano anual (principal produto)
 */

require_once __DIR__ . '/../helpers/env_loader.php';
loadEnv();

$config = is_file(__DIR__ . '/../config/config.php') ? require __DIR__ . '/../config/config.php' : [];

$checkoutMensal = getenv('HOTMART_MENSAL') ?: $config['hotmart_mensal'] ?? '#';
$checkoutAnual  = getenv('HOTMART_ANUAL')  ?: $config['hotmart_anual'] ?? '#';
?>

<section id="planos" class="planos-section text-center py-5 gradient-background">
  <div class="container">
    <h2 class="section-title mb-3">Escolha o seu caminho no Covil ⚜️</h2>
    <p class="section-subtitle mb-5">
      Aprenda com o Pai Hiago, domine os fundamentos e transforme sua vida espiritual.
    </p>

    <div class="planos-wrapper">
      <!-- Plano Mensal -->
      <div class="plano-card fade-in" style="--delay:0s">
        <h3 class="plano-titulo">Plano Mensal</h3>
        <p class="plano-desc">
          Acesso mensal ao conteúdo completo do Covil.<br>
          Ideal para quem deseja iniciar e experimentar o poder do conhecimento ancestral.
        </p>
        <div class="plano-preco">R$ 49<span>/mês</span></div>
        <a href="<?= htmlspecialchars($checkoutMensal) ?>"
           target="_blank" rel="noopener"
           class="btn-plano">
          🔥 Quero começar agora
        </a>
      </div>

      <!-- Plano Anual -->
      <div class="plano-card destaque fade-in" style="--delay:0.15s">
        <div class="plano-selo">Mais vantajoso</div>
        <h3 class="plano-titulo">Plano Anual</h3>
        <p class="plano-desc">
          12 meses de acesso, bônus exclusivos e suporte direto do Pai Hiago.<br>
          A jornada completa para quem busca evolução e domínio espiritual.
        </p>
        <div class="plano-preco">R$ 497<span>/ano</span></div>
        <a href="<?= htmlspecialchars($checkoutAnual) ?>"
           target="_blank" rel="noopener"
           class="btn-plano destaque">
          ⚜️ Quero meu acesso completo
        </a>
      </div>
    </div>
  </div>
</section>
