<?php

/* @author jessica */

namespace App\Sts\Controllers;

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

    public function cadastrarUsuario() {

        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        //var_dump($this->dados);
        if (!empty($this->dados['cadastrarUsuario'])) {
            unset($this->dados['cadastrarUsuario']);

            $novoCadastro = new \Sts\Models\StsCadastro();
            $novoCadastro->cadastro($this->dados);
            //$novoCadastro->setId($this->dados['id']);
            $novoCadastro->setLogin($this->dados['login']);
            $novoCadastro->setSenha($this->dados['senha']);
            $novoCadastro->setNome($this->dados['nome']);
            $novoCadastro->setEmail($this->dados['email']);
            
            $novoCadastro->setTelefone($this->dados['telefone']);
            
            $novoCadastro->setLogradouro($this->dados['logradouro']);
            $novoCadastro->setBairro($this->dados['bairro']);
   
            //$novoCadastro->setCreated($this->dados['created']);
            //$novoCadastro->setModified($this->dados['modified']);
            

            if ($novoCadastro->getResultado()) {
                $urlDestino = URL . 'user/cadastro/cadastrar-usuario';
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
