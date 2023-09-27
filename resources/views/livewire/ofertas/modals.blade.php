<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;" >
                <h5 class="modal-title" id="createDataModalLabel" style="color: #f0eadc;">Crear Oferta</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: #f0eadc;"></button>
            </div>
           <div class="modal-body" style="color: #f0eadc;">
				<form>
                    <div class="form-group">
                        <label for="puesto"><b style="color: black;">Puesto<b></label>
                        <input wire:model="puesto" type="text" class="form-control" id="puesto" placeholder="Nombre del puesto">@error('puesto') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="descripcion"><b style="color: black;">Descripción<b></label>
                        <textarea wire:model="descripcion" type="text" class="form-control" id="descripcion" placeholder="Descripcion del puesto">@error('descripcion') <span class="error text-danger">{{ $message }}</span> @enderror</textarea>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="imagen"><b style="color: black;">Imagen<b></label>
                        <input wire:model="imagen" type="file" class="form-control" id="imagen" placeholder="Imagen">@error('imagen') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group row g-12 align-items-center">
                        <div class="col mb-2">
                            <label for="sueldoMinimo"><b>Sueldo mínimo (Q.)<b></label>
                            <input wire:model="sueldoMinimo" type="number" step="0.01" class="form-control" id="sueldoMinimo" placeholder="Sueldo Mínimo (Q.)">@error('sueldoMinimo') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col">
                            <label for="sueldoMax"><b>Sueldo máximo (Q.)<b></label>
                            <input wire:model="sueldoMax" type="number" step="0.01" class="form-control" id="sueldoMax" placeholder="Sueldo Máximo (Q.)">@error('sueldoMax') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="fecha"><b style="color: black;">Fecha límite<b></label>
                        <input wire:model="fecha" type="date" class="form-control" id="fecha" placeholder="Fecha límite">@error('fecha') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group row g-12 align-items-center">
                        <div class="col">
                            <label for="puestoVacante"><b style="color: black;">Cantidad de vacantes<b></label>
                            <input wire:model="puestoVacante" type="number" class="form-control" id="puestoVacante" placeholder="Puestos vacantes">@error('puestoVacante') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <br/>
                        <div class="col">
                        <label for="tipoContratacion"><b style="color: black;">Tipo de contratación<b></label>
                        <select wire:model="tipoContratacion" type="text" class="form-control" id="tipoContratacion" placeholder="Tipo de contratacion">@error('tipoContratacion') <span class="error text-danger">{{ $message }}</span> @enderror 
                            <option selected>Tipo de contratación</option>
                            <option value="Virtual">Virtual</option>
                            <option value="Presencial">Presencial</option>
                            <option value="Híbrido">Híbrido</option>
                        </select>
                        </div>
                    </div>
                    <br/>
                    <div class="form-group row g-12 align-items-center">
                        <div class="col">
                            <label for="edadRequerida"><b style="color: black;">Edad requerida<b></label>
                            <input wire:model="edadRequerida" type="number" class="form-control" id="edadRequerida" placeholder="Edad mínima requerida">@error('edadRequerida') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <br/>
                        <div class="col">
                            <label for="genero"><b style="color: black;">Género<b></label>
                            <select wire:model="genero" type="text" class="form-control" id="genero" placeholder="Genero">@error('genero') <span class="error text-danger">{{ $message }}</span> @enderror
                                <option selected>Género</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Ambos">Ambos</option>
                            </select>
                        </div>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="perfil"><b style="color: black;">Perfil<b></label>
                        <input wire:model="perfil" type="text" class="form-control" id="perfil" placeholder="Perfil">@error('perfil') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn close-btn" data-bs-dismiss="modal" style="background-color: #d3d3d3;"><b>Cancelar</b></button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary" style="background-color: #005c35;">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;">
                <h5 class="modal-title" id="updateModalLabel" style="color: #f0eadc;">Actualizar Oferta</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="color: #f0eadc;">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="puesto"><b style="color: black;">Puesto</b></label>
                        <input wire:model="puesto" type="text" class="form-control" id="puesto" placeholder="Puesto">@error('puesto') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="descripcion"><b style="color: black;">Descripción</b></label>
                        <textarea wire:model="descripcion" type="text" class="form-control" id="descripcion" placeholder="Descripción del puesto">@error('descripcion') <span class="error text-danger">{{ $message }}</span> @enderror </textarea>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="imagen"><b style="color: black;">Imagen</b></label>
                        <input wire:model="imagen" type="file" class="form-control" id="imagen" placeholder="Imagen">@error('imagen') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="sueldoMinimo"><b style="color: black;">Sueldo mínimo</b></label>
                        <input wire:model="sueldoMinimo" type="float" class="form-control" id="sueldoMinimo" placeholder="Sueldo mínimo">@error('sueldoMinimo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="sueldoMax"><b style="color: black;">Sueldo máximo</b></label>
                        <input wire:model="sueldoMax" type="float" class="form-control" id="sueldoMax" placeholder="Sueldo máximo">@error('sueldoMax') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="fecha"><b style="color: black;">Fecha límite</b></label>
                        <input wire:model="fecha" type="date" class="form-control" id="fecha" placeholder="Fecha">@error('fecha') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="puestoVacante"><b style="color: black;">Cantidad de vacantes</b></label>
                        <input wire:model="puestoVacante" type="number" class="form-control" id="puestoVacante" placeholder="Puestos vacantes">@error('puestoVacante') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="tipoContratacion"><b style="color: black;">Tipo de contratación</b></label>
                        <select wire:model="tipoContratacion" type="text" class="form-control" id="tipoContratacion" placeholder="Tipo de contratacion">@error('tipoContratacion') <span class="error text-danger">{{ $message }}</span> @enderror 
                            <option selected>Tipo de contratación</option>
                            <option value="Virtual">Virtual</option>
                            <option value="Presencial">Presencial</option>
                            <option value="Híbrido">Híbrido</option>
                        </select>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="edadRequerida"><b style="color: black;">Edad requerida</b></label>
                        <input wire:model="edadRequerida" type="number" class="form-control" id="edadRequerida" placeholder="Edad mínima requerida">@error('edadRequerida') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="genero"><b style="color: black;">Género</b></label>
                        <select wire:model="genero" type="text" class="form-control" id="genero" placeholder="Género">@error('genero') <span class="error text-danger">{{ $message }}</span> @enderror 
                            <option selected>Género</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Ambos">Ambos</option>
                        </select>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="perfil"><b style="color: black;">Perfil</b></label>
                        <input wire:model="perfil" type="text" class="form-control" id="perfil" placeholder="Perfil requerido">@error('perfil') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="empresa_id"></label>
                        <input wire:model="empresa_id" type="number" class="form-control" id="empresa_id" placeholder="Empresa Id" value="1" hidden>@error('empresa_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn" style="background-color: #d3d3d3;" data-bs-dismiss="modal"><b>Cancelar</b></button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" style="background-color: #005c35;">Guardar</button>
            </div>
       </div>
    </div>
</div>


<!-- Show Modal -->
<div wire:ignore.self class="modal fade" id="VerOfertaModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;">
                <h5 class="modal-title" id="updateModalLabel" style="color: #f0eadc;">Actualizar Oferta</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="color: #f0eadc;">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="puesto"><b style="color: black;">Puesto</b></label>
                        <input wire:model="puesto" type="text" class="form-control" id="puesto" readonly>@error('puesto') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="descripcion"><b style="color: black;">Descripción</b></label>
                        <textarea wire:model="descripcion" type="text" class="form-control" id="descripcion" readonly>@error('descripcion') <span class="error text-danger">{{ $message }}</span> @enderror </textarea>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="imagen"><b style="color: black;">Imagen</b></label>
                        <input wire:model="imagen" type="file" class="form-control" id="imagen" readonly>@error('imagen') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="sueldoMinimo"><b style="color: black;">Sueldo mínimo</b></label>
                        <input wire:model="sueldoMinimo" type="float" class="form-control" id="sueldoMinimo" readonly>@error('sueldoMinimo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="sueldoMax"><b style="color: black;">Sueldo máximo</b></label>
                        <input wire:model="sueldoMax" type="float" class="form-control" id="sueldoMax" readonly>@error('sueldoMax') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="fecha"><b style="color: black;">Fecha límite</b></label>
                        <input wire:model="fecha" type="date" class="form-control" id="fecha" readonly>@error('fecha') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="puestoVacante"><b style="color: black;">Cantidad de vacantes</b></label>
                        <input wire:model="puestoVacante" type="number" class="form-control" id="puestoVacante" readonly>@error('puestoVacante') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="tipoContratacion"><b style="color: black;">Tipo de contratación</b></label>
                        <select wire:model="tipoContratacion" type="text" class="form-control" id="tipoContratacion" readonly>@error('tipoContratacion') <span class="error text-danger">{{ $message }}</span> @enderror 
                            <option selected>Tipo de contratación</option>
                            <option value="Virtual">Virtual</option>
                            <option value="Presencial">Presencial</option>
                            <option value="Híbrido">Híbrido</option>
                        </select>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="edadRequerida"><b style="color: black;">Edad requerida</b></label>
                        <input wire:model="edadRequerida" type="number" class="form-control" id="edadRequerida" readonly>@error('edadRequerida') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="genero"><b style="color: black;">Género</b></label>
                        <select wire:model="genero" type="text" class="form-control" id="genero" readonly>@error('genero') <span class="error text-danger">{{ $message }}</span> @enderror 
                            <option selected>Género</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Ambos">Ambos</option>
                        </select>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="perfil"><b style="color: black;">Perfil</b></label>
                        <input wire:model="perfil" type="text" class="form-control" id="perfil" readonly>@error('perfil') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="empresa_id"></label>
                        <input wire:model="empresa_id" type="number" class="form-control" id="empresa_id" value="1" hidden>@error('empresa_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
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
