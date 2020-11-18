<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\User;
use App\Modelos\Role;
use App\Distribuciondo;

class PDFController extends Controller
{
    // public function PDF(){
    //     $pdf = PDF::loadView('Reportes.prueba');
    //     return $pdf->stream('prueba.pdf');
    // }


    public function PDFUser(){
     
        $users= User::all();
        $pdf = PDF::loadView('Reportes.prueba',compact('users'));
        return $pdf->stream('prueba.pdf');

    }

    public function PDFDocentes (){

        $docs= Distribuciondo::all();
        $pdf = PDF::loadView('Reportes.docentes',compact('docs'));
        return $pdf->stream('docentes.pdf');

    }

}