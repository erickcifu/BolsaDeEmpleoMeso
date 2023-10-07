<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;">
                <h5 class="modal-title" id="createDataModalLabel" style="color: #f0eadc;">Agendar Entrevista</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="tituloEntrevista">Título de entrevista</label>
                        <input wire:model="tituloEntrevista" type="text" class="form-control" id="tituloEntrevista" placeholder="Ej. Analista de sistemas">@error('tituloEntrevista') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="descripcionEntrevista">Descripción de entrevista</label>
                        <textarea wire:model="descripcionEntrevista" type="text" class="form-control" id="descripcionEntrevista" placeholder="Ej. Usar vestimenta formal, traer papelería completa">@error('descripcionEntrevista') <span class="error text-danger">{{ $message }}</span> @enderror</textarea>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="FechaEntrevista">Fecha de entrevista</label>
                        <input wire:model="FechaEntrevista" type="date" class="form-control" id="FechaEntrevista" placeholder="Fechaentrevista">@error('FechaEntrevista') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="hora_inicio">Hora de inicio</label>
                        <input wire:model="hora_inicio" type="time" class="form-control" id="hora_inicio" placeholder="Hora Inicio">@error('hora_inicio') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="hora_final">Hora de finalización</label>
                        <input wire:model="hora_final" type="time" class="form-control" id="hora_final" placeholder="Hora Final">@error('hora_final') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="Contratado">Usuario contratado</label>
                        <input wire:model="Contratado" type="checkbox" class="form-control form-check-input" id="Contratado" placeholder="Contratado">@error('Contratado') <span class="error text-danger">{{ $message }}</span> @enderror 
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="comentarioContratado">Retroalimentación</label>
                        <textarea wire:model="comentarioContratado" type="text" class="form-control" id="comentarioContratado" placeholder="Comentariocontratado">@error('comentarioContratado') <span class="error text-danger">{{ $message }}</span> @enderror </textarea>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="postulacion_id"></label>
                        <input wire:model="postulacion_id" type="text" class="form-control" id="postulacion_id" placeholder="Postulacion Id">@error('postulacion_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn close-btn" style="background-color: #d3d3d3;" data-bs-dismiss="modal">Cancelar</button>
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
                <h5 class="modal-title" id="updateModalLabel"  style="color: #f0eadc;">Actualizar Entrevista</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="tituloEntrevista">Título de entrevista</label>
                        <input wire:model="tituloEntrevista" type="text" class="form-control" id="tituloEntrevista" placeholder="Ej. Analista de sistemas">@error('tituloEntrevista') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="descripcionEntrevista">Descripción de entrevista</label>
                        <input wire:model="descripcionEntrevista" type="text" class="form-control" id="descripcionEntrevista" placeholder="Ej. Usar vestimenta formal, traer papelería completa">@error('descripcionEntrevista') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="FechaEntrevista">Fecha de entrevista</label>
                        <input wire:model="FechaEntrevista" type="date" class="form-control" id="FechaEntrevista" placeholder="Fechaentrevista">@error('FechaEntrevista') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="hora_inicio">Hora de inicio</label>
                        <input wire:model="hora_inicio" type="time" class="form-control" id="hora_inicio" placeholder="Hora Inicio">@error('hora_inicio') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="hora_final">Hora de finalización</label>
                        <input wire:model="hora_final" type="time" class="form-control" id="hora_final" placeholder="Hora Final">@error('hora_final') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="Contratado">Usuario contratado</label>
                        <input wire:model="Contratado" type="checkbox" class="form-control form-check-input" id="Contratado" placeholder="Contratado">@error('Contratado') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="comentarioContratado">Retroalimentación</label>
                        <textarea wire:model="comentarioContratado" type="text" class="form-control" id="comentarioContratado" placeholder="Comentariocontratado">@error('comentarioContratado') <span class="error text-danger">{{ $message }}</span> @enderror </textarea>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="postulacion_id"></label>
                        <input wire:model="postulacion_id" type="text" class="form-control" id="postulacion_id" readonly>@error('postulacion_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn" data-bs-dismiss="modal" style="background-color: #d3d3d3;">Cancelar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" style="background-color: #005c35;">Guardar</button>
            </div>
       </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="showDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;">
                <h5 class="modal-title" id="updateModalLabel"  style="color: #f0eadc;">Detalle de Entrevista</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="tituloEntrevista">Título de entrevista</label>
                        <input wire:model="tituloEntrevista" type="text" class="form-control" id="tituloEntrevista" readonly>@error('tituloEntrevista') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="descripcionEntrevista">Descripción de entrevista</label>
                        <input wire:model="descripcionEntrevista" type="text" class="form-control" id="descripcionEntrevista" readonly>@error('descripcionEntrevista') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="FechaEntrevista">Fecha de entrevista</label>
                        <input wire:model="FechaEntrevista" type="date" class="form-control" id="FechaEntrevista" readonly>@error('FechaEntrevista') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="hora_inicio">Hora de inicio</label>
                        <input wire:model="hora_inicio" type="time" class="form-control" id="hora_inicio" readonly>@error('hora_inicio') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="hora_final">Hora de finalización</label>
                        <input wire:model="hora_final" type="time" class="form-control" id="hora_final" readonly>@error('hora_final') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="Contratado">Usuario contratado</label>
                        <input wire:model="Contratado" type="checkbox" class="form-control form-check-input" id="Contratado" readonly>@error('Contratado') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="comentarioContratado">Retroalimentación</label>
                        <textarea wire:model="comentarioContratado" type="text" class="form-control" id="comentarioContratado" readonly>@error('comentarioContratado') <span class="error text-danger">{{ $message }}</span> @enderror </textarea>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="postulacion_id"></label>
                        <input wire:model="postulacion_id" type="text" class="form-control" id="postulacion_id" readonly>@error('postulacion_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn" data-bs-dismiss="modal" style="background-color: #d3d3d3;">Cancelar</button>
               </div>
       </div>
    </div>
</div>
