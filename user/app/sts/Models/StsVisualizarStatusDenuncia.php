<?php

/* @author jessica */

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsVisualizarStatusDenuncia {

    private $resultado;
    private $dadosId;

    public function visualizarStatusDenuncia($dadosId) {
        $this->dadosId = (int) $dadosId;
        $visualizarStatus = new \App\sts\Models\helper\StsRead();
        $visualizarStatus->fullRead("SELECT denun.*,
                descr.descricao descricao_status
                FROM sts_denuncias_comuns AS denun
                INNER JOIN sts_status_denuncias AS stat ON stat.id=denun.sts_status_denuncia_id                
                INNER JOIN sts_descricoes_status_denuncias AS descr ON descr.id=denun.sts_descricao_stat_id
                WHERE denun.id =:id LIMIT :limit", "id=" . $this->dadosId . "&limit=1");
        $this->resultado = $visualizarStatus->getResultado();
        return $this->resultado;
    }

}
