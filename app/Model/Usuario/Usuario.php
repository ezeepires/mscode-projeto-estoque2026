<?php

namespace App\Model\Usuario;

class Usuario 
{
    private int $id;
    private string $nome;

    public function __construct(int $id, string $nome)
    {
        $this->id = $id;
        $this->nome = $nome;
    }

    public function getId(): int
    {
        return $this->nome;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

}

?>
