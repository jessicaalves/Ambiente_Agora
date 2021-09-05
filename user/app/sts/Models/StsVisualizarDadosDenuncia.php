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
        $visualizarDadosDenuncia->fullRead("SELECT denun.*,
                 sts.nome nome_status
                 FROM sts_denuncias_comuns denun
                 INNER JOIN sts_status_denuncias sts ON sts.id=denun.sts_status_denuncia_id
                 WHERE denun.id =:id LIMIT :limit", "id=" . $this->dadosId . "&limit=1");

        $this->resultado = $visualizarDadosDenuncia->getResultado();
        return $this->resultado;
    }

}
