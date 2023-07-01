<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Alumno;

class FiltrarAlumnosTest extends TestCase
{
    use RefreshDatabase;

    public function testFiltrarAlumnos()
    {
        // Crear varios alumnos de ejemplo en la base de datos
        $alumno1 = Alumno::factory()->create([
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'carreras_codigo_carrera' => 1,
        ]);
        $alumno2 = Alumno::factory()->create([
            'nombre' => 'María',
            'apellido' => 'Gómez',
            'carreras_codigo_carrera' => 2,
        ]);
        $alumno3 = Alumno::factory()->create([
            'nombre' => 'Pedro',
            'apellido' => 'López',
            'carreras_codigo_carrera' => 1,
        ]);

        // Realizar la solicitud POST a la ruta correspondiente para filtrar los alumnos por carrera
        $response = $this->post(route('alumnos.filtrar'), ['carrera' => 1]);

        // Verificar que la respuesta sea exitosa
        $response->assertOk();

        // Verificar que la respuesta contenga los datos de los alumnos filtrados
        $response->assertSee($alumno1->nombre);
        $response->assertSee($alumno1->apellido);
        $response->assertSee($alumno3->nombre);
        $response->assertSee($alumno3->apellido);

        // Verificar que la respuesta no contenga los datos del alumno no filtrado
        $response->assertDontSee($alumno2->nombre);
        $response->assertDontSee($alumno2->apellido);
    }
}
