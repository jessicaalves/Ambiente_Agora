<?php

/* @author jessica */

namespace App\adms\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsAlterarNivelAcesso {

    private $resultado;
    private $dados;
    private $dadosId;

    function getResultado() {
        return $this->resultado;
    }

    public function visualizarNivelAcesso($dadosId) {
        $this->dadosId = (int) $dadosId;
        $visualizarNivelAcesso = new \App\adms\Models\helper\AdmsRead();
        $visualizarNivelAcesso->fullRead("SELECT * FROM adms_niveis_acessos
                WHERE id =:id AND ordem >=:ordem LIMIT :limit", "id=" . $this->dadosId . "&ordem=" . $_SESSION['ordem_nivac'] . "&limit=1");
        $this->resultado = $visualizarNivelAcesso->getResultado();
        return $this->resultado;
    }

    public function alterarNivelAcesso(array $dados) {
        $this->dados = $dados;

        $validarCampos = new \App\adms\Models\helper\AdmsValidarCampoVazio();
        $validarCampos->validarDados($this->dados);

        if ($validarCampos->getResultado()) {
            $this->updateEditNivAc();
        } else {
            $this->resultado = false;
        }
    }

    private function updateEditNivAc() {
        $this->dados['modified'] = date("Y-m-d H:i:s");
        $upAltNivAc = new \App\adms\Models\helper\AdmsUpdate();
        $upAltNivAc->exeUpdate("adms_niveis_acessos", $this->dados, "WHERE id =:id", "id=" . $this->dados['id']);
        if ($upAltNivAc->getResultado()) {
            $_SESSION['msg'] = "<div class='alert alert-success'>Nível de acesso atualizado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: O nível de acesso não foi atualizado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        }
    }

}
