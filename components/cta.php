<!-- components/cta.php -->
<section class="section section--cta" id="cta">
  <div class="container cta__inner">
    <h2>Pronto para entrar no Covil?</h2>

    <p>
      Torne-se parte da comunidade e aprenda Quimbanda de verdade.<br>
      Acesso a <strong>conteúdos exclusivos</strong> e <strong>lives com o Pai Hiago</strong> todas as quintas-feiras às 19h.
    </p>

    <a 
      class="btn btn-covil"
      href="<?php echo $config['hotmart_link']; ?>?utm_source=<?php echo urlencode($_SESSION['utm_source'] ?? 'organic'); ?>&utm_campaign=covil_cta"
      target="_blank"
    >
      Entrar para o Covil
    </a>

    <p style="margin-top:1.5rem; color: var(--royal); font-size: 0.95rem;">
      Ou <br> <a href="/brinde.php" class="btn btn--ghost">Garanta seu brinde gratuito</a>
    </p>
  </div>
</section>
