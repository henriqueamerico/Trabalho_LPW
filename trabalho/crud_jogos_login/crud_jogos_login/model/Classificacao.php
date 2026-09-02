<?php

class Classificacao {

    //Atributos
    private ?int $id;
    private ?string $codigo; //L, 10, 12, 14, 16, 18

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

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function getCodigoDesc() {
        if($this->codigo == "L")
            return "Livre";
        else if($this->codigo == "10")
            return "10 anos";
        else if($this->codigo == "12")
            return "12 anos";
        else if($this->codigo == "14")
            return "14 anos";
        else if($this->codigo == "16")
            return "16 anos";
        else if($this->codigo == "18")
            return "18 anos";

        return "";
    }

    public function __toString() {
        return $this->getCodigoDesc();
    }

    public function setCodigo(?string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }
}
