<?php

require_once(__DIR__ . "/Genero.php");
require_once(__DIR__ . "/Classificacao.php");

class Jogo {

    //Atributos
    private ?int $id;
    private ?string $nome;
    private ?int $ano;
    private ?string $multiplayer;
    private ?Genero $genero;
    private ?Classificacao $classificacao;

    //GETs e SETs
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getAno(): ?int
    {
        return $this->ano;
    }

    public function setAno(?int $ano): self
    {
        $this->ano = $ano;

        return $this;
    }

    public function getMultiplayer(): ?string
    {
        return $this->multiplayer;
    }

    public function getMultiplayerDesc(): ?string
    {
        if($this->multiplayer == 'S')
            return "Sim";
        else if($this->multiplayer == 'N')
            return "Não";

        return "";
    }

    public function setMultiplayer(?string $multiplayer): self
    {
        $this->multiplayer = $multiplayer;

        return $this;
    }

    public function getGenero(): ?Genero
    {
        return $this->genero;
    }

    public function setGenero(?Genero $genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    public function getClassificacao(): ?Classificacao
    {
        return $this->classificacao;
    }

    public function setClassificacao(?Classificacao $classificacao): self
    {
        $this->classificacao = $classificacao;

        return $this;
    }
}
