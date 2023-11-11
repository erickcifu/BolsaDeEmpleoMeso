<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $estudiante = Rol::create([
            'nombreRol' => 'Estudiante',
        ]);
        $empresa =  Rol::create([
            'nombreRol' => 'Empresa',
        ]);
        $rrhh =  Rol::create([
            'nombreRol' => 'Recursos Humanos',
        ]);
        $autoridad =  Rol::create([
            'nombreRol' => 'Autoridad Académica',
        ]);
    }
}
