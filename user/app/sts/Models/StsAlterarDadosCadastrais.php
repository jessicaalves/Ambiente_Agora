<?php

/* @author jessica */

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsAlterarDadosCadastrais {

    private $dados;
    private $resultado;

    function getResultado() {
        return $this->resultado;
    }

    public function alterarDadosCadastrais(array $dados) {
        $this->dados = $dados;

        $validarCampos = new \App\sts\Models\helper\StsValidarCampoVazio();
        $validarCampos->validarDados($this->dados);

        $validarCpf = new \App\sts\Models\helper\StsValidarCpf();
        $editarUnico = true;
        $validarCpf->validarCpf($this->dados['cpf'], $editarUnico, $_SESSION['id']);

        if ($validarCampos->getResultado()) {
            $validarEmail = new \App\sts\Models\helper\StsEmail();
            $validarEmail->validarEmail($this->dados['email']);

            $validarEmailUnico = new \App\sts\Models\helper\StsEmailUnico();
            $editarUnico = true;
            $validarEmailUnico->validarEmailUnico($this->dados['email'], $editarUnico, $_SESSION['id']);

            $validarUsuario = new \App\sts\Models\helper\StsValidarUsuario();
            $validarUsuario->validarUsuario($this->dados['login'], $editarUnico, $_SESSION['id']);

            $validarSenha = new \App\sts\Models\helper\StsValidarSenha();
            $validarSenha->validarSenha($this->dados['senha']);

            $validarCpf = new \App\sts\Models\helper\StsValidarCpf();
            $validarCpf->validarCpf($this->dados['cpf'], $editarUnico, $_SESSION['id']);

            if (( $validarSenha->getResultado())AND ( $validarUsuario->getResultado()) AND ( $validarEmailUnico->getResultado()) AND ( $validarEmail->getResultado()) AND ( $validarCpf->getResultado())) {
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
        $this->dados['modified'] = date("Y-m-d H:i:s");

        $upAltSenha = new \App\sts\Models\helper\StsUpdate();
        $upAltSenha->exeUpdate("sts_usuarios", $this->dados, "WHERE id =:id", "id=" . $_SESSION['id']);
        if ($upAltSenha->getResultado()) {
            $_SESSION['msg'] = "<div class='alert alert-success'>Dados cadastrais alterados com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao alterar dados cadastrais!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        }
    }

}
