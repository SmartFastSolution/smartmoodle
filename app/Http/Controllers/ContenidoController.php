<?php

namespace App\Http\Controllers;

use App\Contenido;
use App\Materia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class ContenidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contenido= Contenido::orderBy('id','Asc')->paginate(5);
    
        return view('Contenido.indexcon',['contenidos'=>$contenido]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $materias=Materia::get();
        return \view('Contenido.createco',compact('materias',));

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
            'descripcion' => 'required|string|max:250',
            'documentod'  => 'required|mimes:jpg,jpeg,gif,png,xls,xlsx,doc,docx,pdf',
            'estado'      => 'required|in:on,off',
        ]);

     

        $contenido = new Contenido ;
        $contenido->materia_id = $request->materia;
        $contenido->nombre = $request->nombre;
        $contenido->descripcion = $request->descripcion;
        $contenido->documentod= $request->file('documentod')->store('public');    
        $contenido->estado = $request->estado;
        $contenido->save();

        return redirect('sistema/contenidos');
  




    //pruebas 
    //dd($request->file('documentod'));
    //$contenido =\request()->except('_token');
    //Contenido:: insert($contenido);
    //return \response()->json($contenido);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contenido  $contenido
     * @return \Illuminate\Http\Response
     */
    public function show(Contenido $contenido)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contenido  $contenido
     * @return \Illuminate\Http\Response
     */
    public function edit(Contenido $contenido)
    {
        $materias=Materia::get();
        $materiacontenido=Contenido::find($contenido->id)->materia()->get();
        return \view('Contenido.editcon',['contenido'=>$contenido,'materias'=>$materias,'materiacontenido'=> $materiacontenido]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contenido  $contenido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contenido $contenido)
    {
        $request->validate([

            'nombre'      => 'required|string|max:150',
            'descripcion' => 'required|string|max:250',
            'documentod'  => 'required|mimes:jpg,jpeg,gif,png,xls,xlsx,doc,docx,pdf',
            'estado'      => 'required|in:on,off',
        ]);

     

     
        $contenido->materia_id = $request->materia;
        $contenido->nombre = $request->nombre;
        $contenido->descripcion = $request->descripcion;
        $contenido->documentod= $request->file('documentod')->store('public');    
        $contenido->estado = $request->estado;
        $contenido->save();

        return redirect('sistema/contenidos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contenido  $contenido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contenido $contenido)
    {
        $contenido= Contenido::find($contenido->id);
        $contenido->delete();

        return redirect('sistema/contenidos')->with('success','Haz eliminado un Contenido con exito');
   
    }
}