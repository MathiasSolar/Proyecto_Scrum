<?php

namespace Database\Factories;

use App\Models\Reserva;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservaFactory extends Factory
{
    protected $model = Reserva::class;

    public function definition()
    {
        return [
            'alumnos_rut' => $this->faker->unique()->randomNumber(8),
            'fecha_reserva' => $this->faker->date(),
            'asistencia' => false,
            'horarios_id' => $this->faker->unique()->randomNumber(5),
            'ayudantes_rut' => $this->faker->unique()->randomNumber(8),
        ];
    }
}
