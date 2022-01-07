<?php

/* @author jessica */

namespace App\adms\Models\helper;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsPhpMailer {

    private $resultado;
    private $dados;

    function getResultado() {
        return $this->resultado;
    }

    public function emailPhpMailer(array $dados) {
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
        $host = 'smtp.mailtrap.io';
        $username = 'a5a169fb92c731';
        $password = '35572db7490e62';     
        $porta = '2525';

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host = $host;                           // Set the SMTP server to send through
            $mail->SMTPAuth = true;                                     // Enable SMTP authentication
            $mail->Username = $username;                         // SMTP username
            $mail->Password = $password;                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = $porta;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            //Recipients
            //$mail->setFrom('_mainaccount@ambienteagora.space', 'Ambiente Agora');
            //$mail->addAddress('jessicaalvesferreira24@gmail.com', 'Jéssica');     // Add a recipient

            $mail->setFrom($this->dados['email'], $this->dados['nome']);
            $mail->addAddress($this->dados['dest_email'], $this->dados['dest_nome']);     // Add a recipient
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $this->dados['titulo_email'];
            $mail->Body = $this->dados['cont_email'];
            $mail->AltBody = $this->dados['cont_text_email'];

            if ($mail->send()) {
                $this->resultado = true;
            } else {
                $this->resultado = false;
            }
        } catch (Exception $e) {
            $this->resultado = false;
        }
    }

}
