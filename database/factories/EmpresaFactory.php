<?php

namespace Database\Factories;

use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmpresaFactory extends Factory
{
    protected $model = Empresa::class;

    public function definition()
    {
        return [
			'empresaId' => $this->faker->name,
			'logo' => $this->faker->name,
			'nombreEmpresa' => $this->faker->name,
			'nit' => $this->faker->name,
			'rtu' => $this->faker->name,
			'patenteComercio' => $this->faker->name,
			'descripcionEmpresa' => $this->faker->name,
			'telefonoEmpresa' => $this->faker->name,
			'correoEmpresa' => $this->faker->name,
			'direccionEmpresa' => $this->faker->name,
			'encargadoEmpresa' => $this->faker->name,
			'telefonoEncargado' => $this->faker->name,
			'estadoEmpresa' => $this->faker->name,
			'estadoSolicitud' => $this->faker->name,
			'user_id' => $this->faker->name,
			'residencia_id' => $this->faker->name,
        ];
    }
}
