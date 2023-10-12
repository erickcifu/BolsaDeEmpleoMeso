<!-- Add Modal -->
<div wire:ignore.self class="modal fade modal-xl modal-dialog-scrollable" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;" >
                <h5 class="modal-title" id="createDataModalLabel" style="color: #f0eadc;">Crear oferta</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: #f0eadc;"></button>
            </div>
            <div class="modal-body" style="color: #f0eadc;">
                <!-- Acordeon -->
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item" id="item1">
                        <h2 class="accordion-header">
                        <button class="accordion-button" style="color: #005c35;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" disabled>
                            <b>Información general de la oferta</b>
                        </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" wire:ignore.self  data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        <div class="hstack gap-3">
                            <div style="display: inline-block; width: 100%;">
                                <div class="mb-2">
                                    <label for="imagenPuesto">Imagen</label>
                                    <input wire:model="imagenPuesto" type="file" accept="image/*" class="form-control" id="imagenPuesto" placeholder="Imagen">
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
                            <button wire:click="siguientePaso" type="button" class="btn btn-primary" style="background-color: #005c35;" @if($paso === 2) data-bs-toggle="collapse" data-bs-target="#collapseTwo" @endif>
                                Siguiente
                            </button>
                            </div>
                            <!-- Fin boton siguiente -->
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item" id="item2">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed"  style="color: #005c35;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"  data-bs-parent="#accordionExample" disabled>
                        <b> Requisitos del puesto </b>
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
                                <button wire:click="pasoAnterior" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" class="btn btn-primary" style="background-color: #005c35;" >Anterior</button>
                            <!-- Fin boton anterior -->
                            <!-- boton siguiente -->
                                <button type="button"  wire:click="siguientePaso" style="background-color: #005c35;"class="btn btn-primary"
                                @if($paso === 3)
                                    data-bs-toggle="collapse" data-bs-target="#collapseThree"  @endif>Siguiente</button>
                            </div>
                            <!-- Fin boton siguiente -->
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item" id="item3">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed"  style="color: #005c35;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"  data-bs-parent="#accordionExample" disabled>
                        <b> Condiciones y beneficios </b>
                        </button>
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
                                    <button type="button" wire:click="pasoAnterior" data-bs-toggle="collapse" data-bs-target="#collapseTwo" class="btn btn-primary" style="background-color: #005c35;" >Anterior</button>
                                </div>
                                <!-- Fin botones -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- fin acordeon -->
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn close-btn" data-bs-dismiss="modal" style="background-color: #d3d3d3;"><b>Cancelar</b></button>
                    <button type="button" wire:click.prevent="store()" data-bs-dismiss="modal" class="btn btn-primary" style="background-color: #005c35;">Guardar</button>
                </div>
        </div>
    </div>
</div>



<!-- Edit Modal -->
<div wire:ignore.self class="modal fade modal-xl modal-dialog-scrollable" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;">
                <h5 class="modal-title" id="updateModalLabel" style="color: #f0eadc;">Actualizar Oferta</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="color: #f0eadc;">
            <div class="accordion" id="accordionExample">
                    <div class="accordion-item" id="item1">
                        <h2 class="accordion-header">
                        <button class="accordion-button" style="color: #005c35;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" disabled>
                            <b>Información general de la oferta</b>
                        </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" wire:ignore.self   data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        <div class="hstack gap-3">
                            <div style="display: inline-block; width: 100%;">
                                <div class="mb-2">
                                    <label for="imagenPuesto">Imagen</label>
                                    <input wire:model="imagenPuesto" type="file" class="form-control" id="imagenPuesto" placeholder="Imagen">
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
                            <button wire:click="siguientePaso" type="button" class="btn btn-primary" style="background-color: #005c35;" @if($paso === 2) data-bs-toggle="collapse" data-bs-target="#collapseTwo" @endif>
                                Siguiente
                            </button>
                            </div>
                            <!-- Fin boton siguiente -->
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item" id="item2">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed"  style="color: #005c35;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"  data-bs-parent="#accordionExample" disabled>
                        <b> Requisitos del puesto </b>
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
                                <button wire:click="pasoAnterior" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" class="btn btn-primary" style="background-color: #005c35;" >Anterior</button>
                            <!-- Fin boton anterior -->
                            <!-- boton siguiente -->
                                <button type="button"  wire:click="siguientePaso" style="background-color: #005c35;"class="btn btn-primary"
                                @if($paso === 3)
                                    data-bs-toggle="collapse" data-bs-target="#collapseThree"  @endif>Siguiente</button>
                            </div>
                            <!-- Fin boton siguiente -->
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item" id="item3">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed"  style="color: #005c35;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"  data-bs-parent="#accordionExample" disabled>
                        <b> Condiciones y beneficios </b>
                        </button>
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
                                    <button type="button" wire:click="pasoAnterior" data-bs-toggle="collapse" data-bs-target="#collapseTwo" class="btn btn-primary" style="background-color: #005c35;" >Anterior</button>
                                </div>
                                <!-- Fin botones -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn" style="background-color: #d3d3d3;" data-bs-dismiss="modal"><b>Cancelar</b></button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" style="background-color: #005c35;">Guardar</button>
            </div>
       </div>
    </div>
