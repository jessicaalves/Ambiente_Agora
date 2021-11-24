<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class ListarUsuarios {

    private $dados;
    private $pageId;

    public function index() {
        $listarUsuarios = new ListarUsuarios();
        $listarUsuarios->listarUsuarios();
    }

    public function listarUsuarios($pageId = null) {
        $this->pageId = (int) $pageId ? $pageId : 1;

        $botao = ['cadUsuario' => ['menu_controller' => 'cadastrar-usuario', 'menu_metodo' => 'cadastrar-usuario'],
            'visUsuario' => ['menu_controller' => 'visualizar-usuario', 'menu_metodo' => 'visualizar-usuario'],
            'altUsuario' => ['menu_controller' => 'alterar-usuario', 'menu_metodo' => 'alterar-usuario'],
            'delUsuario' => ['menu_controller' => 'apagar-usuario', 'menu_metodo' => 'apagar-usuario']];

        $listarBotao = new \App\adms\Models\AdmsBotao();
        $this->dados['botao'] = $listarBotao->valBotao($botao);


        $listarUsuarios = new \App\adms\Models\AdmsListarUsuarios();
        $this->dados['listarUsuarios'] = $listarUsuarios->listarUsuarios($this->pageId);
        $this->dados['paginacao'] = $listarUsuarios->getResultadoPg();

        $listarMenu = new \App\adms\Models\AdmsMenu();
        $this->dados['menu'] = $listarMenu->itemMenu();
        $this->dados['sidebarActive'] = "listar-usuarios";

        $carregarView = new \Core\ConfigView("adms/Views/usuarios/listarUsuarios", $this->dados);
        $carregarView->renderizarListarUsuarios();
    }

}
