@section('title', __('Cvs'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header" style="background-color: #d3d3d3;">
					<div style="display: flex; justify-content: space-between; align-items: left;">
						<div class="float-left">
							<h4>Cv </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control float-left" name="search" id="search" placeholder="Buscar..." style="background-color: #d3d3d3;">
						</div>
						<div class="btn" data-bs-toggle="modal" data-bs-target="#createDataModal" style="background-color: #005c35;">
							<i class="fa-solid fa-circle-plus" style="color: #f0eadc;"></i> <h8 style="color: #f0eadc;">Crear</h8>
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.cvs.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td  style="background-color: #005c35;"><b style="color: #f0eadc;">#</td> 
								<th  style="background-color: #005c35;"><b style="color: #f0eadc;">Direcion domiciliar</th>
								<th  style="background-color: #005c35;"><b style="color: #f0eadc;">Correo electronico</th>
								<th  style="background-color: #005c35;"><b style="color: #f0eadc;">Telefono</th>
								<td  style="background-color: #005c35;"><b style="color: #f0eadc;">ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@forelse($cvs as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->cvId }}</td>
								<td>{{ $row->direcionDomiciliar }}</td>
								<td>{{ $row->correoElectronico }}</td>
								<td>{{ $row->telefonoCv }}</td>
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Actions
										</a>
										<ul class="dropdown-menu">
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a></li>
											<li><a class="dropdown-item" onclick="confirm('Confirm Delete Cv id {{$row->id}}? \nDeleted Cvs cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a></li>  
										</ul>
									</div>								
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">No data Found </td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $cvs->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>