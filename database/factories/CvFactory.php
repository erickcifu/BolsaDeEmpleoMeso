<?php

namespace Database\Factories;

use App\Models\Cv;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CvFactory extends Factory
{
    protected $model = Cv::class;

    public function definition()
    {
        return [
			'cvId' => $this->faker->name,
			'direcionDomiciliar' => $this->faker->name,
			'correoElectronico' => $this->faker->name,
			'telefonoCv' => $this->faker->name,
			'fotoCv' => $this->faker->name,
			'perfilProfesional' => $this->faker->name,
			'habilidades' => $this->faker->name,
			'referencias' => $this->faker->name,
			'publicaciones' => $this->faker->name,
			'intereses' => $this->faker->name,
        ];
    }
}
