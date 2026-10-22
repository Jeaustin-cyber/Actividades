<?php

namespace App\Models;

class Receta
{
    /** @var RecetaIngrediente[] Rol "ingredientes" (1..*) */
    private array $ingredientes = [];

    public function __construct(
        private string $titulo,
        private int $porciones,
        private string $instrucciones
    ) {
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): void
    {
        $this->titulo = $titulo;
    }

    public function getPorciones(): int
    {
        return $this->porciones;
    }

    public function setPorciones(int $porciones): void
    {
        $this->porciones = $porciones;
    }

    public function getInstrucciones(): string
    {
        return $this->instrucciones;
    }

    public function setInstrucciones(string $instrucciones): void
    {
        $this->instrucciones = $instrucciones;
    }

    /**
     * Agrega un ingrediente a la receta creando el objeto de la clase
     * de asociación con la cantidad y la unidad de medida.
     */
    public function agregarIngrediente(
        Ingrediente $ingrediente,
        float $cantidad,
        string $unidadMedida
    ): RecetaIngrediente {
        $detalle = new RecetaIngrediente($ingrediente, $cantidad, $unidadMedida);
        $this->ingredientes[] = $detalle;

        return $detalle;
    }

    /** @return RecetaIngrediente[] */
    public function getIngredientes(): array
    {
        return $this->ingredientes;
    }

    /** La multiplicidad 1..* exige al menos un ingrediente. */
    public function esValida(): bool
    {
        return count($this->ingredientes) >= 1;
    }
}