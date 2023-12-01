<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use PDF;
//----
class Estadisticassupervisor extends Component
{

    public $endsOnDate;
    public $reminder;
    protected $casts = [
        'endsOnDate' => 'date:Y-m-d',
        'reminder' => 'date:Y-m-d',
    ];
    public $habilidadestecnicasYear = 0;
    public $habilidadestecnicas = 0;
    public $contratadosYear = 0;
    public $contratados = 0;
    public $postuladosYear = 0;
    public $postulados = 0;
    public $rechazadosYear = 0;
    public $rechazados = 0;
    public $ofertasYear = 0;
    public $ofertas = 0;
    public function mount()
    {
        $this->endsOnDate = now()->format('Y-m-d');
        $this->reminder = Carbon::createFromFormat('Y-m-d', $this->endsOnDate)->subMonths(1)->toDateString();
    }

    public function actualizarInformacion()
    {
        $this->buildDataSup();
    }
    public function render()
    {


       $habilidadesT=DB::select('SELECT
       nombreTecnica,                    COUNT(*) AS total
                       FROM
                           (
                               SELECT
                                   id
                               FROM
                                   users
                               WHERE
                                   id = 4
                                   AND estado = 1
                                   AND rol_id = 4
                           ) u
                           LEFT JOIN autoridadacademicas au ON u.id = au.user_id
                           LEFT JOIN ofertas o ON o.facultad_id = au.facultad_id
                           LEFT JOIN ofertatecnicas of ON o.ofertaId = of.oferta_id
                           LEFT JOIN habilidadtecnicas ht ON ht.tecnicaId = of.tecnica_id
                           GROUP BY nombreTecnica');
        $this->buildDataSup();
        return view('livewire.estadisticassupervisor.view', compact('habilidadesT'));
    }

    public function buildDataSup()
    {

        $endDate = Carbon::createFromFormat('Y-m-d', $this->endsOnDate)->toDateString();
        $startDate = Carbon::createFromFormat('Y-m-d', $this->reminder)->toDateString();

        $queryHabilidadesYear = "SELECT
                    COUNT(*) AS total
                FROM
                    (
                        SELECT
                            id
                        FROM
                            users
                        WHERE
                            id = 4
                            AND estado = 1
                            AND rol_id = 4
                    ) u
                    LEFT JOIN autoridadacademicas au ON u.id = au.user_id
                    LEFT JOIN ofertas o ON o.facultad_id = au.facultad_id
                    LEFT JOIN ofertatecnicas of ON o.ofertaId = of.oferta_id
                    LEFT JOIN habilidadtecnicas ht ON ht.tecnicaId = of.tecnica_id
                WHERE
                    YEAR(o.created_at) = YEAR(CURDATE())";

        $queryHabilidades = $queryHabilidadesYear . "AND o.created_at BETWEEN '$startDate' AND '$endDate';";

        $queryContratadosYear = "SELECT
                                    COUNT(*) as total
                                FROM
                                    (
                                        SELECT
                                            id
                                        FROM
                                            users
                                        WHERE
                                            id = 4
                                            AND estado = 1
                                            AND rol_id = 4
                                    ) u
                                    LEFT JOIN autoridadacademicas au ON u.id = au.user_id
                                    LEFT JOIN ofertas o ON o.facultad_id = au.facultad_id
                                    LEFT JOIN postulacions p ON o.ofertaId = p.oferta_id
                                    LEFT JOIN entrevistas e ON e.postulacion_id = p.postulacionId
                                WHERE
                                    e.Contratado = 1
                                    AND YEAR(e.created_at) = YEAR(CURDATE())";

        $queryContratados = $queryContratadosYear . "AND e.created_at BETWEEN '$startDate' AND '$endDate'";


        $queryPostuladosYear = "SELECT
                                    COUNT(*) as total
                                FROM
                                    (
                                        SELECT
                                            id
                                        FROM
                                            users
                                        WHERE
                                            id = 4
                                            AND estado = 1
                                            AND rol_id = 4
                                    ) u
                                    LEFT JOIN autoridadacademicas au ON u.id = au.user_id
                                    LEFT JOIN ofertas o ON o.facultad_id = au.facultad_id
                                    LEFT JOIN postulacions p ON o.ofertaId = p.oferta_id
                                WHERE
                                    YEAR(p.created_at) = YEAR(CURDATE())";

        $queryPostulados = $queryPostuladosYear . "AND p.created_at BETWEEN '$startDate' AND '$endDate';";

        $queryRechazadosYear = "SELECT
                                    COUNT(*) as total
                                FROM
                                    (
                                        SELECT
                                            id
                                        FROM
                                            users
                                        WHERE
                                            id = 4
                                            AND estado = 1
                                            AND rol_id = 4
                                    ) u
                                    LEFT JOIN autoridadacademicas au ON u.id = au.user_id
                                    LEFT JOIN ofertas o ON o.facultad_id = au.facultad_id
                                    LEFT JOIN postulacions p ON o.ofertaId = p.oferta_id
                                WHERE
                                    p.estadoPostulacion = 0
                                    AND YEAR(p.created_at) = YEAR(CURDATE())";

        $queryRechazados = $queryRechazadosYear . "AND p.created_at BETWEEN '$startDate' AND '$endDate';";

        $queryOfertasYear = "SELECT
                                    COUNT(*) as total
                                FROM
                                    (
                                        SELECT
                                            id
                                        FROM
                                            users
                                        WHERE
                                            id = 4
                                            AND estado = 1
                                            AND rol_id = 4
                                    ) u
                                    LEFT JOIN autoridadacademicas au ON u.id = au.user_id
                                    LEFT JOIN ofertas o ON o.facultad_id = au.facultad_id
                                WHERE
                                    YEAR(o.created_at) = YEAR(CURDATE())";

        $queryOfertas = $queryOfertasYear . "AND o.created_at BETWEEN '$startDate' AND '$endDate';";

        $habilidadestecnicasYear = DB::select($queryHabilidadesYear);
        $habilidadestecnicas = DB::select($queryHabilidades);

        $contratadosYear = DB::select($queryContratadosYear);
        $contratados = DB::select($queryContratados);

        $postuladosYear = DB::select($queryPostuladosYear);
        $postulados = DB::select($queryPostulados);

        $rechazadosYear = DB::select($queryRechazadosYear);
        $rechazados = DB::select($queryRechazados);

        $ofertasYear = DB::select($queryOfertasYear);
        $ofertas = DB::select($queryOfertas);

        $this->habilidadestecnicasYear = $habilidadestecnicasYear[0]->total;
        $this->habilidadestecnicas = $habilidadestecnicas[0]->total;

        $this->contratadosYear = $contratadosYear[0]->total;
        $this->contratados = $contratados[0]->total;

        $this->postuladosYear = $postuladosYear[0]->total;
        $this->postulados = $postulados[0]->total;

        $this->rechazadosYear = $rechazadosYear[0]->total;
        $this->rechazados = $rechazados[0]->total;

        $this->ofertasYear = $ofertasYear[0]->total;
        $this->ofertas = $ofertas[0]->total;

    }

    /*genera pdf*/


    
	public function downloadPDF()
	{ 
        //-----------
        $habilidadesT=DB::select('SELECT
        nombreTecnica,                    COUNT(*) AS total
                        FROM
                            (
                                SELECT
                                    id
                                FROM
                                    users
                                WHERE
                                    id = 4
                                    AND estado = 1
                                    AND rol_id = 4
                            ) u
                            LEFT JOIN autoridadacademicas au ON u.id = au.user_id
                            LEFT JOIN ofertas o ON o.facultad_id = au.facultad_id
                            LEFT JOIN ofertatecnicas of ON o.ofertaId = of.oferta_id
                            LEFT JOIN habilidadtecnicas ht ON ht.tecnicaId = of.tecnica_id
                            GROUP BY nombreTecnica');
                //---------------
                    $HabilidadesYear = DB::select( 'SELECT
                    COUNT(*) AS total
                    FROM
                    (
                        SELECT
                            id
                        FROM
                            users
                        WHERE
                            id = 4
                            AND estado = 1
                            AND rol_id = 4
                    ) u
                    LEFT JOIN autoridadacademicas au ON u.id = au.user_id
                    LEFT JOIN ofertas o ON o.facultad_id = au.facultad_id
                    LEFT JOIN ofertatecnicas of ON o.ofertaId = of.oferta_id
                    LEFT JOIN habilidadtecnicas ht ON ht.tecnicaId = of.tecnica_id
                    ');
                //-----------------------
                $ContratadosYear =  DB::select('SELECT
                COUNT(*) as total
                FROM
                (
                    SELECT
                        id
                    FROM
                        users
                    WHERE
                        id = 4
                        AND estado = 1
                        AND rol_id = 4
                ) u
                LEFT JOIN autoridadacademicas au ON u.id = au.user_id
                LEFT JOIN ofertas o ON o.facultad_id = au.facultad_id
                LEFT JOIN postulacions p ON o.ofertaId = p.oferta_id
                LEFT JOIN entrevistas e ON e.postulacion_id = p.postulacionId
                WHERE
                                    e.Contratado = 1
                ');
                //-------------------------------

                $PostuladosYear = DB::select('SELECT
                COUNT(*) as total
                FROM
                (
                    SELECT
                        id
                    FROM
                        users
                    WHERE
                        id = 4
                        AND estado = 1
                        AND rol_id = 4
                ) u
                LEFT JOIN autoridadacademicas au ON u.id = au.user_id
                LEFT JOIN ofertas o ON o.facultad_id = au.facultad_id
                LEFT JOIN postulacions p ON o.ofertaId = p.oferta_id
                WHERE
                                    YEAR(p.created_at) = YEAR(CURDATE())
                ');
                //--------------

                $RechazadosYear = DB::select('SELECT
                COUNT(*) as total
            FROM
                (
                    SELECT
                        id
                    FROM
                        users
                    WHERE
                        id = 4
                        AND estado = 1
                        AND rol_id = 4
                ) u
                LEFT JOIN autoridadacademicas au ON u.id = au.user_id
                LEFT JOIN ofertas o ON o.facultad_id = au.facultad_id
                LEFT JOIN postulacions p ON o.ofertaId = p.oferta_id
                WHERE
                                    p.estadoPostulacion = 0
                                 
           ');

           //------
           $OfertasYear = DB::select('SELECT
           COUNT(*) as total
       FROM
           (
               SELECT
                   id
               FROM
                   users
               WHERE
                   id = 4
                   AND estado = 1
                   AND rol_id = 4
           ) u
           LEFT JOIN autoridadacademicas au ON u.id = au.user_id
           LEFT JOIN ofertas o ON o.facultad_id = au.facultad_id
       WHERE
           YEAR(o.created_at) = YEAR(CURDATE())');




                          
         
         $pdf=Pdf::loadView('livewire.estadisticassupervisor.viewpdf', compact('habilidadesT','HabilidadesYear','ContratadosYear','PostuladosYear','RechazadosYear','OfertasYear'));
		
		
		
		
		return $pdf->stream('Reporte.pdf');

	}
    

}
