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
    private $latitude;
    private $longitude;
    private $imagem;
    
    public function __construct($id, $titulo, $tipo, $descricao, $envolvido, $nomeEnvolvido, $funcaoEnvolvido, $latitude, $longitude, $imagem){
        $this->id = $id;
        $this->titulo = $titulo;
        $this->tipo = $tipo;
        $this->descricao = $descricao;
        $this->envolvido = $envolvido;
        $this->nomeEnvolvido = $nomeEnvolvido;
        $this->funcaoEnvolvido = $funcaoEnvolvido;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
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

}
