<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class ConsultarDenunciaAnonima {

    private $dados;
    private $dadosId;

    public function index() {
        $visualizarDenunciaAnonima = new ConsultarDenunciaAnonima();
        $visualizarDenunciaAnonima->consultarDenunciaAnonima();
    }

    public function consultarDenunciaAnonima($dadosId = null) {
        $this->dadosId = (int) $dadosId;
        if (!empty($this->dadosId)) {
            $visualizarDenunciaAnonima = new \App\adms\Models\AdmsConsultarDenunciaAnonima();
            $this->dados['dados_denuncia'] = $visualizarDenunciaAnonima->consultarDenunciaAnonima($this->dadosId);

            if ($this->dados['dados_denuncia']) {
                $listarMenu = new \App\adms\Models\AdmsMenu();
                $this->dados['menu'] = $listarMenu->itemMenu();
                $this->dados['sidebarActive'] = "listar-denuncias-anonimas";

                $carregarView = new \Core\ConfigView('adms/Views/denunciasRealizadas/consultarDenunciaAnonima', $this->dados);
                $carregarView->renderizarConsultarDenunciaAnonima();
            } else {
                $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao encontrar denúncia!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                $urlDestino = URLADM . 'listar-denuncias-anonimas/listar-denuncias-anonimas';
                header("Location: $urlDestino");
            }
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao encontrar denúncia!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $urlDestino = URLADM . 'listar-denuncias-anonimas/listar-denuncias-anonimas';
            header("Location: $urlDestino");
        }
    }

}
