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
            'Nfacultad' => 'Pedadogía y Ciencias de la Educación',
        ]);
        $Facultad2 = Facultad::create([
            'Nfacultad' => 'Derecho',
        ]);
        $Facultad3 = Facultad::create([
            'Nfacultad' => 'Ciencias Económicas',
        ]);
        $Facultad4 = Facultad::create([
            'Nfacultad' => 'Arquitectura',
        ]);
        $Facultad5 = Facultad::create([
            'Nfacultad' => 'Ciencias de la Comunicación Social',
        ]);
        $Facultad6 = Facultad::create([
            'Nfacultad' => 'Odontología',
        ]);
        $Facultad7 = Facultad::create([
            'Nfacultad' => 'Medicina',
        ]);
        $Facultad8 = Facultad::create([
            'Nfacultad' => 'Ingeniería',
        ]);
    }

}
