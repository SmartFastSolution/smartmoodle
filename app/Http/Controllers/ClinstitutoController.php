<?php

namespace App\Http\Controllers;
use App\Instituto;
use App\Clinstituto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClinstitutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

  
    public function create()
    {
        $institutos=Instituto::get();
        return \view('Clonacion.clonacionc', compact('institutos'));
    }

  
    public function store(Request $request)
    {
         dd($request);
        
        //return redirect('sistema/clinstitutos/create')->with('info','Clonación Realizada Exitosamente!');
        
    }

    
}
