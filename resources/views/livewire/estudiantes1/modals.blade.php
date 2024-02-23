


<!-- Add carta -->
<div wire:ignore.self class="modal fade modal-lg modal-dialog-scrollable" id="createCartaDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createCartaDataModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;">
                <h5 class="modal-title" id="createCartaDataModalLabel" style="color: #f0eadc;">
                    {{ $selected_id === null ? 'Generar carta': 'Editar carta'  }}
                </h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="fechaCarta"><b style="color: black;">A QUIEN INTERESE:<b></label>
                    </div>
                    <br/>
                    <div class="form-group">
                        <!-- <label for="cargoYTareasRealizadas"><b style="color: black;">Hábilidades y logros del estudiante<b></label> -->
                        @if($atributos)
                            <p>Por medio de la presente, hago constar que la persona <b style="color: black;">{{ $atributos->nombre }} {{ $atributos->apellidos }}</b>, quién se identifica con número 
			        de CUI<b> {{ $atributos->DPI }}</b>, se caracteriza por ser <textarea wire:model="cargoYTareasRealizadas" type="text" class="form-control" id="cargoYTareasRealizadas" placeholder="Describe las habilidades, cualidades personales o logros del estudiante"></textarea>@error('cargoYTareasRealizadas') <span class="error text-danger">{{ $message }}</span> @enderror  
                    , por lo que no tengo ningún inconveniente en RECOMENDARLO a cualquier persona, empresa o institución que requieran sus servicios.
                    </p>             
                        @endif
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="fechaCarta" style="color: black; display: inline-block; width: 70%;">
                            <b>Fecha de emisión</b>
                        </label>
                        <input wire:model="fechaCarta" type="date" class="form-control" id="fechaCarta" disabled/>
                        @error('fechaCarta') 
                            <span class="error text-danger">{{ $message }}</span> 
                        @enderror
                    </div>

                    </br>
                    <div class="form-group">
                        <label for="firmaAutoridad"><b style="color: black;">Firma electrónica<b></label>
                        @if($selected_id !== null)
                            <img src="{{asset($pathTempPhoto)}}" width="75" height="75" class="img-fluid ml-3" alt="Imagen oferta">
                        @endif
                            <input  wire:model="firmaAutoridad" type="file" class="form-control" id="upload{{ $iteration }}" accept="image/*" placeholder="firmaAutoridad">
                    </div>
                    </br>
                    <div class="form-group form-inline">
                        <label for="telefonoAutoridad" class="mr-2"><b style="color: black;">Número de teléfono (Autoridad)</b></label>
                        <input wire:model="telefonoAutoridad" type="number" class="form-control" id="telefonoAutoridad" placeholder="Número de teléfono personal">
                        @error('telefonoAutoridad') 
                            <span class="error text-danger">{{ $message }}</span> 
                        @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn close-btn" data-bs-dismiss="modal" style="background-color: #d3d3d3;">Cancelar</button>
                <button type="button" wire:click.prevent="process()" class="btn btn-primary" style="background-color: #005c35;">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit carta -->
<div wire:ignore.self class="modal fade" id="editCartaDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editCartaDataModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;">
                <h5 class="modal-title" id="editCartaDataModalLabel" style="color: #f0eadc;">Editar carta</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="fechaCarta"><b style="color: black;">Fecha<b></label>
                        <input wire:model="fechaCarta" type="date" class="form-control" id="fechaCarta" disabled/>@error('fechaCarta') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    </br>
                    <div class="form-group">
                        <label for="telefonoAutoridad"><b style="color: black;">Número de teléfono (Autoridad)<b></label>
                        <input wire:model="telefonoAutoridad" type="number" class="form-control" id="telefonoAutoridad" placeholder="Número de teléfono personal">@error('telefonoAutoridad') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    </br>
                    <div class="form-group">
                        <label for="firmaAutoridad"><b style="color: black;">Firma electrónica<b></label>
                        <img src="{{asset($pathTempPhoto)}}" width="50" height="50" class="img-fluid ml-3" alt="Firma">
                        <input wire:model="firmaAutoridad" type="file" accept="image/*" class="form-control" id="firmaAutoridad">@error('firmaAutoridad') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    </br>
                    <div class="form-group">
                        <label for="cargoYTareasRealizadas"><b style="color: black;">Hábilidades y logros del estudiante<b></label>
                        <textarea wire:model="cargoYTareasRealizadas" type="text" class="form-control" id="cargoYTareasRealizadas" placeholder="Describe las habilidades, cualidades personales o logros del estudiante"></textarea>@error('cargoYTareasRealizadas') <span class="error text-danger">{{ $message }}</span> @enderror               
                    </div>
                    </br>
                    <div class="form-group">
                        <label for="autoridadAcademica_id" hidden><b style="color: black;">Autoridad que emite la carta: </b> {{$autoridad->nombreAutoridad}}, {{$autoridad->apellidosAutoridad}}</label>
                    </div>
                    </br>
                    <div class="form-group">
                        <label for="estudiante_id" hidden><b style="color: black;">Estudiante: <b> {{$id_estu}}</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn close-btn" data-bs-dismiss="modal" style="background-color: #d3d3d3;">Cancelar</button>
                <button type="button" wire:click.prevent="editCarta()" class="btn btn-primary" style="background-color: #005c35;">Guardar</button>
            </div>
        </div>
    </div>
</div>

{{-- creamos el modal para eliminar  --}}
<div wire:ignore.self class="modal fade" id="DeletDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="DeletModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;">
                <h5 class="modal-title" id="DeletModalLabel" style="color: #f0eadc;">Eliminar</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <h5 class="modal-title" style="color: black;">¿Desea eliminar este dato?</h5>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn" style="background-color: #005c35;" data-bs-dismiss="modal"><b style ="color: #d3d3d3;">Cancelar</b></button>
                <button type="button" wire:click="destroy()" class="btn btn-primary" style="background-color:  #d3d3d3;" data-bs-dismiss="modal"><b style="color: black;">Sí, deseo eliminarlo<b></button>
            </div>
       </div>
    </div>
</div> 

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('recargarPagina', function () {
            // Recarga la página después de un breve tiempo
            setTimeout(function () {
                location.reload();
            }); // Ajusta el tiempo según sea necesario
        });
    });
</script>