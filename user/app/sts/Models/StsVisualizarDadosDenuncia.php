<?php

/* @author jessica */

namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsVisualizarDadosDenuncia {

    private $resultado;
    private $dadosId;

    public function visualizarDadosDenuncia($dadosId) {
        $this->dadosId = (int) $dadosId;
        $visualizarDadosDenuncia = new \Sts\Models\helper\StsRead();
        $visualizarDadosDenuncia->fullRead("SELECT * FROM denuncia_comum WHERE id =:id LIMIT :limit", "id=" . $this->dadosId . "&limit=1");

        $this->resultado = $visualizarDadosDenuncia->getResultado();
        return $this->resultado;
    }

}
