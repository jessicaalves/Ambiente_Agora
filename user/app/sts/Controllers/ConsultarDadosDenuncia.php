<?php

/* @author jessica */

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class ConsultarDadosDenuncia {

    private $dados;
    private $dadosId;

    public function index() {
        $visualizarDenuncia = new ConsultarDadosDenuncia();
        $visualizarDenuncia->consultarDadosDenuncia();
    }

    public function consultarDadosDenuncia($dadosId = null) {
        $this->dadosId = (int) $dadosId;
        if (!empty($this->dadosId)) {
            $visualizarDadosDenuncia = new \App\sts\Models\StsConsultarDadosDenuncia();
            $this->dados['dados_denuncia'] = $visualizarDadosDenuncia->consultarDadosDenuncia($this->dadosId);
            if ($this->dados['dados_denuncia']) {
                $carregarView = new \Core\ConfigView('sts/Views/denunciasRealizadas/consultarDadosDenuncia', $this->dados);
                $carregarView->renderizarConsultarDadosDenuncia();
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
