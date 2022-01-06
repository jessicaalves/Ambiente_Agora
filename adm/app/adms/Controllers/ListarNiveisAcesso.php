<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class ListarNiveisAcesso {

    private $dados;
    private $pageId;

    public function index() {
        $listarNiveisAcesso = new ListarNiveisAcesso();
        $listarNiveisAcesso->listarNiveisAcesso();
    }

    public function listarNiveisAcesso($pageId = null) {
        $this->pageId = (int) $pageId ? $pageId : 1;

        $botao = ['cadNivelAcesso' => ['menu_controller' => 'cadastrar-nivel-acesso', 'menu_metodo' => 'cadastrar-nivel-acesso'],
            'visNivelAcesso' => ['menu_controller' => 'consultar-nivel-acesso', 'menu_metodo' => 'consultar-nivel-acesso'],
            'altNivelAcesso' => ['menu_controller' => 'alterar-nivel-acesso', 'menu_metodo' => 'alterar-nivel-acesso'],
            'delNivelAcesso' => ['menu_controller' => 'apagar-nivel-acesso', 'menu_metodo' => 'apagar-nivel-acesso'],
            'altOrdemNivelAcesso' => ['menu_controller' => 'alterar-ordem-nivel-acesso', 'menu_metodo' => 'alterar-ordem-nivel-acesso']];

        $listarBotao = new \App\adms\Models\AdmsBotao();
        $this->dados['botao'] = $listarBotao->valBotao($botao);


        $listarNiveisAcesso = new \App\adms\Models\AdmsListarNiveisAcesso();
        $this->dados['listarNiveisAcesso'] = $listarNiveisAcesso->listarNiveisAcesso($this->pageId);
        $this->dados['paginacao'] = $listarNiveisAcesso->getResultadoPg();

        $listarMenu = new \App\adms\Models\AdmsMenu();
        $this->dados['menu'] = $listarMenu->itemMenu();        
        $this->dados['sidebarActive'] = "listar-niveis-acesso";

        $carregarView = new \Core\ConfigView("adms/Views/niveisAcesso/listarNiveisAcesso", $this->dados);
        $carregarView->renderizarListarNiveisAcesso();
    }

}
