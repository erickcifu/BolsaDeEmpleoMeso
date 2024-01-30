@extends('layouts.app')
@section('title', __('Dashboard'))
@section('content')
<div class="container-fluid">
<div class="row justify-content-center">			
	@livewire('empresas')
</div>
</div>
@endsection