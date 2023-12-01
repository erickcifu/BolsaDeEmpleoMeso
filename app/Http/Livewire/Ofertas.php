<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Oferta;
use App\Models\Empresa;
use App\Models\Entrevista;
use App\Models\User;
use App\Models\Postulacion;
use App\Models\Facultad;
use App\Models\habilidadTecnica;
use App\Models\ofertaTecnica;
use App\Models\Interpersonal;
use App\Models\ofertaInterpersonal;
use App\Models\competencia;
use App\Models\ofertaCompetencia;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class Ofertas extends Component
{
    use WithPagination;
	use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $resumenPuesto, $nombrePuesto,$responsabilidadesPuesto,$requisitosEducativos, $experienciaLaboral, $sueldoMax, $sueldoMinimo, $jornadaLaboral, $condicionesLaborales, $beneficios, $oportunidadesDesarrollo, $fechaMax, $imagenPuesto, $cantVacantes, $modalidadTrabajo, $edadRequerida, $generoRequerido, $comentarioCierre, $empresa_id, $facultad_id;
	public $fechaPostulacion, $oferta_id;
	public $ofertaId;
	public $id_postu, $nombreOferta;
	public $imagenPuestoPath, $keyWordTwo;

	//Campos de la entrevista
	public $tituloEntrevista, $descripcionEntrevista, $FechaEntrevista, $horaInicio, $horaFinal, $Contratado, $comentarioContratado, $postulacion_id;

	//para el multiformulario
	public $paso = 1;
	public $mostrarErrores = false;
	public $userID,	$empresaAut, $user, $ofertasLaborales;
	public $postulaciones;
	public $nombre_empresa;
	public $entrevistapost, $post, $ofertaEnt, $postuEnt;
	public $habilidadesTecnicas = [];
	public $tecnicas = [];
	public $habilidadesInterpersonales = [];
	public $interpersonales = [];
	public $competenciasTable = [];
	public $competencias = [];
	public $verTecnicas =[] , $verInterpersonales, $verCompetencias;

	public function mount()
    {
        $this->fechaPostulacion = Carbon::now()->toDate()->format('Y-m-d');
    }

    public function render()
    {

		$this->Postulaciones = Postulacion::all();
		$facultades = Facultad::all();
		// $this->habilidadesTecnicas = habilidadTecnica::all();
		$this->habilidadesInterpersonales = Interpersonal::all();
		$this->competenciasTable = competencia::all();

		if (Auth::check()) {

			$this->userID = Auth::id();

    		$this->user = User::with('empresa')->find($this->userID);

			$keyWord = '%'.$this->keyWord .'%';
    		// Accede a las ofertas laborales de la empresa
    		$this->ofertasLaborales = $this->user->Empresa->ofertas()
				->where(function ($query) use ($keyWord) {
					$query->where('resumenPuesto', 'LIKE', $keyWord)
							->orWhere('nombrePuesto', 'LIKE', $keyWord)
							->orWhere('imagenPuesto', 'LIKE', $keyWord)
							->orWhere('sueldoMinimo', 'LIKE', $keyWord)
							->orWhere('cantVacantes', 'LIKE', $keyWord)
							->orWhere('modalidadTrabajo', 'LIKE', $keyWord)
							->orWhere('edadRequerida', 'LIKE', $keyWord)
							->orWhere('generoRequerido', 'LIKE', $keyWord)
							->orWhere('comentarioCierre', 'LIKE', $keyWord)
							->orWhere('sueldoMax', 'LIKE', $keyWord)
							->orWhereHas('facultad', function ($queryFacultad) use ($keyWord) {
								$queryFacultad->where('Nfacultad', 'LIKE', $keyWord);
							});
				})
				->get();
			
			return view('livewire.ofertas.view', [
				'ofertas' => Oferta::latest()
							
							->paginate(10),
							'facultades' => $facultades,
							'ofertasLaborales' => $this->ofertasLaborales,
			]);
		}
	}
	
	/*public function verPostulaciones($ofertaId)
	{
		$this->redirect('/postulacions/' . $ofertaId);
	}*/

    public function cancel()
    {
        $this->resetInput();
    }

	public function updatedHabiliades()
	{
		$this->habilidadesTecnicas = habilidadTecnica::where('facultad_id', $this->facultad_id)->get();
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

	private function resetCierre()
    {		
		$this->comentarioCierre = null;
    }

	protected $rules = [
		'resumenPuesto' => 'required | max:300',
		'nombrePuesto' => 'required | max:200',
		'responsabilidadesPuesto' => 'required | max:300',
		'requisitosEducativos' => 'required | max:200',
		'experienciaLaboral' => 'required|max:300',
		'sueldoMinimo' => 'required | regex:/^\d+(\.\d+)?$/ | min:0',
		'sueldoMax' => 'required | regex:/^\d+(\.\d+)?$/ | min:0',
		'jornadaLaboral' => 'required|regex:/^[\pL\s]+$/u|max:20',
		'condicionesLaborales' => 'required|max:300',
		'beneficios' => 'required|max:300',
		'oportunidadesDesarrollo' => 'required|max:300',
		'fechaMax' => 'required | date | after:today',
		'cantVacantes' => 'required | numeric | gt:0',
		'modalidadTrabajo' => 'required	| regex:/^[\pL\s]+$/u|max:15',
		'edadRequerida' => 'required|integer|gt:17',
		'generoRequerido' => 'required | regex:/^[\pL\s]+$/u|max:50',
		'facultad_id' => 'required | integer',
	];

	protected $rulesCreate = ['imagenPuesto' => ' image | mimes:png,jpg,jpeg'];
	protected $rulesUpdate = ['imagenPuesto' => 'nullable'];
	public function updated($propertyOferta){
        $this->validateOnly($propertyOferta);
    }

//Configuración de mensajes de error
	protected $messages = [
        'resumenPuesto.required' => 'Este campo no puede estar vacío.',

		'nombrePuesto.required' => 'Este campo no puede estar vacío.',

		'responsabilidadesPuesto.required' => 'Este campo no puede estar vacío.',

		'requisitosEducativos.required' => 'Este campo no puede estar vacío.',

		'experienciaLaboral.required' => 'Este campo no puede estar vacío.',

		'sueldoMax.required' => 'Este campo no puede estar vacío.',
		'sueldoMax' => 'Este campo unicamente acepta cantidades arriba de 0.',

		'sueldoMinimo.required' => 'Este campo no puede estar vacío.',
		'sueldoMinimo' => 'Este campo unicamente acepta cantidades arriba de 0.',

		'jornadaLaboral.required' => 'Este campo no puede estar vacío.',
		'jornadaLaboral' => 'Este campo unicamente acepta letras',

		'condicionesLaborales.required' => 'Este campo no puede estar vacío.',

		'beneficios.required' => 'Este campo no puede estar vacío.',

		'oportunidadesDesarrollo.required' => 'Este campo no puede estar vacío.',

		'fechaMax.required' => 'Este campo no puede estar vacío.',
		'fechaMax' => 'Porfavor ingresa una fecha posterior a la de hoy.',

		'imagenPuesto' => 'Este campo unicamente acepta imágenes con formato: png, jpg, jpeg',

		'cantVacantes.required' => 'Este campo no puede estar vacío.',
		'cantVacantes' => 'Este campo unicamente acepta cantidades arriba de 0.',

		'modalidadTrabajo.required' => 'Este campo no puede estar vacío.',
		'modalidadTrabajo' => 'Este campo unicamente acepta letras',

		'edadRequerida.required' => 'Este campo no puede estar vacío.',
		'edadRequerida' => 'Debe ser de 18 años o mayor',

		'generoRequerido.required' => 'Este campo no puede estar vacío.',
		'generoRequerido' => 'Este campo unicamente acepta letras',

		'facultad_id.required' => 'Este campo no puede estar vacío.',
		'facultad_id' => 'Este campo unicamente acepta números',

	];

 //Validación de cada paso del formulario
public function validarPaso1()
{
	$rules = array_merge($this->rules, $this->selected_id === null ? $this->rulesCreate : $this->rulesUpdate);
	//Reglas de validación para la información general del empleo
	     $this->validate([
        'resumenPuesto' => 'required | max:300',
 		'nombrePuesto' => 'required | max:200',
 		'responsabilidadesPuesto' => 'required|max:300',
 		'fechaMax' => 'required | date | after:today',
		'sueldoMinimo' => 'required | regex:/^\d+(\.\d+)?$/ | min:0',
		'sueldoMax' => 'required | regex:/^\d+(\.\d+)?$/ | min:0',
		'jornadaLaboral' => 'required|regex:/^[\pL\s]+$/u|max:20',
		'cantVacantes' => 'required | numeric | gt:0',
		'modalidadTrabajo' => 'required	| regex:/^[\pL\s]+$/u|max:15',
    ]);
	$this->mostrarErrores = true;
 }

 public function validarPaso2()
 {
	//Reglas de validación para los requerimientos
     $this->validate([
        'requisitosEducativos' => 'required | max:200',
 		'experienciaLaboral' => 'required | max:300',
 		'edadRequerida' => 'required|integer | gt:17',
 		'generoRequerido' => 'required | regex:/^[\pL\s]+$/u|max:50',
		'facultad_id' => 'required | integer',
     ]);
	 $this->mostrarErrores = true;
 }
 public function validarPaso3()
 {
	//Reglas de validación para las condiciones y beneficios que ofrece la empresa
     $this->validate([
		'condicionesLaborales' => 'required|max:300',
		'beneficios' => 'required|max:300',
		'oportunidadesDesarrollo' => 'required | max:300',
     ]);
	 $this->mostrarErrores = true;
 }

 public function validarPaso4()
	{
		//Reglas de validación para las condiciones y beneficios que ofrece la empresa
		$this->validate([
			'tecnicas.*.tecnicaId' => 'required|regex:/^[A-Za-z0-9\s]*$/|max:300',
		]);
		$this->mostrarErrores = true;
	}

public function validarPaso5()
	{
		//Reglas de validación para las condiciones y beneficios que ofrece la empresa
		$this->validate([
			'interpersonales.*.interpersonalId' => 'required|regex:/^[A-Za-z0-9\s]*$/|max:300',
		]);
		$this->mostrarErrores = true;
	}

	public function validarPaso6()
	{
		//Reglas de validación para las condiciones y beneficios que ofrece la empresa
		$this->validate([
			'competencias.*.competenciaId' => 'required|regex:/^[A-Za-z0-9\s]*$/|max:300',
		]);
		$this->mostrarErrores = true;
	}
 // fin de validación de cada paso del formulario

 //Función para validar las reglas, dependiendo del paso en el que esté el formulario
 public function siguientePaso($paso)
 {
	if ($this->paso === 1) {
		$this->validarPaso1(); // Validar datos del paso 1
	} elseif ($this->paso === 2) {
		$this->validarPaso2(); // Validar datos del paso 2
		$this->updatedHabiliades();
	} elseif ($this->paso === 3) {
		$this->validarPaso3(); // Validar datos del paso 3
		if (count($this->tecnicas) == 0) {
			$this->addTecnicas();
		}
	} elseif ($this->paso === 4) {
		$this->validarPaso4(); // Validar datos del paso 4
		if (count($this->interpersonales) == 0) {
			$this->addInterpersonales();
		}
	} elseif ($this->paso === 5) {
		$this->validarPaso5(); // Validar datos del paso 5
		if (count($this->competencias) == 0) {
			$this->addCompetencias();
		}
	} elseif ($this->paso === 6) {
		$this->validarPaso6(); // Validar datos del paso 6
	}

	$this->paso = $paso;
 }

 public function pasoAnterior($paso)
 {
    $this->paso = $paso;
 }
 // Fin de función para validar las reglas, dependiendo del paso en el que esté el formulario

	public function process()
	{
		if ($this->selected_id === null) {
			$this->store();
		} else {
			$this->update();
		}
	}

    public function store()
    {
		if (Auth::check()) {
            // Obtiene el ID del usuario autenticado
            $this->userID = Auth::id();
			$this->user = User::with('empresa')->find($this->userID);
			$this->empresaAut = $this->user->Empresa->empresaId;
			$this->validate();
			$oferta = Oferta::create([ 
				'resumenPuesto' => $this-> resumenPuesto,
				'nombrePuesto' => $this-> nombrePuesto,
				'responsabilidadesPuesto' => $this-> responsabilidadesPuesto,
				'requisitosEducativos' => $this-> requisitosEducativos,
				'experienciaLaboral' => $this-> experienciaLaboral,
				'sueldoMax' => $this-> sueldoMax,
				'sueldoMinimo' => $this-> sueldoMinimo,
				'jornadaLaboral' => $this-> jornadaLaboral,
				'condicionesLaborales' => $this-> condicionesLaborales,
				'beneficios' => $this-> beneficios,
				'oportunidadesDesarrollo' => $this-> oportunidadesDesarrollo,
				'fechaMax' => $this-> fechaMax,
				'imagenPuesto' => 'storage/' . $this->imagenPuesto->store('ofertaslab', 'public'),
				'cantVacantes' => $this-> cantVacantes,
				'modalidadTrabajo' => $this-> modalidadTrabajo,
				'edadRequerida' => $this-> edadRequerida,
				'generoRequerido' => $this-> generoRequerido,
				'comentarioCierre' => '',
				'empresa_id' => $this->empresaAut,
				'facultad_id' => $this-> facultad_id,
			]);

			$guardarId = $oferta->ofertaId;

			foreach ($this->tecnicas as $tec) {
				$tec['oferta_id'] = $guardarId;
				$tec['tecnica_id'] = $tec['tecnicaId'];
				ofertaTecnica::create($tec);
			}

			foreach ($this->interpersonales as $inter) {
				$inter['oferta_id'] = $guardarId;
				$inter['interpersonal_id'] = $inter['interpersonalId'];
				ofertaInterpersonal::create($inter);
			}

			foreach ($this->competencias as $comp) {
				$comp['oferta_id'] = $guardarId;
				$comp['competencia_id'] = $comp['competenciaId'];
				ofertaCompetencia::create($comp);
			}
			$this->resetInput();
            session()->flash('message', 'Oferta Creada satisfactoriamente.');
			}
			else {
				dd("No hay un usuario autenticado");
			}
        
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Oferta creada correctamente!');
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
		$this->nombre_empresa = $record-> empresa->nombreEmpresa;
		$this->facultad_id = $record-> facultad_id;

		$verTecnicas = ofertaTecnica::where('oferta_id', $ofertaId)->get();
		// $verInterpersonales = ofertaInterpersonal::where('oferta_id', $ofertaId)->get();
		// $verCompetencias = ofertaCompetencia::where('oferta_id', $ofertaId)->get();
		
	}

    public function edit($ofertaId)
    {
		$this->resetInput();
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
		
		$tecnicas = ofertaTecnica::where('oferta_id', $ofertaId)->get();
		$interpersonales = ofertaInterpersonal::where('oferta_id', $ofertaId)->get();
		$competencias = ofertaCompetencia::where('oferta_id', $ofertaId)->get();

		foreach ($tecnicas as $tec) {
			$this->tecnicas[] = [
				'tecnicaId' => $tec->tecnica_id,
				'ofertaTecnicaId' => $tec->ofertaTecnicaId,
			];
		}

		foreach ($interpersonales as $inter) {
			$this->interpersonales[] = [
				'interpersonalId' => $inter->interpersonal_id,
				'ofertaInterpersonalId' => $inter->ofertaInterpersonalId,
			];
		}

		foreach ($competencias as $comp) {
			$this->competencias[] = [
				'competenciaId' => $comp->competencia_id,
				'ofertaCompentenciaId' => $comp->ofertaCompentenciaId,
			];
		}
    }

    public function update()
    {
        $this->validate();

        if ($this->selected_id) {
			$record = Oferta::find($this->selected_id);
            $record->update([ 
				'resumenPuesto' => $this-> resumenPuesto,
				'nombrePuesto' => $this-> nombrePuesto,
				'responsabilidadesPuesto' => $this-> responsabilidadesPuesto,
				'requisitosEducativos' => $this-> requisitosEducativos,
				'experienciaLaboral' => $this-> experienciaLaboral,
				'sueldoMax' => $this-> sueldoMax,
				'sueldoMinimo' => $this-> sueldoMinimo,
				'jornadaLaboral' => $this-> jornadaLaboral,
				'condicionesLaborales' => $this-> condicionesLaborales,
				'beneficios' => $this-> beneficios,
				'oportunidadesDesarrollo' => $this-> oportunidadesDesarrollo,
				'fechaMax' => $this-> fechaMax,
				'imagenPuesto' => $this->imagenPuesto,
				'cantVacantes' => $this-> cantVacantes,
				'modalidadTrabajo' => $this-> modalidadTrabajo,
				'edadRequerida' => $this-> edadRequerida,
				'generoRequerido' => $this-> generoRequerido,
				'comentarioCierre' => '',
				'empresa_id' => "1",
				'facultad_id' => $this-> facultad_id,
            ]);

			foreach ($this->tecnicas as $tec) {

				if (array_key_exists('ofertaTecnicaId', $tec)) {
					$record = ofertaTecnica::find($tec['ofertaTecnicaId']);
					$record->update([
						'oferta_id' => $this->selected_id,
						'tecnica_id' => $tec['tecnicaId'],
					]);
				} else {
					$tec['oferta_id'] = $this->selected_id;
					$tec['tecnica_id'] = $tec['tecnicaId'];
					ofertaTecnica::create($tec);
				}
			}

			foreach ($this->interpersonales as $inter) {
				if (array_key_exists('ofertaInterpersonalId', $inter)) {
					$record = ofertaInterpersonal::find($inter['ofertaInterpersonalId']);
					$record->update([
						'oferta_id' => $this->selected_id,
						'interpersonal_id' => $inter['interpersonalId'],
					]);
				} else {
					$inter['oferta_id'] = $this->selected_id;
					$inter['interpersonal_id'] = $inter['interpersonalId'];
					ofertaInterpersonal::create($inter);
				}
			}

			foreach ($this->competencias as $comp) {
				if (array_key_exists('ofertaCompentenciaId', $comp)) {
					$record = ofertaCompetencia::find($comp['ofertaCompentenciaId']);
					$record->update([
						'oferta_id' => $this->selected_id,
						'competencia_id' => $comp['competenciaId'],
					]);
				} else {
					$comp['oferta_id'] = $this->selected_id;
					$comp['competencia_id'] = $comp['competenciaId'];
					ofertaCompetencia::create($comp);
				}
			}

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Oferta actualizada correctamente!');
        }
    }

	//FUNCION PARA INACTIVAR
	public function Desactivar($ofertaId)
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
		$this->comentarioCierre = $record-> comentarioCierre;
    }

    public function updateEstado()
    {
        $this->validate(
			['comentarioCierre' => 'required|regex:/^[A-Za-z0-9\s]*$/|max:300',]
		);

        if ($this->selected_id) {
			$record = Oferta::find($this->selected_id);
            $record->update([ 
				'comentarioCierre' => $this->comentarioCierre,
				'estadoOferta'=> "0",
            ]);

            $this->resetCierre();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Oferta cerrada!');
        }
    }

	//FUNCION PARA BUSCAR LAS POSTULACIONES DENTRO DE LA TABLA OFERTAS
	public function verPostulaciones($ofertaId)
    {
		$keyWordTwo = '%'.$this->keyWordTwo .'%';
        $this->ofertapost = Oferta::with('postulacions')->find($ofertaId);

		// Verificar si la oferta existe
		if (!$this->ofertapost) {
			session()->flash('message', 'La oferta no existe.');
			return;
		}
		$this->nombreOferta = $this->ofertapost->nombrePuesto;
		$this->postulaciones = $this->ofertapost->postulacions()
			->where(function ($queryDos) use ($keyWordTwo) {
				$queryDos->orWhereHas('estudiante', function ($queryEstudiante) use ($keyWordTwo) {
						$queryEstudiante->where('nombre', 'LIKE', $keyWordTwo);
			});
		})
		->get();
				
		// Obtener las postulaciones asociadas a la oferta
		if ($this->postulaciones && $this->postulaciones->count() > 0) {
			// $this->dispatchBrowserEvent('showVerPostulacionesModal');
			return redirect()->route('postulacions.index', $ofertaId);
			
		} else {
			session()->flash('message', 'No hay postulaciones para esta oferta.');
		}
		
    }
	

	//FUNCION PARA OBETNER EL ID DESDE LA TABLA POSTULACIÓN
    public function setPostulacionId($postulacionId)
    {
        $this->id_postu = $postulacionId;
    }

	protected $rules2 = [
		'tituloEntrevista' => 'required',
        'descripcionEntrevista' => 'required',
        'FechaEntrevista' => 'required | date | after:today',
	];

    //FUNCION PARA CREAR LA ENTREVISTA
    public function newEntrevista(){
        $this->validate($this->rules2);

        // Verificar si la postulación ya tiene una entrevista
    $postulacion = Postulacion::find($this->id_postu);

    if ($postulacion && $postulacion->entrevistas->count() > 0) {
        // Ya hay una entrevista asociada a esta postulación
		$this->reset(['tituloEntrevista', 'descripcionEntrevista', 'FechaEntrevista', 'horaInicio', 'horaFinal']);
		$this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'Esta postulación ya tiene una entrevista.');

    } else {
        // Crear la entrevista solo si no hay una entrevista existente
        Entrevista::create([
            'tituloEntrevista' => $this->tituloEntrevista,
            'descripcionEntrevista' => $this->descripcionEntrevista,
            'FechaEntrevista' => $this->FechaEntrevista,
            'horaInicio' => $this->horaInicio,
            'horaFinal' => $this->horaFinal,
            'Contratado' => "0",
            'comentarioContratado' => " ",
            'postulacion_id' => $this->id_postu,
        ]);
		// Cerrar el modal y mostrar el mensaje de éxito
		$this->reset(['tituloEntrevista', 'descripcionEntrevista', 'FechaEntrevista', 'horaInicio', 'horaFinal']);

	$this->dispatchBrowserEvent('closeModal');
	session()->flash('message', 'Entrevista agendada correctamente!');
    }
	
	}
    
	
	//FUNCION PARA BUSCAR LAS ENTREVISTAS DENTRO DE LA TABLA OFERTAS
	 public function verEntrevistas($ofertaId)
     {
        //   Obtener la oferta con las postulaciones y entrevistas asociadas
	 	$this->ofertapost = Oferta::with('postulacions.entrevistas')->find($ofertaId);

	 	// Verificar si la oferta existe
	 	if (!$this->ofertapost) {
	 		session()->flash('message', 'La oferta no existe.');
	 		return;
	 	}

	 	//  Obtener el nombre de la oferta
	 	$this->nombreOferta = $this->ofertapost->nombrePuesto;

	 	//  Obtener todas las entrevistas asociadas a las postulaciones de la oferta
	 	$this->ofertasEnt = $this->ofertapost->postulacions->flatMap(function ($totalEntrevistas) {
	 		return $totalEntrevistas->entrevistas;
	 	});

	 	// Verificar si hay entrevistas asociadas a las postulaciones de la oferta
	 	if ($this->ofertasEnt && $this->ofertasEnt->count() > 0) {
			return redirect()->route('entrevistas.index', $ofertaId);
	 	} else {
	 		session()->flash('message', 'No hay entrevistas para esta oferta.');
	}
    }

	public function idEliminar($ofertaId)
    {
        $this->ofertaId = $ofertaId;
    }

	public function addTecnicas()
	{
		$this->tecnicas[] = [
			'tecnicaId' => $this->habilidadesTecnicas[0]->tecnicaId,
		];
	}

	public function removeTecnicas($indice)
	{
		if (array_key_exists('ofertaTecnicaId', $this->tecnicas[$indice])) {
			$record = ofertaTecnica::find($this->tecnicas[$indice]['ofertaTecnicaId']);
			$record->delete();
			session()->flash('message', 'Se ha eliminado la habilidad técnica correctamente!');
		}

		unset($this->tecnicas[$indice]);
		$this->tecnicas = array_values($this->tecnicas);
	}
	public function addInterpersonales()
	{
		$this->interpersonales[] = [
			'interpersonalId' => $this->habilidadesInterpersonales[0]->interpersonalId,
		];
	}

	public function removeInterpersonales($indice)
	{
		if (array_key_exists('ofertaInterpersonalId', $this->interpersonales[$indice])) {
			$record = ofertaInterpersonal::find($this->interpersonales[$indice]['ofertaInterpersonalId']);
			$record->delete();
			session()->flash('message', 'Se ha eliminado la habilidad interpersonal correctamente!');
		}
		unset($this->interpersonales[$indice]);
		$this->interpersonales = array_values($this->interpersonales);
	}
	public function addCompetencias()
	{
		$this->competencias[] = [
			'competenciaId' => $this->competenciasTable[0]->competenciaId,
		];
	}

	public function removeCompetencias($indice)
	{
		if (array_key_exists('ofertaCompentenciaId', $this->competencias[$indice])) {
			$record = ofertaCompetencia::find($this->competencias[$indice]['ofertaCompentenciaId']);
			$record->delete();
			session()->flash('message', 'Se ha eliminado la competencia correctamente!');
		}
		unset($this->competencias[$indice]);
		$this->competencias = array_values($this->competencias);
	}

    public function destroy()
    {
        Oferta::where('ofertaId', $ofertaId)->delete();
    }

	//EDITAR IMAGEN DEL PUESTO//
	public function editImagen($ofertaId){
		
		$recordImg = Oferta::findOrFail($ofertaId);
		$this->selected_id = $ofertaId; 
		$this->nombrePuesto = $recordImg-> nombrePuesto;
		$this->imagenPuesto = $recordImg->imagenPuesto;
	 
	}

	public function GuardarImagen(){
		if ($this->selected_id) {
			$recordImg = Oferta::find($this->selected_id);
		
		
			$recordImg->update([ 
				'nombrePuesto' => $this->nombrePuesto,
				'imagenPuesto' => 'storage/'.$this->imagenPuesto->store('ofertaslab', 'public'),
			]);
			
			$this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Imagen actualizada exitosamente!');
		}
	}

}