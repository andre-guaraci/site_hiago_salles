<?php
// ========================================
// Covil do Pai Hiago - Cabeçalho Global
// ========================================
$config = require __DIR__ . '/../config/config.php';
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo htmlspecialchars($config['site_name']); ?> – Aprenda Quimbanda de Verdade</title>
  <meta name="description" content="Covil do Pai Hiago — curso e comunidade com lives semanais.">
  <?php include __DIR__ . '/meta.php'; ?>

  <!-- === FONTS === -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Cinzel+Decorative:wght@700&display=swap" rel="stylesheet">

  <!-- === CSS DE TERCEIROS === -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

  <!-- === CSS PRINCIPAIS === -->
  <link rel="stylesheet" href="/assets/css/main.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="/assets/css/components.css?v=<?php echo time(); ?>">
</head>

<body>
  <header class="site__header">
    <div class="container header__inner">
      <a class="brand" href="/"><?php echo htmlspecialchars($config['site_name']); ?></a>

      <nav class="nav" aria-label="Principal">
        <a href="#sobre">Sobre</a>
        <a href="#depoimentos">Depoimentos</a>        
        <a href="/brinde.php">Ganhe o Brinde</a>
        <a href="#planos" class="btn btn-covil btn-scroll-planos" id="btn-hotmart">
          Entrar para o Covil
        </a>
      </nav>
    </div>
  </header>
