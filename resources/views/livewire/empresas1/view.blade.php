<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <body style="background-color: #d3d3d3">
                <div class="float-center align-items-center" style="width: 70%;">
                    <h2 class="align-items-center" style="color: #005C38; padding-left: 1em;">Perfil de la Empresa</h2>
                </div>
                <div class="card">
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
											
										
										<img src="{{asset($row->logo)}}" width="150" height="150" class="img-fluid" > <h6 data-bs-toggle="modal" data-bs-target="#LogoDataModal" class="dropdown-item" wire:click="editlog({{$row->empresaId}})"></h6>
										
									</div>
									
										
										
									<h1 class="card-title text-center"style="color: #c70e0e;">
										CUENTA INACTIVA			
													
									</h1>
                                    <h5 class="card-title text-center"style="color: #005C38;">
												
                                        Para reactivar su cuenta, envíe un correo a: <br>
                                        bolsaempleoquetzaltenango@umes.edu.gt <br>
                                        haciendo la solicitud.
									</h5>
                                  
									

											
											
											<div class="pie">	
												
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
