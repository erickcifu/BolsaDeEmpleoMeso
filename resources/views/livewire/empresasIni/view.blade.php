@section('title', __('Empresas'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card-header" style="background-color: #d3d3d3;">
				<div style="display: flex; justify-content: space-between; align-items: left;">
					<div class="float-left">
						<h4>Empresas</h4>
					</div>
					@if (session()->has('message'))
					<div wire:poll.4s class="btn btn-sm btn-warning" style="position: fixed; top: 50px; right: 10px; z-index: 1000; width: 500px;"> {{ session('message') }} </div>
					@endif
					<div>
						<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar..." style="background-color: #d3d3d3;">
					</div>
					<div></div>
					
					
				</div>
			</div>
				
				
				<div class="card-body">
						@include('livewire.empresas.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td style="background-color: #005c35;"><b style="color: #f0eadc;">#</td> 
									<th style="background-color: #005c35;"><b style="color: #f0eadc;">Logo</th>
									<th style="background-color: #005c35;"><b style="color: #f0eadc;">Nombre</th>
									<th style="background-color: #005c35;"><b style="color: #f0eadc;">NIT</th>
									<th style="background-color: #005c35;"><b style="color: #f0eadc;">Rtu</th>
									<th style="background-color: #005c35;"><b style="color: #f0eadc;">Patente de comercio</th>
									<th style="background-color: #005c35;"><b style="color: #f0eadc;">Descripcion</th>
									<th style="background-color: #005c35;"><b style="color: #f0eadc;">Teléfono empresa</th>
									<th style="background-color: #005c35;"><b style="color: #f0eadc;">Correo eléctrónico</th>
									<th style="background-color: #005c35;"><b style="color: #f0eadc;">Dirección de la empresa</th>
									<th style="background-color: #005c35;"><b style="color: #f0eadc;">Encargado de la empresa</th>
									<th style="background-color: #005c35;"><b style="color: #f0eadc;">Teléfono del encargado</th>
									<th style="background-color: #005c35;"><b style="color: #f0eadc;">Estado de la empresa</th>
									<th style="background-color: #005c35;"><b style="color: #f0eadc;">Estado de solicitud</th>
									<th style="background-color: #005c35;"><b style="color: #f0eadc;">Usuario</th>
									<th style="background-color: #005c35;"><b style="color: #f0eadc;">Departamento</th>
									<th style="background-color: #005c35;"><b style="color: #f0eadc;">Municipio</th>
									<th style="background-color: #005c35;"><b style="color: #f0eadc;">Acciones</td>
							</tr>
						</thead>
						<tbody>

							@forelse($empresas as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
									@if( $row->logo )
										<img src="{{ Storage::url('logos/'. $row->logo) }}" width="75" height="75" class="img-fluid"/>
										<a data-bs-toggle="modal" data-bs-target="#LogoDataModal" class="dropdown-item" wire:click="editlog({{$row->empresaId}})" style="cursor: pointer;"><i class="fa fa-edit"></i>Editar logotipo</a>
										@else
											Logotipo no disponible
											<a data-bs-toggle="modal" data-bs-target="#LogoDataModal" class="dropdown-item" wire:click="editlog({{$row->empresaId}})" style="cursor: pointer;"><i class="fa fa-edit"></i> Editar logotipo </a>
										@endif
								</td>
								
								<td>{{ $row->nombreEmpresa }}</td>
								<td>{{ $row->nit }}</td>
								<td>
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
								
								
								{{--<td>{{ $row->rtu }}</td>--}}
								<td> 
									@if ( $row->patenteComercio )
										<a style="text-decoration: none; color: inherit;" class="p-0" href="{{ Storage::url('patentes/'. $row->patenteComercio) }}" target="_blank"><i class="fa fa-eye"></i> Ver archivo</a>
										<span class="text-muted">|</span>
										<a style="text-decoration: none; color: inherit; cursor:pointer" data-bs-toggle="modal" data-bs-target="#panDataModal" class="p-0 ms-2" wire:click="editpan({{$row->empresaId}})"><i class="fa fa-edit"></i>
										Editar PDC
										</a>
									@else
										No disponible
										<span class="text-muted">|</span>
										<a style="text-decoration: none; color: inherit; cursor:pointer" data-bs-toggle="modal" data-bs-target="#panDataModal" class="p-0 ms-2" wire:click="editpan({{$row->empresaId}})"><i class="fa fa-edit"></i>
										Editar PDC
										</a>
									@endif
								</td>
								{{--<td>{{ $row->patenteComercio }}</td>--}}
								<td>{{ $row->descripcionEmpresa }}</td>
								<td>{{ $row->telefonoEmpresa }}</td>
								<td>{{ $row->correoEmpresa }}</td>
								<td>{{ $row->direccionEmpresa }}</td>
								<td>{{ $row->encargadoEmpresa }}</td>
								<td>{{ $row->telefonoEncargado }}</td>

								<td>
									<?php if ($row->estadoEmpresa == 1): ?>
										<span class="badge" style="background-color: #005c35;"><b>Activo</b></span>
										
									<?php else: ?>
										<span class="badge" style="background-color: #d3d3d3;"><b style="color: black;">Inactivo</b></span>
										
									<?php endif; ?>
										
								</td>
								<td>
									<?php if ($row->estadoSolicitud == 'Aceptado'): ?>
										<span class="badge" style="background-color: #005c35;"><b>Aceptado</b></span>
								    <?php elseif ($row->estadoSolicitud == 'en Espera'): ?>
										<span class="badge" style="background-color: #efc50d;"><b>{{ $row->estadoSolicitud }}</b></span>
										
									<?php else: ?>
										<span class="badge" style="background-color: #990d0d;"><b style="color: rgb(244, 241, 241);">{{ $row->estadoSolicitud }}</b></span>
										
									<?php endif; ?>
										
								</td>
                                
								
								{{--<td>{{ $row->estadoSolicitud }}</td>--}}
								<td>{{ $row->user->name }}</td>
								<td>{{ $row->municipio->Departamento->nombreDepartamento}}</td>

								<td>{{ $row->municipio->nombreMunicipio }}</td>
								<td width="125">
									<div class="dropdown">
										
										
										<a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->empresaId}})"><i class="fa fa-edit"></i> Editar </a>
									
								</div>									
								</td>
							</tr>
							@empty
							<tr>
								<div class="btn" style="background-color: #005c35;"  data-bs-toggle="modal" data-bs-target="#createDataModal">
									<i class="fa-solid fa-circle-plus" style="color: #f0eadc;" ></i> <h8 style="color: #f0eadc;">Crear</h8>
								</div>
								<td class="text-center" colspan="100%">Sin datos </td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $empresas->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        // Inicializar el popover después de que se carga Livewire
        new bootstrap.Popover(document.querySelector('[data-bs-toggle="popover"]'));
    });
</script>