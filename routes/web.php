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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('registroestudiante', 'livewire.registro.index')->middleware('auth');

Route::view('registroempresa', 'livewire.registroempresas.index')->middleware('auth');
Route::view('estadisticasempresa', 'livewire.estadisticasempresa.index')->middleware('auth');
Route::view('estadisticasrrhh', 'livewire.estadisticasrrhh.index')->middleware('auth');
Route::view('estadisticassupervisor', 'livewire.estadisticassupervisor.index')->middleware('auth');
Route::view('registro-empresa', 'livewire.registroempresas.index')->middleware('auth');

Route::get('/homeAdmin', [App\Http\Controllers\HomeAdminController::class, 'index'])->name('homeAdmin');
Route::get('/homeAutoridad', [App\Http\Controllers\HomeAutoridadController::class, 'index'])->name('homeAutoridad');
Route::get('/tutoriales', [App\Http\Controllers\Videotutoriales::class, 'index'])->name('tutoriales');
//Route Hooks - Do not delete//
	Route::view('idiomas', 'livewire.idiomas.index')->middleware('auth');
	Route::view('habilidadtecnicas', 'livewire.habilidadtecnicas.index')->middleware('auth');
	Route::view('habilidad-tecnicas', 'livewire.habilidadtecnicas.indexRRHH')->middleware('auth');
	Route::view('Interpersonals', 'livewire.interpersonals.index')->middleware('auth');
	Route::view('Interpersonal', 'livewire.interpersonals.indexRRhh')->middleware('auth');
	Route::view('competencias', 'livewire.competencias.index')->middleware('auth');
	Route::view('competenciasC', 'livewire.competencias.indexRrhh')->middleware('auth');

	Route::get('/evento',[App\Http\Controllers\EventoController::class,'index']);
	Route::get('/evento/mostrar',[App\Http\Controllers\EventoController::class,'show']);
	Route::post('/evento/editar/{id}',[App\Http\Controllers\EventoController::class,'edit']);

Route::get('/estadisticasuper-pdf', [Estadisticassupervisor::class, 'downloadPDF']);
Route::get('/carta-pdf', [Cartarecomendacions::class, 'downloadPDF']);
Route::view('autoridadacademicas', 'livewire.autoridadacademicas.index')->middleware('auth');
Route::view('departamentos', 'livewire.departamentos.index')->middleware('auth');
Route::view('municipios', 'livewire.municipios.index')->middleware('auth');
Route::view('empresas', 'livewire.empresas.index')->middleware('auth');
Route::view('empresasIni', 'livewire.empresasIni.index')->middleware('auth');
Route::view('empresasrrhh', 'livewire.empresasrrhh.index')->middleware('auth');
Route::view('empresas1', 'livewire.empresas1.index')->middleware('auth');
Route::view('cartarecomendacions', 'livewire.cartarecomendacions.index')->middleware('auth');

Route::view('cvs', 'livewire.cvs.index')->middleware('auth');

Route::view('estudiantes', 'livewire.estudiantes.index')->middleware('auth');
Route::view('estudiantes1', 'livewire.estudiantes1.index')->middleware('auth');
Route::view('carreras', 'livewire.carreras.index')->middleware('auth');
Route::view('facultads', 'livewire.facultads.index')->middleware('auth');
Route::get('/formulario/create', [Ofertas::class, 'FormularioCreate'])->name('formulario.create')->middleware('auth');
//Route::get('/ofertasestudiantes', OfertasEstudiantes::class)->middleware('auth');
Route::view('ofertasestudiantes', 'livewire.ofertasestudiantes.index')->middleware('auth')->name('ofertasestudiantes');
Route::view('NoData', 'livewire.ofertasestudiantes.index')->middleware('auth')->name('defaultView');
Route::view('VerOfertas', 'livewire.verofertas.index')->middleware('auth')->name('VerOfertas');
Route::view('entrevistas/{ofertaId}', 'livewire.entrevistas.index')->middleware('auth')->name('entrevistas.index');
Route::view('postulacions/{ofertaId}', 'livewire.postulacions.index')->middleware('auth')->name('postulacions.index');
Route::view('ofertas', 'livewire.ofertas.index')->name('ofertas')->middleware('auth');
Route::view('Mispostulaciones', 'livewire.postulacionestudiantes.index')->middleware('auth');
Route::view('Misentrevistas', 'livewire.entrevistaestudiantes.index')->middleware('auth');
Route::view('MiPerfil', 'livewire.perfilEstudiante.index')->middleware('auth');
Auth::routes();
