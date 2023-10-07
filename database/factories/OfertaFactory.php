<?php

namespace Database\Factories;

use App\Models\Oferta;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OfertaFactory extends Factory
{
    protected $model = Oferta::class;

    public function definition()
    {
        return [
			'descripcion' => $this->faker->name,
			'puesto' => $this->faker->name,
			'imagen' => $this->faker->name,
			'sueldoMinimo' => $this->faker->name,
			'fecha' => $this->faker->name,
			'puestoVacante' => $this->faker->name,
			'tipoContratacion' => $this->faker->name,
			'edadRequerida' => $this->faker->name,
			'genero' => $this->faker->name,
			'perfil' => $this->faker->name,
			'sueldoMax' => $this->faker->name,
			'empresa_id' => $this->faker->name,
        ];
    }
}
