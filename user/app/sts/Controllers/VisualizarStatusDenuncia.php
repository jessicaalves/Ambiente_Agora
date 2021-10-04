<?php

/* @author jessica */

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class VisualizarStatusDenuncia {

    private $dados;

    public function index() {
        $visualizarLinhaTempo = new VisualizarStatusDenuncia();
        $visualizarLinhaTempo->visualizarStatusDenuncia();
    }

    public function visualizarStatusDenuncia($dadosId = null) {
        $this->dadosId = (int) $dadosId;
        if (!empty($this->dadosId)) {
            $visualizarStatus = new \App\sts\Models\StsVisualizarStatusDenuncia();
            $this->dados['dados_denuncia'] = $visualizarStatus->visualizarStatusDenuncia($this->dadosId);
            if ($this->dados['dados_denuncia']) {
                $carregarView = new \Core\ConfigView("sts/Views/denunciasRealizadas/visualizarStatusDenuncia", $this->dados);
                $carregarView->renderizarVisualizarStatusDenuncia();
            } else {
                $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao encontrar denúncia!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                $urlDestino = URL . 'user/listar-denuncias-realizadas/listar-denuncias-realizadas';
                header("Location: $urlDestino");
            }
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao encontrar denúncia!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $urlDestino = URL . 'user/listar-denuncias-realizadas/listar-denuncias-realizadas';
            header("Location: $urlDestino");
        }
    }

}
