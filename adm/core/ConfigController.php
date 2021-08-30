<?php

/* @author jessica */

namespace Core;

class ConfigController {

    private $url;
    private $urlConjunto;
    private $urlController;
    private $urlParametro;
    private $urlMetodo;
    private $classe;
    private $paginas;
    private static $format;

    public function __construct() {
        if (!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))) {
            $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);
            $this->limparUrl();
            $this->urlConjunto = explode("/", $this->url);

            if (isset($this->urlConjunto[0])) {
                $this->urlController = $this->slugController($this->urlConjunto[0]);
            } else {
                $this->urlController = $this->slugController(CONTROLLER);
            }

            if (isset($this->urlConjunto[1])) {
                $this->urlMetodo = $this->slugMetodo($this->urlConjunto[1]);
            } else {
                $this->urlMetodo = $this->slugMetodo(METODO);
            }

            if (isset($this->urlConjunto[2])) {
                $this->urlParametro = $this->urlConjunto[2];
            } else {
                $this->urlParametro = null;
            }
        } else {
            $this->urlController = $this->slugController(CONTROLLER);
            $this->urlMetodo = $this->slugMetodo(METODO);
            $this->urlParametro = null;
        }

//        echo "Url: {$this->url}<br>";
//        echo "Controller: {$this->urlController}<br>";
//        echo "Metodo: {$this->urlMetodo}<br>";
//        echo "Parametro: {$this->urlParametro}<br>";
    }

    private function limparUrl() {
        $this->url = strip_tags($this->url);
        $this->url = trim($this->url);
        $this->url = rtrim($this->url, "/");

        self::$format = array();
        self::$format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]?;:.,\\\'<>°ºª ';
        self::$format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr--------------------------------';
        $this->url = strtr(utf8_decode($this->url), utf8_decode(self::$format['a']), self::$format['b']);
    }

    private function slugController($slugController) {

        $urlController = str_replace(" ", "", ucwords(implode(" ", explode("-", strtolower($slugController)))));

        return $urlController;
    }

    private function slugMetodo($slugMetodo) {

        $urlController = str_replace(" ", "", ucwords(implode(" ", explode("-", strtolower($slugMetodo)))));

        return lcfirst($urlController);
    }

    public function carregar() {
        $listarPagina = new \App\adms\Models\AdmsPaginas();
        $this->paginas = $listarPagina->listarPaginas($this->urlController, $this->urlMetodo);

        if ($this->paginas) {
            extract($this->paginas[0]);
            $this->classe = "\\App\\{$tipo_tpg}\\Controllers\\" . $this->urlController;
            if (class_exists($this->classe)) {
                $this->carregarMetodo();
            } else {
                $this->urlController = $this->slugController(CONTROLLER);
                $this->urlMetodo = $this->slugMetodo(METODO);
                $this->carregar();
            }
        } else {
            $this->urlController = $this->slugController('Login');
            $this->urlMetodo = $this->slugMetodo('acessoLogin');
            $this->carregar();
        }
    }

    private function carregarMetodo() {
        $classeCarregar = new $this->classe;
        if (method_exists($classeCarregar, $this->urlMetodo)) {
            if ($this->urlParametro !== null) {
                $classeCarregar->{$this->urlMetodo}($this->urlParametro);
            } else {
                $classeCarregar->{$this->urlMetodo}();
            }
        } else {
            $this->urlController = $this->slugController(CONTROLLER);
            $this->urlMetodo = $this->slugMetodo(METODO);
            $this->carregar();
        }
    }

}
