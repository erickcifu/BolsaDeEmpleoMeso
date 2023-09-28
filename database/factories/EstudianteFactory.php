<?php

namespace Database\Factories;

use App\Models\Estudiante;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EstudianteFactory extends Factory
{
    protected $model = Estudiante::class;

    public function definition()
    {
        return [
			'estudianteId' => $this->faker->name,
			'nombre' => $this->faker->name,
			'apellidos' => $this->faker->name,
			'carnet' => $this->faker->name,
			'DPI' => $this->faker->name,
			'correo' => $this->faker->name,
			'numero_personal' => $this->faker->name,
			'numero_domiciliar' => $this->faker->name,
			'curriculum' => $this->faker->name,
			'municipio_id' => $this->faker->name,
			'carrera_id' => $this->faker->name,
			'user_id' => $this->faker->name,
        ];
    }
}
