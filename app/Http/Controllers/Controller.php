<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use App\Materia;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index (){

        return view('welcome');
    }
     

    // public function getMateria(Request $request){
    //     if($request->ajax()){

    //     $materias = Materia::where('instituto_id', $request->instituto)->get();
       
    //     foreach($materias as $materia){
           
    //         $materiaarray[$materia->id] =$materia->nombre;
    //       }
    //       return \response()->json( $materiaarray);
        
    //     }


    }
      
    

}
