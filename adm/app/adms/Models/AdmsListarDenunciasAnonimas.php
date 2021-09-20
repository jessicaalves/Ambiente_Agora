<?php

/* @author jessica */

namespace App\adms\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsListarDenunciasAnonimas {

    private $resultado;
    private $pageId;
    private $limiteResultado = 5; //Define quantos registros irão aparecer na tabela por página
    private $resultadoPg;

    function getResultadoPg() {
        return $this->resultadoPg;
    }

    public function listarDenunciasAnonimas($pageId = null) {
        $this->pageId = (int) $pageId;
        $paginacao = new \App\adms\Models\helper\AdmsPaginacao(URLADM . 'listar-denuncias-anonimas/listar-denuncias-anonimas');
        $paginacao->condicao($this->pageId, $this->limiteResultado);

        $paginacao->paginacao("SELECT COUNT(id) AS num_result
                 FROM sts_denuncias_anonimas");

        $this->resultadoPg = $paginacao->getResultado();

        $listarDenunciasAnonimas = new \App\adms\Models\helper\AdmsRead();
        $listarDenunciasAnonimas->fullRead("SELECT denun.id, denun.titulo, denun.tipo, denun.sts_status_denuncia_id,
                stat.nome nome_status,
                color.cor nome_cor
                FROM sts_denuncias_anonimas AS denun
                INNER JOIN sts_status_denuncias AS stat ON stat.id=denun.sts_status_denuncia_id
                INNER JOIN adms_cors AS color ON color.id=stat.adms_cor_id
                ORDER BY id ASC LIMIT :limit OFFSET :offset", "&limit={$this->limiteResultado}&offset={$paginacao->getOffset()}");
        $this->resultado = $listarDenunciasAnonimas->getResultado();
        return $this->resultado;
    }

}
