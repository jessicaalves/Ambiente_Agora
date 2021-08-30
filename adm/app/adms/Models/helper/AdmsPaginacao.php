<?php

/* @author jessica */

namespace App\adms\Models\helper;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsPaginacao {

    private $link;
    private $pagina;
    private $limiteResultado;
    private $offset;
    private $query;
    private $parseString;
    private $resultBd;
    private $resultado;
    private $totalPaginas;
    private $maxLinks = 1;

    function getResultado() {
        return $this->resultado;
    }

    function getOffset() {
        return $this->offset;
    }

    function __construct($link) {
        $this->link = $link;
    }

    public function condicao($pagina, $limiteResultado) {
        $this->pagina = (int) $pagina ? $pagina : 1;
        $this->limiteResultado = (int) $limiteResultado;
        $this->offset = ($this->pagina * $this->limiteResultado) - $this->limiteResultado;
    }

    public function paginacao($query, $parseString = null) {
        $this->query = (string) $query;
        $this->parseString = (string) $parseString;
        $contar = new \App\adms\Models\helper\AdmsRead();
        $contar->fullRead($this->query, $this->parseString);
        $this->resultBd = $contar->getResultado();

        if ($this->resultBd[0]['num_result'] > $this->limiteResultado) {
            $this->instrucaoPaginacao();
        } else {
            $this->resultado = null;
        }
    }

    private function instrucaoPaginacao() {
        $this->totalPaginas = ceil($this->resultBd[0]['num_result'] / $this->limiteResultado);
        if ($this->totalPaginas >= $this->pagina) {
            $this->layoutPaginacao();
        } else {
            header("Location: {$this->link}");
        }
    }

    private function layoutPaginacao() {

        $this->resultado = "<nav aria-label='paginacao'>";
        $this->resultado .= "<ul class='pagination pagination-sm justify-content-center'>";
        $this->resultado .= "<li class='page-item text-success'>";
        $this->resultado .= "<a class='page-link text-success' href='" . $this->link . "' tabindex='-1'>Primeira</a>";
        $this->resultado .= "</li>";

        for ($iPag = $this->pagina - $this->maxLinks; $iPag <= $this->pagina - 1; $iPag++) {
            if ($iPag >= 1) {
                $this->resultado .= "<li class='page-item'><a class='page-link text-success' href='" . $this->link . "/" . $iPag . "'>$iPag</a></li>";
            }
        }

        for ($dPag = $this->pagina + 1; $dPag <= $this->pagina + $this->maxLinks; $dPag++) {
            if ($dPag <= $this->totalPaginas) {
                $this->resultado .= "<li class='page-item'><a class='page-link text-success' href='" . $this->link . "/" . $dPag . "'>$dPag</a></li>";
            }
        }

        $this->resultado .= "<li class='page-item'>";
        $this->resultado .= "<a class='page-link text-success' href='" . $this->link . "/" . $this->totalPaginas . "'>Última</a>";
        $this->resultado .= "</li>";
        $this->resultado .= "</ul>";
        $this->resultado .= "</nav>";
    }

}
