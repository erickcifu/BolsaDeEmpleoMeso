<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\OfertasEstudiantes;
use App\Http\Livewire\Ofertas;
use App\Http\Livewire\Cartarecomendacions;
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

    Route::get('/carta-pdf',[Cartarecomendacions::class,'downloadPDF']);
	Route::view('autoridadacademicas', 'livewire.autoridadacademicas.index')->middleware('auth');
	Route::view('departamentos', 'livewire.departamentos.index')->middleware('auth');
	Route::view('municipios', 'livewire.municipios.index')->middleware('auth');
	Route::view('empresas', 'livewire.empresas.index')->middleware('auth');
	Route::view('empresasrrhh', 'livewire.empresasrrhh.index')->middleware('auth');
	Route::view('cartarecomendacions', 'livewire.cartarecomendacions.index')->middleware('auth');
	
	Route::view('cvs', 'livewire.cvs.index')->middleware('auth');

	Route::view('estudiantes', 'livewire.estudiantes.index')->middleware('auth');
	Route::view('carreras', 'livewire.carreras.index')->middleware('auth');
	Route::view('facultads', 'livewire.facultads.index')->middleware('auth');
	Route::get('/formulario/create', [Ofertas::class, 'redirectToFormularioCreate'])->name('formulario.create')->middleware('auth');
	//Route::get('/ofertasestudiantes', OfertasEstudiantes::class)->middleware('auth');
	Route::view('ofertasestudiantes', 'livewire.ofertasestudiantes.index')->middleware('auth');
	Route::view('entrevistas', 'livewire.entrevistas.index')->middleware('auth');
	Route::view('postulacions', 'livewire.postulacions.index')->middleware('auth');
	Route::view('ofertas', 'livewire.ofertas.index')->name('ofertas')->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
