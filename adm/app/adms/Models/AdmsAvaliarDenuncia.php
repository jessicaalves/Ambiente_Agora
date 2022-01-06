<?php

/* @author jessica */

namespace App\adms\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsAvaliarDenuncia {

    private $resultado;
    private $dados;
    private $dadosId;

    function getResultado() {
        return $this->resultado;
    }

    public function visualizarDenuncia($dadosId) {
        $this->dadosId = (int) $dadosId;
        $visualizarDenunciaComum = new \App\adms\Models\helper\AdmsRead();
        $visualizarDenunciaComum->fullRead("SELECT denun.id, denun.sts_status_denuncia_id, denun.sts_descricao_stat_id, denun.parecer_tecnico 
                 FROM sts_denuncias_comuns AS denun
                 INNER JOIN sts_status_denuncias AS stat ON stat.id=denun.sts_status_denuncia_id
                 INNER JOIN sts_descricoes_status_denuncias AS descr ON descr.id=denun.sts_descricao_stat_id
                 WHERE denun.id =:id LIMIT :limit", "id=" . $this->dadosId . "&limit=1");
        $this->resultado = $visualizarDenunciaComum->getResultado();
        return $this->resultado;
    }

    public function avaliarDenuncia(array $dados) {
        
        $this->dados = $dados;

        $validarCampos = new \App\adms\Models\helper\AdmsValidarCampoVazio();
        $validarCampos->validarDados($this->dados);

        if ($validarCampos->getResultado()) {
            $this->updateAvaliarDenuncia();
        } else {
            $this->resultado = false;
        }
    }

    private function updateAvaliarDenuncia() {
        $this->dados['modified'] = date("Y-m-d H:i:s");
        $upAltStatDenun = new \App\adms\Models\helper\AdmsUpdate();
        $upAltStatDenun->exeUpdate("sts_denuncias_comuns", $this->dados, "WHERE id =:id", "id=" . $this->dados['id']);
        if ($upAltStatDenun->getResultado()) {
            $_SESSION['msg'] = "<div class='alert alert-success'>Denúncia avaliada com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Erro ao avaliar denúncia!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        }
    }

    public function listarCadastrar() {
        $listar = new \App\adms\Models\helper\AdmsRead();

        $listar->fullRead("SELECT id id_stat, nome nome_stat FROM sts_status_denuncias ORDER BY nome ASC");
        $registro['stat'] = $listar->getResultado();

        $listar->fullRead("SELECT id id_descr, descricao descr_stat FROM sts_descricoes_status_denuncias");
        $registro['descr'] = $listar->getResultado();

        $this->resultado = ['stat' => $registro['stat'], 'descr' => $registro['descr']];
        return $this->resultado;
    }

}
