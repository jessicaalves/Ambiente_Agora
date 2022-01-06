<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AvaliarDenuncia {

    private $dados;
    private $dadosId;

    public function avaliarDenuncia($dadosId = null) {
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $this->dadosId = (int) $dadosId;
        if (!empty($this->dadosId)) {
            $this->avaliarDenunciaPriv();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Denúncia não encontrada!</div>";
            $UrlDestino = URLADM . 'listar-denuncias-comuns/listar-denuncias-comuns';
            header("Location: $UrlDestino");
        }
    }

    private function avaliarDenunciaPriv() {
        if (!empty($this->dados['atualizarStatusDenuncia'])) {
            unset($this->dados['atualizarStatusDenuncia']);
            //var_dump($this->dados);
            $avaliarDenuncia = new \App\adms\Models\AdmsAvaliarDenuncia();
            $avaliarDenuncia->avaliarDenuncia($this->dados);
            if ($avaliarDenuncia->getResultado()) {
                $_SESSION['msg'] = "<div class='alert alert-success'>Denúncia avaliada com sucesso!</div>";
                $UrlDestino = URLADM . 'consultar-denuncia/consultar-denuncia/' . $this->dados['id'];
                header("Location: $UrlDestino");
            } else {
                $this->dados['form'] = $this->dados;
                $this->avaliarDenunciaViewPriv();
            }
        } else {
            $verDenuncia = new \App\adms\Models\AdmsAvaliarDenuncia();
            $this->dados['form'] = $verDenuncia->visualizarDenuncia($this->dadosId);
            $this->avaliarDenunciaViewPriv();
        }
    }

    private function avaliarDenunciaViewPriv() {
        if ($this->dados['form']) {
            $botao = ['listDenuncias' => ['menu_controller' => 'listar-denuncias', 'menu_metodo' => 'listar-denuncias'],
                'visDenuncia' => ['menu_controller' => 'consultar-denuncia', 'menu_metodo' => 'consultar-denuncia']];
            $listarBotao = new \App\adms\Models\AdmsBotao();
            $this->dados['botao'] = $listarBotao->valBotao($botao);

            $listarSelect = new \App\adms\Models\AdmsAvaliarDenuncia();
            $this->dados['select'] = $listarSelect->listarCadastrar();

            $listarMenu = new \App\adms\Models\AdmsMenu();
            $this->dados['menu'] = $listarMenu->itemMenu();
            $this->dados['sidebarActive'] = "listar-denuncias-comuns";
            
            $carregarView = new \Core\ConfigView("adms/Views/denunciasRealizadas/avaliarDenuncia", $this->dados);
            $carregarView->renderizarAvaliarDenuncia();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Denúncia não encontrada!</div>";
            $UrlDestino = URLADM . 'listar-denuncias/listar-denuncias';
            header("Location: $UrlDestino");
        }
    }

}
