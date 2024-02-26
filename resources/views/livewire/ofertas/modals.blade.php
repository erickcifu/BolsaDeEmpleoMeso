<style>
        /* Estilo personalizado para ocultar la flecha del acordeón */
        .accordion-button::after {
            display: none; /* Oculta la flecha */
        }
    </style>

<!-- Add Modal -->
<div wire:ignore.self class="modal fade modal-xl modal-dialog-scrollable" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;" >
                <h5 class="modal-title" id="createDataModalLabel" style="color: #f0eadc;"> 
                    {{ $selected_id === null ? 'Crear oferta': 'Actualizar oferta'  }}
                </h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: #f0eadc;"></button>
            </div>
            <div class="modal-body" style="color: #f0eadc;">
                <!-- Acordeon -->
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item" id="item1">
                        <h2 class="accordion-header">
                            <button class="accordion-button" style="background-color: #d3d3d3;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" disabled>
                                <b style="color: #005c35;">Información general de la oferta</b>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" wire:ignore.self  data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="hstack gap-3">
                                    <div style="display: inline-block; width: 100%;">
                                        <div class="mb-2">
                                            @if($selected_id !== null)
                                                <img src="{{ Storage::url('ofertaslab/'. $imagenPuesto) }}" width="50" height="50" class="img-fluid" alt="Imagen oferta">
                                                <label for="imagenPuesto">Imagen</label>
                                                <input wire:model="imagenPuesto" type="file" accept="image/*" class="form-control" id="imagenPuesto" placeholder="Imagen" hidden>
                                            @else
                                            <label for="imagenPuesto">Imagen (500px * 300px)
                                                    <a type="button" data-bs-toggle="popover" data-bs-trigger="hover" title="Especificaciones de imagen" data-bs-content="La imagen debe tener como máximo 500px de altura y 300px de ancho.">
														<i class="fa-solid fa-circle-info"></i>
													</a>
                                            </label>
                                            <input wire:model="imagenPuesto" type="file" accept="image/*" class="form-control" id="imagenPuesto" placeholder="Imagen">
                                            @endif
                                        </div>
                                        @error('imagenPuesto') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div style="display: inline-block; width: 100%;">
                                        <div class="mb-2">
                                            <label for="fechaMax">Fecha límite</label>
                                            <input wire:model="fechaMax" type="date" class="form-control" id="fechaMax" placeholder="Fecha límite">
                                        </div>
                                        @error('fechaMax') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <br/>
                                <div class="form-group">
                                    <label for="nombrePuesto"><b style="color: black;">Puesto*<b></label>
                                    <input wire:model="nombrePuesto" type="text" class="form-control" id="nombrePuesto" placeholder="Nombre del puesto">@error('nombrePuesto') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <br/>
                                <div class="hstack gap-3">
                                    <div style="display: inline-block; width: 100%;">
                                        <div class="mb-2">
                                            <label for="resumenPuesto">Resumen del puesto*</label>
                                            <textarea wire:model="resumenPuesto" class="form-control" id="resumenPuesto" placeholder="Descripcion puesto"></textarea>
                                            @error('resumenPuesto') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div style="display: inline-block; width: 100%;">
                                        <div class="mb-2">
                                            <label for="responsabilidadesPuesto">Responsabilidades principales*</label>
                                            <textarea wire:model="responsabilidadesPuesto" class="form-control" id="responsabilidadesPuesto" placeholder="Responsabilidades"></textarea>
                                            @error('responsabilidadesPuesto') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="hstack gap-3">
                                    <div style="display: inline-block; width: 100%;">
                                        <div class="mb-2">
                                            <label for="sueldoMinimo">Sueldo mínimo (Q.)</label>
                                            <input wire:model="sueldoMinimo" type="number" step="0.01" class="form-control" id="sueldoMinimo" placeholder="">
                                            @error('sueldoMinimo') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div style="display: inline-block; width: 100%;">
                                        <div class="mb-2">
                                            <label for="sueldoMax">Sueldo máximo (Q.)</label>
                                            <input wire:model="sueldoMax" type="number" step="0.01" class="form-control" id="sueldoMax" placeholder="">
                                            @error('sueldoMax') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="hstack gap-3">
                                    <div style="display: inline-block; width: 100%;">
                                        <div class=" mb-3">
                                            <label for="cantVacantes">Cantidad de vacantes</label>
                                            <input wire:model="cantVacantes" type="number" class="form-control" id="cantVacantes" placeholder="Puestos vacantes">
                                            @error('cantVacantes') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div style="display: inline-block; width: 100%;">
                                        <div class=" mb-3">
                                            <label for="modalidadTrabajo">Modalidad de trabajo</label>
                                            <select wire:model="modalidadTrabajo" type="text" class="form-control" id="modalidadTrabajo" placeholder="Tipo de contratacion">
                                                <option selected>Modalidad de trabajo</option>
                                                <option value="Virtual">Virtual</option>
                                                <option value="Presencial">Presencial</option>
                                                <option value="Híbrido">Híbrido</option>
                                            </select>
                                            @error('modalidadTrabajo') <span class="error text-danger">{{ $message }}</span> @enderror 
                                        </div>
                                    </div>
                                    <div style="display: inline-block; width: 100%;">
                                        <div class=" mb-3">
                                            <label for="jornadaLaboral">Jornada Laboral</label>
                                            <select wire:model="jornadaLaboral" type="text" class="form-control" id="jornadaLaboral" placeholder="Tipo de contratacion">
                                                <option selected>Modalidad de trabajo</option>
                                                <option value="Jornada completa">Jornada Completa</option>
                                                <option value="Jornada Matutina">Jornada Matutina</option>
                                                <option value="Jornada Vespertina">Jornada Vespertina</option>
                                                <option value="Jornada Nocturna">Jornada Nocturna</option>
                                            </select>
                                            @error('jornadaLaboral') <span class="error text-danger">{{ $message }}</span> @enderror 
                                        </div>
                                    </div>
                                </div>
                                <!-- boton siguiente -->
                                <div class="form-group">
                                    <button wire:click="siguientePaso(2)" type="button" class="btn btn-primary" style="background-color: #005c35;" @if($paso === 2) data-bs-toggle="collapse" data-bs-target="#collapseTwo" @endif>
                                        Siguiente
                                    </button>
                                </div>
                                <!-- Fin boton siguiente -->
                            </div>
                        </div>
                    </div>
              
                    <div class="accordion-item" id="item2">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" style="background-color: #d3d3d3;"  type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"  data-bs-parent="#accordionExample" disabled>
                                <b style="color: #005c35;"> Requisitos del puesto </b>
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse"  wire:ignore.self data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <!-- Requisitos del puesto -->
                                <div class="hstack gap-3">
                                    <div style="display: inline-block; width: 100%;">
                                        <div class="mb-2">
                                            <label for="requisitosEducativos">Requisitos educativos*</label>
                                            <textarea wire:model="requisitosEducativos" type="text" class="form-control" id="requisitosEducativos" placeholder="Dividir por '-'" wire:ignore></textarea>
                                            @error('requisitosEducativos') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div style="display: inline-block; width: 100%;">
                                        <div class="mb-2">
                                            <label for="experienciaLaboral">Experiencia laboral*</label>
                                            <textarea wire:model="experienciaLaboral" type="text" class="form-control" id="experienciaLaboral" placeholder="Dividir por '-'" wire:ignore></textarea>
                                            @error('experienciaLaboral') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="hstack gap-3">
                                    <div style="display: inline-block; width: 100%;">
                                        <div class="mb-3">
                                            <label for="edadRequerida">Edad requerida</label>
                                            <input wire:model="edadRequerida" type="number" class="form-control" id="edadRequerida" placeholder="Edad mínima requerida">
                                            @error('edadRequerida') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div style="display: inline-block; width: 100%;">
                                        <div class="mb-3">
                                            <label for="generoRequerido">Género</label>
                                            <select wire:model="generoRequerido" type="text" class="form-control" id="generoRequerido" placeholder="Genero">
                                                <option selected>Género</option>
                                                <option value="Masculino">Masculino</option>
                                                <option value="Femenino">Femenino</option>
                                                <option value="Ambos">Ambos</option>
                                            </select>
                                            @error('generoRequerido') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div style="display: inline-block; width: 100%;">
                                        <div class="mb-3">
                                            <label for="facultad_id">Facultad*</label>
                                            <select wire:model="facultad_id" class="form-control" id="facultad_id" placeholder="Facultad">
                                                @foreach ($facultades as $facultad)
                                                    <option value="{{ $facultad->id }}">{{ $facultad->Nfacultad }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <br/>
                                <!-- fin requisitos del puesto -->
                                <!-- boton anterior -->
                                <div class="form-group">
                                    <button wire:click="pasoAnterior(1)" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" class="btn btn-primary" style="background-color: #005c35;" >Anterior</button>
                                <!-- Fin boton anterior -->
                                <!-- boton siguiente -->
                                    <button type="button"  wire:click="siguientePaso(3)" style="background-color: #005c35;"class="btn btn-primary"
                                    @if($paso === 3)
                                        data-bs-toggle="collapse" data-bs-target="#collapseThree"  @endif>Siguiente</button>
                                </div>
                                <!-- Fin boton siguiente -->
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item" id="item3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed"  style="background-color: #d3d3d3;"  type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"  data-bs-parent="#accordionExample" disabled>
                                <b style="color: #005c35;"> Condiciones y beneficios </b>
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse"  wire:ignore.self data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <!-- Inputs Condiciones y beneficios -->
                                <label for="condicionesLaborales" style="font-size: 15px;"><b>Condiciones*</b></label>
                                <textarea wire:model="condicionesLaborales" type="text" class="form-control" id="condicionesLaborales" placeholder="Dividir por '-'"></textarea>@error('condicionesLaborales') <span style="font-size: 15px;" class="error text-danger">{{ $message }}</span> @enderror
                                <br/>
                                <div class="hstack gap-3">
                                    <div style="display: inline-block; width: 100%;">
                                        <div class=" mb-2">
                                            <label for="beneficios" style="font-size: 15px;"><b>Beneficios*</b></label>
                                            <textarea wire:model="beneficios" type="text" class="form-control" id="beneficios" placeholder="Dividir por '-'" wire:ignore></textarea>
                                            @error('beneficios') <span style="font-size: 15px;" class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div style="display: inline-block; width: 100%;">
                                        <div class="mb-2">
                                            <label for="oportunidadesDesarrollo" style="font-size: 15px;"><b>Oportunidades de desarrollo dentro de la empresa*</b></label>
                                            <textarea wire:model="oportunidadesDesarrollo" type="text" class="form-control" id="oportunidadesDesarrollo" placeholder="Dividir por '-'" wire:ignore></textarea>
                                            @error('oportunidadesDesarrollo') <span style="font-size: 15px;" class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>          
                                <!-- Fin inputs Condiciones y beneficios -->
                                <!-- inicio botones -->
                                <div class="form-group">
                                <!-- boton anterior -->
                                    <button type="button" wire:click="pasoAnterior(2)" data-bs-toggle="collapse" data-bs-target="#collapseTwo" class="btn btn-primary" style="background-color: #005c35;" >Anterior</button>
                                    <button type="button"  wire:click="siguientePaso(4)" style="background-color: #005c35;"class="btn btn-primary"
                                    @if($paso === 4)
                                        data-bs-toggle="collapse" data-bs-target="#collapseFour"  @endif>Siguiente</button>
                                </div>
                                <!-- Fin botones -->
                            </div>
                        </div>
                    </div>
                
                    <div class="accordion-item" id="item4">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed"  style="background-color: #d3d3d3;"  type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"  data-bs-parent="#accordionExample" disabled>
                                <b style="color: #005c35;"> Habilidades Técnicas </b>
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse"  wire:ignore.self data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="form-group text-end">
                                    <button type="button" wire:click="addTecnicas" class="btn btn-primary" style="background-color: #005c35;">
                                        <i class="fa-solid fa-circle-plus" style="color: #f0eadc;"></i> <h8 style="color: #f0eadc;">Agregar Habilidad</h8>
                                    </button>
                                </div>
                                <!-- Inputs Condiciones y beneficios -->
                                @foreach($tecnicas as $indice => $tec)
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="tecnicaId">Habilidad Técnica*</label>
                                        <select wire:model="tecnicas.{{ $indice }}.tecnicaId" type="text" class="form-control" id="tecnicas.{{ $indice }}.tecnicaId">
                                            <option selected>- Selecciona habilidades técnicas -</option>
                                            @foreach($habilidadesTecnicas as $tecnica)
                                            <option value="{{ $tecnica->tecnicaId }}">{{$tecnica->nombreTecnica}}</option>
                                            @endforeach
                                        </select>
                                        @error('tecnicas.' . $indice . '.tecnicaId') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>                                    
                                    <div class="col-3 d-flex align-items-center">
                                        <a class="dropdown-item" wire:click="removeTecnicas({{$indice}})"><i class="fa fa-trash"></i> Eliminar </a>
                                    </div>
                                </div>
                                @endforeach
                                <br/>
                                <!-- Fin inputs Condiciones y beneficios -->
                                <!-- inicio botones -->
                                <div class="form-group">
                                <!-- boton anterior -->
                                    <button type="button" wire:click="pasoAnterior(3)" data-bs-toggle="collapse" data-bs-target="#collapseThree" class="btn btn-primary" style="background-color: #005c35;" >Anterior</button>
                                    <button type="button"  wire:click="siguientePaso(5)" style="background-color: #005c35;"class="btn btn-primary"
                                    @if($paso === 5)
                                        data-bs-toggle="collapse" data-bs-target="#collapseFive"  @endif>Siguiente</button>
                                </div>
                                <!-- Fin botones -->
                            </div>
                        </div>
                    </div>
               
                    <div class="accordion-item" id="item5">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" style="background-color: #d3d3d3;"  type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive"  data-bs-parent="#accordionExample" disabled>
                                <b style="color: #005c35;"> Habilidades Interpersonales </b>
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse"  wire:ignore.self data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="form-group text-end">
                                    <button type="button" wire:click="addInterpersonales" class="btn btn-primary" style="background-color: #005c35;">
                                        <i class="fa-solid fa-circle-plus" style="color: #f0eadc;"></i> <h8 style="color: #f0eadc;">Agregar Habilidad</h8>
                                    </button>
                                </div>
                            <!-- Inputs Condiciones y beneficios -->
                                @foreach($interpersonales as $indice => $inte)
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="interpersonalId">Habilidad Interpersonal*</label>
                                        <select wire:model="interpersonales.{{ $indice }}.interpersonalId" type="text" class="form-control" id="interpersonales.{{ $indice }}.interpersonalId">
                                            <option selected>- Selecciona habilidades interpersonales -</option>
                                            @foreach($habilidadesInterpersonales as $interpersonal)
                                            <option value="{{ $interpersonal->interpersonalId }}">{{$interpersonal->nombreInterpersonal}}</option>
                                            @endforeach
                                        </select>
                                        @error('interpersonales.' . $indice . '.interpersonalId') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>                                    
                                    <div class="col-4 d-flex align-items-center">
                                        <a class="dropdown-item" wire:click="removeInterpersonales({{$indice}})"><i class="fa fa-trash"></i> Eliminar </a>
                                    </div>
                                </div>
                                <br/>
                                @endforeach
                                <!-- Fin inputs Condiciones y beneficios -->
                                <!-- inicio botones -->
                                <div class="form-group">
                                <!-- boton anterior -->
                                    <button type="button" wire:click="pasoAnterior(4)" data-bs-toggle="collapse" data-bs-target="#collapseFour" class="btn btn-primary" style="background-color: #005c35;" >Anterior</button>
                                    <button type="button"  wire:click="siguientePaso(6)" style="background-color: #005c35;"class="btn btn-primary"
                                    @if($paso === 6)
                                        data-bs-toggle="collapse" data-bs-target="#collapseSix"  @endif>Siguiente</button>
                                </div>
                                <!-- Fin botones -->
                            </div>
                        </div>
                    </div>
                
                    <div class="accordion-item" id="item6">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed"  style="background-color: #d3d3d3;"  type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix"  data-bs-parent="#accordionExample" disabled>
                                <b style="color: #005c35;"> Competencias </b>
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse"  wire:ignore.self data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="form-group text-end">
                                    <button type="button" wire:click="addCompetencias" class="btn btn-primary" style="background-color: #005c35;">
                                        <i class="fa-solid fa-circle-plus" style="color: #f0eadc;"></i> <h8 style="color: #f0eadc;">Agregar Competencia</h8>
                                    </button>
                                </div>
                            <!-- Inputs Condiciones y beneficios -->
                                @foreach($competencias as $indice => $comp)
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="competenciaId">Habilidad Interpersonal*</label>
                                        <select wire:model="competencias.{{ $indice }}.competenciaId" type="text" class="form-control" id="competencias.{{ $indice }}.competenciaId">
                                            <option selected>- Selecciona Comptencias -</option>
                                            @foreach($competenciasTable as $competencia)
                                            <option value="{{ $competencia->competenciaId }}">{{$competencia->nombreCompetencia}}</option>
                                            @endforeach
                                        </select>
                                        @error('competencias.' . $indice . '.competenciaId') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>                                    
                                    <div class="col-4 d-flex align-items-center">
                                        <a class="dropdown-item" wire:click="removeCompetencias({{$indice}})"><i class="fa fa-trash"></i> Eliminar </a>
                                    </div>
                                </div>
                                <br/>
                                @endforeach
                                <!-- Fin inputs Condiciones y beneficios -->
                                <!-- inicio botones -->
                                <div class="form-group">
                                <!-- boton anterior -->
                                    <button type="button" wire:click="pasoAnterior(5)" data-bs-toggle="collapse" data-bs-target="#collapseFive" class="btn btn-primary" style="background-color: #005c35;" >Anterior</button>
                                </div>
                                <!-- Fin botones -->
                            </div>
                        </div>
                    </div>
                
                </div>
                <!-- fin acordeon -->
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn close-btn" data-bs-dismiss="modal" style="background-color: #d3d3d3;"><b>Cancelar</b></button>
                <button type="button" wire:click.prevent="process()" data-bs-dismiss="modal" class="btn btn-primary" style="background-color: #005c35;">Guardar</button>
            </div>
        </div>
    </div>
</div>


<!-- Show Modal -->
<div wire:ignore.self class="modal fade modal-lg modal-dialog-scrollable" id="VerOfertaModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="VerOfertaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
       <div class="modal-content">
            
            <div class="modal-header" style="background-color: #005c35;">
                <h5 class="modal-title" id="VerOfertaModalLabel" style="color: #f0eadc;"><b>{{ $nombrePuesto }}</b></h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="color: #f0eadc;">
                <div style="display: flex; justify-content: center; align-items: center; max-height: 300px; overflow: hidden;">
                    <img src="{{ Storage::url('ofertaslab/'. $imagenPuesto) }}" style="object-fit: cover; object-position: center;" alt="Imagen de Puesto">
                </div>
                    <br/>
                    <form>
                    <div class="form-group">
                        <h5 for="nombre_empresa"><b style="color: black;">{{ $nombre_empresa }}</b></h5>
                    </div>
                    <div class="hstack gap-3">
                        <div style="display: inline-block; width: 100%;">
                            <div class="mb-2">
                                <small style="color: #373737;"><i class="fa-regular fa-calendar"></i> Fecha límite para postulación: {{ date('d-m-Y', strtotime($fechaMax)) }}</small>
                            </div>
                        </div>
                        <div style="display: inline-block; width: 100%;">
                            <div class="mb-2">
                            <small style="color: #373737;"><i class="fa-solid fa-circle-info"></i> Edad miníma requerida: {{ $edadRequerida }}</small>
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
                    </form> 
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
                                <!-- Habilidades técnicas -->
                                <div style="flex: 1;">
                                    <div class="mb-2">
                                        <p class="fs-6"><b style="color: black;">Habilidades técnicas </b></p>
                                         <!-- Inputs Habilidades Técnicas -->
                                            @forelse($tecnicasShow as $tecnica)
                                            <ul class="ul-check">
                                                <li class="li-check" style="color: #373737;">
                                                    {{ $tecnica->nombreTecnica }}
                                                </li>
                                            </ul>
                                            @empty
                                            <p style="color: #373737;">Sin habilidades técnicas requeridas</p>
                                            @endforelse 
                                        <!-- Fin inputs Habilidades Técnicas -->
                                    </div>
                                </div>

                                <!-- Habilidades interpersonales -->
                                <div style="flex: 1;">
                                    <div class="mb-2">
                                        <p class="fs-6"><b style="color: black;">Habilidades Interpersonales</b></p>
                                        <!-- Inputs Habilidades Interpersonales -->                          
                                            @forelse($interpersonalesShow as $interpersonal)
                                                <div>
                                                    <ul class="ul-check">
                                                        <li class="li-check" style="color: #373737;">
                                                            {{ $interpersonal->nombreInterpersonal }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            @empty
                                                <p style="color: #373737;">Sin habilidades interpersonales requeridas</p>
                                            @endforelse                           
                                        <!-- Fin inputs Habilidades Interpersonales -->
                                    </div>
                                </div>

                                <!-- Competencias comportamentales -->
                                <div style="flex: 1;">
                                    <div class="mb-2">
                                        <p class="fs-6"><b style="color: black;">Competencias comportamentales</b></p>
                                        <!-- Inputs Competencias -->
                                        @forelse($competenciasShow as $competencia)
                                            <ul class="ul-check">
                                                <li class="li-check" style="color: #373737;">
                                                    {{ $competencia->nombreCompetencia }}
                                                </li>
                                            </ul>
                                        @empty
                                            <p style="color: #373737;">Sin competencias requeridas</p>
                                        @endforelse
                                        <!-- Fin inputs Competencias -->
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



<!-- Ver Postulaciones Modal -->
<div wire:ignore.self class="modal fade modal-xl modal-dialog-scrollable" id="VerPostulacionesModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="VerPostulacionesModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;">
                <h5 class="modal-title" id="VerPostulacionesModalLabel" style="color: #f0eadc;">Postulaciones - {{$nombreOferta}}</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
           <div class="modal-body">
           
           <div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td style="background-color: #005c35;"><b style="color: #f0eadc;">#</b></td> 
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Fecha de postulación</b></th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Postulante</b></th>
                                <th style="background-color: #005c35;"><b style="color: #f0eadc;">Curriculum</b></th>
								<td style="background-color: #005c35;"><b style="color: #f0eadc;">Acciones</b></td>
							</tr>
						</thead>
						<tbody>
                        @if($postulaciones)
                            @foreach($postulaciones as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{date('d-m-Y', strtotime($row->fechaPostulacion))}}</td>
								<td>{{ $row-> estudiante -> nombre }}, {{ $row-> estudiante -> apellidos }}</td>
                                <td>
                                    @if($row->estudiante  && File::exists($row->estudiante->curriculum))
                                        <a href="{{ $row->estudiante->curriculum }}" target="_blank"> Ver archivo </a>
                                    @else
                                        Sin currículum disponible
                                    @endif
                                </td>
								<td width="90">
									<a data-bs-toggle="modal" data-bs-target="#createEntrevistaModal" class="dropdown-item" wire:click="setPostulacionId({{$row->postulacionId}})"><i class="fa fa-clipboard-question"></i> Entrevista </a>					
								</td>
							</tr>
							@endforeach
                        @else
							<tr>
								<td class="text-center" colspan="100%">Sin datos</td>
							</tr>
                        @endif
						</tbody>
					</table>						
					</div>
				</div>
            </div>
        </div>
    </div>
</div>

<!-- Ver Entrevistas Modal -->


<!-- CREAR Entrevista Modal -->
<div wire:ignore.self class="modal fade" id="createEntrevistaModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createEntrevistaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;">
                <h5 class="modal-title" id="createEntrevistaModalLabel" style="color: #f0eadc;">Agendar Entrevista</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="tituloEntrevista">Título de entrevista</label>
                        <input wire:model="tituloEntrevista" type="text" class="form-control" id="tituloEntrevista" placeholder="Ej. Analista de sistemas">@error('tituloEntrevista') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="descripcionEntrevista">Descripción de entrevista</label>
                        <textarea wire:model="descripcionEntrevista" type="text" class="form-control" id="descripcionEntrevista" placeholder="Ej. Usar vestimenta formal, traer papelería completa">@error('descripcionEntrevista') <span class="error text-danger">{{ $message }}</span> @enderror</textarea>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="FechaEntrevista">Fecha de entrevista</label>
                        <input wire:model="FechaEntrevista" type="date" class="form-control" id="FechaEntrevista" placeholder="Fechaentrevista">@error('FechaEntrevista') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="horaInicio">Hora de inicio</label>
                        <input wire:model="horaInicio" type="time" class="form-control" id="horaInicio" placeholder="Hora Inicio">@error('horaInicio') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="horaFinal">Hora de finalización</label>
                        <input wire:model="horaFinal" type="time" class="form-control" id="horaFinal" placeholder="Hora Final">@error('horaFinal') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  close-btn" style="background-color: #d3d3d3;" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" wire:click.prevent="newEntrevista()" class="btn btn-primary" style="background-color: #005c35;">Guardar</button>
            </div>
        </div>
    </div>
</div>


<!-- Eliminar -->
<div wire:ignore.self class="modal fade" id="EliminarOfertaModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="EliminarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header"style="background-color: #005c35;">
                <h5 class="modal-title" id="EliminarModalLabel"style="color: #f0eadc;"> Eliminar</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <h5 class="modal-title" style="color: black;">Seguro que desea eliminar este dato?</h5>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn" style="background-color: #005c35;" data-bs-dismiss="modal"><b style ="color: #d3d3d3;">Cancelar</b></button>
                <button type="button" wire:click="destroy" class="btn btn-primary" style="background-color:  #d3d3d3;" data-bs-dismiss="modal"><b style="color: black;">Sí, deseo eliminarlo<b></button>
            </div>
       </div>
    </div>
</div>


<!-- Desactivar Modal -->
<div wire:ignore.self class="modal fade modal-xl modal-dialog-scrollable" id="desactivarDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;">
                <h5 class="modal-title" id="updateModalLabel" style="color: #f0eadc;">Cerrar Oferta</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="color: #f0eadc;">
                <div class="hstack gap-3">
                    <div style="display: inline-block; width: 100%;">
                        <div class="mb-1">
                            <label for="comentarioCierre" style="font-size: 15px;"><b style="color: black">Comentario de Cierre*</b></label>
                            <textarea wire:model="comentarioCierre" type="text" class="form-control" id="comentarioCierre"  wire:ignore></textarea>
                            @error('comentarioCierre') <span style="font-size: 15px;" class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>  
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn" style="background-color: #d3d3d3;" data-bs-dismiss="modal"><b>Cancelar</b></button>
                <button type="button" wire:click.prevent="updateEstado()" class="btn btn-primary" data-bs-dismiss="modal" style="background-color: #005c35;">Cerrar Oferta</button>
            </div>
       </div>
    </div>
</div>

<!-- Editar Imagen -->
<div wire:ignore.self class="modal fade" id="ImagenDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ImagenDataModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header"style="background-color: #005c35;">
                <h5 class="modal-title" id="ImagenDataModal"style="color: #f0eadc;"> Editar imagen</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form>
                <div class="form-group" >
                        <label for="imagenPuesto"><b style="color: black;">Seleccione un nuevo archivo de imagen<b></label>
                        <input wire:model="imagenPuesto" type="file" accept="image/png, image/jpeg, image/jpg" class="form-control" id="imagenPuesto" placeholder="imagenPuesto">
                        @error('imagenPuesto') 
                            <span style="font-size: 15px;" class="error text-danger">{{ $message }}</span> 
                        @enderror
                        <div wire:loading wire:target="imagenPuesto"><h6 style="color: #005c35;"><b>Cargando imagen...</b></h6></div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" wire:loading.attr="disabled"  wire:target="imagenPuesto" class="btn" style="background-color:#d3d3d3;" data-bs-dismiss="modal"><b>Cancelar</b></button>
                <button type="button" wire:click="GuardarImagen"  wire:loading.attr="disabled"  wire:target="imagenPuesto" class="btn btn-primary" style="background-color: #005c35;">Actualizar</button>
            </div>
       </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('recargarComponente', function () {
             setTimeout(function () {
                location.reload();
            });
        });
    });
</script>

<script>
    document.addEventListener('livewire:load', function () {
        // Inicializar el popover después de que se carga Livewire
        new bootstrap.Popover(document.querySelector('[data-bs-toggle="popover"]'));
    });
</script>