<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class ApagarUsuario {

    private $dadosId;

    public function apagarUsuario($dadosId = null) {
        $this->dadosId = (int) $dadosId;
        if (!empty($this->dadosId)) {
            $apagarUsuario = new \App\adms\Models\AdmsApagarUsuario();
            $apagarUsuario->apagarUsuario($this->dadosId);
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Necessário selecionar um usuário!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }
        $UrlDestino = URLADM . 'listar-usuarios/listar-usuarios';
        header("Location: $UrlDestino");
    }

}
