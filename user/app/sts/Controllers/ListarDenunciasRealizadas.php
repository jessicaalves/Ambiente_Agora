<?php

/* @author jessica */

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class ListarDenunciasRealizadas {

    private $dados;
    private $pageId;

    public function index() {
        $denunciasRealizadas = new ListarDenunciasRealizadas();
        $denunciasRealizadas->listarDenunciasRealizadas();
    }

    public function listarDenunciasRealizadas($pageId = null) {
        $this->pageId = (int) $pageId ? $pageId : 1;
        
        $listarDenunciasRealizadas = new \App\sts\Models\StsListarDenunciasRealizadas(); 
        $this->dados['denunciasRealizadas'] = $listarDenunciasRealizadas->listarDenunciasRealizadas($this->pageId);
        $this->dados['paginacao'] = $listarDenunciasRealizadas->getResultadoPg();

        $carregarView = new \Core\ConfigView('sts/Views/denunciasRealizadas/listarDenunciasRealizadas', $this->dados);
        $carregarView->renderizarListarDenunciasRealizadas();
    }

}
