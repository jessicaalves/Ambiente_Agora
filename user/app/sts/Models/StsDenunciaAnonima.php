<?php

/* @author jessica */

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsDenunciaAnonima extends StsDenuncia {

    private $dados;
    private $resultado;

    function getResultado() {
        return $this->resultado;
    }

    public function cadastrarDenunciaAnonima(array $dados) {
        $this->id = isset($this->dados['id']);
        $this->titulo = isset($this->dados['titulo']);
        $this->tipo = isset($this->dados['tipo']);
        $this->descricao = isset($this->dados['descricao']);
        $this->envolvido = isset($this->dados['envolvido']);
        $this->nomeEnvolvido = isset($this->dados['nomeEnvolvido']);
        $this->funcaoEnvolvido = isset($this->dados['funcaoEnvolvido']);
        $this->imagem = isset($this->dados['imagem']);

        $this->dados = $dados;

        $this->titulo = ($this->dados['titulo']);
        unset($this->dados['titulo']);

        $this->nomeEnvolvido = ($this->dados['nomeEnvolvido']);
        unset($this->dados['nomeEnvolvido']);

        $this->funcaoEnvolvido = ($this->dados['funcaoEnvolvido']);
        unset($this->dados['funcaoEnvolvido']);

        $this->imagem = $this->dados['imagem'];
        unset($this->dados['imagem']);

        $validarCampoVazio = new \App\sts\Models\helper\StsValidarCampoVazio();
        $validarCampoVazio->validarDados($this->dados);

        if ($validarCampoVazio->getResultado()) {
            $this->inserir();
        } else {
            $this->resultado = false;
        }
    }

    private function inserir() {
        $this->dados['titulo'] = $this->titulo;
        $this->dados['nome_envolvido'] = $this->nomeEnvolvido;
        $this->dados['funcao_envolvido'] = $this->funcaoEnvolvido;
        $this->dados['created'] = date('Y-m-d H:i:s');

        $slugImg = new \App\sts\Models\helper\StsSlug();
        $this->dados['imagem'] = $slugImg->nomeSlug($this->imagem['name']);

        $cadDenunciaAnonima = new \App\sts\Models\helper\StsCreate();
        $cadDenunciaAnonima->executarCreate('sts_denuncias_anonimas', $this->dados);
        if ($cadDenunciaAnonima->getResultado()) {
            if (empty($this->imagem['name'])) {
                $_SESSION['msg'] = "<div class='alert alert-success'>Denúncia anônima criada com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                $this->resultado = true;
            } else {
                $this->dados['id'] = $cadDenunciaAnonima->getResultado();
                $this->validarFoto();
            }
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao criar denúncia anônima!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        }
    }

    private function validarFoto() {
        $uploadImg = new \App\sts\Models\helper\StsUploadImagem();
        $uploadImg->uploadImagem($this->imagem, 'assets/img/uploadImagens/denunciaAnonima/' . $this->dados['id'] . '/', $this->dados['imagem']);
        if ($uploadImg->getResultado()) {
            $_SESSION['msg'] = "<div class='alert alert-success'>Denúncia anônima criada com sucesso! Upload da imagem realizado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";

            $this->resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: A extensão da imagem é inválida. Selecione uma imagem JPEG ou PNG!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";


            $this->resultado = false;
        }
    }

}
