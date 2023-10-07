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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
