<?php

/* @author jessica */

namespace App\sts\Models\helper;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsValidarCampoVazio {

    private $dados;
    private $resultado;

    function getResultado() {
        return $this->resultado;
    }

    public function validarDados(array $dados) {
        $this->dados = $dados;

        $this->dados = array_map('strip_tags', $this->dados); //Remove as tags;
        $this->dados = array_map('trim', $this->dados); //Remove os espaços em branco;
        //var_dump($this->dados);

        if (in_array('', $this->dados)) {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Necessário preencher os campos obrigatórios!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        } else {
            $this->resultado = true;
        }
    }

}
