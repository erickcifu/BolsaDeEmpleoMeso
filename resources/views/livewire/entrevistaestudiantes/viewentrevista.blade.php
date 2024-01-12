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
						<div wire:poll.4s class="btn btn-sm btn-warning" style="position: fixed; top: 50px; right: 10px; z-index: 1000; width: 500px;"> {{ session('message') }} </div>
						@endif
						<!-- <div>
							<input wire:model='keyWord' style="background-color: #d3d3d3;" type="text" class="form-control" name="search" id="search" placeholder="Buscar...">
						</div> -->
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.entrevistaestudiantes.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td style="background-color: #005c35;"><b style="color: #f0eadc;">#</b></td> 
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Empresa</b></th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Oferta laboral</b></th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Entrevista</b></th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Fecha</b></th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Hora de inicio</b></th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Hora de finalización</b></th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Contratado</b></th>
								<td style="background-color: #005c35;"><b style="color: #f0eadc;">Acciones</b></td>
							</tr>
						</thead>
						<tbody>
							@forelse($entrevistasEstudiante as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ optional($row->postulacions)->oferta->empresa->nombreEmpresa ?? 'N/A'  }}</td>
								<td>{{ optional($row->postulacions)->oferta->nombrePuesto ?? 'N/A'  }}</td>
								<td>{{ $row->tituloEntrevista }}</td>
								<td>{{ date('d-m-Y', strtotime($row->FechaEntrevista))  }}</td>
								<td>{{ $row->horaInicio }}</td>
								<td>{{ $row->horaFinal }}</td>
								<td>
								<?php if ($row->Contratado == 1): ?>
									<span class="badge" style="background-color: #005c35;"><b>Contratado</b></span>
								<?php else: ?>
									<span class="badge" style="background-color: #d3d3d3;"><b style="color: black;">No contratado</b></span>
								<?php endif; ?>
									
								</td>
								<td width="90"> 
									<a data-bs-toggle="modal" data-bs-target="#showDataModal" class="dropdown-item" wire:click="mostrar({{$row->entrevistaId}})"><i class="fa-solid fa-circle-info"></i> Detalles </a>
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