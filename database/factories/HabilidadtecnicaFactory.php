<?php

namespace Database\Factories;

use App\Models\Habilidadtecnica;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class HabilidadtecnicaFactory extends Factory
{
    protected $model = Habilidadtecnica::class;

    public function definition()
    {
        return [
			'tecnicaId' => $this->faker->name,
			'nombreTecnica' => $this->faker->name,
			'facultad_id' => $this->faker->name,
        ];
    }
}
