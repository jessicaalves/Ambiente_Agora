<?php

/* @author jessica */

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsConsultarDadosCadastrais {

    private $resultado;

    public function consultarDadosCadastrais() {
        $visualizarDadosUsuario = new \App\sts\Models\helper\StsRead();
        //$visualizarDadosUsuario->fullRead("SELECT * FROM usuario WHERE id =:id LIMIT :limit" . isset($_POST['id']), "id=" . $_SESSION['id'] . "&limit=1");
        $visualizarDadosUsuario->fullRead("SELECT * FROM sts_usuarios WHERE id =:id LIMIT :limit", "id=" . $_SESSION['id'] . "&limit=1");
        $this->resultado = $visualizarDadosUsuario->getResultado();
        return $this->resultado;
    }

}
