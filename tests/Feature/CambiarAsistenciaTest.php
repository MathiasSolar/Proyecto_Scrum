<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Reserva;

class CambiarAsistenciaTest extends TestCase
{
    use RefreshDatabase;

    public function testCambiarAsistencia()
    {
        // Crear una reserva de ejemplo en la base de datos
        $reserva = Reserva::factory()->create();

        // Llamar a la función cambiarAsistencia() con el estado 'presente'
        $response = $this->get(route('horarios.cambiarAsistencia', ['reservaId' => $reserva->id, 'estado' => 'presente']));

        // Verificar que la respuesta sea una redirección a la página anterior
        $response->assertRedirect();

        // Verificar que la reserva se actualizó correctamente en la base de datos
        $reservaActualizada = Reserva::find($reserva->id);
        $this->assertEquals('presente', $reservaActualizada->asistencia);
    }
}
