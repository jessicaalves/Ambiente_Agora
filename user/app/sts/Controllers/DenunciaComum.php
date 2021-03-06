<?php

/* @author jessica */

namespace App\Sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class DenunciaComum {

    private $dados;

    public function index() {
        $cadastrarDenunciaComum = new DenunciaComum();
        $cadastrarDenunciaComum->cadastrarDenunciaComum();
    }

    public function cadastrarDenunciaComum() {

        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (!empty($this->dados['cadastrarDenunciaComum'])) {
            unset($this->dados['cadastrarDenunciaComum']);

            $this->dados['imagem'] = ($_FILES['imagem'] ? $_FILES['imagem'] : null);
            $novaDenunciaComum = new \Sts\Models\StsDenunciaComum();
            $novaDenunciaComum->cadastrarDenunciaComum($this->dados);
            //$novaDenunciaComum->setId($this->dados['id']);
            $novaDenunciaComum->setTitulo($this->dados['titulo']);
            $novaDenunciaComum->setTipo($this->dados['tipo']);
            $novaDenunciaComum->setDescricao($this->dados['descricao']);
            $novaDenunciaComum->setEnvolvido($this->dados['envolvido']);
            $novaDenunciaComum->setNomeEnvolvido($this->dados['nomeEnvolvido']);
            $novaDenunciaComum->setFuncaoEnvolvido($this->dados['funcaoEnvolvido']);
            $novaDenunciaComum->setLatitude($this->dados['latitude']);
            $novaDenunciaComum->setLongitude($this->dados['longitude']);
            $novaDenunciaComum->setImagem($this->dados['imagem']);

            if ($novaDenunciaComum->getResultado()) {
                $urlDestino = URL . 'user/denuncia-comum/cadastrar-denuncia-comum';
                header("Location: $urlDestino");
            } else {
                $this->dados['form'] = $this->dados;
                $carregarView = new \Core\ConfigView("sts/Views/denunciaComum/denunciaComum", $this->dados);
                $carregarView->renderizarDenunciaComum();
            }
        } else {
            $carregarView = new \Core\ConfigView("sts/Views/denunciaComum/denunciaComum");
            $carregarView->renderizarDenunciaComum();
        }
    }

}
