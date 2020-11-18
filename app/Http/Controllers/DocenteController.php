<?php

namespace App\Http\Controllers;

use App\Assignment;
use APp\User;
use App\Contenido;
use App\Curso;
use App\Distribuciondo;
use App\Distribucionmacu;
use App\Distrima;
use App\Http\Controllers\Controller;
use App\Instituto;
use App\Materia;
use App\Nivel;
use App\Taller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DocenteController extends Controller
{

  

       public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('docente');
    }

    public function index(){
        // $materi = auth()->user()->distribuciondos->pivot->materia_id;
        // 
        
            $au = User::find(Auth::id())->distribuciondos;
            // if ($au == null) {
            // return redirect()->route('welcome'); 
               
            // }
       if (isset($au->materias)) {
            $ids =[];
            foreach ($au->materias as $value) {
                foreach ($value->contenidos as $conte) {
                $ids[] = $conte->id;
                    
                }
            }
            // $materias = $au->materias;
        $users = DB::table('tallers')
            ->join('taller_user', 'tallers.id', '=', 'taller_user.taller_id')
            ->join('users', 'users.id', '=', 'taller_user.user_id')
            ->join('contenidos', 'contenidos.id', '=', 'tallers.contenido_id')
            ->join('materias', 'materias.id', '=', 'contenidos.materia_id')
            ->whereIn('tallers.contenido_id', $ids)
            // ->wherein('tallers.contenido_id','==', 1)
            ->where('taller_user.status', 'completado')
            ->select('tallers.*','taller_user.*', 'materias.nombre as mate_nombre', 'contenidos.nombre as conte_name','users.name as alumno')
            ->paginate(10);

              $calificado = DB::table('tallers')
            ->join('taller_user', 'tallers.id', '=', 'taller_user.taller_id')
            ->join('users', 'users.id', '=', 'taller_user.user_id')
            ->join('contenidos', 'contenidos.id', '=', 'tallers.contenido_id')
            ->join('materias', 'materias.id', '=', 'contenidos.materia_id')
            ->whereIn('tallers.contenido_id', $ids)
            // ->wherein('tallers.contenido_id','==', 1)
            ->where('taller_user.status', 'calificado')
            ->select('tallers.*','taller_user.*', 'materias.nombre as mate_nombre', 'contenidos.nombre as conte_name','users.name as alumno')
            ->paginate(10);


            // return $users;
        return view('Docente.indexd', compact('users','au', 'calificado')); //ruta docente
       }else{


        return view('Docente.indexd'); //ruta docente
          } 

    }
    

    public function contenidos($id){
        // todos los datos de la bd
        $user =  User::findorfail( Auth::id());
        $institutomate = Materia::find($id)->instituto()->get();
      
        $materia =Materia::where('id', $id)->firstOrfail();
        $contenidos=Contenido::get();

        $users = DB::table('tallers')
            ->join('taller_user', 'tallers.id', '=', 'taller_user.taller_id')
            ->join('users', 'users.id', '=', 'taller_user.user_id')
            ->join('contenidos', 'contenidos.id', '=', 'tallers.contenido_id')
            ->join('materias', 'materias.id', '=', 'contenidos.materia_id')
            ->where('contenidos.materia_id', $id)
            // ->wherein('tallers.contenido_id','==', 1)
            ->where('taller_user.status', 'completado')
            ->select('tallers.*','taller_user.*', 'materias.nombre as mate_nombre', 'contenidos.nombre as conte_name','users.name as alumno')
            ->paginate(10);

            $calificado = DB::table('tallers')
            ->join('taller_user', 'tallers.id', '=', 'taller_user.taller_id')
            ->join('users', 'users.id', '=', 'taller_user.user_id')
            ->join('contenidos', 'contenidos.id', '=', 'tallers.contenido_id')
            ->join('materias', 'materias.id', '=', 'contenidos.materia_id')
            ->where('contenidos.materia_id', $id)
            // ->wherein('tallers.contenido_id','==', 1)
            ->where('taller_user.status', 'calificado')
            ->select('tallers.*','taller_user.*', 'materias.nombre as mate_nombre', 'contenidos.nombre as conte_name','users.name as alumno')
            ->paginate(10);

      // return $calificado;
   return view ('Docente.contenidodocente',compact('user','institutomate','materia','contenidos', 'users', 'calificado'));

}

    public function cursos($id){
        $materia =Materia::where('id', $id)->firstOrfail(); 
        $curso = Curso::get();
        $assignment= Assignment::get();
        $mate = $materia->assignments;
        
     return view('Docente.cursos',compact('materia','curso', 'mate','assignment'));

    }
    public function talleres($id)
    {
        $contenidos=Contenido::where('materia_id', $id)->get();

        $tallers=Taller::paginate(10);
        $talleres =[];
        foreach ($contenidos as $key => $value) {
            $talleres[$key] = array(
            'nombre' => $value->nombre,
            'talleres' =>$value->tallers
        );
        }
       
     return view('Docente.talleres',compact('tallers', 'contenidos', 'talleres', 'id'));

    }
    public function registro(Request $request)
    {
    $contenidos=Contenido::where('materia_id', $request->materia)->get();
    $talleres =[];
      

    $taller = Taller::find($request->taller_id);
    $estado = $request->estado;
       // return $estado;
    if ($estado == true) {
        $taller->estado = 1; 
        $taller->fecha_entrega = $request->fecha; 
        $taller->save(); 

        foreach ($contenidos as $key => $value) {
            $talleres[$key] = array(
            'nombre' => $value->nombre,
            'talleres' =>$value->tallers
        );

        }

        return response(array(
                'success' => true,
                'message' => 'Taller activado correctamente',
                'talleres' => $talleres

            ),200,[]);  

    }elseif ($estado == false) {

        $taller->estado = 0; 
        $taller->fecha_entrega = $request->fecha; 
        $taller->save();  
          foreach ($contenidos as $key => $value) {
            $talleres[$key] = array(
            'nombre' => $value->nombre,
            'talleres' =>$value->tallers
        );
    }
          return response(array(
                'success' => true,
                'message' => 'Taller desactivado correctamente',
                'talleres' => $talleres
                
            ),200,[]);   
       }

    }


}