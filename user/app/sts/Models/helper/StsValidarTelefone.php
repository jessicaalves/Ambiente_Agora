<?php

/* @author jessica */

namespace App\sts\Models\helper;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsValidarTelefone {

    private $telefone;
    private $resultado;
    private $editarUnico;
    private $dadoId;

    function getResultado() {
        return $this->resultado;
    }

    public function validarTelefone($telefone, $editarUnico = null, $dadoId = null) {
        $this->telefone = (string) $telefone;
        $this->editarUnico = $editarUnico;
        $this->dadoId = $dadoId;

        $validarTelefone = new \App\sts\Models\helper\StsRead();

        if (!empty($this->editarUnico) AND ( $this->editarUnico == true)) {
            $validarTelefone->fullRead("SELECT id FROM sts_usuarios WHERE telefone =:telefone AND id <>:id LIMIT :limit", "telefone={$this->telefone}&limit=1&id={$this->dadoId}");
        } else {
            $validarTelefone->fullRead("SELECT id FROM sts_usuarios WHERE telefone =:telefone LIMIT :limit", "telefone={$this->telefone}&limit=1");
        }

        $this->resultado = $validarTelefone->getResultado();
        if (!empty($this->resultado)) {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Este telefone já está cadastrado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        } else {
            $this->resultado = true;
        }
    }

}
