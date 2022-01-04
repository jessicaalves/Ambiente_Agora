<?php

/* @author jessica */

namespace App\adms\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsApagarUsuario {

    private $dadosId;
    private $resultado;

    function getResultado() {
        return $this->resultado;
    }

    public function apagarUsuario($dadosId = null) {
        $this->dadosId = (int) $dadosId;

        $apagarUser = new \App\adms\Models\helper\AdmsRead();
        $apagarUser->fullRead("SELECT user.id FROM adms_usuarios user
                 INNER JOIN adms_niveis_acessos nivac ON nivac.id=user.adms_nivel_acesso_id
                 WHERE user.id =:id AND nivac.ordem >:ordem LIMIT :limit", "id=" . $this->dadosId . "&ordem=" . $_SESSION['ordem_nivac'] . "&limit=1");

        if ($apagarUser->getResultado()) {
            $apagarUsuario = new \App\adms\Models\helper\AdmsDelete();
            $apagarUsuario->exeDelete("adms_usuarios", "WHERE id =:id", "id={$this->dadosId}");

            if ($apagarUsuario->getResultado()) {
                $_SESSION['msg'] = "<div class='alert alert-success'>Administrador apagado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                $this->resultado = true;
            } else {
                $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao apagar administrador!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                $this->resultado = false;
            }
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao apagar administrador!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        }
    }

}
