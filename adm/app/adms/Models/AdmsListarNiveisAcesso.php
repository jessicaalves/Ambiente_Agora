<?php

/* @author jessica */

namespace App\adms\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsListarNiveisAcesso {

    private $resultado;
    private $pageId;
    private $limiteResultado = 3; //Define quantos registros irão aparecer na tabela por página
    private $resultadoPg;

    function getResultadoPg() {
        return $this->resultadoPg;
    }

    public function listarNiveisAcesso($pageId = null) {

        $this->pageId = (int) $pageId;
        $paginacao = new \App\adms\Models\helper\AdmsPaginacao(URLADM . 'listar-niveis-acesso/listar-niveis-acesso');
        $paginacao->condicao($this->pageId, $this->limiteResultado);

        $paginacao->paginacao("SELECT COUNT(nivac.id) AS num_result 
                FROM adms_niveis_acessos nivac
                WHERE nivac.ordem >=:ordem", "ordem=" . $_SESSION['ordem_nivac']);

        $this->resultadoPg = $paginacao->getResultado();

        $listarNiveisAcesso = new \App\adms\Models\helper\AdmsRead();
        $listarNiveisAcesso->fullRead("SELECT nivac.id, nivac.nome, nivac.ordem
                FROM adms_niveis_acessos nivac
                WHERE nivac.ordem >=:ordem
                ORDER BY ordem ASC LIMIT :limit OFFSET :offset", "ordem=" . $_SESSION['ordem_nivac'] . "&limit={$this->limiteResultado}&offset={$paginacao->getOffset()}");

        $this->resultado = $listarNiveisAcesso->getResultado();
        return $this->resultado;
    }

}
