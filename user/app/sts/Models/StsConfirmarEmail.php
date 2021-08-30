<?php

/* @author jessica */

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsConfirmarEmail {

    private $dadosChave;
    private $dadosUsuario;
    private $resultado;
    private $dados;

    function getResultado() {
        return $this->resultado;
    }

    public function confirmarEmail($chave) {
        $this->dadosChave = (string) $chave;
        $validaChave = new \App\sts\Models\helper\StsRead();
        $validaChave->fullRead("SELECT id FROM sts_usuarios WHERE confirmar_email =:confirmar_email LIMIT :limit", "confirmar_email={$this->dadosChave}&limit=1");
        $this->dadosUsuario = $validaChave->getResultado();
        if (!empty($this->dadosUsuario)) {
            $this->updateConfEmail();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Link de confirmação inválido!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        }
    }

    private function updateConfEmail() {
        $this->dados['confirmar_email'] = NULL;
        $this->dados['sts_sit_usuario_id'] = 1;
        $this->dados['modified'] = date("Y-m-d H:i:s");
        $updateConfEmail = new \App\sts\Models\helper\StsUpdate();
        $updateConfEmail->exeUpdate("sts_usuarios", $this->dados, "WHERE id =:id", "id={$this->dadosUsuario[0]['id']}");
        if ($updateConfEmail->getResultado()) {
            $_SESSION['msg'] = "<div class='alert alert-success'>E-mail confirmado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = true;
        } else {
            $this->resultado = false;
        }
    }

}
