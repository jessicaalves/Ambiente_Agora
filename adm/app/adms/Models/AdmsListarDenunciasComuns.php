<?php

/* @author jessica */

namespace App\adms\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsListarDenunciasComuns {

    private $resultado;
    private $pageId;
    private $limiteResultado = 5; //Define quantos registros irão aparecer na tabela por página
    private $resultadoPg;

    function getResultadoPg() {
        return $this->resultadoPg;
    }

    public function listarDenunciasComuns($pageId = null) {

        $this->pageId = (int) $pageId;
        $paginacao = new \App\adms\Models\helper\AdmsPaginacao(URLADM . 'listar-denuncias-comuns/listar-denuncias-comuns');
        $paginacao->condicao($this->pageId, $this->limiteResultado);

        $paginacao->paginacao("SELECT COUNT(id) AS num_result
                 FROM sts_denuncias_comuns");

        $this->resultadoPg = $paginacao->getResultado();

        $listarDenunciasComuns = new \App\adms\Models\helper\AdmsRead();
        $listarDenunciasComuns->fullRead("SELECT * 
                FROM sts_denuncias_comuns denun
                INNER JOIN adms_status_denuncias stat ON stat.id=denun.sts_status_denuncia_id
                WHERE sts_usuario_id =:sts_usuario_id AND denun.id =:id
                ORDER BY id ASC LIMIT :limit OFFSET :offset", "sts_usuario_id={$_SESSION['id']}&limit={$this->limiteResultado}&offset={$paginacao->getOffset()}");
        $this->resultado = $listarDenunciasComuns->getResultado();
        return $this->resultado;
    }

}
