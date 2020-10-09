<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;
use App\Materia;
use App\User;
use App\Distribucionmacu;
use App\Modelos\Role;

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

        return $materias;
        
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
                'nombre' => $value->curso->nombre
                
            ];
        }
       // $dis = $dist->id;
        return $cursos;
       
        
    }

    
}
