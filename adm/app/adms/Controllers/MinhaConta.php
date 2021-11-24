<?php

/* @author jessica */

namespace App\adms\Controllers;

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
        $listarMenu = new \App\adms\Models\AdmsMenu();
        $this->dados['menu'] = $listarMenu->itemMenu();
        $this->dados['sidebarActive'] = "minha-conta";

        $carregarView = new \Core\ConfigView("adms/Views/minhaConta/minhaConta", $this->dados);
        $carregarView->renderizarMinhaConta();
    }

}
