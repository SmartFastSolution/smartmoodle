<?php

namespace App\Http\Controllers;
use App\Distrima;
use App\Curso;
use App\Contenido;
use App\Distribucionmacu;
use App\Nivel;
use APp\User;
use App\Materia;
use App\Taller;
use App\Instituto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{

    public function __construct()
{
    $this->middleware('auth');
}

    public function index(){
     

        return view('Estudiante.indexes'); //ruta estudiante       
    }

   
    public function show(User $user){
        
        
        $user= User::find($user->id);
        $distrima= Distrima::get();
        $instituto = Instituto::get();
        $materia=Materia::get();  
        $curso=Curso::get();
        $contenidos=Contenido::get();
        
        return view('Estudiante.perfile',compact('instituto','materia','contenidos','curso','user','distrima')); //ruta estudiante

    }

    
    public function unidades($id){
              // todos los datos de la bd
         $institutomate = Materia::find($id)->instituto()->get();
         $contenido=Contenido::get();
         $tallers=Taller::get();
         $materia =Materia::where('id', $id)->firstOrfail();
       
        
      
       
         return view ('Estudiante.contenido',['materia'=>$materia,'contenidos'=>$contenido,'institutomate'=>$institutomate,'tallers'=>$tallers]);
        
       

    }

  

}