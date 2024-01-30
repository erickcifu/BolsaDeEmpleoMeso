<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;">
                <h5 class="modal-title" id="createDataModalLabel" style="color: #f0eadc;">Crear Empresa</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: #f0eadc;"></button>
            </div>
           <div class="modal-body">
				<form>
                   
                    <div class="form-group">
                        <label for="logo"><b style="color: black;">Logo (seleccione un archivo de imagen) <b></label>
                        <input wire:model="logo" type="file" accept="image/*" class="form-control" id="logo" placeholder="Logo">@error('logo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nombreEmpresa"><b style="color: black;">Nombre de la Empresa<b></label>
                        <input wire:model="nombreEmpresa" type="text" class="form-control" id="nombreEmpresa" placeholder="Nombre">@error('nombreEmpresa') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nit"><b style="color: black;">Nit<b></label>
                        <input wire:model="nit" type="text" class="form-control" id="nit" placeholder="Nit">@error('nit') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="rtu"><b style="color: black;">RTU (seleccione un archivo pdf)<b></label>
                        <input wire:model="rtu" type="file" accept="application/pdf" class="form-control" id="rtu" placeholder="Rtu">@error('rtu') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">  
                        <label for="patenteComercio"><b style="color: black;">Patente de Comercio (seleccione un archivo pdf)<b></label>
                        <input wire:model="patenteComercio" type="file" accept="application/pdf" class="form-control" id="patenteComercio" placeholder="Patente comercio">@error('patenteComercio') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="descripcionEmpresa"><b style="color: black;">Descripcion de la Empresa<b></label>
                        <input wire:model="descripcionEmpresa" type="text" class="form-control" id="descripcionEmpresa" placeholder="Descripcion empresa">@error('descripcionEmpresa') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="telefonoEmpresa"><b style="color: black;">Telefono de la Empresa<b></label>
                        <input wire:model="telefonoEmpresa" type="text" class="form-control" id="telefonoEmpresa" placeholder="Telefono empresa">@error('telefonoEmpresa') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="correoEmpresa"><b style="color: black;">Correo de la Empresa<b></label>
                        <input wire:model="correoEmpresa" type="text" class="form-control" id="correoEmpresa" placeholder="Correo empresa">@error('correoEmpresa') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="direccionEmpresa"><b style="color: black;">Direccion de la Empresa<b></label>
                        <input wire:model="direccionEmpresa" type="text" class="form-control" id="direccionEmpresa" placeholder="Direccion empresa">@error('direccionEmpresa') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="encargadoEmpresa"><b style="color: black;">Encargado de la Empresa<b></label>
                        <input wire:model="encargadoEmpresa" type="text" class="form-control" id="encargadoEmpresa" placeholder="Encargado empresa">@error('encargadoEmpresa') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="telefonoEncargado"><b style="color: black;">Telefono del Encargado<b></label>
                        <input wire:model="telefonoEncargado" type="text" class="form-control" id="telefonoEncargado" placeholder="Telefono encargado">@error('telefonoEncargado') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group"hidden>
                        <label for="estadoEmpresa"><b style="color: black;">Estado de la Empresa<b></label>
                        <input wire:model="estadoEmpresa" value="1" type="text" class="form-control" id="estadoEmpresa" placeholder="Estado empresa">@error('estadoEmpresa') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group" hidden>
                        <label for="estadoSolicitud"><b style="color: black;">Estado de la Solicitud<b></label>
                        <input wire:model="estadoSolicitud"  value="en Espera" type="text" class="form-control" id="estadoSolicitud" placeholder="Estadosolicitud">@error('estadoSolicitud') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="user_id"><b style="color: black;">Nombre de Usuario<b></label>
                        <input wire:model="user_id" type="text" class="form-control" id="user_id" placeholder="User Id">@error('user_id') <span class="error text-danger">{{ $message }}</span> @enderror
                   
                    </div>
                    <div class="form-group">
                        <label for="Departamento"><b style="color: black;">Departamento<b></label>
                        <select wire:model="departamento" type="text" class="form-control" id="residencia_id" placeholder="Residencia">@error('residencia_id') <span class="error text-danger">{{ $message }}</span> @enderror
                            <option value="">seleccione un departamento</option>
                            @foreach ($Departamentos as $departamento)
                            <option value="{{$departamento->departamentoId}}">{{$departamento->nombreDepartamento}}</option>
                            
                            @endforeach
                        
                        </select>
                   
                    </div>

         @if (!is_null($municipios))
                    <div class="form-group">
                        <label for="residencia_id"><b style="color: black;">Municipio<b></label>
                        <select wire:model="residencia_id" type="text" class="form-control" id="residencia_id" placeholder="Residencia">@error('residencia_id') <span class="error text-danger">{{ $message }}</span> @enderror
                      
                       @foreach ($municipios as $municipio )
                           <option value="{{$municipio->municipioId}}">{{$municipio->nombreMunicipio}}</option>
                       @endforeach
                        </select>
                   
                    </div>
         @endif       

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn" style="background-color: #d3d3d3;" data-bs-dismiss="modal"><b>Cancelar</b></button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary" style="background-color: #005c35;">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal2" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
       <div class="modal-content">
        <div class="modal-header" style="background-color: #005c35;">
            <h5 class="modal-title" id="updateModalLabel" style="color: #f0eadc;">Información de la Empresa</h5>
            <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="nombreEmpresa"><b style="color: black;">Nombre de la Empresa<b></label>
                        <input wire:model="nombreEmpresa" type="text" class="form-control" id="nombreEmpresa" placeholder="Nombre empresa" disabled>@error('nombreEmpresa') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nit"><b style="color: black;">NIT<b></label>
                        <input wire:model="nit" type="text" class="form-control" id="nit" placeholder="Nit"disabled>@error('nit') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                  
                    <div class="form-group">
                        <label for="descripcionEmpresa"><b style="color: black;">Descripción de la Empresa<b></label>
                        <textarea wire:model="descripcionEmpresa" type="text" class="form-control" id="descripcionEmpresa" placeholder="Descripcion empresa" disabled> </textarea>@error('descripcionEmpresa') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="telefonoEmpresa"><b style="color: black;">Teléfono de la Empresa<b></label>
                        <input wire:model="telefonoEmpresa" type="text" class="form-control" id="telefonoEmpresa" placeholder="Telefono empresa"disabled>@error('telefonoEmpresa') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="correoEmpresa"><b style="color: black;">Correo electrónico de la Empresa<b></label>
                        <input wire:model="correoEmpresa" type="text" class="form-control" id="correoEmpresa" placeholder="Correo empresa" disabled>@error('correoEmpresa') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="direccionEmpresa"><b style="color: black;">Dirección de la Empresa<b></label>
                        <input wire:model="direccionEmpresa" type="text" class="form-control" id="direccionEmpresa" placeholder="Direccion empresa"disabled>@error('direccionEmpresa') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="encargadoEmpresa"><b style="color: black;">Encargado de la Empresa<b></label>
                        <input wire:model="encargadoEmpresa" type="text" class="form-control" id="encargadoEmpresa" placeholder="Encargado empresa"disabled>@error('encargadoEmpresa') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="telefonoEncargado"><b style="color: black;">Teléfono del Encargado<b></label>
                        <input wire:model="telefonoEncargado" type="text" class="form-control" id="telefonoEncargado" placeholder="Telefono encargado"disabled>@error('telefonoEncargado') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn" style="background-color: #d3d3d3;" data-bs-dismiss="modal"><b>Cerrar</b></button>
            </div>
       </div>
    </div>
</div>


<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
        <div class="modal-header" style="background-color: #005c35;">
            <h5 class="modal-title" id="updateModalLabel" style="color: #f0eadc;">Actualizar Empresa</h5>
            <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
                <form>
                   
                   
                  
                    
                   
                  
                    <div class="form-group" >
                        <label for="estadoSolicitud"><b style="color: black;">Estado de la Solicitud<b></label>
                        <select wire:model="estadoSolicitud"   type="text" class="form-control" id="estadoSolicitud" placeholder="Estado solicitud">@error('estadoSolicitud') <span class="error text-danger">{{ $message }}</span> @enderror
                            <option selected>Estado</option>
                            <option value="Aceptado">Aceptado</option>
                            <option value="Verificar RTU">Verificar RTU</option>
                            <option value="Verificar Patente de comercio">Verificar Patente de comercio</option>
                            <option value="Verificar Patente de comercio y RTU">Verificar Patente de comercio y RTU</option>
                            <option value="Denegado">Denegado</option>
                        </select>
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

<!-- eliminar campo -->
<div wire:ignore.self class="modal fade" id="EliminarDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="EliminarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header"style="background-color: #005c35;">
                <h5 class="modal-title" id="EliminarModalLabel"style="color: #f0eadc;"> Desactivar</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <h5 class="modal-title" style="color: black;">Seguro que desea desactivar el usuario de empresa?</h5>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn" style="background-color: #005c35;" data-bs-dismiss="modal"><b style ="color: #d3d3d3;">Cancelar</b></button>
                <button type="button" wire:click.prevent="Desc()" class="btn btn-primary" style="background-color:  #d3d3d3;" data-bs-dismiss="modal"><b style="color: black;">Sí, deseo desactivarlo<b></button>
            </div>
       </div>
    </div>
</div>
<!-- activar un campo -->
<div wire:ignore.self class="modal fade" id="ActivarDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ActivarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header"style="background-color: #005c35;">
                <h5 class="modal-title" id="ActivarModalLabel"style="color: #f0eadc;"> Activar</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <h5 class="modal-title" style="color: black;">Seguro que desea activar el usuario de empresa?</h5>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn" style="background-color:#d3d3d3;" data-bs-dismiss="modal"><b>Cancelar</b></button>
                <button type="button" wire:click.prevent="Act()" class="btn btn-primary" style="background-color: #005c35;"data-bs-dismiss="modal">Sí, deseo activarlo</button>
            </div>
       </div>
    </div>
</div>

