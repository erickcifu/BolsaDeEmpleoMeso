<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Oferta;
use App\Models\Postulacion;
use Livewire\WithFileUploads;
use Carbon\Carbon;


class OfertasEstudiantes extends Component
{
    use WithPagination;
	use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord,  $resumenPuesto, $nombrePuesto,$responsabilidadesPuesto,$requisitosEducativos, $experienciaLaboral, $sueldoMax, $sueldoMinimo, $jornadaLaboral, $condicionesLaborales, $beneficios, $oportunidadesDesarrollo, $fechaMax, $imagenPuesto, $cantVacantes, $modalidadTrabajo, $edadRequerida, $generoRequerido, $comentarioCierre, $empresa_id, $facultad_id;
	public $fechaPostulacion, $oferta_id;

    public function mount()
    {
        $this->fechaPostulacion = Carbon::now()->toDate()->format('Y-m-d');
		
    }

    public function render()
    {
        $this->Postulaciones = Postulacion::all();

        $keyWord = '%'.$this->keyWord .'%';
        return view('livewire.ofertasestudiantes.ofertas-estudiantes', [
            'ofertasestudiantes' => Oferta::latest()
									->orWhere('resumenPuesto', 'LIKE', $keyWord)
									->orWhere('nombrePuesto', 'LIKE', $keyWord)
									->orWhere('imagenPuesto', 'LIKE', $keyWord)
									->orWhere('sueldoMinimo', 'LIKE', $keyWord)
									->orWhere('fechaMax', 'LIKE', $keyWord)
									->orWhere('cantVacantes', 'LIKE', $keyWord)
									->orWhere('modalidadTrabajo', 'LIKE', $keyWord)
									->orWhere('edadRequerida', 'LIKE', $keyWord)
									->orWhere('generoRequerido', 'LIKE', $keyWord)
									->orWhere('comentarioCierre', 'LIKE', $keyWord)
									->orWhere('sueldoMax', 'LIKE', $keyWord)
									->orWhere('empresa_id', 'LIKE', $keyWord)
									->orWhere('facultad_id', 'LIKE', $keyWord)
									->paginate(10),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->resumenPuesto = null;
		$this->nombrePuesto = null;
		$this->responsabilidadesPuesto = null;
		$this->requisitosEducativos = null;
		$this->experienciaLaboral = null;
		$this->sueldoMax = null;
		$this->sueldoMinimo = null;
		$this->jornadaLaboral = null;
		$this->condicionesLaborales = null;
		$this->beneficios = null;
		$this->oportunidadesDesarrollo = null;
		$this->fechaMax = null;
		$this->imagenPuesto = null;
		$this->cantVacantes = null;
		$this->modalidadTrabajo = null;
		$this->edadRequerida = null;
		$this->generoRequerido = null;
		$this->comentarioCierre = null;
		$this->facultad_id = null;
    }

	

	public function mostrarOferta($ofertaId)
    {
        $record = Oferta::findOrFail($ofertaId);
        $this->selected_id = $ofertaId; 
		$this->resumenPuesto = $record-> resumenPuesto;
		$this->nombrePuesto = $record-> nombrePuesto;
		$this->responsabilidadesPuesto = $record-> responsabilidadesPuesto;
		$this->requisitosEducativos = $record-> requisitosEducativos;
		$this->experienciaLaboral = $record-> experienciaLaboral;
		$this->sueldoMax = $record-> sueldoMax;
		$this->sueldoMinimo = $record-> sueldoMinimo;
		$this->jornadaLaboral = $record-> jornadaLaboral;
		$this->condicionesLaborales = $record -> condicionesLaborales;
		$this->beneficios = $record -> beneficios;
		$this->oportunidadesDesarrollo = $record -> oportunidadesDesarrollo;
		$this->fechaMax = $record-> fechaMax;
		$this->imagenPuesto = $record-> imagenPuesto;
		$this->cantVacantes = $record-> cantVacantes;
		$this->modalidadTrabajo = $record-> modalidadTrabajo;
		$this->edadRequerida = $record-> edadRequerida;
		$this->generoRequerido = $record-> generoRequerido;
		$this->comentarioCierre = $record-> comentarioCierre;
		$this->empresa_id = $record-> empresa_id;
		$this->facultad_id = $record-> facultad_id;
    }

    public function edit($ofertaId)
    {
        $record = Oferta::findOrFail($ofertaId);
        $this->selected_id = $ofertaId; 
		$this->resumenPuesto = $record-> resumenPuesto;
		$this->nombrePuesto = $record-> nombrePuesto;
		$this->responsabilidadesPuesto = $record-> responsabilidadesPuesto;
		$this->requisitosEducativos = $record-> requisitosEducativos;
		$this->experienciaLaboral = $record-> experienciaLaboral;
		$this->sueldoMax = $record-> sueldoMax;
		$this->sueldoMinimo = $record-> sueldoMinimo;
		$this->jornadaLaboral = $record-> jornadaLaboral;
		$this->condicionesLaborales = $record -> condicionesLaborales;
		$this->beneficios = $record -> beneficios;
		$this->oportunidadesDesarrollo = $record -> oportunidadesDesarrollo;
		$this->fechaMax = $record-> fechaMax;
		$this->imagenPuesto = $record-> imagenPuesto;
		$this->cantVacantes = $record-> cantVacantes;
		$this->modalidadTrabajo = $record-> modalidadTrabajo;
		$this->edadRequerida = $record-> edadRequerida;
		$this->generoRequerido = $record-> generoRequerido;
		$this->comentarioCierre = $record-> comentarioCierre;
		$this->empresa_id = $record-> empresa_id;
		$this->facultad_id = $record-> facultad_id;
		$this->paso=1;
    }


	//FUNCION PARA OBTNER EL ID DESDE LA TABLA OFERTA
	public function setOfertaId($ofertaId)
    {
        $this->oferta_id = $ofertaId;
    }
	
	//FUNCION PARA CREAR LA POSTULACION
	public function postular(){
        Postulacion::create([
			'fechaPostulacion' =>  $this->fechaPostulacion,
            'oferta_id' => $this-> oferta_id,
        ]);
		
		$this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'Te has postulado exitosamente a esta oferta.');
	}
}
