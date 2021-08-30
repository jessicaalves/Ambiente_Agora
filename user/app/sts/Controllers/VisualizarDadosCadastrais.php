<?php

/* @author jessica */

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class VisualizarDadosCadastrais {

    private $dados;

    public function index() {
        $visualizarDadosCadastrais = new VisualizarDadosCadastrais();
        $visualizarDadosCadastrais->visualizarDadosCadastrais();
    }

    public function visualizarDadosCadastrais() {
        $visualizarDadosUsuario = new \App\sts\Models\StsVisualizarDadosCadastrais();
        $this->dados ['dados_usuario'] = $visualizarDadosUsuario->visualizarDadosCadastrais();

        $carregarView = new \Core\ConfigView("sts/Views/dadosCadastrais/visualizarDadosCadastrais", $this->dados);
        $carregarView->renderizarDadosCadastrais();
    }

}