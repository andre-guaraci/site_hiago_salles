<?php
require_once __DIR__ . '/helpers/utils.php';
include __DIR__ . '/includes/header.php';

// Recupera valores antigos e erros (se houver)
$old = $_SESSION['form_old'] ?? [];
$errors = $_SESSION['form_errors'] ?? [];
$success = $_SESSION['form_success'] ?? ''; // <-- adiciona esta linha

// Limpa sessão para evitar repetição
unset($_SESSION['form_old'], $_SESSION['form_errors'], $_SESSION['form_success']);
?>

<section class="section container">
  <h2>Garanta seu Brinde Gratuito</h2>
  <p>
    Preencha seus dados corretamente para receber o e-book
    <strong>“Folhas na Quimbanda”</strong> gratuitamente.
  </p>

  <!-- Exibe mensagens de erro -->
  <?php if (!empty($errors)): ?>
    <div class="alert alert--error">
      <ul style="margin:0; padding-left:1.2rem;">
        <?php foreach ($errors as $error): ?>
          <li><?php echo htmlspecialchars($error); ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <!-- Exibe mensagem de sucesso -->
    <?php if ($success): ?>
        <div class="alert alert--success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

  <form class="form" method="POST" id="brindeForm" action="/helpers/form_handler.php" novalidate>
    <!-- Proteção CSRF -->
    <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">

    <label for="nome">Nome completo:</label>
    <input
      type="text"
      id="nome"
      name="nome"
      placeholder="Seu nome completo"
      value="<?php echo htmlspecialchars($old['nome'] ?? ''); ?>"
      required
    >

    <label for="email">E-mail:</label>
    <input
      type="email"
      id="email"
      name="email"
      placeholder="seuemail@exemplo.com"
      value="<?php echo htmlspecialchars($old['email'] ?? ''); ?>"
      required
    >

    <label for="whatsapp">WhatsApp:</label>
    <input
      type="tel"
      id="whatsapp"
      name="whatsapp"
      placeholder="(00) 90000-0000"
      value="<?php echo htmlspecialchars($old['whatsapp'] ?? ''); ?>"
      pattern="\(?\d{2}\)?\s?9?\d{4}-?\d{4}"
      required
    >

    <button type="submit" class="btn btn--primary">Receber Brinde</button>
  </form>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
