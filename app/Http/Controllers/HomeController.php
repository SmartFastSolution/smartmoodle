<?php

namespace App\Http\Controllers;

use App\Contenido;
use App\Curso;
use App\Distribucionmacu;
use App\Materia;
use App\Modelos\Role;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('sistema');
    }

    

    




    public function buscarMateria(Request $request){

        $materias= Materia::where('instituto_id', $request->id)->get();
        $materia = [];
           foreach($materias as $key => $value){
            $materia[$key] =[
                'id'=> $value->id,
                'nombre' => $value->nombre
            ];
        }
        return $materia;
        
    }

    
    public function buscarAlumno(Request $request){
        $usrol = Role::where('descripcion','estudiante')->first();
        $users = $usrol->users()->where('instituto_id', $request->id)->get();
        //$users= User::where('instituto_id', $request->id, 'and', '')->get();
        return $users;
        
    }
 
    public function buscarAsignacion(Request $request){

        $dist= Distribucionmacu::where('instituto_id', $request->id)->get();
        $cursos = [];
        foreach($dist as $key => $value){
            $cursos[$key] =[
                'id'=> $value->curso_id,
                'nombre' => $value->curso->nombre,
                // 'nivel' => $value->nivel->nombre
                
            ];
        }
       // $dis = $dist->id;
        return $cursos;   
    }
    public function buscarContenido(Request $request)
    {
        $cont = Contenido::where('materia_id', $request->id)->get();
        $contenidos = [];
        foreach($cont as $key => $value){
            $contenidos[$key] =[
                'id'=> $value->id,
                'nombre' => $value->nombre,
            ];
        }
        return $contenidos;   

        
    }

    public function buscarDocente(Request $request){
        $usrol = Role::where('descripcion','docente')->first();
        $users = $usrol->users()->where('instituto_id', $request->id)->get();
        //$users= User::where('instituto_id', $request->id, 'and', '')->get();
        return $users;
        
    }

    
}
