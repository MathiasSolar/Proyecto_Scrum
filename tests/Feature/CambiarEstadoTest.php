<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Ayudante;

class CambiarEstadoTest extends TestCase
{
    use RefreshDatabase;

    public function testCambiarEstado()
    {
        // Crear un ayudante de ejemplo en la base de datos
        $ayudante = Ayudante::factory()->create();

        // Llamar a la función cambiarEstado() con el estado 'inactivo'
        $response = $this->get(route('ayudantes.cambiarEstado', ['ayudanteId' => $ayudante->id, 'estado' => 'inactivo']));

        // Verificar que la respuesta sea una redirección a la página anterior
        $response->assertRedirect();

        // Verificar que el estado del ayudante se actualizó correctamente en la base de datos
        $ayudanteActualizado = Ayudante::find($ayudante->id);
        $this->assertEquals('inactivo', $ayudanteActualizado->estado);
    }
}
