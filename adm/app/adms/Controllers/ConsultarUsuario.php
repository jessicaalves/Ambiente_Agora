<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class ConsultarUsuario {

    private $dados;
    private $dadosId;

    public function index() {
        $visualizarUsuario = new ConsultarUsuario();
        $visualizarUsuario->consultarUsuario();
    }

    public function consultarUsuario($dadosId = null) {
        $this->dadosId = (int) $dadosId;
        if (!empty($this->dadosId)) {
            $visualizarUsuario = new \App\adms\Models\AdmsConsultarUsuario();
            $this->dados['dados_usuario'] = $visualizarUsuario->consultarUsuario($this->dadosId);

            if ($this->dados['dados_usuario']) {
                $botao = ['visUsuario' => ['menu_controller' => 'visualizar-usuario', 'menu_metodo' => 'visualizar-usuario'],
                    'altUsuario' => ['menu_controller' => 'alterar-usuario', 'menu_metodo' => 'alterar-usuario']];
                $listarBotao = new \App\adms\Models\AdmsBotao();
                $this->dados['botao'] = $listarBotao->valBotao($botao);

                $listarMenu = new \App\adms\Models\AdmsMenu();
                $this->dados['menu'] = $listarMenu->itemMenu();
                $this->dados['sidebarActive'] = "listar-usuarios";

                $carregarView = new \Core\ConfigView("adms/Views/usuarios/consultarUsuario", $this->dados);
                $carregarView->renderizarConsultarUsuario();
            } else {
                $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Administrador não encontrado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                $urlDestino = URLADM . 'listar-usuarios/listar-usuarios';
                header("Location: $urlDestino");
            }
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Administrador não encontrado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $urlDestino = URLADM . 'listar-usuarios/listar-usuarios';
            header("Location: $urlDestino");
        }
    }

}
