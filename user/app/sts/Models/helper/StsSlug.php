<?php

/* @author jessica */

namespace Sts\Models\helper;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsSlug {

    private $nome;
    private $formato;

    public function nomeSlug($nome) {
        $this->nome = (string) $nome;
        $this->formato['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:,\\\'<>°ºª';
        $this->formato['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                ';

        $this->nome = strtr(utf8_decode($this->nome), utf8_decode($this->formato['a']), $this->formato['b']);
        $this->nome = strip_tags($this->nome);

        $this->nome = str_replace(' ', '-', $this->nome);

        $this->nome = str_replace(array('-----', '----', '---', '--'), '-', $this->nome);

        $this->nome = strtolower($this->nome);

        return $this->nome;
    }

}
