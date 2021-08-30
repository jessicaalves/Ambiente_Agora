<?php

/* @author jessica */

namespace App\adms\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsAlterarSituacaoDenuncia {

    private $resultado;
    private $dados;
    private $dadosId;

    function getResultado() {
        return $this->resultado;
    }

    public function visualizarDenuncia($dadosId) {
        $this->dadosId = (int) $dadosId;
        $visualizarDenuncia = new \App\adms\Models\helper\AdmsRead();
        $visualizarDenuncia->fullRead("SELECT denun.* FROM sts_denuncias_comuns denun
                 INNER JOIN adms_status_denuncias sta ON sta.id=denun.sts_status_denuncia_id
                 WHERE denun.id =:id LIMIT :limit", "id=" . $this->dadosId . "&limit=1");
        $this->resultado = $visualizarDenuncia->getResultado();
        return $this->resultado;
    }

    public function alterarDenuncia(array $dados) {
        $this->dados = $dados;
//        $this->apelido = $this->dados['apelido'];
//        unset($this->dados['apelido']);

        $validarCampos = new \App\adms\Models\helper\AdmsValidarCampoVazio();
        $validarCampos->validarDados($this->dados);

        if ($validarCampos->getResultado()) {
            $this->validarCampos();
        } else {
            $this->resultado = false;
        }
    }

    private function validarCampos() {
        $validarEmail = new \App\adms\Models\helper\AdmsEmail();
        $validarEmail->validarEmail($this->dados['email']);

        $validarEmailUnico = new \App\adms\Models\helper\AdmsEmailUnico();
        $editarUnico = true;
        $validarEmailUnico->validarEmailUnico($this->dados['email'], $editarUnico, $this->dados['id']);

        $validarUsuario = new \App\adms\Models\helper\AdmsValidarUsuario();
        $validarUsuario->validarUsuario($this->dados['login'], $editarUnico, $this->dados['id']);

        $validarSenha = new \App\adms\Models\helper\AdmsValidarSenha();
        $validarSenha->validarSenha($this->dados['senha']);

        if (( $validarUsuario->getResultado()) AND ( $validarEmailUnico->getResultado()) AND ( $validarEmail->getResultado()) AND ( $validarSenha->getResultado())) {
            $this->updateAlterarDenuncia();
        } else {
            $this->resultado = false;
        }
    }

    private function updateAlterarDenuncia() {
        //$this->dados['senha'] = password_hash($this->dados['senha'], PASSWORD_DEFAULT); //Criptografando a senha;
        //$this->dados['apelido'] = $this->apelido;
        $this->dados['modified'] = date("Y-m-d H:i:s");
        $upAltSenha = new \App\adms\Models\helper\AdmsUpdate();
        $upAltSenha->exeUpdate("sts_denuncias_comuns", $this->dados, "WHERE id =:id", "id=" . $this->dados['id']);
        if ($upAltSenha->getResultado()) {
            $_SESSION['msg'] = "<div class='alert alert-success'>Status da denúncia alterado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao alterar status da denúncia!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        }
    }

    public function listarCadastrar() {
        $listar = new \App\adms\Models\helper\AdmsRead();        

        $listar->fullRead("SELECT id id_sts, nome nome_sts FROM adms_status_denuncias ORDER BY nome ASC");
        $registro['sts'] = $listar->getResultado();

        $this->resultado = ['sts' => $registro['sts']];
        return $this->resultado;
    }

}
