@section('title', __('Postulacions'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header" style="background-color: #d3d3d3;">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4>Postulaciones </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar..." style="background-color: #d3d3d3;">
						</div>
						<div class="btn" style="background-color: #005c35;" data-bs-toggle="modal" data-bs-target="#createPostDataModal">
						<i class="fa-solid fa-circle-plus" style="color: #f0eadc;"></i>  <h8 style="color: #f0eadc;">Crear</h8>
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.postulacions.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td style="background-color: #005c35;"><b style="color: #f0eadc;">#</b></td> 
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Fecha de postulación</b></th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Oferta laboral</b></th>
								<td style="background-color: #005c35;"><b style="color: #f0eadc;">Acciones</b></td>
							</tr>
						</thead>
						<tbody>
							@forelse($postulacions as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->fechaPostulacion }}</td>
								<td>{{ $row-> oferta -> puesto }}</td>
								<td width="90">
									<a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>
									<a class="dropdown-item" onclick="confirm('Confirm Delete Postulacion id {{$row->id}}? \nDeleted Postulacions cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a> 	
									<a data-bs-toggle="modal" data-bs-target="#createEntrevistaModal" class="dropdown-item" wire:click="setPostulacionId({{$row->id}})"><i class="fa fa-clipboard-question"></i> Entrevista </a>					
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">Sin datos</td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $postulacions->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>