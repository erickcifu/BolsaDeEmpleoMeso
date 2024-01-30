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
use Illuminate\Http\UploadedFile;
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
    public $showModal = false;
    public $tieneCarta;
    public $pathTempPhoto;
    public $iteration = 0;
    public $atributos = [];



    // campos para la Carta

    public $fechaCarta, $cargoYTareasRealizadas, $telefonoAutoridad, $firmaAutoridad, $autoridadAcademica_id, $estudiante_id;
    public $newFirma;
	public function mount()
    {

        $this->fechaCarta = Carbon::now()->toDate()->format('Y-m-d');
        $this->tieneCarta = Estudiante::with('cartarecomendacions')->get();
        echo $fechaCarta->format('F'); 
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
        $estudiantes = Estudiante::where(function ($query) use ($keyWord) {
            $query->orWhere('nombre', 'LIKE', $keyWord)
                ->orWhere('apellidos', 'LIKE', $keyWord)
                ->orWhere('carnet', 'LIKE', $keyWord)
                ->orWhere('DPI', 'LIKE', $keyWord);
        })
        ->join('carreras', 'carreras.id', '=', 'estudiantes.carrera_id')
        ->join('facultads', 'facultads.id', '=', 'carreras.facultad_id')
        ->join('autoridadacademicas', 'facultads.id', '=', 'autoridadacademicas.facultad_id')
        ->where('autoridadacademicas.user_id', $userID)
        ->distinct()
        ->paginate(10);
        
        return view('livewire.estudiantes1.view', [
            'estudiantes' => $estudiantes,
            'carreras' => $carreras,
            'facultades' => $facultades,
            'municipios' => $municipios,
            'departamentos' => $departamentos,
        ]);
    }
    public function updatingKeyWord(){
        $this->resetPage();
    }
    public function cancel()
    {
        $this->resetInput();
        return redirect('estudiantes1');
    }
	
    private function resetInput()
    {		
		$this->fechaCarta = null;
		$this->cargoYTareasRealizadas = null;
		$this->telefonoAutoridad = null;
		$this->firmaAutoridad = null;
		$this->autoridadAcademica_id = null;
		$this->estudiante_id = null;
        $this->iteration++;
    }

    protected $rules = [
        'fechaCarta' => 'date',
        'cargoYTareasRealizadas' => 'required|regex:/^[\pL\s\-,;:.]+$/u|max:300',
		'telefonoAutoridad' => 'required|size:8',
    ];
    protected $rulesCreate = ['firmaAutoridad' => 'mimes:jpeg,png,jpg,gif|max:200'];
	protected $rulesUpdate = ['firmaAutoridad' => 'nullable'];
    public function updated($propertyCartarecomendacion){  
        $this->validateOnly($propertyCartarecomendacion);
    }

    protected $messages = [
        'fechaCarta.required' => 'Este campo no puede estar vacío.',
        'fechaCarta.date' => 'Este campo debe ser una fecha válida.',
        'cargoYTareasRealizadas.required' => 'Este campo no puede estar vacío.',
        'cargoYTareasRealizadas.regex' => 'Este campo no acepta caracteres especiales. El máximo de caracteres es de 300.',
        'telefonoAutoridad.required' => 'Este campo no puede estar vacío.',
        'telefonoAutoridad.size' => 'El número de teléfono debe contener 8 dígitos.',
    ];

    //FUNCION PARA OBETNER EL ID DE  ESTUDIANTE
    public function setEstudianteId($estudianteId)
    {
        $this->id_estu = $estudianteId;

        $this->atributos = Estudiante::find($estudianteId);

        if ($this->atributos) {
            $this->nombre = $this->atributos->nombre ?? '';
            $this->apellidos = $this->atributos->apellidos ?? '';
            $this->carnet = $this->atributos->carnet ?? '';
            $this->DPI = $this->atributos->DPI ?? '';
        } else {
            $this->nombre = '';
            $this->apellidos = '';
            $this->carnet = '';
            $this->DPI = '';
        }
    }
    
    public function process()
	{
		if ($this->selected_id === null) {
			$this->newCarta();
		} else {
			$this->editCarta();
		}
	}

    //FUNCION PARA CREAR La carta
    public function newCarta()
    {
        /// Validar los campos utilizando las reglas definidas en $rules
        $rules = array_merge($this->rules, $this->selected_id === null ? $this->rulesCreate : $this->rulesUpdate);
		$this->validate($rules);

        if ($this->firmaAutoridad!=null) {
			$this->newFirma = uniqid() . '.' . $this->firmaAutoridad->getClientOriginalExtension();
			$this->firmaAutoridad->storeAs('public/firmas', $this->newFirma, 'local');
		}

        Cartarecomendacion::create([ 
            'fechaCarta' => $this->fechaCarta,
            'cargoYTareasRealizadas' => $this->cargoYTareasRealizadas,
            'telefonoAutoridad' => $this->telefonoAutoridad,
            'firmaAutoridad' => $this->newFirma,
            'autoridadAcademica_id' => $this->autoridad->autoridadId,   
            'estudiante_id' => $this->id_estu,
        ]);
            
        $this->dispatchBrowserEvent('closeModal');
        $this->resetInput();
        // Mostrar un mensaje de éxito
        session()->flash('message', 'Carta generada correctamente!');
        return redirect('estudiantes1');
    }

    public function obtenerEstudianteId($estudianteId)
    {
        $this->resetInput();
        $this->id_estu = $estudianteId;
        // Encuentra la carta asociada al estudiante
        $carta = Cartarecomendacion::where('estudiante_id', $estudianteId)->first();
        if ($carta) {
            $this->selected_id = $estudianteId;
            // Llena los campos del formulario con los valores de la carta existente
            $this->fechaCarta = $carta->fechaCarta;
            $this->cargoYTareasRealizadas = $carta->cargoYTareasRealizadas;
            $this->telefonoAutoridad = $carta->telefonoAutoridad;
            // Asegúrate de cargar la firma existente si ya existe
            $this->pathTempPhoto = $carta->firmaAutoridad;
        }

        
        $this->atributos = Estudiante::find($estudianteId);

        if ($this->atributos) {
            $this->nombre = $this->atributos->nombre ?? '';
            $this->apellidos = $this->atributos->apellidos ?? '';
            $this->carnet = $this->atributos->carnet ?? '';
            $this->DPI = $this->atributos->DPI ?? '';
        } else {
            $this->nombre = '';
            $this->apellidos = '';
            $this->carnet = '';
            $this->DPI = '';
        }
    
    }


    //Editar carta
    public function editCarta()
    {
        // Validar los campos utilizando las reglas definidas en $rules
        $rules = array_merge($this->rules, $this->selected_id === null ? $this->rulesCreate : $this->rulesUpdate);
		$this->validate($rules);

        if ($this->firmaAutoridad !== null) {
			Storage::disk('public')->delete($this->pathTempPhoto);
		}

        // Encuentra la carta asociada al estudiante
        $carta = Cartarecomendacion::where('estudiante_id', $this->id_estu)->first();

        if ($carta) {
            // Si existe, actualiza los campos de la carta existente
            $carta->update([
                'fechaCarta' => now(),
                'cargoYTareasRealizadas' => $this->cargoYTareasRealizadas,
                'telefonoAutoridad' => $this->telefonoAutoridad,
                // Actualizar la firma solo si se proporciona una nueva
                'firmaAutoridad' => $this->firmaAutoridad === null ? $this->pathTempPhoto :
					('storage/' . $this->firmaAutoridad->store('firmas', 'public')),
            ]);
        }
            // Emitir un evento para cerrar el modal desde el navegador
            $this->dispatchBrowserEvent('closeModal');
            $this->resetInput();
            session()->flash('message', 'Carta actualizada correctamente!');
            return redirect('estudiantes1');
        
    }
}
