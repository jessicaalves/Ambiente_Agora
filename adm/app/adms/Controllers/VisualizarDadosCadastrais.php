<?php

/* @author jessica */

namespace App\adms\Controllers;

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
        $listarMenu = new \App\adms\Models\AdmsMenu();
        $this->dados['menu'] = $listarMenu->itemMenu();
        
        $visualizarDadosUsuario = new \App\adms\Models\AdmsVisualizarDadosCadastrais();
        $this->dados ['dados_usuario'] = $visualizarDadosUsuario->visualizarDadosCadastrais();

        $carregarView = new \Core\ConfigView("adms/Views/dadosCadastrais/visualizarDadosCadastrais", $this->dados);
        $carregarView->renderizarDadosCadastrais();
    }

}
