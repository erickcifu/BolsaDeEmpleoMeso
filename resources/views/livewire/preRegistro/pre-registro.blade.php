@section('title', __('Pre-registro'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header" style="background-color: #d3d3d3;">
					<div style="display: flex; justify-content: space-between; align-items: left;">
						<div class="float-left">
							
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-warning" style="position: fixed; top: 50px; right: 10px; z-index: 1000; width: 500px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar..." style="background-color: #d3d3d3;">
						</div>
						<div>
						</div>
					</div>
				</div>
				
				
				<div class="card-body">
					<div wire:poll.10s="refreshTable" class="table-responsive">
						<table class="table table-bordered table-sm">
							<thead class="thead">
								<tr> 
									<td style="background-color: #005c35;"><b style="color: #f0eadc;">#</td> 
									<th style="background-color: #005c35;"><b style="color: #f0eadc;">Representante</th>
									<th style="background-color: #005c35;"><b style="color: #f0eadc;">Correo electrónico</th>
                                    <th style="background-color: #005c35;"><b style="color: #f0eadc;">Fecha de pre-registro</th>
								</tr>
							</thead>
							<tbody>
								@forelse($enProceso as $row)
								<tr>
                                    <td>{{ $loop->iteration }}</td> 
									<td>{{ $row->name }}</td>
									<td>{{ $row->email }}</td>
                                    <td>{{date('d-m-Y', strtotime($row->created_at))}}</td>										
									</td>
									
								</tr>
								@empty
								<tr>
									<td class="text-center" colspan="100%">Sin datos</td>
								</tr>
								@endforelse
							</tbody>
						</table>						
						<div class="float-end">{{ $enProceso->links() }}</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>
