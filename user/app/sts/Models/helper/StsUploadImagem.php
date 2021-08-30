<?php

/* @author jessica */

namespace App\sts\Models\helper;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsUploadImagem {

    private $dadosImagem;
    private $diretorio;
    private $nomeImg;
    private $resultado;
    private $imagem;

    function getResultado() {
        return $this->resultado;
    }

    public function uploadImagem(array $imagem, $diretorio, $nomeImg) {
        $this->dadosImagem = $imagem;
        $this->diretorio = $diretorio;
        $this->nomeImg = $nomeImg;
        $this->validarImagem();
    }

    private function validarImagem() {
        switch ($this->dadosImagem['type']):
            case 'image/jpeg';
            case 'image/pjpeg';
                $this->imagem = imagecreatefromjpeg($this->dadosImagem['tmp_name']);
                break;
            case 'image/png':
            case 'image/x-png';
                $this->imagem = imagecreatefrompng($this->dadosImagem['tmp_name']);
                break;
        endswitch;
        if ($this->imagem) {
            $this->validarDiretorio();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: A extensão da imagem é inválida. Selecione uma imagem JPEG ou PNG!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        }
    }

    private function validarDiretorio() {
        if (!file_exists($this->diretorio) && !is_dir($this->diretorio)) {
            mkdir($this->diretorio, 0755);
        }
        $this->realizarUpload();
    }

    private function realizarUpload() {
        if (move_uploaded_file($this->dadosImagem['tmp_name'], $this->diretorio . $this->nomeImg)) {
            $this->resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: não foi possivel fazer o upload da imagem!</div>";
            $this->resultado = false;
        }
    }

}
