<?php

namespace Database\Factories;

use App\Models\Municipio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MunicipioFactory extends Factory
{
    protected $model = Municipio::class;

    public function definition()
    {
        return [
			'municipioId' => $this->faker->name,
			'nombreMunicipio' => $this->faker->name,
			'departamento_id' => $this->faker->name,
        ];
    }
}
