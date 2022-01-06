<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class PesquisarUsuarios {

    private $dados;
    private $dadosForm;
    private $pageId;

    public function index() {
        $listarUsuario = new PesquisarUsuarios();
        $listarUsuario->listarUsuarios();
    }

    public function listarUsuarios($pageId = null) {

        $botao = ['cadUsuario' => ['menu_controller' => 'cadastrar-usuario', 'menu_metodo' => 'cadastrar-usuario'],
            'visUsuario' => ['menu_controller' => 'visualizar-usuario', 'menu_metodo' => 'visualizar-usuario'],
            'altUsuario' => ['menu_controller' => 'alterar-usuario', 'menu_metodo' => 'alterar-usuario'],
            'delUsuario' => ['menu_controller' => 'apagar-usuario', 'menu_metodo' => 'apagar-usuario']];

        $listarBotao = new \App\adms\Models\AdmsBotao();
        $this->dados['botao'] = $listarBotao->valBotao($botao);

        $listarMenu = new \App\adms\Models\AdmsMenu();
        $this->dados['menu'] = $listarMenu->itemMenu();
        $this->dados['sidebarActive'] = "listar-usuarios";

        $this->dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (!empty($this->dadosForm['PesqAdministrador'])) {
            unset($this->dadosForm['PesqAdministrador']);
        } else {
            $this->pageId = (int) $pageId ? $pageId : 1;
            $this->dadosForm['nome'] = filter_input(INPUT_GET, 'nome', FILTER_DEFAULT);
        }

        $listarUsuario = new \App\adms\Models\AdmsPesquisarUsuarios();
        $this->dados['listarUsuarios'] = $listarUsuario->pesquisarUsuarios($this->pageId, $this->dadosForm);
        $this->dados['paginacao'] = $listarUsuario->getResultadoPg();

        $carregarView = new \Core\ConfigView("adms/Views/usuarios/pesquisarUsuarios", $this->dados);
        $carregarView->renderizarPesquisarUsuarios();
    }

}
