<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class Login {

    private $dados;

    public function index() {
        $acessoUsuario = new Login();
        $acessoUsuario->acessoLogin();
    }

    public function acessoLogin() {
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        //var_dump($this->dados);
        if (!empty($this->dados['acessar'])) {
            unset($this->dados['acessar']);
            $visualizarLogin = new \App\adms\Models\AdmsLogin();
            $visualizarLogin->acesso($this->dados);
            if ($visualizarLogin->getResultado()) {
                $urlDestino = URLADM . 'minha-conta/acesso-minha-conta';
                header("Location: $urlDestino");
            } else {
                $this->dados['form'] = $this->dados;
            }
        }
        $carregarView = new \Core\ConfigView("adms/Views/login/acesso", $this->dados);
        $carregarView->renderizarLogin();
    }

    public function logout() {
        unset($_SESSION['id'], $_SESSION['senha'], $_SESSION['nome'], $_SESSION['email'], $_SESSION['adms_nivel_acesso_id'], $_SESSION['ordem_nivac']);
        $_SESSION['msg'] = "<div class='alert alert-success'>Deslogado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        $urlDestino = URLADM . 'login/acesso-login';
        header("Location: $urlDestino");
    }

}
