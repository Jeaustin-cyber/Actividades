<?php

namespace App\Models;

class Ingrediente
{
    public function __construct(
        private string $nombre
    ) {
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }
}