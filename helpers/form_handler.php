<?php
// Recebe POST do brinde e salva lead em logs/leads.csv
require __DIR__ . '/utils.php';
require __DIR__ . '/security.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Método não permitido');
}

// CSRF
$token = $_POST['csrf_token'] ?? '';
if (!validate_csrf_token($token)) {
    http_response_code(403);
    exit('Request inválida (CSRF).');
}

// Sanitização
$nome  = trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
$email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
$whatsapp = trim(filter_input(INPUT_POST, 'whatsapp', FILTER_SANITIZE_STRING));

// Validação
$errors = [];
if (empty($nome)) { $errors[] = 'Nome é obrigatório.'; }
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) { $errors[] = 'E-mail inválido.'; }
if (empty($whatsapp)) { $errors[] = 'WhatsApp é obrigatório.'; }
elseif (!preg_match('/^\(?\d{2}\)?\s?9?\d{4}-?\d{4}$/', $whatsapp)) {
    $errors[] = 'Número de WhatsApp inválido.';
}

if (!empty($errors)) {
    $_SESSION['form_errors'] = $errors;
    $_SESSION['form_old'] = ['nome' => $nome, 'email' => $email, 'whatsapp' => $whatsapp];
    header('Location: /brinde.php');
    exit;
}

// salvar lead em CSV (logs/leads.csv)
$logDir = __DIR__ . '/../logs';
if (!is_dir($logDir)) mkdir($logDir, 0755, true);
$csvFile = $logDir . '/leads.csv';
$ip = $_SERVER['REMOTE_ADDR'] ?? '';
$ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
$created_at = date('Y-m-d H:i:s');
$utm_source = $_SESSION['utm_source'] ?? '';
$utm_medium = $_SESSION['utm_medium'] ?? '';
$utm_campaign = $_SESSION['utm_campaign'] ?? '';

$row = [
    $created_at, $ip, $utm_source, $utm_medium, $utm_campaign,
    str_replace(["\n","\r", ";"], ' ', $nome),
    str_replace(["\n","\r", ";"], ' ', $email),
    str_replace(["\n","\r", ";"], ' ', $whatsapp),
    str_replace(["\n","\r", ";"], ' ', $ua)
];

$fp = fopen($csvFile, 'a');
if ($fp) {
    fputcsv($fp, $row);
    fclose($fp);
}

// Redireciona para o e-book
$config = require __DIR__ . '/../config/config.php';
$ebookLink = $config['ebook_link'] ?? '/brinde-download.php';
header('Location: ' . $ebookLink);
exit;
