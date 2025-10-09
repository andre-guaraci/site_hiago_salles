<?php
/**
 * =========================================================
 *  LOGGER — Sistema de Log Profissional
 *  Covil do Pai Hiago
 * =========================================================
 * 
 * 🔹 Cria automaticamente /logs/system.log
 * 🔹 Registra data, hora, tipo e mensagem
 * 🔹 Evita conflitos com error_log do PHP
 * 🔹 Pode ser usado globalmente no projeto
 * 🔹 Protege contra falhas de permissão e concorrência
 */

if (!function_exists('logMessage')) {

    /**
     * Escreve uma mensagem no log principal do sistema
     * 
     * @param string $level   Nível do log (INFO, WARNING, ERROR, DEBUG)
     * @param string $message Mensagem a registrar
     * @param string|null $context (opcional) Origem do log (ex: ENV_LOADER, FORM_HANDLER)
     */
    function logMessage(string $level, string $message, ?string $context = null): void
    {
        try {
            $logDir = __DIR__ . '/../logs';
            $file = $logDir . '/system.log';

            // Cria diretório se não existir
            if (!is_dir($logDir)) {
                mkdir($logDir, 0755, true);
            }

            // Garante permissão de escrita
            if (!is_writable($logDir)) {
                throw new RuntimeException("Diretório de logs sem permissão de escrita: $logDir");
            }

            // Data formatada
            $date = date('Y-m-d H:i:s');

            // Formato do log: [DATA] [NÍVEL] [CONTEXTO] Mensagem
            $entry = sprintf(
                "[%s] [%s] [%s] %s%s",
                $date,
                strtoupper($level),
                $context ?? 'APP',
                trim($message),
                PHP_EOL
            );

            // Escreve no arquivo com trava de concorrência
            file_put_contents($file, $entry, FILE_APPEND | LOCK_EX);
        } catch (Throwable $e) {
            // Fallback seguro — evita crash em produção
            error_log("LOGGER ERROR: " . $e->getMessage());
        }
    }
}
