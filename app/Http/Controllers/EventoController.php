<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entrevista;
use App\Models\Postulacione;
use App\Models\Estudiante;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class EventoController extends Controller
{

    public $usuarioAutenticado, $entrevistasEstudiante, $user, $nombreEmpresa;
    public function index()
    {
    


        return view('evento.index');
    }
    
    public function show()
    {

        if (Auth::check()) {
			$this->usuarioAutenticado = Auth::id();

       	 	$this->user = User::with('estudiante')->find($this->usuarioAutenticado);

			//Obtener entrevistas del estudiante
			$this->entrevistasEstudiante = $this->user->estudiante->postulacions->flatMap(function ($postulacion) {
                return $postulacion->entrevistas;
            });
        
		}
       
        $all_events=$this->entrevistasEstudiante;
      
        $events=[];
        foreach ($all_events as $event) {
           $events[]=[
               
            'id'=>$event->entrevistaId,   
            'title'=>$event->tituloEntrevista,
               'start'=>$event->FechaEntrevista,
              
   
           ];
        }
        return response()->json($events);
    }

    public function edit($entrevistaId){
        $entrevista=Entrevista::find($entrevistaId);
    
        return response()->json($entrevista);
 }

 }
    
   
  
   

