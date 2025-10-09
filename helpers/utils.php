<?php
// helpers/utils.php
// =======================================
// Utilitários globais para o Covil do Pai Hiago
// =======================================

// Garante que a sessão está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Gera e armazena um token CSRF na sessão.
 *
 * @return string Token gerado.
 */
function generate_csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Valida um token CSRF recebido em formulário.
 *
 * @param string $token Token enviado no POST.
 * @return bool Verdadeiro se o token for válido.
 */
function validate_csrf_token($token) {
    if (isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token)) {
        return true;
    }
    return false;
}


/**
 * Redirecionamento seguro.
 *
 * @param string $url
 */
function redirect($url) {
    header("Location: $url");
    exit;
}

/**
 * Depuração rápida (somente ambiente local).
 *
 * @param mixed $data
 */
function debug($data) {
    echo '<pre style="background:#111;color:#0f0;padding:10px;border:1px solid #0f0;">';
    print_r($data);
    echo '</pre>';
}
