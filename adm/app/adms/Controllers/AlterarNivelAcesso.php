<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AlterarNivelAcesso {

    private $dados;
    private $dadosId;

    public function alterarNivelAcesso($dadosId = null) {
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $this->dadosId = (int) $dadosId;
        if (!empty($this->dadosId)) {
            $this->editNivAcPriv();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Nível de acesso não encontrado!</div>";
            $UrlDestino = URLADM . 'nivel-acesso/listar';
            header("Location: $UrlDestino");
        }
    }

    private function editNivAcPriv() {
        if (!empty($this->dados['atualizarNivelAcesso'])) {
            unset($this->dados['atualizarNivelAcesso']);
            $editarNivAc = new \App\adms\Models\AdmsAlterarNivelAcesso();
            $editarNivAc->alterarNivelAcesso($this->dados);
            if ($editarNivAc->getResultado()) {
                $_SESSION['msg'] = "<div class='alert alert-success'>Nível de acesso editado com sucesso!</div>";
                $UrlDestino = URLADM . 'consultar-nivel-acesso/consultar-nivel-acesso/' . $this->dados['id'];
                header("Location: $UrlDestino");
            } else {
                $this->dados['form'] = $this->dados;
                $this->editNivAcViewPriv();
            }
        } else {
            $verNivAc = new \App\adms\Models\AdmsAlterarNivelAcesso();
            $this->dados['form'] = $verNivAc->visualizarNivelAcesso($this->dadosId);
            $this->editNivAcViewPriv();
        }
    }

    private function editNivAcViewPriv() {
        if ($this->dados['form']) {
            $botao = ['visNivelAcesso' => ['menu_controller' => 'visualizar-nivel-acesso', 'menu_metodo' => 'visualizar-nivel-acesso']];
            $listarBotao = new \App\adms\Models\AdmsBotao();
            $this->dados['botao'] = $listarBotao->valBotao($botao);

            $listarMenu = new \App\adms\Models\AdmsMenu();
            $this->dados['menu'] = $listarMenu->itemMenu();
            $carregarView = new \Core\ConfigView("adms/Views/niveisAcesso/alterarNiveisAcesso", $this->dados);
            $carregarView->renderizarAlterarNivelAcesso();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Nível de acesso não encontrado!</div>";
            $UrlDestino = URLADM . 'listar-niveis-acesso/listar-niveis-acesso';
            header("Location: $UrlDestino");
        }
    }

}
