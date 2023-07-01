<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Ayudante;

class NuevoAyudanteTest extends TestCase
{
    use RefreshDatabase;

    public function testNuevoAyudante()
    {
        // Datos del nuevo ayudante a crear
        $nuevoAyudante = [
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'correo_electronico' => 'juan@example.com',
            'carreras_codigo_carrera' => 1,
            'contraseña' => 'secreto',
        ];

        // Realizar la solicitud POST a la ruta correspondiente para crear un nuevo ayudante
        $response = $this->post(route('gestor.nuevoAyudante'), $nuevoAyudante);

        // Verificar que el ayudante se haya creado correctamente en la base de datos
        $this->assertDatabaseHas('ayudantes', [
            'nombre' => $nuevoAyudante['nombre'],
            'apellido' => $nuevoAyudante['apellido'],
            'correo_electronico' => $nuevoAyudante['correo_electronico'],
            'carreras_codigo_carrera' => $nuevoAyudante['carreras_codigo_carrera'],
        ]);

        // Verificar que la respuesta sea una redirección
        $response->assertRedirect();
        
        // Verificar que se redirija a la página correcta después de crear el ayudante
        $response->assertRedirect(route('gestor.ayudantes'));
    }
}
