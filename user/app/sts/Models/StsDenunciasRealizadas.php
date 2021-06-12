<?php

/* @author jessica */

namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsDenunciasRealizadas {

    private $resultado;

    public function visualizarDenunciasRealizadas() {
        $visualizarDenunciasRealizadas = new \Sts\Models\helper\StsRead();
        $visualizarDenunciasRealizadas->fullRead("SELECT * FROM denuncia_comum WHERE id_usuario =:id_usuario ORDER BY id ASC LIMIT :limit", "id_usuario={$_SESSION['id']}&limit=10");
        $this->resultado = $visualizarDenunciasRealizadas->getResultado();
        return $this->resultado;
    }

}
