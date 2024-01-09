<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Estudiante;
use App\Models\User;
use App\Models\Carrera;
use App\Models\Facultad;
use App\Models\Municipio;
use App\Models\Departamento;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Estudiantes extends Component
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

	public function render()
    {
        $facultades = Facultad::all();
        $carreras = Carrera::where('facultad_id', $this->facultad_id)->get();
        $departamentos = Departamento::all();
        $municipios = Municipio::where('departamento_id', $this->departamento_id)->get();
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.estudiantes.view', [
            'estudiantes' => Estudiante::with('Municipio')
                ->orWhere('nombre', 'LIKE', $keyWord)
                ->orWhere('apellidos', 'LIKE', $keyWord)
                ->orWhere('carnet', 'LIKE', $keyWord)
                ->orWhere('DPI', 'LIKE', $keyWord)
                ->orWhere('correo', 'LIKE', $keyWord)
                ->orWhere('numero_personal', 'LIKE', $keyWord)
                ->orWhere('numero_domiciliar', 'LIKE', $keyWord)
                ->orWhere('curriculum', 'LIKE', $keyWord)
                ->orWhereHas('municipio', function ($query) use ($keyWord) {
                    $query->where('nombreMunicipio', 'LIKE', $keyWord);
                    if ($this->departamento_id) {
                        $query->where('departamento_id', $this->departamento_id);
                    }
                })
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
            'municipios' => $municipios,
            'departamentos' => $departamentos,
        ]);
    }

    public function store()
    {

        if (Auth::check()) {
            // Obtiene el ID del usuario autenticado
            $userID = Auth::id();

            // Ahora puedes usar $userID como el ID del usuario en tu lógica
            // dd("Ahora puedes usar $userID como el ID del usuario en tu lógica");
            $this->validate();

            Estudiante::create([
                'nombre' => $this->nombre,
                'apellidos' => $this->apellidos,
                'carnet' => $this->carnet,
                'DPI' => $this->DPI,
                'correo' => $this->correo,
                'numero_personal' => $this->numero_personal,
                'numero_domiciliar' => $this->numero_domiciliar,
                'curriculum' => 'storage/'.$this-> curriculum->store('cvs','public'),
                'municipio_id' => $this->municipio_id,
                'carrera_id' => $this->carrera_id,
                'user_id' => $userID,
            ]);

            $this->resetInput();
            session()->flash('message', 'Perfil creado exitosamente.');
            return redirect()->route('ofertasestudiantes');
        } else {
            dd("No hay un usuario autenticado");
        }
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
        'curriculum' => 'mimes:pdf',
        'carrera_id' => 'required',
        'municipio_id' => 'required',
        'departamento_id' => 'required',
        'facultad_id' => 'required',
    ];

    public function updated($propertyEstudiante)
    {
        $this->validateOnly($propertyEstudiante);
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
	
		// $this->departamentos = $record->departamento_id;
		$this->municipio_id = $record-> municipio_id;
		$this->carrera_id = $record-> carrera_id;
		$this->user_id = $record-> user_id;
    }
    public function update()
    {
        $this->validate([
			'nombre' => 'required|regex:/^[\pL\s]+$/u|max:30',
			'apellidos' => 'required|regex:/^[\pL\s]+$/u|max:30',
			'carnet' => 'required|integer',
			'DPI' => 'required|size:13',
			'correo' => 'required|email|ends_with:@gmail.com',
			'numero_personal' => 'required | size:8',
			'numero_domiciliar' => 'required |size:8',
		
			'municipio_id' => 'required',
			'carrera_id' => 'required',
			'user_id' => 'required',
		]);if ($this->selected_id) {
            $record = Estudiante::find($this->selected_id);
            $record->update([ 
            'nombre' => $this-> nombre,
            'apellidos' => $this-> apellidos,
            'carnet' => $this-> carnet,
            'DPI' => $this-> DPI,
            'correo' => $this-> correo,
            'numero_personal' => $this-> numero_personal,
            'numero_domiciliar' => $this-> numero_domiciliar,
            'municipio_id' => $this-> municipio_id,
            'carrera_id' => $this-> carrera_id,
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Estudiante actualizado correctamente.');
        };
    }
    public function updatedFacultadId()
    {
        // Actualizar las carreras cuando cambie la facultad seleccionada
        $this->carrera_id = null; // Restablecer el valor de la carrera
    }
    public function updatedDepartametoId()
    {
        // Actualizar las carreras cuando cambie la facultad seleccionada
        $this->municipio_id = null; // Restablecer el valor de la carrera
    }


	public function edit2($estudianteId)
    {
        $this->record2 = Estudiante::where('estudianteId', $estudianteId)->first();
    }

	//Método de eliminación
	public function destroy()
    {
        if ($this->record2) {
			$userId = $this->record2->user_id;

            Estudiante::where('estudianteId', $this->record2->estudianteId)->delete();

			User::where('id', $userId)->delete();
			session()->flash('message', 'Estudiante eliminado correctamente');
        }
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
		$this->nombre_municipio = $record-> municipio->nombreMunicipio;
		$this->nombre_carrera = $record-> carrera->Ncarrera;
        $this->nombre_facultad = $record-> carrera->facultad->Nfacultad;
        $this->nombre_departamento= $record-> municipio->departamento->nombreDepartamento;
        $this->departamento_id= $record-> municipio->departamento->departamentoId;
	}
}
