<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class CadastrarNivelAcesso {

    private $dados;

    public function index() {
        $cadastrarNivelAcesso = new CadastrarNivelAcesso();
        $cadastrarNivelAcesso->cadastrarNivelAcesso();
    }

    public function cadastrarNivelAcesso() {
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->dados['cadastrarNivelAcesso'])) {
            unset($this->dados['cadastrarNivelAcesso']);
            $cadastrarNivelAcesso = new \App\adms\Models\AdmsCadastrarNivelAcesso();
            $cadastrarNivelAcesso->cadastrarNivelAcesso($this->dados);
            if ($cadastrarNivelAcesso->getResultado()) {
                $UrlDestino = URLADM . 'listar-niveis-acesso/listar-niveis-acesso';
                header("Location: $UrlDestino");
            } else {
                $this->dados['form'] = $this->dados;
                $this->cadastrarNivelAcessoViewPriv();
            }
        } else {
            $this->cadastrarNivelAcessoViewPriv();
        }
    }

    private function cadastrarNivelAcessoViewPriv() {
        $botao = ['listNivelAcesso' => ['menu_controller' => 'listar-niveis-acesso', 'menu_metodo' => 'listar-niveis-acesso']];
        $listarBotao = new \App\adms\Models\AdmsBotao();
        $this->dados['botao'] = $listarBotao->valBotao($botao);

        $listarMenu = new \App\adms\Models\AdmsMenu();
        $this->dados['menu'] = $listarMenu->itemMenu();
        $this->dados['sidebarActive'] = "listar-niveis-acesso";
        
        $carregarView = new \Core\ConfigView("adms/Views/niveisAcesso/cadastrarNiveisAcesso", $this->dados);
        $carregarView->renderizarCadastrarNivelAcesso();
    }

}
