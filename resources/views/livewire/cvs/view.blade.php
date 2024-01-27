@section('title', __('Cvs'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header" style="background-color: #d3d3d3;">
					<div style="display: flex; justify-content: space-between; align-items: left;">
						<div class="float-left">
							<h4>Curriculum Vitae</h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-warning" style="position: fixed; top: 50px; right: 10px; z-index: 1000; width: 500px;"> {{ session('message') }} </div>
						@endif
						<div>
							{{-- <input wire:model='keyWord' type="text" class="form-control float-left" name="search" id="search" placeholder="Buscar..." style="background-color: #d3d3d3;"> --}}
						</div>
						<div>
							{{-- <div class="btn" data-bs-toggle="modal" data-bs-target="#createDataModal" style="background-color: #005c35;">
								<i class="fa-solid fa-circle-plus" style="color: #f0eadc;"></i> <h8 style="color: #f0eadc;">Crear</h8>
							</div>	 --}}
							{{-- <div class="btn" wire:click="downloadCV()" style="background-color: #005c35;" >
								<i class="fa-solid fa-download" style="color: #f0eadc;"></i> <h8 style="color: #f0eadc;">Descargar CV</h8>
							</div> --}}
						</div>
						<div>
							@if ($cvs->isNotEmpty())
							<!-- Botón deshabilitado si hay registros -->
							<div class="btn" style="background-color: #005c35;" hidden>
								<i class="fa-solid fa-circle-plus" style="color: #f0eadc;"></i> <h8 style="color: #f0eadc;">Crear</h8>
							</div>
							<div class="btn" wire:click="downloadCV()" style="background-color: #005c35;" >
								<i class="fa-solid fa-download" style="color: #f0eadc;"></i> <h8 style="color: #f0eadc;">Descargar CV</h8>
							</div>
						@else
							<!-- Botón activo si no hay registros -->
							<div class="btn" data-bs-toggle="modal" data-bs-target="#createDataModal" style="background-color: #005c35;">
								<i class="fa-solid fa-circle-plus" style="color: #f0eadc;"></i> <h8 style="color: #f0eadc;">Crear</h8>
							</div>
							
						@endif
							<!-- Resto de tu código ... -->
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.cvs.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td  style="background-color: #005c35;"><b style="color: #f0eadc;">ID</td> 
								<td  style="background-color: #005c35;"><b style="color: #f0eadc;">Fotografía</td> 
								<th  style="background-color: #005c35;"><b style="color: #f0eadc;">Dirección domiciliar</th>
								<th  style="background-color: #005c35;"><b style="color: #f0eadc;">Correo electrónico</th>
								<th  style="background-color: #005c35;"><b style="color: #f0eadc;">Teléfono</th>
								<td  style="background-color: #005c35;"><b style="color: #f0eadc;">Acciones</td>
							</tr>
						</thead>
						<tbody>
							@forelse($cvs as $row)
							<tr>
								<td>{{ $row->cvId }}</td> 
								<td> <img src="{{asset($row->fotoCv)}}" width="50" height="50" class="img-fluid">
								</td>
								<td>{{ $row->direcionDomiciliar }}</td>
								<td>{{ $row->correoElectronico }}</td>
								<td>{{ $row->telefonoCv }}</td>
								<td width="90">
									{{-- <i class="fa-solid fa-download" style="color: #f0eadc;"></i> <h8 style="color: #f0eadc;">Descargar CV</h8> --}}
									{{-- <a data-bs-toggle="modal" wire:click="downloadCV()" class="dropdown-item" ><i class="fa-solid fa-download"></i> Descargar  </a> --}}
									<a data-bs-toggle="modal" data-bs-target="#createDataModal" class="dropdown-item" wire:click="edit({{$row->cvId}})"><i class="fa fa-edit"></i> Editar </a>
									<a data-bs-toggle="modal" data-bs-target="#DeletDataModal" class="dropdown-item" wire:click="eliminar({{$row->cvId}})"><i class="fa fa-trash"></i> Eliminar </a>
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">Sin datos.</td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $cvs2->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
    /* Establece el cursor predeterminado para todos los elementos a */
    a {
        cursor: pointer;
    }

    /* Establece el cursor personalizado para los elementos a con la clase "custom-cursor" */
    a.custom-cursor {
        cursor: url('ruta_del_cursor_personalizado.png'), auto;
    }
</style>