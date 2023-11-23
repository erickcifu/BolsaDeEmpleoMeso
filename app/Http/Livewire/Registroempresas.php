<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Empresa;
use App\Models\Municipio;
use App\Models\Departamento;
use Livewire\WithFileUploads;
use App\Mail\AltaEmpresa;
use App\Mail\ActualizaEmpresa;
use Illuminate\Support\Facades\Mail;

class Registroempresas extends Component
{

    use WithPagination;
	use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $empresaId, $logo, $nombreEmpresa, $nit, $rtu, $patenteComercio, $descripcionEmpresa, $telefonoEmpresa, $correoEmpresa, $direccionEmpresa, $encargadoEmpresa, $telefonoEncargado, $estadoEmpresa, $estadoSolicitud, $user_id, $residencia_id;
    public $departamento=null, $municipio=null;
	public $departamentos=null, $municipios=null; 
    public function render()
    {
        return view('livewire.registroempresas.view', ['Departamentos'=>Departamento::all()]);
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->logo = null;
        $this->nombreEmpresa = null;
        $this->nit = null;
        $this->rtu = null;
        $this->patenteComercio = null;
        $this->descripcionEmpresa = null;
        $this->telefonoEmpresa = null;
        $this->correoEmpresa = null;
        $this->direccionEmpresa = null;
        $this->encargadoEmpresa = null;
        $this->telefonoEncargado = null;
        $this->estadoEmpresa = null;
        $this->estadoSolicitud = null;
        $this->user_id = null;
        $this->residencia_id = null;
    }

    protected $rules = [
        'logo' => 'required|mimes:jpeg,png,jpg,gif',
        'nombreEmpresa' => 'required',
        'nit' => 'required|size:9',
        'rtu' => 'required|mimes:pdf',
        'patenteComercio' => 'required|mimes:pdf',
        'descripcionEmpresa' => 'required',
        'telefonoEmpresa' => 'required|size:8',
        'correoEmpresa' => 'required|email',
        'direccionEmpresa' => 'required',
        'encargadoEmpresa' => 'required|regex:/^[\pL\s\-]+$/u',
        'telefonoEncargado' => 'required|size:8',
        'residencia_id' => 'required',
        'departamento' => 'required',

    ];
    //funcion para hacer la consulta de
    public function updateddepartamento($departamento_id)
    {
        $municipios = Municipio::join('departamentos', 'municipios.departamento_id', '=', 'departamentos.departamentoId')
            ->where('departamentos.departamentoId', $departamento_id)->get();
        $this->municipios = $municipios;

    }
    public function updated($propertyEmpresa, )
    {
        $this->validateOnly($propertyEmpresa);

    }

    public function store()
    {
        $usuario = auth()->user()->id;
        $this->validate();
        Mail::to($this->correoEmpresa)->send(new AltaEmpresa($this-> nombreEmpresa));

        Empresa::create([

            'logo' => 'storage/' . $this->logo->store('logos', 'public'),
            'nombreEmpresa' => $this->nombreEmpresa,
            'nit' => $this->nit,
            'rtu' => 'storage/' . $this->rtu->store('rtus', 'public'),
            'patenteComercio' => 'storage/' . $this->patenteComercio->store('patentes', 'public'),
            'descripcionEmpresa' => $this->descripcionEmpresa,
            'telefonoEmpresa' => $this->telefonoEmpresa,
            'correoEmpresa' => $this->correoEmpresa,
            'direccionEmpresa' => $this->direccionEmpresa,
            'encargadoEmpresa' => $this->encargadoEmpresa,
            'telefonoEncargado' => $this->telefonoEncargado,
            'estadoEmpresa' => "1",
            'estadoSolicitud' => "en Espera",
            'user_id' => $usuario,
            'residencia_id' => $this->residencia_id
        ]);

        $this->resetInput();
        session()->flash('message', 'Registro de empresa creado exitosamente.');
        return redirect('empresasIni');
    }
}
