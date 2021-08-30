<?php

/* @author jessica */

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class DenunciaAnonima {

    private $dados;

    public function index() {
        $cadastroDenunciaAnonima = new DenunciaAnonima();
        $cadastroDenunciaAnonima->cadastrarDenunciaAnonima();
    }

    public function cadastrarDenunciaAnonima() {

        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->dados['cadastrarDenunciaAnonima'])) {
            unset($this->dados['cadastrarDenunciaAnonima']);

            $this->dados['imagem'] = ($_FILES['imagem'] ? $_FILES['imagem'] : null);
            $novaDenunciaAnonima = new \App\sts\Models\StsDenunciaAnonima($id, $titulo, $tipo, $descricao, $envolvido, $nomeEnvolvido, $funcaoEnvolvido, $latitude, $longitude, $imagem);
            $novaDenunciaAnonima->cadastrarDenunciaAnonima($this->dados);
            //$novaDenunciaAnonima->setId($this->dados['id']);
            $novaDenunciaAnonima->setTitulo($this->dados['titulo']);
            $novaDenunciaAnonima->setTipo($this->dados['tipo']);
            $novaDenunciaAnonima->setDescricao($this->dados['descricao']);
            $novaDenunciaAnonima->setEnvolvido($this->dados['envolvido']);
            $novaDenunciaAnonima->setNomeEnvolvido($this->dados['nomeEnvolvido']);
            $novaDenunciaAnonima->setFuncaoEnvolvido($this->dados['funcaoEnvolvido']);
            $novaDenunciaAnonima->setLatitude($this->dados['latitude']);
            $novaDenunciaAnonima->setLongitude($this->dados['longitude']);
            // $novaDenunciaAnonima->setImagem($this->dados['imagem'] = ($_FILES['imagem'] ? $_FILES['imagem'] : null));
            $novaDenunciaAnonima->setImagem($this->dados['imagem']);
            //var_dump($this->dados);

            if ($novaDenunciaAnonima->getResultado()) {
                $urlDestino = URL . 'user/denuncia-anonima/cadastrar-denuncia-anonima';
                header("Location: $urlDestino");
            } else {
                $this->dados['form'] = $this->dados;
                $carregarView = new \Core\ConfigView("sts/Views/denunciaAnonima/denunciaAnonima", $this->dados);
                $carregarView->renderizarDenunciaAnonima();
            }
        } else {
            $carregarView = new \Core\ConfigView("sts/Views/denunciaAnonima/denunciaAnonima", $this->dados);
            $carregarView->renderizarDenunciaAnonima();
        }
    }

}
