<?php

/* @author jessica */

namespace App\adms\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsEsqueceuSenha {

    private $resultado;
    private $dadosEmail;
    private $dadosUsuario;
    private $dados;
    private $dadosUpdate;

    function getResultado() {
        return $this->resultado;
    }

    public function esqueceuSenha(array $dados) {
        $this->dados = $dados;
        $esqSenha = new \App\adms\Models\helper\AdmsRead();
        $esqSenha->fullRead("SELECT id, login, nome, recuperar_senha FROM adms_usuarios WHERE email =:email LIMIT :limit", "email={$this->dados['email']}&limit=1");
        $this->dadosUsuario = $esqSenha->getResultado();
        if (!empty($this->dadosUsuario)) {
            $this->validarChaveRecuperarSenha();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: E-mail não cadastrado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        }
    }

    private function validarChaveRecuperarSenha() {
        if (!empty($this->dadosUsuario[0]['recuperar_senha'])) {
            $this->dadosEmail();
        } else {
            $this->dadosUpdate['recuperar_senha'] = md5($this->dadosUsuario[0]['id'] . date('Y-m-d H:i:s'));
            $this->dadosUpdate['modified'] = date('Y-m-d H:i:s');

            $updateRecSenha = new \App\adms\Models\helper\AdmsUpdate();
            $updateRecSenha->exeUpdate("adms_usuarios", $this->dadosUpdate, "WHERE id =:id", "id={$this->dadosUsuario[0]['id']}");
            if ($updateRecSenha->getResultado()) {
                $this->dadosUsuario[0]['recuperar_senha'] = $this->dadosUpdate['recuperar_senha'];
                $this->dadosEmail();
            } else {
                $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Falha ao recuperar a senha!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                $this->resultado = false;
            }
        }
    }

    private function dadosEmail() {
        $nome = explode(" ", $this->dadosUsuario[0]['nome']);
        $prim_nome = $nome[0];
        $this->dadosEmail['dest_nome'] = $prim_nome;
        $this->dadosEmail['dest_email'] = $this->dados['email'];
        $this->dadosEmail['titulo_email'] = "Recuperar senha";
        $this->dadosEmail['cont_email'] = "Olá, " . $prim_nome . "<br><br>";
        $this->dadosEmail['cont_email'] .= "Você solicitou uma alteração de senha.<br>";
        $this->dadosEmail['cont_email'] .= "Seguindo o link abaixo você poderá alterar sua senha.<br>";
        $this->dadosEmail['cont_email'] .= "Para continuar o processo de recuperação de sua senha, clique no link abaixo ou cole o endereço abaixo no seu navegador.<br><br>";
        $this->dadosEmail['cont_email'] .= "<a href='" . URLADM . "atual-senha/atualSenha?chave=" . $this->dadosUsuario[0]['recuperar_senha'] . "'>Clique aqui</a><br><br>";
        $this->dadosEmail['cont_email'] .= "Login: " . $this->dadosUsuario[0]['login'] . "<br><br>";
        $this->dadosEmail['cont_email'] .= "Se você não solicitou essa alteração, nenhuma ação é necessária. Sua senha permanecerá a mesma até que você ative este código.<br><br>";


        $this->dadosEmail['cont_text_email'] = "Olá " . $prim_nome . " Você solicitou uma alteração de senha. Seguindo o link abaixo você poderá alterar sua senha. Para continuar o processo de recuperação de sua senha, clique no link abaixo ou cole o endereço abaixo no seu navegador. " . URLADM . "atual-senha/atualSenha?chave=" . $this->dadosUsuario[0]['recuperar_senha'] . " Usuário: " . $this->dadosUsuario[0]['login'] . "Se você não solicitou essa alteração, nenhuma ação é necessária. Sua senha permanecerá a mesma até que você ative este código.";

        $emailPHPMailer = new \App\adms\Models\helper\AdmsPhpMailer();
        $emailPHPMailer->emailPhpMailer($this->dadosEmail);

        if ($emailPHPMailer->getResultado()) {
            $_SESSION['msg'] = "<div class='alert alert-success'>E-mail enviado com sucesso! Verifique sua caixa de entrada para recuperar sua senha.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-primary'>Erro: Não foi possivel enviar o e-mail para recuperar a senha!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        }
    }

}
