<?php

/* @author jessica */

namespace App\adms\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsAlterarStatusDenunciaComum {

    private $resultado;
    private $dados;
    private $dadosId;

    function getResultado() {
        return $this->resultado;
    }

    public function visualizarDenunciaComum($dadosId) {
        $this->dadosId = (int) $dadosId;
        $visualizarDenunciaComum = new \App\adms\Models\helper\AdmsRead();
        $visualizarDenunciaComum->fullRead("SELECT denun.* FROM sts_denuncias_comuns denun
                 INNER JOIN adms_status_denuncias stat ON stat.id=denun.sts_status_denuncia_id
                 WHERE denun.id =:id LIMIT :limit", "id=" . $this->dadosId . "&limit=1");
        $this->resultado = $visualizarDenunciaComum->getResultado();
        return $this->resultado;
    }

    public function alterarStatusDenunciaComum(array $dados) {
        $this->dados = $dados;

        $validarCampos = new \App\adms\Models\helper\AdmsValidarCampoVazio();
        $validarCampos->validarDados($this->dados);

        if ($validarCampos->getResultado()) {
            $this->updateAlterarStatusDenuncia();
        } else {
            $this->resultado = false;
        }
    }

    private function updateAlterarStatusDenuncia() {
        $this->dados['modified'] = date("Y-m-d H:i:s");
        $upAltStatDenun = new \App\adms\Models\helper\AdmsUpdate();
        $upAltStatDenun->exeUpdate("sts_denuncias_comuns", $this->dados, "WHERE id =:id", "id=" . $this->dados['id']);
        if ($upAltStatDenun->getResultado()) {
            $_SESSION['msg'] = "<div class='alert alert-success'>Status da denúncia alterado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Erro ao alterar status da denúncia!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        }
    }

    public function listarCadastrar() {
        $listar = new \App\adms\Models\helper\AdmsRead();

        $listar->fullRead("SELECT id id_stat, nome nome_stat FROM adms_status_denuncias ORDER BY nome ASC");
        $registro['stat'] = $listar->getResultado();

        $this->resultado = ['stat' => $registro['stat']];
        return $this->resultado;
    }

}
