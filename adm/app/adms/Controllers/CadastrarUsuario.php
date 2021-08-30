<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class CadastrarUsuario {

    private $dados;

    public function index() {
        $cadastrarUsuario = new CadastrarUsuario();
        $cadastrarUsuario->cadastrarUsuario();
    }

    public function cadastrarUsuario() {
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->dados['cadastrarUsuario'])) {
            unset($this->dados['cadastrarUsuario']);
            $cadastrarUsuario = new \App\adms\Models\AdmsCadastrarUsuario();
            $cadastrarUsuario->cadastrarUsuario($this->dados);
            if ($cadastrarUsuario->getResultado()) {              
                $UrlDestino = URLADM . 'listar-usuarios/listar-usuarios';
                header("Location: $UrlDestino");
            } else {
                $this->dados['form'] = $this->dados;
                $this->cadastrarUsuarioViewPriv();
            }
        } else {
            $this->cadastrarUsuarioViewPriv();
        }
    }

    private function cadastrarUsuarioViewPriv() {        
        $botao = ['listUsuario' => ['menu_controller' => 'listar-usuarios', 'menu_metodo' => 'listar-usuarios']];       
        $listarBotao = new \App\adms\Models\AdmsBotao();
        $this->dados['botao'] = $listarBotao->valBotao($botao);

        $listarSelect = new \App\adms\Models\AdmsCadastrarUsuario();
        $this->dados['select'] = $listarSelect->listarCadastrar();

        $listarMenu = new \App\adms\Models\AdmsMenu();
        $this->dados['menu'] = $listarMenu->itemMenu();
        $carregarView = new \Core\ConfigView("adms/Views/usuarios/cadastrarUsuario", $this->dados);
        $carregarView->renderizarCadastrarUsuario();
    }

}
