<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class VisualizarDenunciasAnonimas {

    private $dados;
    private $pageId;

    public function index() {
        $denunciasRealizadas = new VisualizarDenunciasAnonimas();
        $denunciasRealizadas->visualizarDenunciasAnonimas();
    }

    public function visualizarDenunciasAnonimas($pageId = null) {
        $botao = ['visDenuncia' => ['menu_controller' => 'visualizar-dados-denuncia', 'menu_metodo' => 'visualizar-dados-denuncia']];

        $listarBotao = new \App\adms\Models\AdmsBotao();
        $this->dados['botao'] = $listarBotao->valBotao($botao);

        $this->pageId = (int) $pageId ? $pageId : 1;
        $visualizarDenunciasRealizadas = new \App\adms\Models\AdmsVisualizarDenunciasRealizadas();
        $this->dados['denunciasRealizadas'] = $visualizarDenunciasRealizadas->visualizarDenunciasRealizadas($this->pageId);
        $this->dados['paginacao'] = $visualizarDenunciasRealizadas->getResultadoPg();

        $listarMenu = new \App\adms\Models\AdmsMenu();
        $this->dados['menu'] = $listarMenu->itemMenu();

        $carregarView = new \Core\ConfigView('adms/Views/denunciasRealizadas/denunciasAnonimas', $this->dados);
        $carregarView->renderizarDenunciasRealizadas();
    }

}
