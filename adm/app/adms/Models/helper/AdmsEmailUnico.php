<?php

/* @author jessica */

namespace App\adms\Models\helper;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsEmailUnico {

    private $email;
    private $resultado;
    private $editarUnico;
    private $dadoId;

    function getResultado() {
        return $this->resultado;
    }

    public function validarEmailUnico($email, $editarUnico = null, $dadoId = null) {
        $this->email = (string) $email;
        $this->editarUnico = $editarUnico;
        $this->dadoId = $dadoId;

        $validarEmailUnico = new \App\Adms\Models\helper\AdmsRead();

        if (!empty($this->editarUnico) AND ( $this->editarUnico == true)) {
            $validarEmailUnico->fullRead("SELECT id FROM adms_usuarios WHERE email =:email AND id <>:id LIMIT :limit", "email={$this->email}&limit=1&id={$this->dadoId}");
        } else {
            $validarEmailUnico->fullRead("SELECT id FROM adms_usuarios WHERE email =:email LIMIT :limit", "email={$this->email}&limit=1");
        }

        $this->resultado = $validarEmailUnico->getResultado();
        if (!empty($this->resultado)) {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Este e-mail já está cadastrado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        } else {
            $this->resultado = true;
        }
    }

}
