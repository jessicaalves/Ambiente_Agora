<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class VisualizarDenunciasRealizadas {

    private $dados;
    private $pageId;

    public function index() {
        $denunciasRealizadas = new VisualizarDenunciasRealizadas();
        $denunciasRealizadas->visualizarDenunciasRealizadas();
    }

    public function visualizarDenunciasRealizadas($pageId = null) {
        $botao = ['altSituacaoDenuncia' => ['menu_controller' => 'alterar-situacao-denuncia', 'menu_metodo' => 'alterar-situacao-denuncia'],
            'visDenuncia' => ['menu_controller' => 'visualizar-dados-denuncia', 'menu_metodo' => 'visualizar-dados-denuncia']];

        $listarBotao = new \App\adms\Models\AdmsBotao();
        $this->dados['botao'] = $listarBotao->valBotao($botao);

        $this->pageId = (int) $pageId ? $pageId : 1;
        $visualizarDenunciasRealizadas = new \App\adms\Models\AdmsVisualizarDenunciasRealizadas();
        $this->dados['denunciasRealizadas'] = $visualizarDenunciasRealizadas->visualizarDenunciasRealizadas($this->pageId);
        $this->dados['paginacao'] = $visualizarDenunciasRealizadas->getResultadoPg();

        $listarMenu = new \App\adms\Models\AdmsMenu();
        $this->dados['menu'] = $listarMenu->itemMenu();

        $carregarView = new \Core\ConfigView('adms/Views/denunciasRealizadas/denunciasRealizadas', $this->dados);
        $carregarView->renderizarDenunciasRealizadas();
    }

}
