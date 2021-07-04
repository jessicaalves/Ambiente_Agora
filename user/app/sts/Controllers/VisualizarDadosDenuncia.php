<?php

/* @author jessica */

namespace App\Sts\Controllers;

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
            $visualizarDadosDenuncia = new \Sts\Models\StsVisualizarDadosDenuncia();
            $this->dados['dados_denuncia'] = $visualizarDadosDenuncia->visualizarDadosDenuncia($this->dadosId);

            $carregarView = new \Core\ConfigView('sts/Views/denunciasRealizadas/visualizarDadosDenuncia', $this->dados);
            $carregarView->renderizarDadosDenuncia();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao encontrar denúncia!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $urlDestino = URL . 'user/denuncias-realizadas/visualizarDenunciasRealizadas';
            header("Location: $urlDestino");
        }
    }

}
