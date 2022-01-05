<?php

/* @author jessica */

namespace App\sts\Models\helper;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsValidarCpf {

    private $cpf;
    private $resultado;
    private $editarUnico;
    private $dadoId;

    function getResultado() {
        return $this->resultado;
    }

    public function validarCpf($cpf, $editarUnico = null, $dadoId = null) {
        $this->cpf = (string) $cpf;
        $this->editarUnico = $editarUnico;
        $this->dadoId = $dadoId;

        $validarCpf = new \App\sts\Models\helper\StsRead();


        if (!empty($this->editarUnico) and ( $this->editarUnico == true)) {
            $validarCpf->fullRead("SELECT id, cpf FROM sts_usuarios WHERE id =:id AND cpf <>:cpf LIMIT :limit", "cpf={$this->cpf}&limit=1&id={$this->dadoId}");
        } else {
            $validarCpf->fullRead("SELECT cpf FROM sts_usuarios WHERE cpf =:cpf LIMIT :limit", "cpf={$this->cpf}&limit=1");
        }

        $this->resultado = $validarCpf->getResultado();
        if (!empty($this->resultado)) {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Este cpf já está cadastrado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        } else {
            $this->resultado = true;
        }
    }

}

