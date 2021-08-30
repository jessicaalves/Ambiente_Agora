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

                $listarMenu = new \App\adms\Models\AdmsMenu();
                $this->dados['menu'] = $listarMenu->itemMenu();
                $carregarView = new \Core\ConfigView("adms/Views/dadosCadastrais/alterarDadosCadastrais", $this->dados);
                $carregarView->renderizarAlterarDadosCadastrais();
            }
        } else {
            $visualizarDadosUsuario = new \App\adms\Models\AdmsVisualizarDadosCadastrais();
            $this->dados['form'] = $visualizarDadosUsuario->visualizarDadosCadastrais();

            $listarMenu = new \App\adms\Models\AdmsMenu();
            $this->dados['menu'] = $listarMenu->itemMenu();
            $carregarView = new \Core\ConfigView("adms/Views/dadosCadastrais/alterarDadosCadastrais", $this->dados);
            $carregarView->renderizarAlterarDadosCadastrais();
        }
    }

}
