<?php

require_once(__DIR__ . "/../dao/ClassificacaoDAO.php");

class ClassificacaoController {

    public function listar() {
        $classificacaoDao = new ClassificacaoDAO();
        return $classificacaoDao->list();
    }

}
