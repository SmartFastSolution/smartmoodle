<?php

namespace App\Http\Controllers;

use App\Assignment;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\User;
use App\Instituto;
use App\Materia;
use App\Curso;
use App\Modelos\Role;
use App\Distribuciondo;
use App\Distribucionmacu;


class PDFController extends Controller
{
    // public function PDF(){
    //     $pdf = PDF::loadView('Reportes.prueba');
    //     return $pdf->stream('prueba.pdf');
    // }


    // public function PDFUser(){
     
    //     $users= User::all();
    //     $pdf = PDF::loadView('Reportes.prueba',compact('users'));
    //     return $pdf->stream('prueba.pdf');

    // }

    // public function PDFDocentes (){

    //     $docs= Distribuciondo::all();
    //     $pdf = PDF::loadView('Reportes.docentes',compact('docs'));
    //     return $pdf->stream('docentes.pdf');
    // }
    //seccion reportes


//     public function Reporte(Instituto $instituto){

//         $institutos = Instituto::all();
//         $alldist= Distribucionmacu::all();

//         return view('Reportes.reporte',compact('institutos','alldist'));
//     }


//     //traer todo de manera especifica

//     public function Instituto(Request $request){
//     $instituto =Instituto::where('id', $request->id)->get();
//     $und= []; 
//     foreach($instituto as $key => $value){
//         $und[$key] =[
//             'id'=>$value->id,
//             'nombre'=>$value->nombre, 
//             'email'=>$value->email, 
               
//         ];
//     }
//       return $und;
      
//    }


//    public function curso(Request $request){
     
//    $cursos = Distribucionmacu::where('instituto_id', $request->id)->get();
//    $cur = [];
//    foreach($cursos as $key => $value){
//        $cur[$key] =[
//            'instituto' =>$value->instituto->nombre,
//            'id'=> $value->curso->id,
//            'nombre' => $value->curso->nombre,
//            'materia' =>$value->materias,
          
//        ];
//    }
//    return $cur;   

//    }

//    public function Filtrocurso(Request $request){
      
//     $filtrocurso =Distribucionmacu::where('curso_id', $request->id)->get();
//     $filtro= []; 
//     foreach($filtrocurso as $key => $value){ 

//         $filtro[$key] =[
//             'id'=>$value->id,
//             'instituto' =>$value->instituto->nombre,
//             'nombre' => $value->curso->nombre,
//             'materia' => $value->materias,
                     
//         ];
//     }
//       return $filtro;
//    }



    public function Reporteindex(){

        $dist = Distribucionmacu::all();
      
        $doc = Distribuciondo::all();
        $est = Assignment::all();
       /// $users= User::where('estado','off')->get();
        $users= User::all();
        return view('Reportes.reportedocente', compact('dist', 'doc','est','users'));
    }


  
 



    




}