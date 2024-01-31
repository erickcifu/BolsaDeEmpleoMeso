
<!-- Edit Modal -->
<div wire:ignore.self class="modal fade modal-xl modal-dialog-scrollable" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
       <div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;">
                <h5 class="modal-title" id="updateModalLabel" style="color: #f0eadc;">Editar perfil</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombre" class="form-label"><b style="color: black;">Nombres</b></label>
                            <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombres">
                            @error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="apellidos" class="form-label"><b style="color: black;">Apellidos</b></label>
                            <input wire:model="apellidos" type="text" class="form-control" id="apellidos" placeholder="Apellidos">
                            @error('apellidos') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="carnet" class="form-label"><b style="color: black;">No. Carné</b></label>
                            <input wire:model="carnet" type="number" class="form-control" id="carnet" placeholder="Número de carné">
                            @error('carnet') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="DPI" class="form-label"><b style="color: black;">No. DPI/CUI</b></label>
                            <input wire:model="DPI" type="number" class="form-control" id="DPI" placeholder="No. DPI/CUI">
                            @error('DPI') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="numero_domiciliar" class="form-label"><b style="color: black;">Otro número de teléfono</b></label>
                            <input wire:model="numero_domiciliar" type="number" class="form-control" id="numero_domiciliar" placeholder="Numero Domiciliar">
                            @error('numero_domiciliar') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="numero_personal" class="form-label"><b style="color: black;">Número personal</b></label>
                            <input wire:model="numero_personal" type="number" class="form-control" id="numero_personal" placeholder="Numero Personal">
                            @error('numero_personal') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
           
                    <div class="mb-2">
                        <label for="correo"><b style="color: black;">Correo electrónico<b></label>
                        <input wire:model="correo" type="email" class="form-control" id="correo" placeholder="Correo electrónico">@error('correo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="hstack gap-3">
                        <div style="display: inline-block; width: 100vh;"> 
                            <div class="mb-2">
                                <label for="departamento_id"><b style="color: black;">Departamento</b></label>
                                <select wire:model="departamento_id" class="form-control" id="departamento_id" placeholder="Departamento">
                                <option selected>Seleccionar departamento</option>
                                    @foreach ($departamentos as $departamento)
                                        <option value="{{ $departamento->departamentoId }}">{{ $departamento->nombreDepartamento }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div style="display: inline-block; width: 100vh;"> 
                            <div class="mb-2">
                                <label for="municipio_id"><b style="color: black;">Municipio<b></label>
                                <select wire:model="municipio_id"  class="form-control" id="municipio_id" placeholder="Municipio">
                                <option selected>Seleccionar municipio</option>
                                    @foreach ($municipios as $municipio)
                                        @if ($municipio->departamento_id == $departamento_id)
                                            <option value="{{ $municipio->municipioId }}">{{ $municipio->nombreMunicipio }}</option>
                                        @endif
                                    @endforeach
                                </select>    
                            </div>
                        </div>
                    </div>    
                    <div class="hstack gap-3">
                        <div style="display: inline-block; width: 100vh;"> 
                            <div class="mb-2">
                                <label for="facultad_id"><b style="color: black;">Facultad</b></label>
                                <select wire:model="facultad_id" class="form-control" id="facultad_id" placeholder="Facultad">
                                <option selected>Seleccionar facultad</option>
                                    @foreach ($facultades as $facultad)
                                        <option value="{{ $facultad->id }}">{{ $facultad->Nfacultad }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div style="display: inline-block; width: 100vh;"> 
                            <div class="mb-2">
                                <label for="carrera_id"><b style="color: black;">Carrera</b></label>
                                <select wire:model="carrera_id" class="form-control" id="carrera_id" placeholder="Carrera">
                                <option selected>Seleccionar carrera</option>    
                                @foreach ($carreras as $carrera)
                                        @if ($carrera->facultad_id == $facultad_id)
                                            <option value="{{ $carrera->id }}">{{ $carrera->Ncarrera }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
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


<!-- editar curriculum -->
<div wire:ignore.self class="modal fade" id="curriculumDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="curiculumModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header"style="background-color: #005c35;">
                <h5 class="modal-title" id="curriculumModalLabel"style="color: #f0eadc;"> Editar currículum</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-2">
                        <label for="curriculum"><b style="color: black;">Currículum (seleccione un archivo pdf)<b> <br>
                        
                        </label>
                        <input wire:model="curriculum" type="file" accept="application/pdf" class="form-control" id="curriculum" placeholder="curriculum">@error('curriculum') <span class="error text-danger">{{ $message }}</span> @enderror
                        <div wire:loading wire:target="curriculum"><h6 style="color: #005c35;"><b>Cargando archivo...</b></h6></div>
                    </div>                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" wire:loading.attr="disabled"  wire:target="curriculum" class="btn" style="background-color:#d3d3d3;" data-bs-dismiss="modal"><b>Cancelar</b></button>
                <button type="button" wire:click.prevent="cv()" wire:loading.attr="disabled"  wire:target="curriculum" class="btn btn-primary" style="background-color: #005c35;">Actualizar</button>
            </div>
       </div>
    </div>
</div>
