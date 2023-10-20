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
                        <label for="nombreMunicipio"><b style="color: black;">Municipio<b></label>
                        <input wire:model="nombreMunicipio" type="text" class="form-control" id="nombreMunicipio" placeholder="Nombremunicipio">@error('nombreMunicipio') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="departamento_id"><b style="color: black;">Departamento<b></label>
                        <select wire:model="departamento_id" type="text" class="form-control" id="departamento_id" placeholder="Departamento Id">@error('departamento_id') <span class="error text-danger">{{ $message }}</span> @enderror
                        <option value="">Departamento</option>
                        @foreach ($Departamentos as $Departamento)
                              <option value="{{$Departamento->departamentoId}}"> {{$Departamento->nombreDepartamento}}</option>      
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
                    <label for="nombreMunicipio"><b style="color: black;">Municipio<b></label>
                    <input wire:model="nombreMunicipio" type="text" class="form-control" id="nombreMunicipio" placeholder="municipio">@error('nombreMunicipio') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="departamento_id"><b style="color: black;">Departamento<b></label>
                    <select wire:model="departamento_id" type="text" class="form-control" id="departamento_id" placeholder="Departamento">@error('departamento_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    <option value="">Departamento</option>
                    @foreach ($Departamentos as $Departamento)
                          <option value="{{$Departamento->departamentoId}}"> {{$Departamento->nombreDepartamento}}</option>      
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
