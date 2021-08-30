<?php

/* @author jessica */

namespace App\adms\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsAlterarOrdemNivelAcesso {

    private $dadosId;
    private $resultado;
    private $dados;
    private $dadosNivAc;
    private $dadosNivAvInferior;

    function getResultado() {
        return $this->resultado;
    }

    public function alterarOrdemNivelAcesso($dadosId = null) {
        $this->dadosId = (int) $dadosId;
        $this->verNivelAcesso($this->dadosId);
        if ($this->dadosNivAc) {
            $this->verfNivAcInferior();
            $this->exeAltOrdemNivAc();
        }
    }

    private function verNivelAcesso($dadosId) {
        $this->dadosId = (int) $dadosId;
        $verNivAc = new \App\adms\Models\helper\AdmsRead();
        $verNivAc->fullRead("SELECT * FROM adms_niveis_acessos
                WHERE id =:id AND ordem >:ordem LIMIT :limit", "id=" . $this->dadosId . "&ordem=" . $_SESSION['ordem_nivac'] . "&limit=1");
        $this->dadosNivAc = $verNivAc->getResultado();
    }

    private function verfNivAcInferior() {
        $ordem_super = $this->dadosNivAc[0]['ordem'] - 1;
        $verNivAc = new \App\adms\Models\helper\AdmsRead();
        $verNivAc->fullRead("SELECT id, ordem FROM adms_niveis_acessos WHERE ordem =:ordem", "ordem={$ordem_super}");
        $this->dadosNivAvInferior = $verNivAc->getResultado();
    }

    private function exeAltOrdemNivAc() {
        $this->dados['ordem'] = $this->dadosNivAc[0]['ordem'];
        $this->dados['modified'] = date("Y-m-d H:i:s");
        $upMvBaixo = new \App\adms\Models\helper\AdmsUpdate();
        $upMvBaixo->exeUpdate("adms_niveis_acessos", $this->dados, "WHERE id =:id", "id={$this->dadosNivAvInferior[0]['id']}");

        $this->dados['ordem'] = $this->dadosNivAc[0]['ordem'] - 1;
        $upMvCima = new \App\adms\Models\helper\AdmsUpdate();
        $upMvCima->exeUpdate("adms_niveis_acessos", $this->dados, "WHERE id =:id", "id={$this->dadosNivAc[0]['id']}");

        if ($upMvCima->getResultado()) {
            $_SESSION['msg'] = "<div class='alert alert-success'>Ordem do nível de acesso alterada com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Erro ao alterar a ordem do nível de acesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        }
    }

}
