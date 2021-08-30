<?php

/* @author jessica */

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsVisualizarDadosDenuncia {

    private $resultado;
    private $dadosId;

    public function visualizarDadosDenuncia($dadosId) {
        $this->dadosId = (int) $dadosId;
        $visualizarDadosDenuncia = new \App\sts\Models\helper\StsRead();
        $visualizarDadosDenuncia->fullRead("SELECT * FROM sts_denuncias_comuns WHERE id =:id LIMIT :limit", "id=" . $this->dadosId . "&limit=1");

        $this->resultado = $visualizarDadosDenuncia->getResultado();
        return $this->resultado;
    }

}
