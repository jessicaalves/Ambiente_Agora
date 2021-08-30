<?php

/* @author jessica */

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsPaginas {

    private $resultado;
    private $urlController;
    private $urlMetodo;

    public function listarPaginas($urlController = null, $urlMetodo = null) {
        $this->urlController = (string) $urlController;
        $this->urlMetodo = (string) $urlMetodo;

        $listar = new \App\sts\Models\helper\StsRead();
        $listar->fullRead("SELECT id
                FROM sts_pags
                WHERE controller =:controller
                AND metodo =:metodo", "controller={$this->urlController}&metodo={$this->urlMetodo}");
        $this->resultado = $listar->getResultado();
        return $this->resultado;
    }

}
