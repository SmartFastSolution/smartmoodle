<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function index(){

        return view('Estudiante.indexes'); //ruta estudiante
       
    }
}
