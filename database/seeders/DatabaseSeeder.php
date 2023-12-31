<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(FacultadSeeder::class);
        $this->call(CarreraSeeder::class);
        $this->call(DepartamentoSeeder::class);
        $this->call(ResSeeder::class);
        $this->call(Res2Seeder::class);
        $this->call(Res3Seeder::class);
        $this->call(RolSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(Idiomas::class);
        $this->call(habilidadTecnicaSeeder::class);
        $this->call(habilidadInterpersonalSeeder::class);
        $this->call(competenciaComportamentalSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
