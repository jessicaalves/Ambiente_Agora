<?php

/* @author jessica */

namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsDenunciaAnonima {

    private $dados;
    private $resultado;
    private $id;
    private $titulo;
    private $tipo;
    private $descricao;
    private $envolvido;
    private $nomeEnvolvido;
    private $funcaoEnvolvido;
    private $latitude;
    private $longitude;
    private $imagem;

    function getResultado() {
        return $this->resultado;
    }

    function getId() {
        return $this->id;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getEnvolvido() {
        return $this->envolvido;
    }

    function getNomeEnvolvido() {
        return $this->nomeEnvolvido;
    }

    function getLatitude() {
        return $this->latitude;
    }

    function getLongitude() {
        return $this->longitude;
    }

    function getFuncaoEnvolvido() {
        return $this->funcaoEnvolvido;
    }

    function getImagem() {
        return $this->imagem;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setEnvolvido($envolvido) {
        $this->envolvido = $envolvido;
    }

    function setNomeEnvolvido($nomeEnvolvido) {
        $this->nomeEnvolvido = $nomeEnvolvido;
    }

    function setFuncaoEnvolvido($funcaoEnvolvido) {
        $this->funcaoEnvolvido = $funcaoEnvolvido;
    }

    function setLatitude($latitude) {
        $this->latitude = $latitude;
    }

    function setLongitude($longitude) {
        $this->longitude = $longitude;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    public function cadastrarDenunciaAnonima(array $dados) {
        $this->id = isset($this->dados['id']);
        $this->titulo = isset($this->dados['titulo']);
        $this->tipo = isset($this->dados['tipo']);
        $this->descricao = isset($this->dados['descricao']);
        $this->envolvido = isset($this->dados['envolvido']);
        $this->nomeEnvolvido = isset($this->dados['nomeEnvolvido']);
        $this->funcaoEnvolvido = isset($this->dados['funcaoEnvolvido']);
        $this->latitude = isset($this->dados['latitude']);
        $this->longitude = isset($this->dados['longitude']);
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

        $validarCampoVazio = new \Sts\Models\helper\StsValidarCampoVazio();
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

        $slugImg = new \Sts\Models\helper\StsSlug();
        $this->dados['imagem'] = $slugImg->nomeSlug($this->imagem['name']);

        $cadDenunciaAnonima = new \Sts\Models\helper\StsCreate();
        $cadDenunciaAnonima->executarCreate('sts_denuncia_anonima', $this->dados);
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
        $uploadImg = new \Sts\Models\helper\StsUploadImagem();
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
