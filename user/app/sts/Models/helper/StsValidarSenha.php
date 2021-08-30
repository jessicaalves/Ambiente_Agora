<?php

/* @author jessica */

namespace App\sts\Models\helper;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsValidarSenha {

    private $senha;
    private $resultado;

    function getResultado() {
        return $this->resultado;
    }

    public function validarSenha($senha) {
        $this->senha = (string) $senha;
        if (stristr($this->senha, "'")) {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: O caractere ( ' ) utilizado na senha é inválido!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        } else {
            if (stristr($this->senha, " ")) {
                $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Proibido utilizar espaço em branco na senha!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                $this->resultado = false;
            } else {
                $this->validarExtensaoSenha();
            }
        }
    }

    private function validarExtensaoSenha() {
        if ((strlen($this->senha)) < 5) {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: A senha deve conter no mínimo 5 caracteres!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        } elseif ((strlen($this->senha)) > 10) {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: A senha deve conter no máximo 10 caracteres!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        } else {
            $this->resultado = true;
        }
    }

}
