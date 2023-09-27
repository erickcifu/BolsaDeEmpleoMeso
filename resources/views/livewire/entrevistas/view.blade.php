@section('title', __('Entrevistas'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header" style="background-color: #d3d3d3;">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4> Entrevistas </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' style="background-color: #d3d3d3;" type="text" class="form-control" name="search" id="search" placeholder="Buscar...">
						</div>
						<div class="btn" style="background-color: #005c35;" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa-solid fa-circle-plus" style="color: #f0eadc;"></i>  <h8 style="color: #f0eadc;">Crear</h8>
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.entrevistas.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td style="background-color: #005c35;"><b style="color: #f0eadc;">#</b></td> 
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Entrevista</b></th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Fecha de entrevista</b></th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Hora de inicio</b></th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Hora de finalización</b></th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Contratado</b></th>
								<td style="background-color: #005c35;"><b style="color: #f0eadc;">Acciones</b></td>
							</tr>
						</thead>
						<tbody>
							@forelse($entrevistas as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->tituloEntrevista }}</td>
								<td>{{ $row->FechaEntrevista }}</td>
								<td>{{ $row->hora_inicio }}</td>
								<td>{{ $row->hora_final }}</td>
								<td>
								<?php if ($row->Contratado == 1): ?>
									<span class="badge" style="background-color: #005c35;"><b>Contratado</b></span>
								<?php else: ?>
									<span class="badge" style="background-color: #d3d3d3;"><b style="color: black;">No contratado</b></span>
									<a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Cambiar </a>
								<?php endif; ?>
									
								</td>
								<td width="90">
									
									<a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>
									<a class="dropdown-item" onclick="confirm('Desea eliminar la entrevista {{$row->id}}? \nSi elimina este dato no podrá ser recuperado!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a>  
									<a data-bs-toggle="modal" data-bs-target="#showDataModal" class="dropdown-item" wire:click="mostrar({{$row->id}})"><i class="fa fa-eye"></i> Detalles </a>
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">Sin datos</td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $entrevistas->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>