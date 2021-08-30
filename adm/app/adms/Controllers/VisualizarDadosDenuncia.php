<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class VisualizarDadosDenuncia {

    private $dados;
    private $dadosId;

    public function index() {
        $visualizarDenuncia = new VisualizarDadosDenuncia();
        $visualizarDenuncia->visualizarDadosDenuncia();
    }

    public function visualizarDadosDenuncia($dadosId = null) {
        $this->dadosId = (int) $dadosId;
        if (!empty($this->dadosId)) {
            $visualizarDadosDenuncia = new \App\adms\Models\AdmsVisualizarDadosDenuncia();
            $this->dados['dados_denuncia'] = $visualizarDadosDenuncia->visualizarDadosDenuncia($this->dadosId);

            $listarMenu = new \App\adms\Models\AdmsMenu();
            $this->dados['menu'] = $listarMenu->itemMenu();
            
            $carregarView = new \Core\ConfigView('adms/Views/denunciasRealizadas/visualizarDadosDenuncia', $this->dados);
            $carregarView->renderizarDadosDenuncia();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao encontrar denúncia!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $urlDestino = URLADM . 'visualizar-denuncias-realizadas/visualizar-denuncias-realizadas';
            header("Location: $urlDestino");
        }
    }

}
