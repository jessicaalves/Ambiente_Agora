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
    private $tipoPessoa;
    private $nomeSuspeito;
    private $ocupacaoSuspeito;
    private $imagem;

    public function __construct($id, $titulo, $tipo, $descricao, $tipoPessoa, $nomeSuspeito, $ocupacaoSuspeito, $imagem) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->tipo = $tipo;
        $this->descricao = $descricao;
        $this->tipoPessoa = $tipoPessoa;
        $this->nomeSuspeito = $nomeSuspeito;
        $this->ocupacaoSuspeito = $ocupacaoSuspeito;
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

    function getTipoPessoa() {
        return $this->tipoPessoa;
    }

    function getNomeSuspeito() {
        return $this->nomeSuspeito;
    }

    function getOcupacaoSuspeito() {
        return $this->ocupacaoSuspeito;
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

    function setTipoPessoa($tipoPessoa) {
        $this->tipoPessoa = $tipoPessoa;
    }

    function setNomeSuspeito($nomeSuspeito) {
        $this->nomeSuspeito = $nomeSuspeito;
    }

    function setOcupacaoSuspeito($ocupacaoSuspeito) {
        $this->ocupacaoSuspeito = $ocupacaoSuspeito;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

}
