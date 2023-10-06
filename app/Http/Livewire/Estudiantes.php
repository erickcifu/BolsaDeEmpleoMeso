<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Estudiante;
use App\Models\Carrera;
use App\Models\Facultad;
use App\Models\Municipio;
use App\Models\Departamento;
use Livewire\WithFileUploads;

class Estudiantes extends Component
{
	use WithPagination;
	use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $apellidos, $carnet, $DPI, $correo, $numero_personal, $numero_domiciliar, $curriculum, $municipio_id, $carrera_id, $user_id;
	public $departamento=null, $municipio=null;
	public $departamentos=null, $municipios=null; 
	
	public $carrera;
	public $facultad_id;

	

    public function render()
    {	

		$keyWord = '%'.$this->keyWord .'%';
		$facultades = Facultad::all();
		$carreras = Carrera::where('facultad_id', $this->facultad_id)->get();
        return view('livewire.estudiantes.view', [
            'estudiantes' => Estudiante::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('apellidos', 'LIKE', $keyWord)
						->orWhere('carnet', 'LIKE', $keyWord)
						->orWhere('DPI', 'LIKE', $keyWord)
						->orWhere('correo', 'LIKE', $keyWord)
						->orWhere('numero_personal', 'LIKE', $keyWord)
						->orWhere('numero_domiciliar', 'LIKE', $keyWord)
						->orWhere('curriculum', 'LIKE', $keyWord)
						->orWhere('municipio_id', 'LIKE', $keyWord)
						->orWhereHas('carrera', function ($query) use ($keyWord) {
							$query->where('Ncarrera', 'LIKE', $keyWord);
							if ($this->facultad_id) {
								$query->where('facultad_id', $this->facultad_id);
							}
						})
						->orWhere('user_id', 'LIKE', $keyWord)
						->paginate(10),
						'carreras' => $carreras,
						'facultades' => $facultades,
						'Departamentos'=>Departamento::all()
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->nombre = null;
		$this->apellidos = null;
		$this->carnet = null;
		$this->DPI = null;
		$this->correo = null;
		$this->numero_personal = null;
		$this->numero_domiciliar = null;
		$this->curriculum = null;
		$this->municipio_id = null;
		$this->carrera_id = null;
		$this->user_id = null;
    }
	protected $rules = [
		'nombre' => 'required|regex:/^[\pL\s]+$/u|max:30',
		'apellidos' => 'required|regex:/^[\pL\s]+$/u|max:30',
		'carnet' => 'required|integer',
		'DPI' => 'required|size:13',
		'correo' => 'required|email|ends_with:@gmail.com',
		'numero_personal' => 'required | size:8',
		'numero_domiciliar' => 'required |size:8',
		'curriculum' => 'required | mimes:pdf',
		'municipio_id' => 'required',
		'carrera_id' => 'required',
		'user_id' => 'required',
	];

	public function updateddepartamento($departamento_id)
	{
	  $municipios=Municipio::join('departamentos','municipios.departamento_id','=','departamentos.departamentoId')
									->where('departamentos.departamentoId',$departamento_id)->get();
	   $this->municipios=$municipios;
	}

	public function updatedFacultad($facultad_id)
	{
		$carreras = Carrera::join('facultads', 'carreras.facultad_id', '=', 'facultads.id')
							->where('facultads.id', $facultad_id)->get();
		$this->carrera = $carreras;
	}
	
	public function updated($propertyEstudiante){
        $this->validateOnly($propertyEstudiante);
    }


    public function store()
    {
        $this->validate();

        Estudiante::create([ 
			'nombre' => $this-> nombre,
			'apellidos' => $this-> apellidos,
			'carnet' => $this-> carnet,
			'DPI' => $this-> DPI,
			'correo' => $this-> correo,
			'numero_personal' => $this-> numero_personal,
			'numero_domiciliar' => $this-> numero_domiciliar,
			'curriculum' => 'storage/'.$this-> curriculum->store('curriculums','public'),
			'municipio_id' => $this-> municipio_id,
			'carrera_id' => $this-> carrera_id,
			'user_id' => $this-> user_id
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Estudiante creado exitosamente.');
    }

    public function edit($estudianteId)
    {
        $record = Estudiante::findOrFail($estudianteId);
        $this->selected_id = $estudianteId; 
		$this->nombre = $record-> nombre;
		$this->apellidos = $record-> apellidos;
		$this->carnet = $record-> carnet;
		$this->DPI = $record-> DPI;
		$this->correo = $record-> correo;
		$this->numero_personal = $record-> numero_personal;
		$this->numero_domiciliar = $record-> numero_domiciliar;
		$this->curriculum = $record-> curriculum;
		$this->municipio_id = $record-> municipio_id;
		$this->carrera_id = $record-> carrera_id;
		$this->user_id = $record-> user_id;
    }

    public function update()
    {
        $this->validate();

        if ($this->selected_id) {
			$record = Estudiante::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'apellidos' => $this-> apellidos,
			'carnet' => $this-> carnet,
			'DPI' => $this-> DPI,
			'correo' => $this-> correo,
			'numero_personal' => $this-> numero_personal,
			'numero_domiciliar' => $this-> numero_domiciliar,
			'curriculum' =>'storage/'. $this-> curriculum->store('curriculum','public'),
			'municipio_id' => $this-> municipio_id,
			'carrera_id' => $this-> carrera_id,
			'user_id' => $this-> user_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Estudiante Successfully updated.');
        }
    }

	public function eliminar($estudianteId)
	{
		$this->selected_id = $estudianteId;
		$this->dispatchBrowserEvent('showDeleteConfirmationModal');
	}
	
	public function destroy()
	{
		if ($this->selected_id) {
			Estudiante::where('estudianteId', $this->selected_id)->delete();
		}
	
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Estudiante Eliminado.');
	}

	 public function view($estudianteId)
	 {
        $record = Estudiante::findOrFail($estudianteId);
        $this->selected_id = $estudianteId; 
		$this->nombre = $record-> nombre;
		$this->apellidos = $record-> apellidos;
		$this->carnet = $record-> carnet;
		$this->DPI = $record-> DPI;
		$this->correo = $record-> correo;
		$this->numero_personal = $record-> numero_personal;
		$this->numero_domiciliar = $record-> numero_domiciliar;
		$this->curriculum = $record-> curriculum;
		$this->municipio_id = $record-> municipio_id;
		$this->carrera_id = $record-> carrera_id;
		$this->user_id = $record-> user_id;
	 }
}