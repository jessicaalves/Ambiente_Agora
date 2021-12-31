<?php

/* @author jessica */

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsDenunciaAnonima extends StsDenuncia {

    private $dados;
    private $resultado;
    private $dadosEmail;
    private $infoEmailAdmin;

    function getResultado() {
        return $this->resultado;
    }

    public function cadastrarDenunciaAnonima(array $dados) {
        $this->id = isset($this->dados['id']);
        $this->titulo = isset($this->dados['titulo']);
        $this->tipo = isset($this->dados['tipo']);
        $this->descricao = isset($this->dados['descricao']);
        $this->tipoPessoa = isset($this->dados['tipoPessoa']);
        $this->nomeSuspeito = isset($this->dados['nomeSuspeito']);
        $this->ocupacaoSuspeito = isset($this->dados['ocupacaoSuspeito']);
        $this->imagem = isset($this->dados['imagem']);

        $this->dados = $dados;

        $this->titulo = ($this->dados['titulo']);
        unset($this->dados['titulo']);

        $this->nomeSuspeito = ($this->dados['nomeSuspeito']);
        unset($this->dados['nomeSuspeito']);

        $this->ocupacaoSuspeito = ($this->dados['ocupacaoSuspeito']);
        unset($this->dados['ocupacaoSuspeito']);

        $this->imagem = $this->dados['imagem'];
        unset($this->dados['imagem']);

        $validarCampoVazio = new \App\sts\Models\helper\StsValidarCampoVazio();
        $validarCampoVazio->validarDados($this->dados);

        if ($validarCampoVazio->getResultado()) {
            $this->inserir();
        } else {
            $this->resultado = false;
        }
    }

    private function inserir() {
        $this->dados['titulo'] = $this->titulo;
        $this->dados['nome_suspeito'] = $this->nomeSuspeito;
        $this->dados['ocupacao_suspeito'] = $this->ocupacaoSuspeito;
        $this->dados['created'] = date('Y-m-d H:i:s');

        $slugImg = new \App\sts\Models\helper\StsSlug();
        $this->dados['imagem'] = $slugImg->nomeSlug($this->imagem['name']);

        $cadDenunciaAnonima = new \App\sts\Models\helper\StsCreate();
        $cadDenunciaAnonima->executarCreate('sts_denuncias_anonimas', $this->dados);
        if ($cadDenunciaAnonima->getResultado()) {
            if (empty($this->imagem['name'])) {
                $_SESSION['msg'] = "<div class='alert alert-success'>Denúncia anônima cadastrada com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                $this->resultado = true;
                $this->dadosEmail();
            } else {
                $this->dados['id'] = $cadDenunciaAnonima->getResultado();
                $this->validarFoto();
                $this->dadosEmail();
            }
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao cadastrar denúncia anônima!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        }
    }

    private function validarFoto() {
        $uploadImg = new \App\sts\Models\helper\StsUploadImagem();
        $uploadImg->uploadImagem($this->imagem, 'assets/img/uploadImagens/denunciaAnonima/' . $this->dados['id'] . '/', $this->dados['imagem']);
        if ($uploadImg->getResultado()) {
            $_SESSION['msg'] = "<div class='alert alert-success'>Denúncia anônima cadastrada com sucesso! Upload da imagem realizado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: A extensão da imagem é inválida. Selecione uma imagem JPEG ou PNG!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        }
    }

    private function infoEmailAdmin() {
        $infoEmailAdmin = new \App\sts\Models\helper\StsRead();
        $infoEmailAdmin->fullRead("SELECT nome, email FROM adms_usuarios WHERE adms_nivel_acesso_id =:adms_nivel_acesso_id", "adms_nivel_acesso_id=1");
        $this->infoEmailAdmin = $infoEmailAdmin->getResultado();
    }

    private function dadosEmail() {
        $this->infoEmailAdmin();
        $nome = explode(" ", $this->infoEmailAdmin[0]['nome']);
        $prim_nome = $nome[0];
        $this->dadosEmail['dest_nome'] = $prim_nome;
        $this->dadosEmail['dest_email'] = $this->infoEmailAdmin[0]['email'];
        $this->dadosEmail['titulo_email'] = "Alerta - Nova Denúncia Anônima";
        $this->dadosEmail['cont_email'] = "Caro(a), " . $prim_nome . ".<br><br>";
        $this->dadosEmail['cont_email'] .= "Uma nova denúncia anônima acaba de ser criada.<br>";
        $this->dadosEmail['cont_email'] .= "Acesse sua conta no Ambiente Agora para conferir as denúncias criadas pelo denunciante.<br>";
        $this->dadosEmail['cont_email'] .= "~Ambiente Agora<br>";

        $this->dadosEmail['cont_text_email'] = "Olá " . $prim_nome . " Uma nova denúncia anônima acaba de ser cadastrada. Acesse sua conta no Ambiente Agora para conferir as denúncias criadas pelo denunciante.<br><br>";
        $this->dadosEmail['cont_text_email'] .= "~Ambiente Agora";

        $emailPHPMailer = new \App\sts\Models\helper\StsPhpMailer();
        $emailPHPMailer->emailPhpMailer($this->dadosEmail);

        if ($emailPHPMailer->getResultado()) {
            $_SESSION['msg'] = "<div class='alert alert-success'>Denúncia anônima cadastrada com sucesso! <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-primary'>Denúncia anônima cadastrada com sucesso! Erro: Não foi possivel enviar o e-mail de nova denúncia cadastrada!</div>";
            $this->resultado = false;
        }
    }

}
