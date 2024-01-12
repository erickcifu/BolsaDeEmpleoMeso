<?php

namespace App\Http\Livewire;

use Illuminate\Support\Carbon;
use Livewire\Component;
use App\Models\Empresa;
use Illuminate\Support\Facades\DB;


class Estadisticasempresa extends Component
{
    public $endsOnDate;
    public $reminder;

    protected $casts = [
        'endsOnDate' => 'date:Y-m-d',
        'reminder' => 'date:Y-m-d',
    ];

    public $postulados = 0;
    public $contratados = 0;
    public $usuario = 0;
    public $rol = 0;

    public function mount()
    {
        $this->endsOnDate = now()->format('Y-m-d');
        $this->reminder = Carbon::createFromFormat('Y-m-d', $this->endsOnDate)->subMonths(1)->toDateString();
    }
    public function actualizarInformacion()
    {
        $this->buildData();
    }

    public function render()
    {

        $this->usuario = auth()->user()->id;
        $this->rol = auth()->user()->rol_id;

        if ($this->rol === 2) {
            $this->buildData();
            return view('livewire.estadisticasempresa.view');
        } elseif ($this->rol === 3) {
            // IS RRHH
            return view('livewire.estadisticasrrhh.view');
        } elseif ($this->rol === 4) {
            // IS Autoridad Academica
            return view('livewire.estadisticassupervisor.view');
        } else {
            // IS Unknow
            return redirect()->route('ofertasestudiantes');
        }
    }

    public function buildData()
    {
        $empresa = Empresa::where('user_id', $this->usuario)->first();

        $endDate = Carbon::createFromFormat('Y-m-d', $this->endsOnDate)->toDateString();
        $startDate = Carbon::createFromFormat('Y-m-d', $this->reminder)->toDateString();

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
                    AND pos.fechaPostulacion BETWEEN ' $startDate ' AND ' $endDate '";

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
                    AND en.FechaEntrevista BETWEEN ' $startDate ' AND ' $endDate '";

        $postulados = DB::select($queryPostulaciones);
        $contratados = DB::select($queryContrataciones);

        $this->postulados = $postulados[0]->postulados;
        $this->contradados = $contratados[0]->contratados;

        // session()->flash('message', 'Se actualizó la información correctamente');
    }

}
