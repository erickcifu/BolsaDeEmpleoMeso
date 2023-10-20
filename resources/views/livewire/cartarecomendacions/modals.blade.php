<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <<div class="modal-header" style="background-color: #005c35;">
                <h5 class="modal-title" id="createDataModalLabel" style="color: #f0eadc;">Crear Carta de Recomendacion</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: #f0eadc;"></button>
            </div>
           <div class="modal-body">
				<form>
                    
                    <div class="form-group">
                        <label for="fechaCarta"><b style="color: black;">Fecha<b></label>
                        <input wire:model="fechaCarta" type="date" class="form-control" id="fechaCarta" placeholder="Fechacarta">@error('fechaCarta') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="cargoYTareasRealizadas"><b style="color: black;">Cargo y tareas realizadas del Referido<b></label>
                        <input wire:model="cargoYTareasRealizadas" type="text" class="form-control" id="cargoYTareasRealizadas" placeholder="Cargo">@error('cargoYTareasRealizadas') <span class="error text-danger">{{ $message }}</span> @enderror
                                           
                    </div>
                    <div class="form-group">
                        <label for="telefonoAutoridad"><b style="color: black;">Numero de Telefono de la Autoridad<b></label>
                        <input wire:model="telefonoAutoridad" type="text" class="form-control" id="telefonoAutoridad" placeholder="Telefono autoridad">@error('telefonoAutoridad') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="firmaAutoridad"><b style="color: black;">firma<b></label>
                        <input wire:model="firmaAutoridad" type="file" accept="image/*" class="form-control" id="firmaAutoridad" placeholder="Firma autoridad">@error('firmaAutoridad') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="autoridadAcademica_id"><b style="color: black;">Autoridad<b></label>
                        <select wire:model="autoridadAcademica_id" type="text" class="form-control" id="autoridadAcademica_id" placeholder="Autoridadacademica Id">@error('autoridadAcademica_id') <span class="error text-danger">{{ $message }}</span> @enderror
                            <option value="">Autoridad</option>
                            @foreach ($autoridadesacademicas as $autoridad)
                                  <option value="{{$autoridad->autoridadId}}"> {{$autoridad->nombreAutoridad}}</option>      
                            @endforeach
                        </select> 
                    </div>
                    <div class="form-group">
                        <label for="estudiante_id"><b style="color: black;">Estudiante<b></label>
                        <select wire:model="estudiante_id" type="text" class="form-control" id="estudiante_id" placeholder="Estudiante Id">@error('estudiante_id') <span class="error text-danger">{{ $message }}</span> @enderror
                            <option value="">estudiante</option>
                            @foreach ($estudiantes as $estudiante)
                                  <option value="{{$estudiante->estudianteId}}"> {{$estudiante->nombre}} {{$estudiante->apellidos}} {{$estudiante->carnet}} </option>      
                            @endforeach
                        </select>
                    </div>

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
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
        <div class="modal-header" style="background-color: #005c35;">
            <h5 class="modal-title" id="updateModalLabel" style="color: #f0eadc;">Actualizar datos Carta</h5>
            <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
                <form>
                    
                    <div class="form-group">
                        <label for="fechaCarta"><b style="color: black;">Fecha<b></label>
                        <input wire:model="fechaCarta" type="date" class="form-control" id="fechaCarta" placeholder="Fecha">@error('fechaCarta') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="cargoYTareasRealizadas"><b style="color: black;">Cargo y tareas realizadas del Referido<b></label>
                        <input wire:model="cargoYTareasRealizadas" type="text" class="form-control" id="cargoYTareasRealizadas" placeholder="Cargo">@error('cargoYTareasRealizadas') <span class="error text-danger">{{ $message }}</span> @enderror
                        
                        </div>
                    <div class="form-group">
                        <label for="telefonoAutoridad"><b style="color: black;">Numero de Telefono de la Autoridad<b></label>
                        <input wire:model="telefonoAutoridad" type="text" class="form-control" id="telefonoAutoridad" placeholder="Telefono autoridad">@error('telefonoAutoridad') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                  
                    <div class="form-group">
                        <label for="autoridadAcademica_id"><b style="color: black;">Autoridad<b></label>
                        <select wire:model="autoridadAcademica_id" type="text" class="form-control" id="autoridadAcademica_id" placeholder="Autoridad">@error('autoridadAcademica_id') <span class="error text-danger">{{ $message }}</span> @enderror
                            <option value="">Autoridad</option>
                            @foreach ($autoridadesacademicas as $autoridad)
                                  <option value="{{$autoridad->autoridadId}}"> {{$autoridad->nombreAutoridad}}</option>      
                            @endforeach
                        </select> 
                    </div>
                    <div class="form-group">
                        <label for="estudiante_id"><b style="color: black;">Estudiante<b></label>
                            <select wire:model="estudiante_id" type="text" class="form-control" id="estudiante_id" placeholder="Estudiante Id">@error('estudiante_id') <span class="error text-danger">{{ $message }}</span> @enderror
                                <option value="">estudiante</option>
                                @foreach ($estudiantes as $estudiante)
                                      <option value="{{$estudiante->estudianteId}}"> {{$estudiante->nombre}} {{$estudiante->apellidos}} {{$estudiante->carnet}} </option>      
                                @endforeach
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




{{-- creamos el modal para eliminar  --}}
<div wire:ignore.self class="modal fade" id="DeletDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="DeletModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;">
                <h5 class="modal-title" id="DeletModalLabel">Eliminar</h5>
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
                <button type="button" wire:click="destroy()" class="btn btn-primary" style="background-color:  #d3d3d3;" data-bs-dismiss="modal"><b style="color: black;">Sí, deseo eliminarlo<b></button>
            </div>
       </div>
    </div>
</div> 
{{--actualiza firma--}}
<div wire:ignore.self class="modal fade" id="firmDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="firmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header"style="background-color: #005c35;">
                <h5 class="modal-title" id="firmModalLabel"style="color: #f0eadc;"> Editar firma</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="firmaAutoridad"><b style="color: black;">firma<b></label>
                        <input wire:model="firmaAutoridad" type="file" accept="image/*" class="form-control" id="firmaAutoridad" placeholder="Firma autoridad">@error('firmaAutoridad') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn" style="background-color:#d3d3d3;" data-bs-dismiss="modal"><b>Cancelar</b></button>
                <button type="button" wire:click.prevent="firma()" class="btn btn-primary" style="background-color: #005c35;"data-bs-dismiss="modal">Actualizar</button>
            </div>
       </div>
    </div>
</div>