</div>


<!-- Show Modal -->
<div wire:ignore.self class="modal fade modal-xl modal-dialog-scrollable" id="VerOfertaModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;">
                <h5 class="modal-title" id="updateModalLabel" style="color: #f0eadc;">Detalle de Oferta</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="color: #f0eadc;">
            <div class="accordion" id="accordionExample">
                    <div class="accordion-item" id="item1">
                        <h2 class="accordion-header">
                        <button class="accordion-button" style="color: #005c35;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" disabled>
                            <b>---------- Información general de la oferta ----------</b>
                        </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show"  data-bs-parent="#accordionExample" disabled>
                        <div class="accordion-body">
                        <div class="hstack gap-3">
                            <div style="display: inline-block; width: 100%;">
                                <div class="mb-2">
                                    <label for="imagenPuesto">Imagen</label>
                                    <input wire:model="imagenPuesto" type="file" class="form-control" id="imagenPuesto" placeholder="Imagen" disabled>
                                </div>
                                @error('imagenPuesto') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div style="display: inline-block; width: 100%;">
                                <div class="mb-2">
                                    <label for="fechaMax">Fecha límite</label>
                                    <input wire:model="fechaMax" type="date" class="form-control" id="fechaMax" placeholder="Fecha límite" disabled>
                                </div>
                                @error('fechaMax') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                            <br/>
                            <div class="form-group">
                                <label for="nombrePuesto"><b style="color: black;">Puesto*<b></label>
                                <input wire:model="nombrePuesto" type="text" class="form-control" id="nombrePuesto" placeholder="Nombre del puesto" disabled>@error('nombrePuesto') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <br/>
                            <div class="hstack gap-3">
                                <div style="display: inline-block; width: 100%;">
                                    <div class="mb-2">
                                        <label for="resumenPuesto">Resumen del puesto*</label>
                                        <textarea wire:model="resumenPuesto" class="form-control" id="resumenPuesto" placeholder="Descripcion puesto" disabled></textarea>
                                        @error('resumenPuesto') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div style="display: inline-block; width: 100%;">
                                    <div class="mb-2">
                                        <label for="responsabilidadesPuesto">Responsabilidades principales*</label>
                                        <textarea wire:model="responsabilidadesPuesto" class="form-control" id="responsabilidadesPuesto" placeholder="Responsabilidades" disabled></textarea>
                                        @error('responsabilidadesPuesto') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="hstack gap-3">
                                <div style="display: inline-block; width: 100%;">
                                    <div class="mb-2">
                                        <label for="sueldoMinimo">Sueldo mínimo (Q.)</label>
                                        <input wire:model="sueldoMinimo" type="number" step="0.01" class="form-control" id="sueldoMinimo" disabled>
                                        @error('sueldoMinimo') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div style="display: inline-block; width: 100%;">
                                    <div class="mb-2">
                                        <label for="sueldoMax">Sueldo máximo (Q.)</label>
                                        <input wire:model="sueldoMax" type="number" step="0.01" class="form-control" id="sueldoMax" disabled>
                                        @error('sueldoMax') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="hstack gap-3">
                                <div style="display: inline-block; width: 100%;">
                                    <div class=" mb-3">
                                        <label for="cantVacantes">Cantidad de vacantes</label>
                                        <input wire:model="cantVacantes" type="number" class="form-control" id="cantVacantes" placeholder="Puestos vacantes" disabled>
                                        @error('cantVacantes') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div style="display: inline-block; width: 100%;">
                                    <div class=" mb-3">
                                        <label for="modalidadTrabajo">Modalidad de trabajo</label>
                                        <select wire:model="modalidadTrabajo" type="text" class="form-control" id="modalidadTrabajo" placeholder="Tipo de contratacion" disabled>
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
                                        <select wire:model="jornadaLaboral" type="text" class="form-control" id="jornadaLaboral" placeholder="Tipo de contratacion" disabled>
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
                            
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item" id="item2">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed"  style="color: #005c35;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"  data-bs-parent="#accordionExample" disabled>
                        <b>---------- Requisitos del puesto ----------</b>
                        </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse show" data-bs-parent="#accordionExample" disabled>
                        <div class="accordion-body">
                            <!-- Requisitos del puesto -->
                            <div class="hstack gap-3">
                                <div style="display: inline-block; width: 100%;">
                                    <div class="mb-2">
                                        <label for="requisitosEducativos">Requisitos educativos*</label>
                                        <textarea wire:model="requisitosEducativos" type="text" class="form-control" id="requisitosEducativos" placeholder="Dividir por '-'" disabled ></textarea>
                                        @error('requisitosEducativos') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div style="display: inline-block; width: 100%;">
                                    <div class="mb-2">
                                        <label for="experienciaLaboral">Experiencia laboral*</label>
                                        <textarea wire:model="experienciaLaboral" type="text" class="form-control" id="experienciaLaboral" placeholder="Dividir por '-'" disabled></textarea>
                                        @error('experienciaLaboral') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="hstack gap-3">
                                <div style="display: inline-block; width: 100%;">
                                    <div class="mb-3">
                                        <label for="edadRequerida">Edad requerida</label>
                                        <input wire:model="edadRequerida" type="number" class="form-control" id="edadRequerida" placeholder="Edad mínima requerida" disabled>
                                        @error('edadRequerida') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div style="display: inline-block; width: 100%;">
                                    <div class="mb-3">
                                        <label for="generoRequerido">Género</label>
                                        <select wire:model="generoRequerido" type="text" class="form-control" id="generoRequerido" placeholder="Genero" disabled>
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
                                        <select wire:model="facultad_id" class="form-control" id="facultad_id" placeholder="Facultad" disabled>
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
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item" id="item3">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed"  style="color: #005c35;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"  data-bs-parent="#accordionExample" disabled>
                        <b>---------- Condiciones y beneficios ---------- </b>
                        </button>
                        <div id="collapseThree" class="accordion-collapse collapse show"  wire:ignore.self data-bs-parent="#accordionExample" disabled>
                            <div class="accordion-body">
                            <!-- Inputs Condiciones y beneficios -->
                                <label for="condicionesLaborales" style="font-size: 15px;"><b>Condiciones*</b></label>
                                <textarea wire:model="condicionesLaborales" type="text" class="form-control" id="condicionesLaborales" placeholder="Dividir por '-'" disabled ></textarea>@error('condicionesLaborales') <span style="font-size: 15px;" class="error text-danger">{{ $message }}</span> @enderror
                                <br/>
                                <div class="hstack gap-3">
                                    <div style="display: inline-block; width: 100%;">
                                        <div class=" mb-2">
                                            <label for="beneficios" style="font-size: 15px;"><b>Beneficios*</b></label>
                                            <textarea wire:model="beneficios" type="text" class="form-control" id="beneficios" placeholder="Dividir por '-'" disabled></textarea>
                                            @error('beneficios') <span style="font-size: 15px;" class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div style="display: inline-block; width: 100%;">
                                        <div class="mb-2">
                                            <label for="oportunidadesDesarrollo" style="font-size: 15px;"><b>Oportunidades de desarrollo dentro de la empresa*</b></label>
                                            <textarea wire:model="oportunidadesDesarrollo" type="text" class="form-control" id="oportunidadesDesarrollo" placeholder="Dividir por '-'" disabled></textarea>
                                            @error('oportunidadesDesarrollo') <span style="font-size: 15px;" class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>          
                                <!-- Fin inputs Condiciones y beneficios -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn" style="background-color: #d3d3d3;" data-bs-dismiss="modal"><b>Cancelar</b></button>
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
                        <label for="oferta_id">Oferta laboral</label>
                        <input wire:model="oferta_id" type="text" class="form-control" id="oferta_id" placeholder="Oferta Id" readonly>@error('oferta_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn close-btn" data-bs-dismiss="modal" style="background-color: #d3d3d3;">Cancelar</button>
                <button type="button" wire:click.prevent="postular()" class="btn btn-primary" style="background-color: #005c35;">Sí, deseo postularme!</button>
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