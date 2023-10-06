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
					<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
					@endif
					<div>
						<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar..." style="background-color: #d3d3d3;">
					</div>
					<div class="btn" style="background-color: #005c35;"  data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa-solid fa-circle-plus" style="color: #f0eadc;" ></i> <h8 style="color: #f0eadc;">Crear</h8>
					</div>
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
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Nit</th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Rtu</th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Patente de comercio</th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Descripcion</th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Telefono empresa</th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Correo empresa</th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Direccion empresa</th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Encargado empresa</th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Telefono del encargado</th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Estado empresa</th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Estado solicitud</th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">usuario</th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Municipio</th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Acciones</td>
							</tr>
						</thead>
						<tbody>
							@forelse($empresas as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td> <img src="{{asset($row->logo)}}" width="50" height="50" class="img-fluid">
								</td>
								
								<td>{{ $row->nombreEmpresa }}</td>
								<td>{{ $row->nit }}</td>
								<td> <a href="{{ $row->rtu }}" target="_blank"> ver archivo </a> </td>
								{{--<td>{{ $row->rtu }}</td>--}}
								<td> <a href="{{ $row->patenteComercio }}" target="_blank"> ver archivo </a> </td>
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
										<a data-bs-toggle="modal" data-bs-target="#EliminarDataModal" class="dropdown-item" wire:click="edit2({{$row->empresaId}})"><i class="fa fa-trash"></i> Desactivar </a>
									<?php else: ?>
										<span class="badge" style="background-color: #d3d3d3;"><b style="color: black;">Inactivo</b></span>
										<a data-bs-toggle="modal" data-bs-target="#ActivarDataModal" class="dropdown-item" wire:click="edit2({{$row->empresaId}})"><i class="fa fa-edit"></i> Activar </a>
									<?php endif; ?>
										
								</td>
                                
								
								<td>{{ $row->estadoSolicitud }}</td>
								<td>{{ $row->user->name }}</td>
								<td>{{ $row->municipio->nombreMunicipio }}</td>
								<td width="125">
									<div class="dropdown">
										
										
										<a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->empresaId}})"><i class="fa fa-edit"></i> Editar </a>
									{{--	<a data-bs-toggle="modal" data-bs-target="#DeletDataModal" class="dropdown-item" wire:click="eliminar({{$row->empresaId}})"><i class="fa fa-trash"></i> Eliminar </a>
										
									--}}	

									{{-- boton que cambie para que no usemos el destroy 
									<a data-bs-toggle="modal" data-bs-target="#EliminarDataModal" class="dropdown-item" wire:click="edit2({{$row->empresaId}})"><i class="fa fa-trash"></i> Desactivar </a>	--}}
									
								</div>									
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">No data Found </td>
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