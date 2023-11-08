<div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;">
                <h5 class="modal-title" id="createDataModalLabel" style="color: #f0eadc;">Formulario de Registro para Empresas</h5>
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
                        <label for="residencia_id"><b style="color: black;">Departamento<b></label>
                        <select wire:model="departamento" class="form-control" id="residencia_id" placeholder="Residencia">
                            <option value="null" disabled>Seleccione un departamento</option>
                            @foreach ($Departamentos as $departamento)
                            <option value="{{$departamento->departamentoId}}">{{$departamento->nombreDepartamento}}</option>                            
                            @endforeach                        
                        </select>                
                        @error('departamento') 
                            <span class="error text-danger">{{ $message }}</span> 
                        @enderror
                    </div>

                    <div class="form-group">
                        @if (!is_null($municipios))
                        <label for="residencia_id"><b style="color: black;">Municipio<b></label>
                        <select wire:model="residencia_id" type="text" class="form-control" id="residencia_id" placeholder="Residencia">
                            <option value="">seleccione un Municipios</option>
                            @foreach ($municipios as $municipio )
                            <option value="{{$municipio->municipioId}}">{{$municipio->nombreMunicipio}}</option>
                            @endforeach
                        </select>
                        @error('residencia_id') 
                            <span class="error text-danger">{{ $message }}</span> 
                        @enderror
                        @endif
                    </div>

                </form>
            </div>
            <div class="modal-footer mt-3">
                <button type="button" wire:click.prevent="cancel()" class="btn mx-3" style="background-color: #d3d3d3;" data-bs-dismiss="modal"><b>Cancelar</b></button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary" style="background-color: #005c35;">Guardar</button>
            </div>
        </div>