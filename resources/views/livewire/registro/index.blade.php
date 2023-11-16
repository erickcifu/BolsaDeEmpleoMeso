@extends('layouts.registronavbar')
@section('title', __('Dashboard')){{-- //ver que hace --}}
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('registro')
        </div>  
    </div>   
</div>
@endsection