<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/phpmailer/src/Exception.php';
require_once __DIR__ . '/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/phpmailer/src/SMTP.php';
require_once __DIR__ . '/logger.php'; // integração com o sistema de logs

/**
 * =========================================================
 *  MAILER — Sistema de envio de e-mails com anexo (PHPMailer)
 *  Covil do Pai Hiago
 * =========================================================
 * 
 * 🔹 Lê credenciais do .env via getenv()
 * 🔹 Envia o e-book anexado
 * 🔹 Gera logs detalhados de sucesso e falha
 */

function enviarEmailEbook(string $destinatario, string $nome, string $whatsapp): bool
{
    $mail = new PHPMailer(true);
    $context = 'MAILER';

    try {
        // === Configurações SMTP ===
        $mail->isSMTP();
        $mail->Host       = getenv('SMTP_HOST');
        $mail->SMTPAuth   = true;
        $mail->Username   = getenv('SMTP_USER');
        $mail->Password   = getenv('SMTP_PASS');
        $mail->SMTPSecure = getenv('SMTP_SECURE') === 'tls'
                            ? PHPMailer::ENCRYPTION_STARTTLS
                            : PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = getenv('SMTP_PORT') ?: 587;

        // === Remetente e destinatário ===
        $remetenteEmail = getenv('MAIL_FROM') ?: 'contato@seudominio.com';
        $remetenteNome  = getenv('MAIL_NAME') ?: 'Covil do Pai Hiago';
        $mail->setFrom($remetenteEmail, $remetenteNome);
        $mail->addAddress($destinatario, $nome);

        // === Anexa o E-book ===
        $ebookPath = __DIR__ . '/../brindes/eBook Covil.pdf';
        if (file_exists($ebookPath)) {
            $mail->addAttachment($ebookPath, 'Seu E-book Covil do Pai Hiago.pdf');
        } else {
            logMessage('WARNING', "E-book não encontrado em: {$ebookPath}", $context);
        }

        // === Configuração do corpo do e-mail ===
        $mail->isHTML(true);
        $mail->Subject = '📘 Seu e-book do Covil do Pai Hiago chegou!';

        $mail->Body = "
        <html>
        <body style='font-family: Arial, sans-serif; color: #f5f5f5; background:#000; padding: 30px;'>
            <div style='max-width:600px;margin:auto;background:#111;border:1px solid #daa520;border-radius:12px;padding:25px;box-shadow:0 0 20px rgba(218,165,32,0.3);'>
                <h2 style='color:#ffd700;text-align:center;'>Olá, {$nome} 👋</h2>
                <p>Você acaba de receber o seu <strong>E-book do Covil do Pai Hiago</strong>!</p>
                <p>O arquivo foi anexado a este e-mail. Caso não o veja, verifique sua caixa de spam ou promoções.</p>
                <p><strong>WhatsApp informado:</strong> {$whatsapp}</p>
                <hr style='border:0;border-top:1px solid rgba(218,165,32,0.3);margin:20px 0;'>
                <p style='color:#bbb;text-align:center;'>Axé e bons estudos,<br><strong>Equipe do Covil ⚜️</strong></p>
            </div>
        </body>
        </html>";

        $mail->AltBody = "Olá, {$nome}. Seu e-book do Covil do Pai Hiago está em anexo. Axé e bons estudos!";

        // === Envia ===
        $mail->send();
        logMessage('INFO', "E-mail enviado com sucesso para {$destinatario}", $context);
        return true;

    } catch (Exception $e) {
        $erro = $mail->ErrorInfo ?: $e->getMessage();
        logMessage('ERROR', "Falha ao enviar e-mail para {$destinatario}: {$erro}", $context);
        return false;
    }
}
