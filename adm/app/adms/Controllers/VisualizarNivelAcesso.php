<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class VisualizarNivelAcesso {

    private $dados;
    private $dadosId;

    public function index() {
        $visualizarNivelAcesso = new VisualizarNivelAcesso();
        $visualizarNivelAcesso->visualizarNivelAcesso();
    }

    public function visualizarNivelAcesso($dadosId = null) {
        $this->dadosId = (int) $dadosId;
        if (!empty($this->dadosId)) {
            $visualizarNivelAcesso = new \App\adms\Models\AdmsVisualizarNivelAcesso();
            $this->dados['dados_nivel_acesso'] = $visualizarNivelAcesso->visualizarNivelAcesso($this->dadosId);

            if ($this->dados['dados_nivel_acesso']) {
                $botao = ['listNivelAcesso' => ['menu_controller' => 'listar-niveis-acesso', 'menu_metodo' => 'listar-niveis-acesso']];
                $listarBotao = new \App\adms\Models\AdmsBotao();
                $this->dados['botao'] = $listarBotao->valBotao($botao);

                $listarMenu = new \App\adms\Models\AdmsMenu();
                $this->dados['menu'] = $listarMenu->itemMenu();
                $this->dados['sidebarActive'] = "listar-niveis-acesso";

                $carregarView = new \Core\ConfigView("adms/Views/niveisAcesso/visualizarNivelAcesso", $this->dados);
                $carregarView->renderizarVisualizarNivelAcesso();
            } else {
                $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Nível de acesso não encontrado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                $urlDestino = URLADM . 'listar-niveis-acesso/listar-niveis-acesso';
                header("Location: $urlDestino");
            }
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Nível de acesso não encontrado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $urlDestino = URLADM . 'listar-niveis-acesso/listar-niveis-acesso';
            header("Location: $urlDestino");
        }
    }

}
