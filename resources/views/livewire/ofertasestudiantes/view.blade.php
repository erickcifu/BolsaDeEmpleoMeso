@section('title', __('OfertasEstudiantes'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				
					<div style="display: flex; justify-content: space-between; align-items: left;">
					<div class="float-center">
							<h3 style="color: #005c35;">Ofertas laborales activas</h3>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-warning" style="position: fixed; top: 50px; right: 10px; z-index: 1000; width: 500px;"> {{ session('message') }} </div>
						@endif
						<!-- <div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar..." style="background-color: #d3d3d3;">
						</div> -->
						
					</div>
				
				
				<div class="card-body">
					@include('livewire.ofertasestudiantes.modalsEstudiante')
						<div>
							@forelse($ofertas as $row)
							<div class="card">
								<h5 class="card-header" style="background-color: #005c35;"><b style="color: #f0eadc;">{{$row->nombrePuesto}}</b></h5>
								<div class="card-body">
									<h5 class="card-title"><b>Empresa: {{ $row->empresa->nombreEmpresa }}</b></h5>
										<h7 class="card-text">{{$row->resumenPuesto}}</h7>	
										</br>
										<small class="card-text"> Modalidad: {{ $row->modalidadTrabajo }} - {{ $row->jornadaLaboral }} - {{ $row->cantVacantes }} Vacantes</small>
										<footer>
										<a data-bs-toggle="modal" data-bs-target="#createPostDataModal" class="btn float-end" wire:click="setOfertaId({{$row->ofertaId}})" style="background-color: #005c35;"><i class="fa fa-file-lines" style="color: #f0eadc;"></i><h7 style="color: #f0eadc;">Postularme</h7></a>
										<a data-bs-toggle="modal" data-bs-target="#VerOfertaModal" class="btn float-end" wire:click="mostrarOferta({{$row->ofertaId}})" style="background-color: #d3d3d3;"><i class="fa fa-eye"></i><h7> Ver más</h7></a>
										</footer>
									</div>
								</div>
								</br>
								@empty
								<div class="card">
								<h5 class="card-header text-center"  style="background-color: #005c35;"><b style="color: #f0eadc;">Sin datos</b></h5>
								</div>
							@endforelse
						</div>
										
					<div class="float-end">{{ $ofertaStudent->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>