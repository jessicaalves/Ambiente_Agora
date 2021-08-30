<?php

/* @author jessica */

namespace App\sts\Controllers;

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
            $alterarDadosCadastraisBd = new \App\sts\Models\StsAlterarDadosCadastrais(); 
            $alterarDadosCadastraisBd->alterarDadosCadastrais($this->dados);
            if ($alterarDadosCadastraisBd->getResultado()) {
                $urlDestino = URL . 'user/alterar-dados-cadastrais/alterar-dados-cadastrais';
                header("Location: $urlDestino");
            } else {
                $this->dados['form'] = $this->dados;
                $carregarView = new \Core\ConfigView("sts/Views/dadosCadastrais/alterarDadosCadastrais", $this->dados);
                $carregarView->renderizarAlterarDadosCadastrais();
            }
        } else {
            $visualizarDadosUsuario = new \App\sts\Models\StsVisualizarDadosCadastrais();
            $this->dados['form'] = $visualizarDadosUsuario->visualizarDadosCadastrais();
            $carregarView = new \Core\ConfigView("sts/Views/dadosCadastrais/alterarDadosCadastrais", $this->dados);
            $carregarView->renderizarAlterarDadosCadastrais();
        }
    }

}
