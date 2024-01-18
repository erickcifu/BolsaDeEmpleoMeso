


<!-- Add carta -->
<div wire:ignore.self class="modal fade" id="createCartaDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createCartaDataModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;">
                <h5 class="modal-title" id="createCartaDataModalLabel" style="color: #f0eadc;">Generar carta</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="fechaCarta"><b style="color: black;">Fecha<b></label>
                        <input wire:model="fechaCarta" type="date" class="form-control" id="fechaCarta"/>@error('fechaCarta') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="telefonoAutoridad"><b style="color: black;">Número de teléfono (Autoridad)<b></label>
                        <input wire:model="telefonoAutoridad" type="number" class="form-control" id="telefonoAutoridad" placeholder="Número de teléfono personal">@error('telefonoAutoridad') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="firmaAutoridad"><b style="color: black;">Firma electrónica<b></label>
                        <input wire:model="firmaAutoridad" type="file" accept="image/*" class="form-control" id="firmaAutoridad">@error('firmaAutoridad') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="cargoYTareasRealizadas"><b style="color: black;">Hábilidades y logros del estudiante<b></label>
                        <textarea wire:model="cargoYTareasRealizadas" type="text" class="form-control" id="cargoYTareasRealizadas" placeholder="Describe las habilidades, cualidades personales o logros del estudiante"></textarea>@error('cargoYTareasRealizadas') <span class="error text-danger">{{ $message }}</span> @enderror               
                    </div>
                    <div class="form-group">
                        <label for="autoridadAcademica_id"><b style="color: black;">Autoridad: <b> {{$autoridad->nombreAutoridad}}</label>
                    </div>
                    <div class="form-group">
                        <label for="estudiante_id"><b style="color: black;">Estudiante: <b> {{$id_estu}}</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn close-btn" data-bs-dismiss="modal" style="background-color: #d3d3d3;">Cancelar</button>
                <button type="button" wire:click.prevent="newCarta()" class="btn btn-primary" style="background-color: #005c35;">Guardar</button>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('livewire:load', function () {
    window.livewire.on('cartaCreatedSuccessfully', function () {
        // Hide the modal
        $('#createCartaDataModal').modal('hide');
    });
});
</script>
