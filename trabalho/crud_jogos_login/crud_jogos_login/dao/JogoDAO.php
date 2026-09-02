<?php

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Jogo.php");

class JogoDAO {

    public function list() {
        $sql = "SELECT j.*, g.nome nome_genero,
                       c.codigo codigo_classificacao
                FROM jogos j
                JOIN generos g ON (g.id = j.id_genero)
                JOIN classificacoes c ON (c.id = j.id_classificacao)";

        $conn = Connection::getConnection();
        $stm = $conn->prepare($sql);
        $stm->execute();

        $dados = $stm->fetchAll();
        return $this->map($dados);
    }

    public function findById(int $id): ?Jogo  {
        $sql = "SELECT j.*, g.nome nome_genero,
                       c.codigo codigo_classificacao
                FROM jogos j
                JOIN generos g ON (g.id = j.id_genero)
                JOIN classificacoes c ON (c.id = j.id_classificacao)
                WHERE j.id = ?";

        $conn = Connection::getConnection();
        $stm = $conn->prepare($sql);
        $stm->execute([$id]);

        $dados = $stm->fetchAll();
        $jogos = $this->map($dados);

        if(! empty($jogos))
            return $jogos[0];
        else
            return NULL;
    }

    public function insert(Jogo $jogo) {
        try {
            $sql = "INSERT INTO jogos (nome, ano, multiplayer, id_genero, id_classificacao)
                    VALUES (:nome, :ano, :multi, :id_genero, :id_classificacao)";

            $conn = Connection::getConnection();
            $stm = $conn->prepare($sql);
            $stm->bindValue("nome", $jogo->getNome());
            $stm->bindValue("ano", $jogo->getAno());
            $stm->bindValue("multi", $jogo->getMultiplayer());
            $stm->bindValue("id_genero", $jogo->getGenero()->getId());
            $stm->bindValue("id_classificacao", $jogo->getClassificacao()->getId());
            $stm->execute();
            return "";
        } catch(PDOException $e) {
            $erro = "Erro ao salvar o jogo. Tente novamente.";
            if(AMB_DEV)
                $erro .= "<br>" . $e->getMessage();
            return $erro;
        }
    }

    public function update(Jogo $jogo) {
        try {
            $sql = "UPDATE jogos
                    SET nome = :nome, ano = :ano,
                    multiplayer = :multi, id_genero = :id_genero,
                    id_classificacao = :id_classificacao
                    WHERE id = :id";

            $conn = Connection::getConnection();
            $stm = $conn->prepare($sql);
            $stm->bindValue("nome", $jogo->getNome());
            $stm->bindValue("ano", $jogo->getAno());
            $stm->bindValue("multi", $jogo->getMultiplayer());
            $stm->bindValue("id_genero", $jogo->getGenero()->getId());
            $stm->bindValue("id_classificacao", $jogo->getClassificacao()->getId());
            $stm->bindValue("id", $jogo->getId());

            $stm->execute();
            return "";
        } catch(PDOException $e) {
            $erro = "Erro ao salvar o jogo. Tente novamente.";
            if(AMB_DEV)
                $erro .= "<br>" . $e->getMessage();
            return $erro;
        }
    }

    public function excluir(int $id) {
        try {
            $sql = "DELETE FROM jogos WHERE id = ?";

            $conn = Connection::getConnection();
            $stm = $conn->prepare($sql);
            $stm->execute([$id]);
            return "";

        } catch(PDOException $e) {
            $erro = "Erro ao excluir o jogo. Tente novamente.";
            if(AMB_DEV)
                $erro .= "<br>" . $e->getMessage();
            return $erro;
        }
    }

    private function map(array $dados) {
        $jogos = array();
        foreach($dados as $d) {
            $jogo = new Jogo();
            $jogo->setId($d['id']);
            $jogo->setNome($d["nome"]);
            $jogo->setAno($d["ano"]);
            $jogo->setMultiplayer($d["multiplayer"]);

            $genero = new Genero();
            $genero->setId($d["id_genero"]);
            $genero->setNome($d["nome_genero"]);
            $jogo->setGenero($genero);

            $classificacao = new Classificacao();
            $classificacao->setId($d["id_classificacao"]);
            $classificacao->setCodigo($d["codigo_classificacao"]);
            $jogo->setClassificacao($classificacao);

            array_push($jogos, $jogo);
        }
        return $jogos;
    }

}
