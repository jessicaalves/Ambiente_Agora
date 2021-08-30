<?php

/* @author jessica */

namespace App\adms\Models\helper;

use PDO;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsRead extends AdmsConn {

    private $select;
    private $values;
    private $resultado;
    private $query;
    private $conn;

    function getResultado() {
        return $this->resultado;
    }

    public function executarRead($tabela, $termos = null, $parseString = null) {

        if (!empty($parseString)) {
            parse_str($parseString, $this->values);
        }
        $this->select = "SELECT * FROM {$tabela} {$termos}";
        $this->executarInstrucao();
    }

    public function fullRead($query, $parseString = null) {
        $this->select = (string) $query;
        if (!empty($parseString)) {
            parse_str($parseString, $this->values);
        }
        $this->executarInstrucao();
    }

    private function executarInstrucao() {
        $this->conexao();
        try {
            $this->getInstrucao();
            $this->query->execute();
            $this->resultado = $this->query->fetchAll();
        } catch (Exception $ex) {
            $this->resultado = null;
        }
    }

    private function conexao() {
        $this->conn = parent::getConn();
        $this->query = $this->conn->prepare($this->select);
        $this->query->setFetchMode(PDO::FETCH_ASSOC);
    }

    private function getInstrucao() {
        if ($this->values) {
            foreach ($this->values as $link => $valor) {
                if ($link == 'limit' || $link == 'offset') {
                    $valor = (int) $valor;
                }
                $this->query->bindValue(":{$link}", $valor, (is_int($valor) ? PDO::PARAM_INT : PDO::PARAM_STR));
            }
        }
    }

}
