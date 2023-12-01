@section('title', __('Estadisticas'))
<div class="row">
    
 
 {{--tabla--}}   
 <h3  style="text-align: center;">Reporte de Estaditicas para Autoridades Academicas</h3>
 <div class="card-body">
        <div class="row w-100 d-flex justify-content-center mb-2"
             style="border: 1px solid gray; padding: 7px; border-radius: 5px">
           
        
     
            <div class="table-responsive">
             <table class="table table-bordered table-sm"  width="100%">
                 <thead class="thead">
                      <tr> 
                  
                        <th style="background-color: #005c35;"><b style="color: #f0eadc;">Técnicas </th>
                        <th style="background-color: #005c35;"><b style="color: #f0eadc;">Veces Requerida </th>
                   
                        </tr>
                 </thead>
                 <tbody>

                    @foreach ($habilidadesT as $habilidades)
                    <tr>
                    <td>{{ $habilidades->nombreTecnica }}</td>
                    <td>{{ $habilidades->total }}</td>
                    </tr>
                     @endforeach
              
                 </tbody>
             </table>	
            </div>
         </div>
        </div> 
    </div>
       
       
  
 

 {{--fin tabla--}}  

    <div class="row w-100 d-flex justify-content-center mb-2"
        style="border: 1px solid gray; padding: 3px; border-radius: 5px">
        <div class="text-center">Total tecnicas:</div>
        <div class="col-md-3 mb-1">
            @foreach ($HabilidadesYear as $hab)
            {{ $hab->total }}       
    
             @endforeach
        </div>
    </div>
       

    <div class="row w-100 d-flex justify-content-center mb-2"
        style="border: 1px solid gray; padding: 3px; border-radius: 5px">
        <div class="text-center">Total Contratados</div>
        <div class="col-md-3 mb-1">
            @foreach ($ContratadosYear as $contr)
            {{ $contr->total }}       
              @endforeach
            
        </div>
        
    </div>

    <div class="row w-100 d-flex justify-content-center mb-2"
        style="border: 1px solid gray; padding: 3px; border-radius: 5px">
        <div class="text-center">Total Postulados</div>
        <div class="col-md-3 mb-1">
            @foreach ($PostuladosYear as $pos)
            {{ $pos->total }}       
              @endforeach        
        </div>       
    </div>


    <div class="row w-100 d-flex justify-content-center mb-2"
        style="border: 1px solid gray; padding: 3px; border-radius: 5px">
        <div class="text-center">Total Rechazados</div>
        <div class="col-md-3 mb-1">
            @foreach ($RechazadosYear as $rech)
            {{ $rech->total }}       
            @endforeach   
        </div>
        
    </div>
    <div class="row w-100 d-flex justify-content-center mb-2"
        style="border: 1px solid gray; padding: 3px; border-radius: 5px">
        <div class="text-center">Total Ofertas</div>
        <div class="col-md-3 mb-1">
            @foreach ($OfertasYear as $of)
            {{ $of->total }}       
            @endforeach   
        </div>
        
    </div>
</div>