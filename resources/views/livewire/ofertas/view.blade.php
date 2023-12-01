@section('title', __('Ofertas'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header" style="background-color: #d3d3d3;">
					<div style="display: flex; justify-content: space-between; align-items: left;">
						<div class="float-left">
							<h4>Ofertas</h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-warning" style="position: fixed; top: 50px; right: 10px; z-index: 1000; width: 500px;"> {{ session('message') }} </div>
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
						@include('livewire.ofertas.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-sm" >
						<thead class="thead">
							<tr> 
								<td style="background-color: #005c35;"><b style="color: #f0eadc;">#</b></td> 
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Imagen</b></th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Nombre</b></th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Fecha límite</b></th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Facultad</b></th>
								<th style="background-color: #005c35;"><b style="color: #f0eadc;">Estado</b></th>
								<td style="background-color: #005c35;"><b style="color: #f0eadc;">Acciones</b></td>
							</tr>
						</thead>
						<tbody>
							@forelse($ofertasLaborales as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td> 
								@if($row->imagenPuesto != NULL)
									<img src="{{ asset($row->imagenPuesto) }}" width="50" height="50" class="img-fluid">
								@else
									<!-- Muestra algún marcador de posición o mensaje cuando no hay imagen -->
									<span>Sin imagen</span>
								@endif
									<a data-bs-toggle="modal" data-bs-target="#ImagenDataModal" class="dropdown-item" wire:click="editImagen({{$row->ofertaId}})"><i class="fa fa-edit"></i>Editar</a>
								</td>
								<td>{{ $row->nombrePuesto }}</td>
							    <td id="fechaRegistrada">{{ date('d-m-Y', strtotime($row->fechaMax)) }}</td>
								<td>{{ $row->facultad->Nfacultad }}</td>
								<td>
								<?php if ($row->estadoOferta == 1): ?>
									<span class="badge" style="background-color: #005c35;"><b>Activa</b></span>
									<a data-bs-toggle="modal" data-bs-target="#desactivarDataModal" class="dropdown-item" wire:click="Desactivar({{$row->ofertaId}})">Cerrar</a>
								<?php else: ?>
									<span class="badge" style="background-color: #d3d3d3;"><b style="color: black;">Inactiva</b></span>
								<?php endif; ?>
								</td>
								<td width="125" >
									<a data-bs-toggle="modal" data-bs-target="#createDataModal" class="dropdown-item" wire:click="edit({{$row->ofertaId}})"><i class="fa fa-edit"></i> Editar </a>
									<!-- <a data-bs-toggle="modal" data-bs-target="#EliminarOfertaModal" class="dropdown-item" wire:click="idEliminar({{$row->ofertaId}})"><i class="fa fa-trash"></i> Eliminar </a>	 -->
									<a data-bs-toggle="modal" data-bs-target="#VerOfertaModal" class="dropdown-item" wire:click="mostrarOferta({{$row->ofertaId}})"><i class="fa fa-eye"></i> Visualizar</a>
									<a data-bs-toggle="modal" data-bs-target="#VerPostulacionesModal" wire:click="verPostulaciones({{ $row->ofertaId }})" class="nav-link"><i class="fa fa-pen"></i> Postulaciones </a>	
									<!-- <a data-bs-toggle="modal" data-bs-target="#VerEntrevistasModal" wire:click="verEntrevistas({{ $row->ofertaId }})" class="nav-link"><i class="fa-regular fa-address-book"></i> Entrevistas </a>			 -->
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%"><b>Sin datos</b></td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $ofertas->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
    // Obtén el elemento HTML que contiene la fecha registrada
    var fechaRegistradaElement = document.getElementById('fechaRegistrada');

    // Obtiene la fecha registrada como una cadena
    var fechaRegistradaStr = fechaRegistradaElement.innerHTML;

    // Convierte la fecha registrada en un objeto de fecha
    var fechaRegistrada = new Date(fechaRegistradaStr);

    // Obtiene la fecha actual
    var fechaActual = new Date();

    // Define el número de días que considerarías "cercanos"
    var diasCercanos = 3; // Cambia este valor según tus necesidades

    // Calcula la diferencia en días entre la fecha registrada y la fecha actual
    var diferenciaDias = Math.floor((fechaRegistrada - fechaActual) / (1000 * 60 * 60 * 24));

    // Verifica si la fecha registrada es cercana a la fecha actual
    if (diferenciaDias <= diasCercanos) {
        // Aplica un estilo CSS para resaltar en rojo el texto
        fechaRegistradaElement.style.color = 'red';
    }
</script>