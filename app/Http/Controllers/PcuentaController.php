<?php

namespace App\Http\Controllers;

use App\Pcuenta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PcuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuentas= Pcuenta::orderBy('id','Asc')->paginate(7);
    
        return view('Cuentas.indexcuenta',['cuentas'=>$cuentas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return \view('Cuentas.createcp');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $request->validate([

            'tpcuenta'      => 'required|string|max:150',
            'cuenta'      => 'required|string|max:150',
            'estado'      => 'required|in:on,off',
        ]);

        $pcuenta = Pcuenta::create($request->all());
   
        return \redirect('sistema/pcuentas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pcuenta  $pcuenta
     * @return \Illuminate\Http\Response
     */
    public function show(Pcuenta $pcuenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pcuenta  $pcuenta
     * @return \Illuminate\Http\Response
     */
    public function edit(Pcuenta $pcuenta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pcuenta  $pcuenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pcuenta $pcuenta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pcuenta  $pcuenta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pcuenta $pcuenta)
    {
        //
    }
}
