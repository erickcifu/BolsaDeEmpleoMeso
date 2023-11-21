<?php

namespace Database\Seeders;

use App\Models\Idioma;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Idiomas extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */

    public function run()
    {
        $Idioma1 = Idioma::create([
            'nombreIdioma' => 'Español',
        ]);
        $Idioma2 = Idioma::create([
            'nombreIdioma' => 'Inglés',
        ]);
        $Idioma3 = Idioma::create([
            'nombreIdioma' => 'Español',
        ]);
        $Idioma4 = Idioma::create([
            'nombreIdioma' => 'Chino',
        ]);
        $Idioma5 = Idioma::create([
            'nombreIdioma' => 'Francés',
        ]);
        $Idioma6 = Idioma::create([
            'nombreIdioma' => 'Portugués',
        ]);
        $Idioma7 = Idioma::create([
            'nombreIdioma' => 'Japonés',
        ]);
    }
}
