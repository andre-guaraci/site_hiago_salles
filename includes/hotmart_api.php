<?php
function getHotmartProducts() {
  // Carregue o token Hotmart (ex: a partir de uma variável de ambiente/sistema seguro)
  $hotmart_token = getenv('HOTMART_TOKEN');
  if (!$hotmart_token) return [];

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://api.hotmart.com.br/products"); // Confirme a URL conforme documentação
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . $hotmart_token
  ]);
  $result = curl_exec($ch);
  curl_close($ch);

  // Trata resposta (JSON)
  $produtos = json_decode($result, true);

  // Adapte conforme o formato que a API retorna!
  return (isset($produtos['products'])) ? $produtos['products'] : [];
}
?>