<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Empresa;
use App\Models\User;
use App\Models\Municipio;
use App\Models\Departamento;
use Livewire\WithFileUploads;
use App\Mail\AltaEmpresa;
use App\Mail\ActualizaEmpresa;
use Illuminate\Support\Facades\Mail;
use DB;
use \Auth;

class EmpresasIni extends Component
{
    use WithPagination;
	use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $empresaId, $logo, $nombreEmpresa, $nit, $rtu, $patenteComercio, $descripcionEmpresa, $telefonoEmpresa, $correoEmpresa, $direccionEmpresa, $encargadoEmpresa, $telefonoEncargado, $estadoEmpresa, $estadoSolicitud, $user_id, $residencia_id;
    public $departamento=null, $municipio=null;
	public $departamentos=null, $municipios=null; 
    public $recordlog;
	public $newLogotipo;
	public $recordrtu;
	public $recordpan;
	
	
	public function render()
    {
		$usuario=auth()->user()->id;
		//$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.empresasIni.view', [
            'empresas' => Empresa::where('user_id',$usuario)
						
						->paginate(10),
						
						
						'Departamentos'=>Departamento::all()
        ]);
    }
    public function updatingKeyWord(){
        $this->resetPage();
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
		'nombreEmpresa' => 'required|max:100',
		'nit' => 'required|max:10',
		'rtu' => 'required|mimes:pdf',
		'patenteComercio' => 'required|mimes:pdf',
		'descripcionEmpresa' => 'required',
		'telefonoEmpresa' => 'required|size:8',
		'correoEmpresa' => 'required|email',
		'direccionEmpresa' => 'required|max:200',
		'encargadoEmpresa' => 'required|regex:/^[\pL\s\-]+$/u',
		'telefonoEncargado' => 'required|size:8',
		
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
		$usuario=auth()->user()->id;
        $this->validate();
		Mail::to($this->correoEmpresa)->send(new AltaEmpresa($this-> nombreEmpresa));

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
			'user_id' => $usuario,
			'residencia_id' => $this-> residencia_id
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Empresa creado exitosamente.');
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
			

			'nombreEmpresa' => 'required|max:100',
			'nit' => 'required|max:10',
		    'descripcionEmpresa' => 'required',
			'telefonoEmpresa' => 'required|size:8',
			'correoEmpresa' => 'required|email',
			'direccionEmpresa' => 'required|max:200',
			'encargadoEmpresa' => 'required|regex:/^[\pL\s\-]+$/u',
			'telefonoEncargado' => 'required|size:8',
			'residencia_id' => 'required',
			
			
        ]);
		Mail::to($this->correoEmpresa)->send(new ActualizaEmpresa($this-> nombreEmpresa));

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
				
				
				'residencia_id' => $this-> residencia_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'actualizado correctamente.');
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
//****************************************************** editar logo */
   public function editlog($empresaId)
   {
       $this->recordlog = Empresa::findOrFail($empresaId);
	   $this->selected_id = $empresaId; 
       $this->nombreEmpresa = $this->recordlog->nombreEmpresa;
       $this->logo = $this->logo;
    
   }
   public function logo(){
       if ($this->selected_id) {
           $recordlogotipo = Empresa::find($this->selected_id);

		   if ($recordlogotipo->logo) {
			// Elimina el logotipo anterior antes de cargar el nuevo
			Storage::disk('public')->delete('logos/' . $recordlogotipo->logo);
			}

			$newLogotipo = uniqid() . '.' . $this->logo->getClientOriginalExtension();
			$this->logo->storeAs('public/logos', $newLogotipo, 'local');
            $recordlogotipo->update([ 
			'nombreEmpresa' => $this-> nombreEmpresa,
			'logo' => $newLogotipo,
           ]);

           $this->resetInput();
           $this->dispatchBrowserEvent('closeModal');
           session()->flash('message', 'Logo actualizado Exitosamente!.');
       }
   }


  //****************************************************** editar rtu */
  public function editrtu($empresaId)
  {
	  $this->recordrtu = Empresa::findOrFail($empresaId);
	  $this->selected_id = $empresaId; 
	  $this->nombreEmpresa = $this->recordrtu->nombreEmpresa;
	  $this->rtu = $this->rtu;
   
  }
  public function rtu(){
	  if ($this->selected_id) {
		  $recordRtus = Empresa::find($this->selected_id);

		    // Verifica si hay un RTU existente
			if ($recordRtus->rtu) {
				// Elimina el RTU anterior antes de cargar el nuevo
				Storage::disk('public')->delete('rtus/' . $recordRtus->rtu);
			}

			// Guarda el nuevo RTU
			$nuevoRTU = uniqid() . '.' . $this->rtu->getClientOriginalExtension();
			$this->rtu->storeAs('public/rtus', $nuevoRTU, 'local');
		  	$recordRtus->update([ 
				'nombreEmpresa' => $this->nombreEmpresa,
		   		'rtu' => $nuevoRTU,
		   		'estadoSolicitud' => "en Espera",
		  	]);

		  $this->resetInput();
		  $this->dispatchBrowserEvent('closeModal');
		  session()->flash('message', 'RTU actualizado exitosamente!.');
	  }
  }

  //****************************************************** editar patente */
  public function editpan($empresaId)
  {
	$this->recordpan = Empresa::findOrFail($empresaId);
	$this->selected_id = $empresaId; 
	$this->nombreEmpresa = $this->recordpan-> nombreEmpresa;
	$this->patenteComercio = $this->patenteComercio;
   
  }
  public function pan(){
	if ($this->selected_id) {
		$recordPatente = Empresa::find($this->selected_id);
		// Verifica si hay una Patente de Comercio existente
		  if ($recordPatente->patenteComercio) {
			  // Elimina la Patente de Comercio anterior antes de cargar el nuevo
			  Storage::disk('public')->delete('patentes/' . $recordPatente->patenteComercio);
		  }

		  // Guarda la nueva Patente
		  $nuevaPatente = uniqid() . '.' . $this->patenteComercio->getClientOriginalExtension();
		  $this->patenteComercio->storeAs('public/patentes', $nuevaPatente, 'local');
			$recordPatente->update([ 
				 'nombreEmpresa' => $this-> nombreEmpresa,
				 'patenteComercio' => $nuevaPatente,
				 'estadoSolicitud' => "en Espera",
			]);

		$this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Patente actualizada Exitosamente!.');
	}
  }
//////******eliinar */
    public function destroy($empresaId)
    {
        if ($empresaId) {
            Empresa::where('empresaId', $empresaId)->delete();
        }
    }
}