<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class ApagarNivelAcesso {

    private $dadosId;

    public function apagarNivelAcesso($dadosId = null) {
        $this->dadosId = (int) $dadosId;
        if (!empty($this->dadosId)) {
            $apagarNivAc = new \App\adms\Models\AdmsApagarNivelAcesso();
            $apagarNivAc->apagarNivelAcesso($this->dadosId);
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Necessário selecionar um nível de acesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }
        $UrlDestino = URLADM . 'listar-niveis-acesso/listar-niveis-acesso';
        header("Location: $UrlDestino");
    }

}
