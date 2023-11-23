@section('title', __('PostulacionEstudiante'))
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
						<div wire:poll.4s class="btn btn-sm btn-warning" style="position: fixed; top: 50px; right: 10px; z-index: 1000; width: 500px;"> {{ session('message') }} </div>
						@endif
						<!-- <div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar..." style="background-color: #d3d3d3;">
						</div> -->
						
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.postulacionestudiantes.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td style="background-color: #005c35;"><b style="color: #f0eadc;">#</b></td> 
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Fecha de postulación</b></th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Oferta laboral</b></th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Empresa</b></th>
								<td style="background-color: #005c35;"><b style="color: #f0eadc;">Acciones</b></td>
							</tr>
						</thead>
						<tbody>
							@forelse($postulacionesEstudiante as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{date('d-m-Y', strtotime($row->fechaPostulacion))}}</td>
								<td>{{ $row-> oferta -> nombrePuesto }}</td>
								<td>{{ $row-> oferta -> empresa -> nombreEmpresa }}</td>
								<td width="90">
									<a  data-bs-toggle="modal" data-bs-target="#DeletDataModal" class="dropdown-item" wire:click="edit2({{$row->postulacionId}})"><i class="fa fa-trash"></i> Eliminar </a> 		
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">Sin datos</td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $postulacionStudent->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>