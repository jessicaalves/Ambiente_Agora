<?php

/* @author jessica */

namespace App\adms\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsApagarNivelAcesso {

    private $dadosId;
    private $resultado;
    private $dados;
    private $dadosNivAvInferior;

    function getResultado() {
        return $this->resultado;
    }

    public function apagarNivelAcesso($dadosId = null) {
        $this->dadosId = (int) $dadosId;
        $this->verfUsuarioCad();
        if ($this->resultado) {
            $this->verfNivAcInferior();
            $apagarNivAc = new \App\adms\Models\helper\AdmsDelete();
            $apagarNivAc->exeDelete("adms_niveis_acessos", "WHERE id =:id", "id={$this->dadosId}");
            if ($apagarNivAc->getResultado()) {
                $this->atualizarOrdem();
                $_SESSION['msg'] = "<div class='alert alert-success'>Nível de acesso apagado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                $this->resultado = true;
            } else {
                $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Erro ao apagar nível de acesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                $this->resultado = false;
            }
        }
    }

    private function verfUsuarioCad() {
        $verUsuario = new \App\adms\Models\helper\AdmsRead();
        $verUsuario->fullRead("SELECT id FROM adms_usuarios
                WHERE adms_nivel_acesso_id =:adms_nivel_acesso_id LIMIT :limit", "adms_nivel_acesso_id=" . $this->dadosId . "&limit=2");
        if ($verUsuario->getResultado()) {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: O nível de acesso não pode ser apagado, há usuários cadastrados neste nível!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $this->resultado = false;
        } else {
            $this->resultado = true;
        }
    }

    private function verfNivAcInferior() {
        $verNivAc = new \App\adms\Models\helper\AdmsRead();
        $verNivAc->fullRead("SELECT id, ordem AS ordem_result FROM adms_niveis_acessos WHERE ordem > (SELECT ordem FROM adms_niveis_acessos WHERE id =:id) ORDER BY ordem ASC", "id={$this->dadosId}");
        $this->dadosNivAvInferior = $verNivAc->getResultado();
    }

    private function atualizarOrdem() {
        if ($this->dadosNivAvInferior) {
            foreach ($this->dadosNivAvInferior as $atualOrdem) {
                extract($atualOrdem);
                $this->dados['ordem'] = $ordem_result - 1;
                $this->dados['modified'] = date("Y-m-d H:i:s");
                $upAltNivAc = new \App\adms\Models\helper\AdmsUpdate();
                $upAltNivAc->exeUpdate("adms_niveis_acessos", $this->dados, "WHERE id =:id", "id=" . $id);
            }
        }
    }

}
