<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Idioma;
use App\Models\idiomacv;
use App\Models\Municipio;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cv;
use App\Models\Certificacion;
use App\Models\Experiencia;
use App\Models\Formacion;
use App\Models\Departamento;
use Livewire\WithFileUploads;
use PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Estudiante;
use Illuminate\Support\Facades\DB;

class Cvs extends Component
{
	use WithPagination;
	use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
	public $selected_id, $keyWord, $cvId, $direcionDomiciliar, $correoElectronico, $telefonoCv, $fotoCv, $perfilProfesional, $habilidades, $nombreRef1, $telRef1, $nombreRef2, $telRef2, $publicaciones, $intereses;
	public $pathTempPhoto;
	//para el multiformulario
	public $paso = 1;
	public $iteration = 0;
	public $guardarId = 0;
	public $certificaciones = [];
	public $experiencia = [];
	public $formacion = [];
	public $idiomas = [];
	public $idiomasTable = [];
	public $user_id, $user,$estudiante,$cvs;

	public function render()
	{
		$this->idiomasTable = Idioma::get();
		if (Auth::check()) {
			$this->user_id = Auth::id();
       	 	$this->user = User::with('estudiante')->find($this->user_id);
			$keyWord = '%'.$this->keyWord .'%';
			$this->cvs = $this->user->estudiante->cvs;
		}
		$keyWord = '%' . $this->keyWord . '%';
		return view('livewire.cvs.view', [
			'cvs2' => Cv::latest()
				->orWhere('cvId', 'LIKE', $keyWord)
				->orWhere('direcionDomiciliar', 'LIKE', $keyWord)
				->orWhere('correoElectronico', 'LIKE', $keyWord)
				->orWhere('telefonoCv', 'LIKE', $keyWord)
				->orWhere('fotoCv', 'LIKE', $keyWord)
				->orWhere('perfilProfesional', 'LIKE', $keyWord)
				->orWhere('habilidades', 'LIKE', $keyWord)
				->orWhere('publicaciones', 'LIKE', $keyWord)
				->orWhere('intereses', 'LIKE', $keyWord)
				->paginate(10),
				"cvs" => $this->cvs,
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
		$this->nombreRef1 = null;
		$this->telRef1 = null;
		$this->nombreRef2 = null;
		$this->telRef2 = null;
		$this->publicaciones = null;
		$this->intereses = null;
		$this->nombreCertificacion = null;
		$this->anioCertificacion = null;
		$this->inicioExperiencia = null;
		$this->finExperiencia = null;
		$this->puestoTrabajo = null;
		$this->lugarTrabajo = null;
		$this->descripcionLaboral = null;
		$this->anioInicioFormacion = null;
		$this->anioFinFormacion = null;
		$this->institucionFormacion = null;
		$this->certificaciones = [];
		$this->formacion = [];
		$this->idiomas = [];
		$this->experiencia = [];
		$this->paso = 1;
		$this->selected_id = null;
		$this->iteration++;
	}
	protected $rules = [
		'direcionDomiciliar' => 'required',
		'correoElectronico' => 'required|email',
		'telefonoCv' => 'required | size:8',
		'perfilProfesional' => 'required |max:300',
		'habilidades' => 'required | max:300',
		'nombreRef1' => 'required|regex:/^[A-Za-záéíóúüÁÉÍÓÚÜ0-9\s, -]*$/|max:300',
		'telRef1' => 'required | size:8',
		'nombreRef2' => 'required|regex:/^[A-Za-záéíóúüÁÉÍÓÚÜ0-9\s, -]*$/|max:300',
		'telRef2' => 'required | size:8',
		'publicaciones' => 'nullable | url | max:500',
		'intereses' => 'required | max:300',
	];

	protected $rulesCreate = ['fotoCv' => ' image | mimes:png,jpg,jpeg'];
	protected $rulesUpdate = ['fotoCv' => 'nullable'];
	public function updated($propertyOferta)
	{
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

		'certificaciones*.nombreCertificacion.regex' => 'Este campo solo puede contener letras, números y espacios',

		'certificaciones*.anioCertificacion' => 'Ingresa una fecha válida (Hoy o una fecha anterior)',

		'certificaciones*.institucionCertificadora' => 'Ingresa una fecha válida (Hoy o una fecha anterior)',

		'experiencia*.inicioExperiencia' => 'Ingresa una fecha válida (Hoy o una fecha anterior)',

		'experiencia*.finExperiencia' => 'Ingresa una fecha válida (Hoy o una fecha anterior)',

		'experiencia*.puestoTrabajo.regex' => 'Este campo solo puede contener letras, números y espacios',

		'experiencia*.lugarTrabajo.regex' => 'Este campo solo puede contener letras, números y espacios',

		'experiencia*.descripcionLaboral.regex' => 'Este campo solo puede contener letras, números y espacios',

		// 'formacion*.anioInicioFormacion.required' => 'Este campo no puede estar vacío',
		// 'formacion*.anioInicioFormacion' => 'Ingresa una fecha válida (Hoy o una fecha anterior)',

		// 'formacion*.anioFinFormacion.required' => 'Este campo no puede estar vacío',
		// 'formacion*.anioFinFormacion' => 'Ingresa una fecha válida (Hoy o una fecha anterior)',

		// 'formacion*.institucionFormacion.required' => 'Este campo no puede estar vacío',
		// 'formacion*.institucionFormacion.regex' => 'Este campo solo puede contener letras, números y espacios',

		// 'formacion*.nivelFormacion.required' => 'Este campo no puede estar vacío',

		// 'formacion*.tituloObtenido.required' => 'Este campo no puede estar vacío',
	];

	public function ValidarPaso1()
	{
		$rules = array_merge($this->rules, $this->selected_id === null ? $this->rulesCreate : $this->rulesUpdate);
		$this->validate($rules);
	}
	public function ValidarPaso2()
	{
		$this->validate([
			// 'nombreCertificacion' => 'nullable | regex:/^[A-Za-z0-9\s]*$/|max:35',
			// 'anioCertificacion' => 'nullable | date | before_or_equal:today',
			'certificaciones.*.nombreCertificacion' => 'nullable|max:35',
			'certificaciones.*.anioCertificacion' => 'nullable | date | before_or_equal:today',
			'certificaciones.*.institucionCertificadora' => 'nullable |max:35',
		]);
	}
	public function ValidarPaso3()
	{
		$this->validate([
			'experiencia.*.inicioExperiencia' => 'nullable | date | before_or_equal:today',
			'experiencia.*.finExperiencia' => 'nullable | date | before_or_equal:today',
			'experiencia.*.puestoTrabajo' => 'nullable| max:35',
			'experiencia.*.lugarTrabajo' => 'nullable | max:35',
			'experiencia.*.descripcionLaboral' => 'nullable | max:35',
		]);
	}
	public function ValidarPaso4()
	{
		$this->validate([
			'formacion.*.anioInicioFormacion' => 'required | date | before_or_equal:today',
			'formacion.*.anioFinFormacion' => 'required | date | before_or_equal:today',
			'formacion.*.institucionFormacion' => 'required | max:35',
			'formacion.*.tituloObtenido' => 'required | max:35',
			'formacion.*.nivelFormacion' => 'required | max:35',
		]);
	} // fin de validación de cada paso del formulario
	public function ValidarPaso5()
	{
		$this->validate([
			'idiomas.*.idiomaId' => 'required | regex:/^[A-Za-z0-9\s]*$/|max:35',
			'idiomas.*.nivelIdioma' => 'required | regex:/^[A-Za-z0-9\s]*$/|max:35',
		]);
	} // fin de validación de cada paso del formulario
	//Función para validar las reglas, dependiendo del paso en el que esté el formulario
	public function siguientePaso()
	{
		if ($this->paso === 1) {
			$this->ValidarPaso1(); // Validar datos del paso 1

			if (count($this->certificaciones) == 0) {
				$this->addCertificacion();
			}
		} elseif ($this->paso === 2) {
			$this->ValidarPaso2(); // Validar datos del paso 2
			if (count($this->formacion) == 0) {
				$this->addFormacion();
			}
		} elseif ($this->paso === 3) {
			$this->ValidarPaso3(); // Validar datos del paso 3
			if (count($this->experiencia) == 0) {
				$this->addExperencia();
			}
		} elseif ($this->paso === 4) {
			$this->ValidarPaso4(); // Validar datos del paso 3
			if (count($this->idiomas) == 0) {
				$this->addIdiomas();
			}
		} elseif ($this->paso === 5) {
			$this->ValidarPaso5(); // Validar datos del paso 3
		}
		$this->paso++; //Se suma 1 al paso
	}

	public function pasoAnterior()
	{
		$this->paso--; //Para volver se resta 1 al paso
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
		$rules = array_merge($this->rules, $this->selected_id === null ? $this->rulesCreate : $this->rulesUpdate);
		$this->validate($rules);
		$estudiante = Estudiante::where('user_id', auth()->user()->id)->first();

		$cv = Cv::create([
			'direcionDomiciliar' => $this->direcionDomiciliar,
			'correoElectronico' => $this->correoElectronico,
			'telefonoCv' => $this->telefonoCv,
			'fotoCv' => 'storage/' . $this->fotoCv->store('fotografia', 'public'),
			'perfilProfesional' => $this->perfilProfesional,
			'habilidades' => $this->habilidades,
			'publicaciones' => is_null($this->publicaciones) ? 'Sin información' : $this->publicaciones,
			'intereses' => $this->intereses,
			'nombreRef1' => $this->nombreRef1,
			'telRef1' => $this->telRef1,
			'nombreRef2' => $this->nombreRef2,
			'telRef2' => $this->telRef2,
			'estudiante_id' => $estudiante->estudianteId,
		]);
		$guardarId = $cv->cvId;

		foreach ($this->certificaciones as $cert) {
			if (
				$cert['nombreCertificacion'] !== '' && $cert['anioCertificacion'] !== ''
				&& $cert['institucionCertificadora'] !== ''
			) {
				$cert['cv_id'] = $guardarId;
				Certificacion::create($cert);
			}
		}

		foreach ($this->experiencia as $exp) {
			if (
				$exp['inicioExperiencia'] !== '' && $exp['finExperiencia'] !== ''
				&& $exp['puestoTrabajo'] !== ''
				&& $exp['lugarTrabajo'] !== ''
				&& $exp['descripcionLaboral'] !== ''
			) {
				$exp['cv_id'] = $guardarId;
				Experiencia::create($exp);
			}
		}

		foreach ($this->formacion as $form) {
			if (
				$form['anioInicioFormacion'] !== '' && $form['anioFinFormacion'] !== ''
				&& $form['nivelFormacion'] !== ''
				&& $form['institucionFormacion'] !== ''
				&& $form['tituloObtenido'] !== ''
			) {
				$form['cv_id'] = $guardarId;
				Formacion::create($form);
			}
		}

		foreach ($this->idiomas as $idioma) {
			$idioma['cv_id'] = $guardarId;
			$idioma['idioma_id'] = $idioma['idiomaId'];
			Idiomacv::create($idioma);
		}

		$this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'CV generado correctamente!.');

	}


	public function edit($cvId)
	{
		$this->resetInput();
		$record = Cv::where('cvId', $cvId)->first();
		$this->selected_id = $cvId;
		$this->cvId = $record->cvId;
		$this->direcionDomiciliar = $record->direcionDomiciliar;
		$this->correoElectronico = $record->correoElectronico;
		$this->telefonoCv = $record->telefonoCv;
		$this->perfilProfesional = $record->perfilProfesional;
		$this->habilidades = $record->habilidades;
		$this->referencias = $record->referencias;
		$this->publicaciones = $record->publicaciones;
		$this->intereses = $record->intereses;
		$this->nombreRef1 = $record->nombreRef1;
		$this->telRef1 = $record->telRef1;
		$this->nombreRef2 = $record->nombreRef2;
		$this->telRef2 = $record->telRef2;
		$this->pathTempPhoto = $record->fotoCv;

		$certificaciones = Certificacion::where('cv_id', $cvId)->get();
		$experiencia = Experiencia::where('cv_id', $cvId)->get();
		$formacion = Formacion::where('cv_id', $cvId)->get();
		$idiomas = Idiomacv::where('cv_id', $cvId)->get();

		foreach ($certificaciones as $cert) {
			$this->certificaciones[] = [
				'certificacionId' => $cert->certificacionId,
				'institucionCertificadora' => $cert->institucionCertificadora,
				'anioCertificacion' => $cert->anioCertificacion,
				'nombreCertificacion' => $cert->nombreCertificacion,
				'cv_id' => $cvId,
			];
		}

		foreach ($experiencia as $exp) {
			$this->experiencia[] = [
				'experienciaId' => $exp->experienciaId,
				'inicioExperiencia' => $exp->inicioExperiencia,
				'finExperiencia' => $exp->finExperiencia,
				'puestoTrabajo' => $exp->puestoTrabajo,
				'lugarTrabajo' => $exp->lugarTrabajo,
				'descripcionLaboral' => $exp->descripcionLaboral,
				'cv_id' => $cvId,
			];
		}

		foreach ($formacion as $form) {
			$this->formacion[] = [
				'formacionId' => $form->formacionId,
				'anioInicioFormacion' => $form->anioInicioFormacion,
				'anioFinFormacion' => $form->anioFinFormacion,
				'nivelFormacion' => $form->nivelFormacion,
				'institucionFormacion' => $form->institucionFormacion,
				'tituloObtenido' => $form->tituloObtenido,
				'cv_id' => $cvId,
			];
		}

		foreach ($idiomas as $idioma) {
			$this->idiomas[] = [
				'idiomacvId' => $idioma->idiomacvId,
				'idiomaId' => $idioma->idioma_id,
				'nivelIdioma' => $idioma->nivelIdioma,
				'cv_id' => $cvId,
			];
		}
	}

	public function update()
	{
		$rules = array_merge($this->rules, $this->selected_id === null ? $this->rulesCreate : $this->rulesUpdate);
		$this->validate($rules);

		if ($this->fotoCv !== null) {
			Storage::disk('public')->delete($this->pathTempPhoto);
		}

		if ($this->selected_id) {
			$record = Cv::find($this->selected_id);
			$record->update([
				'direcionDomiciliar' => $this->direcionDomiciliar,
				'correoElectronico' => $this->correoElectronico,
				'telefonoCv' => $this->telefonoCv,
				'fotoCv' => $this->fotoCv === null ? $this->pathTempPhoto :
					('storage/' . $this->fotoCv->store('fotografia', 'public')),
				'perfilProfesional' => $this->perfilProfesional,
				'habilidades' => $this->habilidades,
				'referencias' => $this->referencias,
				'publicaciones' => $this->publicaciones,
				'intereses' => $this->intereses,
				'nombreRef1' => $this->nombreRef1,
				'telRef1' => $this->telRef1,
				'nombreRef2' => $this->nombreRef2,
				'telRef2' => $this->telRef2,
			]);



			foreach ($this->certificaciones as $cert) {

				if (array_key_exists('certificacionId', $cert)) {
					$record = Certificacion::find($cert['certificacionId']);
					$record->update([
						'cv_id' => $this->selected_id,
						'institucionCertificadora' => $cert['institucionCertificadora'],
						'anioCertificacion' => $cert['anioCertificacion'],
						'nombreCertificacion' => $cert['nombreCertificacion'],
					]);
				} else {
					if (
						$cert['nombreCertificacion'] !== '' && $cert['anioCertificacion'] !== ''
						&& $cert['institucionCertificadora'] !== ''
					) {
						$cert['cv_id'] = $this->selected_id;
						Certificacion::create($cert);
					}
				}
			}

			foreach ($this->experiencia as $exp) {

				if (array_key_exists('experienciaId', $exp)) {
					$record = Experiencia::find($exp['experienciaId']);
					$record->update([
						'cv_id' => $this->selected_id,
						'inicioExperiencia' => $exp['inicioExperiencia'],
						'finExperiencia' => $exp['finExperiencia'],
						'puestoTrabajo' => $exp['puestoTrabajo'],
						'lugarTrabajo' => $exp['lugarTrabajo'],
						'descripcionLaboral' => $exp['descripcionLaboral'],
					]);
				} else {
					if (
						$exp['inicioExperiencia'] !== '' && $exp['finExperiencia'] !== ''
						&& $exp['puestoTrabajo'] !== ''
						&& $exp['lugarTrabajo'] !== ''
						&& $exp['descripcionLaboral'] !== ''
					) {
						$exp['cv_id'] = $this->selected_id;
						Experiencia::create($exp);
					}
				}
			}

			foreach ($this->formacion as $form) {

				if (array_key_exists('formacionId', $form)) {
					$record = Formacion::find($form['formacionId']);
					$record->update([
						'cv_id' => $this->selected_id,
						'anioInicioFormacion' => $form['anioInicioFormacion'],
						'anioFinFormacion' => $form['anioFinFormacion'],
						'nivelFormacion' => $form['nivelFormacion'],
						'institucionFormacion' => $form['institucionFormacion'],
						'tituloObtenido' => $form['tituloObtenido'],
					]);
				} else {
					if (
						$form['anioInicioFormacion'] !== '' && $form['anioFinFormacion'] !== ''
						&& $form['nivelFormacion'] !== ''
						&& $form['institucionFormacion'] !== ''
						&& $form['tituloObtenido'] !== ''
					) {
						$form['cv_id'] = $this->selected_id;
						Formacion::create($form);
					}
				}
			}

			foreach ($this->idiomas as $idioma) {

				if (array_key_exists('idiomacvId', $idioma)) {
					$record = Idiomacv::find($idioma['idiomacvId']);
					$record->update([
						'cv_id' => $this->selected_id,
						'idioma_id' => $idioma['idiomaId'],
						'nivelIdioma' => $idioma['nivelIdioma'],
					]);
				} else {
					$idioma['cv_id'] = $this->selected_id;
					$idioma['idioma_id'] = $idioma['idiomaId'];
					Idiomacv::create($idioma);
				}
			}

			$this->resetInput();
			$this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Cv actualizado correctamente.');
		}
	}

    public function eliminar($cvId)
	{
		$this->selected_id = $cvId;
		$this->dispatchBrowserEvent('showDeleteConfirmationModal');
	}

    public function destroy()
    {
        if ($this->selected_id) {
			Cv::where('cvId', $this->selected_id)->delete();
		}
	
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'CV Eliminado.');
    }


