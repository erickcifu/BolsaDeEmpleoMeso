<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Empresa;
use Illuminate\Support\Facades\DB;

class Estadisticasempresa extends Component
{
    public $postulados = 0;
    public $postuladosYear = 0;
    public $contratados = 0;
    public $contradosYear = 0;
    public function render()
    {

        $usuario = auth()->user()->id;

        $empresa = Empresa::where('user_id', $usuario)->first();

        $queryPostulaciones = "SELECT
                    COUNT(*) as postulados
                FROM
                    (
                        SELECT
                            ofertaId
                        FROM
                            ofertas
                        WHERE
                            empresa_id = " . $empresa->empresaId . "
                            AND estadoOferta = 1
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
                            empresa_id = " . $empresa->empresaId . "
                            AND estadoOferta = 1
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
                            empresa_id = " . $empresa->empresaId . "
                            AND estadoOferta = 1
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
                            empresa_id = " . $empresa->empresaId . "
                            AND estadoOferta = 1
                    ) of
                    LEFT JOIN postulacions pos ON of.ofertaId = pos.oferta_id
                    LEFT JOIN entrevistas en ON pos.postulacionId = en.postulacion_id
                WHERE
                    pos.oferta_id IS NOT NULL
                    AND en.entrevistaId IS NOT NULL
                    AND YEAR(en.FechaEntrevista) = YEAR(CURDATE());";

        $postulados = DB::select($queryPostulaciones);
        $postuladosYear = DB::select($queryPostulacionesYear);
        $contratados = DB::select($queryContrataciones);
        $contratadosYear = DB::select($queryContratacionesYear);

        // return view('livewire.estadisticasempresa.view', [
        //     'postulados' => $postulados[0]->postulados,
        //     'contradados' => $contratados[0]->contratados,
        // ]);
        $this->postulados = $postulados[0]->postulados;
        $this->postuladosYear = $postuladosYear[0]->postulados;
        $this->contradados = $contratados[0]->contratados;
        $this->contradadosYear = $contratadosYear[0]->contratados;
        return view('livewire.estadisticasempresa.view');
    }

}
