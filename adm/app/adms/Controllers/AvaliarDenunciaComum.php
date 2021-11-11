<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AvaliarDenunciaComum {

    private $dados;
    private $dadosId;

    public function avaliarDenunciaComum($dadosId = null) {
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
            $avaliarDenuncia = new \App\adms\Models\AdmsAvaliarDenunciaComum();
            $avaliarDenuncia->avaliarDenunciaComum($this->dados);
            if ($avaliarDenuncia->getResultado()) {
                $_SESSION['msg'] = "<div class='alert alert-success'>Denúncia avaliada com sucesso!</div>";
                $UrlDestino = URLADM . 'visualizar-denuncia-comum/visualizar-denuncia-comum/' . $this->dados['id'];
                header("Location: $UrlDestino");
            } else {
                $this->dados['form'] = $this->dados;
                $this->avaliarDenunciaViewPriv();
            }
        } else {
            $verDenuncia = new \App\adms\Models\AdmsAvaliarDenunciaComum();
            $this->dados['form'] = $verDenuncia->visualizarDenunciaComum($this->dadosId);
            $this->avaliarDenunciaViewPriv();
        }
    }

    private function avaliarDenunciaViewPriv() {
        if ($this->dados['form']) {
            $botao = ['listDenuncias' => ['menu_controller' => 'listar-denuncias-comuns', 'menu_metodo' => 'listar-denuncias-comuns'],
                'visDenuncia' => ['menu_controller' => 'visualizar-denuncia-comum', 'menu_metodo' => 'visualizar-denuncia-comum']];
            $listarBotao = new \App\adms\Models\AdmsBotao();
            $this->dados['botao'] = $listarBotao->valBotao($botao);

            $listarSelect = new \App\adms\Models\AdmsAvaliarDenunciaComum();
            $this->dados['select'] = $listarSelect->listarCadastrar();

            $listarMenu = new \App\adms\Models\AdmsMenu();
            $this->dados['menu'] = $listarMenu->itemMenu();
            $carregarView = new \Core\ConfigView("adms/Views/denunciasRealizadas/avaliarDenunciaComum", $this->dados);
            $carregarView->renderizarAvaliarDenuncia();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Denúncia não encontrada!</div>";
            $UrlDestino = URLADM . 'listar-denuncias-comuns/listar-denuncias-comuns';
            header("Location: $UrlDestino");
        }
    }

}
