@section('title', __('Estadisticas'))
<div class="row">
    <div class="col-12 mb-3 d-flex justify-content-end">
        <label for="reminder" class="mx-3">Fecha Inicio:</label>
        <input wire:model="reminder" type="date" wire:change="actualizarInformacion()" />
        <label for="endsOnDate" class="mx-3">Fecha Fin:</label>
        <input wire:model="endsOnDate" type="date" wire:change="actualizarInformacion()" />
    </div>
    
    
     
 {{--tablssa--}} 
 
 <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header" style="background-color: #d3d3d3;">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4> Reportes </h4>
						</div>

                        <div class="btn" style="background-color: #005c35; display: flex; align-items: center;">
                        <i class="fa-solid fa-download" style="color: #f0eadc;"></i>
                        <a href="{{ url('/estadisticasuper-pdf') }}" class="nav-link" style="color: #f0eadc; text-decoration: none; margin-left: 5px;">
                            <span>Descargar Reporte</span>
                        </a>
                    </div>
					</div>
				</div>

                <div class="card-body">
                        <div class="row w-100 d-flex justify-content-center mb-2"
                            style="border: 1px solid gray; padding: 7px; border-radius: 5px">
                        <div class="text-center">Habilidades técnicas</div>
                    
                            <div class="table-responsive">
                            @if(collect($habilidadesT)->isNotEmpty())
                            <table class="table table-bordered table-sm"  >
                                <thead class="thead">
                                    <tr> 
                                        <th style="background-color: #005c35;"><b style="color: #f0eadc;">Habilidad</th>
                                        <th style="background-color: #005c35;"><b style="color: #f0eadc;">Cant. Veces requerida</th>
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
                                @else
                                    <td>Sin datos</td>
                                @endif
                            </div>
                        </div>
                        </div> 
                    </div>
                    
                    
                
                

                {{--fin tabla--}}  

                    <div class="row w-100 d-flex justify-content-center mb-2"
                        style="border: 1px solid gray; padding: 3px; border-radius: 5px">
                        <div class="text-center">Total tecnicas</div>
                        <div class="col-md-3 mb-1">
                            <div class="card border-secondary mx-sm-1 p-2">
                                <div class="card border-secondary text-secondary p-1">
                                    <span class="text-center fa fa-person-circle-check" aria-hidden="true"></span>
                                </div>
                                <div class="text-secondary text-center mt-3">
                                    <h6>Por mes</h6>
                                </div>
                                <div class="text-secondary text-center mt-2">
                                    <h4>{{ $habilidadestecnicas }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-1">
                            <div class="card border-secondary mx-sm-1 p-2">
                                <div class="card border-secondary text-secondary p-1">
                                    <span class="text-center fa fa-person-circle-check" aria-hidden="true"></span>
                                </div>
                                <div class="text-secondary text-center mt-3">
                                    <h6>Por año ({{$anioActual}})</h6>
                                </div>
                                <div class="text-secondary text-center mt-2">
                                    <h4>{{ $habilidadestecnicasYear }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row w-100 d-flex justify-content-center mb-2"
                        style="border: 1px solid gray; padding: 3px; border-radius: 5px">
                        <div class="text-center">Total Contratados</div>
                        <div class="col-md-3 mb-1">
                            <div class="card border-primary mx-sm-1 p-2">
                                <div class="card border-primary text-primary p-1">
                                    <span class="text-center fa fa-person-circle-check" aria-hidden="true"></span>
                                </div>
                                <div class="text-primary text-center mt-3">
                                    <h6>Por mes</h6>
                                </div>
                                <div class="text-primary text-center mt-2">
                                    <h4>{{ $contratados }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-1">
                            <div class="card border-primary mx-sm-1 p-2">
                                <div class="card border-primary text-primary p-1">
                                    <span class="text-center fa fa-person-circle-check" aria-hidden="true"></span>
                                </div>
                                <div class="text-primary text-center mt-3">
                                    <h6>Por año  ({{$anioActual}})</h6>
                                </div>
                                <div class="text-primary text-center mt-2">
                                    <h4>{{ $contratadosYear }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row w-100 d-flex justify-content-center mb-2"
                        style="border: 1px solid gray; padding: 3px; border-radius: 5px">
                        <div class="text-center">Total Postulados</div>
                        <div class="col-md-3 mb-1">
                            <div class="card border-danger mx-sm-1 p-2">
                                <div class="card border-danger text-danger p-1">
                                    <span class="text-center fa fa-person-circle-check" aria-hidden="true"></span>
                                </div>
                                <div class="text-danger text-center mt-3">
                                    <h6>Por mes</h6>
                                </div>
                                <div class="text-danger text-center mt-2">
                                    <h4>{{ $postulados }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-1">
                            <div class="card border-danger mx-sm-1 p-2">
                                <div class="card border-danger text-danger p-1">
                                    <span class="text-center fa fa-person-circle-check" aria-hidden="true"></span>
                                </div>
                                <div class="text-danger text-center mt-3">
                                    <h6>Por año ({{$anioActual}})</h6>
                                </div>
                                <div class="text-danger text-center mt-2">
                                    <h4>{{ $postuladosYear }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row w-100 d-flex justify-content-center mb-2"
                        style="border: 1px solid gray; padding: 3px; border-radius: 5px">
                        <div class="text-center">Total Rechazados</div>
                        <div class="col-md-3 mb-1">
                            <div class="card border-info mx-sm-1 p-2">
                                <div class="card border-info text-info p-1">
                                    <span class="text-center fa fa-person-circle-check" aria-hidden="true"></span>
                                </div>
                                <div class="text-info text-center mt-3">
                                    <h6>Por mes</h6>
                                </div>
                                <div class="text-info text-center mt-2">
                                    <h4>{{ $rechazados }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-1">
                            <div class="card border-info mx-sm-1 p-2">
                                <div class="card border-info text-info p-1">
                                    <span class="text-center fa fa-person-circle-check" aria-hidden="true"></span>
                                </div>
                                <div class="text-info text-center mt-3">
                                    <h6>Por año  ({{$anioActual}})</h6>
                                </div>
                                <div class="text-info text-center mt-2">
                                    <h4>{{ $rechazadosYear }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row w-100 d-flex justify-content-center mb-2"
                        style="border: 1px solid gray; padding: 3px; border-radius: 5px">
                        <div class="text-center">Total Ofertas</div>
                        <div class="col-md-3 mb-1">
                            <div class="card border-warning mx-sm-1 p-2">
                                <div class="card border-warning text-warning p-1">
                                    <span class="text-center fa fa-person-circle-check" aria-hidden="true"></span>
                                </div>
                                <div class="text-warning text-center mt-3">
                                    <h6>Por mes</h6>
                                </div>
                                <div class="text-warning text-center mt-2">
                                    <h4>{{ $ofertas }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-1">
                            <div class="card border-warning mx-sm-1 p-2">
                                <div class="card border-warning text-warning p-1">
                                    <span class="text-center fa fa-person-circle-check" aria-hidden="true"></span>
                                </div>
                                <div class="text-warning text-center mt-3">
                                    <h6>Por año  ({{$anioActual}})</h6>
                                </div>
                                <div class="text-warning text-center mt-2">
                                    <h4>{{ $ofertasYear }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>