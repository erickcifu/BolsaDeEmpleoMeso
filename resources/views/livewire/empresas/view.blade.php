	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-md-12">
            	<body style="background-color: #d3d3d3">
					<div class="float-center align-items-center" style="width: 70%;">
					</div>
					@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-warning" style="position: fixed; top: 50px; right: 10px; z-index: 1000; width: 500px;"> {{ session('message') }} </div>
					@endif
                	<div class="card-body" style="background-color: #ffffff">
                    	@include('livewire.empresas.modals')
                    	<form class="mx-auto mt-4" style="width: 95%; ">
							<br/>
							<div class="container">        
                            	@forelse($empresas as $row)
                                <div class="card mx-auto my-4" style="max-width: 200vh; background-color: #ffffff">
										<div class="card-head" style="inline-block; width: 100%; background-color: #d3d3d3">
											<div style="display: inline-block; width: 100%;  padding-left: 1em;">
												<div class="mb-2">
													<h2 class="card-title text-center"style="color: #005C38;">	
													<br/>{{ $row->nombreEmpresa }}
													</h2>
												</div>
											</div>
										</div>
										
										<div class="text-center">
											<br/>
											@if( $row->logo )
											<img src="{{ Storage::url('logos/'. $row->logo) }}" width="75" height="75" class="img-fluid"/>
											<a data-bs-toggle="modal" data-bs-target="#LogoDataModal" class="dropdown-item" wire:click="editlog({{$row->empresaId}})" style="cursor: pointer;"><i class="fa fa-edit"></i>Editar logotipo</a>
											@else
												Logotipo no disponible
												<a data-bs-toggle="modal" data-bs-target="#LogoDataModal" class="dropdown-item" wire:click="editlog({{$row->empresaId}})" style="cursor: pointer;"><i class="fa fa-edit"></i> Editar logotipo </a>
											@endif
										</div>
										<br/>
										<div class="card-body" style="background-color: #ffffff">
											<div class="hstack gap-3">
												<div style="display: inline-block; width: 100%;">
													<div class="mb-2">
														<p class="card-text fs-5">NIT: {{ $row->nit }}</p>
													</div>
												</div>
												<div style="display: inline-block; width: 100%;">
													<div class="mb-2">
														<p class="card-text fs-5">Dirección: {{ $row->direccionEmpresa }}</p>
													</div>
												</div>
											</div>
											<br/>
											<div class="hstack gap-3">
												<div style="display: inline-block; width: 100%;">
													<div class="mb-2">
														<p class="card-text fs-5">Número de teléfono: {{ $row->telefonoEmpresa }}</p>
													</div>
												</div>
												<div style="display: inline-block; width: 100%;">
													<div class="mb-2">
														<p class="card-text fs-5">Correo electrónico: {{ $row->correoEmpresa }}</p>
													</div>
												</div>
											</div>
											<br/>
											<div class="hstack gap-3">
												<div style="display: inline-block; width: 100%;">
													<div class="mb-2">
														<p class="card-text fs-5">Departamento: {{ $row->municipio->Departamento->nombreDepartamento}}</p>
													</div>
												</div>
												<div style="display: inline-block; width: 100%;">
													<div class="mb-2">
														<p class="card-text fs-5">Municipio: {{ $row->municipio->nombreMunicipio }}</p>
													</div>
												</div>
											</div>
											<br/>
											<p class="card-text fs-5">Descripción: {{ $row->descripcionEmpresa }}</p>
											<div class="text-center">
												<hr class="w-100" style="border: 1px solid #212121; margin: 0 auto;">
												<p class="mb-3 card-text fs-5">- Datos del encargado -</p>
											</div>
											<div class="hstack gap-3">
												<div style="display: inline-block; width: 100%;">
													<div class="mb-2">
														<p class="card-text fs-5">Encargado: {{ $row->encargadoEmpresa }}</p>
													</div>
												</div>
												<div style="display: inline-block; width: 100%;">
													<div class="mb-2">
														<p class="card-text fs-5">Teléfono del encargado: {{ $row->telefonoEncargado }}</p>
													</div>
												</div>
											</div>
											<br/>
											<hr class="w-100" style="border: 1px solid #212121; margin: 0 auto;">
											<br/>
											<div class="hstack gap-3">
												<div style="display: inline-block; width: 100%;">
													<div class="mb-2">
														<p class="card-text fs-5"> Estado de la Empresa:
															<?php if ($row->estadoEmpresa == 1): ?>
																<span class="badge" style="background-color: #005c35;"><b>Activo</b></span>
																
															<?php else: ?>
																<span class="badge" style="background-color: #d3d3d3;"><b style="color: black;">Inactivo</b></span>
																
															<?php endif; ?>						
														</p>
													</div>
												</div>
												<div style="display: inline-block; width: 100%;">
													<div class="mb-2">
														<p class="card-text fs-5"> Estado de solicitud: 
															<?php if ($row->estadoSolicitud == 'Aceptado'): ?>
																<span class="badge" style="background-color: #005c35;"><b>Aceptado</b></span>
															<?php elseif ($row->estadoSolicitud == 'en Espera'): ?>
																<span class="badge" style="background-color: #efc50d;"><b>{{ $row->estadoSolicitud }}</b></span> 
															<?php else: ?>
																<span class="badge" style="background-color: #990d0d;"><b style="color: rgb(244, 241, 241);">{{ $row->estadoSolicitud }}</b></span>		 
															<?php endif; ?>
														</p>
													</div>
												</div>
											</div>
											<br/>
											<div class="text-center">
												<hr class="w-100" style="border: 1px solid #212121; margin: 0 auto;">
												<p class="mb-3 card-text fs-5">- Documentos de identificación comercial -</p>
											</div>
											<div class="card d-flex justify-content-center align-items-left">
												<div class="card-body" style="background-color: #d3d3d3">
													<div class="hstack gap-3">
														<div style="display: inline-block; width: 100%;">
															<div class="mb-2">
																<p class="m-0 card-text fs-5">RTU:
																	@if ( $row->rtu )
																		<a style="text-decoration: none; color: inherit;" class="p-0" href="{{ Storage::url('rtus/'. $row->rtu) }}" target="_blank"><i class="fa fa-eye"></i> Ver archivo</a>
																		<span class="text-muted">|</span>
																		<a style="text-decoration: none; color: inherit; cursor:pointer" class="p-0 ms-2" data-bs-toggle="modal" data-bs-target="#rtuDataModal"  wire:click="editrtu({{$row->empresaId}})">
																		<i class="fa fa-edit"></i>
																		Editar RTU
																	</a>
																	@else
																		No disponible
																		<a type="button" data-bs-toggle="popover" data-bs-trigger="hover" title="Cargar un RTU" data-bs-content="En caso de que el RTU no esté disponible, puede subirlo nuevamente desde el botón 'Editar RTU'.">
																		<i class="fa-solid fa-circle-info"></i>
																		</a>
																		<span class="text-muted">|</span>
																		<a style="text-decoration: none; color: inherit; cursor:pointer" class="p-0 ms-2" data-bs-toggle="modal" data-bs-target="#rtuDataModal"  wire:click="editrtu({{$row->empresaId}})">
																		<i class="fa fa-edit"></i>
																		Editar RTU
																	</a>
																	@endif
																</p>
															</div>
														</div>
														<div style="display: inline-block; width: 100%;">
															<div class="mb-2">
																<p class="m-0 card-text fs-5">Patente de Comercio:
																@if ( $row->patenteComercio )
																		<a style="text-decoration: none; color: inherit;" class="p-0" href="{{ Storage::url('patentes/'. $row->patenteComercio) }}" target="_blank"><i class="fa fa-eye"></i> Ver archivo</a>
																		<span class="text-muted">|</span>
																		<a style="text-decoration: none; color: inherit; cursor:pointer" data-bs-toggle="modal" data-bs-target="#panDataModal" class="p-0 ms-2" wire:click="editpan({{$row->empresaId}})"><i class="fa fa-edit"></i>
																		Editar PDC
																		</a>
																	@else
																		No disponible
																		<a type="button" data-bs-toggle="popover" data-bs-trigger="hover" title="Cargar una Patente de Comercio" data-bs-content="En caso de que la Patente de Comercio no esté disponible, puede subir el documento nuevamente desde el botón 'Editar PDC'.">
																		<i class="fa-solid fa-circle-info"></i>
																		</a>
																		<span class="text-muted">|</span>
																		<a style="text-decoration: none; color: inherit; cursor:pointer" data-bs-toggle="modal" data-bs-target="#panDataModal" class="p-0 ms-2" wire:click="editpan({{$row->empresaId}})"><i class="fa fa-edit"></i>
																		Editar PDC
																		</a>
																	@endif
																</p>
															</div>
														</div>
													</div>											
												</div>
											</div>
										</div>
										<div class="modal-footer mt-3">
											<a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="btn btn-secondary" wire:click="edit({{$row->empresaId}})"style="background-color: #005c35">Editar</a>
										</div>
										<br/>
                                </div>
								@empty
									<div class="col">
										<p class="text-center">Sin datos</p>
									</div>
								@endforelse
                        	</div>
                        	<br/>
                    	</form>
                	</div>
				</body>
        	</div>
    	</div>
	</div>

	<script>
		document.addEventListener('livewire:load', function () {
			// Inicializar el popover después de que se carga Livewire
			new bootstrap.Popover(document.querySelector('[data-bs-toggle="popover"]'));
		});
	</script>	
