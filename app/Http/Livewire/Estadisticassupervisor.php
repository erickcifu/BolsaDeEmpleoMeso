<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\AutoridadAcademica;
use App\Models\Facultad;
use App\Models\User;

use PDF;
//----
class Estadisticassupervisor extends Component
{
    public $anioActual;
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
    public $nombreFacultad;
    public $user;
    public $user_id;
    public $autoridad;
    public $imageUrl;

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

        $this->anioActual = date("Y");
       $userID = Auth::id();

       $habilidadesT=DB::table('users')
       ->select('nombreTecnica', DB::raw('count(nombreTecnica)as total'))
       ->leftJoin('autoridadacademicas','users.id','=','autoridadacademicas.user_id')
       ->leftJoin('ofertas','ofertas.facultad_id','=','autoridadacademicas.facultad_id')
       ->leftJoin('ofertatecnicas','ofertas.ofertaId','=','ofertatecnicas.oferta_id')
       ->leftJoin('habilidadtecnicas','habilidadtecnicas.tecnicaId','=','ofertatecnicas.tecnica_id')
       ->where('users.id','=', $userID )
       ->groupBy('nombreTecnica')
       ->get();
        
        $this->buildDataSup();
        
        return view('livewire.estadisticassupervisor.view', compact('habilidadesT'));
        
    }

    public function buildDataSup()
    {

        $endDate = Carbon::createFromFormat('Y-m-d', $this->endsOnDate)->toDateString();
        $startDate = Carbon::createFromFormat('Y-m-d', $this->reminder)->toDateString();
        $userID = Auth::id();

       

        $queryHabilidadesYear = "SELECT
                    COUNT(*) AS total
                FROM
                    (
                        SELECT
                            id
                        FROM
                            users
                        WHERE
                            estado = 1
                            AND id=$userID
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
                                            
                                            estado = 1
                                             AND id=$userID
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
                                            
                                            estado = 1
                                             AND id=$userID
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
                                            
                                            estado = 1
                                             AND id=$userID
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
                                            
                                            estado = 1
                                             AND id=$userID
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
        $this->user_id = Auth::id();
	    $this->user = User::find($this->user_id);
        $this->nombreFacultad = null; 

        if ($this->user && $this->user->AutoridadAcademica) {
            $this->autoridad = $this->user->AutoridadAcademica;

            if ($this->autoridad->facultad){
            $this->nombreFacultad = $this->autoridad->facultad->Nfacultad;
            } else {
                $this->nombreFacultad = null;
            }
            
            // return view('livewire.estadisticassupervisor.viewpdf', ['nombreFacultad' => $this->nombreFacultad]);
        }

        $imageUrl = 'storage/Meso/LogoVerde.png';

        //-----------
        $userID = Auth::id();

       $habilidadesT=DB::table('users')
       ->select('nombreTecnica', DB::raw('count(nombreTecnica)as total'))
       ->leftJoin('autoridadacademicas','users.id','=','autoridadacademicas.user_id')
       ->leftJoin('ofertas','ofertas.facultad_id','=','autoridadacademicas.facultad_id')
       ->leftJoin('ofertatecnicas','ofertas.ofertaId','=','ofertatecnicas.oferta_id')
       ->leftJoin('habilidadtecnicas','habilidadtecnicas.tecnicaId','=','ofertatecnicas.tecnica_id')
       ->where('users.id','=', $userID )
       ->groupBy('nombreTecnica')
       ->get();
                //---------------
                    $QHabilidadesYear = "SELECT
                    COUNT(*) AS total
                    FROM
                    (
                        SELECT
                            id
                        FROM
                            users
                        WHERE
                            
                            estado = 1
                             AND id=$userID
                          
                            AND rol_id = 4
                    ) u
                    LEFT JOIN autoridadacademicas au ON u.id = au.user_id
                    LEFT JOIN ofertas o ON o.facultad_id = au.facultad_id
                    LEFT JOIN ofertatecnicas of ON o.ofertaId = of.oferta_id
                    LEFT JOIN habilidadtecnicas ht ON ht.tecnicaId = of.tecnica_id
                    ";
                //-----------------------
                $QContratadosYear = "SELECT
                COUNT(*) as total
                FROM
                (
                    SELECT
                        id
                    FROM
                        users
                    WHERE
                        
                        estado = 1
                        AND id=$userID
                        AND rol_id = 4
                ) u
                LEFT JOIN autoridadacademicas au ON u.id = au.user_id
                LEFT JOIN ofertas o ON o.facultad_id = au.facultad_id
                LEFT JOIN postulacions p ON o.ofertaId = p.oferta_id
                LEFT JOIN entrevistas e ON e.postulacion_id = p.postulacionId
                WHERE
                                    e.Contratado = 1
                ";
                //-------------------------------

                $QPostuladosYear = "SELECT
                COUNT(*) as total
                FROM
                (
                    SELECT
                        id
                    FROM
                        users
                    WHERE
                    
                        estado = 1
                         AND id=$userID
                        AND rol_id = 4
                ) u
                LEFT JOIN autoridadacademicas au ON u.id = au.user_id
                LEFT JOIN ofertas o ON o.facultad_id = au.facultad_id
                LEFT JOIN postulacions p ON o.ofertaId = p.oferta_id
                WHERE
                                    YEAR(p.created_at) = YEAR(CURDATE())
                ";
                //--------------

                $QRechazadosYear = "SELECT
                COUNT(*) as total
            FROM
                (
                    SELECT
                        id
                    FROM
                        users
                    WHERE
                        
                        estado = 1
                          AND id=$userID
                        AND rol_id = 4
                ) u
                LEFT JOIN autoridadacademicas au ON u.id = au.user_id
                LEFT JOIN ofertas o ON o.facultad_id = au.facultad_id
                LEFT JOIN postulacions p ON o.ofertaId = p.oferta_id
                WHERE
                                    p.estadoPostulacion = 0
                                 
           ";

           //------
           $QOfertasYear = "SELECT
           COUNT(*) as total
       FROM
           (
               SELECT
                   id
               FROM
                   users
               WHERE
                   
                   estado = 1
                   AND id=$userID
                   AND rol_id = 4
           ) u
           LEFT JOIN autoridadacademicas au ON u.id = au.user_id
           LEFT JOIN ofertas o ON o.facultad_id = au.facultad_id
       WHERE
           YEAR(o.created_at) = YEAR(CURDATE())";


$HabilidadesYear= DB::select( $QHabilidadesYear);
$ContratadosYear= DB::select(   $QContratadosYear);
$PostuladosYear= DB::select(   $QPostuladosYear);
$RechazadosYear= DB::select(   $QRechazadosYear);
$OfertasYear= DB::select(  $QOfertasYear);

                          
         
         $pdf=Pdf::loadView('livewire.estadisticassupervisor.viewpdf',  [
            'nombreFacultad' => $this->nombreFacultad,
            'habilidadesT' => $habilidadesT,
            'HabilidadesYear' => $HabilidadesYear,
            'ContratadosYear' => $ContratadosYear,
            'PostuladosYear' => $PostuladosYear,
            'RechazadosYear' => $RechazadosYear,
            'OfertasYear' => $OfertasYear,
            'imageUrl' => $imageUrl,
        ]);
		
		
		
		
		return $pdf->stream('Reporte.pdf');

	}
    

}
