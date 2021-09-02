<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AlterarStatusDenuncia {

    private $dados;
    private $dadosId;

    public function index() {
        $alterarStatus = new AlterarStatusDenuncia();
        $alterarStatus->alterarStatusDenuncia();
    }

    public function alterarStatusDenuncia($dadosId = null) {
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $this->dadosId = (int) $dadosId;
        if (!empty($this->dadosId)) {
            $this->alterarDenunciaPriv();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Denúncia não encontrada!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $urlDestino = URLADM . "listar-denuncias-comuns/listar-denuncias-comuns/{$this->pag}";
            header("Location: $urlDestino");
        }
    }

    private function alterarDenunciaPriv() {
        if (!empty($this->dados['atualizarStatusDenuncia'])) {
            unset($this->dados['atualizarStatusDenuncia']);
            $altStatusDenuncia = new \App\adms\Models\AdmsAlterarStatusDenuncia();
            $altStatusDenuncia->alterarStausDenuncia($this->dados);
            if ($altStatusDenuncia->getResultado()) {
                $_SESSION['msg'] = "<div class='alert alert-success'>Status da denúncia alterado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                $UrlDestino = URLADM . 'visualizar-denuncia-comum/visualizar-denuncia-comum/' . $this->dados['id'];
                header("Location: $UrlDestino");
            } else {
                $this->dados['form'] = $this->dados;
                $this->alterarDenunciaViewPriv();
            }
        } else {
            $visualizarDenuncia = new \App\adms\Models\AdmsAlterarStatusDenuncia();
            $this->dados['form'] = $visualizarDenuncia->visualizarDenuncia($this->dadosId);
            $this->alterarDenunciaViewPriv();
        }
    }

    private function alterarDenunciaViewPriv() {
        if ($this->dados['form']) {
            $botao = ['listDenuncias' => ['menu_controller' => 'listar-denuncias-comuns', 'menu_metodo' => 'listar-denuncias-comuns'],
                'visDenuncia' => ['menu_controller' => 'visualizar-denuncia-comum', 'menu_metodo' => 'visualizar-denuncia-comum']];
            $listarBotao = new \App\adms\Models\AdmsBotao();
            $this->dados['botao'] = $listarBotao->valBotao($botao);

            $listarSelect = new \App\adms\Models\AdmsAlterarStatusDenuncia();
            $this->dados['select'] = $listarSelect->listarCadastrar();

            $listarMenu = new \App\adms\Models\AdmsMenu();
            $this->dados['menu'] = $listarMenu->itemMenu();
            $carregarView = new \Core\ConfigView("adms/Views/denunciasRealizadas/alterarStatusDenuncia", $this->dados);
            $carregarView->renderizarAlterarStatusDenuncia();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Denúncia não encontrada!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $urlDestino = URLADM . 'listar-denuncias-comuns/listar-denuncias-comuns';
            header("Location: $urlDestino");
        }
    }

}
