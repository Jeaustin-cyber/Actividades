<?php

namespace App\Models;

/**
 * Clase de asociación entre Receta e Ingrediente.
 * Guarda los datos que pertenecen a la relación: cantidad y unidad de medida.
 */
class RecetaIngrediente
{
    public function __construct(
        private Ingrediente $ingrediente,
        private float $cantidad,
        private string $unidadMedida
    ) {
    }

    public function getIngrediente(): Ingrediente
    {
        return $this->ingrediente;
    }

    public function getCantidad(): float
    {
        return $this->cantidad;
    }

    public function setCantidad(float $cantidad): void
    {
        $this->cantidad = $cantidad;
    }

    public function getUnidadMedida(): string
    {
        return $this->unidadMedida;
    }

    public function setUnidadMedida(string $unidadMedida): void
    {
        $this->unidadMedida = $unidadMedida;
    }
}