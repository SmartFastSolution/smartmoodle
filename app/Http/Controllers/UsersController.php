<?php

namespace App\Http\Controllers;

use Auth;
use App\Modelos\Role;
use App\Instituto;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
        Gate::authorize('haveaccess', 'user.index');
      //  $users= User::where('Titulo','Administrador')->orderBy('id','Asc')->paginate(5);

       $users= User::orderBy('id','Asc')->paginate(5);
    
         return view('Persona.inicio',['users'=>$users]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('haveaccess', 'user.create');
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
        Gate::authorize('haveaccess', 'user.store');
        //validacion de datos 
         $request->validate([
            'cedula'          =>  'required|string|max:10',
            'name'            =>  'required|string|max:20',
            'apellido'        =>  'required|string|max:20',
            'domicilio'       =>  'required|string|max:255',
            'telefono'        =>  'required|string|max:13',
            'celular'         =>  'required|string|max:13',
            'titulo'          =>  '|string|max:255',
            'email'           => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'        =>  'required|string|min:8',
          

            

            
        ]);

        $user = new User;
        $user->instituto_id = $request->instituto;  //relacion con el instituto y usuario    
        $user->cedula = $request->cedula;
        $user->name = $request->name;
        $user->apellido = $request->apellido;  
        $user->domicilio = $request->domicilio;
        $user->telefono = $request->telefono;
        $user->celular = $request->celular;
        $user->titulo = $request->titulo;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
//agregados estudiantes y docente sen la misma tabla de persona 
       
         
        $user->save();
               
           
        
        if ($request->get('role')) {
           

            $user->roles()->sync($request->get('role'));
        }

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
        Gate::authorize('haveaccess', 'user.show');
       
        $roles= Role::orderBy('name')->get();
        // $roles = Role::all();
        
        $institutos = Instituto::get(); // todos los datos de la bd
        $institutouser = User::find($user->id)->instituto()->get(); //llama al instituto que este relacionado a un usuario 
      
        return view('Persona.showu',['user'=>$user, 'roles'=>$roles,'institutos'=>$institutos,'institutouser'=>$institutouser]);
    
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        Gate::authorize('haveaccess', 'user.edit');
        $roles= Role::orderBy('name')->get();
        // $roles = Role::all();
        
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
        Gate::authorize('haveaccess', 'user.update');
        $request->validate([

            'cedula'          =>  'required|string|max:10',        
            'apellido'        =>  'required|string|max:20',         
            'domicilio'       =>  'required|string|max:255',
            'telefono'        =>  'required|string|max:13',
            'celular'         =>  'required|string|max:13',
            'titulo'          =>  'required|string|max:255',
            'name'            =>  'required|string|max:20',
            'email'           => [ 'string', 'email', 'max:255,'.$user->id,],
            'password'        =>  '|string|min:8|',
         
//agregados estudiantes y docente sen la misma tabla de persona 
          


        ]);

        $user->update($request->all());

        
     //validacion de passowrd
        $password = $request->get('password');
        if($password !=null){
          $user->password = Hash::make($request->password);
           
        } else{
           unset($user->password); 
        }
      
        //omitir hecho de actualizar materia y que se mantenga la misma 
         if($request->get('instituto')){
          
            $user->instituto_id = $request->instituto;
          }

          $user->roles()->sync($request->get('roles'));
         
       //ejemplo para decision al guarda docente alumno
        // if($request->input('rol') == 'estudiante'){
        //     $user = User::get()->last();
        //     $estudiante = new Estudiante;
        //     $estudiante->user_id = $user->id;

       // }elseif($request->input('rol') == 'docente'){
        // }elseif($request->input('rol') == 'admin'){
        // }


        $user->save();
    
       return redirect('sistema/users');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Gate::authorize('haveaccess', 'user.destroy');
        $user= User::find($user->id);
        $user->delete();

        return redirect('sistema/users')->with('success','Haz eliminado un Usuario con exito');
       // return redirect('sistema/admin')->with('success','Haz eliminado un rol con exito');
    }
}