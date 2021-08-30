<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class VisualizarUsuario {

    private $dados;
    private $dadosId;

    public function index() {
        $visualizarUsuario = new VisualizarUsuario();
        $visualizarUsuario->visualizarUsuario();
    }

    public function visualizarUsuario($dadosId = null) {
        $this->dadosId = (int) $dadosId;
        if (!empty($this->dadosId)) {
            $visualizarUsuario = new \App\adms\Models\AdmsVisualizarUsuario();
            $this->dados['dados_usuario'] = $visualizarUsuario->visualizarUsuario($this->dadosId);

            if ($this->dados['dados_usuario']) {
                $botao = ['visUsuario' => ['menu_controller' => 'visualizar-usuario', 'menu_metodo' => 'visualizar-usuario']];
                $listarBotao = new \App\adms\Models\AdmsBotao();
                $this->dados['botao'] = $listarBotao->valBotao($botao);
                
                $listarMenu = new \App\adms\Models\AdmsMenu();
                $this->dados['menu'] = $listarMenu->itemMenu();

                $carregarView = new \Core\ConfigView("adms/Views/usuarios/visualizarUsuario", $this->dados);
                $carregarView->renderizarVisualizarUsuario();
            } else {
                $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Usuário não encontrado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                $urlDestino = URLADM . 'listar-usuarios/listar-usuarios';
                header("Location: $urlDestino");
            }
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Usuário não encontrado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $urlDestino = URLADM . 'listar-usuarios/listar-usuarios';
            header("Location: $urlDestino");
        }
    }

}
