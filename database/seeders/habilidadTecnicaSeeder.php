<?php

namespace Database\Seeders;
use App\Models\habilidadTecnica;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class habilidadTecnicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $habilidadTecnica1 = habilidadTecnica::create([
            'nombreTecnica' => 'Conocimiento en instrumentos de evaluación psicológica',
            'facultad_id' => 1,
        ]);

        $habilidadTecnica2 = habilidadTecnica::create([
            'nombreTecnica' => 'Técnicas de entrevista y evaluación',
            'facultad_id' => 1,
        ]);
        $habilidadTecnica3 = habilidadTecnica::create([
            'nombreTecnica' => 'Conocimiento sobre intervenciones terapéuticas',
            'facultad_id' => 1,
        ]);
        $habilidadTecnica4 = habilidadTecnica::create([
            'nombreTecnica' => 'Capacidad de clasificar transtornos psicológicos',
            'facultad_id' => 1,
        ]);
        $habilidadTecnica5 = habilidadTecnica::create([
            'nombreTecnica' => 'Uso de términos jurídicos precisos y claros',
            'facultad_id' => 2,
        ]);
        $habilidadTecnica6 = habilidadTecnica::create([
            'nombreTecnica' => 'Conocimiento de normas y principios del ordenamiento jurídico nacional e internacional',
            'facultad_id' => 2,
        ]);
        $habilidadTecnica7 = habilidadTecnica::create([
            'nombreTecnica' => 'Comprensión de teoría y práctica jurídicas',
            'facultad_id' => 2,
        ]);
        $habilidadTecnica8 = habilidadTecnica::create([
            'nombreTecnica' => 'Análisis de datos contables y financieros',
            'facultad_id' => 3,
        ]);
        $habilidadTecnica9 = habilidadTecnica::create([
            'nombreTecnica' => 'Capacidad de realizar informes de contaduría y auditoria',
            'facultad_id' => 3,
        ]);
        $habilidadTecnica9 = habilidadTecnica::create([
            'nombreTecnica' => 'Capacidad de diseñar estrategias de la contaduría pública y auditoria',
            'facultad_id' => 3,
        ]);
        $habilidadTecnica10 = habilidadTecnica::create([
            'nombreTecnica' => 'Conocimiento en construcción de proyectos',
            'facultad_id' => 4,
        ]);
        $habilidadTecnica11 = habilidadTecnica::create([
            'nombreTecnica' => 'Conocimiento sobre producción de materiales audiovisuales',
            'facultad_id' => 5,
        ]);
        $habilidadTecnica12 = habilidadTecnica::create([
            'nombreTecnica' => 'Protesis',
            'facultad_id' => 6,
        ]);
        $habilidadTecnica13 = habilidadTecnica::create([
            'nombreTecnica' => 'Habilidad para efectuar diagnósticos',
            'facultad_id' => 7,
        ]);
        $habilidadTecnica14 = habilidadTecnica::create([
            'nombreTecnica' => 'Lenguajes de programación de alto nivel',
            'facultad_id' => 8,
        ]);
    }
}
