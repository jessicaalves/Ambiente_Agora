<?php

/* @author jessica */

namespace App\adms\Controllers;

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
        $listarMenu = new \App\adms\Models\AdmsMenu();
        $this->dados['menu'] = $listarMenu->itemMenu();
        $this->dados['sidebarActive'] = "consultar-dados-cadastrais";
        
        $visualizarDadosUsuario = new \App\adms\Models\AdmsConsultarDadosCadastrais();
        $this->dados ['dados_usuario'] = $visualizarDadosUsuario->consultarDadosCadastrais();

        $carregarView = new \Core\ConfigView("adms/Views/dadosCadastrais/consultarDadosCadastrais", $this->dados);
        $carregarView->renderizarConsultarDadosCadastrais();
    }

}
