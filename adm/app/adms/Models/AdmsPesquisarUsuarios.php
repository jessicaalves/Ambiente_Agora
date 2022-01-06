<?php

/* @author jessica */

namespace App\adms\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsPesquisarUsuarios {

    private $dados;
    private $resultado;
    private $pageId;
    private $limiteResultado = 1; //Define quantos registros irão aparecer na tabela por página
    private $resultadoPg;

    function getResultadoPg() {
        return $this->resultadoPg;
    }

    public function pesquisarUsuarios($pageId = null, $dados = null) {

        $this->pageId = (int) $pageId;
        $this->dados = $dados;
        //var_dump($this->dados);

        $this->dados['nome'] = trim($this->dados['nome']);

        if (!empty($this->dados['nome']) AND ! empty($this->dados['email'])) {
            
        } else if (!empty($this->dados['nome'])) {
            $this->pesquisarUsuariosName();
        } else if (!empty($this->dados['email'])) {
            //$this->pesquisarUsuariosEmail();
        }

        return $this->resultado;
    }

    private function pesquisarUsuariosName() {
        $paginacao = new \App\adms\Models\helper\AdmsPaginacao(URLADM . 'pesquisar-usuarios/listar-usuarios', '?nome=' . $this->dados['nome']);
        $paginacao->condicao($this->pageId, $this->limiteResultado);

        $paginacao->paginacao("SELECT COUNT(user.id) AS num_result 
                FROM adms_usuarios user
                INNER JOIN adms_niveis_acessos nivac ON nivac.id=user.adms_nivel_acesso_id
                WHERE nivac.ordem >=:ordem AND user.nome LIKE '%' :nome '%'", "ordem=" . $_SESSION['ordem_nivac'] . "&nome={$this->dados['nome']}");

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
                WHERE nivac.ordem >=:ordem AND user.nome LIKE '%' :nome '%'
                ORDER BY id ASC LIMIT :limit OFFSET :offset", "ordem=" . $_SESSION['ordem_nivac'] . "&nome={$this->dados['nome']}&limit={$this->limiteResultado}&offset={$paginacao->getOffset()}");

        $this->resultado = $listarUsuarios->getResultado();
    }

}
