<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Estudiante;
use App\Models\User;
use App\Models\Carrera;
use App\Models\Facultad;
use App\Models\Municipio;
use App\Models\Departamento;
use App\Models\Cartarecomendacion;
use App\Models\AutoridadAcademica;

use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Estudiantes1 extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $apellidos, $carnet, $DPI, $correo, $numero_personal, $numero_domiciliar, $curriculum, $municipio_id, $carrera_id, $user_id;
    public $record2; 
	public $nombre_municipio, $nombre_carrera, $nombre_facultad, $nombre_departamento;
    public $carrera;
    public $facultad_id;
    public $municipio;
    public $departamento_id;
    public $id_estu;
    public $autoridad, $user;
    public $id_autoridad;

    // campos para la Carta

    public $fechaCarta, $cargoYTareasRealizadas, $telefonoAutoridad, $firmaAutoridad, $autoridadAcademica_id, $estudiante_id;

	public function mount()
    {
        $this->fechaCarta = Carbon::now()->toDate()->format('Y-m-d');	
    }
    
    public function render()
    {
        $facultades = Facultad::all();
        $userID = Auth::id();
       $carreras = Carrera::where('facultad_id', $this->facultad_id)->get();
       $this->autoridad=AutoridadAcademica::where('user_id',$userID)->first();
        $departamentos = Departamento::all();
        $municipios = Municipio::where('departamento_id', $this->departamento_id)->get();
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.estudiantes1.view', [
            'estudiantes' => Estudiante::orWhere('nombre', 'LIKE', $keyWord)
            ->orWhere('apellidos', 'LIKE', $keyWord)
            ->orWhere('carnet', 'LIKE', $keyWord)
            ->orWhere('DPI', 'LIKE', $keyWord)
            ->join('carreras','carreras.id','=','estudiantes.carrera_id')
            -> join('facultads','facultads.id','=','carreras.facultad_id')
            -> join('autoridadacademicas','facultads.id','=','autoridadacademicas.facultad_id')
            -> where('autoridadacademicas.user_id',$userID)
         
            ->paginate(10),
            'carreras' => $carreras,
            'facultades' => $facultades,
            'municipios' => $municipios,
            'departamentos' => $departamentos,
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->fechaCarta = null;
		$this->cargoYTareasRealizadas = null;
		$this->telefonoAutoridad = null;
		$this->firmaAutoridad = null;
		$this->autoridadAcademica_id = null;
		$this->estudiante_id = null;
    }

    protected $rules = [
        'fechaCarta' => 'date',
        'cargoYTareasRealizadas' => 'required|regex:/^[\pL\s\-]+$/u',
		'telefonoAutoridad' => 'required|size:8',
		'firmaAutoridad' => 'required|mimes:jpeg,png,jpg,gif',
    ];

    public function updated($propertyCartarecomendacion){  
        $this->validateOnly($propertyCartarecomendacion);
    }

    protected $messages = [
        'fechaCarta.required' => 'Este campo no puede estar vacío.',
        'facultad_id' => 'Este campo debe ser una fecha',

		'cargoYTareasRealizadas.required' => 'Este campo no puede estar vacío.',
        'cargoYTareasRealizadas' => 'Este campo no acepta caracteres especiales.',

		'telefonoAutoridad.required' => 'Este campo no puede estar vacío.',
        'telefonoAutoridad' => 'El número de teléfono debe contener 8 dígitos.',

		'firmaAutoridad.required' => 'Este campo no puede estar vacío.',
        'firmaAutoridad' => 'Este campo únicamente acepta archivos: jpeg, png, jpg, gif.',

	];

    //FUNCION PARA OBETNER EL ID DE  ESTUDIANTE
    public function setEstudianteId($estudianteId)
    {
        $this->id_estu = $estudianteId;
    }
    
    //FUNCION PARA CREAR La carta
    public function newCarta()
    {
        /// Validar los campos utilizando las reglas definidas en $rules
        $this->validate();

        
            Cartarecomendacion::create([ 
                'fechaCarta' => $this->fechaCarta,
                'cargoYTareasRealizadas' => $this->cargoYTareasRealizadas,
                'telefonoAutoridad' => $this->telefonoAutoridad,
                'firmaAutoridad' => 'storage/' . $this->firmaAutoridad->store('firmas', 'public'),
                'autoridadAcademica_id' => $this->autoridad->autoridadId,   
                'estudiante_id' => $this->id_estu,
            ]);
            // Emitir un evento para cerrar el modal desde el navegador
            $this->dispatchBrowserEvent('closeModal');
            $this->resetInput();
            // Mostrar un mensaje de éxito
            $this->dispatchBrowserEvent('cartaCreatedSuccessfully');
            session()->flash('message', 'Carta generada correctamente!');
        
    }
}
