<?php

namespace App\Http\Controllers;

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
            $au = User::find(Auth::id())->distribuciondos;
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
            // ->join('materias', 'materias.id', '=', 'contenidos.materia_id')
            ->whereIn('tallers.contenido_id', $ids)
            // ->wherein('tallers.contenido_id','==', 1)
            ->where('taller_user.status', 'completado')
            ->select('tallers.*','taller_user.*', 'contenidos.nombre as conte_name','users.name as alumno')
            ->paginate(10);


            // return $users;
        return view('Docente.indexd', compact('users','au')); //ruta docente
    }
    

    public function contenidos($id){
        // todos los datos de la bd
        $user =  User::findorfail( Auth::id());
        $institutomate = Materia::find($id)->instituto()->get();
      
        $materia =Materia::where('id', $id)->firstOrfail();
        $contenidos=Contenido::get();
      
   return view ('Docente.contenidodocente',compact('user','institutomate','materia','contenidos'));

}

    public function cursos($id){
        $materia =Materia::where('id', $id)->firstOrfail();
        $distribucion = Distribucionmacu::get();
        $curso = Curso::get();
        $distrima =Distrima::get();
        $mate = $materia->distribucionmacus;
        
     return view('Docente.cursos',compact('materia','distribucion','curso','distrima', 'mate'));

    }


}