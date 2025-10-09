<?php
// hero.php
?>
<section class="hero">
    <div class="hero__bg"></div>
    <div class="container hero__inner">
        <div class="hero__content">
            <h1>
                <span class="hero__title-gold">Covil do Pai Hiago</span><br>
                <span class="hero__subtitle">Aprenda Quimbanda de Verdade</span>
            </h1>
            <p class="hero__lead">
                Entre no Covil e participe das lives exclusivas todas as quintas-feiras às <strong>19h</strong>.
            </p>
            <div class="hero__actions">
                <a class="btn btn-covil" href="<?php echo $config['hotmart_link']; ?>?utm_source=<?php echo urlencode($_SESSION['utm_source'] ?? 'organic'); ?>&utm_campaign=hero_cta">Entrar para o Covil</a>                
            </div>
        </div>
        <div class="hero__visual" aria-hidden="true">
            <!-- imagem, ilustração ou SVG aqui -->
        </div>
    </div>
</section>
