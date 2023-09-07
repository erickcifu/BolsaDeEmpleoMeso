<?php

namespace Database\Seeders;

use App\Models\Facultad;
use Illuminate\Database\Seeder;

class FacultadSeeder extends Seeder
{
   /**
     * Run the database seeds.
     * @return void
     */

     public function run(){
        $Facultad1 = Facultad::create([
            'facultad' => 'Pedadogía y Ciencias de la Educación',
        ]);
        $Facultad2 = Facultad::create([
            'facultad' => 'Derecho',
        ]);
        $Facultad3 = Facultad::create([
            'facultad' => 'Ciencias Económicas',
        ]);
        $Facultad4 = Facultad::create([
            'facultad' => 'Arquitectura',
        ]);
        $Facultad5 = Facultad::create([
            'facultad' => 'Ciencias de la Comunicación Social',
        ]);
        $Facultad6 = Facultad::create([
            'facultad' => 'Odontología',
        ]);
        $Facultad7 = Facultad::create([
            'facultad' => 'Medicina',
        ]);
        $Facultad8 = Facultad::create([
            'facultad' => 'Ingeniería',
        ]);
    }

}
