<?php

namespace Database\Factories;

use App\Models\Postulacion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostulacionFactory extends Factory
{
    protected $model = Postulacion::class;

    public function definition()
    {
        return [
			'fecha' => $this->faker->name,
			'oferta_id' => $this->faker->name,
        ];
    }
}
