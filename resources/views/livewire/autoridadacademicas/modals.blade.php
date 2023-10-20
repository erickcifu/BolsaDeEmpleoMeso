<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;">
                <h5 class="modal-title" id="createDataModalLabel" style="color: #f0eadc;">Crear Autoridad</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: #f0eadc;"></button>
            </div>
            <div class="modal-body" style="color: #f0eadc;">
				<form>
                   
                    <div class="form-group">
                        
                        <label for="nombreAutoridad"><b style="color: black;">Nombre<b></label>
                        <input wire:model="nombreAutoridad" type="text" class="form-control" id="nombreAutoridad" placeholder="Nombre autoridad">@error('nombreAutoridad') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        
                        <label for="apellidosAutoridad"><b style="color: black;">Apellido<b></label>
                        <input wire:model="apellidosAutoridad" type="text" class="form-control" id="apellidosAutoridad" placeholder="Apellidos autoridad">@error('apellidosAutoridad') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group" hidden > 
                        <label for="estadoAutoridad"><b style="color: black;">Estado<b></label>
                        <input wire:model="estadoAutoridad" value="1" type="text" class="form-control" id="estadoAutoridad" placeholder="Estado">@error('estadoAutoridad') <span class="error text-danger">{{ $message }}</span> @enderror
                            
                    </div>
                    <div class="form-group">
                        
                        <label for="facultad_id"><b style="color: black;">facultad<b></label>
                        <select wire:model="facultad_id" type="text" class="form-control" id="facultad_id" placeholder="facultad">@error('facultad_id') <span class="error text-danger">{{ $message }}</span> @enderror
                            <option value="">Facultad</option>
                            @foreach ($facultades as $facultad)
                                  <option value="{{$facultad->id}}"> {{$facultad->Nfacultad}}</option>      
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
            <h5 class="modal-title" id="updateModalLabel" style="color: #f0eadc;">Actualizar Autoridad Academica</h5>
            <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="color: #f0eadc;">
                <form>
					<input type="hidden" wire:model="selected_id">
                    
                    <input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="nombreAutoridad"><b style="color: black;">Nombre</b></label>
                        <input wire:model="nombreAutoridad" type="text" class="form-control" id="nombreAutoridad" placeholder="Nombre autoridad">@error('nombreAutoridad') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="apellidosAutoridad"><b style="color: black;">Apellido</b></label>
                        <input wire:model="apellidosAutoridad" type="text" class="form-control" id="apellidosAutoridad" placeholder="Apellidos autoridad">@error('apellidosAutoridad') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="estadoAutoridad"><b style="color: black;">Estado</b></label>
                        <select wire:model="estadoAutoridad" type="text" class="form-control" id="estadoAutoridad" placeholder="Estado autoridad">@error('estadoAutoridad') <span class="error text-danger">{{ $message }}</span> @enderror
                            <option selected>Estado</option>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="facultad_id"><b style="color: black;">Facultad</b></label>
                        <select wire:model="facultad_id" type="text" class="form-control" id="facultad_id" placeholder="facultad">@error('facultad_id') <span class="error text-danger">{{ $message }}</span> @enderror
                            <option value="">Facultad</option>
                            @foreach ($facultades as $facultad)
                                  <option value="{{$facultad->id}}"> {{$facultad->Nfacultad}}</option>      
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

<!-- eliminar campo -->
<div wire:ignore.self class="modal fade" id="EliminarDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="EliminarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header"style="background-color: #005c35;">
                <h5 class="modal-title" id="EliminarModalLabel"style="color: #f0eadc;"> Eliminar</h5>
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
                <button type="button" wire:click.prevent="Desc()" class="btn btn-primary" style="background-color:  #d3d3d3;" data-bs-dismiss="modal"><b style="color: black;">Sí, deseo eliminarlo<b></button>
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
                    <h5 class="modal-title" style="color: black;">Seguro que desea Activar este dato?</h5>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn" style="background-color:#d3d3d3;" data-bs-dismiss="modal"><b>Cancelar</b></button>
                <button type="button" wire:click.prevent="Act()" class="btn btn-primary" style="background-color: #005c35;"data-bs-dismiss="modal">Sí, deseo Activar</button>
            </div>
       </div>
    </div>
</div>

