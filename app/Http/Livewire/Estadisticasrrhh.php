<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Facultad;
use App\Models\Carrera;
use App\Models\Oferta;
use Illuminate\Support\Carbon;

class Estadisticasrrhh extends Component
{
    public $endsOnDate;
    public $reminder;
    protected $casts = [
        'endsOnDate' => 'date:Y-m-d',
        'reminder' => 'date:Y-m-d',
    ];
    public $postulados = 0;
    public $contratados = 0;
    public $usuarios = [];
    public $usuariosYear = [];
    public $facultades = 0;
    public $carreras = 0;
    public $facultadesEst = [];
    public $carrerasEst = [];
    public $ofertas = 0;
    public $query = '';

    public function mount()
    {
        $this->endsOnDate = now()->format('Y-m-d');
        $this->reminder = Carbon::createFromFormat('Y-m-d', $this->endsOnDate)->subMonths(1)->toDateString();
    }
    public function actualizarInformacion()
    {
        $this->buildDataRH();
    }
    public function render()
    {
        $this->buildDataRH();
        return view('livewire.estadisticasrrhh.view');
    }

    public function buildDataRH() {

        $endDate = Carbon::createFromFormat('Y-m-d', $this->endsOnDate)->toDateString();
        $startDate = Carbon::createFromFormat('Y-m-d', $this->reminder)->toDateString();

        $queryPostulaciones = "SELECT
                    COUNT(*) as total
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
                    AND pos.fechaPostulacion BETWEEN '$startDate' AND '$endDate'";

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
                    AND DATE(FROM_UNIXTIME(UNIX_TIMESTAMP(en.created_at)))  BETWEEN '$startDate' AND '$endDate'";

        $queryUsuariosYear = "SELECT
                        r.nombreRol AS rol,
                        COUNT(u.id) AS total
                    FROM
                        rols r
                        LEFT JOIN users u ON r.rolId = u.rol_id
                    WHERE
                        YEAR(u.created_at) = YEAR(CURDATE())
                    GROUP BY
                        r.nombreRol";

        $queryUsuarios = "SELECT
                        r.nombreRol AS rol,
                        COUNT(u.id) AS total
                    FROM
                        rols r
                        LEFT JOIN users u ON r.rolId = u.rol_id
                    WHERE
                        DATE(FROM_UNIXTIME(UNIX_TIMESTAMP(u.created_at)))  BETWEEN ' $startDate ' AND ' $endDate '
                    GROUP BY
                        r.nombreRol, u.rol_id;";

        $queryFacultades = "SELECT
                        f.Nfacultad AS facultad,
                        COUNT(e.estudianteId) AS total
                    FROM
                        facultads f
                        LEFT JOIN carreras c ON f.id = c.facultad_id
                        LEFT JOIN estudiantes e ON c.id = e.carrera_id
                    WHERE
                        f.EstadoFacultad = 1 AND c.EstadoCarrera = 1
                    GROUP BY
                        f.Nfacultad;";

        $queryCarreras = "SELECT
                        f.Nfacultad AS facultad,
                        c.Ncarrera AS carrera,
                        COUNT(e.estudianteId) AS total
                    FROM
                        facultads f
                        LEFT JOIN carreras c ON f.id = c.facultad_id
                        LEFT JOIN estudiantes e ON c.id = e.carrera_id
                    WHERE
                        f.EstadoFacultad = 1 AND c.EstadoCarrera = 1
                    GROUP BY
                        f.Nfacultad,
                        c.Ncarrera;";


        $this->usuarios = DB::select($queryUsuarios);


        if(sizeof($this->usuarios) === 0) {
            $queryOnlyRoles = "SELECT
                        r.nombreRol AS rol,
                        0 AS total
                    FROM
                        rols r";

            $this->usuarios = DB::select($queryOnlyRoles);
        }
        

        $this->usuariosYear = DB::select($queryUsuariosYear);

        $post = DB::select($queryPostulaciones);
        $contratados = DB::select($queryContrataciones);

        $this->postulados = $post[0]->total;
        $this->contratados = $contratados[0]->contratados;

        $this->facultades = Facultad::count();
        $this->carreras = Carrera::count();
        $this->ofertas = Oferta::count();

        $this->facultadesEst = DB::select($queryFacultades);
        $this->carrerasEst = DB::select($queryCarreras);
    }
}
