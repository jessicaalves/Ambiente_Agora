<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class ListarDenunciasComuns {

    private $dados;
    private $pageId;

    public function index() {
        $denunciasComuns = new ListarDenunciasComuns();
        $denunciasComuns->listarDenunciasComuns();
    }

    public function listarDenunciasComuns($pageId = null) {
        $botao = ['altStatusDenuncia' => ['menu_controller' => 'alterar-status-denuncia-comum', 'menu_metodo' => 'alterar-status-denuncia-comum'],
            'visDenuncia' => ['menu_controller' => 'visualizar-denuncia-comum', 'menu_metodo' => 'visualizar-denuncia-comum']];

        $listarBotao = new \App\adms\Models\AdmsBotao();
        $this->dados['botao'] = $listarBotao->valBotao($botao);

        $this->pageId = (int) $pageId ? $pageId : 1;
        $listarDenunciasComuns = new \App\adms\Models\AdmsListarDenunciasComuns();
        $this->dados['denunciasRealizadas'] = $listarDenunciasComuns->listarDenunciasComuns($this->pageId);
        $this->dados['paginacao'] = $listarDenunciasComuns->getResultadoPg();

        $listarMenu = new \App\adms\Models\AdmsMenu();
        $this->dados['menu'] = $listarMenu->itemMenu();

        $carregarView = new \Core\ConfigView('adms/Views/denunciasRealizadas/listarDenunciasComuns', $this->dados);
        $carregarView->renderizarListarDenunciasComuns();
    }

}
