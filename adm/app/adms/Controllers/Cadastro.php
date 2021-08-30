<?php

/* @author jessica */

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class Cadastro {

    private $dados;

    public function index() {
        $cadastrarUsuario = new Cadastro();
        $cadastrarUsuario->cadastrarUsuario();
    }

    public function cadastrarUsuario() {
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->dados['cadastrarUsuario'])) {
            unset($this->dados['cadastrarUsuario']);

            $novoCadastro = new \App\adms\Models\AdmsCadastro();
            $novoCadastro->cadastro($this->dados);

            //$novoCadastro->setId($this->dados['id']);
            $novoCadastro->setLogin($this->dados['login']);
            $novoCadastro->setSenha($this->dados['senha']);
            $novoCadastro->setNome($this->dados['nome']);
            $novoCadastro->setEmail($this->dados['email']);
            $novoCadastro->setApelido($this->dados['apelido']);

            //$novoCadastro->setCreated($this->dados['created']);
            //$novoCadastro->setModified($this->dados['modified']);

            if ($novoCadastro->getResultado()) {
                $urlDestino = URLADM . 'cadastro/cadastrar-usuario';
                header("Location: $urlDestino");
            } else {
                $this->dados['form'] = $this->dados;
                $carregarView = new \Core\ConfigView("adms/Views/cadastro/cadastro", $this->dados);
                $carregarView->renderizarCadastro();
            }
        } else {
            $carregarView = new \Core\ConfigView("adms/Views/cadastro/cadastro", $this->dados);
            $carregarView->renderizarCadastro();
        }
    }

}
