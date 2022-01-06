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
    private $limiteResultado = 3; //Define quantos registros irão aparecer na tabela por página
    private $resultadoPg;

    function getResultadoPg() {
        return $this->resultadoPg;
    }

    public function pesquisarUsuarios($pageId = null, $dados = null) {

        $this->pageId = (int) $pageId;
        $this->dados = $dados;
        //var_dump($this->dados);

        $this->dados['nome'] = trim($this->dados['nome']);
        $this->dados['email'] = trim($this->dados['email']);
        
        $_SESSION['pesqUsuarioNome'] = $this->dados['nome'];
        $_SESSION['pesqUsuarioEmail'] = $this->dados['email'];

        if (!empty($this->dados['nome']) AND ! empty($this->dados['email'])) {
            $this->pesquisarUsuariosCompleto();
        } else if (!empty($this->dados['nome'])) {
            $this->pesquisarUsuariosName();
        } else if (!empty($this->dados['email'])) {
            $this->pesquisarUsuariosEmail();
        }

        return $this->resultado;
    }

    private function pesquisarUsuariosCompleto() {
        $paginacao = new \App\adms\Models\helper\AdmsPaginacao(URLADM . 'pesquisar-usuarios/listar-usuarios', '?nome=' . $this->dados['nome'] . '&email=' . $this->dados['email']);
        $paginacao->condicao($this->pageId, $this->limiteResultado);

        $paginacao->paginacao("SELECT COUNT(user.id) AS num_result 
                FROM adms_usuarios user
                INNER JOIN adms_niveis_acessos nivac ON nivac.id=user.adms_nivel_acesso_id
                WHERE nivac.ordem >=:ordem AND 
                (user.nome LIKE '%' :nome '%' OR user.email LIKE '%' :email '%')", "ordem=" . $_SESSION['ordem_nivac'] . "&nome={$this->dados['nome']}&email={$this->dados['email']}");

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
                WHERE nivac.ordem >=:ordem AND 
                (user.nome LIKE '%' :nome '%' OR user.email LIKE '%' :email '%')
                ORDER BY id ASC LIMIT :limit OFFSET :offset", "ordem=" . $_SESSION['ordem_nivac'] . "&nome={$this->dados['nome']}&email={$this->dados['email']}&limit={$this->limiteResultado}&offset={$paginacao->getOffset()}");

        $this->resultado = $listarUsuarios->getResultado();
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

    private function pesquisarUsuariosEmail() {
        $paginacao = new \App\adms\Models\helper\AdmsPaginacao(URLADM . 'pesquisar-usuarios/listar-usuarios', '?email=' . $this->dados['email']);
        $paginacao->condicao($this->pageId, $this->limiteResultado);

        $paginacao->paginacao("SELECT COUNT(user.id) AS num_result 
                FROM adms_usuarios user
                INNER JOIN adms_niveis_acessos nivac ON nivac.id=user.adms_nivel_acesso_id
                WHERE nivac.ordem >=:ordem AND user.email LIKE '%' :email '%'", "ordem=" . $_SESSION['ordem_nivac'] . "&email={$this->dados['email']}");

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
                WHERE nivac.ordem >=:ordem AND user.email LIKE '%' :email '%'
                ORDER BY id ASC LIMIT :limit OFFSET :offset", "ordem=" . $_SESSION['ordem_nivac'] . "&email={$this->dados['email']}&limit={$this->limiteResultado}&offset={$paginacao->getOffset()}");

        $this->resultado = $listarUsuarios->getResultado();
    }

}
