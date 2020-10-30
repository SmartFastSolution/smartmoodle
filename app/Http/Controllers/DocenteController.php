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
use App\Distribuciondo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocenteController extends Controller
{

  

       public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('docente');
    }

    public function index(){

        return view('Docente.indexd'); //ruta docente
    }
    

    public function contenidos($id){
        // todos los datos de la bd
        $user =  User::findorfail( Auth::id());
        $institutomate = Materia::find($id)->instituto()->get();
      
        $materia =Materia::where('id', $id)->firstOrfail();
        $contenidos=Contenido::get();
      
   return view ('Docente.contenidodocente',compact('user','institutomate','materia','contenidos'));

}


}