<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Http\Request;
use App\Models\Alumno;

class BuscarAlumnoTest extends TestCase
{
    public function testBuscarAlumnoExistente()
    {
        // Simular una solicitud con un rut existente
        $request = Request::create('/', 'POST', ['rut' => '12345678']);

        // Crear un alumno de prueba en la base de datos
        $alumno = Alumno::factory()->create([
            'rut' => '12345678',
            'nombre' => 'John',
            'apellido' => 'Doe',
            'correo_electronico' => 'john@example.com',
            'carreras_codigo_carrera' => 'IT'
        ]);

        // Llamar a la función buscarAlumno
        $response = $this->buscarAlumno($request);

        // Verificar la respuesta
        $response->assertJson([
            'nombre' => 'John',
            'apellido' => 'Doe',
            'correo' => 'john@example.com',
            'carrera' => 'IT'
        ]);
    }

    public function testBuscarAlumnoNoExistente()
    {
        // Simular una solicitud con un rut no existente
        $request = Request::create('/', 'POST', ['rut' => '87654321']);

        // Llamar a la función buscarAlumno
        $response = $this->buscarAlumno($request);

        // Verificar la respuesta
        $response->assertJson(['mensaje' => 'Alumno no registrado']);
    }

    private function buscarAlumno(Request $request)
    {
        $rut = $request->input('rut');

        $alumno = Alumno::where('rut', $rut)->first();

        if ($alumno) {
            return response()->json([
                'nombre' => $alumno->nombre,
                'apellido' => $alumno->apellido,
                'correo' => $alumno->correo_electronico,
                'carrera' => $alumno->carreras_codigo_carrera,
            ]);
        } else {
            return response()->json(['mensaje' => 'Alumno no registrado']);
        }
    }
}
