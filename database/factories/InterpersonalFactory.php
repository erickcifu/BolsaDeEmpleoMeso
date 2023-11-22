<?php

namespace Database\Factories;

use App\Models\Interpersonal;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InterpersonalFactory extends Factory
{
    protected $model = Interpersonal::class;

    public function definition()
    {
        return [
			'interpersonalId' => $this->faker->name,
			'nombreInterpersonal' => $this->faker->name,
        ];
    }
}
