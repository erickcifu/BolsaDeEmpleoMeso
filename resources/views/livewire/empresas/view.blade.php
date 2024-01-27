<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <body style="background-color: #d3d3d3">
                <div class="float-center align-items-center" style="width: 70%;">
                    <h2 class="align-items-center" style="color: #005C38; padding-left: 1em;">Perfil de la Empresa</h2>
                </div>
                <div class="card">
                    @include('livewire.empresas.modals')
                    <form class="mx-auto mt-4" style="width: 85%; ">
                                          
                            @forelse($empresas as $row)
                                <div class="col">
									
								    
                                    <div class="card mx-auto my-5" style="max-width: 3000px; background-color: #ffffff">
										
										<div class="card-head" style="inline-block; width: 100%; background-color: #d3d3d3">
											<div style="display: inline-block; width: 100%;  padding-left: 1em;">
												
												<h1 class="card-title text-center"style="color: #005C38;">
													
													
													Empresa: {{ $row->nombreEmpresa }}</h1>
													
												
											</div>
										</div>
										
										<div class="text-center">
											
										
										<img src="{{asset($row->logo)}}" width="150" height="150" class="img-fluid" > <h6 data-bs-toggle="modal" data-bs-target="#LogoDataModal" class="dropdown-item" wire:click="editlog({{$row->empresaId}})"><i class="fa fa-edit"></i> Editar logo </h6>
										
									</div>
										
										
										<div class="row">
											<div class="col-sm-6">
											  <div class="card">
												<div class="card-body">
													<p class="card-text fs-5">NIT: {{ $row->nit }}</p>
													<p class="card-text fs-5">Dirección: {{ $row->direccionEmpresa }}</p>
													<p class="card-text fs-5">Número de teléfono: {{ $row->telefonoEmpresa }}</p>
													<p class="card-text fs-5">Correo electrónico: {{ $row->correoEmpresa }}</p>
													<p class="card-text fs-5">Departamento: {{ $row->municipio->Departamento->nombreDepartamento}}</p>
													<p class="card-text fs-5">Municipio: {{ $row->municipio->nombreMunicipio }}</p>
													<p class="card-text fs-5">Descripción: {{ $row->descripcionEmpresa }}</p>
													<p class="card-text fs-5">Usuario: {{ $row->user->name }}</p>
													
												</div>
											  </div>
											</div>
											
											<div class="col-sm-6">
												<div class="card">
												  <div class="card-body">
													<div class="mb-2">
														<p class="card-text fs-5">Encargado: {{ $row->encargadoEmpresa }}</p>
														<p class="card-text fs-5">Teléfono del encargado: {{ $row->telefonoEncargado }}</p>
														
													    <p class="card-text fs-5"> Estado de la Empresa:
															<?php if ($row->estadoEmpresa == 1): ?>
																<span class="badge" style="background-color: #005c35;"><b>Activo</b></span>
																
															<?php else: ?>
																<span class="badge" style="background-color: #d3d3d3;"><b style="color: black;">Inactivo</b></span>
																
															<?php endif; ?>
																
														 </p>

														 <p class="card-text fs-5"> Solicitud:
																		 
															<?php if ($row->estadoSolicitud == 'Aceptado'): ?>
															<span class="badge" style="background-color: #005c35;"><b>Aceptado</b></span>
														<?php elseif ($row->estadoSolicitud == 'en Espera'): ?>
															<span class="badge" style="background-color: #efc50d;"><b>{{ $row->estadoSolicitud }}</b></span>
															
														<?php else: ?>
															<span class="badge" style="background-color: #990d0d;"><b style="color: rgb(244, 241, 241);">{{ $row->estadoSolicitud }}</b></span>
															
														<?php endif; ?>
														</p>
														<div class="text-center">
															<hr class="w-100" style="border: 1px solid #212121; margin: 0 auto;">
															<p class="mb-3 card-text fs-5">- Documentos de identificación comercial -</p>
														</div>
														<br/>
														<div class="mb-2 d-flex align-items-center">
															<p class="m-0 card-text fs-5">RTU:</p>
															<div class="ms-2">
																<a style="text-decoration: none; color: inherit;" class="p-0 me-2"  href="{{ $row->rtu }}" target="_blank">
																	<i class="fa fa-eye"></i>Ver archivo</a>
																<span class="text-muted">|</span>
																<a style="text-decoration: none; color: inherit; cursor:pointer" class="p-0 ms-2" data-bs-toggle="modal" data-bs-target="#rtuDataModal"  wire:click="editrtu({{$row->empresaId}})">
																	<i class="fa fa-edit"></i>
																	Editar RTU
																</a>
															</div>
														</div>
														<!-- Actualización patente de comercio -->
														<div class="mb-2 d-flex align-items-center">
															<p class="m-0 card-text fs-5">Patente de Comercio:</p>
															<div class="ms-2">
																<a style="text-decoration: none; color: inherit; " class="p-0 me-2"  href="{{ $row->patenteComercio }}" target="_blank">
																	<i class="fa fa-eye"></i>Ver archivo</a>
																<span class="text-muted">|</span>
																<a style="text-decoration: none; color: inherit; cursor:pointer" data-bs-toggle="modal" data-bs-target="#panDataModal" class="p-0 ms-2" wire:click="editpan({{$row->empresaId}})"><i class="fa fa-edit"></i>
																	Editar PDC
																</a>
															</div>
														</div>
													</div>
																										
												  </div>
												</div>
											  </div>
											</div>
											<div class="pie">	
												<div class="modal-footer mt-3">
													<a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="btn btn-secondary"
													wire:click="edit({{$row->empresaId}})"style="background-color: #005c35">Editar</a>
												</div>
											</div>
										</div>
                                    </div>
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
            </div>
        </div>
    
    </div>
</div>
