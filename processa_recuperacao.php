<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\vendor\autoload.php';

if (isset($_POST['email'])) {
    $email = addslashes($_POST['email']);

    if (!empty($email)) {
        try {
            $mail = new PHPMailer(true);
            
            // Configurações do servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'macacodoido96@gmail.com';
            $mail->Password = 'Samuel@4500009'; // Se a verificação em duas etapas está ativada, gere uma senha específica de aplicativo.
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
            $mail->Port = 587;
            
            // Debugging (opcional, remova em produção)
            $mail->SMTPDebug = 2; // Ou 1 para menos detalhes
            $mail->Debugoutput = 'html';

            // Configurações do e-mail a ser enviado
            $mail->setFrom('macacodoido96@gmail.com', 'Paim');
            $mail->addAddress($email); // E-mail do destinatário
            $mail->Subject = 'Recuperação de Senha';
            $mail->isHTML(true);
            $mail->Body = "Clique no link a seguir para resetar sua senha: <a href='http://seu_site.com/resetar_senha.php?email={$email}'>Recuperar Senha</a>";

            // Envio do e-mail
            $mail->send();
            header("Location: esqueci_senha.php?status=enviado");
            exit;
        } catch (Exception $e) {
            echo "Erro ao enviar e-mail: {$mail->ErrorInfo}";
        }
    }
}
?>
