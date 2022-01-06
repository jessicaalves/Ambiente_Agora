<?php

/* @author jessica */

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class ConsultarAvaliacaoDenuncia {

    private $dados;

    public function index() {
        $visualizarAvaliacao = new ConsultarAvaliacaoDenuncia();
        $visualizarAvaliacao->consultarAvaliacaoDenuncia();
    }

    public function consultarAvaliacaoDenuncia($dadosId = null) {
        $this->dadosId = (int) $dadosId;
        if (!empty($this->dadosId)) {
            $visualizarAvaliacao = new \App\sts\Models\StsConsultarAvaliacaoDenuncia();
            $this->dados['dados_denuncia'] = $visualizarAvaliacao->consultarAvaliacaoDenuncia($this->dadosId);
            if ($this->dados['dados_denuncia']) {
                $carregarView = new \Core\ConfigView("sts/Views/denunciasRealizadas/consultarAvaliacaoDenuncia", $this->dados);
                $carregarView->renderizarConsultarAvaliacaoDenuncia();
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
