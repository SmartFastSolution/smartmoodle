<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Nivel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       
         
        $cursos= Curso::orderBy('id','Asc')->paginate(5);
       
        return \view('Cursos.indexc',['cursos'=>$cursos,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nivels=Nivel::get();

        return \view('Cursos.createc',compact('nivels',));
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

            'nombre'      => 'required|string|max:60',
            'paralelo'      => 'required|string|max:1',
            'estado'      => 'required|in:on,off',
        ]);

        $curso = new Curso ;
        $curso->nivel_id = $request->nivel;
        $curso->nombre = $request->nombre;
        $curso->paralelo = $request->paralelo;
        $curso->estado = $request->estado;
        $curso->save();
        return redirect('sistema/cursos');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        //
    }
}
