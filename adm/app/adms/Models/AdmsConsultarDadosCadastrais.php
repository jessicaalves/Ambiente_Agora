<?php

/* @author jessica */

namespace App\adms\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsConsultarDadosCadastrais {

    private $resultado;

    public function consultarDadosCadastrais() {
        $visualizarDadosUsuario = new \App\adms\Models\helper\AdmsRead();
        //$visualizarDadosUsuario->fullRead("SELECT * FROM adms_usuarios WHERE id =:id LIMIT :limit" . isset($_POST['id']), "id=" . $_SESSION['id'] . "&limit=1");
        $visualizarDadosUsuario->fullRead("SELECT * FROM adms_usuarios WHERE id =:id LIMIT :limit", "id=" . $_SESSION['id'] . "&limit=1");
        $this->resultado = $visualizarDadosUsuario->getResultado();
        return $this->resultado;
    }

}
