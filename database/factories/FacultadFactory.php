<?php

namespace Database\Factories;

use App\Models\Facultad;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FacultadFactory extends Factory
{
    protected $model = Facultad::class;

    public function definition()
    {
        return [
			'Nfacultad' => $this->faker->name,
			'EstadoFacultad' => $this->faker->name,
        ];
    }
}
