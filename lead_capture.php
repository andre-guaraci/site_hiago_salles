<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = htmlspecialchars(trim($_POST['nome']));
  $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
  $whatsapp = htmlspecialchars(trim($_POST['whatsapp']));
  if ($nome && $email && $whatsapp) {
    // Enviando os dados para o google sheets
    $url = 'https://script.google.com/macros/s/AKfycbyO17tnsaB26LHNjhDUl4zR42n-YNhlb25PVg5yDlaT1ZEgs42uBSXA34xrHv2PzEjToQ/exec';

    $data = ['nome' => $nome, 'email' => $email, 'whatsapp' => $whatsapp];
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    $mensagem = "Obrigado, $nome! Cadastro realizado.";
  } else {
    $mensagem = "Preencha todos os campos corretamente.";
  }
}
?>
<?php require_once __DIR__.'/includes/header.php'; ?>

<main class="main-content">
  <h2>Cadastre-se para receber novidades!</h2>
  <?php if(isset($mensagem)): ?><p><?php echo $mensagem ?></p><?php endif; ?>
  <form method="post" class="lead-form">
    <label>Nome:<input type="text" name="nome" required></label>
    <label>Email:<input type="email" name="email" required></label>
    <label>WhatsApp:<input type="text" name="whatsapp" required></label>
    <button class="btn" type="submit">Cadastrar</button>
  </form>
</main>

<?php require_once __DIR__.'/includes/footer.php'; ?>