	public function addCertificacion()
	{
		$this->certificaciones[] = ['nombreCertificacion' => '', 'anioCertificacion' => '', 'institucionCertificadora' => ''];
	}

	public function removeCertificacion($indice)
	{
		if (array_key_exists('certificacionId', $this->certificaciones[$indice])) {
			$record = Certificacion::findOrFail($this->certificaciones[$indice]['certificacionId']);
			if ($record) {
				$record->delete();
				session()->flash('message', 'Se ha eliminado la certificación correctamente!');
			}
		}
		unset($this->certificaciones[$indice]);
		$this->certificaciones = array_values($this->certificaciones);
	}
	public function addExperencia()
	{
		$this->experiencia[] = [
			'inicioExperiencia' => '',
			'finExperiencia' => '',
			'puestoTrabajo' => '',
			'lugarTrabajo' => '',
			'descripcionLaboral' => ''
		];
	}

	public function removeExperencia($indice)
	{
		if (array_key_exists('experienciaId', $this->experiencia[$indice])) {
			$record = Experiencia::findOrFail($this->experiencia[$indice]['experienciaId']);
			if ($record) {
				$record->delete();
				session()->flash('message', 'Se ha eliminado la experiencia correctamente!');
			}
		}
		unset($this->experiencia[$indice]);
		$this->experiencia = array_values($this->experiencia);
	}
	public function addIdiomas()
	{
		$this->idiomas[] = ['nivelIdioma' => 'Basico', 'idiomaId' => $this->idiomasTable[0]->idiomaId];
	}

