<?php

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Classificacao.php");

class ClassificacaoDAO {

    public function list() {
        $sql = "SELECT * FROM classificacoes";

        $conn = Connection::getConnection();
        $stm = $conn->prepare($sql);
        $stm->execute();
        $dados = $stm->fetchAll();
        return $this->map($dados);
    }

    private function map(array $dados) {
        $classificacoes = array();

        foreach($dados as $d) {
            $classificacao = new Classificacao();
            $classificacao->setId($d['id']);
            $classificacao->setCodigo($d["codigo"]);

            array_push($classificacoes, $classificacao);
        }

        return $classificacoes;
    }

}
