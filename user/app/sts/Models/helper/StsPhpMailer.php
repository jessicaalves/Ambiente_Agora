<?php

/* @author jessica */

namespace Sts\Models\helper;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsPhpMailer {

    private $resultado;
    private $dados;
    
    function getResultado() {
        return $this->resultado;
    }
    
    public function emailPhpMailer($dados) {
        
        $this->dados = $dados;
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
           // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host = 'smtp.mailtrap.io';                           // Set the SMTP server to send through
            $mail->SMTPAuth = true;                                     // Enable SMTP authentication
            $mail->Username = 'a5a169fb92c731';                         // SMTP username
            $mail->Password = '35572db7490e62';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = 2525;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            
            //Recipients
            //$mail->setFrom('_mainaccount@ambienteagora.space', 'Ambiente Agora');
            //$mail->addAddress('jessicaalvesferreira24@gmail.com', 'Jéssica');     // Add a recipient
            
            $mail->setFrom('jessicaalvesferreira24@gmail.com', 'Ambiente Agora');
            $mail->addAddress($this->dados['dest_email'], $this->dados['dest_nome']);     // Add a recipient
           
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $this->dados['titulo_email'];
            $mail->Body = $this->dados['cont_email'];
            $mail->AltBody = $this->dados['cont_text_email'];

            if($mail->send()){
                $this->resultado = true;
            }else{
                $this->resultado = false;
            }
            
        } catch (Exception $e) {
            $this->resultado = false;
        }
    }

}
