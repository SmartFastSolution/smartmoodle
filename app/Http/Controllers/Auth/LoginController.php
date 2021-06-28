<?php

namespace App\Http\Controllers\Auth;


use  Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


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


    //protected $redirectTo = RouteServiceProvider::HOME;

    ////////////////

    //////////////////


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function verificarEstado($user)
    {
        $datos = User::selectRaw('timestampdiff(DAY, activated_at, curdate()) as dato')->where('id', $user->id)->first();
        if ($datos->dato >= 12) {
            $user->estado = 'off';
            $user->save();
        }
    }


    public function authenticated($request, $user)
    {

        //   $this->verificarEstado($user);
        if ($user->estado == 'off') {

            Auth::guard()->logout();

            $request->session()->invalidate();

            return redirect('/login')->withInput()->with('message', 'Tu cuenta esta desactivada por favor comunicate con el administrador');
        }

        $user->access_at = Carbon::now();
        $user->save();

        if ($user->roles[0]->descripcion == 'administrador') {
            return redirect()->route('administrador');
        } elseif ($user->roles[0]->descripcion == 'docente') {
            return redirect()->route('Perfil');
        } elseif ($user->roles[0]->descripcion == 'estudiante') {
            return redirect()->route('perfile');
        }

        return redirect()->route('administrador');
    }

    // protected function credentials(Request $request)
    //  {
    //   $credentials = $request->only($this->username(), 'password');
    //   return array_merge($credentials, ['estado' => 'on']);
    //  }

}
