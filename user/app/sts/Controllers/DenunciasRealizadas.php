<?php

/* @author jessica */

namespace App\Sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class DenunciasRealizadas {

    public function index() {
        $denunciasRealizadas = new DenunciasRealizadas();
        $denunciasRealizadas->visualizarDenunciasRealizadas();
    }
    
    public function visualizarDenunciasRealizadas(){
        $visualizarDenunciasRealizadas = new \Sts\Models\StsDenunciasRealizadas();
        $this->dados['denunciasRealizadas'] = $visualizarDenunciasRealizadas->visualizarDenunciasRealizadas();
        
        $carregarView = new \Core\ConfigView('sts/Views/denunciasRealizadas/denunciasRealizadas', $this->dados);
        $carregarView->renderizarDenunciasRealizadas();
    }

}
