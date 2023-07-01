<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Ayudante;

class GuardarAyudanteTest extends TestCase
{
    use RefreshDatabase;

    public function testGuardarAyudante()
    {
        // Datos de ejemplo para el nuevo ayudante
        $datosAyudante = [
            'rut' => '12345678-9',
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'correo_electronico' => 'juan@example.com',
            'contraseña' => 'secreta',
            'estado' => 'activo',
            'carreras_codigo_carrera' => 1,
        ];

        // Realizar la solicitud POST a la ruta correspondiente para guardar el nuevo ayudante
        $response = $this->post(route('ayudantes.guardar'), $datosAyudante);

        // Verificar que se haya creado el nuevo ayudante en la base de datos
        $this->assertDatabaseHas('ayudantes', $datosAyudante);

        // Verificar que la respuesta sea una redirección
        $response->assertRedirect();

        // Verificar que se redirija a la página correcta después de guardar el ayudante
        $response->assertRedirect(route('ayudantes.gestor_ayudantes'));
    }
}
