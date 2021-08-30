<?php

/* @author jessica */

namespace App\adms\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsCadastro {

    private $dados;
    private $resultado;
    private $id;
    private $login;
    private $senha;
    private $nome;
    private $email;
    private $apelido;

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

    function getApelido() {
        return $this->apelido;
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

    function setApelido($apelido) {
        $this->apelido = $apelido;
    }

    public function cadastro(array $dados) {
        //$this->id = isset($this->dados['id']);
        $this->login = isset($this->dados['login']);
        $this->senha = isset($this->dados['senha']);
        $this->nome = isset($this->dados['nome']);
        $this->email = isset($this->dados['email']);
        $this->apelido = isset($this->dados['apelido']);

        $this->dados = $dados;
        $this->apelido = ($this->dados['apelido']); //(Remove o campo apelido da validação) Atribui o valor do campo apelido que vem do formulário para o novo atributo $this->telefone
        unset($this->dados['apelido']); //(Remove o campo apelido da validadação) Remove a posição $this->dados['apelido'] que vem do formulário.

        $this->validarDados();
        if ($this->resultado) {
            $validarEmail = new \App\adms\Models\helper\AdmsEmail();
            $validarEmail->validarEmail($this->dados['email']);

            $validarEmailUnico = new \App\adms\Models\helper\AdmsEmailUnico();
            $validarEmailUnico->validarEmailUnico($this->dados['email']);

            $validarUsuario = new \App\adms\Models\helper\AdmsValidarUsuario();
            $validarUsuario->validarUsuario($this->dados['login']);

            $validarSenha = new \App\adms\Models\helper\AdmsValidarSenha();
            $validarSenha->validarSenha($this->dados['senha']);

            if (( $validarSenha->getResultado())AND ( $validarUsuario->getResultado()) AND ( $validarEmailUnico->getResultado()) AND ( $validarEmail->getResultado())) {
                $this->infoCadUser();
                $this->dados['apelido'] = $this->apelido;
                $this->dados['senha'] = password_hash($this->dados['senha'], PASSWORD_DEFAULT); //Criptografando a senha;
                $this->dados['confirmar_email'] = md5($this->dados['senha'] . date('Y-m-d H:i'));
                $this->dados['adms_nivel_acesso_id'] = $this->infoCadUser[0]['adms_nivel_acesso_id'];
                $this->dados['adms_sit_usuario_id'] = $this->infoCadUser[0]['adms_sit_usuario_id'];
                $this->dados['adms_grupo_pag_id'] = 7;
                $this->dados['created'] = date('Y-m-d H:i:s');
                $this->inserir();
            } else {
                $this->resultado = false;
            }
        }
    }

    private function validarDados() {
        $this->dados = array_map('strip_tags', $this->dados);
        $this->dados = array_map('trim', $this->dados);

        if (in_array('', $this->dados)) {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Necessário preencher todos os campos!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        } else {
            $this->resultado = true;
        }
    }

    private function inserir() {
        $cadUser = new \App\adms\Models\helper\AdmsCreate();
        $cadUser->executarCreate('adms_usuarios', $this->dados);
        if ($cadUser->getResultado()) {
            if ($this->infoCadUser[0]['env_email_conf'] == 1) {
                $this->dadosEmail();
            } else {
                $_SESSION['msg'] = "<div class='alert alert-success'>Usuário cadastrado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                $this->resultado = true;
            }
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao cadastrar usuário!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        }
    }

    private function infoCadUser() {
        $infoCadUser = new \App\adms\Models\helper\AdmsRead();
        $infoCadUser->fullRead("SELECT env_email_conf, adms_nivel_acesso_id, adms_sit_usuario_id
                FROM adms_cads_usuarios WHERE id =:id LIMIT :limit", "id=1&limit=1");
        $this->infoCadUser = $infoCadUser->getResultado();
    }

    private function dadosEmail() {
        $nome = explode(" ", $this->dados['nome']);
        $prim_nome = $nome[0];
        $this->dadosEmail['dest_nome'] = $prim_nome;
        $this->dadosEmail['dest_email'] = $this->dados['email'];
        $this->dadosEmail['titulo_email'] = "Confirmar e-mail";
        $this->dadosEmail['cont_email'] = "Caro(a), " . $prim_nome . "<br><br>";
        $this->dadosEmail['cont_email'] .= "Obrigada por se cadastrar conosco.<br>";
        $this->dadosEmail['cont_email'] .= "Seguindo o link abaixo você poderá ativar seu perfil.<br>";
        $this->dadosEmail['cont_email'] .= "Para continuar o processo de confirmação de e-mail, clique no link abaixo ou cole o endereço abaixo no seu navegador.<br><br>";
        $this->dadosEmail['cont_email'] .= "<a href='" . URLADM . "confirmar-email/confirmarEmail?chave=" . $this->dados['confirmar_email'] . "'>Clique aqui</a><br><br>";
        $this->dadosEmail['cont_email'] .= "Obrigada!<br>";

        $this->dadosEmail['cont_text_email'] = "Olá " . $prim_nome . " Obrigada por se cadastrar conosco. Seguindo o link abaixo você poderá ativar seu perfil. Para continuar o processo de confirmação de e-mail, clique no link abaixo ou cole o endereço abaixo no seu navegador. " . URLADM . "confirmar-email/confirmarEmail?chave=" . $this->dados['confirmar_email'] . "'>Clique aqui</a><br><br>";
        $this->dadosEmail['cont_text_email'] .= "Obrigada!";

        $emailPHPMailer = new \App\adms\Models\helper\AdmsPhpMailer();
        $emailPHPMailer->emailPhpMailer($this->dadosEmail);

        if ($emailPHPMailer->getResultado()) {
            $_SESSION['msg'] = "<div class='alert alert-success'>Usuário cadastrado com sucesso! Verifique sua caixa de entrada para confirmar seu e-mail.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-primary'>Usuário cadastrado com sucesso! Erro: Não foi possivel enviar o e-mail para confirmar e-mail!</div>";
            $this->resultado = false;
        }
    }

}
