<?php

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Genero.php");

class GeneroDAO {

    public function list() {
        $sql = "SELECT * FROM generos";

        $conn = Connection::getConnection();
        $stm = $conn->prepare($sql);
        $stm->execute();
        $dados = $stm->fetchAll();
        return $this->map($dados);
    }

    private function map(array $dados) {
        $generos = array();

        foreach($dados as $d) {
            $genero = new Genero();
            $genero->setId($d['id']);
            $genero->setNome($d["nome"]);

            array_push($generos, $genero);
        }

        return $generos;
    }

}
