<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $crearUsuario = User::create([
        'name' => 'RRHH',
        'email'=> 'bolsaempleoquetzaltenango@umes.edu.gt',
        'password' => 'B0ls4Um3s',
        'estado' => 1,
        'avatar' => null,
        'external_id' => null,
        'external_auth' => null,
        'rol_id' => 3,
        ]);
    }
}
