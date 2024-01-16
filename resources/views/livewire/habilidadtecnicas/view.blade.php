@section('title', __('Habilidadtecnicas'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header" style="background-color: #d3d3d3;">
					<div style="display: flex; justify-content: space-between; align-items: left;">
						<div class="float-left">
							<h4>Habilidad técnica</h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-warning" style="position: fixed; top: 50px; right: 10px; z-index: 1000; width: 500px;"> {{ session('message') }} </div>
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
						@include('livewire.habilidadtecnicas.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td style="background-color: #005c35;"><b style="color: #f0eadc;">#</td> 
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Habilidad</th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Facultad</th>
								<td style="background-color: #005c35;"><b style="color: #f0eadc;">Acciones</td>
							</tr>
						</thead>
						<tbody>
							@forelse($habilidadtecnicas as $row)
							<tr>
								<td>{{ $row->tecnicaId }}</td>
								<td>{{ $row->nombreTecnica }}</td>
								<td>{{ $row-> Facultad -> Nfacultad}}</td>
								<td width="125">
									<div class="dropdown">
										<a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->tecnicaId}})"><i class="fa fa-edit"></i> Editar </a>
										<a data-bs-toggle="modal" data-bs-target="#DeletDataModal" class="dropdown-item" wire:click="eliminar({{$row->tecnicaId}})"><i class="fa fa-trash"></i> Eliminar </a>									
									</div>									
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">No existen datos</td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $habilidadtecnicas->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>