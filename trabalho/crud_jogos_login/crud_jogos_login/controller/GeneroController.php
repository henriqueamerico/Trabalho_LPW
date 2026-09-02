<?php

require_once(__DIR__ . "/../dao/GeneroDAO.php");

class GeneroController {

    public function listar() {
        $generoDao = new GeneroDAO();
        return $generoDao->list();
    }

}
