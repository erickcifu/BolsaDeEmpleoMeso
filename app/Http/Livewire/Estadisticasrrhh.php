<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Estadisticasrrhh extends Component
{
    public $postulados = 0;
    public $postuladosYear = 0;
    public $contratados = 0;
    public $contradosYear = 0;
    public $estudiantes = 0;
    public $estudiantesYear = 0;
    public $empresas = 0;
    public $empresasYear = 0;

    public function render()
    {

        $queryPostulaciones = "SELECT
                    COUNT(*) as postulados
                FROM
                    (
                        SELECT
                            ofertaId
                        FROM
                            ofertas
                        WHERE
                            estadoOferta = 1
                    ) as of
                    LEFT JOIN postulacions as pos ON of.ofertaId = pos.oferta_id
                WHERE
                    pos.oferta_id IS NOT NULL
                    AND YEAR(pos.fechaPostulacion) = YEAR(CURDATE())
                    AND MONTH(pos.fechaPostulacion) = MONTH(CURDATE())";

        $queryPostulacionesYear = "SELECT
                    COUNT(*) as postulados
                FROM
                    (
                        SELECT
                            ofertaId
                        FROM
                            ofertas
                        WHERE
                            estadoOferta = 1
                    ) as of
                    LEFT JOIN postulacions as pos ON of.ofertaId = pos.oferta_id
                WHERE
                    pos.oferta_id IS NOT NULL
                    AND YEAR(pos.fechaPostulacion) = YEAR(CURDATE())";

        $queryContrataciones = "SELECT
                    COUNT(*) as contratados
                FROM
                    (
                        SELECT
                            ofertaId
                        FROM
                            ofertas
                        WHERE
                            estadoOferta = 1
                    ) of
                    LEFT JOIN postulacions pos ON of.ofertaId = pos.oferta_id
                    LEFT JOIN entrevistas en ON pos.postulacionId = en.postulacion_id
                WHERE
                    pos.oferta_id IS NOT NULL
                    AND en.entrevistaId IS NOT NULL
                    AND YEAR(en.FechaEntrevista) = YEAR(CURDATE()) 
                    AND MONTH(en.FechaEntrevista) = MONTH(CURDATE());";

        $queryContratacionesYear = "SELECT
                    COUNT(*) as contratados
                FROM
                    (
                        SELECT
                            ofertaId
                        FROM
                            ofertas
                        WHERE
                            estadoOferta = 1
                    ) of
                    LEFT JOIN postulacions pos ON of.ofertaId = pos.oferta_id
                    LEFT JOIN entrevistas en ON pos.postulacionId = en.postulacion_id
                WHERE
                    pos.oferta_id IS NOT NULL
                    AND en.entrevistaId IS NOT NULL
                    AND YEAR(en.FechaEntrevista) = YEAR(CURDATE());";

        $queryEstudiantes = "SELECT
                        COUNT(*) as total
                    FROM
                        users
                    WHERE
                        external_id IS NOT NULL
                        AND YEAR(created_at) = YEAR(CURDATE())
                        AND MONTH(created_at) = MONTH(CURDATE());";

        $queryEstudiantesYear = "SELECT
                        COUNT(*) as total
                    FROM
                        users
                    WHERE
                        external_id IS NOT NULL
                        AND YEAR(created_at) = YEAR(CURDATE())";

        $queryEmpresas = "SELECT
                        COUNT(*) as total
                    FROM
                        users
                    WHERE
                        external_id IS NULL
                        AND YEAR(created_at) = YEAR(CURDATE())
                        AND MONTH(created_at) = MONTH(CURDATE());";

        $queryEmpresasYear = "SELECT
                        COUNT(*) as total
                    FROM
                        users
                    WHERE
                        external_id IS NULL
                        AND YEAR(created_at) = YEAR(CURDATE())";

        $postulados = DB::select($queryPostulaciones);
        $postuladosYear = DB::select($queryPostulacionesYear);
        $contratados = DB::select($queryContrataciones);
        $contratadosYear = DB::select($queryContratacionesYear);

        $estudiantes = DB::select($queryEstudiantes);
        $estudiantesYear = DB::select($queryEstudiantesYear);
        $empresas = DB::select($queryEmpresas);
        $empresasYear = DB::select($queryEmpresasYear);

        $this->postulados = $postulados[0]->postulados;
        $this->postuladosYear = $postuladosYear[0]->postulados;
        $this->contradados = $contratados[0]->contratados;
        $this->contradadosYear = $contratadosYear[0]->contratados;

        $this->estudiantes = $estudiantes[0]->total;
        $this->estudiantesYear = $estudiantesYear[0]->total;
        $this->empresas = $empresas[0]->total;
        $this->empresasYear = $empresasYear[0]->total;

        return view('livewire.estadisticasrrhh.view');
    }
}
