<?php

namespace Database\Factories;

use App\Models\Idioma;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class IdiomaFactory extends Factory
{
    protected $model = Idioma::class;

    public function definition()
    {
        return [
			'idiomaId' => $this->faker->name,
			'nombreIdioma' => $this->faker->name,
        ];
    }
}
