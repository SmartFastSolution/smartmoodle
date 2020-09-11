<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users= User::orderBy('id','Asc')->paginate(5);
    
       // return view('Persona.inicio',['users'=>$users]);
        return view('administracion.menuadmin',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return \view('Persona.createuser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacion de datos 

        $request->validate([

            'cedula' => ['required', 'string', 'max:10', ],
            'fechanacimiento' => ['required', 'string', 'max:10'],
            'sname' => ['required', 'string', 'max:20'],
            'apellido' => ['required', 'string', 'max:20'],
            'sapellido' => ['required', 'string', 'max:20'],
            'domicilio' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:13'],
            'celular' => ['required', 'string', 'max:13'],
            'titulo' => ['required', 'string', 'max:255'],
            'estado' => ['required' ,'in:on,off'],
            'name' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation'=>'required'

        ]);


        $user = new User;
        $user->cedula = $request->cedula;
        $user->fechanacimiento = $request->fechanacimiento;
        $user->name = $request->name;
        $user->sname = $request->sname;
        $user->apellido = $request->apellido;
        $user->sapellido = $request->sapellido;
        $user->domicilio = $request->domicilio;
        $user->telefono = $request->telefono;
        $user->celular = $request->celular;
        $user->titulo = $request->titulo;
        $user->email = $request->email;
        $user->estado = $request->estado;

        if($request->password !=null){
           $user->password= Hash::make($request->email);
           
        }

        $user->save();
        return redirect('sistema/iniciouser');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view ('Persona.showu',['user'=>$user]);

       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
       return view('Persona.edituser',['user'=>$user]);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([

            'cedula' => [ 'string', 'max:10', ],
            'fechanacimiento' => [ 'string', 'max:10'],
            'sname' => [ 'string', 'max:20'],
            'apellido' => [ 'string', 'max:20'],
            'sapellido' => [ 'string', 'max:20'],
            'domicilio' => [ 'string', 'max:255'],
            'telefono' => [ 'string', 'max:13'],
            'celular' => [ 'string', 'max:13'],
            'titulo' => [ 'string', 'max:255'],
            'name' => [ 'string', 'max:20'],
            'email' => [ 'string', 'email', 'max:255',],
            'password' => [ 'string', 'min:8', 'confirmed'],
            'estado' => ['required' ,'in:on,off'],

        ]);


        $user->cedula = $request->cedula;
        $user->fechanacimiento = $request->fechanacimiento;
        $user->name = $request->name;
        $user->sname = $request->sname;
        $user->apellido = $request->apellido;
        $user->sapellido = $request->sapellido;
        $user->domicilio = $request->domicilio;
        $user->telefono = $request->telefono;
        $user->celular = $request->celular;
        $user->titulo = $request->titulo;
        $user->email = $request->email;
        $user->estado = $request->estado;


        if($request->password !=null){
           $user->password= Hash::make($request->email);
           
        }
        $user->save();
       
      // redireccionamos a sistema y el enlace que tenemos como url ya 
      //que sistema es nuestra base para la seguridad
       return redirect('sistema/iniciouser');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::find($id);
        $user->delete();

        return redirect('sistema/iniciouser')->with('success','Haz eliminado un rol con exito');
    }
}