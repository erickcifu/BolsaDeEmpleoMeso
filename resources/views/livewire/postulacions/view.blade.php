@section('title', __('Postulacions'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header" style="background-color: #d3d3d3;">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4>Postulaciones - {{ $nombreOferta }}</h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-warning" style="position: fixed; top: 50px; right: 10px; z-index: 1000; width: 500px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar..." style="background-color: #d3d3d3;">
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
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Postulante</b></th>
                                <th style="background-color: #005c35;"><b style="color: #f0eadc;">Curriculum</b></th>
								<td style="background-color: #005c35;"><b style="color: #f0eadc;">Acciones</b></td>
							</tr>
						</thead>
						<tbody>
                        
                            @forelse($postulaciones as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ date('d-m-Y', strtotime($row->fechaPostulacion)) }}</td>
								<td>{{ $row-> estudiante -> nombre }}, {{ $row-> estudiante -> apellidos }}</td>
                                <td>
                                    @if($row->estudiante  && File::exists($row->estudiante->curriculum))
                                        <a href="{{ asset($row->estudiante->curriculum) }}" target="_blank"> Ver archivo </a>
                                    @else
                                        Sin currículum disponible
                                    @endif
                                </td>
								<td width="90">
									<a data-bs-toggle="modal" data-bs-target="#createEntrevistaModal" class="dropdown-item" wire:click="setPostulacionId({{$row->postulacionId}})"><i class="fa fa-clipboard-question"></i> Entrevista </a>					
								</td>
								@empty
								<td>
									<td class="text-center" colspan="100%">Sin datos</td>
								</td>
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