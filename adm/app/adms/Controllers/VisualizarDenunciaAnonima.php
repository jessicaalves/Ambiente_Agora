<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class VisualizarDenunciaAnonima {

    private $dados;
    private $dadosId;

    public function index() {
        $visualizarDenunciaAnonima = new VisualizarDenunciaAnonima();
        $visualizarDenunciaAnonima->visualizarDenunciaAnonima();
    }

    public function visualizarDenunciaAnonima($dadosId = null) {
        $this->dadosId = (int) $dadosId;

        if (!empty($this->dadosId)) {
            $visualizarDenunciaAnonima = new \App\adms\Models\AdmsVisualizarDenunciaAnonima();
            $this->dados['dados_denuncia'] = $visualizarDenunciaAnonima->visualizarDenunciaAnonima($this->dadosId);

            $listarMenu = new \App\adms\Models\AdmsMenu();
            $this->dados['menu'] = $listarMenu->itemMenu();

            $carregarView = new \Core\ConfigView('adms/Views/denunciasRealizadas/visualizarDenunciaAnonima', $this->dados);
            $carregarView->renderizarVisualizarDenunciaAnonima();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao encontrar denúncia!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $urlDestino = URLADM . 'listar-denuncias-anonimas/listar-denuncias-anonimas';
            header("Location: $urlDestino");
        }
    }

}
