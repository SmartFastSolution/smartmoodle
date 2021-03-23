<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Curso;
use App\Distribuciondo;
use App\Distribucionmacu;
use App\Exports\AssigmentExport;
use App\Exports\CursoExport;
use App\Exports\DistribucionExport;
use App\Exports\DocenteExport;
use App\Exports\NotasExport;
use App\Exports\CalificacionesExport;
use App\Exports\ReportExport;
use App\Instituto;
use App\Materia;
use App\Modelos\Role;
use App\Taller;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PDFController extends Controller
{
   

    public function Reporteindex(){

             $au = User::join('role_user', 'users.id', '=', 'role_user.user_id')
                ->join('institutos', 'users.instituto_id', '=', 'institutos.id')
                ->join('distribuciondos', 'users.id', '=', 'distribuciondos.user_id')
                ->leftJoin('distribuciondo_nivel', 'distribuciondos.id', '=', 'distribuciondo_nivel.distribuciondo_id')
                ->leftJoin('materias', 'distribuciondos.materia_id', '=', 'materias.id')
                ->leftJoin('assignment_materia', 'materias.id', '=', 'assignment_materia.materia_id')
                ->join('users as estudiantes', function ($join) {
                    $join->on('distribuciondo_nivel.nivel_id', '=', 'estudiantes.nivel_id')
                        ->on('assignment_materia.user_id', '=', 'estudiantes.id');
                })
                // ->leftJoin('distribucionmacu_materia', 'distribuciondos.materia_id', '=', 'distribucionmacu_materia.materia_id')
                ->leftJoin('distribucionmacus', 'estudiantes.distribucionmacu_id', '=', 'distribucionmacus.id')
                ->leftJoin('cursos', 'distribucionmacus.curso_id', '=', 'cursos.id')
                // ->leftJoin('materias', 'distribucionmacu_materia.materia_id', '=', 'materias.id')
                //  ->leftJoin('assignments', 'users.id', '=', 'assignments.user_id')
                //  ->leftJoin('assignment_materia', 'materias.id', '=', 'assignment_materia.materia_id')
                //  ->leftJoin('users as estudiantes', 'assignment_materia.user_id', '=', 'estudiantes.id')
                // // //  ->leftJoin('distribucionmacu_materia', 'distribuciondos.materia_id', '=', 'distribucionmacu_materia.materia_id')
                // // ->join('distribucionmacus', 'estudiantes.distribucionmacu_id', '=', 'distribucionmacus.id')
                // // ->join('cursos', 'distribucionmacus.curso_id', '=', 'cursos.id')
                // ->join('nivels', 'estudiantes.nivel_id', '=', 'nivels.id')
                // // ->leftJoin('materias', 'assignment_materia.materia_id', '=', 'materias.id')
                // // ->where('role_user.role_id', 2)
                ->select('users.name as docente_nombre','materias.nombre as materia','users.apellido as docente_apellido','estudiantes.name as estudiamte_nombre','cursos.nombre as curso','distribuciondo_nivel.nivel_nombre','estudiantes.apellido as estudiamte_apellido','institutos.nombre as instituto')  
                ->get();
                // return $au;
       
      
        $doc = Distribuciondo::all();
        $est = Assignment::all();
       
        $users= User::all();
        return view('Reportes.reportedocente', compact( 'doc','est','users'));
    }


    //////////////////////////////////////////
    ////Metodos para descargar reporte////////
    //////////////////////////////////////////

    public function UserExport(Request $request){
        $usuarios = $request->datos;

        return Excel::download(new ReportExport($usuarios), 'user-list.xlsx');
    }

    public function DistribucionExport(Request $request){

        $talleres = $request->datos;
        
      return   Excel::download(new DistribucionExport($talleres) , 'distribucion-list.xlsx');
    }
    public function exportar($talleres)
    {
       return  Excel::download(new DistribucionExport($talleres) , 'distribucion-list.xlsx');
    }

    public function AssigmentExport(Request $request){
         $estudiantes = $request->datos;

        return Excel::download(new AssigmentExport($estudiantes) , 'asignaciones-list.xlsx');
    }

    public function DocenteExport(Request $request){
         $docentes = $request->datos;

        return Excel::download(new  DocenteExport($docentes), 'docentes-list.xlsx');
    }
    
    public function CursoExport(Request $request){
        $alumnos = $request->datos;
        return Excel::download(new  CursoExport($alumnos) , 'cursos-list.xlsx');
    }
       public function Notasxport(Request $request){
        $notas = $request->datos;
        return Excel::download(new  NotasExport($notas) , 'notas-list.xlsx');
    }
    public function CalificacionExport(Request $request){
        $calificaciones = $request->calificaciones;
        $titulos        = $request->titulos;
        return Excel::download(new  CalificacionesExport($calificaciones, $titulos) , 'calificaciones-list.xlsx');
    }

   




}