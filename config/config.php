<?php
/**
 * =========================================================
 *  CONFIGURAÇÃO PRINCIPAL
 *  Covil do Pai Hiago
 * =========================================================
 * 
 * 🔹 Centraliza configurações do sistema
 * 🔹 Lê variáveis sensíveis do .env (via getenv)
 * 🔹 Evita exposição de credenciais no repositório
 * 🔹 Integra com logger para registrar falhas de leitura
 */
require_once __DIR__ . '/../helpers/env_loader.php';
loadEnv();
require_once __DIR__ . '/../helpers/logger.php';

$context = 'CONFIG';

// --- Leitura de variáveis seguras do ambiente (.env) ---
try {
    $config = [
        'site_name'     => getenv('SITE_NAME')     ?: 'Covil do Pai Hiago',
        'admin_email'   => getenv('ADMIN_EMAIL')   ?: 'contato@paihiagosalles.com.br',
        'hotmart_link'  => getenv('HOTMART_LINK')  ?: 'https://covildopaihiago.hotmart.host/aprendadeverdade',
        'ebook_link'    => getenv('EBOOK_LINK')    ?: 'https://paihiagosalles.com/brindes/eBook Covil.pdf',
        'hotmart_token' => getenv('HOTMART_TOKEN') ?: '',
    ];

    // Loga aviso se variáveis obrigatórias estiverem ausentes
    if (empty($config['hotmart_token'])) {
        logMessage('WARNING', 'HOTMART_TOKEN não definido no .env', $context);
    }

    if (empty($config['admin_email'])) {
        logMessage('WARNING', 'ADMIN_EMAIL não definido no .env', $context);
    }

    return $config;

} catch (Throwable $e) {
    logMessage('ERROR', 'Falha ao carregar config.php: ' . $e->getMessage(), $context);
    return [];
}
