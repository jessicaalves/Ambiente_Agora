<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class ConsultarDenuncia {

    private $dados;
    private $dadosId;

    public function index() {
        $visualizarDenunciaComum = new ConsultarDenuncia();
        $visualizarDenunciaComum->consultarDenuncia();
    }

    public function consultarDenuncia($dadosId = null) {
        $this->dadosId = (int) $dadosId;
        if (!empty($this->dadosId)) {
            $visualizarDenunciaComum = new \App\adms\Models\AdmsConsultarDenuncia();
            $this->dados['dados_denuncia'] = $visualizarDenunciaComum->consultarDenuncia($this->dadosId);

            if ($this->dados['dados_denuncia']) {
                $listarMenu = new \App\adms\Models\AdmsMenu();
                $this->dados['menu'] = $listarMenu->itemMenu();
                $this->dados['sidebarActive'] = "listar-denuncias-comuns";

                $carregarView = new \Core\ConfigView('adms/Views/denunciasRealizadas/consultarDenuncia', $this->dados);
                $carregarView->renderizarConsultarDenuncia();
            } else {
                $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao encontrar denúncia!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                $urlDestino = URLADM . 'listar-denuncias/listar-denuncias-comuns';
                header("Location: $urlDestino");
            }
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao encontrar denúncia!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $urlDestino = URLADM . 'listar-denuncias-comuns/listar-denuncias-comuns';
            header("Location: $urlDestino");
        }
    }

}
