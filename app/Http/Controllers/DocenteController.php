<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
       public function __construct()
    {
        $this->middleware('docente');
    }
    public function index(){

        return view('Docente.indexd'); //ruta docente
    }
    


}
