<!-- Show Modal -->
<div wire:ignore.self class="modal fade" id="VerOfertaModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;">
                <h5 class="modal-title" id="updateModalLabel" style="color: #f0eadc;">Detalles de oferta</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="color: #f0eadc;">
                <form>
					<input type="hidden" wire:model="selected_id">
                    
                    <div class="form-group">
                        <img wire:model="imagen"  src="https://www.marcelomacias.com/data/blog/10395/images/original/273/disenografico.jpg" class="img-fluid" id="imagen" alt="Responsive image">
                    </div>
                    <br/>
                    <div class="form-group">
                        <input wire:model="puesto" type="text" class="form-control" id="puesto" readonly>@error('puesto') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="sueldoMinimo"><b style="color: black;">Descripción del empleo</b></label>
                        <textarea wire:model="descripcion" type="text" class="form-control" id="descripcion" readonly>@error('descripcion') <span class="error text-danger">{{ $message }}</span> @enderror </textarea>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="sueldoMinimo"><b style="color: black;">Sueldo mínimo</b></label>
                        <input wire:model="sueldoMinimo" type="float" class="form-control" id="sueldoMinimo" readonly>@error('sueldoMinimo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="sueldoMax"><b style="color: black;">Sueldo máximo</b></label>
                        <input wire:model="sueldoMax" type="float" class="form-control" id="sueldoMax" readonly>@error('sueldoMax') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="fecha"><b style="color: black;">Fecha límite para postulación</b></label>
                        <input wire:model="fecha" type="date" class="form-control" id="fecha" readonly>@error('fecha') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="puestoVacante"><b style="color: black;">Cantidad de vacantes</b></label>
                        <input wire:model="puestoVacante" type="number" class="form-control" id="puestoVacante" readonly>@error('puestoVacante') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="tipoContratacion"><b style="color: black;">Modalidad</b></label>
                        <select wire:model="tipoContratacion" type="text" class="form-control" id="tipoContratacion" readonly>@error('tipoContratacion') <span class="error text-danger">{{ $message }}</span> @enderror 
                            <option selected>Tipo de contratación</option>
                            <option value="Virtual">Virtual</option>
                            <option value="Presencial">Presencial</option>
                            <option value="Híbrido">Híbrido</option>
                        </select>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="edadRequerida"><b style="color: black;">Edad requerida</b></label>
                        <input wire:model="edadRequerida" type="number" class="form-control" id="edadRequerida" readonly>@error('edadRequerida') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="genero"><b style="color: black;">Género requerido</b></label>
                        <select wire:model="genero" type="text" class="form-control" id="genero" readonly>@error('genero') <span class="error text-danger">{{ $message }}</span> @enderror 
                            <option selected>Género</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Ambos">Ambos</option>
                        </select>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="perfil"><b style="color: black;">Habilidades requeridas</b></label>
                        <input wire:model="perfil" type="text" class="form-control" id="perfil" readonly>@error('perfil') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="empresa_id"></label>
                        <input wire:model="empresa_id" type="number" class="form-control" id="empresa_id" value="1" hidden>@error('empresa_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn" style="background-color: #d3d3d3;" data-bs-dismiss="modal"><b>Cancelar</b></button>
            </div>
       </div>
    </div>
</div>


<!-- Create Postulacion Modal -->
<div wire:ignore.self class="modal fade" id="createPostDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createPostDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;">
                <h5 class="modal-title" id="createPostDataModalLabel" style="color: #f0eadc;">¿Desea Postularse a esta oferta laboral?</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="fechaPostulacion">Fecha de postulación</label>
                        <input wire:model="fechaPostulacion" type='text' class="form-control" id="fechaPostulacion" readonly>@error('fecha') <span class="error text-danger" disabled>{{ $message }}</span> @enderror
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="oferta_id" hidden>Oferta laboral</label>
                        <input wire:model="oferta_id" type="text" class="form-control" id="oferta_id" placeholder="Oferta Id" hidden>@error('oferta_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn close-btn" data-bs-dismiss="modal" style="background-color: #d3d3d3;">Cancelar</button>
                <button type="button" wire:click.prevent="postular()" class="btn btn-primary" style="background-color: #005c35;">Sí, deseo postularme!</button>
            </div>
        </div>
    </div>
</div>
