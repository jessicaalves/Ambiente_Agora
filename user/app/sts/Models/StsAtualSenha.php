<?php

/* @author jessica */

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsAtualSenha {

    private $chave;
    private $dadosUsuario;
    private $resultado;
    private $dados;

    function getResultado() {
        return $this->resultado;
    }

    public function valChave($chave) {
        $this->chave = (string) $chave;
        $validaChave = new \App\sts\Models\helper\StsRead();
        $validaChave->fullRead("SELECT id FROM sts_usuarios WHERE recuperar_senha =:recuperar_senha", "recuperar_senha={$this->chave}");
        $this->dadosUsuario = $validaChave->getResultado();
        if (!empty($this->dadosUsuario)) {
            $this->resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Link inválido!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        }
    }

    public function atualSenha(array $dados) {
        $this->dados = $dados;
        $this->validarDados();
        if ($this->resultado) {
            $valSenha = new \App\sts\Models\helper\StsValidarSenha();
            $valSenha->validarSenha($this->dados['senha']);
            if ($valSenha->getResultado()) {
                $this->updateAtualSenha();
            } else {
                $this->resultado = false;
            }
        }
    }

    private function validarDados() {
        $this->dados = array_map('strip_tags', $this->dados);
        $this->dados = array_map('trim', $this->dados);
        if (in_array('', $this->dados)) {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Necessário preencher todos os campos!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        } else {
            $this->resultado = true;
        }
    }

    private function updateAtualSenha() {
        $this->valChave($this->dados['recuperar_senha']);
        if ($this->resultado) {
            $this->dados['recuperar_senha'] = NULL;
            $this->dados['senha'] = password_hash($this->dados['senha'], PASSWORD_DEFAULT);
            $this->dados['modified'] = date("Y-m-d H:i:s");
            $upAtualSenha = new \App\sts\Models\helper\StsUpdate();
            $upAtualSenha->exeUpdate("sts_usuarios", $this->dados, "WHERE id =:id", "id={$this->dadosUsuario[0]['id']}");
            if ($upAtualSenha->getResultado()) {
                $_SESSION['msg'] = "<div class='alert alert-success'>Senha atualizada com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                $this->resultado = true;
            } else {
                $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: A senha não foi atualizada!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                $this->resultado = false;
            }
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: A senha não foi atualizada!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        }
    }

}