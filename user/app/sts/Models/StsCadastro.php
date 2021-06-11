<?php

/* @author jessica */

namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsCadastro {

    private $dados;
    private $resultado;
    private $id;
    private $login;
    private $senha;
    private $nome;
    private $email;
    private $telefone;
    private $logradouro;
    private $bairro;

    function getResultado() {
        return $this->resultado;
    }

    function getId() {
        return $this->id;
    }

    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getLogradouro() {
        return $this->logradouro;
    }

    function getBairro() {
        return $this->bairro;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function cadastro(array $dados) {
        //$this->id = isset($this->dados['id']);
        $this->login = isset($this->dados['login']);
        $this->senha = isset($this->dados['senha']);
        $this->nome = isset($this->dados['nome']);
        $this->email = isset($this->dados['email']);
        $this->logradouro = isset($this->dados['logradouro']);
        $this->bairro = isset($this->dados['bairro']);

        $this->dados = $dados;
        $this->telefone = ($this->dados['telefone']); //(Remove o campo telefone da validação) Atribui o valor do campo telefone que vem do formulário para o novo atributo $this->telefone
        unset($this->dados['telefone']); //(Remove o campo telefone da valiadação) Remove a posição $this->dados['telefone'] que vem do formulário.

        $this->validarDados();
        if ($this->resultado) {
            $validarEmail = new \Sts\Models\helper\StsEmail();
            $validarEmail->validarEmail($this->dados['email']);

            $validarEmailUnico = new \Sts\Models\helper\StsEmailUnico();
            $validarEmailUnico->validarEmailUnico($this->dados['email']);

            $validarUsuario = new \Sts\Models\helper\StsValidarUsuario();
            $validarUsuario->validarUsuario($this->dados['login']);

            $validarSenha = new \Sts\Models\helper\StsValidarSenha();
            $validarSenha->validarSenha($this->dados['senha']);




            if (( $validarSenha->getResultado())AND ( $validarUsuario->getResultado()) AND ( $validarEmailUnico->getResultado()) AND ( $validarEmail->getResultado())) {
                $this->inserir();
            } else {
                $this->resultado = false;
            }
        }
    }

    private function validarDados() {
        $this->dados = array_map('strip_tags', $this->dados); //Remove as tags;
        $this->dados = array_map('trim', $this->dados); //Remove os espaços em branco;
        //var_dump($this->dados);

        if (in_array('', $this->dados)) {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Necessário preencher os campos obrigatórios!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        } else {
            $validarEmail = new \Sts\Models\helper\StsEmail();
            $validarEmail->validarEmail($this->dados['email']);
            if ($validarEmail->getResultado()) {
                $this->resultado = true;
            } else {
                $this->resultado = false;
            }
        }
    }

    private function inserir() {
        $this->dados['telefone'] = $this->telefone;
        $this->dados['senha'] = password_hash($this->dados['senha'], PASSWORD_DEFAULT); //Criptografando a senha;
        $this->dados['confirmar_email'] = 2;
        $this->dados['id_permissao_acesso'] = 1;
        $this->dados['id_situacao'] = 2;
        $this->dados['created'] = date('Y-m-d H:i:s');
        $this->dados['modified'] = date('Y-m-d H:i:s');
        $cadUser = new \Sts\Models\helper\StsCreate();
        $cadUser->executarCreate('usuario', $this->dados);
        if ($cadUser->getResultado()) {
            $_SESSION['msg'] = "<div class='alert alert-success'>Usuário cadastrado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao cadastrar usuário!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        }
    }

}
