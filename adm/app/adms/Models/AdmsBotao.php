<?php

/* @author jessica */

namespace App\adms\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsBotao {

    private $resultado;
    private $botao;
    private $botaoValido = [];

    function getResultado() {
        return $this->resultado;
    }

    public function valBotao(array $botao) {
        $this->botao = $botao;
        //var_dump($this->botao);

        foreach ($this->botao as $key => $botao_unico) {
            extract($botao_unico);
            $verBotao = new \App\adms\Models\helper\AdmsRead();
            $verBotao->fullRead("SELECT pg.id id_pg
                                 FROM adms_pags pg
                                 LEFT JOIN adms_nivs_aces_pags nivpg ON nivpg.adms_pagina_id=pg.id
                                 WHERE pg.menu_controller =:menu_controller
                                 AND pg.menu_metodo =:menu_metodo
                                 AND pg.adms_sit_pag_id = 1
                                 AND nivpg.adms_nivel_acess_id =:adms_nivel_acess_id
                                 AND nivpg.permissao= 1 LIMIT :limit", "menu_controller=$menu_controller&menu_metodo=$menu_metodo&adms_nivel_acess_id=" . $_SESSION['adms_nivel_acesso_id'] . "&limit=1");
            if ($verBotao->getResultado()) {
                $this->botaoValido[$key] = true;
            } else {
                $this->botaoValido[$key] = false;
            }
        }
        return $this->botaoValido;
    }

}
