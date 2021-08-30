<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AlterarOrdemNivelAcesso {

    private $dadosId;

    public function alterarOrdemNivelAcesso($dadosId = null) {
        $this->dadosId = (int) $dadosId;
        if (!empty($this->dadosId)) {
            $altOrdemNivelAcesso = new \App\adms\Models\AdmsAlterarOrdemNivelAcesso();
            $altOrdemNivelAcesso->alterarOrdemNivelAcesso($this->dadosId);
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Necessário selecionar um nível de acesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }
        $UrlDestino = URLADM . 'listar-niveis-acesso/listar-niveis-acesso';
        header("Location: $UrlDestino");
    }

}
