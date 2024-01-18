


<!-- Add carta -->
<div wire:ignore.self class="modal fade" id="createCarta" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;">
                <h5 class="modal-title" id="createDataModalLabel" style="color: #f0eadc;">Crear Carta de Recomendacion</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: #f0eadc;"></button>
            </div>
           <div class="modal-body">
				<form>
                    
                    
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
                   
                    

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn" style="background-color: #d3d3d3;" data-bs-dismiss="modal"><b>Cancelar</b></button>
                <button type="button" wire:click.prevent="newCarta()" data-bs-dismiss="modal" class="btn btn-primary"  style="background-color: #005c35;">Guardar</button>
            </div>
        </div>
    </div>
</div>


