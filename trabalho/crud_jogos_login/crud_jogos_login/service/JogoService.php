<?php

require_once(__DIR__ . "/../model/Jogo.php");

class JogoService {

    public function validar(Jogo $jogo) {
        $erros = array();

        if(! $jogo->getNome())
            array_push($erros, "Informe o nome!");

        if(! $jogo->getAno())
            array_push($erros, "Informe o ano de lançamento!");

        if(! $jogo->getMultiplayer())
            array_push($erros, "Informe se o jogo possui multiplayer!");

        if(! $jogo->getGenero()->getId())
            array_push($erros, "Informe o gênero!");

        if(! $jogo->getClassificacao()->getId())
            array_push($erros, "Informe a classificação!");

        return $erros;
    }

}
