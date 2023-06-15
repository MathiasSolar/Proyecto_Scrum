<?php

namespace Database\Factories;

use App\Models\Alumno;
use Illuminate\Database\Eloquent\Factories\Factory;

class HorarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Alumno::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // Define the structure and properties of the model
            'rut' => $this->faker->string(),
            'nombre' => $this->faker->string(),
            'apellido' => $this->faker->string(),
            'correo_electronico' => $this->faker->string(),
            'carreras_codigo_carrera' => $this->faker->number(),
        ];
    }
}
