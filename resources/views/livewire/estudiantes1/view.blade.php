@section('title', __('Estudiantes1'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="card-header" style="background-color: #d3d3d3;">
						<div style="display: flex; justify-content: space-between; align-items: center;">
							<div class="float-left">
								<h4>
								Estudiantes </h4>
							</div>
							@if (session()->has('message'))
							<div wire:poll.4s class="btn btn-sm btn-warning" style="position: fixed; top: 50px; right: 10px; z-index: 1000; width: 500px;"> {{ session('message') }} </div>
							@endif
							<div>
								<input wire:model='keyWord' type="text" class="form-control float-left" name="search" id="search" placeholder="Buscar..." style="background-color: #d3d3d3;">
							</div>
						</div>
					</div>
				
				<div class="card-body">
						@include('livewire.estudiantes1.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td style="background-color: #005c35;"><b style="color: #f0eadc;">#</td> 
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Nombres y Apellidos </th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">No. Carné</th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">DPI</th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Número Personal</th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Carrera</th>
								{{-- <th style="background-color: #005c35;"><b style="color: #f0eadc;">Curriculum</th> --}}
								<td style="background-color: #005c35;"><b style="color: #f0eadc;">Acciones</td>
							</tr>
						</thead>
						<tbody>
							@forelse($estudiantes as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->nombre }} {{ $row->apellidos }}</td>
								<td>{{ $row->carnet }}</td>
								<td>{{ $row->DPI }}</td>
								<td>{{ $row->numero_personal }}</td>
								<td>{{ $row->Carrera->Ncarrera}}</td> 
								{{-- <td>{{ $row->curriculum }}</td> --}}
								<td width="125" >
								@if ($row->cartarecomendacions && $row->cartarecomendacions->isNotEmpty())
									<a data-bs-toggle="modal" data-bs-target="#createCartaDataModal" class="dropdown-item" style="cursor: pointer;" wire:click="obtenerEstudianteId({{$row->estudianteId}})">
										<i class="fa-solid fa-file-circle-plus"></i> Editar Carta
									</a>
									<a data-bs-toggle="modal" data-bs-target="#DeletDataModal" class="dropdown-item" style="cursor: pointer;" wire:click="eliminar({{$row->estudianteId}})"><i class="fa fa-trash"></i> Eliminar </a>
								@else
									<a data-bs-toggle="modal" data-bs-target="#createCartaDataModal" class="dropdown-item" style="cursor: pointer;" wire:click="setEstudianteId({{$row->estudianteId}})">
										<i class="fa-solid fa-file-circle-plus"></i> Generar carta
									</a>
								@endif			
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">Sin datos </td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $estudiantes->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>