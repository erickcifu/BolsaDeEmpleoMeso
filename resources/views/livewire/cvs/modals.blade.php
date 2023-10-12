<!-- Add Modal -->
<div wire:ignore.self class="modal fade modal-xl modal-dialog-scrollable" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;" >
                <h5 class="modal-title" id="createDataModalLabel" style="color: #f0eadc;">Generar CV</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: #f0eadc;"></button>
            </div>
            <div class="modal-body" style="color: #f0eadc;">
                <!-- Acordeon -->
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item" id="item1">
                        <h2 class="accordion-header">
                        <button class="accordion-button" style="color: #005c35;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" disabled>
                            <b>Información general </b>
                        </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" wire:ignore.self   data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        <div class="hstack gap-3">
                            <div style="display: inline-block; width: 100%;">
                                <div class="mb-2">
                                    <label for="fotoCv">Foto CV*</label>
                                    <input wire:model="fotoCv" type="file" class="form-control" id="fotoCv" accept="image/*" placeholder="Fotocv">
                                </div>
                                @error('fotoCv') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div style="display: inline-block; width: 100%;">
                                <div class="mb-2">
                                    <label for="direcionDomiciliar">Dirección domiciliar*</label>
                                    <input wire:model="direcionDomiciliar" type="text" class="form-control" id="direcionDomiciliar" placeholder="Direciondomiciliar">
                                </div>
                                @error('direcionDomiciliar') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                            <br/>
                            <div class="form-group">
                                <label for="perfilProfesional">Perfil profesional*</label>
                                <textarea wire:model="perfilProfesional" type="text" class="form-control" id="perfilProfesional" placeholder="Perfilprofesional">
                                </textarea>    
                                @error('perfilProfesional') <span class="error text-danger">{{ $message }}</span> @enderror                         
                            </div>
                            <br/>
                            <div class="hstack gap-3">
                                <div style="display: inline-block; width: 100%;">
                                    <div class="mb-2">
                                        <label for="correoElectronico">Correo electronico*</label>
                                        <input wire:model="correoElectronico" type="text" class="form-control" id="correoElectronico" placeholder="Correoelectronico">
                                        @error('correoElectronico') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div style="display: inline-block; width: 100%;">
                                    <div class="mb-2">
                                        <label for="telefonoCv">Telefono*</label>
                                        <input wire:model="telefonoCv" type="text" class="form-control" id="telefonoCv" placeholder="Telefonocv">
                                          @error('telefonoCv') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="hstack gap-3">
                                <div style="display: inline-block; width: 100%;">
                                    <div class="mb-2">
                                        <label for="publicaciones">Enlaces</label>
                                        <textarea wire:model="publicaciones" type="text" class="form-control" id="publicaciones" placeholder="enlaces">
                                        </textarea>
                                        @error('publicaciones') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div style="display: inline-block; width: 100%;">
                                    <div class="mb-2">
                                        <label for="referencias">referencias personales</label>
                                        <textarea wire:model="referencias" type="text" class="form-control" id="referencias" placeholder="Referencias">
                                        </textarea>
                                        @error('referencias') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="hstack gap-3">
                                <div style="display: inline-block; width: 100%;">
                                    <div class=" mb-3">
                                        <label for="habilidades">Habilidades</label>
                                        <textarea wire:model="habilidades" type="text" class="form-control" id="habilidades" placeholder="Habilidades">
                                        </textarea>
                                        @error('habilidades') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class=" mb-3">
                                        <label for="intereses">Areas de interes personal</label>
                                        <textarea wire:model="intereses" type="text" class="form-control" id="intereses" placeholder="Intereses">
                                        </textarea>
                                        @error('intereses') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- boton siguiente -->
                            <div class="form-group">
                            <button wire:click="siguientePaso" type="button" class="btn btn-primary" style="background-color: #005c35;" @if($paso === 2) data-bs-toggle="collapse" data-bs-target="#collapseTwo" @endif>
                                Siguiente
                            </button>
                            </div>
                            <!-- Fin boton siguiente -->
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item" id="item2">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed"  style="color: #005c35;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"  data-bs-parent="#accordionExample" disabled>
                        <b> Certificaciones</b>
                        </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse"  wire:ignore.self data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="hstack gap-3">
                                <div style="display: inline-block; width: 100%;">
                                    <div class="mb-2">
                                        <label for="nombreCertificacion">Nombre certificacion</label>
                                        <input wire:model="nombreCertificacion" type="text" class="form-control" id="nombreCertificacion" placeholder="Dividir por '-'" wire:ignore>
                                        @error('nombreCertificacion') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div style="display: inline-block; width: 100%;">
                                    <div class="mb-2">
                                        <label for="anioCertificacion">año de certificacion</label>
                                        <input wire:model="anioCertificacion" type="date" class="form-control" id="anioCertificacion" placeholder="Dividir por '-'" wire:ignore>
                                        @error('anioCertificacion') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <!-- fin requisitos del puesto -->
                            <!-- boton anterior -->
                            <div class="form-group">
                                <button wire:click="pasoAnterior" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" class="btn btn-primary" style="background-color: #005c35;" >Anterior</button>
                            <!-- Fin boton anterior -->
                            <!-- boton siguiente -->
                                <button type="button"  wire:click="siguientePaso" style="background-color: #005c35;"class="btn btn-primary"
                                @if($paso === 3)
                                    data-bs-toggle="collapse" data-bs-target="#collapseThree"  @endif>Siguiente</button>
                            </div>
                            <!-- Fin boton siguiente -->
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item" id="item3">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed"  style="color: #005c35;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"  data-bs-parent="#accordionExample" disabled>
                        <b> Experiencia Laboral </b>
                        </button>
                        <div id="collapseThree" class="accordion-collapse collapse"  wire:ignore.self data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <label for="puestoTrabajo" style="font-size: 15px;"><b>Nombre del puesto*</b></label>
                                <input wire:model="puestoTrabajo" type="text" class="form-control" id="puestoTrabajo" placeholder="Dividir por '-'" wire:ignore>
                                @error('puestoTrabajo') <span style="font-size: 15px;" class="error text-danger">{{ $message }}</span> @enderror
                                <br/>
                                <div class="hstack gap-3">
                                    <div style="display: inline-block; width: 100%;">
                                        <div class=" mb-2">
                                            <label for="finExperiencia" style="font-size: 15px;"><b>fecha de fin experiencia*</b></label>
                                            <input wire:model="finExperiencia" type="date" class="form-control" id="finExperiencia" placeholder="Dividir por '-'" wire:ignore>
                                            @error('finExperiencia') <span style="font-size: 15px;" class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div style="display: inline-block; width: 100%;">
                                        <div class="mb-2">
                                            <label for="inicioExperiencia" style="font-size: 15px;"><b>fecha de inicio experiencia*</b></label>
                                            <input wire:model="inicioExperiencia" type="date" class="form-control" id="inicioExperiencia" placeholder="Dividir por '-'">@error('condicionesLaborales') <span style="font-size: 15px;" class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>       
                                <br/>
                                <div class="hstack gap-3">
                                    <div style="display: inline-block; width: 100%;">
                                        <div class=" mb-2">
                                            <label for="lugarTrabajo" style="font-size: 15px;"><b>Nombre del Lugar de trabajo*</b></label>
                                            <input wire:model="lugarTrabajo" type="text" class="form-control" id="lugarTrabajo" placeholder="Dividir por '-'" wire:ignore>
                                            @error('lugarTrabajo') <span style="font-size: 15px;" class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div style="display: inline-block; width: 100%;">
                                        <div class="mb-2">
                                            <label for="descripcionLaboral" style="font-size: 15px;"><b>descripcion del puesto Laboral*</b></label>
                                            <input wire:model="descripcionLaboral" type="text" class="form-control" id="descripcionLaboral" placeholder="Dividir por '-'" wire:ignore>
                                            @error('descripcionLaboral') <span style="font-size: 15px;" class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>   
                                <!-- Fin inputs Condiciones y beneficios -->
                                <!-- inicio botones -->

                                <div class="form-group">
                                    <button wire:click="pasoAnterior" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" class="btn btn-primary" style="background-color: #005c35;" >Anterior</button>
                                <!-- Fin boton anterior -->
                                <!-- boton siguiente -->
                                    <button type="button"  wire:click="siguientePaso" style="background-color: #005c35;"class="btn btn-primary"
                                    @if($paso === 4)
                                        data-bs-toggle="collapse" data-bs-target="#collapseFour"  @endif>Siguiente</button>
                                </div>
                                <!-- Fin botones -->
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" id="item4">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed"  style="color: #005c35;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"  data-bs-parent="#accordionExample" disabled>
                        <b> Formación académica</b>
                        </button>
                        <div id="collapseFour" class="accordion-collapse collapse"  wire:ignore.self data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <label for="anioInicioFormacion" style="font-size: 15px;"><b>fecha de inicio de formación académica*</b></label>
                                <input wire:model="anioInicioFormacion" type="date" class="form-control" id="anioInicioFormacion" placeholder="Dividir por '-'">
                                @error('anioInicioFormacion') <span style="font-size: 15px;" class="error text-danger">{{ $message }}</span> @enderror
                                <br/>
                                <div class="hstack gap-3">
                                    <div style="display: inline-block; width: 100%;">
                                        <div class=" mb-2">
                                            <label for="anioFinFormacion" style="font-size: 15px;"><b>fecha de fin de formación académica*</b></label>
                                            <input wire:model="anioFinFormacion" type="date" class="form-control" id="anioFinFormacion" placeholder="Dividir por '-'" wire:ignore>
                                            @error('anioFinFormacion') <span style="font-size: 15px;" class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div style="display: inline-block; width: 100%;">
                                        <div class="mb-2">
                                            <label for="nivelFormacion" style="font-size: 15px;"><b>nivel educativo*</b></label>
                                            <input wire:model="nivelFormacion" type="text" class="form-control" id="nivelFormacion" placeholder="Dividir por '-'" wire:ignore>
                                            @error('nivelFormacion') <span style="font-size: 15px;" class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>       
                                <br/>
                                <div class="hstack gap-3">
                                    <div style="display: inline-block; width: 100%;">
                                        <div class=" mb-2">
                                            <label for="institucionFormacion" style="font-size: 15px;"><b>Nombre de la Institución*</b></label>
                                            <input wire:model="institucionFormacion" type="text" class="form-control" id="institucionFormacion" placeholder="Dividir por '-'" wire:ignore>
                                            @error('institucionFormacion') <span style="font-size: 15px;" class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>   
                                <!-- Fin inputs Condiciones y beneficios -->
                                <!-- inicio botones -->
                                <div class="form-group">
                                <!-- boton anterior -->
                                    <button type="button" wire:click="pasoAnterior" data-bs-toggle="collapse" data-bs-target="#collapseThree" class="btn btn-primary" style="background-color: #005c35;" >Anterior</button>
                                </div>
                                <!-- Fin botones -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- fin acordeon -->
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn" style="background-color: #d3d3d3;" data-bs-dismiss="modal"><b>Cancelar</b></button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" style="background-color: #005c35;">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Cv</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="cvId"></label>
                        <input wire:model="cvId" type="text" class="form-control" id="cvId" placeholder="Cvid">@error('cvId') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="direcionDomiciliar"></label>
                        <input wire:model="direcionDomiciliar" type="text" class="form-control" id="direcionDomiciliar" placeholder="Direciondomiciliar">@error('direcionDomiciliar') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="correoElectronico"></label>
                        <input wire:model="correoElectronico" type="text" class="form-control" id="correoElectronico" placeholder="Correoelectronico">@error('correoElectronico') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="telefonoCv"></label>
                        <input wire:model="telefonoCv" type="text" class="form-control" id="telefonoCv" placeholder="Telefonocv">@error('telefonoCv') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fotoCv"></label>
                        <input wire:model="fotoCv" type="text" class="form-control" id="fotoCv" placeholder="Fotocv">@error('fotoCv') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="perfilProfesional"></label>
                        <input wire:model="perfilProfesional" type="text" class="form-control" id="perfilProfesional" placeholder="Perfilprofesional">@error('perfilProfesional') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="habilidades"></label>
                        <input wire:model="habilidades" type="text" class="form-control" id="habilidades" placeholder="Habilidades">@error('habilidades') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="referencias"></label>
                        <input wire:model="referencias" type="text" class="form-control" id="referencias" placeholder="Referencias">@error('referencias') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="publicaciones"></label>
                        <input wire:model="publicaciones" type="text" class="form-control" id="publicaciones" placeholder="Publicaciones">@error('publicaciones') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="intereses"></label>
                        <input wire:model="intereses" type="text" class="form-control" id="intereses" placeholder="Intereses">@error('intereses') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save</button>
            </div>
       </div>
    </div>
</div>
