<?php

/* @author jessica */

namespace App\sts\Controllers;

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
            $esqSenha = new \App\sts\Models\StsEsqueceuSenha();
            $esqSenha->esqueceuSenha($this->dados);
            if ($esqSenha->getResultado()) {
                $UrlDestino = URL . 'user/login/acesso-login';
                header("Location: $UrlDestino");
            } else {
                $this->dados['form'] = $this->dados;
                $carregarView = new \Core\ConfigView("sts/Views/login/esqueceuSenha", $this->dados);
                $carregarView->renderizarEsqueceuSenha();
            }
        } else {
            $carregarView = new \Core\ConfigView("sts/Views/login/esqueceuSenha", $this->dados);
            $carregarView->renderizarEsqueceuSenha();
        }
    }

}
