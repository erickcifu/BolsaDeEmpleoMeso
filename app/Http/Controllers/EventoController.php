<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entrevista;
use App\Models\Postulacione;
use App\Models\Estudiante;
use DB;
use \Auth;
class EventoController extends Controller
{

  
    public function index()
    {
    


        return view('evento.index');
    }
    
    public function show()
    {
        $all_events=Entrevista::all();
      
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
    
   
  
   

