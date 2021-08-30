<?php

/* @author jessica */

namespace App\adms\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsVisualizarDenunciasRealizadas {

    private $resultado;
    private $pageId;
    private $limiteResultado = 5; //Define quantos registros irão aparecer na tabela por página
    private $resultadoPg;

    function getResultadoPg() {
        return $this->resultadoPg;
    }

    public function visualizarDenunciasRealizadas($pageId = null) {

        $this->pageId = (int) $pageId;
        $paginacao = new \App\adms\Models\helper\AdmsPaginacao(URLADM . 'visualizar-denuncias-realizadas/visualizar-denuncias-realizadas');
        $paginacao->condicao($this->pageId, $this->limiteResultado);

        $paginacao->paginacao("SELECT COUNT(id) AS num_result
                 FROM sts_denuncias_comuns");

        $this->resultadoPg = $paginacao->getResultado();

        $visualizarDenunciasRealizadas = new \App\adms\Models\helper\AdmsRead();
        $visualizarDenunciasRealizadas->fullRead("SELECT * FROM sts_denuncias_comuns 
                WHERE sts_usuario_id =:sts_usuario_id ORDER BY id ASC LIMIT :limit OFFSET :offset", "sts_usuario_id={$_SESSION['id']}&limit={$this->limiteResultado}&offset={$paginacao->getOffset()}");
        $this->resultado = $visualizarDenunciasRealizadas->getResultado();
        return $this->resultado;
    }

}
