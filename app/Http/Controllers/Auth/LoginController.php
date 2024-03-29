<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Empresa;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->rol_id == 2) {

            $empresa = Empresa::where('user_id', $user->id)->first();
            $empresa_creada = Empresa::where('user_id', $user->id)->where('estadoSolicitud', 'Aceptado')->first();
            $empresa_dengada = Empresa::where('user_id', $user->id)->where('estadoEmpresa', '1')->first();

            if (!$empresa) {
              
                return redirect('registroempresa');
            }
            if (!$empresa_dengada) {
              
                return redirect('empresas1');
            }
            if (!$empresa_creada) {
              
                return redirect('empresasIni');
            }
          
            


            // Redirección predeterminada para otros tipos de usuarios
            return redirect(RouteServiceProvider::HOMEini);
        } elseif ($user->rol_id == 3) {
            return redirect(RouteServiceProvider::HOMEADMIN);
        } elseif ($user->rol_id == 4) {
            return redirect(RouteServiceProvider::HOMEAUTORIDAD);
        }
    }
}
