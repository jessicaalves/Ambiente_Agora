<?php

/* @author jessica */

namespace App\adms\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsListarUsuarios {

    private $resultado;
    private $pageId;
    private $limiteResultado = 3; //Define quantos registros irão aparecer na tabela por página
    private $resultadoPg;

    function getResultadoPg() {
        return $this->resultadoPg;
    }

    public function listarUsuarios($pageId = null) {

        $this->pageId = (int) $pageId;
        $paginacao = new \App\adms\Models\helper\AdmsPaginacao(URLADM . 'listar-usuarios/listar-usuarios');
        $paginacao->condicao($this->pageId, $this->limiteResultado);

        $paginacao->paginacao("SELECT COUNT(user.id) AS num_result 
                FROM adms_usuarios user
                INNER JOIN adms_niveis_acessos nivac ON nivac.id=user.adms_nivel_acesso_id
                WHERE nivac.ordem >=:ordem", "ordem=" . $_SESSION['ordem_nivac']);

        $this->resultadoPg = $paginacao->getResultado();

        $listarUsuarios = new \App\adms\Models\helper\AdmsRead();
        $listarUsuarios->fullRead("SELECT user.id, user.nome, user.email,
                nivac.nome nome_nivac,
                sit.nome nome_sit,
                cr.cor cor_cr
                FROM adms_usuarios user
                INNER JOIN adms_sits_usuarios sit ON sit.id=user.adms_sit_usuario_id
                INNER JOIN adms_cors cr ON cr.id=sit.adms_cor_id
                INNER JOIN adms_niveis_acessos nivac ON nivac.id=user.adms_nivel_acesso_id
                WHERE nivac.ordem >=:ordem
                ORDER BY id ASC LIMIT :limit OFFSET :offset", "ordem=" . $_SESSION['ordem_nivac'] . "&limit={$this->limiteResultado}&offset={$paginacao->getOffset()}");

        $this->resultado = $listarUsuarios->getResultado();
        return $this->resultado;
    }

}
