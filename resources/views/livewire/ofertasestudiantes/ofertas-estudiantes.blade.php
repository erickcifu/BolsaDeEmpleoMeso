@section('title', __('OfertasEstudiantes'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				
					<div style="display: flex; justify-content: space-between; align-items: left;">
					<div class="float-left">
							<h4>Ofertas Estudiantes</h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control float-end" name="search" id="search" placeholder="Buscar..." style="background-color: #d3d3d3;">
						</div>
					</div>
				
				
				<div class="card-body">
					@include('livewire.ofertasestudiantes.modalsEstudiante')
						<div>
							@forelse($ofertasestudiantes as $row)
							<div class="card">
								<h5 class="card-header" style="background-color: #005c35;"><b style="color: #f0eadc;">{{$row->puesto}}</b></h5>
								<div class="card-body">
									<h5 class="card-title"><b>Modalidad: </b>{{ $row->tipoContratacion }}</h5>
										<p class="card-text">{{$row->descripcion}}</p>	
										<a data-bs-toggle="modal" data-bs-target="#createPostDataModal" class="btn float-end" wire:click="setOfertaId({{$row->id}})" style="background-color: #005c35;"><i class="fa fa-file-lines" style="color: #f0eadc;"></i><h7 style="color: #f0eadc;"> Postularme</h7></a>
										
										<a data-bs-toggle="modal" data-bs-target="#VerOfertaModal" class="btn float-end" wire:click="mostrarOferta({{$row->id}})" style="background-color: #d3d3d3;"><i class="fa fa-eye"></i><h7> Ver más</h7></a>
									</div>
								</div>
								</br>
							@empty
								<h5><b>Sin datos</b></h5>
							
							@endforelse
</div>
										
					<div class="float-end">{{ $ofertasestudiantes->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>