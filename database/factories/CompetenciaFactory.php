<?php

namespace Database\Factories;

use App\Models\Competencia;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CompetenciaFactory extends Factory
{
    protected $model = Competencia::class;

    public function definition()
    {
        return [
			'competenciaId' => $this->faker->name,
			'nombreCompetencia' => $this->faker->name,
        ];
    }
}
