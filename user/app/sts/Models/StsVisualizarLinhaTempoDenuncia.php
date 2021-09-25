<?php

/* @author jessica */

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsVisualizarLinhaTempoDenuncia {

    private $resultado;
    private $dadosId;

    public function visualizarLinhaTempoDenuncia($dadosId) {
        $this->dadosId = (int) $dadosId;
        $visualizarLinhaTempo = new \App\sts\Models\helper\StsRead();
        $visualizarLinhaTempo->fullRead("SELECT * 
                FROM sts_denuncias_comuns 
                WHERE id =:id LIMIT :limit", "id=" . $this->dadosId . "&limit=1");
        $this->resultado = $visualizarLinhaTempo->getResultado();
        return $this->resultado;
    }

}
