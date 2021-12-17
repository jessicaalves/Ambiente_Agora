<?php

/* @author jessica */

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class VisualizarAvaliacaoDenuncia {

    private $dados;

    public function index() {
        $visualizarAvaliacao = new VisualizarStatusDenuncia();
        $visualizarAvaliacao->visualizarAvaliacaoDenuncia();
    }

    public function visualizarAvaliacaoDenuncia($dadosId = null) {
        $this->dadosId = (int) $dadosId;
        if (!empty($this->dadosId)) {
            $visualizarAvaliacao = new \App\sts\Models\StsVisualizarAvaliacaoDenuncia();
            $this->dados['dados_denuncia'] = $visualizarAvaliacao->visualizarAvaliacaoDenuncia($this->dadosId);
            if ($this->dados['dados_denuncia']) {
                $carregarView = new \Core\ConfigView("sts/Views/denunciasRealizadas/visualizarAvaliacaoDenuncia", $this->dados);
                $carregarView->renderizarVisualizarAvaliacaoDenuncia();
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
