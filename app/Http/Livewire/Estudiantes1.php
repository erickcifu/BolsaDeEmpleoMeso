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
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Estudiantes1 extends Component
{
    public $carrera;
    public $facultad_id;
    public $municipio;
    public $departamento_id;
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $apellidos, $carnet, $DPI, $correo, $numero_personal, $numero_domiciliar, $curriculum, $municipio_id, $carrera_id, $user_id;
    public $record2; 
	public $nombre_municipio, $nombre_carrera, $nombre_facultad, $nombre_departamento;
    public $id_estu;
    public $autoridad;
    public $id_autoridad;
    public $fechaCartas;

    // campos para la Carta

    public $fechaCarta, $cargoYTareasRealizadas, $telefonoAutoridad, $firmaAutoridad, $autoridadAcademica_id, $estudiante_id;

	public function mount()
    {
        $this->fechaCartas = Carbon::now()->toDate()->format('Y-m-d');
		
    }
    
    public function render()
    {
        $facultades = Facultad::all();
        $userID = Auth::id();
       $carreras = Carrera::where('facultad_id', $this->facultad_id)->get();
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

   


    
     //FUNCION PARA OBETNER EL ID DE  ESTUDIANTE

    public function setEstudianteId($estudianteId)
    {
        $this->id_estu = $estudianteId;
    }
    
       //FUNCION PARA CREAR La carta

    public function newCarta()
    {
        $userID = Auth::id();
        $this->autoridad=AutoridadAcademica::where('user_id',$userID)->first();
      

        $this->validate([
       
		'cargoYTareasRealizadas' => 'required|regex:/^[\pL\s\-]+$/u',
		'telefonoAutoridad' => 'required|size:8',
		'firmaAutoridad' => 'required|mimes:jpeg,png,jpg,gif',
            ]);
        
       
  

        Cartarecomendacion::create([ 
			
			'fechaCarta' =>   $this->fechaCartas,
            'cargoYTareasRealizadas' => $this-> cargoYTareasRealizadas,
            'telefonoAutoridad' => $this-> telefonoAutoridad,
            'firmaAutoridad' => 'storage/' . $this-> firmaAutoridad->store('firmas','public'),
            'autoridadAcademica_id' =>    $this->autoridad->autoridadId,   
            'estudiante_id' =>   $this->id_estu,
        ]);
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Se genero la carta recomendacion');
    }
  
	
	}
