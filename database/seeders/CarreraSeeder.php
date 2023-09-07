<?php

namespace Database\Seeders;

use App\Models\Carrera;
use Illuminate\Database\Seeder;

class CarreraSeeder extends Seeder
{
   /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $educacion1 =  Carrera::create([
            'carrera' => 'Licenciatura en psicología',
		    'facultad_id' => 1,
        ]);
        $educacion2 =  Carrera::create([
            'carrera' => 'PEM en pedadogía y ciencias de la educación',
		    'facultad_id' => 1,
        ]);
        $educacion3 =  Carrera::create([
            'carrera' => 'PEM en inglés',
		    'facultad_id' => 1,
        ]);
        $educacion4 =  Carrera::create([
            'carrera' => 'Profesorado en educación primaria',
		    'facultad_id' => 1,
        ]);
        $educacion5 =  Carrera::create([
            'carrera' => 'Licenciatura en administración educativa',
		    'facultad_id' => 1,
        ]);
        $educacion6 =  Carrera::create([
            'carrera' => 'Maestría en docencia superior',
		    'facultad_id' => 1,
        ]);
        $educacion7 =  Carrera::create([
            'carrera' => 'Licenciatura en Ciencias Jurídicas y Sociales, abogado y notario',
		    'facultad_id' => 2,
        ]);
        $educacion8 =  Carrera::create([
            'carrera' => 'Licenciatura en Comercio Internacional',
		    'facultad_id' => 3,
        ]);
        $educacion9 =  Carrera::create([
            'carrera' => 'Licenciatura en Informática y Administración de Empresas',
		    'facultad_id' => 3,
        ]);
        $educacion10 =  Carrera::create([
            'carrera' => 'Licenciatura en Administración de Empresas',
		    'facultad_id' => 3,
        ]);
        $educacion11 =  Carrera::create([
            'carrera' => 'Maestría en Administración de Empresas con Especialidades',
		    'facultad_id' => 3,
        ]);
        $educacion12 =  Carrera::create([
            'carrera' => 'Licenciatura en Arquitectura',
		    'facultad_id' => 4,
        ]);
        $educacion13 =  Carrera::create([
            'carrera' => 'Licenciatura en Ciencias de la Comunicación Social',
		    'facultad_id' => 5,
        ]);
        $educacion14 =  Carrera::create([
            'carrera' => 'Licenciatura en Producción Audiovisual y Artes Cinematográficas',
		    'facultad_id' => 5,
        ]);
        $educacion15 =  Carrera::create([
            'carrera' => 'Licenciatura en Publicidad con Especialidad en Diseño Gráfico',
		    'facultad_id' => 5,
        ]);
        $educacion16 =  Carrera::create([
            'carrera' => 'Ingeniería civil',
		    'facultad_id' => 8,
        ]);
        $educacion17 =  Carrera::create([
            'carrera' => 'Ingeniería en electrónica',
		    'facultad_id' => 8,
        ]);
        $educacion18 =  Carrera::create([
            'carrera' => 'Ingeniería en telecomunicaciones',
		    'facultad_id' => 8,
        ]);
        $educacion19 =  Carrera::create([
            'carrera' => 'Ingeniería en sistemas',
		    'facultad_id' => 8,
        ]);
        $educacion20 =  Carrera::create([
            'carrera' => 'Técnico en Laboratorio Dental',
		    'facultad_id' => 6,
        ]);
        $educacion21 =  Carrera::create([
            'carrera' => 'Licenciatura en Odontología',
		    'facultad_id' => 6,
        ]);
        $educacion22 =  Carrera::create([
            'carrera' => 'Licenciatura en medicina',
		    'facultad_id' => 7,
        ]);
        $educacion23 =  Carrera::create([
            'carrera' => 'Licenciatura en Producción de Bio Imágenes',
		    'facultad_id' => 7,
        ]);
        $educacion24 =  Carrera::create([
            'carrera' => 'Maestría en Bio Imágenes',
		    'facultad_id' => 7,
        ]);

    }
    
}
