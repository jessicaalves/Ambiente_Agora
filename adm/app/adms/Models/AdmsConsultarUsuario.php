<?php

/* @author jessica */

namespace App\adms\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsConsultarUsuario {

    private $resultado;
    private $dadosId;

    public function consultarUsuario($dadosId) {
        $this->dadosId = (int) $dadosId;
        $visualizarUsuario = new \App\adms\Models\helper\AdmsRead();
        $visualizarUsuario->fullRead("SELECT user.*, 
                nivac.nome nome_nivac,
                sit.nome nome_sit
                FROM adms_usuarios user
                INNER JOIN adms_niveis_acessos nivac ON nivac.id=user.adms_nivel_acesso_id
                INNER JOIN adms_sits_usuarios sit ON sit.id=user.adms_sit_usuario_id
                WHERE user.id =:id LIMIT :limit", "id=" . $this->dadosId . "&limit=1");
        $this->resultado = $visualizarUsuario->getResultado();
        return $this->resultado;
    }

}
