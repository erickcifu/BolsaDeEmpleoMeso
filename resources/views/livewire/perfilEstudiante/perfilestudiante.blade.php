<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <body style="background-color: #d3d3d3">
                <div class="float-center align-items-center" style="width: 70%;">
                    <h2 class="align-items-center" style="color: #005C38; padding-left: 1em;">Perfil del estudiante</h2>
                </div>
				@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-warning" style="position: fixed; top: 50px; right: 10px; z-index: 1000; width: 500px;"> {{ session('message') }} </div>
						@endif
                <div class="card-body" style="background-color: #ffffff">
                    @include('livewire.perfilEstudiante.modals')
                    <form class="mx-auto mt-4" style="width: 95%;">
                        <br/>
                        <div class="container">
                            @forelse($estudiantes as $row)
							<div class="card mx-auto my-4" style="max-width: 200vh; background-color: #ffffff;">
										<div class="card-head" style="inline-block; width: 100%; background-color: #d3d3d3">
											<div style="display: inline-block; width: 100%;  padding-left: 1em;">
												<div class="mb-2">
                                            	<h3 class="card-title text-center"style="color: #005C38;"><br/> {{ $row->nombre }} {{ $row->apellidos }}</h3>
												</div>
											</div>
										</div>
                                        <div class="card-body" style="background-color: #ffffff">
											<div class="hstack gap-3">
												<div style="display: inline-block; width: 100%;">
													<div class="mb-2">
														<p class="card-text fs-5">No. Carné: {{ $row->carnet }} </p>
													</div>
												</div>
												<div style="display: inline-block; width: 100%;">
													<div class="mb-2">
														<p class="card-text fs-5 ">No. DPI/CUI: {{ $row->DPI }}</p>
													</div>
												</div>
											</div>
												<p class="card-text fs-5">Correo electrónico: {{ $row->correo }}</p>
											<div class="hstack gap-3">
												<div style="display: inline-block; width: 100%;">
													<div class="mb-2">
														<p class="card-text fs-5">Teléfono: {{ $row->numero_personal }}</p>
													</div>
												</div>
												<div style="display: inline-block; width: 100%;">
													<div class="mb-2">
														<p class="card-text fs-5">Otro número: {{ $row->numero_domiciliar }}</p>
													</div>
												</div>
											</div>		
											<div class="mb-2 d-flex align-items-center">
												<p class="m-0 card-text fs-5">Currículum:</p>
												<div class="ms-2">
													@if ( $row->curriculum )
													<a style="text-decoration: none; color: inherit; cursor: pointer;" class="p-0" href="{{ Storage::url('cvs/'. $row->curriculum) }}" target="_blank"><i class="fa fa-eye"></i> Ver archivo</a>
													<span class="text-muted">|</span>
													<a style="text-decoration: none; color: inherit; cursor: pointer;" class="p-0" data-bs-toggle="modal" data-bs-target="#curriculumDataModal" wire:click="editCurriculum({{$row->estudianteId}})"><i class="fa fa-edit"></i> Editar</a>
													@else
														Sin currículum
														<a type="button" data-bs-toggle="popover" data-bs-trigger="hover" title="Cargar un currículum" data-bs-content="En caso de no tener un currículum, puede generarlo desde la pestaña 'Generar CV' y subirlo en la opción 'Editar'">
														<i class="fa-solid fa-circle-info"></i>
														</a>
														<span class="text-muted">|</span>
														<a style="text-decoration: none; color: inherit; cursor: pointer;" class="p-0" data-bs-toggle="modal" data-bs-target="#curriculumDataModal" wire:click="editCurriculum({{$row->estudianteId}})"><i class="fa fa-edit"></i> Editar</a>
													@endif
													
												</div>
											</div>

												<div class="hstack gap-3">
													<div style="display: inline-block; width: 100%;">
														<div class="mb-2">
															<p class="card-text fs-5">Departamento: {{ $row->municipio->Departamento->nombreDepartamento }}</p>
														</div>
													</div>
													<div style="display: inline-block; width: 100%;">
														<div class="mb-2">
															<p class="card-text fs-5">Municipio: {{ $row->municipio->nombreMunicipio }}</p>
														</div>
													</div>
												</div>	
												<div class="hstack gap-3">
													<div style="display: inline-block; width: 100%;">
														<div class="mb-2">
															<p class="card-text fs-5">Facultad: {{ $row->Carrera->Facultad->Nfacultad }}</p>
														</div>
													</div>
													<div style="display: inline-block; width: 100%;">
														<div class="mb-2">
															<p class="card-text fs-5">Carrera: {{ $row->Carrera->Ncarrera }}</p>
														</div>
													</div>
												</div>	
											<div class="pie">	
												<div class="modal-footer mt-3">
													<a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="btn btn-secondary"
													wire:click="edit({{$row->estudianteId}})"style="background-color: #005c35">Editar</a>	
												</div>
											</div>
										</div>
                                    </div>
                            @empty
                                    <p class="text-center">Sin datos</p>
                            @endforelse
                        </div>
                        <br/>
                    </form>
                </div>
            </div>
        </div>
    </body>
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        // Inicializar el popover después de que se carga Livewire
        new bootstrap.Popover(document.querySelector('[data-bs-toggle="popover"]'));
    });
</script>
