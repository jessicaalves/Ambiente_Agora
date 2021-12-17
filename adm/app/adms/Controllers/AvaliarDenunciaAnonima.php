<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AvaliarDenunciaAnonima {

    private $dados;
    private $dadosId;

    public function avaliarDenunciaAnonima($dadosId = null) {
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $this->dadosId = (int) $dadosId;
        if (!empty($this->dadosId)) {
            $this->avaliarDenunciaPriv();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Denúncia não encontrada!</div>";
            $UrlDestino = URLADM . 'listar-denuncias-anonimas/listar-denuncias-anonimas';
            header("Location: $UrlDestino");
        }
    }

    private function avaliarDenunciaPriv() {
        if (!empty($this->dados['atualizarStatusDenuncia'])) {
            unset($this->dados['atualizarStatusDenuncia']);
            //var_dump($this->dados);
            $avaliarDenuncia = new \App\adms\Models\AdmsAvaliarDenunciaAnonima();
            $avaliarDenuncia->avaliarDenunciaAnonima($this->dados);
            if ($avaliarDenuncia->getResultado()) {
                $_SESSION['msg'] = "<div class='alert alert-success'>Denúncia avaliada com sucesso!</div>";
                $UrlDestino = URLADM . 'visualizar-denuncia-anonima/visualizar-denuncia-anonima/' . $this->dados['id'];
                header("Location: $UrlDestino");
            } else {
                $this->dados['form'] = $this->dados;
                $this->avaliarDenunciaViewPriv();
            }
        } else {
            $verDenuncia = new \App\adms\Models\AdmsAvaliarDenunciaAnonima();
            $this->dados['form'] = $verDenuncia->visualizarDenunciaAnonima($this->dadosId);
            $this->avaliarDenunciaViewPriv();
        }
    }

    private function avaliarDenunciaViewPriv() {
        if ($this->dados['form']) {
            $botao = ['listDenuncias' => ['menu_controller' => 'listar-denuncias-anonimas', 'menu_metodo' => 'listar-denuncias-anonimas'],
                'visDenuncia' => ['menu_controller' => 'visualizar-denuncia-anonima', 'menu_metodo' => 'visualizar-denuncia-anonima'],
                'altStatusDenuncia' => ['menu_controller' => 'alterar-status-denuncia-anonima', 'menu_metodo' => 'alterar-status-denuncia-anonima']];
            $listarBotao = new \App\adms\Models\AdmsBotao();
            $this->dados['botao'] = $listarBotao->valBotao($botao);

            $listarSelect = new \App\adms\Models\AdmsAvaliarDenunciaAnonima();
            $this->dados['select'] = $listarSelect->listarCadastrar();

            $listarMenu = new \App\adms\Models\AdmsMenu();
            $this->dados['menu'] = $listarMenu->itemMenu();
            $this->dados['sidebarActive'] = "listar-denuncias-anonimas";
            
            $carregarView = new \Core\ConfigView("adms/Views/denunciasRealizadas/avaliarDenunciaAnonima", $this->dados);
            $carregarView->renderizarAvaliarDenunciaAnonima();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Denúncia não encontrada!</div>";
            $UrlDestino = URLADM . 'listar-denuncias-anonimas/listar-denuncias-anonimas';
            header("Location: $UrlDestino");
        }
    }

}
