<?php

namespace App\Http\Controllers;

use App\Contenido;
use App\Curso;
use App\Distribucionmacu;
use App\Distribuciondo;
use App\Distrima;
use App\Materia;
use App\Nivel;
use App\Modelos\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('sistema');
    }


    public function materia(Request $request){

        $consulta = Distribucionmacu::join("distribucionmacu_materia", "distribucionmacu_materia.distribucionmacu_id", "=", "distribucionmacus.id")
        ->join("materias", "materias.id", "=", "distribucionmacu_materia.materia_id")
        ->where('materias.instituto_id', $request->id)
        ->select("materias.id")
        ->get();

        $ids = [];
        foreach ($consulta as $id) {
        $ids[] = $id->id;
        }

        $materias= Materia::where('instituto_id', $request->id)->whereNotIn('id', $ids)->get();
        $materia = [];
   
           foreach($materias as $key => $value){
            $materia[$key] =[
                'id'=> $value->id,
                'nombre' => $value->nombre
            ];
        }
        return $materia;
        
    }
        public function materiaTalleres(Request $request){

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

         public function asignacion(Request $request){

        $asignaciones= Distribucionmacu::where('instituto_id', $request->id)->get();
        $asignacion = [];
   
           foreach($asignaciones as $key => $value){
            $asignacion[$key] =[
                'id'=> $value->id,
                'curso' => $value->curso->nombre,
            ];
        }
        return $asignacion;
        
    }

    
    public function buscarMateria(Request $request){

        $materias= Materia::where('instituto_id', $request->id)->get();
        $materia = [];
        $distribucion = Distribucionmacu::where('instituto_id', $request->id)->get();
        foreach($distribucion as $key => $value){
            $materia[$key] =[
                'id'=> $value->id,
                'nombre' => $value->curso->nombre,
                'materias' => $value->materias,
            ];
        }
     
        return $materia;
        
    }
    function obtenerParalelos(Request $request)
    {
        $consulta = Distribuciondo::join("distribuciondo_nivel", "distribuciondo_nivel.distribuciondo_id", "=", "distribuciondos.id")
        ->join("nivels", "nivels.id", "=", "distribuciondo_nivel.nivel_id")
        ->where('distribuciondos.materia_id', $request->id)
        ->select("nivels.id")
        ->get();

        // $distribucion = Distribuciondo::
        // ->get();
        $paralelos = [];
        foreach ($consulta as $ids) {
        $paralelos[] = $ids->id;
        }

         $disponibles = Nivel::whereNotIn('id', $paralelos)
                // ->select('tallers.*','taller_user.*','cursos.nombre as cur_nombre','nivels.nombre as nivel_nombre', 'materias.nombre as mate_nombre', 'contenidos.nombre as conte_name','users.name as alumno')
                ->get();
        return $disponibles;

            
    }
    function materiaDocente(Request $request)
    {
        $materias= Materia::where('instituto_id', $request->id)->get();
        $materia = [];

        $distribuciondos = Distribuciondo::where('user_id', $request->user_id)->count();

        $distribucion = Distribucionmacu::where('instituto_id', $request->id)->get();

        if ($distribuciondos == 0) {
        foreach($distribucion as $key => $value){
            $materia[$key] =[
                'id'=> $value->id,
                'nombre' => $value->curso->nombre,
                'materias' => $value->materias,
            ];
            }
        }else{
        $distribuciondos = Distribuciondo::where('user_id', $request->user_id)->get();
        $mat = [];
        foreach ($distribuciondos as $key => $mater) {
            $mat[] = $mater->materia_id;
        }

            foreach($distribucion as $key => $value){
            $materia[$key] =[
                'id'=> $value->id,
                'nombre' => $value->curso->nombre,
                'materias' => $value->materias->whereNotIn('id', $mat),
            ];
            }

        }
        return $materia;   
    }

    
    public function buscarAlumno(Request $request){
        $usrol = Role::where('descripcion','estudiante')->first();
        $distrima = Distrima::select('user_id')->get();

        $users = $usrol->users()->whereNotIn('users.id',$distrima)->where('instituto_id', $request->id)->get();
        //$users= User::where('instituto_id', $request->id, 'and', '')->get();
        return $users;
        
    }
  
    public function buscarAsignacion(Request $request){

        $dist= Distribucionmacu::where('instituto_id', $request->id)->get();
        $cursos = [];
        foreach($dist as $key => $value){
            $cursos[$key] =[
                'id'=> $value->id,
                'nombre' => $value->curso->nombre,
               
            ];
        }
     
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
    public function ramdom()
    {
        $clave = Str::random(8);
        return $clave;
    }


    public function EstadoUser(Request $request){
         
        $user = User::find($request->id);
         $estado = $user->estado;
         
           if($estado === 'off'){
               $user->estado = 'on';
               $user->save();
               return response(array(
                'success' => true,
                'message' => 'Usuario activado correctamente',
            ),200,[]); 
            }elseif ($estado == 'on'){
                $user->estado = 'off';
                $user->save();
                return response(array(
                 'success' => true,
                 'message' => 'Usuario desactivado correctamente',
             ),200,[]); 
            }         
    }



    //seccion del contenido 

    public function Verdocumento($id){

        $contenido =Contenido::where('id', $id)->firstOrfail();
         return \view('Materias.archivomateria',['contenido'=>$contenido]);

    }

    public function Verdocumento2($id){

        $contenido =Contenido::where('id', $id)->firstOrfail();
         return \view('Materias.archivomateria2',['contenido'=>$contenido]);

    }



   
}