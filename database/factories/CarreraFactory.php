<?php

namespace Database\Factories;

use App\Models\Carrera;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CarreraFactory extends Factory
{
    protected $model = Carrera::class;

    public function definition()
    {
        return [
			'Ncarrera' => $this->faker->name,
			'EstadoCarrera' => $this->faker->name,
			'facultad_id' => $this->faker->name,
        ];
    }
}
