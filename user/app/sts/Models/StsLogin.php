<?php

/* @author jessica */

namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsLogin {

    private $dados;
    private $resultado;

    function getResultado() {
        return $this->resultado;
    }

    public function acesso(array $dados) {

        //var_dump($this->dados);
        $this->dados = $dados;
        $this->validarDados();
        if ($this->resultado) {
            $validarLogin = new \Sts\Models\helper\StsRead();
            $validarLogin->fullRead("SELECT user.id, user.senha, user.nome, user.email, user.id_permissao_acesso,
                    perm.ordem ordem_perm
                    FROM sts_usuario user
                    INNER JOIN sts_permissao_acesso perm ON
                    perm.id=user.id_permissao_acesso
                    WHERE login =:login LIMIT :limit", "login={$this->dados['login']}&limit=1");
            $this->resultado = $validarLogin->getResultado();
            //var_dump($this->resultado);
            if ($this->resultado) {
                $this->validarSenha();
            } else {
                $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Login não cadastrado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
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

    private function validarSenha() {
        if (password_verify($this->dados['senha'], $this->resultado[0]['senha'])) {
            $_SESSION['id'] = $this->resultado[0]['id'];
            $_SESSION['senha'] = $this->resultado[0]['senha'];
            $_SESSION['nome'] = $this->resultado[0]['nome'];
            $_SESSION['email'] = $this->resultado[0]['email'];
            $_SESSION['ordem_perm'] = $this->resultado[0]['ordem_perm'];
            $this->resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Senha incorreta!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        }
    }

}
