<?php

/* @author jessica */

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class Home {

    private $dados;

    public function index() {
        $carregarView = new \Core\ConfigView("sts/Views/home/home", $this->dados);
        $carregarView->renderizarHome();
    }

}
