<?php

/* @author jessica */

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class MinhaConta {

    private $dados;

    public function index() {
        $minhaConta = new MinhaConta();
        $minhaConta->acessoMinhaConta();
    }

    public function acessoMinhaConta() {

        $carregarView = new \Core\ConfigView("sts/Views/minhaConta/minhaConta", $this->dados);
        $carregarView->renderizarMinhaConta();
    }

}
