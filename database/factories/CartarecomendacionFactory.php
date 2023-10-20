<?php

namespace Database\Factories;

use App\Models\Cartarecomendacion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CartarecomendacionFactory extends Factory
{
    protected $model = Cartarecomendacion::class;

    public function definition()
    {
        return [
			'cartaId' => $this->faker->name,
			'fechaCarta' => $this->faker->name,
			'cargoYTareasRealizadas' => $this->faker->name,
			'telefonoAutoridad' => $this->faker->name,
			'firmaAutoridad' => $this->faker->name,
			'autoridadAcademica_id' => $this->faker->name,
			'estudiante_id' => $this->faker->name,
        ];
    }
}
