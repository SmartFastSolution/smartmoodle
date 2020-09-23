<?php

namespace App\Http\Controllers;
use App\Materia;
use App\Distribucionmacu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DistribucionmacuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distribucionmacus= Distribucionmacu::orderBy('id','Asc')->paginate(5);
       
        return \view('Distribucion.indexmc',['distribucionmacus'=>$distribucionmacus,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materias=Materia::get();
       
      
        return \view('Distribucion.createmc',compact('materias',));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Distribucionmacu  $distribucionmacu
     * @return \Illuminate\Http\Response
     */
    public function show(Distribucionmacu $distribucionmacu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Distribucionmacu  $distribucionmacu
     * @return \Illuminate\Http\Response
     */
    public function edit(Distribucionmacu $distribucionmacu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Distribucionmacu  $distribucionmacu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distribucionmacu $distribucionmacu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Distribucionmacu  $distribucionmacu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distribucionmacu $distribucionmacu)
    {
        //
    }
}
