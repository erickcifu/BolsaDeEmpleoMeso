<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class SliderController extends Controller
{
    public function index()
    {

        $query = "SELECT
        sub.facultadName AS facultad,
        sub.nombrePuesto AS puesto,
        sub.resumenPuesto AS descripcion,
        sub.updated_at AS fecha
    from
        (
            SELECT
                fac.facultadName,
                fac.total_registros,
                ofertas.nombrePuesto,
                ofertas.resumenPuesto,
                ROW_NUMBER() OVER (
                    PARTITION BY fac.facultad_id
                    ORDER BY
                        ofertas.updated_at DESC
                ) AS rn,
                ofertas.updated_at
            FROM
                (
                    SELECT
                        facultad_id,
                        facultads.Nfacultad AS facultadName,
                        COUNT(*) AS total_registros
                    FROM
                        ofertas
                        LEFT JOIN facultads ON ofertas.facultad_id = facultads.id
                    GROUP BY
                        facultad_id, facultads.Nfacultad
                    ORDER BY
                        total_registros DESC
                    LIMIT
                        3
                ) AS fac
                LEFT JOIN ofertas ON fac.facultad_id = ofertas.facultad_id
            WHERE
                ofertas.estadoOferta = 1 AND
                ofertas.fechaMax >= NOW()
            ORDER BY
                fac.facultad_id,
                ofertas.updated_at ASC
        ) as sub
    WHERE
        rn <= 5";

        $resultados = DB::select($query);

        // Se obtiene los valores únicos de la columna "facultad"
        $facultadesUnicas = collect($resultados)->pluck('facultad')->unique();

        // Inicializa un array para almacenar los grupos
        $grupos = [];

        // Itera por los valores únicos de "facultad" y agrupa los resultados
        foreach ($facultadesUnicas as $facultad) {
            $grupos[$facultad] = collect($resultados)->where('facultad', $facultad)->all();
        }

        // dd($grupos);

        return view("welcome", compact("grupos"));
    }
}
