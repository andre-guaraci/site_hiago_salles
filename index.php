<?php
  require_once __DIR__ . '/includes/header.php';
?>

<main class="main-content">
<section class="intro">
  <h2>Bem-vindo(a) ao curso de Quimbanda mais dinâmico do Brasil!</h2>
  <ul>
    <li>Atualizações constantes de conteúdo</li>
    <li>Lives exclusivas todas as quintas</li>
    <li>Professores com experiência real prática</li>
  </ul>
  <a href="#" class="btn">Conheça o curso</a>
</section>
<section class="produtos-hotmart">
  <h2>Produtos do Curso</h2>
  <?php
    require_once __DIR__ . '/includes/hotmart_api.php';
    $produtos = getHotmartProducts();
    foreach ($produtos as $produto) {
      echo "<div class='produto'>";
      echo "<h3>" . htmlspecialchars($produto['name']) . "</h3>";
      echo "<img src='" . htmlspecialchars($produto['image']) . "' />";
      echo "</div>";
    }
  ?>
</section>
  <!-- Outras seções futuras -->
</main>
 <?php 
  require_once __DIR__ . '/includes/footer.php';
?>
