<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class ListarDenunciasAnonimas {

    private $dados;
    private $pageId;

    public function index() {
        $listarDenunciasAnonimas = new ListarDenunciasAnonimas();
        $listarDenunciasAnonimas->listarDenunciasAnonimas();
    }

    public function listarDenunciasAnonimas($pageId = null) {
        $botao = ['visDenuncia' => ['menu_controller' => 'visualizar-denuncia-anonima', 'menu_metodo' => 'visualizar-denuncia-anonima']];

        $listarBotao = new \App\adms\Models\AdmsBotao();
        $this->dados['botao'] = $listarBotao->valBotao($botao);

        $this->pageId = (int) $pageId ? $pageId : 1;
        $listarDenunciasAnonimas = new \App\adms\Models\AdmsListarDenunciasAnonimas();
        $this->dados['denunciasRealizadas'] = $listarDenunciasAnonimas->listarDenunciasAnonimas($this->pageId);
        $this->dados['paginacao'] = $listarDenunciasAnonimas->getResultadoPg();

        $listarMenu = new \App\adms\Models\AdmsMenu();
        $this->dados['menu'] = $listarMenu->itemMenu();

        $carregarView = new \Core\ConfigView('adms/Views/denunciasRealizadas/listarDenunciasAnonimas', $this->dados);
        $carregarView->renderizarListarDenunciasAnonimas();
    }

}
