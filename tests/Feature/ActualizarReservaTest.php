<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Reserva;

class ActualizarReservaTest extends TestCase
{
    use RefreshDatabase;

    public function testActualizarReserva()
    {
        // Crear una reserva de ejemplo en la base de datos
        $reserva = Reserva::factory()->create();

        // Datos actualizados para la reserva
        $nuevosDatos = [
            'fecha_reserva' => '2023-07-01',
            'asistencia' => true,
        ];

        // Llamar a la función actualizarReserva() con los datos actualizados
        $response = $this->patch(route('reservas.actualizar', ['reservaId' => $reserva->id]), $nuevosDatos);

        // Verificar que la respuesta sea una redirección a la página de detalles de la reserva
        $response->assertRedirect(route('reservas.detalle', ['reservaId' => $reserva->id]));

        // Verificar que la reserva se actualizó correctamente en la base de datos
        $reservaActualizada = Reserva::find($reserva->id);
        $this->assertEquals('2023-07-01', $reservaActualizada->fecha_reserva);
        $this->assertTrue($reservaActualizada->asistencia);
    }
}
