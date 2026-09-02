<?php

require_once(__DIR__ . "/../dao/JogoDAO.php");
require_once(__DIR__ . "/../service/JogoService.php");

class JogoController {

    private JogoDAO $jogoDAO;
    private JogoService $jogoService;

    public function __construct() {
        $this->jogoDAO = new JogoDAO();
        $this->jogoService = new JogoService();
    }

    public function listar() {
        return $this->jogoDAO->list();
    }

    public function buscarPorId(int $id) {
        return $this->jogoDAO->findById($id);
    }

    public function inserir($jogo) {
        //Validar os dados
        $erros = $this->jogoService->validar($jogo);

        //Persistir os dados
        if(empty($erros)) {
            $erroDAO = $this->jogoDAO->insert($jogo);
            if($erroDAO)
               array_push($erros, $erroDAO);
        }

        return $erros;
    }

    public function alterar($jogo) {
        //Validar os dados
        $erros = $this->jogoService->validar($jogo);

        //Persistir os dados
        if(empty($erros)) {
            $erroDAO = $this->jogoDAO->update($jogo);
            if($erroDAO)
               array_push($erros, $erroDAO);
        }

        return $erros;
    }

    public function excluir(int $id) {
        return $this->jogoDAO->excluir($id);
    }

}
