<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     *     @return void
     */
    public function run(){
        $departamento1 = Departamento::create([
            'departamento' => 'Petén',
        ]);
        $departamento2 = Departamento::create([
            'departamento' => 'Izabal',
        ]);
        $departamento3 = Departamento::create([
            'departamento' => 'Alta Verapaz',
        ]);
        $departamento4 = Departamento::create([
            'departamento' => 'Quiché',
        ]);
        $departamento5 = Departamento::create([
            'departamento' => 'Huehuetenango',
        ]);
        $departamento6 = Departamento::create([
            'departamento' => 'Escuintla',
        ]);
        $departamento7 = Departamento::create([
            'departamento' => 'San Marcos',
        ]);
        $departamento8 = Departamento::create([
            'departamento' => 'Jutiapa',
        ]);
        $departamento9 = Departamento::create([
            'departamento' => 'Baja Verapaz',
        ]);
        $departamento10 = Departamento::create([
            'departamento' => 'Santa Rosa',
        ]);
        $departamento11 = Departamento::create([
            'departamento' => 'Zacapa',
        ]);
        $departamento12 = Departamento::create([
            'departamento' => 'Suchitepéquez',
        ]);
        $departamento13 = Departamento::create([
            'departamento' => 'Chiquimula',
        ]);
        $departamento14 = Departamento::create([
            'departamento' => 'Guatemala',
        ]);
        $departamento15 = Departamento::create([
            'departamento' => 'Jalapa',
        ]);
        $departamento16 = Departamento::create([
            'departamento' => 'Chimaltenango',
        ]);
        $departamento17 = Departamento::create([
            'departamento' => 'Quetzaltenango',
        ]);
        $departamento18 = Departamento::create([
            'departamento' => 'El Progreso',
        ]);
        $departamento19 = Departamento::create([
            'departamento' => 'Retalhuleu',
        ]);
        $departamento20 = Departamento::create([
            'departamento' => 'Sololá',
        ]);
        $departamento21 = Departamento::create([
            'departamento' => 'Totonicapán',
        ]);
        $departamento22 = Departamento::create([
            'departamento' => 'Sacatepéquez',
        ]);
    }
}
