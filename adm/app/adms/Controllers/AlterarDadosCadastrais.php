<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AlterarDadosCadastrais {

    private $resultado;
    private $dados;

    function getResultado() {
        return $this->resultado;
    }

    public function index() {
        $alterarDadosCadastrais = new AlterarDadosCadastrais();
        $alterarDadosCadastrais->alterarDadosCadastrais();
    }

    public function alterarDadosCadastrais() {
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->dados['atualizar'])) {
            unset($this->dados['atualizar']);
            //var_dump($this->dados);
            $alterarDadosCadastraisBd = new \App\adms\Models\AdmsAlterarDadosCadastrais();
            $alterarDadosCadastraisBd->alterarDadosCadastrais($this->dados);
            if ($alterarDadosCadastraisBd->getResultado()) {
                $urlDestino = URLADM . 'alterar-dados-cadastrais/alterar-dados-cadastrais';
                header("Location: $urlDestino");
            } else {
                $this->dados['form'] = $this->dados;
                $this->altDadosCadastraisPriv();
            }
        } else {
            $visualizarDadosUsuario = new \App\adms\Models\AdmsConsultarDadosCadastrais();
            $this->dados['form'] = $visualizarDadosUsuario->consultarDadosCadastrais();
            $this->altDadosCadastraisPriv();
        }
    }

    private function altDadosCadastraisPriv() {
        $listarMenu = new \App\adms\Models\AdmsMenu();
        $this->dados['menu'] = $listarMenu->itemMenu();
        $this->dados['sidebarActive'] = "alterar-dados-cadastrais";
        $carregarView = new \Core\ConfigView("adms/Views/dadosCadastrais/alterarDadosCadastrais", $this->dados);
        $carregarView->renderizarAlterarDadosCadastrais();
    }

}
