<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use  Illuminate\Support\Facades\Auth;


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


    public function authenticated($request , $user){


        if($user->roles[0]->descripcion=='administrador'){
           return redirect()->route('administrador') ;
       }
       elseif($user->roles[0]->descripcion=='docente'){
           return redirect()->route('docente') ;
       }

       elseif($user->roles[0]->descripcion=='estudiante'){
           return redirect()->route('estudiante') ;
       }

       return redirect()->route('administrador');
   }
   

}