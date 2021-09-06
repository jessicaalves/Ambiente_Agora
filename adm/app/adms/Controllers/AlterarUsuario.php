<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AlterarUsuario {

    private $dados;
    private $dadosId;

    public function alterarUsuario($dadosId = null) {
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $this->dadosId = (int) $dadosId;
        if (!empty($this->dadosId)) {
            $this->alterarUsuarioPriv();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Usuário não encontrado!</div>";
            $urlDestino = URLADM . 'listar-usuarios/listar-usuarios';
            header("Location: $urlDestino");
        }
    }

    private function alterarUsuarioPriv() {
        if (!empty($this->dados['atualizarUsuario'])) {
            unset($this->dados['atualizarUsuario']);
            $alterarUsuario = new \App\adms\Models\AdmsAlterarUsuario();
            $alterarUsuario->alterarUsuario($this->dados);
            if ($alterarUsuario->getResultado()) {
                $_SESSION['msg'] = "<div class='alert alert-success'>Usuário alterado com sucesso!</div>";
                $UrlDestino = URLADM . 'visualizar-usuario/visualizar-usuario/' . $this->dados['id'];
                header("Location: $UrlDestino");
            } else {
                $this->dados['form'] = $this->dados;
                $this->alterarUsuarioViewPriv();
            }
        } else {
            $visualizarUsuario = new \App\adms\Models\AdmsAlterarUsuario();
            $this->dados['form'] = $visualizarUsuario->visualizarUsuario($this->dadosId);
            $this->alterarUsuarioViewPriv();
        }
    }

    private function alterarUsuarioViewPriv() {
        if ($this->dados['form']) {            
            $botao = ['listUsuario' => ['menu_controller' => 'listar-usuarios', 'menu_metodo' => 'listar-usuarios'],
                'visUsuario' => ['menu_controller' => 'visualizar-usuario', 'menu_metodo' => 'visualizar-usuario']];
            $listarBotao = new \App\adms\Models\AdmsBotao();
            $this->dados['botao'] = $listarBotao->valBotao($botao);
            
            $listarSelect = new \App\adms\Models\AdmsAlterarUsuario();
            $this->dados['select'] = $listarSelect->listarCadastrar();

            $listarMenu = new \App\adms\Models\AdmsMenu();
            $this->dados['menu'] = $listarMenu->itemMenu();
            $carregarView = new \Core\ConfigView("adms/Views/usuarios/alterarUsuario", $this->dados);
            $carregarView->renderizarAlterarUsuario();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Usuário não encontrado!</div>";
            $urlDestino = URLADM . 'listar-usuarios/listar-usuarios';
            header("Location: $urlDestino");
        }
    }

}
