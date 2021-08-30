<?php

/* @author jessica */

namespace App\adms\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsPaginas {

    private $resultado;
    private $urlController;
    private $urlMetodo;

    public function listarPaginas($urlController = null, $urlMetodo = null) {
        if(!isset($_SESSION['adms_nivel_acesso_id'])){
            $_SESSION['adms_nivel_acesso_id'] = null;
        }
        $this->urlController = (string) $urlController;
        $this->urlMetodo = (string) $urlMetodo;
        $listar = new \App\adms\Models\helper\AdmsRead();
        $listar->fullRead("SELECT pg.id,
                tpg.tipo tipo_tpg
                FROM adms_pags pg
                INNER JOIN adms_tipos_pags tpg ON tpg.id=pg.adms_tipo_pag_id
                LEFT JOIN adms_nivs_aces_pags nivpg ON nivpg.adms_pagina_id=pg.id AND nivpg.adms_nivel_acess_id =:adms_nivel_acess_id
                WHERE (pg.controller =:controller
                AND pg.metodo =:metodo) AND ((pg.liberado_bloqueado =:liberado_bloqueado) OR (nivpg.permissao =:permissao))
                LIMIT :limit", "adms_nivel_acess_id={$_SESSION['adms_nivel_acesso_id']}&controller={$this->urlController}&metodo={$this->urlMetodo}&liberado_bloqueado=1&permissao=1&limit=1");
        //var_dump($listar);        
        $this->resultado = $listar->getResultado();        
        return $this->resultado;
    }

}
