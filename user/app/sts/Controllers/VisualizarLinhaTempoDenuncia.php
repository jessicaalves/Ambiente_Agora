<?php

/* @author jessica */

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class VisualizarLinhaTempoDenuncia {

    private $dados;

    public function index() {
        $visualizarLinhaTempo = new VisualizarLinhaTempoDenuncia();
        $visualizarLinhaTempo->visualizarLinhaTempoDenuncia();
    }

    public function visualizarLinhaTempoDenuncia($dadosId = null) {
        $this->dadosId = (int) $dadosId;

        if (!empty($this->dadosId)) {
            $visualizarLinhaTempo = new \App\sts\Models\StsVisualizarLinhaTempoDenuncia();
            $this->dados['dados_denuncia'] = $visualizarLinhaTempo->visualizarLinhaTempoDenuncia($this->dadosId);

            $carregarView = new \Core\ConfigView("sts/Views/denunciasRealizadas/visualizarLinhaTempoDenuncia", $this->dados);
            $carregarView->renderizarLinhaTempoDenuncia();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao encontrar denúncia!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $urlDestino = URL . 'user/denuncias-realizadas/visualizar-denuncias-realizadas';
            header("Location: $urlDestino");
        }

    }

}
