<?php

namespace Database\Seeders;
use App\Models\Interpersonal;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class habilidadInterpersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $Interpersonal1 = Interpersonal::create([
            'nombreInterpersonal' => 'Empatía',
        ]);
        $Interpersonal2 = Interpersonal::create([
            'nombreInterpersonal' => 'Comunicación',
        ]);
        $Interpersonal3 = Interpersonal::create([
            'nombreInterpersonal' => 'Inteligencia emocional',
        ]);
        $Interpersonal4 = Interpersonal::create([
            'nombreInterpersonal' => 'Trabajo en equipo y liderazgo',
        ]);
        $Interpersonal5 = Interpersonal::create([
            'nombreInterpersonal' => 'Habilidades de negociación',
        ]);
        $Interpersonal6 = Interpersonal::create([
            'nombreInterpersonal' => 'Persuasión e influencia',
        ]);
    }
}
