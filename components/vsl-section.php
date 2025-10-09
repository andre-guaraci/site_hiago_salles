<?php
/**
 * =========================================================
 *  SEÇÃO VSL — Covil do Pai Hiago
 * =========================================================
 * 🔹 Exibe o vídeo (VSL) principal
 * 🔹 Integra com o modal de vídeo e CTA dinâmico
 * 🔹 Totalmente modular e estilizada
 */

require_once __DIR__ . '/../helpers/env_loader.php';
loadEnv();

$config = is_file(__DIR__ . '/../config/config.php') ? require __DIR__ . '/../config/config.php' : [];

$checkoutLink = htmlspecialchars($config['hotmart_link'] ?? getenv('HOTMART_LINK') ?? '#');
$vslLink = getenv('VSL_LINK') ?: 'https://youtu.be/HG2Ac86qbME';
?>

<section id="vsl-section" class="vsl-section gradient-background py-5 text-center">
  <div class="container">
    <div class="vsl-content">
      <h2 class="vsl-title text-gold mb-3">⚜️ Mensagem do Pai Hiago ⚜️</h2>
      <p class="vsl-subtitle mb-4">
        O caminho é para quem busca conhecimento, poder e equilíbrio.
      </p>

      <!-- Thumbnail com botão de play -->
      <div class="vsl-thumbnail mb-4">
        <img src="/assets/img/vsl-thumb.jpg" alt="VSL - Pai Hiago" class="vsl-thumb-img">
        <button class="vsl-play-btn" 
                data-vsl-src="<?= $vslLink; ?>"
                data-cta="<?= $checkoutLink; ?>"
                aria-label="Assistir vídeo do Pai Hiago">
          ▶️
        </button>
      </div>

      <!-- CTA principal -->
      <a href="<?= $checkoutLink; ?>" 
         class="btn-cta pulse"
         target="_blank" rel="noopener">
        ⚜️ Quero iniciar minha jornada agora
      </a>
    </div>
  </div>
</section>

<!-- Modal VSL -->
<?php include __DIR__ . '/../partials/modal-vsl.php'; ?>
