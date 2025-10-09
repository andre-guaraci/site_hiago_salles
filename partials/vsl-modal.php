<?php
// Opcional: pegar link do checkout do config/.env
$cfg = is_file(__DIR__ . '/../config/config.php') ? require __DIR__ . '/../config/config.php' : [];
$checkout = $cfg['hotmart_link'] ?? getenv('HOTMART_LINK') ?? '#';
?>
<div id="vslModal" class="modal-vsl" aria-hidden="true" role="dialog" aria-modal="true" aria-label="Vídeo de apresentação">
  <div class="modal-vsl__overlay" data-close="true"></div>

  <div class="modal-vsl__dialog" role="document" tabindex="-1">
    <button class="modal-vsl__close" aria-label="Fechar" data-close="true">×</button>

    <div class="modal-vsl__body">
      <div class="modal-vsl__media ratio-16x9" data-vsl-target>
        <!-- iframe/video é injetado via JS -->
      </div>

      <div class="modal-vsl__cta">
        <a id="vslCtaBtn"
           class="btn-cta"
           href="<?= htmlspecialchars($checkout) ?>"
           target="_blank" rel="noopener">
          ⚜️ Quero iniciar agora com o Pai Hiago
        </a>
      </div>
    </div>
  </div>
</div>
