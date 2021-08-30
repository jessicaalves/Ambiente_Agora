<?php

/* @author jessica */

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class DenunciasRealizadas {

    private $dados;
    private $pageId;

    public function index() {
        $denunciasRealizadas = new DenunciasRealizadas();
        $denunciasRealizadas->visualizarDenunciasRealizadas();
    }

    public function visualizarDenunciasRealizadas($pageId = null) {
        $this->pageId = (int) $pageId ? $pageId : 1;
        
        $visualizarDenunciasRealizadas = new \App\sts\Models\StsDenunciasRealizadas(); 
        $this->dados['denunciasRealizadas'] = $visualizarDenunciasRealizadas->visualizarDenunciasRealizadas($this->pageId);
        $this->dados['paginacao'] = $visualizarDenunciasRealizadas->getResultadoPg();

        $carregarView = new \Core\ConfigView('sts/Views/denunciasRealizadas/denunciasRealizadas', $this->dados);
        $carregarView->renderizarDenunciasRealizadas();
    }

}
