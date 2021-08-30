<?php

/* @author jessica */

namespace App\sts\Models\helper;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsUpdate extends StsConn {

    private $tabela;
    private $dados;
    private $query;
    private $conn;
    private $resultado;
    private $termos;
    private $values;

    function getResultado() {
        return $this->resultado;
    }

    public function exeUpdate($tabela, array $dados, $termos = null, $ParseString = null) {
        $this->tabela = (string) $tabela;
        $this->dados = $dados;
        $this->termos = (string) $termos;

        parse_str($ParseString, $this->values);
        $this->getInstrucao();
        $this->executarInstrucao();
    }

    private function getInstrucao() {
        foreach ($this->dados as $key => $value) {
            $values[] = $key . '= :' . $key;
        }
        $values = implode(', ', $values);
        $this->query = "UPDATE {$this->tabela} SET {$values} {$this->termos}";
    }

    private function executarInstrucao() {
        $this->conexao();
        try {
            $this->query->execute(array_merge($this->dados, $this->values));
            $this->resultado = true;
        } catch (Exception $ex) {
            $this->resultado = null;
        }
    }

    private function conexao() {
        $this->conn = parent::getConn();
        $this->query = $this->conn->prepare($this->query);
    }

}
