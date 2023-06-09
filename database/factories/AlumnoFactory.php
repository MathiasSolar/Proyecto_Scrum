<?php

namespace Database\Factories;

use App\Models\Alumno;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlumnoFactory extends Factory
{
    protected $model = Alumno::class;

    public function definition()
    {
        return [
            'rut' => $this->faker->unique()->randomNumber(8),
            'nombre' => $this->faker->name,
            'apellido' => $this->faker->lastName,
            'correo_electronico' => $this->faker->unique()->safeEmail,
            'carreras_codigo_carrera' => $this->faker->unique()->randomNumber(3),
        ];
    }
}
