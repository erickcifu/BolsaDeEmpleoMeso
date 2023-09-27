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
            'nombreDepartamento' => 'Petén',
        ]);
        $departamento2 = Departamento::create([
            'nombreDepartamento' => 'Izabal',
        ]);
        $departamento3 = Departamento::create([
            'nombreDepartamento' => 'Alta Verapaz',
        ]);
        $departamento4 = Departamento::create([
            'nombreDepartamento' => 'Quiché',
        ]);
        $departamento5 = Departamento::create([
            'nombreDepartamento' => 'Huehuetenango',
        ]);
        $departamento6 = Departamento::create([
            'nombreDepartamento' => 'Escuintla',
        ]);
        $departamento7 = Departamento::create([
            'nombreDepartamento' => 'San Marcos',
        ]);
        $departamento8 = Departamento::create([
            'nombreDepartamento' => 'Jutiapa',
        ]);
        $departamento9 = Departamento::create([
            'nombreDepartamento' => 'Baja Verapaz',
        ]);
        $departamento10 = Departamento::create([
            'nombreDepartamento' => 'Santa Rosa',
        ]);
        $departamento11 = Departamento::create([
            'nombreDepartamento' => 'Zacapa',
        ]);
        $departamento12 = Departamento::create([
            'nombreDepartamento' => 'Suchitepéquez',
        ]);
        $departamento13 = Departamento::create([
            'nombreDepartamento' => 'Chiquimula',
        ]);
        $departamento14 = Departamento::create([
            'nombreDepartamento' => 'Guatemala',
        ]);
        $departamento15 = Departamento::create([
            'nombreDepartamento' => 'Jalapa',
        ]);
        $departamento16 = Departamento::create([
            'nombreDepartamento' => 'Chimaltenango',
        ]);
        $departamento17 = Departamento::create([
            'nombreDepartamento' => 'Quetzaltenango',
        ]);
        $departamento18 = Departamento::create([
            'nombreDepartamento' => 'El Progreso',
        ]);
        $departamento19 = Departamento::create([
            'nombreDepartamento' => 'Retalhuleu',
        ]);
        $departamento20 = Departamento::create([
            'nombreDepartamento' => 'Sololá',
        ]);
        $departamento21 = Departamento::create([
            'nombreDepartamento' => 'Totonicapán',
        ]);
        $departamento22 = Departamento::create([
            'nombreDepartamento' => 'Sacatepéquez',
        ]);
    }
}
