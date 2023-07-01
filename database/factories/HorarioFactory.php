<?php

namespace Database\Factories;

use App\Models\Horario;
use Illuminate\Database\Eloquent\Factories\Factory;

class HorarioFactory extends Factory
{
    protected $model = Horario::class;

    public function definition()
    {
        return [
            'fecha' => $this->faker->date(),
            'hora_inicio' => $this->faker->time(),
            'hora_termino' => $this->faker->time(),
            'estado' => null,
            'cupos_disponibles' => 30,
        ];
    }
}
