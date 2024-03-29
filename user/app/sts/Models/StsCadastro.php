<?php

/* @author jessica */

namespace App\sts\Models;

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
    private $cpf;
    private $logradouro;
    private $bairro;
    private $dadosEmail;

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

    function getCpf() {
        return $this->cpf;
    }

    function getEmail() {
        return $this->email;
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

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setEmail($email) {
        $this->email = $email;
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
        $this->cpf = isset($this->dados['cpf']);
        $this->logradouro = isset($this->dados['logradouro']);
        $this->bairro = isset($this->dados['bairro']);
        $this->dados = $dados;

        $this->validarDados();

        if ($this->resultado) {
            $validarEmail = new \App\sts\Models\helper\StsEmail();
            $validarEmail->validarEmail($this->dados['email']);

            $validarEmailUnico = new \App\sts\Models\helper\StsEmailUnico();
            $validarEmailUnico->validarEmailUnico($this->dados['email']);

            $validarUsuario = new \App\sts\Models\helper\StsValidarUsuario();
            $validarUsuario->validarUsuario($this->dados['login']);

            $validarSenha = new \App\sts\Models\helper\StsValidarSenha();
            $validarSenha->validarSenha($this->dados['senha']);

            $validarCpf = new \App\sts\Models\helper\StsValidarCpf();
            $validarCpf->validarCpf($this->dados['cpf']);

            $cpfValido = new \App\sts\Models\helper\StsVerificarCpfValido();
            $cpfValido->verificarCpfValido($this->dados['cpf']);

            if (( $validarSenha->getResultado())AND ( $validarUsuario->getResultado()) AND ( $validarEmailUnico->getResultado()) AND ( $validarEmail->getResultado()) AND ( $validarCpf->getResultado()) AND ( $cpfValido->getResultado())) {
                $this->infoCadUser();
                $this->dados['senha'] = password_hash($this->dados['senha'], PASSWORD_DEFAULT); //Criptografando a senha;
                $this->dados['confirmar_email'] = md5($this->dados['senha'] . date('Y-m-d H:i'));
                $this->dados['sts_perm_ace_id'] = $this->infoCadUser[0]['sts_perm_ace_id'];
                $this->dados['sts_sit_usuario_id'] = $this->infoCadUser[0]['sts_sit_usuario_id'];
                $this->dados['sts_grup_pag_id'] = 6;
                $this->dados['created'] = date('Y-m-d H:i:s');
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
            $validarEmail = new \App\sts\Models\helper\StsEmail();
            $validarEmail->validarEmail($this->dados['email']);
            if ($validarEmail->getResultado()) {
                $this->resultado = true;
            } else {
                $this->resultado = false;
            }
        }
    }

    private function inserir() {
        $cadUser = new \App\sts\Models\helper\StsCreate();
        $cadUser->executarCreate('sts_usuarios', $this->dados);
        if ($cadUser->getResultado()) {
            if ($this->infoCadUser[0]['env_email_conf'] == 1) {
                $this->dadosEmail();
            } else {
                $_SESSION['msg'] = "<div class='alert alert-success'>Denunciante cadastrado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                $this->resultado = true;
            }
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao cadastrar denunciante!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        }
    }

    private function infoCadUser() {
        $infoCadUser = new \App\sts\Models\helper\StsRead();
        $infoCadUser->fullRead("SELECT env_email_conf, sts_perm_ace_id, sts_sit_usuario_id
                FROM sts_cads_usuarios WHERE id =:id LIMIT :limit", "id=1&limit=1");
        $this->infoCadUser = $infoCadUser->getResultado();
    }

    private function dadosEmail() {
        $nome = explode(" ", $this->dados['nome']);
        $prim_nome = $nome[0];
        $this->dadosEmail['dest_nome'] = $prim_nome;
        $this->dadosEmail['dest_email'] = $this->dados['email'];
        $this->dadosEmail['titulo_email'] = "Confirmar e-mail";
        $this->dadosEmail['cont_email'] = "Caro(a), " . $prim_nome . ".<br><br>";
        $this->dadosEmail['cont_email'] .= "Obrigada por se cadastrar conosco.<br>";
        $this->dadosEmail['cont_email'] .= "Seguindo o link abaixo você poderá ativar seu perfil.<br>";
        $this->dadosEmail['cont_email'] .= "Para continuar o processo de confirmação de e-mail, clique no link abaixo ou cole o endereço abaixo no seu navegador.<br><br>";
        $this->dadosEmail['cont_email'] .= "<a href='" . URL . "user/confirmarEmail/confirmar-email?chave=" . $this->dados['confirmar_email'] . "'>Clique aqui</a><br><br>";
        $this->dadosEmail['cont_email'] .= "Obrigada!<br>";

        $this->dadosEmail['cont_text_email'] = "Olá " . $prim_nome . " Obrigada por se cadastrar conosco. Seguindo o link abaixo você poderá ativar seu perfil. Para continuar o processo de confirmação de e-mail, clique no link abaixo ou cole o endereço abaixo no seu navegador. " . URL . "user/confirmarEmail/confirmar-email?chave=" . $this->dados['confirmar_email'] . "'>Clique aqui</a><br><br>";
        $this->dadosEmail['cont_text_email'] .= "Obrigada!";

        $emailPHPMailer = new \App\sts\Models\helper\StsPhpMailer();
        $emailPHPMailer->emailPhpMailer($this->dadosEmail);

        if ($emailPHPMailer->getResultado()) {
            $_SESSION['msg'] = "<div class='alert alert-success'>Denunciante cadastrado com sucesso! Verifique sua caixa de entrada para confirmar seu e-mail.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-primary'>Denunciante cadastrado com sucesso! Erro: Não foi possivel enviar o e-mail para confirmar e-mail!</div>";
            $this->resultado = false;
        }
    }

}
