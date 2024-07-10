<?php

use App\Rules\MultiDomainValidation;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\OfertasEstudiantes;
use App\Http\Livewire\PostulacionEstudiantes;
use App\Http\Livewire\EntrevistasEstudiantes;
use App\Http\Livewire\PerfilEstudiante;
use App\Http\Livewire\Entrevista;
use App\Http\Livewire\Ofertas;
use App\Http\Livewire\VerOfertas;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\Estudiante;
use App\Http\Controllers\SliderController;

use App\Http\Livewire\Cartarecomendacions;
use App\Http\Livewire\Estadisticassupervisor;
use Illuminate\Support\Facades\Validator;


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

Route::get('/', [SliderController::class, 'index']);

Route::get('/login-google', function () {
	return Socialite::driver('google')->redirect();
})->name('login-google');

Route::get('/google-callback', function () {
	$user = Socialite::driver('google')->user();
	$email = $user->getEmail();

	$domains = array('umes.edu.gt', 'mesoamericana.edu.gt');

	$pattern = "/^[a-z0-9._%+-]+@[a-z0-9.-]*(" . implode('|', $domains) . ")$/i";

	if (!preg_match($pattern, $email)) {
		Session::flash('message', 'La cuenta de correo no pertenece a la universidad');
		return redirect('/');
	}

	 // Validar si el correo ya está registrado excluyendo usuarios con rol id igual a 1
	$existingMail = User::where('email', $email)
	->where('estado', 1)
	->where('rol_id', '<>', 1) // Excluir usuarios con rol id igual a 1
	->first();

	if ($existingMail) {
	// Mostrar notificación o redirigir indicando que el correo ya está registrado
	Session::flash('message', 'Este correo ya está registrado');
	return redirect('/');
	}

	$userExist = User::where('external_id', $user->id)->where('email', $user->email)->where('estado', 1)->first();

	$routeLogin = '/ofertasestudiantes';

	if ($userExist) {
		$estudiante = Estudiante::where('user_id', $userExist->id)->first();
		Auth::login($userExist);
		$routeLogin = $estudiante ? '/ofertasestudiantes' : '/registroestudiante';
	} else {
		$userNew = User::create([
			'name' => $user->name,
			'email' => $user->email,
			'avatar' => $user->avatar,
			'external_id' => $user->id,
			'external_auth' => 'google',
			'email_verified' => 1,
			'estado' => 1,
			'password' => '',
			'rol_id' => 1,
		]);

		Auth::login($userNew);
		$routeLogin = '/registroestudiante';
	}

	return redirect($routeLogin);
});

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('empresa')->name('home');
Route::get('/homeini', [App\Http\Controllers\HomeiniController::class, 'index'])->middleware('empresa')->name('homeini');
Route::view('registroestudiante', 'livewire.registro.index')->middleware('estudiante');

Route::view('registroempresa', 'livewire.registroempresas.index')->middleware('empresa');
Route::view('estadisticasempresa', 'livewire.estadisticasempresa.index')->middleware('empresa');
Route::view('estadisticasrrhh', 'livewire.estadisticasrrhh.index')->middleware('rrhh');
Route::view('estadisticassupervisor', 'livewire.estadisticassupervisor.index')->middleware('autoridad');
Route::view('registro-empresa', 'livewire.registroempresas.index')->middleware('empresa');

Route::get('/homeAdmin', [App\Http\Controllers\HomeAdminController::class, 'index'])->middleware('rrhh')->name('homeAdmin');
Route::get('/homeAutoridad', [App\Http\Controllers\HomeAutoridadController::class, 'index'])->middleware('autoridad')->name('homeAutoridad');
Route::get('/tutoriales', [App\Http\Controllers\Videotutoriales::class, 'index'])->name('tutoriales');
//Route Hooks - Do not delete//
	Route::view('idiomas', 'livewire.idiomas.index')->middleware('rrhh');
	Route::view('habilidadtecnicas', 'livewire.habilidadtecnicas.index')->middleware('empresa');
	Route::view('habilidad-tecnicas', 'livewire.habilidadtecnicas.indexRRHH')->middleware('rrhh');
	Route::view('Interpersonals', 'livewire.interpersonals.index')->middleware('empresa');
	Route::view('Interpersonal', 'livewire.interpersonals.indexRRhh')->middleware('rrhh');
	Route::view('competencias', 'livewire.competencias.index')->middleware('auth','empresa');
	Route::view('competenciasC', 'livewire.competencias.indexRrhh')->middleware('rrhh');

	Route::get('/evento',[App\Http\Controllers\EventoController::class,'index']);
	Route::get('/evento/mostrar',[App\Http\Controllers\EventoController::class,'show']);
	Route::post('/evento/editar/{id}',[App\Http\Controllers\EventoController::class,'edit']);

Route::get('/estadisticasuper-pdf', [Estadisticassupervisor::class, 'downloadPDF'])->middleware('autoridad');
Route::get('/carta-pdf', [Cartarecomendacions::class, 'downloadPDF'])->middleware('estudiante');
Route::view('autoridadacademicas', 'livewire.autoridadacademicas.index')->middleware('rrhh');
Route::view('departamentos', 'livewire.departamentos.index')->middleware('rrhh');
Route::view('municipios', 'livewire.municipios.index')->middleware('rrhh');
Route::view('empresas', 'livewire.empresas.index')->middleware('empresa');
Route::view('empresasIni', 'livewire.empresasIni.index')->middleware('empresa');
Route::view('empresasrrhh', 'livewire.empresasrrhh.index')->middleware('rrhh');
Route::view('preRegistro', 'livewire.preRegistro.index')->middleware('rrhh');
Route::view('empresas1', 'livewire.empresas1.index')->middleware('empresa');
Route::view('cartarecomendacions', 'livewire.cartarecomendacions.index')->middleware('autoridad');

Route::view('cvs', 'livewire.cvs.index')->middleware('estudiante');

Route::view('estudiantes', 'livewire.estudiantes.index')->middleware('rrhh');
Route::view('estudiantes1', 'livewire.estudiantes1.index')->middleware('autoridad');
Route::view('carreras', 'livewire.carreras.index')->middleware('rrhh');
Route::view('facultads', 'livewire.facultads.index')->middleware('rrhh');
Route::get('/formulario/create', [Ofertas::class, 'FormularioCreate'])->name('formulario.create')->middleware('auth'); //ver  */
//Route::get('/ofertasestudiantes', OfertasEstudiantes::class)->middleware('auth');
Route::view('ofertasestudiantes', 'livewire.ofertasestudiantes.index')->middleware('estudiante')->name('ofertasestudiantes');
Route::view('NoData', 'livewire.ofertasestudiantes.index')->middleware('auth')->name('defaultView');
Route::view('VerOfertas', 'livewire.verofertas.index')->middleware('estudiante')->name('VerOfertas'); 
Route::view('entrevistas/{ofertaId}', 'livewire.entrevistas.index')->middleware('empresa')->name('entrevistas.index');
Route::view('postulacions/{ofertaId}', 'livewire.postulacions.index')->middleware('empresa')->name('postulacions.index');
Route::view('ofertas', 'livewire.ofertas.index')->name('ofertas')->middleware('empresa');
Route::view('Mispostulaciones', 'livewire.postulacionestudiantes.index')->middleware('estudiante');
Route::view('Misentrevistas', 'livewire.entrevistaestudiantes.index')->middleware('estudiante');
Route::view('MiPerfil', 'livewire.perfilEstudiante.index')->middleware('estudiante');
Auth::routes();
