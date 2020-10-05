<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Materia;


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
}
