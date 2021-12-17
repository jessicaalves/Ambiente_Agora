<?php

/* @author jessica */

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class Cadastro {

    private $dados;

    public function index() {
        $cadastroUsuario = new Cadastro();
        $cadastroUsuario->cadastrarUsuario();
    }

    public function cadastrarDenunciante() {

        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        //var_dump($this->dados);
        if (!empty($this->dados['cadastrarUsuario'])) {
            unset($this->dados['cadastrarUsuario']);

            $novoCadastro = new \App\sts\Models\StsCadastro();
            $novoCadastro->cadastro($this->dados);
            //$novoCadastro->setId($this->dados['id']);
            $novoCadastro->setLogin($this->dados['login']);
            $novoCadastro->setSenha($this->dados['senha']);
            $novoCadastro->setNome($this->dados['nome']);
            $novoCadastro->setEmail($this->dados['email']);
            
            $novoCadastro->setApelido($this->dados['apelido']);
            
            $novoCadastro->setLogradouro($this->dados['logradouro']);
            $novoCadastro->setBairro($this->dados['bairro']);
   
            //$novoCadastro->setCreated($this->dados['created']);
            //$novoCadastro->setModified($this->dados['modified']);
            

            if ($novoCadastro->getResultado()) {
                $urlDestino = URL . 'user/cadastro/cadastrar-denunciante';
                header("Location: $urlDestino");
            } else {
                $this->dados['form'] = $this->dados;
                $carregarView = new \Core\ConfigView("sts/Views/cadastro/cadastro", $this->dados);
                $carregarView->renderizarCadastro();
            }
        } else {
            $carregarView = new \Core\ConfigView("sts/Views/cadastro/cadastro", $this->dados);
            $carregarView->renderizarCadastro();
        }
    }

}
