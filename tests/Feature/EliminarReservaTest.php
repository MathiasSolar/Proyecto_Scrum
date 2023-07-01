<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Reserva;

class EliminarReservaTest extends TestCase
{
    use RefreshDatabase;

    public function testEliminarReserva()
    {
        // Crear una reserva de ejemplo en la base de datos
        $reserva = Reserva::factory()->create();

        // Realizar la solicitud POST a la ruta correspondiente para eliminar la reserva
        $response = $this->post(route('horarios.eliminarReserva', ['reservaId' => $reserva->id]));

        // Verificar que la reserva se haya eliminado correctamente de la base de datos
        $this->assertDeleted('reservas', [
            'id' => $reserva->id,
        ]);

        // Verificar que la respuesta sea una redirección
        $response->assertRedirect();

        // Verificar que se redirija a la página correcta después de eliminar la reserva
        $response->assertRedirect(route('horarios.alumnosReservados'));
    }
}
