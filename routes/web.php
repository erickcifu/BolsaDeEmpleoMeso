<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\OfertasEstudiantes;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Hooks - Do not delete//
	Route::view('estudiantes', 'livewire.estudiantes.index')->middleware('auth');
	Route::view('carreras', 'livewire.carreras.index')->middleware('auth');
	Route::view('facultads', 'livewire.facultads.index')->middleware('auth');
	//Route::get('/ofertasestudiantes', OfertasEstudiantes::class)->middleware('auth');
	Route::view('ofertasestudiantes', 'livewire.ofertasestudiantes.index')->middleware('auth');
	Route::view('entrevistas', 'livewire.entrevistas.index')->middleware('auth');
	Route::view('postulacions', 'livewire.postulacions.index')->middleware('auth');
	Route::view('ofertas', 'livewire.ofertas.index')->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
