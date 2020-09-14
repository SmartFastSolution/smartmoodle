<?php

namespace App\Http\Controllers;

use Auth;
use App\Modelos\Role;
use App\Instituto;
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
    
         return view('Persona.inicio',['users'=>$users]);
        //return view('administracion.menuadmin',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          // $institutos=Instituto::get();
           $roles=Role::get();
           $institutos=Instituto::get();

       return \view('Persona.createuser',compact('roles','institutos'));
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
        $validatedData = $request->validate([
            'cedula' => ['required', 'string', 'max:10', ],
            'fechanacimiento' => ['required', 'string', 'max:10'],
            'sname' => ['required', 'string', 'max:20'],
            'apellido' => ['required', 'string', 'max:20'],
            'sapellido' => ['required', 'string', 'max:20'],
            'domicilio' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:13'],
            'celular' => ['required', 'string', 'max:13'],
            'titulo' => ['required', 'string', 'max:255',],
            'estado' => ['required' ,'in:on,off'],
            'name' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation'=>'required',
//agregados estudiantes y docente sen la misma tabla de persona 
            'fcontrato' => ['required', 'string', 'max:13'],
            'cirepre' => ['required', 'string', 'max:10'],
            'namerepre' => ['required', 'string', 'max:250'],
            'namema' => ['required', 'string', 'max:250'],
            'namepa' => ['required', 'string', 'max:250'],
            'telefonorep' => ['required', 'string', 'max:13'],
            'fregistro' => ['required', 'string', 'max:10'],


        ]);

        $user = new User;
        $user->instituto_id = $request->instituto;
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
        $user->password = Hash::make($request->password);
//agregados estudiantes y docente sen la misma tabla de persona 
        $user->fcontrato = $request->fcontrato;
        $user->cirepre = $request->cirepre;
        $user->namerepre = $request->namerepre;
        $user->namema = $request->namema;
        $user->namepa = $request->namepa;
        $user->telefonorep = $request->telefonorep;
        $user->fregistro = $request->fregistro;
         
        $user->save();
       
         

           // 
        
        $user->asignarRol($request->get('role'));

        return redirect('sistema/users');
        //return redirect('sistema/admin');

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

        $roles = Role::all();
        $institutos = Instituto::get(); // todos los datos de la bd
        $institutouser = User::find($user->id)->instituto()->get(); //llama al instituto que este relacionado a un usuario 
       return view('Persona.edituser',['user'=>$user, 'roles'=>$roles,'institutos'=>$institutos,'institutouser'=>$institutouser]);
    
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

            'cedula' => [ 'string', 'max:10,', ],
            'fechanacimiento' => [ 'string', 'max:10'],
            'sname' => [ 'string', 'max:20'],
            'apellido' => [ 'string', 'max:20'],
            'sapellido' => [ 'string', 'max:20'],
            'domicilio' => [ 'string', 'max:255'],
            'telefono' => [ 'string', 'max:13'],
            'celular' => [ 'string', 'max:13'],
            'titulo' => [ 'string', 'max:255'],
            'name' => [ 'string', 'max:20'],
            'email' => [ 'string', 'email', 'max:255,'.$user->id,],
            'password' => [ 'string', 'min:8', 'confirmed'],
            'estado' => ['required' ,'in:on,off'],
//agregados estudiantes y docente sen la misma tabla de persona 
            'fcontrato' => ['', 'string', 'max:13'],
            'cirepre' => ['', 'string', 'max:10'],
            'namerepre' => ['', 'string', 'max:250'],
            'namema' => ['', 'string', 'max:250'],
            'namepa' => ['', 'string', 'max:250'],
            'telefonorep' => ['', 'string', 'max:13'],
            'fregistro' => ['', 'string', 'max:10'],


        ]);

        $user->instituto_id = $request->instituto;
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
//agregados estudiantes y docente sen la misma tabla de persona 
        $user->fcontrato = $request->fcontrato;
        $user->cirepre = $request->cirepre;
        $user->namerepre = $request->namerepre;
        $user->namema = $request->namema;
        $user->namepa = $request->namepa;
        $user->telefonorep = $request->telefonorep;
        $user->fregistro = $request->fregistro;
        
        $password = $request->get('password');
        if($password !=null){
          $user->password = Hash::make($request->password);
           
        } else{
           unset($user->password); 
        }


        if ($request->get('role')) {
            $user->roles()->sync($request->get('role'));
        }
        

        $user->save();
       
      // redireccionamos a sistema y el enlace que tenemos como url ya 
      //que sistema es nuestra base para la seguridad
       return redirect('sistema/users');
       //return redirect('sistema/admin');
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

        return redirect('sistema/users')->with('success','Haz eliminado un rol con exito');
       // return redirect('sistema/admin')->with('success','Haz eliminado un rol con exito');
    }
}