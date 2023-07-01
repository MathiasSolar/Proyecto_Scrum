<?php

namespace Database\Factories;

use App\Models\Ayudante;
use Illuminate\Database\Eloquent\Factories\Factory;

class AyudanteFactory extends Factory
{
    protected $model = Ayudante::class;

    public function definition()
    {
        return [
            'rut' => $this->faker->unique()->randomNumber(8),
            'nombre' => $this->faker->name,
            'apellido' => $this->faker->lastName,
            'contraseña' => $this->faker->password,
            'correo_electronico' => $this->faker->unique()->safeEmail,
            'estado' => 'activo',
            'carreras_codigo_carrera' => $this->faker->unique()->randomNumber(3),
        ];
    }
}
