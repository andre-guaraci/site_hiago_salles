<?php
// ======================================================
// Covil do Pai Hiago - Formulário de Brinde
// ======================================================
// 🔹 Coleta dados do lead
// 🔹 Valida e salva no CSV
// 🔹 Envia e-book por e-mail via PHPMailer
// 🔹 Registra logs de cada etapa
// ======================================================
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/env_loader.php';
loadEnv();
require_once __DIR__ . '/utils.php';
require_once __DIR__ . '/security.php';
require_once __DIR__ . '/logger.php';
require_once __DIR__ . '/mailer.php';

$context = 'FORM_HANDLER';

// --- Valida método ---
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    logMessage('WARNING', 'Método inválido na submissão do formulário.', $context);
    exit('Método não permitido');
}

// --- CSRF Token ---
$token = $_POST['csrf_token'] ?? '';
if (!validate_csrf_token($token)) {
    http_response_code(403);
    logMessage('ERROR', 'Falha na validação CSRF.', $context);
    exit('Request inválida (CSRF).');
}

// --- Sanitização ---
$nome      = trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$email     = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
$whatsapp  = trim(filter_input(INPUT_POST, 'whatsapp', FILTER_SANITIZE_STRING));

$errors = [];

if (empty($nome)) $errors[] = 'Nome é obrigatório.';
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'E-mail inválido.';
if (empty($whatsapp)) {
    $errors[] = 'WhatsApp é obrigatório.';
} elseif (!preg_match('/^\(?\d{2}\)?\s?9?\d{4}-?\d{4}$/', $whatsapp)) {
    $errors[] = 'Número de WhatsApp inválido.';
}

if (!empty($errors)) {
    logMessage('WARNING', 'Falha na validação de campos: ' . implode('; ', $errors), $context);
    $_SESSION['form_errors'] = $errors;
    $_SESSION['form_old'] = compact('nome', 'email', 'whatsapp');
    header('Location: /brinde.php');
    exit;
}

// --- SALVA LEAD EM CSV ---
try {
    $logDir = __DIR__ . '/../logs';
    if (!is_dir($logDir)) mkdir($logDir, 0755, true);
    $csvFile = $logDir . '/leads.csv';

    $ip = $_SERVER['REMOTE_ADDR'] ?? '';
    $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
    $created_at = date('Y-m-d H:i:s');
    $utm_source = $_SESSION['utm_source'] ?? '';
    $utm_medium = $_SESSION['utm_medium'] ?? '';
    $utm_campaign = $_SESSION['utm_campaign'] ?? '';

    $row = [$created_at, $ip, $utm_source, $utm_medium, $utm_campaign, $nome, $email, $whatsapp, $ua];
    $fp = fopen($csvFile, 'a');

    if ($fp) {
        fputcsv($fp, $row);
        fclose($fp);
        logMessage('INFO', "Lead salvo: {$email}", $context);
    } else {
        throw new RuntimeException("Falha ao gravar CSV em {$csvFile}");
    }
} catch (Throwable $e) {
    logMessage('ERROR', 'Erro ao salvar lead: ' . $e->getMessage(), $context);
}

// --- ENVIA E-BOOK ---
if (enviarEmailEbook($email, $nome, $whatsapp)) {
    logMessage('INFO', "E-book enviado com sucesso para {$email}", $context);
    header('Location: /brinde-sucesso.php');
    exit;
} else {
    logMessage('ERROR', "Falha no envio do e-book para {$email}", $context);
    echo "<h3>⚠️ Ocorreu um erro ao enviar o e-book. Tente novamente mais tarde.</h3>";
}
