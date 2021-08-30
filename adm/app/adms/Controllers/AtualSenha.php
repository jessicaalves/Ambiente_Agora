<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AtualSenha {

    private $dados;
    private $chave;

    public function index() {
        $atualSenha = new AtualSenha();
        $atualSenha->atualSenha();
    }

    public function atualSenha() {
        $this->chave = filter_input(INPUT_GET, "chave", FILTER_SANITIZE_STRING);
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (!empty($this->chave)) {
            $validaChave = new \App\adms\Models\AdmsAtualSenha();
            $validaChave->valChave($this->chave);
            if ($validaChave->getResultado()) {
                $this->atualSenhaPriv();
            } else {
                $urlDestino = URLADM . 'login/acesso-login';
                header("Location: $urlDestino");
            }
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Link inválido!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $urlDestino = URL . 'login/acesso-login';
            header("Location: $urlDestino");
        }
    }

    private function atualSenhaPriv() {
        if (!empty($this->dados['AtualSenha'])) {
            unset($this->dados['AtualSenha']);
            $this->dados['recuperar_senha'] = $this->chave;
            $atualSenha = new \App\adms\Models\AdmsAtualSenha();
            $atualSenha->atualSenha($this->dados);
            if ($atualSenha->getResultado()) {
                $urlDestino = URLADM . 'login/acesso-login';
                header("Location: $urlDestino");
            } else {
                $carregarView = new \Core\ConfigView("adms/Views/login/atualSenha", $this->dados);
                $carregarView->renderizarAtualSenha();
            }
        } else {
            $carregarView = new \Core\ConfigView("adms/Views/login/atualSenha", $this->dados);
            $carregarView->renderizarAtualSenha();
        }
    }

}
