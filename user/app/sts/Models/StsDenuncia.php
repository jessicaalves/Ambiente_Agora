<?php

/* @author jessica */

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

abstract class StsDenuncia {

    private $id;
    private $titulo;
    private $tipo;
    private $descricao;
    private $envolvido;
    private $nomeEnvolvido;
    private $funcaoEnvolvido;
    private $imagem;

    public function __construct($id, $titulo, $tipo, $descricao, $envolvido, $nomeEnvolvido, $funcaoEnvolvido, $imagem) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->tipo = $tipo;
        $this->descricao = $descricao;
        $this->envolvido = $envolvido;
        $this->nomeEnvolvido = $nomeEnvolvido;
        $this->funcaoEnvolvido = $funcaoEnvolvido;

        $this->imagem = $imagem;
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

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

}
