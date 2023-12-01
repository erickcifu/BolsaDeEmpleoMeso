<!-- Add Modal -->
<div wire:ignore.self class="modal fade modal-xl modal-dialog-scrollable" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;" >
                <h5 class="modal-title" id="createDataModalLabel" style="color: #f0eadc;"> 
                    {{ $selected_id === null ? 'Generar CV': 'Actualizar CV'  }}
                </h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: #f0eadc;"></button>
            </div>
            <div class="modal-body" style="color: #f0eadc;">
                <!-- Acordeon -->
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item" id="item1">
                        <h2 class="accordion-header">
                        <button class="accordion-button" style="color: #005c35;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"  data-bs-parent="#accordionExample" aria-expanded="true" aria-controls="collapseOne" disabled>
                            <b>Información general </b>
                        </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" wire:ignore.self   data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="hstack gap-3">
                                    <div style="display: inline-block; width: 100%;">
                                        <div class="mb-2">
                                            <label for="fotoCv">Foto CV*</label>
                                            @if($selected_id !== null)
                                                <img src="{{asset($pathTempPhoto)}}" width="50" height="50" class="img-fluid ml-3" alt="Imagen oferta">
                                            @endif
                                            <input  wire:model="fotoCv" type="file" class="form-control" id="upload{{ $iteration }}" accept="image/*" placeholder="Fotocv">
                                        </div>
                                        @error('fotoCv') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div style="display: inline-block; width: 100%;">
                                        <div class="mb-2">
                                            <label for="direcionDomiciliar">Dirección domiciliar*</label>
                                            <input wire:model="direcionDomiciliar" type="text" class="form-control" id="Dirección domiciliar" placeholder="Quetzaltenango, Guatemala">
                                        </div>
                                        @error('direcionDomiciliar') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <br/>
                                <div class="form-group">
                                    <label for="perfilProfesional">Resumen profesional*</label>
                                    <textarea wire:model="perfilProfesional" type="text" class="form-control" id="perfilProfesional" placeholder="Resumen de tus objetivos profesionales y lo que puedes aportar a una empresa.">
                                    </textarea>    
                                    @error('perfilProfesional') <span class="error text-danger">{{ $message }}</span> @enderror                         
                                </div>
                                <br/>
                                <div class="hstack gap-3">
                                    <div style="display: inline-block; width: 100%;">
                                        <div class="mb-2">
                                            <label for="correoElectronico">Correo electronico*</label>
                                            <input wire:model="correoElectronico" type="text" class="form-control" id="correoElectronico" placeholder="ejemplo@gmail.com">
                                            @error('correoElectronico') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div style="display: inline-block; width: 100%;">
                                        <div class="mb-2">
                                            <label for="telefonoCv">Número de teléfono personal*</label>
                                            <input wire:model="telefonoCv" type="number" class="form-control" id="telefonoCv" placeholder="12345678">
                                            @error('telefonoCv') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="form-group">
                                    <label for="publicaciones">Enlace</label>
                                    <textarea wire:model="publicaciones" type="text" class="form-control" id="publicaciones" placeholder="Incluye enlaces de github, portafolios, publicaciones de los proyectos que haz realizado.">
                                    </textarea>    
                                    @error('publicaciones') <span class="error text-danger">{{ $message }}</span> @enderror                         
                                </div>
                                <br/>
                                <div class="hstack gap-3">
                                    <div style="display: inline-block; width: 100%;">
                                        <div class="mb-2">
                                            <label for="nombreRef1">Nombre de referencia*</label>
                                            <input wire:model="nombreRef1" type="text" class="form-control" id="nombreRef1" placeholder="Ingresa el nombre de alguien con quien la empresa pueda comunicarse en caso de necesitar referencias.">
                                            </input>
                                            @error('nombreRef1') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div style="display: inline-block; width: 100%;">
                                        <div class="mb-2">
                                            <label for="telRef1">Teléfono de referencia*</label>
                                            <input wire:model="telRef1" type="number" class="form-control" id="telRef1" placeholder="Ingresa el número de teléfono">
                                            </input>
                                            @error('telRef1') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="hstack gap-3">
                                    <div style="display: inline-block; width: 100%;">
                                        <div class="mb-2">
                                            <label for="nombreRef2">Nombre de referencia*</label>
                                            <input wire:model="nombreRef2" type="text" class="form-control" id="nombreRef2" placeholder="Ingresa el nombre de alguien con quien la empresa pueda comunicarse en caso de necesitar referencias."/>
                                            @error('nombreRef2') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div style="display: inline-block; width: 100%;">
                                        <div class="mb-2">
                                            <label for="telRef2">Teléfono de referencia*</label>
                                            <input wire:model="telRef2" type="number" class="form-control" id="telRef2" placeholder="Ingresa el número de teléfono">
                                            </input>
                                            @error('telRef2') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="hstack gap-3">
                                    <div style="display: inline-block; width: 100%;">
                                        <div class=" mb-3">
                                            <label for="habilidades">Habilidades*</label>
                                            <textarea wire:model="habilidades" type="text" class="form-control" id="habilidades" placeholder="Enumera tus habilidades relevantes para el trabajo, ya sean habilidades técnicas o habilidades blandas">
                                            </textarea>
                                            @error('habilidades') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class=" mb-3">
                                            <label for="intereses">Áreas de intéres personal*</label>
                                            <textarea wire:model="intereses" type="text" class="form-control" id="intereses" placeholder="Escrube tus intereses y actividades extracurricuares">
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
                                <div class="form-group text-end">
                                    <button type="button" wire:click="addCertificacion" class="btn btn-primary" style="background-color: #005c35;">
                                        <i class="fa-solid fa-circle-plus" style="color: #f0eadc;"></i> <h8 style="color: #f0eadc;">Agregar Certificación</h8>
                                    </button>
                                </div>
                                @foreach($certificaciones as $indice => $cert)
                                <div class="row mb-3">
                                    <div class="col-3">
                                        <label for="nombreCertificacion">Certificado/Diploma*</label>
                                        <input type="text" wire:model="certificaciones.{{ $indice }}.nombreCertificacion" class="form-control" placeholder="Si has obtenido alguna certificación o diploma, ingresalo en este campo">
                                        @error('certificaciones.' . $indice . '.nombreCertificacion') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-3">
                                        <label for="anioCertificacion">Fecha certificación*</label>
                                        <input type="date" wire:model="certificaciones.{{ $indice }}.anioCertificacion" class="form-control">
                                        @error('certificaciones.' . $indice . '.anioCertificacion') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-3">
                                        <label for="institucionCertificadora">Institución Certificadora*</label>
                                        <input type="text" wire:model="certificaciones.{{ $indice }}.institucionCertificadora" class="form-control" placeholder="Nombre Institución Certificadora">
                                        @error('certificaciones.' . $indice . '.institucionCertificadora') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-3 d-flex align-items-center">
                                        <a class="dropdown-item" wire:click="removeCertificacion({{$indice}})"><i class="fa fa-trash"></i> Eliminar </a>
                                    </div>
                                </div>
                                @endforeach
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
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse"  wire:ignore.self data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="form-group text-end">
                                    <button type="button" wire:click="addExperencia" class="btn btn-primary" style="background-color: #005c35;">
                                        <i class="fa-solid fa-circle-plus" style="color: #f0eadc;"></i> <h8 style="color: #f0eadc;">Agregar Experiencia</h8>
                                    </button>
                                </div>
                                @foreach($experiencia as $indice => $cert)
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <label for="puestoTrabajo">Nombre del puesto*</label>
                                        <input type="text" wire:model="experiencia.{{ $indice }}.puestoTrabajo" class="form-control" placeholder="Si has obtenido alguna certificación o diploma, ingresalo en este campo">
                                        @error('experiencia.' . $indice . '.puestoTrabajo') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-4">
                                        <label for="inicioExperiencia">Fecha de inicio*</label>
                                        <input type="date" wire:model="experiencia.{{ $indice }}.inicioExperiencia" class="form-control">
                                        @error('experiencia.' . $indice . '.inicioExperiencia') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-4">
                                        <label for="finExperiencia">Fecha de renuncia/despido* (Si usted anota la fecha de hoy se guardara como actualmente)</label>
                                        <input type="date" wire:model="experiencia.{{ $indice }}.finExperiencia" class="form-control">
                                        @error('experiencia.' . $indice . '.finExperiencia') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-4">
                                        <label for="lugarTrabajo">Empresa*</label>
                                        <input type="text" wire:model="experiencia.{{ $indice }}.lugarTrabajo" class="form-control" placeholder="Nombre Institución Certificadora">
                                        @error('experiencia.' . $indice . '.lugarTrabajo') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-4">
                                        <label for="descripcionLaboral">Resumen del puesto laboral*</label>
                                        <input type="text" wire:model="experiencia.{{ $indice }}.descripcionLaboral" class="form-control" placeholder="Nombre Institución Certificadora">
                                        @error('experiencia.' . $indice . '.descripcionLaboral') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-4 d-flex align-items-center">
                                        <a class="dropdown-item" wire:click="removeExperencia({{$indice}})"><i class="fa fa-trash"></i> Eliminar </a>
                                    </div>
                                </div>            
                                <br/>
                                @endforeach
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
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse"  wire:ignore.self data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="form-group text-end">
                                    <button type="button" wire:click="addFormacion" class="btn btn-primary" style="background-color: #005c35;">
                                        <i class="fa-solid fa-circle-plus" style="color: #f0eadc;"></i> <h8 style="color: #f0eadc;">Agregar Formación</h8>
                                    </button>
                                </div>
                                @foreach($formacion as $indice => $cert)
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <label for="anioInicioFormacion">Fecha de inicio*</label>
                                        <input type="date" wire:model="formacion.{{ $indice }}.anioInicioFormacion" class="form-control">
                                        @error('formacion.' . $indice . '.anioInicioFormacion') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-4">
                                        <label for="anioFinFormacion">Fecha de fin* (Si usted anota la fecha de hoy se guardara como actualmente)</label>
                                        <input type="date" wire:model="formacion.{{ $indice }}.anioFinFormacion" class="form-control">
                                        @error('formacion.' . $indice . '.anioFinFormacion')
                                        <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-4">
                                        <label for="institucionFormacion">Establecimiento educativo*</label>
                                        <input type="text" wire:model="formacion.{{ $indice }}.institucionFormacion" class="form-control" placeholder="Nombre Institución Certificadora">
                                        @error('formacion.' . $indice . '.institucionFormacion') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-4">
                                        <label for="tituloObtenido">Título Obtenido*</label>
                                        <input type="text" wire:model="formacion.{{ $indice }}.tituloObtenido" class="form-control" placeholder="Título obtenido">
                                        @error('formacion.' . $indice . '.tituloObtenido') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-4">                                        
                                        <label for="nivelFormacion" style="font-size: 15px;"><b>Nivel educativo*</b></label>
                                        <select wire:model="formacion.{{ $indice }}.nivelFormacion" type="text" class="form-control" id="nivelFormacion" placeholder="Nivel educativo">
                                            <option selected>Nivel educativo</option>
                                            <option value="Diversificado">Diversificado</option>
                                            <option value="Licenciatura">Licenciatura</option>
                                            <option value="Maestría">Maestría</option>
                                            <option value="Doctorado">Doctorado</option>
                                        </select>
                                        @error('formacion.' . $indice . '.nivelFormacion') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-4 d-flex align-items-center">
                                        <a class="dropdown-item" wire:click="removeFormacion({{$indice}})"><i class="fa fa-trash"></i> Eliminar </a>
                                    </div>
                                </div>            
                                <br/>
                                @endforeach
                                <!-- Fin inputs Condiciones y beneficios -->
                                <!-- inicio botones -->
                                <div class="form-group">
                                <!-- boton anterior -->
                                    <button type="button" wire:click="pasoAnterior" data-bs-toggle="collapse" data-bs-target="#collapseThree" class="btn btn-primary" style="background-color: #005c35;" >Anterior</button>
                                    <button type="button"  wire:click="siguientePaso" style="background-color: #005c35;"class="btn btn-primary"
                                    @if($paso === 5)
                                        data-bs-toggle="collapse" data-bs-target="#collapseFive"  @endif>Siguiente</button>
                                </div>
                                <!-- Fin botones -->
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" id="item5">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed"  style="color: #005c35;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive"  data-bs-parent="#accordionExample" disabled>
                                <b> Idiomas</b>
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse"  wire:ignore.self data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="form-group text-end">
                                    <button type="button" wire:click="addIdiomas" class="btn btn-primary" style="background-color: #005c35;">
                                        <i class="fa-solid fa-circle-plus" style="color: #f0eadc;"></i> <h8 style="color: #f0eadc;">Agregar Idioma</h8>
                                    </button>
                                </div>
                                @foreach($idiomas as $indice => $idi)
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <label for="idiomaId" style="font-size: 15px;"><b>Idioma*</b></label>
                                        <select wire:model="idiomas.{{ $indice }}.idiomaId" type="text" class="form-control" id="idiomas.{{ $indice }}.idiomaId">
                                            <option selected disabled>Nivel educativo</option>
                                            @foreach($idiomasTable as $idioma)
                                            <option value="{{ $idioma->idiomaId }}">{{$idioma->nombreIdioma}}</option>
                                            @endforeach
                                        </select>
                                        @error('idiomas.' . $indice . '.idiomaId') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-4">                                        
                                        <label for="nivelIdioma" style="font-size: 15px;"><b>Nivel de Idioma*</b></label>
                                        <select wire:model="idiomas.{{ $indice }}.nivelIdioma" type="text" class="form-control" id="nivelIdioma" placeholder="Nivel educativo">
                                            <option selected>Nivel idioma</option>
                                            <option value="Basico">Básico</option>
                                            <option value="Intermedio">Intermedio</option>
                                            <option value="Avanzado">Avanzado</option>
                                        </select>
                                        @error('formacion.' . $indice . '.nivelIdioma') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-4 d-flex align-items-center">
                                        <a class="dropdown-item" wire:click="removeIdiomas({{$indice}})"><i class="fa fa-trash"></i> Eliminar </a>
                                    </div>
                                </div>
                                <br/>
                                @endforeach
                                <!-- Fin inputs Condiciones y beneficios -->
                                <!-- inicio botones -->
                                <div class="form-group">
                                <!-- boton anterior -->
                                    <button type="button" wire:click="pasoAnterior" data-bs-toggle="collapse" data-bs-target="#collapseFour" class="btn btn-primary" style="background-color: #005c35;" >Anterior</button>
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
                <button type="button" wire:click.prevent="process()" class="btn btn-primary"  data-bs-dismiss="modal" style="background-color: #005c35;">Guardar</button>
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
