<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AlterarStatusDenunciaComum {

    private $dados;
    private $dadosId;

    public function alterarStatusDenunciaComum($dadosId = null) {
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $this->dadosId = (int) $dadosId;
        if (!empty($this->dadosId)) {
            $this->alterarStatusDenunciaPriv();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Denúncia não encontrada!</div>";
            $UrlDestino = URLADM . 'listar-denuncias-comuns/listar-denuncias-comuns';
            header("Location: $UrlDestino");
        }
    }

    private function alterarStatusDenunciaPriv() {
        if (!empty($this->dados['atualizarStatusDenuncia'])) {
            unset($this->dados['atualizarStatusDenuncia']);
            $altStatusDenuncia = new \App\adms\Models\AdmsAlterarStatusDenunciaComum();
            $altStatusDenuncia->alterarStatusDenunciaComum($this->dados);
            if ($altStatusDenuncia->getResultado()) {
                $_SESSION['msg'] = "<div class='alert alert-success'>Status da denúncia alterado com sucesso!</div>";
                $UrlDestino = URLADM . 'visualizar-denuncia-comum/visualizar-denuncia-comum/' . $this->dados['id'];
                header("Location: $UrlDestino");
            } else {
                $this->dados['form'] = $this->dados;
                $this->alterarStatusDenunciaViewPriv();
            }
        } else {
            $verDenuncia = new \App\adms\Models\AdmsAlterarStatusDenunciaComum();
            $this->dados['form'] = $verDenuncia->visualizarDenunciaComum($this->dadosId);
            $this->alterarStatusDenunciaViewPriv();
        }
    }

    private function alterarStatusDenunciaViewPriv() {
        if ($this->dados['form']) {
            $botao = ['listDenuncias' => ['menu_controller' => 'listar-denuncias-comuns', 'menu_metodo' => 'listar-denuncias-comuns'],
                'visDenuncia' => ['menu_controller' => 'visualizar-denuncia-comum', 'menu_metodo' => 'visualizar-denuncia-comum']];
            $listarBotao = new \App\adms\Models\AdmsBotao();
            $this->dados['botao'] = $listarBotao->valBotao($botao);
            
            $listarSelect = new \App\adms\Models\AdmsAlterarStatusDenunciaComum();
            $this->dados['select'] = $listarSelect->listarCadastrar();

            $listarMenu = new \App\adms\Models\AdmsMenu();
            $this->dados['menu'] = $listarMenu->itemMenu();
            $carregarView = new \Core\ConfigView("adms/Views/denunciasRealizadas/alterarStatusDenunciaComum", $this->dados);
            $carregarView->renderizarAlterarStatusDenuncia();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Denúncia não encontrada!</div>";
            $UrlDestino = URLADM . 'listar-denuncias-comuns/listar-denuncias-comuns';
            header("Location: $UrlDestino");
        }
    }

}
