<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Estudiante;
use App\Models\Carrera;
use App\Models\Facultad;
use App\Models\Municipio;
use App\Models\Departamento;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\UploadedFile;
use DB;

class Registro extends Component
{
    public $carrera;
    public $facultad_id;
    public $municipio;
    public $departamento_id;
    public $nuevoNombre=null;
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $apellidos, $carnet, $DPI, $correo, $numero_personal, $numero_domiciliar, $curriculum, $municipio_id, $carrera_id, $user_id;
    public function render()
    {
        $facultades = Facultad::all();
        $carreras = Carrera::where('facultad_id', $this->facultad_id)->get();
        $departamentos = Departamento::all();
        $municipios = Municipio::where('departamento_id', $this->departamento_id)->get();
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.registro.view', [
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
    public function updatingKeyWord(){
        $this->resetPage();
    }
    public function store()
    {

        if (Auth::check()) {
            // Obtiene el ID del usuario autenticado
            $userID = Auth::id();

            // Ahora puedes usar $userID como el ID del usuario en tu lógica
            // dd("Ahora puedes usar $userID como el ID del usuario en tu lógica");
            $this->validate();
            // $nombreDocumento = $this->curriculum->getClientOriginalName();
            if ($this->curriculum!=null) {
                $this->nuevoNombre = uniqid() . '.' . $this->curriculum->getClientOriginalExtension();
			    $this->curriculum->storeAs('public/cvs', $this->nuevoNombre, 'local');
            }
            Estudiante::create([
                'nombre' => $this->nombre,
                'apellidos' => $this->apellidos,
                'carnet' => $this->carnet,
                'DPI' => $this->DPI,
                'correo' => $this->correo,
                'numero_personal' => $this->numero_personal,
                'numero_domiciliar' => $this->numero_domiciliar,
                'curriculum' => $this->nuevoNombre,//Verificar si $this->curriculum tiene algun proceso
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
        'carnet' => 'required|size:9',
        'DPI' => 'required|size:13',
        'correo' => 'required|email',
        'numero_personal' => 'required | size:8',
        'numero_domiciliar' => 'required |size:8',
        'curriculum' => 'sometimes|nullable|mimes:pdf|max:30720',
        'carrera_id' => 'required',
        'municipio_id' => 'required',
        'departamento_id' => 'required',
        'facultad_id' => 'required',
    ];

    public function updated($propertyEstudiante)
    {
        $this->validateOnly($propertyEstudiante);
    }

    protected $messages = [
        'curriculum.mimes' => 'El currículum debe ser un archivo PDF.',
        'curriculum.max' => 'El tamaño máximo permitido para el currículum es 30 KB.',
    ];

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
}
