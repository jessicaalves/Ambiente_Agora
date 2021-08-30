<?php

/* @author jessica */

namespace App\adms\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsVisualizarNivelAcesso {

    private $resultado;
    private $dadosId;

    public function visualizarNivelAcesso($dadosId) {
        $this->dadosId = (int) $dadosId;
        $visualizarNivelAcesso = new \App\adms\Models\helper\AdmsRead();
        $visualizarNivelAcesso->fullRead("SELECT * FROM adms_niveis_acessos nivac
                WHERE nivac.id =:id AND ordem >=:ordem LIMIT :limit", "id=" . $this->dadosId . "&ordem=" . $_SESSION['ordem_nivac'] . "&limit=1");
        $this->resultado = $visualizarNivelAcesso->getResultado();
        return $this->resultado;
    }

}
