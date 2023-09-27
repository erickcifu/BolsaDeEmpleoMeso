<?php

namespace Database\Factories;

use App\Models\Entrevista;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EntrevistaFactory extends Factory
{
    protected $model = Entrevista::class;

    public function definition()
    {
        return [
			'tituloEntrevista' => $this->faker->name,
			'descripcionEntrevista' => $this->faker->name,
			'FechaEntrevista' => $this->faker->name,
			'hora_inicio' => $this->faker->name,
			'hora_final' => $this->faker->name,
			'Contratado' => $this->faker->name,
			'comentarioContratado' => $this->faker->name,
			'postulacion_id' => $this->faker->name,
        ];
    }
}
