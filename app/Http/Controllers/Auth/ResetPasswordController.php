<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function sendResetResponse()
    {
        $user = $this->guard()->user();

        if($user->rol_id === 2) {
            // IS Empresas
            return redirect('/home');
        } elseif($user->rol_id === 3){
            // IS RRHH
            return redirect('/homeAdmin');
        } elseif($user->rol_id === 4){
            // IS Autoridad Academica
            return redirect('/homeAutoridad');
        } else {
            // IS Unknow
            return redirect('/');
        }
        
    }
}
