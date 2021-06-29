<?php

/* @author jessica */

namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsVisualizarDadosCadastrais {

    private $resultado;

    public function visualizarDadosCadastrais() {
        $visualizarDadosUsuario = new \Sts\Models\helper\StsRead();
        //$visualizarDadosUsuario->fullRead("SELECT * FROM usuario WHERE id =:id LIMIT :limit" . isset($_POST['id']), "id=" . $_SESSION['id'] . "&limit=1");
        $visualizarDadosUsuario->fullRead("SELECT * FROM sts_usuarios WHERE id =:id LIMIT :limit", "id=" . $_SESSION['id'] . "&limit=1");
        $this->resultado = $visualizarDadosUsuario->getResultado();
        return $this->resultado;
    }

}
