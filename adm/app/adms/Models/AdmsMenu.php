<?php

/* @author jessica */

namespace App\adms\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsMenu {

    private $resultado;

    function getResultado() {
        return $this->resultado;
    }

    public function itemMenu() {
        $listItemMenu = new \App\adms\Models\helper\AdmsRead();
        $listItemMenu->fullRead("SELECT nivpg.dropdown,
                men.id id_men, men.nome nome_men,
                pg.id id_pg, pg.menu_controller, pg.menu_metodo, pg.nome
                FROM adms_nivs_aces_pags nivpg
                INNER JOIN adms_menus men ON men.id=nivpg.adms_menu_id
                INNER JOIN adms_pags pg ON pg.id=nivpg.adms_pagina_id
                WHERE nivpg.adms_nivel_acess_id =:adms_nivel_acess_id
                AND nivpg.permissao =:permissao
                AND nivpg.liberado_menu =:liberado_menu
                ORDER BY men.ordem, nivpg.ordem ASC", "adms_nivel_acess_id=" . $_SESSION['adms_nivel_acesso_id'] . "&permissao=1&liberado_menu=1");
        $this->resultado = $listItemMenu->getResultado();
        //var_dump($this->resultado);
        return $this->resultado;
    }

}
