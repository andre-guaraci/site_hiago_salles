<?php require_once __DIR__ . '/includes/header.php'; ?>
<main class="main-content">

  <!-- Banner principal / Headline de impacto -->
  <section class="banner-impacto">
    <h1>SUA PRÁTICA DE QUIMBANDA É REALMENTE TRANSFORMADORA?</h1>
    <h2>Descubra o método premium para evoluir no culto e ter resultados práticos na vida!</h2>
    <a class="btn-cta" href="#">QUERO EVOLUIR NA QUIMBANDA</a>
    <small style="display:block;margin-top:12px;color:var(--dourado);">Vagas limitadas! Garanta já a sua.</small>
  </section>

  <!-- Intro e diferenciais -->
  <section class="intro" style="margin-top:36px;">
    <h2>
      <span style="color:var(--vermelho)">Curso Premium</span> de Quimbanda
      <span style="color:var(--dourado); font-weight:900">Atualizado Sempre</span>
    </h2>
    <ul>
      <li>Lives exclusivas <strong>todas as quintas-feiras</strong></li>
      <li>Materiais e videoaulas sempre atualizados</li>
      <li>Seu acesso à verdadeira Quimbanda com professores experientes</li>
    </ul>
    <a class="btn" href="#">Acesse agora</a>
  </section>

  <!-- Seção Mentor -->
  <section class="mentoria" style="margin-top:40px;">
    <h2>Conheça o Mentor</h2>
    <img src="/assets/img/mentor.jpg" alt="Mentor Tata Quimbanda" class="mentor-img" style="max-width:120px;border-radius:50%;border:2px solid var(--azul-royal);margin-bottom:8px;">
    <p>
      Tata de Quimbanda, especialista no culto tradicional, líder de rituais e professor de centenas de alunos. Encontros semanais ao vivo e acesso vitalício aos conteúdos atualizados!
    </p>
  </section>

  <!-- Seção Produtos (mantendo seus produtos dinâmicos) -->
  <section class="produtos-hotmart" style="margin-top:36px;">
    <h2 style="color:var(--dourado);margin-bottom:12px;text-align:center;">Nossos Produtos</h2>
    <div class="produtos-lista" style="display:flex;flex-wrap:wrap;gap:28px;justify-content:center;">
      <?php
        $produtos_demo = [
          ['name' => 'Curso Completo de Quimbanda', 'image' => '/assets/img/prod1.jpg'],
          ['name' => 'Mentoria ao Vivo', 'image' => '/assets/img/prod2.jpg'],
          ['name' => 'Apostila Prática de Rituais', 'image' => '/assets/img/prod3.jpg'],
        ];
        foreach ($produtos_demo as $produto) {
          echo "<div class='produto'>";
          echo "<img src='" . htmlspecialchars($produto['image']) . "' class='produto-img' alt='Produto'>";
          echo "<h3>" . htmlspecialchars($produto['name']) . "</h3>";
          echo "</div>";
        }
      ?>
    </div>
  </section>

  <!-- Seção Depoimentos -->
  <section class="depoimentos" style="margin-top:42px;text-align:center;">
    <h2 style="color:var(--dourado);margin-bottom:20px;">Transformações reais dos nossos alunos</h2>
    <div class="dep-card">“O curso abriu meus olhos para possibilidades reais. As lives são incríveis!”<br><i>- Ana, SP</i></div>
    <div class="dep-card">“Recomendo para quem quer viver a Quimbanda de verdade.”<br><i>- João, RJ</i></div>
    <div class="dep-card">“Conteúdo atualizado e professor presente. Nunca vi igual!”<br><i>- Clara, MG</i></div>
  </section>

  <!-- Garantia e chamada para ação final -->
  <section class="garantia" style="margin-top:40px;text-align:center;">
    <h2 style="color:var(--dourado);margin-bottom:8px;">Garantia total de 7 dias</h2>
    <p>Se não gostar, devolvemos seu dinheiro sem burocracia. Seu risco é zero!</p>
    <a class="btn-cta" href="#">Quero garantir minha vaga</a>
  </section>

</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
