<?php

namespace Tests\Unit;

use App\Models\Horario;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Carbon\Carbon;

class HorarioTest extends TestCase
{

    public function testCrearHorario()
    {
        Artisan::call('migrate');

        //insertar un horario correcto, omitimos el atributo cupos_disponibles debido a que por defecto es 30.
        $horarioCorrecto = $this->get(route('horarios.generar'),[
            'id' => 1,
            'fecha' => '13/06/2023',
            'hora_inicio' => '13:00',
            'hora_termino' => '14:00',
            'estado' => 'disponible',
        ]);

        $horarioCorrecto->assertStatus(302)->assertRedirect(route('horarios.index'));

        //insertar un horario Incorrecto en el que no existe hora de inicio y hora de termino.
        $horarioIncorrecto = $this->get(route('horarios.generar'),[
            'id' => 3,
            'fecha' => '13/06/2023',
            'hora_inicio' => null,
            'hora_termino' => null,
            'estado' => 'disponible',
            'cupos_disponibles' => 30,
        ]);

        $horarioIncorrecto->assertStatus(302)->assertRedirect(route('horarios.index'));

        //buscamos si el horario incorrecto se registro en la base de datos o no (si la prueba se pasa es que no se creo).
        $this->assertDatabaseMissing('horarios', [
            'id' => 3,
            'fecha' => '13/06/2023',
            'hora_inicio' => null,
            'hora_termino' => null,
            'estado' => 'disponible',
            'cupos_disponibles' => 30,
        ]);

        Horario::create([
            'id' => 10,
            'fecha'=>'13/06/2023',
            'hora_inicio'=>'09:00',
            'hora_termino'=>'10:00',
            'estado'=>'disponible',
            'cupos_disponibles'=>30,
        ]);

        // Crear el segundo horario con el mismo ID que el primero
        $horario2 = $this->get(route('horarios.generar'), [
            'id' => 10,
            'fecha'=>'13/06/2023',
            'hora_inicio'=>'11:00',
            'hora_termino'=>'12:00',
            'estado'=>'disponible',
            'cupos_disponibles'=>30,
        ]);

        // Verificar que la creación del segundo horario falle debido al ID duplicado
        $horario2->assertStatus(302); 
    }
}
