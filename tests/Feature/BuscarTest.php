<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Reserva;

class BuscarTest extends TestCase
{
    use RefreshDatabase;

    public function testBuscar()
    {
        // Crear varias reservas de ejemplo en la base de datos
        $reserva1 = Reserva::factory()->create([
            'fecha_reserva' => '2023-07-01',
            'asistencia' => true,
        ]);
        $reserva2 = Reserva::factory()->create([
            'fecha_reserva' => '2023-07-02',
            'asistencia' => false,
        ]);

        // Realizar la búsqueda con la fecha '2023-07-01'
        $response = $this->get(route('reservas.buscar', ['fecha' => '2023-07-01']));

        // Verificar que la respuesta sea exitosa
        $response->assertOk();

        // Verificar que la respuesta contenga los datos de la reserva encontrada
        $response->assertSee($reserva1->fecha_reserva);
        $response->assertSee($reserva1->asistencia);

        // Verificar que la respuesta no contenga los datos de la reserva no encontrada
        $response->assertDontSee($reserva2->fecha_reserva);
        $response->assertDontSee($reserva2->asistencia);
    }
}
