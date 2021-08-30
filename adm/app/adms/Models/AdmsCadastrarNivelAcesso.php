<?php

/* @author jessica */

namespace App\adms\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsCadastrarNivelAcesso {

    private $resultado;
    private $dados;
    private $ultimoNivAc;

    function getResultado() {
        return $this->resultado;
    }

    public function cadastrarNivelAcesso(array $dados) {
        $this->dados = $dados;

        $validarCampos = new \App\adms\Models\helper\AdmsValidarCampoVazio();
        $validarCampos->validarDados($this->dados);

        if ($validarCampos->getResultado()) {
            $this->inserirNivelAcesso();
        } else {
            $this->resultado = false;
        }
    }

    private function inserirNivelAcesso() {
        $this->dados['created'] = date("Y-m-d H:i:s");
        $this->verUltimoNivAcesso();
        $this->dados['ordem'] = $this->ultimoNivAc[0]['ordem'] + 1;
        $cadUsuario = new \App\adms\Models\helper\AdmsCreate();
        $cadUsuario->executarCreate("adms_niveis_acessos", $this->dados);
        if ($cadUsuario->getResultado()) {
            $_SESSION['msg'] = "<div class='alert alert-success'>Nível de acesso cadastrado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = true;
            $this->dados['id'] = $cadUsuario->getResultado();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao cadastrar nível de acesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        }
    }

    private function verUltimoNivAcesso() {
        $verNivAc = new \App\adms\Models\helper\AdmsRead();
        $verNivAc->fullRead("SELECT ordem FROM adms_niveis_acessos ORDER BY ordem DESC LIMIT :limit", "&limit=1");
        $this->ultimoNivAc = $verNivAc->getResultado();
    }

}
