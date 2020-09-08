<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'cedula' => ['required', 'string', 'max:10', ],
            'fechanacimiento' => ['required', 'string', 'max:10'],
            'sname' => ['required', 'string', 'max:20'],
            'apellido' => ['required', 'string', 'max:20'],
            'sapellido' => ['required', 'string', 'max:20'],
            'domicilio' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:13'],
            'celular' => ['required', 'string', 'max:13'],
            'titulo' => ['required', 'string', 'max:255'],
            
            'name' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
           
            'cedula' => $data['cedula'],
            'fechanacimiento' => $data['fechanacimiento'],
            'name' => $data['name'],
            'sname' => $data['sname'],
            'apellido' => $data['apellido'],
            'sapellido' => $data['sapellido'],
            'domicilio' => $data['domicilio'],
            'telefono' => $data['telefono'],
            'celular' => $data['celular'],
            'titulo' => $data['titulo'],
            'email' => $data['email'],
           
            'password' => Hash::make($data['password']),
            
        ]);
    }
}
