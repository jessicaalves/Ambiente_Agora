<?php

/* @author jessica */

namespace App\adms\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsLogin {

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
            $validarLogin = new \App\adms\Models\helper\AdmsRead();
            $validarLogin->fullRead("SELECT user.id, user.senha, user.nome, user.email, user.adms_nivel_acesso_id, user.adms_sit_usuario_id,
                    nivac.ordem ordem_nivac
                    FROM adms_usuarios user
                    INNER JOIN adms_niveis_acessos nivac ON nivac.id=user.adms_nivel_acesso_id
                    WHERE login =:login LIMIT :limit", "login={$this->dados['login']}&limit=1");
            $this->resultado = $validarLogin->getResultado();
            //var_dump($this->resultado);
            if ($this->resultado) {
                $this->valEmailPerm();
            } else {
                $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Login não cadastrado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                $this->resultado = false;
            }
        }
    }

    private function valEmailPerm() {
        if ($this->resultado[0]['adms_sit_usuario_id'] == 3) {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Necessário confirmar o e-mail!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        } else if ($this->resultado[0]['adms_sit_usuario_id'] == 5) {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: E-mail descadastrado, entre em contato com a empresa!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        } else if ($this->resultado[0]['adms_sit_usuario_id'] == 2) {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: E-mail inativo, entre em contato com a empresa!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        } else {
            $this->validarSenha();
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
            $_SESSION['adms_nivel_acesso_id'] = $this->resultado[0]['adms_nivel_acesso_id'];
            $_SESSION['ordem_nivac'] = $this->resultado[0]['ordem_nivac'];
            $this->resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Senha incorreta!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        }
    }

}
