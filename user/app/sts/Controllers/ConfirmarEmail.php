<?php

/* @author jessica */

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class ConfirmarEmail {

    private $dadosChave;

    public function index() {
        $confirmarEmail = new ConfirmarEmail();
        $confirmarEmail->confirmarEmail();
    }

    public function confirmarEmail() {
        $this->dadosChave = filter_input(INPUT_GET, 'chave', FILTER_SANITIZE_STRING);
        if (!empty($this->dadosChave)) {
            $confirmarEmail = new \App\sts\Models\StsConfirmarEmail();
            $confirmarEmail->confirmarEmail($this->dadosChave);
            if ($confirmarEmail->getResultado()) {
                $urlDestino = URL . 'user/login/acesso-login';
                header("Location: $urlDestino");
            } else {
                $urlDestino = URL . 'user/login/acesso-login';
                header("Location: $urlDestino");
            }
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Link de confirmação inválido!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $urlDestino = URL . 'user/login/acesso-login';
            header("Location: $urlDestino");
        }
    }

}
