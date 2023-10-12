<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cv;
use App\Models\Certificacion;
use App\Models\Experiencia;
use App\Models\Formacion;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class Cvs extends Component
{
    use WithPagination;
	use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $cvId, $direcionDomiciliar, $correoElectronico, $telefonoCv, $fotoCv, $perfilProfesional, $habilidades, $referencias, $publicaciones, $intereses;
	public $nombreCertificacion, $anioCertificacion, $cv_id;
	public $inicioExperiencia, $finExperiencia, $puestoTrabajo,$lugarTrabajo, $descripcionLaboral;
	public $anioInicioFormacion, $anioFinFormacion, $nivelFormacion, $institucionFormacion;
	//para el multiformulario
	public $paso = 1;
	public $guardarId = 0;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.cvs.view', [
            'cvs' => Cv::latest()
						->orWhere('cvId', 'LIKE', $keyWord)
						->orWhere('direcionDomiciliar', 'LIKE', $keyWord)
						->orWhere('correoElectronico', 'LIKE', $keyWord)
						->orWhere('telefonoCv', 'LIKE', $keyWord)
						->orWhere('fotoCv', 'LIKE', $keyWord)
						->orWhere('perfilProfesional', 'LIKE', $keyWord)
						->orWhere('habilidades', 'LIKE', $keyWord)
						->orWhere('referencias', 'LIKE', $keyWord)
						->orWhere('publicaciones', 'LIKE', $keyWord)
						->orWhere('intereses', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->cvId = null;
		$this->direcionDomiciliar = null;
		$this->correoElectronico = null;
		$this->telefonoCv = null;
		$this->fotoCv = null;
		$this->perfilProfesional = null;
		$this->habilidades = null;
		$this->referencias = null;
		$this->publicaciones = null;
		$this->intereses = null;
		$this->nombreCertificacion = null;
		$this->anioCertificacion = null;
		$this->inicioExperiencia = null;
        $this->finExperiencia = null;
        $this->puestoTrabajo = null;
        $this->lugarTrabajo = null;
        $this->descripcionLaboral = null;		
		$this->anioInicioFormacion =null;
		$this->anioFinFormacion =null;
		$this->institucionFormacion =null;
	}
	protected $rules = [
		'direcionDomiciliar' => 'required',
		'correoElectronico' =>  'required|email|ends_with:@gmail.com',
		'telefonoCv' => 'required | size:8',
		'fotoCv' => ' image | mimes:png,jpg,jpeg', 
		'perfilProfesional' => 'required | regex:/^[A-Za-z0-9\s]*$/|max:300',
		'habilidades' => 'required | regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ0-9\s-]*$/ | max:300',
		'referencias' => 'required|regex:/^[A-Za-záéíóúüÁÉÍÓÚÜ0-9\s, -]*$/|max:300',
		'publicaciones' => 'nullable | url | max:500',
		'intereses' => 'required | regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ0-9\s-]*$/ | max:300',
		'nombreCertificacion' => 'nullable | regex:/^[A-Za-z0-9\s]*$/|max:35', 
		'anioCertificacion' => 'nullable | date | before_or_equal:today',
		'inicioExperiencia' => 'nullable | date | before_or_equal:today',
        'finExperiencia' => 'nullable | date | before_or_equal:today',
        'puestoTrabajo' => 'nullable | regex:/^[A-Za-z0-9\s]*$/|max:35',
        'lugarTrabajo' => 'nullable | regex:/^[A-Za-z0-9\s]*$/|max:35',
        'descripcionLaboral' => 'nullable | regex:/^[A-Za-z0-9\s]*$/|max:35',
		'anioInicioFormacion' => 'required | date | before_or_equal:today', 
		'anioFinFormacion' => 'required | date | before_or_equal:today',
		'institucionFormacion' => 'required | regex:/^[A-Za-z0-9\s]*$/|max:35',
	];
	public function updated($propertyOferta){
		$this->validateOnly($propertyOferta);
	}

	protected $messages = [
        'direcionDomiciliar.required' => 'Este campo no puede estar vacío.',

		'correoElectronico.required' => 'Este campo no puede estar vacío.',
		'correoElectronico' => 'Ingresa un correo electrónico válido',

		'telefonoCv.required' => 'Este campo no puede estar vacío',
		'telefonoCv.size' => 'El número de teléfono debe tener 8 dígitos',

		'perfilProfesional.required' => 'Este campo no puede estar vacío',
		'perfilProfesional.regex' => 'Este campo solo puede contener letras, números y espacios',

		'habilidades.required' => 'Este campo no puede estar vacío',
		'habilidades.regex' => 'Este campo solo puede contener letras, números y espacios',

		'referencias.required' => 'Este campo no puede estar vacío',
		'referencias.regex' => 'Este campo solo puede contener letras, números y espacios',

		'publicaciones.url' => 'Ingresa una URL válida',
		'publicaciones.max' => 'La longitud máxima del texto para este campo son :max caracteres',

		'intereses.required' => 'Este campo no puede estar vacío',
		'intereses.regex' => 'Este campo solo puede contener letras, números y espacios',

		'nombreCertificacion.regex' => 'Este campo solo puede contener letras, números y espacios',

		'anioCertificacion' => 'Ingresa una fecha válida (Hoy o una fecha anterior)',

		'inicioExperiencia' => 'Ingresa una fecha válida (Hoy o una fecha anterior)',

		'finExperiencia' => 'Ingresa una fecha válida (Hoy o una fecha anterior)',

		'puestoTrabajo.regex' => 'Este campo solo puede contener letras, números y espacios',

		'lugarTrabajo.regex' => 'Este campo solo puede contener letras, números y espacios',

		'descripcionLaboral.regex' => 'Este campo solo puede contener letras, números y espacios',

		'anioInicioFormacion.required' => 'Este campo no puede estar vacío',
		'anioInicioFormacion' => 'Ingresa una fecha válida (Hoy o una fecha anterior)',

		'anioFinFormacion.required' => 'Este campo no puede estar vacío',
		'anioFinFormacion' => 'Ingresa una fecha válida (Hoy o una fecha anterior)',

		'institucionFormacion.required' => 'Este campo no puede estar vacío',
		'institucionFormacion.regex' => 'Este campo solo puede contener letras, números y espacios',


	];

	public function ValidarPaso1(){
		$this->validate([
			'direcionDomiciliar' => 'required',
			'correoElectronico' =>  'required|email|ends_with:@gmail.com',
			'telefonoCv' => 'required | size:8',
			'fotoCv' => ' image | mimes:png,jpg,jpeg', 
			'perfilProfesional' => 'required | regex:/^[A-Za-z0-9\s]*$/|max:300',
			'habilidades' => 'required | regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ0-9\s-]*$/ | max:300',
			'referencias' => 'required|regex:/^[A-Za-záéíóúüÁÉÍÓÚÜ0-9\s, -]*$/|max:300',			
			'publicaciones' => 'nullable | url | max:500',
			'intereses' => 'required | regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ0-9\s-]*$/ | max:300',
		]);
	}
	public function ValidarPaso2(){
		$this->validate([
			'nombreCertificacion' => 'nullable | regex:/^[A-Za-z0-9\s]*$/|max:35', 
			'anioCertificacion' => 'nullable | date | before_or_equal:today',
		]);
	}
	public function ValidarPaso3(){
		$this->validate([
			'inicioExperiencia' => 'nullable | date | before_or_equal:today',
			'finExperiencia' => 'nullable | date | before_or_equal:today',
			'puestoTrabajo' => 'nullable | regex:/^[A-Za-z0-9\s]*$/|max:35',
			'lugarTrabajo' => 'nullable | regex:/^[A-Za-z0-9\s]*$/|max:35',
			'descripcionLaboral' => 'nullable | regex:/^[A-Za-z0-9\s]*$/|max:35',
		]);
	}	
	public function ValidarPaso4(){
		$this->validate([
			'anioInicioFormacion' => 'required | date | before_or_equal:today',
			'anioFinFormacion' => 'required | date | before_or_equal:today',
			'institucionFormacion' => 'required | regex:/^[A-Za-z0-9\s]*$/|max:35',
		]);
	} // fin de validación de cada paso del formulario
 //Función para validar las reglas, dependiendo del paso en el que esté el formulario
 public function siguientePaso()
 {
 	if ($this->paso === 1) {
        $this->ValidarPaso1(); // Validar datos del paso 1
    } elseif ($this->paso === 2) {
         $this->ValidarPaso2(); // Validar datos del paso 2
    }
	 elseif ($this->paso === 3) {
		$this->ValidarPaso3(); // Validar datos del paso 3
	}
	elseif ($this->paso === 4) {
		$this->ValidarPaso4(); // Validar datos del paso 3
	}
    $this->paso++; //Se suma 1 al paso
 }

 public function pasoAnterior()
 {
    $this->paso--; //Para volver se resta 1 al paso	
 }
 // Fin de función para validar las reglas, dependiendo del paso en el que esté el formulario

    public function store()
    {
        $this->validate();

        $cv = Cv::create([ 
			'cvId' => $this->cvId,
			'direcionDomiciliar' => $this-> direcionDomiciliar,
			'correoElectronico' => $this-> correoElectronico,
			'telefonoCv' => $this-> telefonoCv,
			'fotoCv' => 'storage/'.$this-> fotoCv->store('fotografia', 'public'),
			'perfilProfesional' => $this-> perfilProfesional,
			'habilidades' => $this-> habilidades,
			'referencias' => $this-> referencias,
			'publicaciones' => $this-> publicaciones,
			'intereses' => $this-> intereses
        ]);
		$guardarId = $cv->id;

		Certificacion::create([
			'nombreCertificacion'=> $this-> nombreCertificacion,
			'anioCertificacion' => $this -> anioCertificacion,
			'cv_id' => $guardarId
		]);
        Experiencia::create([
			'inicioExperiencia' => $this-> inicioExperiencia,
			'finExperiencia' => $this-> finExperiencia,
			'puestoTrabajo' => $this-> puestoTrabajo,
			'lugarTrabajo' => $this-> lugarTrabajo,
			'descripcionLaboral' => $this-> descripcionLaboral,
			'cv_id' => $guardarId
		]);
		Formacion::create([
			'anioInicioFormacion' => $this-> anioInicioFormacion,
			'anioFinFormacion' => $this-> anioFinFormacion,
			'nivelFormacion' => $this-> nivelFormacion,
			'institucionFormacion' => $this-> institucionFormacion,
			'cv_id' => $guardarId
		]);
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'CV generado correctamente!.');
		
    }

	
    public function edit($id)
    {
        $record = Cv::findOrFail($id);
        $this->selected_id = $id; 
		$this->cvId = $record-> cvId;
		$this->direcionDomiciliar = $record-> direcionDomiciliar;
		$this->correoElectronico = $record-> correoElectronico;
		$this->telefonoCv = $record-> telefonoCv;
		$this->fotoCv = $record-> fotoCv;
		$this->perfilProfesional = $record-> perfilProfesional;
		$this->habilidades = $record-> habilidades;
		$this->referencias = $record-> referencias;
		$this->publicaciones = $record-> publicaciones;
		$this->intereses = $record-> intereses;
    }

    public function update()
    {
        $this->validate();

        if ($this->selected_id) {
			$record = Cv::find($this->selected_id);
            $record->update([ 
			'cvId' => $this-> cvId,
			'direcionDomiciliar' => $this-> direcionDomiciliar,
			'correoElectronico' => $this-> correoElectronico,
			'telefonoCv' => $this-> telefonoCv,
			'fotoCv' => $this-> fotoCv,
			'perfilProfesional' => $this-> perfilProfesional,
			'habilidades' => $this-> habilidades,
			'referencias' => $this-> referencias,
			'publicaciones' => $this-> publicaciones,
			'intereses' => $this-> intereses
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Cv Successfully updated.');
        }
    }

    public function destroy($cvId)
    {
        if ($cvId) {
            Cv::where('cvId', $cvId)->delete();
        }
    }
}