<?php

/* @author jessica */

namespace App\adms\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsAlterarDadosCadastrais {

    private $dados;
    private $resultado;

    function getResultado() {
        return $this->resultado;
    }

    public function alterarDadosCadastrais(array $dados) {
        $this->dados = $dados;
        $this->apelido = $this->dados['apelido'];
        unset($this->dados['apelido']);

        $validarCampos = new \App\adms\Models\helper\AdmsValidarCampoVazio();
        $validarCampos->validarDados($this->dados);

        if ($validarCampos->getResultado()) {
            $validarEmail = new \App\adms\Models\helper\AdmsEmail();
            $validarEmail->validarEmail($this->dados['email']);

            $validarEmailUnico = new \App\adms\Models\helper\AdmsEmailUnico();
            $editarUnico = true;
            $validarEmailUnico->validarEmailUnico($this->dados['email'], $editarUnico, $_SESSION['id']);

            $validarUsuario = new \App\adms\Models\helper\AdmsValidarUsuario();
            $validarUsuario->validarUsuario($this->dados['login'], $editarUnico, $_SESSION['id']);

            $validarSenha = new \App\adms\Models\helper\AdmsValidarSenha();
            $validarSenha->validarSenha($this->dados['senha']);
            if (( $validarSenha->getResultado())AND ( $validarUsuario->getResultado()) AND ( $validarEmailUnico->getResultado()) AND ( $validarEmail->getResultado())) {
                $this->updateAlterarDadosCadastrais();
            } else {
                $this->resultado = false;
            }
        } else {
            $this->resultado = false;
        }
    }

    private function updateAlterarDadosCadastrais() {
        $this->dados['senha'] = password_hash($this->dados['senha'], PASSWORD_DEFAULT); //Criptografando a senha;
        $this->dados['apelido'] = $this->apelido;
        $this->dados['modified'] = date("Y-m-d H:i:s");

        $upAltSenha = new \App\adms\Models\helper\AdmsUpdate();
        $upAltSenha->exeUpdate("adms_usuarios", $this->dados, "WHERE id =:id", "id=" . $_SESSION['id']);
        if ($upAltSenha->getResultado()) {
            $_SESSION['msg'] = "<div class='alert alert-success'>Dados cadastrais alterados com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao alterar dados cadastrais!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        }
    }

}
