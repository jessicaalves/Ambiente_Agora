<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class EsqueceuSenha {

    private $dados;

    public function index() {
        $esqSenha = new EsqueceuSenha();
        $esqSenha->esqueceuSenha();
    }

    public function esqueceuSenha() {

        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (!empty($this->dados['RecupUserLogin'])) {
            $esqSenha = new \App\adms\Models\AdmsEsqueceuSenha();
            $esqSenha->esqueceuSenha($this->dados);
            if ($esqSenha->getResultado()) {
                $UrlDestino = URLADM . 'login/acesso-login';
                header("Location: $UrlDestino");
            } else {
                $this->dados['form'] = $this->dados;
                $carregarView = new \Core\ConfigView("adms/Views/login/esqueceuSenha", $this->dados);
                $carregarView->renderizarEsqueceuSenha();
            }
        } else {
            $carregarView = new \Core\ConfigView("adms/Views/login/esqueceuSenha", $this->dados);
            $carregarView->renderizarEsqueceuSenha();
        }
    }

}
