<?php

/* @author jessica */

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class ConsultarDadosCadastrais {

    private $dados;

    public function index() {
        $visualizarDadosCadastrais = new ConsultarDadosCadastrais();
        $visualizarDadosCadastrais->consultarDadosCadastrais();
    }

    public function consultarDadosCadastrais() {
        $visualizarDadosUsuario = new \App\sts\Models\StsConsultarDadosCadastrais();
        $this->dados ['dados_usuario'] = $visualizarDadosUsuario->consultarDadosCadastrais();

        $carregarView = new \Core\ConfigView("sts/Views/dadosCadastrais/consultarDadosCadastrais", $this->dados);
        $carregarView->renderizarConsultarDadosCadastrais();
    }

}