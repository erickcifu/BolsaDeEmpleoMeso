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

class Empresas1 extends Component
{
    use WithPagination;
	use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $empresaId, $logo, $nombreEmpresa, $nit, $rtu, $patenteComercio, $descripcionEmpresa, $telefonoEmpresa, $correoEmpresa, $direccionEmpresa, $encargadoEmpresa, $telefonoEncargado, $estadoEmpresa, $estadoSolicitud, $user_id, $residencia_id;
    public $departamento=null, $municipio=null;
	public $departamentos=null, $municipios=null; 
   
	
	
	public function render()
    {
		$usuario=auth()->user()->id;
		//$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.empresas1.view', [
            'empresas' => Empresa::where('user_id',$usuario)
						
						->paginate(10),
						
						
						'Departamentos'=>Departamento::all()
        ]);
    }
 
	
   
	



   

   

    
      

	
 


  
   
}