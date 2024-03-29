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
        $botao = ['visDenuncia' => ['menu_controller' => 'consultar-denuncia-anonima', 'menu_metodo' => 'consultar-denuncia-anonima'],
            'altAvaliacaoDenuncia' => ['menu_controller' => 'avaliar-denuncia-anonima', 'menu_metodo' => 'avaliar-denuncia-anonima']];

        $listarBotao = new \App\adms\Models\AdmsBotao();
        $this->dados['botao'] = $listarBotao->valBotao($botao);

        $this->pageId = (int) $pageId ? $pageId : 1;
        $listarDenunciasAnonimas = new \App\adms\Models\AdmsListarDenunciasAnonimas();
        $this->dados['denunciasRealizadas'] = $listarDenunciasAnonimas->listarDenunciasAnonimas($this->pageId);
        $this->dados['paginacao'] = $listarDenunciasAnonimas->getResultadoPg();

        $listarMenu = new \App\adms\Models\AdmsMenu();
        $this->dados['menu'] = $listarMenu->itemMenu();
        $this->dados['sidebarActive'] = "listar-denuncias-anonimas";

        $carregarView = new \Core\ConfigView('adms/Views/denunciasRealizadas/listarDenunciasAnonimas', $this->dados);
        $carregarView->renderizarListarDenunciasAnonimas();
    }

}
