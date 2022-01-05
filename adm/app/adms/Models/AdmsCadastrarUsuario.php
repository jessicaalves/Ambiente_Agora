<?php

/* @author jessica */

namespace App\adms\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsCadastrarUsuario {

    private $resultado;
    private $dados;
    private $dadosId;
    private $id;
    private $login;
    private $senha;
    private $nome;
    private $email;
    private $cpf;

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

    function getCpf() {
        return $this->cpf;
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

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function visualizarUsuario($dadosId) {
        $this->dadosId = (int) $dadosId;
        $visualizarUsuario = new \App\adms\Models\helper\AdmsRead();
        $visualizarUsuario->fullRead("SELECT user.* FROM adms_usuarios user
                 INNER JOIN adms_niveis_acessos nivac ON nivac.id=user.adms_nivel_acesso_id
                 WHERE user.id =:id AND nivac.ordem >:ordem LIMIT :limit", "id=" . $this->dadosId . "&ordem=" . $_SESSION['ordem_nivac'] . "&limit=1");
        $this->resultado = $visualizarUsuario->getResultado();
        return $this->resultado;
    }

    public function cadastrarUsuario(array $dados) {
        //$this->id = isset($this->dados['id']);
        $this->login = isset($this->dados['login']);
        $this->senha = isset($this->dados['senha']);
        $this->nome = isset($this->dados['nome']);
        $this->email = isset($this->dados['email']);
        $this->cpf = isset($this->dados['cpf']);

        $this->dados = $dados;

        $validarCampos = new \App\adms\Models\helper\AdmsValidarCampoVazio();
        $validarCampos->validarDados($this->dados);

        if ($validarCampos->getResultado()) {
            $this->validarCampos();
        } else {
            $this->resultado = false;
        }
    }

    private function validarCampos() {
        $validarEmail = new \App\adms\Models\helper\AdmsEmail();
        $validarEmail->validarEmail($this->dados['email']);

        $validarEmailUnico = new \App\adms\Models\helper\AdmsEmailUnico();
        $validarEmailUnico->validarEmailUnico($this->dados['email']);

        $validarUsuario = new \App\adms\Models\helper\AdmsValidarUsuario();
        $validarUsuario->validarUsuario($this->dados['login']);

        $validarSenha = new \App\adms\Models\helper\AdmsValidarSenha();
        $validarSenha->validarSenha($this->dados['senha']);

        $validarCpf = new \App\adms\Models\helper\AdmsValidarCpf();
        $validarCpf->validarCpf($this->dados['cpf']);

        if (( $validarSenha->getResultado()) AND ( $validarUsuario->getResultado()) AND ( $validarEmailUnico->getResultado()) AND ( $validarEmail->getResultado()) AND ( $validarCpf->getResultado())) {
            $this->infoCadUser();
            $this->inserirUsuario();
        } else {
            $this->resultado = false;
        }
    }

    private function inserirUsuario() {
        $this->dados['senha'] = password_hash($this->dados['senha'], PASSWORD_DEFAULT); //Criptografando a senha;  
        $this->dados['confirmar_email'] = md5($this->dados['senha'] . date('Y-m-d H:i'));
        $this->dados['adms_nivel_acesso_id'] = $this->infoCadUser[0]['adms_nivel_acesso_id'];
        $this->dados['adms_sit_usuario_id'] = $this->infoCadUser[0]['adms_sit_usuario_id'];
        $this->dados['created'] = date("Y-m-d H:i:s");

        $cadUsuario = new \App\adms\Models\helper\AdmsCreate();
        $cadUsuario->executarCreate("adms_usuarios", $this->dados);

        if ($cadUsuario->getResultado()) {
            if ($this->infoCadUser[0]['env_email_conf'] == 1) {
                $this->dadosEmail();
            } else {
                $_SESSION['msg'] = "<div class='alert alert-success'>Administrador cadastrado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                $this->resultado = true;
                //$this->dados['id'] = $cadUsuario->getResultado();
            }
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao cadastrar administrador!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
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
            $_SESSION['msg'] = "<div class='alert alert-success'>Administrador cadastrado com sucesso! Verifique sua caixa de entrada para confirmar seu e-mail.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-primary'>Administrador cadastrado com sucesso! Erro: Não foi possivel enviar o e-mail para confirmar e-mail!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        }
    }

    public function listarCadastrar() {
        $listar = new \App\adms\Models\helper\AdmsRead();
        $listar->fullRead("SELECT id id_nivac, nome nome_nivac FROM adms_niveis_acessos WHERE ordem >=:ordem ORDER BY nome ASC", "ordem=" . $_SESSION['ordem_nivac']);

        $registro['nivac'] = $listar->getResultado();

        $listar->fullRead("SELECT id id_sit, nome nome_sit FROM adms_sits_usuarios ORDER BY nome ASC");
        $registro['sit'] = $listar->getResultado();

        $this->resultado = ['nivac' => $registro['nivac'], 'sit' => $registro['sit']];

        return $this->resultado;
    }

}
