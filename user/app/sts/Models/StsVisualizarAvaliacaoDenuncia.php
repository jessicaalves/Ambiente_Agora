<?php

/* @author jessica */

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsVisualizarAvaliacaoDenuncia {

    private $resultado;
    private $dadosId;

    public function visualizarAvaliacaoDenuncia($dadosId) {
        $this->dadosId = (int) $dadosId;
        $visualizarAvaliacao = new \App\sts\Models\helper\StsRead();
        $visualizarAvaliacao->fullRead("SELECT denun.*,
                descr.descricao descricao_status,
                stat.nome nome_status
                FROM sts_denuncias_comuns AS denun
                INNER JOIN sts_status_denuncias AS stat ON stat.id=denun.sts_status_denuncia_id                
                INNER JOIN sts_descricoes_status_denuncias AS descr ON descr.id=denun.sts_descricao_stat_id
                WHERE denun.id =:id LIMIT :limit", "id=" . $this->dadosId . "&limit=1");
        $this->resultado = $visualizarAvaliacao->getResultado();
        return $this->resultado;
    }

}
