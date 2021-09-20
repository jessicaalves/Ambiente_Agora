<?php

/* @author jessica */

namespace App\adms\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsVisualizarDenunciaAnonima {

    private $resultado;
    private $dadosId;

    public function visualizarDenunciaAnonima($dadosId) {
        $this->dadosId = (int) $dadosId;
        $visualizarDenunciaAnonima = new \App\adms\Models\helper\AdmsRead();
        $visualizarDenunciaAnonima->fullRead("SELECT denun.*,
                 sts.nome nome_status
                 FROM sts_denuncias_comuns denun
                 INNER JOIN sts_status_denuncias sts ON sts.id=denun.sts_status_denuncia_id
                 WHERE denun.id =:id LIMIT :limit", "id=" . $this->dadosId . "&limit=1");
        $this->resultado = $visualizarDenunciaAnonima->getResultado();
        return $this->resultado;
    }

}
