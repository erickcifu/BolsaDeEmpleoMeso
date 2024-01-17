<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;">
                <h5 class="modal-title" id="createDataModalLabel" style="color: #f0eadc;">Crear Estudiante</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: #f0eadc;"></button>
            </div>
           <div class="modal-body" style="color: #f0eadc;">
				<form>
                    <div class="form-group">
                        <label for="nombre"><b style="color: black;">Nombres<b></label>
                        <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">
                        @error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>                           
                    <div class="form-group">
                        <label for="apellidos"><b style="color: black;">Apellidos<b></label>
                        <input wire:model="apellidos" type="text" class="form-control" id="apellidos" placeholder="Apellidos">
                        @error('apellidos') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>  
                    <div class="form-group">
                        <label for="carnet"><b style="color: black;">Carnet<b></label>
                        <input wire:model="carnet" type="number" class="form-control" id="carnet" placeholder="Carnet">@error('carnet') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="DPI"><b style="color: black;">Dpi<b></label>
                        <input wire:model="DPI" type="number" class="form-control" id="DPI" placeholder="Dpi">@error('DPI') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="correo"><b style="color: black;">Correo Electronico<b></label>
                        <input wire:model="correo" type="email" class="form-control" id="correo" placeholder="Correo">@error('correo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="numero_personal"><b style="color: black;">Numero Personal<b></label>
                        <input wire:model="numero_personal" type="number" size="8" value="00-000-000"class="form-control" id="numero_personal" placeholder="Numero Personal">@error('numero_personal') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="numero_domiciliar"><b style="color: black;">Otro Numero de Telefono<b></label>
                        <input wire:model="numero_domiciliar" type="number" class="form-control" id="numero_domiciliar" placeholder="Numero Domiciliar">@error('numero_domiciliar') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="curriculum"><b style="color: black;">Cargar Curriculum<b></label>
                        <input wire:model="curriculum" type="file" class="form-control" id="curriculum" placeholder="Curriculum">@error('curriculum') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="departamento_id"><b style="color: black;">Departamento</b></label>
                        <select wire:model="departamento_id" class="form-control" id="departamento_id" placeholder="Departamento">
                            @foreach ($departamentos as $departamento)
                                <option value="{{ $departamento->departamentoId }}">{{ $departamento->nombreDepartamento }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="municipio_id"><b style="color: black;">Municipio<b></label>
                        <select wire:model="municipio_id"  class="form-control" id="municipio_id" placeholder="Municipio">
                            @foreach ($municipios as $municipio) <!-- Cambiar $municipios a $municipio -->
                                @if ($municipio->departamento_id == $departamento_id)
                                    <option value="{{ $municipio->municipioId }}">{{ $municipio->nombreMunicipio }}</option>
                                @endif
                            @endforeach
                        </select>    
                    </div>
                    <div class="form-group">
                        <label for="facultad_id"><b style="color: black;">Facultad</b></label>
                        <select wire:model="facultad_id" class="form-control" id="facultad_id" placeholder="Facultad">
                            @foreach ($facultades as $facultad)
                                <option value="{{ $facultad->id }}">{{ $facultad->Nfacultad }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="carrera_id"><b style="color: black;">Carrera</b></label>
                        <select wire:model="carrera_id" class="form-control" id="carrera_id" placeholder="Carrera">
                            @foreach ($carreras as $carrera)
                                @if ($carrera->facultad_id == $facultad_id)
                                    <option value="{{ $carrera->id }}">{{ $carrera->Ncarrera }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="user_id"><b style="color: black;">User<b></label>
                        <input wire:model="user_id" type="text" class="form-control" id="user_id" placeholder="User Id">@error('user_id') <span class="error text-danger">{{ $message }}</span> @enderror
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
                <h5 class="modal-title" id="updateModalLabel">Editar Estudiante</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="nombre"><b style="color: black;">Nombres<b></label>
                        <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="apellidos"><b style="color: black;"><b>Apellidos</label>
                        <input wire:model="apellidos" type="text" class="form-control" id="apellidos" placeholder="Apellidos">@error('apellidos') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="carnet"><b style="color: black;">Carnet<b></label>
                        <input wire:model="carnet" type="number" class="form-control" id="carnet" placeholder="Carnet">@error('carnet') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="DPI"><b style="color: black;">DPI<b></label>
                        <input wire:model="DPI" type="number" class="form-control" id="DPI" placeholder="Dpi">@error('DPI') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="correo"><b style="color: black;">Correo Electronico<b></label>
                        <input wire:model="correo" type="email" class="form-control" id="correo" placeholder="Correo">@error('correo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="numero_personal"><b style="color: black;">Numero Personal<b></label>
                        <input wire:model="numero_personal" type="number" class="form-control" id="numero_personal" placeholder="Numero Personal">@error('numero_personal') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="numero_domiciliar"><b style="color: black;"><b>Otro Numero de Telefono</label>
                        <input wire:model="numero_domiciliar" type="number" class="form-control" id="numero_domiciliar" placeholder="Numero Domiciliar">@error('numero_domiciliar') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="curriculum"><b style="color: black;"><b>Cargar Curriculum</label>
                        <input wire:model="curriculum" type="file" class="form-control" id="curriculum" placeholder="Curriculum">@error('curriculum') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="departamento_id"><b style="color: black;">Departamento</b></label>
                        <select wire:model="departamento_id" class="form-control" id="departamento_id" placeholder="Departamento">
                            @foreach ($departamentos as $departamento)
                                <option value="{{ $departamento->departamentoId }}">{{ $departamento->nombreDepartamento }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="municipio_id"><b style="color: black;">Municipio<b></label>
                        <select wire:model="municipio_id"  class="form-control" id="municipio_id" placeholder="Municipio">
                            @foreach ($municipios as $municipio) <!-- Cambiar $municipios a $municipio -->
                                @if ($municipio->departamento_id == $departamento_id)
                                    <option value="{{ $municipio->municipioId }}">{{ $municipio->nombreMunicipio }}</option>
                                @endif
                            @endforeach
                        </select>    
                    </div>
                    <div class="form-group">
                        <label for="facultad_id"><b style="color: black;">Facultad</b></label>
                        <select wire:model="facultad_id" class="form-control" id="facultad_id" placeholder="Facultad">
                            @foreach ($facultades as $facultad)
                                <option value="{{ $facultad->id }}">{{ $facultad->Nfacultad }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="carrera_id"><b style="color: black;">Carrera</b></label>
                        <select wire:model="carrera_id" class="form-control" id="carrera_id" placeholder="Carrera">
                            @foreach ($carreras as $carrera)
                                @if ($carrera->facultad_id == $facultad_id)
                                    <option value="{{ $carrera->id }}">{{ $carrera->Ncarrera }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="user_id"><b style="color: black;"><b>User</label>
                        <input wire:model="user_id" type="text" class="form-control" id="user_id" placeholder="User Id">@error('user_id') <span class="error text-danger">{{ $message }}</span> @enderror
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

<!-- Vista Modal -->
<div wire:ignore.self class="modal fade modal-lg modal-dialog-scrollable" id="ViewDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ViewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;">
                <h5 class="modal-title" id="ViewModalLabel" style="color: #f0eadc;">Información del estudiante</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="hstack gap-3">
                        <div style="display: inline-block; width: 50vw;">
                            <div class="mb-2">
                                <label for="nombre"><b style="color: black;">Nombres<b></label>
                                <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre" readOnly>@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div style="display: inline-block; width: 50vw;">
                            <div class="mb-2">
                                <label for="apellidos"><b style="color: black;"><b>Apellidos</label>
                                <input wire:model="apellidos" type="text" class="form-control" id="apellidos" placeholder="Apellidos" readOnly>@error('apellidos') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>   
                    <div class="hstack gap-3">
                        <div style="display: inline-block; width: 50vw;">
                            <div class="mb-2">
                                <label for="carnet"><b style="color: black;">Carnet<b></label>
                                <input wire:model="carnet" type="number" class="form-control" id="carnet" placeholder="Carnet" readOnly>@error('carnet') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div style="display: inline-block; width: 50vw;">
                            <div class="mb-2">
                                <label for="DPI"><b style="color: black;">DPI<b></label>
                                <input wire:model="DPI" type="number" class="form-control" id="DPI" placeholder="Dpi" readOnly>@error('DPI') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="correo"><b style="color: black;">Correo Electronico<b></label>
                        <input wire:model="correo" type="email" class="form-control" id="correo" placeholder="Correo" readOnly>@error('correo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="hstack gap-3">
                        <div style="display: inline-block; width: 50vw;">
                            <div class="mb-2">
                                <label for="numero_personal"><b style="color: black;">Numero Personal<b></label>
                                <input wire:model="numero_personal" type="number" class="form-control" id="numero_personal" placeholder="Numero Personal" readOnly>@error('numero_personal') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div style="display: inline-block; width: 50vw;">
                            <div class="mb-2">
                                <label for="numero_domiciliar"><b style="color: black;"><b>Otro Numero de Telefono</label>
                                <input wire:model="numero_domiciliar" type="number" class="form-control" id="numero_domiciliar" placeholder="Numero Domiciliar" readOnly>@error('numero_domiciliar') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>        
                    <div class="form-group">
                        <label for="departamento_id"><b style="color: black;">Departamento<b></label>
                        <!-- <input type="text" value="{{$nombre_departamento}}" class="form-control" id="departamento_id" placeholder="Departamento" readOnly/> -->
                        <select wire:model="departamento_id" class="form-control" id="departamento_id" placeholder="Departamento">
                            @foreach ($departamentos as $departamento)
                                <option value="{{ $departamento->departamentoId}}">{{ $departamento->nombreDepartamento }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="municipio_id"><b style="color: black;">Municipio<b></label>
                        <input type="text" value="{{$nombre_municipio}}" class="form-control" id="municipio_id" placeholder="Municipio" readOnly/>    
                    </div>
                    <div class="form-group">
                        <label for="carrera_id"><b style="color: black;">Carrera</b></label>
                        <input value="{{$nombre_carrera}}" type="text" class="form-control" id="carrera_id" placeholder="Carrera" readOnly/>
                    </div>
                    <div class="form-group">
                        <label for="facultad_id"><b style="color: black;">Facultad</b></label>
                        <input value="{{$nombre_facultad}}" type="text" class="form-control" id="facultad_id" placeholder="Facultad" readOnly/>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn" style="background-color: #d3d3d3;" data-bs-dismiss="modal"><b>Cancelar</b></button>
            </div>
       </div>
    </div>
</div>

<!-- eliminar campo -->
<div wire:ignore.self class="modal fade" id="DeletDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="DeletDataLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header"style="background-color: #005c35;">
                <h5 class="modal-title" id="DeletDataModalLabel"style="color: #f0eadc;"> Eliminar</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <h5 class="modal-title" style="color: black;">Seguro que desea eliminara este dato?</h5>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn" style="background-color: #005c35;" data-bs-dismiss="modal"><b style ="color: #d3d3d3;">Cancelar</b></button>
                <button type="button" wire:click.prevent="destroy()" class="btn btn-primary" style="background-color:  #d3d3d3;" data-bs-dismiss="modal"><b style="color: black;">Sí, deseo eliminarlo<b></button>
            </div>
       </div>
    </div>
</div>