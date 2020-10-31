<?php

namespace App\Http\Controllers;

use App\Contenido;
use App\Http\Controllers\Controller;
use App\Materia;
use App\Taller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocenteController extends Controller
{
       public function __construct()
    {
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
        $talleres = Taller::get();
      
   return view ('Docente.contenidodocente',compact('user','institutomate','materia','contenidos', 'talleres'));

}


}
