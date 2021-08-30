<?php

/* @author jessica */

namespace App\sts\Models\helper;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsValidarUsuario { //Responsável por validar o Usuário (Login)

    private $usuario;
    private $resultado;
    private $editarUnico;
    private $dadoId;

    function getResultado() {
        return $this->resultado;
    }

    public function validarUsuario($usuario, $editarUnico = null, $dadoId = null) {
        $this->usuario = (string) $usuario;
        $this->editarUnico = $editarUnico;
        $this->dadoId = $dadoId;

        $validarUsuario = new \App\sts\Models\helper\StsRead();
        
        if (!empty($this->editarUnico) AND ( $this->editarUnico == true)) {
            $validarUsuario->fullRead("SELECT id FROM sts_usuarios WHERE login =:login AND id <>:id LIMIT :limit", "login={$this->usuario}&limit=1&id={$this->dadoId}");
        }else{
            $validarUsuario->fullRead("SELECT id FROM sts_usuarios WHERE login =:login LIMIT :limit", "login={$this->usuario}&limit=1");
        }
        
        
        $this->resultado = $validarUsuario->getResultado();
        if (!empty($this->resultado)) {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Este usuário já está cadastrado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        } else {
            $this->validarCaracterUsuario();
        }
    }

    private function validarCaracterUsuario() {
        if (stristr($this->usuario, "'")) {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: O caracter ( ' ) utilizado no usuário é inválido!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        } else {
            if (stristr($this->usuario, " ")) {
                $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Proibido utilizar espaço em branco no usuário!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                $this->resultado = false;
            } else {
                $this->validarExtensaoUsuario();
            }
        }
    }

    private function validarExtensaoUsuario() {
        if (strlen($this->usuario) < 5) {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: O usuário deve conter no mínimo 5 caracteres!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        } else {
            $this->resultado = true;
        }
    }

}
