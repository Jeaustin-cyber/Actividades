<?php

namespace Tests\Unit;

use App\Models\Ingrediente;
use App\Models\Receta;
use App\Models\RecetaIngrediente;
use PHPUnit\Framework\TestCase;

class RecetaTest extends TestCase
{
    public function test_instancia_una_receta_con_sus_ingredientes(): void
    {
        $receta = new Receta(
            'Panqueques',
            4,
            'Mezclar los ingredientes y cocinar en sartén caliente.'
        );

        $harina = new Ingrediente('Harina');
        $leche = new Ingrediente('Leche');
        $huevo = new Ingrediente('Huevo');

        $receta->agregarIngrediente($harina, 200, 'g');
        $receta->agregarIngrediente($leche, 300, 'ml');
        $receta->agregarIngrediente($huevo, 2, 'unidad');

        $this->assertSame('Panqueques', $receta->getTitulo());
        $this->assertSame(4, $receta->getPorciones());
        $this->assertCount(3, $receta->getIngredientes());
        $this->assertTrue($receta->esValida());
    }

    public function test_la_clase_de_asociacion_guarda_cantidad_y_unidad(): void
    {
        $receta = new Receta('Arroz blanco', 2, 'Hervir el arroz con agua y sal.');
        $detalle = $receta->agregarIngrediente(new Ingrediente('Arroz'), 1.5, 'taza');

        $this->assertInstanceOf(RecetaIngrediente::class, $detalle);
        $this->assertSame('Arroz', $detalle->getIngrediente()->getNombre());
        $this->assertSame(1.5, $detalle->getCantidad());
        $this->assertSame('taza', $detalle->getUnidadMedida());
    }

    public function test_una_receta_sin_ingredientes_no_es_valida(): void
    {
        $receta = new Receta('Vacía', 1, 'Sin pasos.');

        $this->assertFalse($receta->esValida());
    }
}
