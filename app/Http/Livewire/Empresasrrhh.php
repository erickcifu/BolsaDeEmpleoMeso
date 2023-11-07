<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Empresa;
use App\Models\User;
use App\Models\Municipio;
use App\Models\Departamento;
use Livewire\WithFileUploads;

class Empresasrrhh extends Component
{
    use WithPagination;
	use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $empresaId, $logo, $nombreEmpresa, $nit, $rtu, $patenteComercio, $descripcionEmpresa, $telefonoEmpresa, $correoEmpresa, $direccionEmpresa, $encargadoEmpresa, $telefonoEncargado, $estadoEmpresa, $estadoSolicitud, $user_id, $residencia_id;
    public $departamento=null, $municipio=null;
	public $departamentos=null, $municipios=null; 
   
	
	
	public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.empresasrrhh.view', [
            'empresas' => Empresa::latest()
						->orWhere('empresaId', 'LIKE', $keyWord)
						->orWhere('logo', 'LIKE', $keyWord)
						->orWhere('nombreEmpresa', 'LIKE', $keyWord)
						->orWhere('nit', 'LIKE', $keyWord)
						->orWhere('rtu', 'LIKE', $keyWord)
						->orWhere('patenteComercio', 'LIKE', $keyWord)
						->orWhere('descripcionEmpresa', 'LIKE', $keyWord)
						->orWhere('telefonoEmpresa', 'LIKE', $keyWord)
						->orWhere('correoEmpresa', 'LIKE', $keyWord)
						->orWhere('direccionEmpresa', 'LIKE', $keyWord)
						->orWhere('encargadoEmpresa', 'LIKE', $keyWord)
						->orWhere('telefonoEncargado', 'LIKE', $keyWord)
						->orWhere('estadoEmpresa', 'LIKE', $keyWord)
						->orWhere('estadoSolicitud', 'LIKE', $keyWord)
						->orWhere('user_id', 'LIKE', $keyWord)
						->orWhere('residencia_id', 'LIKE', $keyWord)
						->paginate(10),
						
						
						'Departamentos'=>Departamento::all()
        ]);
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
		'nit' => 'required',
		'rtu' => 'required|mimes:pdf',
		'patenteComercio' => 'required|mimes:pdf',
		'descripcionEmpresa' => 'required',
		'telefonoEmpresa' => 'required',
		'correoEmpresa' => 'required',
		'direccionEmpresa' => 'required',
		'encargadoEmpresa' => 'required',
		'telefonoEncargado' => 'required',
		
		'user_id' => 'required',
		'residencia_id' => 'required',

	];
     //funcion para hacer la consulta de 
	public function updateddepartamento($departamento_id)
	{
	  $municipios=Municipio::join('departamentos','municipios.departamento_id','=','departamentos.departamentoId')
									->where('departamentos.departamentoId',$departamento_id)->get();
	   $this->municipios=$municipios;

	}
	public function updated($propertyEmpresa,){
		$this->validateOnly($propertyEmpresa);
     
	  }



    public function store()
    {
        $this->validate();

        Empresa::create([ 
			
			'logo' => 'storage/'.$this-> logo->store('logos','public'),
			'nombreEmpresa' => $this-> nombreEmpresa,
			'nit' => $this-> nit,
			'rtu' => 'storage/'.$this-> rtu->store('rtus','public'),
			'patenteComercio' =>'storage/'. $this-> patenteComercio->store('patentes','public'),
			'descripcionEmpresa' => $this-> descripcionEmpresa,
			'telefonoEmpresa' => $this-> telefonoEmpresa,
			'correoEmpresa' => $this-> correoEmpresa,
			'direccionEmpresa' => $this-> direccionEmpresa,
			'encargadoEmpresa' => $this-> encargadoEmpresa,
			'telefonoEncargado' => $this-> telefonoEncargado,
			'estadoEmpresa' => "1",
			'estadoSolicitud' => "en Espera",
			'user_id' => $this-> user_id,
			'residencia_id' => $this-> residencia_id
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Empresa Successfully created.');
    }

    public function edit($empresaId)
    {
        $record = Empresa::findOrFail($empresaId);
        $this->selected_id = $empresaId; 
	
		$this->logo = $record-> logo;
		$this->nombreEmpresa = $record-> nombreEmpresa;
		$this->nit = $record-> nit;
		$this->rtu = $record-> rtu;
		$this->patenteComercio = $record-> patenteComercio;
		$this->descripcionEmpresa = $record-> descripcionEmpresa;
		$this->telefonoEmpresa = $record-> telefonoEmpresa;
		$this->correoEmpresa = $record-> correoEmpresa;
		$this->direccionEmpresa = $record-> direccionEmpresa;
		$this->encargadoEmpresa = $record-> encargadoEmpresa;
		$this->telefonoEncargado = $record-> telefonoEncargado;
		$this->estadoEmpresa = $record-> estadoEmpresa;
		$this->estadoSolicitud = $record-> estadoSolicitud;
		$this->user_id = $record-> user_id;
		$this->residencia_id = $record-> residencia_id;
    }

    public function update()
    {
        $this->validate([
		
			
			
			'estadoSolicitud' => 'required',
			
        ]);

        if ($this->selected_id) {
			$record = Empresa::find($this->selected_id);
            $record->update([ 
			
				
				'nombreEmpresa' => $this-> nombreEmpresa,
				'nit' => $this-> nit,
				
			
				'descripcionEmpresa' => $this-> descripcionEmpresa,
				'telefonoEmpresa' => $this-> telefonoEmpresa,
				'correoEmpresa' => $this-> correoEmpresa,
				'direccionEmpresa' => $this-> direccionEmpresa,
				'encargadoEmpresa' => $this-> encargadoEmpresa,
				'telefonoEncargado' => $this-> telefonoEncargado,
				'estadoEmpresa' => $this-> estadoEmpresa,
				'estadoSolicitud' => $this-> estadoSolicitud,
				'user_id' => $this-> user_id,
				'residencia_id' => $this-> residencia_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Empresa cambio de solicitud.');
        }
    }

	public function edit2($empresaId)
   {
       $record2 = Empresa::findOrFail($empresaId);
       $this->selected_id = $empresaId; 
       $this->nombreEmpresa = $record2-> nombreEmpresa;
       $this->estadoEmpresa = $record2-> estadoEmpresa;
   }
   public function Desc(){
       if ($this->selected_id) {
           $record2 = Empresa::find($this->selected_id);
           $record2->update([ 
            'nombreEmpresa' => $this-> nombreEmpresa,
            'estadoEmpresa' =>'0',
           ]);

           $this->resetInput();
           $this->dispatchBrowserEvent('closeModal');
           session()->flash('message', 'Autoridad Se Deshabilitó Exitosamente!.');
       }
   }
   public function Act(){
       if ($this->selected_id) {
		$record2 = Empresa::find($this->selected_id);
		$record2->update([ 
		 'nombreEmpresa' => $this-> nombreEmpresa,
		 'estadoEmpresa' =>'1',
           ]);

           $this->resetInput();
           $this->dispatchBrowserEvent('closeModal');
           session()->flash('message', 'Autoridad Se Activo Exitosamente!.');
       }
   }

    public function destroy($empresaId)
    {
        if ($empresaId) {
            Empresa::where('empresaId', $empresaId)->delete();
        }
    }
}