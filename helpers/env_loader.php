<?php
/**
 * =========================================================
 *  ENV LOADER PRO
 *  Covil do Pai Hiago
 * =========================================================
 * 
 * 🔹 Lê variáveis de ambiente do arquivo .env
 * 🔹 Armazena em cache (otimiza performance)
 * 🔹 Integra com logger (INFO, WARNING, ERROR)
 * 🔹 Evita sobrescrita acidental de variáveis
 */

require_once __DIR__ . '/logger.php';

if (!function_exists('loadEnv')) {

    /**
     * Carrega variáveis de ambiente a partir do arquivo .env
     *
     * @param string|null $path Caminho do arquivo .env (padrão: raiz do projeto)
     * @return void
     */
    function loadEnv(?string $path = null): void
    {
        static $isLoaded = false; // Cache de carregamento
        $context = 'ENV_LOADER';

        if ($isLoaded) {
            logMessage('DEBUG', 'Arquivo .env já carregado (cache ativo)', $context);
            return;
        }

        $path = $path ?? __DIR__ . '/../config/.env';

        if (!file_exists($path)) {
            logMessage('ERROR', "Arquivo .env não encontrado em: {$path}", $context);
            return;
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if (!$lines) {
            logMessage('WARNING', 'Arquivo .env vazio ou ilegível.', $context);
            return;
        }

        foreach ($lines as $line) {
            $line = trim($line);

            // Ignora comentários
            if (str_starts_with($line, '#')) {
                continue;
            }

            // Divide chave=valor
            [$key, $value] = array_map('trim', explode('=', $line, 2) + [null, null]);

            if (empty($key)) {
                logMessage('WARNING', "Linha inválida no .env: '{$line}'", $context);
                continue;
            }

            // Remove aspas duplas ou simples do valor
            $value = trim($value, "\"'");

            // Define variável se ainda não estiver definida
            if (getenv($key) === false && !isset($_ENV[$key])) {
                putenv("$key=$value");
                $_ENV[$key] = $value;
                $_SERVER[$key] = $value;
            } else {
                logMessage('DEBUG', "Variável já existente ignorada: {$key}", $context);
            }
        }

        $isLoaded = true;
        logMessage('INFO', 'Arquivo .env carregado com sucesso.', $context);
    }
}
