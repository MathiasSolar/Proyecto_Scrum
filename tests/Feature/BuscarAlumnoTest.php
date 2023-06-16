<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Carrera;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BuscarAlumnoTest extends TestCase
{
    use RefreshDatabase;

    public function testBuscarAlumnoExistente()
    {
        Carrera::create([
            'codigo_carrera' => 15462,
            'nombre_carrera' => 'Ingeniería en informatica'
        ]);

        Alumno::create([
            'rut' => '12345678',
            'nombre' => 'John',
            'apellido' => 'Doe',
            'correo_electronico' => 'john@example.com',
            'carreras_codigo_carrera' => 15462,
        ]);

        $request = Request::create('/', 'POST', ['rut' => '12345678']);
        $response = $this->buscarAlumno($request);

        $responseData = $response->getContent();
        $responseArray = json_decode($responseData, true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('12345678', $responseArray['rut']);
        $this->assertEquals('John', $responseArray['nombre']);
        $this->assertEquals('Doe', $responseArray['apellido']);
        $this->assertEquals('john@example.com', $responseArray['correo_electronico']);
        $this->assertEquals(15462, $responseArray['carrera']);
    }

    public function testBuscarAlumnoNoExistente()
    {
        $request = Request::create('/', 'POST', ['rut' => '99999999']);
        $response = $this->buscarAlumno($request);

        $responseData = $response->getContent();
        $responseArray = json_decode($responseData, true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertArrayHasKey('mensaje', $responseArray);
        $this->assertEquals('Alumno no registrado', $responseArray['mensaje']);
    }

    private function buscarAlumno(Request $request)
    {
        $rut = $request->input('rut');

        $alumno = Alumno::where('rut', $rut)->first();

        if ($alumno) {
            return response()->json([
                'rut' => $alumno->rut,
                'nombre' => $alumno->nombre,
                'apellido' => $alumno->apellido,
                'correo_electronico' => $alumno->correo_electronico,
                'carrera' => $alumno->carreras_codigo_carrera,
            ]);
        } else {
            return response()->json(['mensaje' => 'Alumno no registrado']);
        }
    }
}