	public function removeIdiomas($indice)
	{
		if (array_key_exists('idiomacvId', $this->idiomas[$indice])) {
			$record = Idiomacv::findOrFail($this->idiomas[$indice]['idiomacvId']);
			if ($record) {
				$record->delete();
				session()->flash('message', 'Se ha eliminado el idioma correctamente!');
			}
		}
		unset($this->idiomas[$indice]);
		$this->idiomas = array_values($this->idiomas);
	}
	public function addFormacion()
	{
		$this->formacion[] = [
			'anioInicioFormacion' => '',
			'anioFinFormacion' => '',
			'nivelFormacion' => '',
			'institucionFormacion' => ''
		];
	}

	public function removeFormacion($indice)
	{
		if (array_key_exists('formacionId', $this->formacion[$indice])) {
			$record = Formacion::findOrFail($this->formacion[$indice]['formacionId']);
			if ($record) {
				$record->delete();
				session()->flash('message', 'Se ha eliminado la formación correctamente!');
			}
		}
		unset($this->formacion[$indice]);
		$this->formacion = array_values($this->formacion);
	}

	public function downloadCV()
	{
		
		// Obtiene el ID del usuario autenticado
		$userID = auth()->user()->id;

		$estudiante = Estudiante::where('user_id', $userID)->first();
		$cv = Cv::where('estudiante_id', $estudiante->estudianteId)->orderBy('created_at', 'desc')->first();
		$formacion = Formacion::where('cv_id', $cv->cvId)->get();
		$experiencias = Experiencia::where('cv_id', $cv->cvId)->orderBy('finExperiencia', 'desc')->get();
		$certificaciones = Certificacion::where('cv_id', $cv->cvId)->orderBy('anioCertificacion', 'desc')->get();
		$municipio = Municipio::where('municipioId', $estudiante->municipio_id)->first();
		$departamento = Departamento::where('departamentoId', $municipio->departamento_id)->first();

		$queryIdiomas = "SELECT
							*
						FROM
							idiomacvs icv
							LEFT JOIN idiomas i ON icv.idioma_id = i.idiomaId
						WHERE
							cv_id = $cv->cvId;";

		$idiomas = DB::select($queryIdiomas);

		if ($estudiante && $cv) {

			$data = [
				'titulo' => '',
				'nombres' => $estudiante->nombre . " " . $estudiante->apellidos,
				'estudiante' => $estudiante,
				'perfilProfesional' => $cv->perfilProfesional,
				'direcionDomiciliar' => $cv->direcionDomiciliar,
				'ref1' => $cv->nombreRef1,
				'tel1' => $cv->telRef1,
				'ref2' => $cv->nombreRef2,
				'tel2' => $cv->telRef2,
				'intereses' => $cv->intereses,
				'publicaciones' => $cv->publicaciones,
				'habilidades' => $cv->habilidades,
				'correo' => $cv->correoElectronico,
				'experiencias' => $experiencias,
				'certificaciones' => $certificaciones,
				'formacions' => $formacion,
				'departamento' => $departamento,
				'municipio' => $municipio,
				'idiomas' => $idiomas,
				'imagen' => public_path($cv->fotoCv),
				'map' => public_path('assets/icons8-google-maps.svg'),
				'mobile' => public_path('assets/icons8-phone-white.svg'),
				'email' => public_path('assets/icons8-telegram.svg'),
			];

			$pdf = PDF::loadView('pdf', $data);

			$cvPath = 'pdf/cv.pdf'; // Ruta relativa al directorio storage/app/public

			Storage::disk('public')->put($cvPath, $pdf->output());

			$filePath = storage_path('app/public/' . $cvPath);

			session()->flash('message', 'CV generado correctamente!.');

			return response()->download($filePath, 'cv.pdf');
		}

	}
}