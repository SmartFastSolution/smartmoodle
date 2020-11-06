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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institutos=Instituto::get();
        return \view('Clonacion.clonacionc', compact('institutos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {




        
        // DB::select(DB::raw("exec clonacion :psource, :ptarget"),[
        //     ':psource' => $request->intituto,
        //     ':ptarget' => $request->institutoclon,
        // ]);
         


        $request->validate([
           
            'instituto'       =>  'required',
            'institutoclon'       =>  'required',
            
          
        ]);

       

        $clinstituto = new Clinstituto;
        $clinstituto->instituto_id = $request->instituto;
        $clinstituto->institutoclon = $request->institutoclon;
        $clinstituto->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clinstituto  $clinstituto
     * @return \Illuminate\Http\Response
     */
    public function show(Clinstituto $clinstituto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clinstituto  $clinstituto
     * @return \Illuminate\Http\Response
     */
    public function edit(Clinstituto $clinstituto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clinstituto  $clinstituto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clinstituto $clinstituto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clinstituto  $clinstituto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clinstituto $clinstituto)
    {
        //
    }
}
