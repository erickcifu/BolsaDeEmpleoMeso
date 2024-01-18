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
							<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
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
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Nombre</th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Apellidos</th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Carnet</th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">DPI</th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Correo</th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Número Personal</th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Número Domiciliar</th>
								{{-- <th style="background-color: #005c35;"><b style="color: #f0eadc;">Curriculum</th> --}}
								<td style="background-color: #005c35;"><b style="color: #f0eadc;">Acciones</td>
							</tr>
						</thead>
						<tbody>
							@forelse($estudiantes as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->nombre }}</td>
								<td>{{ $row->apellidos }}</td>
								<td>{{ $row->carnet }}</td>
								<td>{{ $row->DPI }}</td>
								<td>{{ $row->correo }}</td>
								<td>{{ $row->numero_personal }}</td>
								<td>{{ $row->numero_domiciliar }}</td>
								{{-- <td>{{ $row->curriculum }}</td> --}}
								<td width="125" >
									<a data-bs-toggle="modal" data-bs-target="#createCarta" class="dropdown-item" wire:click="setEstudianteId({{$row->estudianteId}})"><i class="fa fa-clipboard-question"></i> Generar carta </a>
									
													
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