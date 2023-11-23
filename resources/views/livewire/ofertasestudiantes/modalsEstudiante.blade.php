<!-- Show Modal -->
<div wire:ignore.self class="modal fade modal-lg modal-dialog-scrollable" id="VerOfertaModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="VerOfertaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <form>
            <div class="modal-header" style="background-color: #005c35;">
                <h5 class="modal-title" id="VerOfertaModalLabel" style="color: #f0eadc;"><b>{{ $nombrePuesto }}</b></h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="color: #f0eadc;">
                    <div class="object-fit-cover border rounded" >
                        <img src="{{ asset($imagenPuesto) }}"  class="img-fluid w-100">
                    </div>
                    <br/>
                    <div class="form-group">
                        <h5 for="nombre_empresa"><b style="color: black;">{{ $nombre_empresa }}</b></h5>
                    </div>
                    <div class="hstack gap-3">
                        <div style="display: inline-block; width: 100%;">
                            <div class="mb-2">
                                <small style="color: #373737;"><i class="fa-regular fa-calendar"></i> Fecha límite para postulación: {{ $fechaMax }}</small>
                            </div>
                        </div>
                        <div style="display: inline-block; width: 100%;">
                            <div class="mb-2">
                            <small style="color: #373737;"><i class="fa-solid fa-circle-info"></i> Edad miníma: {{ $edadRequerida }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="hstack gap-3">
                        <div style="display: inline-block; width: 100%;">
                            <div class="mb-2">
                            <small style="color: #373737;"><i class="fa-solid fa-briefcase"></i>  Modalidad: {{ $modalidadTrabajo }} - {{ $jornadaLaboral }} - {{ $cantVacantes }} Vacantes</small>
                            </div>
                        </div>
                        <div style="display: inline-block; width: 100%;">
                            <div class="mb-2">
                            <small style="color: #373737;"><i class="fa-solid fa-person-half-dress"></i> Género requerido: {{ $generoRequerido }}</small>
                            </div>
                        </div>
                    </div>
                    <small style="color: #373737;"><i class="fa-solid fa-money-bill-wave"></i> Sueldo: Q.{{ $sueldoMinimo }} - Q.{{ $sueldoMax }}</small>
                    <br/>
                    <br/>
                    <br/>
                    <div class="d-flex gap-3">
                                <!-- Acerca del empleo -->
                                <div style="flex: 1;">
                                    <div class="mb-2">
                                        <p class= "fs-6" for="resumenPuesto"><b style="color: black;">Acerca del empleo</b></p>
                                        <p style="color: #373737;">{{ $resumenPuesto }} </p>
                                    </div>
                                </div>

                                <!-- Responsabilidades principales -->
                                <div style="flex: 1;">
                                    <div class="mb-2">
                                        <p class="fs-6" for="responsabilidadesPuesto"><b style="color: black;">Responsabilidades principales</b></p>
                                        <p style="color: #373737;">{{ $responsabilidadesPuesto }}</p>
                                    </div>
                                </div>
                            </div>
                    <br/>
                    <form>
                        <div class="form-group">
                            <div class="text-center">
                                <h5><b style="color: #005c35;">- Requerimientos -</b></h5>
                            </div>
                            <hr style=" border: 1px solid #212121; margin: 5px 0;"></hr>

                            <div class="d-flex gap-3">
                                <!-- Formación Académica -->
                                <div style="flex: 1;">
                                    <div class="mb-2">
                                        <p class= "fs-6" for="requisitosEducativos"><b style="color: black;">Formación académica</b></p>
                                        <p style="color: #373737;">{{ $requisitosEducativos }} </p>
                                    </div>
                                </div>

                                <!-- Experiencia Laboral -->
                                <div style="flex: 1;">
                                    <div class="mb-2">
                                        <p class="fs-6" for="experienciaLaboral"><b style="color: black;">Experiencia laboral</b></p>
                                        <p style="color: #373737;">{{ $experienciaLaboral }}</p>
                                    </div>
                                </div>
                            </div>
                            </br>   
                            </br>  
                            <!-- Habilidades -->
                            <div class="d-flex gap-3">
                                <!-- Formación Académica -->
                                <div style="flex: 1;">
                                    <div class="mb-2">
                                        <p class="fs-6" for="requisitosEducativos"><b style="color: black;">Habilidades técnicas</b></p>
                                        <p style="color: #373737;">{{ $requisitosEducativos }} </p>
                                    </div>
                                </div>

                                <!-- Experiencia Laboral -->
                                <div style="flex: 1;">
                                    <div class="mb-2">
                                        <p class="fs-6" for="experienciaLaboral"><b style="color: black;">Habilidades Interpersonales</b></p>
                                        <p style="color: #373737;">{{ $experienciaLaboral }}</p>
                                    </div>
                                </div>

                                <!-- Experiencia Laboral -->
                                <div style="flex: 1;">
                                    <div class="mb-2">
                                        <p class="fs-6" for="experienciaLaboral"><b style="color: black;">Competencias comportamentales</b></p>
                                        <p style="color: #373737;">{{ $experienciaLaboral }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form> 
                    <br/>
                    <br/>
                    <div class="form-group">
                            <div class="text-center">
                                <h5><b style="color: #005c35;">- Beneficios y oportunidades -</b></h5>
                            </div>
                            <hr style=" border: 1px solid #212121; margin: 5px 0;"></hr>
                            <div class="d-flex gap-3">
                                <!-- Beneficios -->
                                <div style="flex: 1;">
                                    <div class="mb-2">
                                        <p class="fs-6" for="beneficios"><b style="color: black;">Beneficios</b></p>
                                        <p style="color: #373737;">{{ $beneficios }} </p>
                                    </div>
                                </div>

                                <!-- Oportunidades de crecimiento -->
                                <div style="flex: 1;">
                                    <div class="mb-2">
                                        <p class="fs-6" for="oportunidadesDesarrollo"><b style="color: black;">Oportunidades de crecimiento</b></p>
                                        <p style="color: #373737;">{{ $oportunidadesDesarrollo }}</p>
                                    </div>
                                </div>

                                <!-- Condiciones laborales -->
                                <div style="flex: 1;">
                                    <div class="mb-2">
                                        <p class="fs-6" for="experienciaLaboral"><b style="color: black;">Condiciones laborales</b></p>
                                        <p style="color: #373737;">{{ $condicionesLaborales }}</p>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="empresa_id"></label>
                        <input wire:model="empresa_id" type="number" class="form-control" id="empresa_id" value="1" hidden>@error('empresa_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <input type="hidden" wire:model="selected_id"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn" style="background-color: #d3d3d3;" data-bs-dismiss="modal"><b>Cerrar</b></button>
            </div>
       </div>
    </div>
</div>


<!-- Create Postulacion Modal -->
<div wire:ignore.self class="modal fade" id="createPostDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createPostDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;">
                <h5 class="modal-title" id="createPostDataModalLabel" style="color: #f0eadc;"></h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="oferta_id" hidden>Oferta laboral</label>
                        <input wire:model="oferta_id" type="text" class="form-control" id="oferta_id" placeholder="Oferta Id" hidden>@error('oferta_id') <span class="error text-danger">{{ $message }}</span> @enderror
                        <h5 class="modal-title" style="color: 005c35;"><b>¿Desea postularse a esta oferta laboral?</b></h5>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn close-btn" data-bs-dismiss="modal" style="background-color: #d3d3d3;">Cancelar</button>
                <button type="button" wire:click.prevent="postular()" data-bs-dismiss="modal" class="btn btn-primary" style="background-color: #005c35;">Sí, deseo postularme!</button>
            </div>
        </div>
    </div>
</div>
