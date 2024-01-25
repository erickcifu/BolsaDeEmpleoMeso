<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Oferta;
use App\Models\Postulacion;
use App\Models\Estudiante;
use App\Models\Facultad;
use App\Models\Carrera;
use Illuminate\Support\Facades\DB;

use Livewire\WithFileUploads;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class OfertasEstudiantes extends Component
{
    use WithPagination;
	use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord,  $resumenPuesto, $nombrePuesto,$responsabilidadesPuesto,$requisitosEducativos, $experienciaLaboral, $sueldoMax, $sueldoMinimo, $jornadaLaboral, $condicionesLaborales, $beneficios, $oportunidadesDesarrollo, $fechaMax, $imagenPuesto, $cantVacantes, $modalidadTrabajo, $edadRequerida, $generoRequerido, $comentarioCierre, $empresa_id, $facultad_id;
	public $fechaPostulacion, $oferta_id;
	public $user_id, $user, $mensaje, $estudiante, $ofertas;
	public $perfil, $postulacionExistente;
	public $nombre_empresa;
    public $facultadSeleccionada;
    public $ofertaFacultad, $facultades;
	public $verTodas = false, $Totalofertas;
	public $tecnicas = [];
	public $interpersonales = [];
	public $competencias = [];

    public function mount()
    {
        $this->fechaPostulacion = Carbon::now()->toDate()->format('Y-m-d');
		
    }

    public function render()
    {
       $this->Postulaciones = Postulacion::all();
	   $this->user_id = Auth::id();
	   $this->user = User::find($this->user_id); 
	   $facultades = Facultad::all();
	   if ($this->user && $this->user->Estudiante){
			$this->mensaje = "El usuario si tiene una propiedad Estudiante";
			$this->estudiante = $this->user->Estudiante;

			$keyWord = '%'.$this->keyWord .'%';
			if ($this->estudiante->Carrera && $this->estudiante->Carrera->Facultad) {
				$this->ofertas = $this->estudiante->Carrera->Facultad->Ofertas()
					->where('estadoOferta', 1)
					->where(function ($query) use ($keyWord) {
						$query->where('nombrePuesto', 'LIKE', $keyWord)
							->orWhere('imagenPuesto', 'LIKE', $keyWord)
							->orWhere('sueldoMinimo', 'LIKE', $keyWord)
							->orWhere('fechaMax', 'LIKE', $keyWord)
							->orWhere('cantVacantes', 'LIKE', $keyWord)
							->orWhere('modalidadTrabajo', 'LIKE', $keyWord)
							->orWhere('edadRequerida', 'LIKE', $keyWord)
							->orWhere('generoRequerido', 'LIKE', $keyWord)
							->orWhere('comentarioCierre', 'LIKE', $keyWord)
							->orWhere('sueldoMax', 'LIKE', $keyWord)
							->orWhereHas('empresa', function ($queryEmpresa) use ($keyWord) {
								$queryEmpresa->where('nombreEmpresa', 'LIKE', $keyWord);
							})
							->orWhere('facultad_id', 'LIKE', $keyWord);
					})
					->get();
					
				
       	 		return view('livewire.ofertasestudiantes.view', [
            	'ofertaStudent' => Oferta::latest()
					->paginate(10),
				"user_id"=>$this->user_id, 
				"mensaje"=>$this->mensaje, 
				"ofertas"=>$this->ofertas,
				'facultades' => $facultades,
				]);
		}
	   } else {
		$this->mensaje = "No existe el usuario o no es un estudiante";
	   }
	   return view('livewire.ofertasestudiantes.defaultView', ['mensaje' => $this->mensaje]);
}

	public function verTodo(){
		$keyWord = '%'.$this->keyWord .'%';
		
        $Totalofertas = Oferta::all();
					
		$this->view = 'livewire.ofertasestudiantes.verTodo';

		// También puedes pasar datos adicionales a la vista si es necesario
		$this->emit('vistaActualizada', [
			'totalOfertas' => $this->ofertas,
		]);
		
	}

	public function mostrarOferta($ofertaId)
    {
        $record = Oferta::findOrFail($ofertaId);
        $this->selected_id = $ofertaId; 
		$this->imagenPuesto = $record->imagenPuesto;
		$this->resumenPuesto = $record->resumenPuesto;
		$this->nombrePuesto = $record->nombrePuesto;
		$this->responsabilidadesPuesto = $record->responsabilidadesPuesto;
		$this->requisitosEducativos = $record->requisitosEducativos;
		$this->experienciaLaboral = $record->experienciaLaboral;
		$this->sueldoMax = $record->sueldoMax;
		$this->sueldoMinimo = $record->sueldoMinimo;
		$this->jornadaLaboral = $record->jornadaLaboral;
		$this->condicionesLaborales = $record->condicionesLaborales;
		$this->beneficios = $record->beneficios;
		$this->oportunidadesDesarrollo = $record->oportunidadesDesarrollo;
		$this->fechaMax = $record->fechaMax;
		$this->imagenPuesto = $record->imagenPuesto;
		$this->cantVacantes = $record->cantVacantes;
		$this->modalidadTrabajo = $record->modalidadTrabajo;
		$this->edadRequerida = $record->edadRequerida;
		$this->generoRequerido = $record->generoRequerido;
		$this->comentarioCierre = $record->comentarioCierre;
		$this->nombre_empresa = $record->empresa->nombreEmpresa;
		$this->facultad_id = $record->facultad_id;

		$queryComp = "SELECT
						c.competenciaId,
						c.nombreCompetencia
					FROM
						ofertacompetencias oc
						LEFT JOIN competencias c ON oc.competencia_id = c.competenciaId
					WHERE
						oferta_id = " . $ofertaId;

		$queryTec = "SELECT
						ht.tecnicaId,
						ht.nombreTecnica
					FROM
						ofertatecnicas ot
						LEFT JOIN habilidadtecnicas ht ON ot.tecnica_id = ht.tecnicaId
					WHERE
						oferta_id = " . $ofertaId;

		$queryInt = "SELECT
						i.interpersonalId,
						i.nombreInterpersonal
					FROM
						ofertainterpersonals oi
						LEFT JOIN interpersonals i ON oi.interpersonal_id = i.interpersonalId
					WHERE
						oferta_id = " . $ofertaId;

		$this->competencias = DB::select($queryComp);
		$this->tecnicas = DB::select($queryTec);
		$this->interpersonales = DB::select($queryInt);
    }
	
    
	//FUNCION PARA OBTNER EL ID DESDE LA TABLA OFERTA
	public function setOfertaId($ofertaId)
    {
        $this->oferta_id = $ofertaId;
    }
	
	//FUNCION PARA CREAR LA POSTULACION
	public function postular(){
        $this->perfil = auth()->user()->Estudiante;

		if ($this->perfil) {
            $this->postulacionExistente = Postulacion::where('oferta_id', $this->oferta_id)
                ->where('estudiante_id', $this->perfil->estudianteId)
                ->exists();

            if ($this->postulacionExistente) {
                session()->flash('message', 'Ya te has postulado previamente a esta oferta.');
            } else {
					Postulacion::create([
						'fechaPostulacion' =>  $this->fechaPostulacion,
						'oferta_id' => $this->oferta_id,
						'estudiante_id' => $this->perfil->estudianteId,
					]);
					$this->dispatchBrowserEvent('closeModal');
					session()->flash('message', 'Te has postulado exitosamente a esta oferta.');
				}
			} else {
				session()->flash('message', 'No se encontró un perfil asociado al usuario.');
			}
	}

	public function cancel()
    {
        $this->dispatchBrowserEvent('closeModal');
		$this->resetInput();
    }

	
	private function resetInput()
	{
		$this->selected_id = null;
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
		$this->tecnicas = [];
		$this->interpersonales = [];
		$this->competencias = [];
		$this->paso = 1;
	}
}
