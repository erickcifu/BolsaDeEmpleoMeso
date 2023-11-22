<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Competencia;

class competenciaComportamentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $Competencia1 = competencia::create([
            'nombreCompetencia' => 'Liderazgo',
        ]);
        $Competencia2 = competencia::create([
            'nombreCompetencia' => 'Trabajo en equipo',
        ]);
        $Competencia3 = competencia::create([
            'nombreCompetencia' => 'Negociación y mediación',
        ]);
        $Competencia4 = competencia::create([
            'nombreCompetencia' => 'Iniciativa',
        ]);
        $Competencia5 = competencia::create([
            'nombreCompetencia' => 'Relaciones interpersonales y comunicación',
        ]);

    }
}
