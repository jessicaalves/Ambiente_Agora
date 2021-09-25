<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AlterarStatusDenunciaAnonima {

    private $dados;
    private $dadosId;

    public function alterarStatusDenunciaAnonima($dadosId = null) {
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $this->dadosId = (int) $dadosId;
        if (!empty($this->dadosId)) {
            $this->alterarStatusDenunciaPriv();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Denúncia não encontrada!</div>";
            $UrlDestino = URLADM . 'listar-denuncias-anonimas/listar-denuncias-anonimas';
            header("Location: $UrlDestino");
        }
    }

    private function alterarStatusDenunciaPriv() {
        if (!empty($this->dados['atualizarStatusDenuncia'])) {
            unset($this->dados['atualizarStatusDenuncia']);
            //var_dump($this->dados);
            $altStatusDenuncia = new \App\adms\Models\AdmsAlterarStatusDenunciaAnonima();
            $altStatusDenuncia->alterarStatusDenunciaAnonima($this->dados);
            if ($altStatusDenuncia->getResultado()) {
                $_SESSION['msg'] = "<div class='alert alert-success'>Status da denúncia alterado com sucesso!</div>";
                $UrlDestino = URLADM . 'visualizar-denuncia-anonima/visualizar-denuncia-anonima/' . $this->dados['id'];
                header("Location: $UrlDestino");
            } else {
                $this->dados['form'] = $this->dados;
                $this->alterarStatusDenunciaViewPriv();
            }
        } else {
            $verDenuncia = new \App\adms\Models\AdmsAlterarStatusDenunciaAnonima();
            $this->dados['form'] = $verDenuncia->visualizarDenunciaAnonima($this->dadosId);
            $this->alterarStatusDenunciaViewPriv();
        }
    }

    private function alterarStatusDenunciaViewPriv() {
        if ($this->dados['form']) {
            $botao = ['listDenuncias' => ['menu_controller' => 'listar-denuncias-anonimas', 'menu_metodo' => 'listar-denuncias-anonimas'],
                'visDenuncia' => ['menu_controller' => 'visualizar-denuncia-anonima', 'menu_metodo' => 'visualizar-denuncia-anonima'],
                'altStatusDenuncia' => ['menu_controller' => 'alterar-status-denuncia-anonima', 'menu_metodo' => 'alterar-status-denuncia-anonima']];
            $listarBotao = new \App\adms\Models\AdmsBotao();
            $this->dados['botao'] = $listarBotao->valBotao($botao);

            $listarSelect = new \App\adms\Models\AdmsAlterarStatusDenunciaAnonima();
            $this->dados['select'] = $listarSelect->listarCadastrar();

            $listarMenu = new \App\adms\Models\AdmsMenu();
            $this->dados['menu'] = $listarMenu->itemMenu();
            $carregarView = new \Core\ConfigView("adms/Views/denunciasRealizadas/alterarStatusDenunciaAnonima", $this->dados);
            $carregarView->renderizarAlterarStatusDenunciaAnonima();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Denúncia não encontrada!</div>";
            $UrlDestino = URLADM . 'listar-denuncias-anonimas/listar-denuncias-anonimas';
            header("Location: $UrlDestino");
        }
    }

}