<?php

/* @author jessica */

namespace App\sts\Controllers;

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
            $novaDenunciaComum = new \App\sts\Models\StsDenunciaComum($id, $titulo, $tipo, $descricao, $envolvido, $nomeEnvolvido, $funcaoEnvolvido, $imagem);
            $novaDenunciaComum->cadastrarDenunciaComum($this->dados);
            //$novaDenunciaComum->setId($this->dados['id']);
            $novaDenunciaComum->setTitulo($this->dados['titulo']);
            $novaDenunciaComum->setTipo($this->dados['tipo']);
            $novaDenunciaComum->setDescricao($this->dados['descricao']);
            $novaDenunciaComum->setEnvolvido($this->dados['envolvido']);
            $novaDenunciaComum->setNomeEnvolvido($this->dados['nomeEnvolvido']);
            $novaDenunciaComum->setFuncaoEnvolvido($this->dados['funcaoEnvolvido']);
            $novaDenunciaComum->setImagem($this->dados['imagem']);

            if ($novaDenunciaComum->getResultado()) {
                $urlDestino = URL . 'user/listar-denuncias-realizadas/listar-denuncias-realizadas';
                header("Location: $urlDestino");
            } else {
                $this->dados['form'] = $this->dados;
                $carregarView = new \Core\ConfigView("sts/Views/denunciaComum/denunciaComum", $this->dados);
                $carregarView->renderizarDenunciaComum();
            }
        } else {
            $carregarView = new \Core\ConfigView("sts/Views/denunciaComum/denunciaComum", $this->dados);
            $carregarView->renderizarDenunciaComum();
        }
    }

}
