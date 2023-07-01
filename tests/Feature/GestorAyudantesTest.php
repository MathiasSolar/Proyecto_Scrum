<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Ayudante;

class GestorAyudantesTest extends TestCase
{
    use RefreshDatabase;

    public function testGestorAyudantes()
    {
        // Crear varios ayudantes de ejemplo en la base de datos
        $ayudante1 = Ayudante::factory()->create([
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'carreras_codigo_carrera' => 1,
            'estado' => 'activo',
        ]);
        $ayudante2 = Ayudante::factory()->create([
            'nombre' => 'María',
            'apellido' => 'Gómez',
            'carreras_codigo_carrera' => 2,
            'estado' => 'inactivo',
        ]);
        $ayudante3 = Ayudante::factory()->create([
            'nombre' => 'Pedro',
            'apellido' => 'López',
            'carreras_codigo_carrera' => 1,
            'estado' => 'activo',
        ]);

        // Realizar la solicitud GET a la ruta correspondiente para obtener la lista de ayudantes activos
        $response = $this->get(route('ayudantes.gestor_ayudantes'));

        // Verificar que la respuesta sea exitosa
        $response->assertOk();

        // Verificar que la respuesta contenga los datos de los ayudantes activos
        $response->assertSee($ayudante1->nombre);
        $response->assertSee($ayudante1->apellido);
        $response->assertSee($ayudante3->nombre);
        $response->assertSee($ayudante3->apellido);

        // Verificar que la respuesta no contenga los datos de los ayudantes inactivos
        $response->assertDontSee($ayudante2->nombre);
        $response->assertDontSee($ayudante2->apellido);
    }
}
