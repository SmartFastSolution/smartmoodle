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

class DocenteController extends Controller
{
   
    public function index(){

        return view('Docente.indexd'); //ruta docente
    }
    


}
