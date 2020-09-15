<?php

namespace App\Http\Controllers;

use App\Instituto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstitutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instituto= Instituto::orderBy('id','Asc')->paginate(5);
    
        return view('Instituto.indexins',['institutos'=>$instituto]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('Instituto.createins');
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

            'nombre'      => 'required|string|max:150',
            'descripcion' => 'required|string|max:150',
            'provincia'   => 'required|string|max:250',
            'canton'      => 'required|string|max:150',
            'direccion'   => 'required|string|max:250',
            'telefono'    => 'required|string|max:13',
            'email'       => 'required|string|max:150|unique:institutos',
            'estado'      => 'required|in:on,off',
            

        ]);

        $instituto = Instituto::create($request->all());
   
       return \redirect('sistema/institutos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instituto  $instituto
     * @return \Illuminate\Http\Response
     */
    public function show(Instituto $instituto)
    {
        return view ('instituto.showins',['instituto'=>$instituto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instituto  $instituto
     * @return \Illuminate\Http\Response
     */
    public function edit(Instituto $instituto)
    {
       
      return \view('instituto.editins',['instituto'=>$instituto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instituto  $instituto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instituto $instituto)
    {
        $request->validate([

            'nombre'      => 'required|string|max:150',
            'descripcion' => 'required|string|max:150',
            'provincia'   => 'required|string|max:250',
            'canton'      => 'required|string|max:150',
            'direccion'   => 'required|string|max:250',
            'telefono'    => 'required|string|max:13',
            'email'       => 'required|string|max:150',
            'estado'      => 'required|in:on,off',
            

        ]);
       
    
        $instituto ->update($request->all());
   
       return \redirect('sistema/institutos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instituto  $instituto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $instituto= Instituto::find($id);
        $instituto->delete();

        return redirect('sistema/institutos')->with('success','Haz eliminado un Dato con exito');
   
    }
}