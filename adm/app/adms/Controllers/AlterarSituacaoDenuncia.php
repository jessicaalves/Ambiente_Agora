<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AlterarSituacaoDenuncia {

    private $dados;
    private $dadosId;

    public function index() {
        $alterarSituacao = new AlterarSituacaoDenuncia();
        $alterarSituacao->alterarSituacaoDenuncia();
    }

    public function alterarSituacaoDenuncia($dadosId = null) {
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $this->dadosId = (int) $dadosId;
        if (!empty($this->dadosId)) {
            $this->alterarDenunciaPriv();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Denúncia não encontrada!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $urlDestino = URLADM . "visualizar-denuncias-realizadas/visualizar-denuncias-realizadas/{$this->pag}";
            header("Location: $urlDestino");
        }
    }

    private function alterarDenunciaPriv() {
        if (!empty($this->dados['atualizarStatusDenuncia'])) {
            unset($this->dados['atualizarStatusDenuncia']);
            $altStatusDenuncia = new \App\adms\Models\AdmsAlterarSituacaoDenuncia();
            $altStatusDenuncia->alterarSituacaoDenuncia($this->dados);
            if ($altStatusDenuncia->getResultado()) {
                $_SESSION['msg'] = "<div class='alert alert-success'>Status da denúncia alterado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                $UrlDestino = URLADM . 'visualizar-dados-denuncia/visualizar-dados-denuncia/' . $this->dados['id'];
                header("Location: $UrlDestino");
            } else {
                $this->dados['form'] = $this->dados;
                $this->alterarDenunciaViewPriv();
            }
        } else {
            $visualizarDenuncia = new \App\adms\Models\AdmsAlterarSituacaoDenuncia();
            $this->dados['form'] = $visualizarDenuncia->visualizarDenuncia($this->dadosId);
            $this->alterarDenunciaViewPriv();
        }
    }

    private function alterarDenunciaViewPriv() {
        if ($this->dados['form']) {
            $botao = ['listDenuncias' => ['menu_controller' => 'visualizar-denuncias-realizadas', 'menu_metodo' => 'visualizar-denuncias-realizadas'],
                'visDenuncia' => ['menu_controller' => 'visualizar-dados-denuncia', 'menu_metodo' => 'visualizar-dados-denuncia']];
            $listarBotao = new \App\adms\Models\AdmsBotao();
            $this->dados['botao'] = $listarBotao->valBotao($botao);

            $listarSelect = new \App\adms\Models\AdmsAlterarSituacaoDenuncia();
            $this->dados['select'] = $listarSelect->listarCadastrar();

            $listarMenu = new \App\adms\Models\AdmsMenu();
            $this->dados['menu'] = $listarMenu->itemMenu();
            $carregarView = new \Core\ConfigView("adms/Views/denunciasRealizadas/alterarDadosDenuncia", $this->dados);
            $carregarView->renderizarAlterarDenuncia();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Denúncia não encontrada!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $urlDestino = URLADM . 'visualizar-denuncias-realizadas/visualizar-denuncias-realizadas';
            header("Location: $urlDestino");
        }
    }

}
