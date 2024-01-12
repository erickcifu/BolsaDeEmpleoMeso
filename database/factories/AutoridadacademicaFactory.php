<?php

namespace Database\Factories;

use App\Models\AutoridadAcademica;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AutoridadacademicaFactory extends Factory
{
    protected $model = AutoridadAcademica::class;

    public function definition()
    {
        return [
			'autoridadId' => $this->faker->name,
			'nombreAutoridad' => $this->faker->name,
			'apellidosAutoridad' => $this->faker->name,
			'estadoAutoridad' => $this->faker->name,
			'facultad_id' => $this->faker->name,
        ];
    }
}
