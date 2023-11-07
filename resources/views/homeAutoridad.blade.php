@extends('layouts.autoridad')
@section('title', __('Dashboard'))
@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header"><h5><span class="text-center fa fa-home"></span> @yield('title')</h5></div>
			<div class="card-body">
				<h5>Hola <strong>{{ Auth::user()->name }},</strong> {{ __('eres el usuario supervisor de la facultad ____ ') }}dentro de la {{ config('app.name', 'Laravel') }}</h5>
				</br> 
				<hr>
								
			<div class="row w-100">
					<div class="col-md-3">
						<div class="card border-info mx-sm-1 p-3">
							<div class="card border-info text-info p-3" ><span class="text-center fa fa-plane-departure" aria-hidden="true"></span></div>
							<div class="text-info text-center mt-3"><h4>Estudiantes</h4></div>
							<div class="text-info text-center mt-2"><h1>234</h1></div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card border-success mx-sm-1 p-3">
							<div class="card border-success text-success p-3 my-card"><span class="text-center fa fa-luggage-cart" aria-hidden="true"></span></div>
							<div class="text-success text-center mt-3"><h4>Ofertas</h4></div>
							<div class="text-success text-center mt-2"><h1>9,332</h1></div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card border-danger mx-sm-1 p-3">
							<div class="card border-danger text-danger p-3 my-card" ><span class="text-center fa fa-person-booth" aria-hidden="true"></span></div>
							<div class="text-danger text-center mt-3"><h4>Contrataciones</h4></div>
							<div class="text-danger text-center mt-2"><h1>12,762</h1></div>
						</div>
					</div>
				 </div>				
			</div>
		</div>
	</div>
</div>
</div>
@endsection