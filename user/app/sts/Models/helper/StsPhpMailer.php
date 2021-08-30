<?php

/* @author jessica */

namespace App\sts\Models\helper;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsPhpMailer {

    private $resultado;
    private $dados;
    private $dadosCredEmail;

    function getResultado() {
        return $this->resultado;
    }

    public function emailPhpMailer($dados) {

        $this->dados = $dados;

        $credEmail = new \App\sts\Models\helper\StsRead();
        $credEmail->fullRead("SELECT * FROM sts_confirmar_email WHERE id =:id LIMIT :limit", "id=1&limit=1");
        $this->dadosCredEmail = $credEmail->getResultado();

        if ((isset($this->dadosCredEmail[0]['host'])) AND ( !empty($this->dadosCredEmail[0]['host']))) {
            $this->confEmail();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Necessário inserir as credenciais do e-mail no admnistrativo para confirmar e-mail!</div>";
            $this->resultado = false;
        }
    }

    private function confEmail() {
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host = $this->dadosCredEmail[0]['host'];                           // Set the SMTP server to send through
            $mail->SMTPAuth = true;                                     // Enable SMTP authentication
            $mail->Username = $this->dadosCredEmail[0]['usuario'];                         // SMTP username
            $mail->Password = $this->dadosCredEmail[0]['senha'];                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = $this->dadosCredEmail[0]['porta'];                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            //Recipients
            //$mail->setFrom('_mainaccount@ambienteagora.space', 'Ambiente Agora');
            //$mail->addAddress('jessicaalvesferreira24@gmail.com', 'Jéssica');     // Add a recipient

            $mail->setFrom($this->dadosCredEmail[0]['email'], $this->dadosCredEmail[0]['nome']);
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
