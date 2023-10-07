@section('title', __('Carreras'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header" style="background-color: #d3d3d3;">
					<div style="display: flex; justify-content: space-between; align-items: left;">
						<div class="float-left">
							<h4>Carrera</h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control float-left" name="search" id="search" placeholder="Buscar..." style="background-color: #d3d3d3;">
						</div>
						<div class="btn" style="background-color: #005c35;" data-bs-toggle="modal" data-bs-target="#createDataModal">
							<i class="fa-solid fa-circle-plus" style="color: #f0eadc;" ></i> <h8 style="color: #f0eadc;">Crear</h8>
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.carreras.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td style="background-color: #005c35;"><b style="color: #f0eadc;">#</td> 
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Ncarrera</th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Estadocarrera</th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Facultad Id</th>
								<td style="background-color: #005c35;"><b style="color: #f0eadc;">ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@forelse($carreras as $carrera)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $carrera->Ncarrera }}</td>
								<td>{{ $carrera-> Facultad -> Nfacultad}}</td>
								<td>
									<?php if ($carrera->EstadoCarrera == 1): ?>
										<span class="badge" style="background-color: #005c35;"><b>Activo</b></span>
									<?php else: ?>
										<span class="badge" style="background-color: #d3d3d3;"><b style="color: black;">Inactivo</b></span>
										<a data-bs-toggle="modal" data-bs-target="#ActivarDataModal" class="dropdown-item" wire:click="edit2({{$carrera->id}})"><i class="fa fa-edit"></i> Activar </a>
									<?php endif; ?>		
								</td>
								<td width="125" >
									<a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$carrera->id}})"><i class="fa fa-edit"></i> Editar </a>
									<a data-bs-toggle="modal" data-bs-target="#EliminarDataModal" class="dropdown-item" wire:click="edit2({{$carrera->id}})"><i class="fa fa-trash"></i> Eliminar </a>								
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">Sin datos</td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $carreras->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>