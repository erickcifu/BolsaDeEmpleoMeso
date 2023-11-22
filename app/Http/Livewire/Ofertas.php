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
	public $id_postu;
	public $imagenPuestoPath;

	//Campos de la entrevista
	public $tituloEntrevista, $descripcionEntrevista, $FechaEntrevista, $horaInicio, $horaFinal, $Contratado, $comentarioContratado, $postulacion_id;

	//para el multiformulario
	public $paso = 1;
	public $mostrarErrores = false;
	public $userID,	$empresaAut, $user, $ofertasLaborales;
	public $postulaciones;
	public $entrevistapost, $post;

	public function mount()
    {
        $this->fechaPostulacion = Carbon::now()->toDate()->format('Y-m-d');
    }

    public function render()
    {

		$this->Postulaciones = Postulacion::all();
		$facultades = Facultad::all();

		if (Auth::check()) {

			$this->userID = Auth::id();

    		$this->user = User::with('empresa')->find($this->userID);

    		// Accede a las ofertas laborales de la empresa
    		$this->ofertasLaborales = $this->user->Empresa->ofertas;

			$keyWord = '%'.$this->keyWord .'%';
			return view('livewire.ofertas.view', [
				'ofertas' => Oferta::latest()
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
		'imagenPuesto' => 'nullable|image|mimes:jpeg,png,jpg',
		'cantVacantes' => 'required | numeric | gt:0',
		'modalidadTrabajo' => 'required	| regex:/^[\pL\s]+$/u|max:15',
		'edadRequerida' => 'required|integer|gt:17',
		'generoRequerido' => 'required | regex:/^[\pL\s]+$/u|max:50',
		'facultad_id' => 'required | integer',
	];

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
		'imagenPuesto' => 'nullable|image|mimes:jpeg,png,jpg',
    ]);
	$this->mostrarErrores = true;
 }

 public function validarPaso2()
 {
	//Reglas de validación para los requerimientos
     $this->validate([
        'requisitosEducativos' => 'required | max:200',
 		'experienciaLaboral' => 'required | max:300',
 		'edadRequerida' => 'required|integer | gt:18',
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
 // fin de validación de cada paso del formulario

 //Función para validar las reglas, dependiendo del paso en el que esté el formulario
 public function siguientePaso()
 {
	//if ($this->mostrarErrores) {
		if ($this->paso === 1) {
			$this->validarPaso1(); // Validar datos del paso 1
		} elseif ($this->paso === 2) {
			$this->validarPaso2(); // Validar datos del paso 2
		}
		elseif ($this->paso === 3) {
			$this->validarPaso3(); // Validar datos del paso 3
		}
	//}

    $this->paso++; //Se suma 1 al paso
 }

 public function pasoAnterior()
 {
    $this->paso--; //Para volver se resta 1 al paso
 	
 }
 // Fin de función para validar las reglas, dependiendo del paso en el que esté el formulario



    public function store()
    {

		if (Auth::check()) {
            // Obtiene el ID del usuario autenticado
            $this->userID = Auth::id();
			$this->user = User::with('empresa')->find($this->userID);
			$this->empresaAut = $this->user->Empresa->empresaId;
			$this->validate();

			if ($this->imagenPuesto) {
				$this->imagenPuestoPath = 'storage/'.$this->imagenPuesto->store('ofertaslab', 'public');
			}

			Oferta::create([ 
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
				'imagenPuesto' => $this->imagenPuestoPath,
				'cantVacantes' => $this-> cantVacantes,
				'modalidadTrabajo' => $this-> modalidadTrabajo,
				'edadRequerida' => $this-> edadRequerida,
				'generoRequerido' => $this-> generoRequerido,
				'comentarioCierre' => '',
				'empresa_id' => $this->empresaAut,
				'facultad_id' => $this-> facultad_id,
			]);
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

    public function update()
    {
        $this->validate([
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
		]);

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
				'cantVacantes' => $this-> cantVacantes,
				'modalidadTrabajo' => $this-> modalidadTrabajo,
				'edadRequerida' => $this-> edadRequerida,
				'generoRequerido' => $this-> generoRequerido,
				'comentarioCierre' => '',
				'empresa_id' => "1",
				'facultad_id' => $this-> facultad_id,
            ]);

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
        $this->ofertapost = Oferta::with('postulacions')->find($ofertaId);

		// Verificar si la oferta existe
		if (!$this->ofertapost) {
			session()->flash('message', 'La oferta no existe.');
			return;
		}
		
		$this->postulaciones = $this->ofertapost->postulacions;

		// Obtener las postulaciones asociadas a la oferta
		if ($this->postulaciones && $this->postulaciones->count() > 0) {
			$this->dispatchBrowserEvent('showVerPostulacionesModal');
			
		} else {
			session()->flash('message', 'No hay postulaciones para esta oferta.');
		}
		
    }
	

	//FUNCION PARA OBETNER EL ID DESDE LA TABLA POSTULACIÓN
    public function setPostulacionId($postulacionId)
    {
        $this->id_postu = $postulacionId;
    }

    //FUNCION PARA CREAR LA ENTREVISTA
    public function newEntrevista(){
        $this->validate([
            'tituloEntrevista' => 'required',
            'descripcionEntrevista' => 'required',
            'FechaEntrevista' => 'required',
        ]);

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

        session()->flash('message', 'Entrevista agendada correctamente!');
	}
    
	

	public function idEliminar($ofertaId)
    {
        $this->ofertaId = $ofertaId;
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