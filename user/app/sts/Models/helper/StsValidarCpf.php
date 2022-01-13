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

    private function verificarCpfValido($number) {
        $cpf = preg_replace('/[^0-9]/', "", $number);

        if (strlen($cpf) != 11 || preg_match('/([0-9])\1{10}/', $cpf)) {
            return false;
        }

        $number_quantity_to_loop = [9, 10];

        foreach ($number_quantity_to_loop as $item) {

            $sum = 0;
            $number_to_multiplicate = $item + 1;

            for ($index = 0; $index < $item; $index++) {

                $sum += $cpf[$index] * ($number_to_multiplicate--);
            }

            $result = (($sum * 10) % 11);

            if ($cpf[$item] != $result) {
                return false;
            }
        }

        return true;
    }

}
