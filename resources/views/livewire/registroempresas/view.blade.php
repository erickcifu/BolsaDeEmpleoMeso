<div class="modal-content"> 
    <div class="row justify-content-center"> 
        <div class="col-md-12">
            <body style="background-color: #d3d3d3">
                <div class="float-center align-items-center" style="width: 70%;">
                    <h3 class="align-items-center" style="color: #005C38; padding-left: 1em;">Formulario de Registro para Empresas</h3>
                </div>
                <div class="modal-body"  style="background-color: #ffffff">
                    <form style="width: 98%; padding-left: 2em;">
                        <br/>
                        <div class="hstack gap-3">
                           <div style="display: inline-block; width: 100vh;"> 
                                <div class="mb-2">
                                    <label for="logo"><b style="color: black;">Logotipo* (seleccione un archivo de imagen) <b></label>
                                    <input wire:model="logo" type="file" accept="image/*" class="form-control" id="logo" placeholder="seleccione un archivo de imagen">@error('logo') <span class="error text-danger">{{ $message }}</span> @enderror
                                    <div wire:loading wire:target="logo"><h6 style="color: #005c35;"><b>Cargando imagen...</b></h6></div>
                                </div>
                            </div>
                            <div style="display: inline-block; width: 100vh;"> 
                                <div class="mb-2">
                                    <label for="nombreEmpresa"><b style="color: black;">Nombre de la Empresa*<b></label>
                                    <input wire:model="nombreEmpresa" type="text" class="form-control" id="nombreEmpresa" placeholder="Nombre registrado de la empresa">@error('nombreEmpresa') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="hstack gap-3">
                       <div style="display: inline-block; width: 100vh;">  
                                <div class="mb-2">
                                    <label for="nit"><b style="color: black;">NIT*<b></label>
                                    <input wire:model="nit" type="text" class="form-control" id="nit" placeholder="No. de NIT de la empresa">@error('nit') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div style="display: inline-block; width: 100vh;"> 
                                <div class="mb-2">
                                    <label for="rtu"><b style="color: black;">RTU* (seleccione un archivo pdf)<b></label>
                                    <input wire:model="rtu" type="file" accept="application/pdf" class="form-control" id="rtu" placeholder="Archivo RTU de la empresa">@error('rtu') <span class="error text-danger">{{ $message }}</span> @enderror
                                    <div wire:loading wire:target="rtu"><h6 style="color: #005c35;"><b>Cargando archivo...</b></h6></div>
                                </div>
                            </div>
                        </div>
                        <div class="hstack gap-3">
                       <div style="display: inline-block; width: 100vh;">  
                                <div class="mb-2">  
                                    <label for="patenteComercio"><b style="color: black;">Patente de Comercio* (seleccione un archivo pdf)<b></label>
                                    <input wire:model="patenteComercio" type="file" accept="application/pdf" class="form-control" id="patenteComercio" placeholder="Patente comercio">@error('patenteComercio') <span class="error text-danger">{{ $message }}</span> @enderror
                                    <div wire:loading wire:target="patenteComercio"><h6 style="color: #005c35;"><b>Cargando archivo...</b></h6></div>
                                </div>
                            </div>
                            <div style="display: inline-block; width: 100vh;"> 
                                <div class="mb-2">
                                    <label for="descripcionEmpresa"><b style="color: black;">Descripción de la empresa*<b></label>
                                    <input wire:model="descripcionEmpresa" type="text" class="form-control" id="descripcionEmpresa" placeholder="Descripción empresa">@error('descripcionEmpresa') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="hstack gap-3">
                            <div style="display: inline-block; width: 100vh;"> 
                                <div class="mb-2">
                                    <label for="telefonoEmpresa"><b style="color: black;">Teléfono de la empresa*<b></label>
                                    <input wire:model="telefonoEmpresa" type="text" class="form-control" id="telefonoEmpresa" placeholder="No. de teléfono empresa">@error('telefonoEmpresa') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div style="display: inline-block; width: 100vh;">
                                <div class="mb-2">
                                    <label for="correoEmpresa"><b style="color: black;">Correo electrónico para recibir notificaciones*<b></label>
                                    <input wire:model="correoEmpresa" type="text" class="form-control" id="correoEmpresa" placeholder="Correo electrónico de la empresa">@error('correoEmpresa') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>    
                        <div class="hstack gap-3">
                        <div style="display: inline-block; width: 100vh;">  
                                <div class="mb-2">
                                    <label for="telefonoEncargado"><b style="color: black;">Teléfono del encargado*<b></label>
                                    <input wire:model="telefonoEncargado" type="text" class="form-control" id="telefonoEncargado" placeholder="No. de teléfono del encargado">@error('telefonoEncargado') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div style="display: inline-block; width: 100vh;"> 
                                <div class="mb-2">
                                    <label for="encargadoEmpresa"><b style="color: black;">Encargado de la empresa*<b></label>
                                    <input wire:model="encargadoEmpresa" type="text" class="form-control" id="encargadoEmpresa" placeholder="Nombre completo del encargado de la empresa">@error('encargadoEmpresa') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>    
                        </div>    
                        <div class="hstack gap-3">
                        <div style="display: inline-block; width: 100vh;">  
                                <div class="mb-2">
                                    <label for="residencia_id"><b style="color: black;">Departamento*<b></label>
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
                            </div>
                            <div style="display: inline-block; width: 100vh;">  
                                <div class="mb-2">
                                    @if (!is_null($municipios))
                                    <label for="residencia_id"><b style="color: black;">Municipio*<b></label>
                                    <select wire:model="residencia_id" type="text" class="form-control" id="residencia_id" placeholder="Residencia">
                                        <option value="">seleccione un municipio</option>
                                        @foreach ($municipios as $municipio )
                                        <option value="{{$municipio->municipioId}}">{{$municipio->nombreMunicipio}}</option>
                                        @endforeach
                                    </select>
                                    @error('residencia_id') 
                                        <span class="error text-danger">{{ $message }}</span> 
                                    @enderror
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{-- <div class="hstack gap-3">
                            <div style="display: inline-block; width: 100vh;">  --}}
                                <div class="mb-2">
                                    <label for="direccionEmpresa"><b style="color: black;">Dirección de la empresa*<b></label>
                                    <textarea wire:model="direccionEmpresa" type="text" class="form-control" id="direccionEmpresa" placeholder="Dirección exacta de la empresa">@error('direccionEmpresa') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </textarea>    
                                </div>
                            {{-- </div>
                        </div> --}}
                        <br/>     
                        <div class="mb-2"hidden>
                            <label for="estadoEmpresa"><b style="color: black;">Estado de la empresa<b></label>
                            <input wire:model="estadoEmpresa" value="1" type="text" class="form-control" id="estadoEmpresa" placeholder="Estado empresa">@error('estadoEmpresa') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>                    
                        <div class="mb-2" hidden>
                            <label for="estadoSolicitud"><b style="color: black;">Estado de la Solicitud<b></label>
                            <input wire:model="estadoSolicitud"  value="en Espera" type="text" class="form-control" id="estadoSolicitud" placeholder="Estadosolicitud">@error('estadoSolicitud') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer mt-3">
                    <button type="button" wire:click.prevent="store()" class="btn btn-primary" style="background-color: #005c35;" wire:loading.attr="disabled"  wire:target="logo, rtu, patenteComercio">Guardar</button>
                </div>
            </body>    
        </div>
    </div>
</div>

<!-- Incluye jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Tu script personalizado -->
<script>
   window.onload = function () {
    console.log('Script ejecutado correctamente');
        if (window.history && window.history.pushState) {
            $(window).on('popstate', function () {
                console.log('Se activó el evento popstate');
                // Realizar logout aquí
                window.location.href = '/';
            });
        }
    }
</script>
