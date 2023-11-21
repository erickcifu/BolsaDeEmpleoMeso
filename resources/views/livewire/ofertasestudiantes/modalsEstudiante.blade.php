<!-- Show Modal -->
<div wire:ignore.self class="modal fade" id="VerOfertaModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="VerOfertaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <form>
            <div class="modal-header" style="background-color: #005c35;">
                <h5 class="modal-title" id="VerOfertaModalLabel" style="color: #f0eadc;"><b>{{ $nombrePuesto }}</b></h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="color: #f0eadc;">
                    <div class="object-fit-cover border rounded" >
                    @if ($imagenPuesto)
                        <img src="{{ asset($imagenPuesto) }}"  class="img-fluid">
                    @else
                        <!-- Mostrar algo cuando la imagen no está disponible -->
                        <span>Imagen no disponible</span>
                    @endif
                    </div>
                    <br/>
                    <div class="form-group">
                        <h5 for="nombre_empresa"><b style="color: black;">{{ $nombre_empresa }}</b></h5>
                    </div>
                    <small style="color: #373737;"><i class="fa-regular fa-calendar"></i> Fecha límite para postulación: {{ $fechaMax }}</small>
                    <br/>
                    <small style="color: #373737;"><i class="fa-solid fa-briefcase"></i>  Modalidad: {{ $modalidadTrabajo }} - {{ $jornadaLaboral }} - {{ $cantVacantes }} Vacantes</small>
                    <br/>
                    <small style="color: #373737;"><i class="fa-solid fa-money-bill-wave"></i> Sueldo: Q.{{ $sueldoMinimo }} - Q.{{ $sueldoMax }}</small>
                    <br/>
                    <br/>
                    <div class="form-group">
                        <h5 for="resumenPuesto"><b style="color: black;">Acerca del empleo</b></h5>
                        <p style="color: #373737;">{{ $resumenPuesto }}</p>
                    </div>
                    <br/>
                    <div class="hstack gap-3">
                            <div style="display: inline-block; width: 100%;">
                                <div class="mb-2">
                                    <h5 for="edadRequerida"><b style="color: black;">Edad requerida</b></h5>
                                    <p style="color: #373737;">{{ $edadRequerida }} Años</p>
                                </div>
                            </div>
                            <div style="display: inline-block; width: 100%;">
                                <div class="mb-2">
                                    <h5 for="generoRequerido"><b style="color: black;">Género requerido</b></h5>
                                    <p style="color: #373737;">{{ $generoRequerido }}</p>
                                </div>
                            </div>
                        </div>
                    <br/>
                    <div class="form-group">
                        <h5><b style="color: black;">- Requerimientos -</b></h5>
                        <h8 for="requisitosEducativos"><b style="color: black;">Formación académica</b></h8>
                        <p style="color: #373737;">{{ $requisitosEducativos }}</p>
                        <hr style=" border: 1px solid #212121; margin: 5px 0;"></hr>
                        <h8 for="experienciaLaboral"><b style="color: black;">Experiencia laboral</b></h8>
                        <p style="color: #373737;">{{ $experienciaLaboral }}</p>
                        <hr style=" border: 1px solid #212121; margin: 5px 0;"></hr>
                        <h8 for="experienciaLaboral"><b style="color: black;">Habilidades requeridas</b></h8>
                    </div>
                    <br/>
                    <br/>
                    <div class="form-group">
                        <h5><b style="color: black;">- Beneficios y oportunidades -</b></h5>
                        <h8 for="beneficios"><b style="color: black;">Beneficios</b></h8>
                        <p style="color: #373737;">{{ $beneficios }}</p>
                        <hr style=" border: 1px solid #212121; margin: 5px 0;"></hr>
                        <h8 for="oportunidadesDesarrollo"><b style="color: black;">Oportunidades de crecimiento</b></h8>
                        <p style="color: #373737;">{{ $oportunidadesDesarrollo }}</p>
                        <hr style=" border: 1px solid #212121; margin: 5px 0;"></hr>
                        <h8 for="experienciaLaboral"><b style="color: black;">Condiciones laborales</b></h8>
                        <p style="color: #373737;">{{ $condicionesLaborales }}</p>
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
                <h5 class="modal-title" id="createPostDataModalLabel" style="color: #f0eadc;">¿Desea Postularse a esta oferta laboral?</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="fechaPostulacion">Fecha de postulación</label>
                        <input wire:model="fechaPostulacion" type='text' class="form-control" id="fechaPostulacion" readonly>@error('fecha') <span class="error text-danger" disabled>{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="oferta_id" hidden>Oferta laboral</label>
                        <input wire:model="oferta_id" type="text" class="form-control" id="oferta_id" placeholder="Oferta Id" hidden>@error('oferta_id') <span class="error text-danger">{{ $message }}</span> @enderror
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
