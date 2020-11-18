<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use APp\User;
use App\Contenido;
use App\Curso;
use App\Distribucionmacu;
use App\Distrima;
use App\Assignment;
use App\Instituto;
use App\Materia;
use App\Nivel;
use App\Taller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class EstudianteController extends Controller
{

      public function __construct()
    {
        
    $this->middleware('auth');
        $this->middleware('estudiante');
    }

    public function index()
    {
     

        $au =  auth()->user()->assignmets;
         if ($au == null) {
         return view('errors.error'); //ruta estudiante //ruta estudiante       
             
        }
        return view('Estudiante.indexes'); //ruta estudiante       
    }

   
    public function show(User $user){
                
        $user= User::find($user->id);
        $distrima= Distrima::get();
        $instituto = Instituto::get();
        $assignment=Assignment::get();
        $materia=Materia::get();  
        $curso=Curso::get();
        $contenidos=Contenido::get();
        
        return view('Estudiante.perfile',compact('instituto','materia','contenidos','curso','user','distrima','assignment')); //ruta estudiante

    }

    
    public function unidades($id){
              // todos los datos de la bd
         $user =  User::findorfail( Auth::id());
         $institutomate = Materia::find($id)->instituto()->get();
         $contenido=Contenido::get();

         $tallers=Taller::get();
         $completados = $user->tallers;
         $con =Contenido::where('materia_id', $id)->first();
         $ids = [];
          foreach($completados as $act){
                $ids[]=$act->id;
            }

         $tallers = Taller::whereNotIn('id', $ids)->get();
 
         $materia =Materia::where('id', $id)->firstOrfail();
              
         return view ('Estudiante.contenido',['materia'=>$materia,'contenidos'=>$contenido,'institutomate'=>$institutomate,'tallers'=>$tallers]);

       // return $tallers;

    }


    public function password(){

        return view('Estudiante.password');
    }
  

    public function updatep(Request $request){

      //dd($request);
/////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////METODO UNO/////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////
      //metodo funcional 1 pero no verifica el password anterior

      $request->validate([
        // 'password' => ['required'],
        'newpassword' => ['required', 'string', 'min:8', 'confirmed'],
        'newpassword_confirmation'=>['required']
      ]); 
      
        $request->user()->fill([
            'password' => Hash::make($request->newpassword)
        ])->save();

        return redirect('sistema/homees')->with('Password actualizado');
          

     }

}