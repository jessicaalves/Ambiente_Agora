<?php

/* @author jessica */

namespace App\adms\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsAlterarUsuario {

    private $resultado;
    private $dados;
    private $dadosId;

    function getResultado() {
        return $this->resultado;
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

    public function alterarUsuario(array $dados) {
        $this->dados = $dados;
        $this->apelido = $this->dados['apelido'];
        unset($this->dados['apelido']);

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
        $editarUnico = true;
        $validarEmailUnico->validarEmailUnico($this->dados['email'], $editarUnico, $this->dados['id']);

        $validarUsuario = new \App\adms\Models\helper\AdmsValidarUsuario();
        $validarUsuario->validarUsuario($this->dados['login'], $editarUnico, $this->dados['id']);

        $validarSenha = new \App\adms\Models\helper\AdmsValidarSenha();
        $validarSenha->validarSenha($this->dados['senha']);

        if (( $validarUsuario->getResultado()) AND ( $validarEmailUnico->getResultado()) AND ( $validarEmail->getResultado()) AND ( $validarSenha->getResultado())) {
            $this->updateAlterarUsuario();
        } else {
            $this->resultado = false;
        }
    }

    private function updateAlterarUsuario() {
        $this->dados['senha'] = password_hash($this->dados['senha'], PASSWORD_DEFAULT); //Criptografando a senha;
        $this->dados['apelido'] = $this->apelido;
        $this->dados['modified'] = date("Y-m-d H:i:s");
        $upAltSenha = new \App\adms\Models\helper\AdmsUpdate();
        $upAltSenha->exeUpdate("adms_usuarios", $this->dados, "WHERE id =:id", "id=" . $this->dados['id']);
        if ($upAltSenha->getResultado()) {
            $_SESSION['msg'] = "<div class='alert alert-success'>Usuário alterado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao alterar usuário!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
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
