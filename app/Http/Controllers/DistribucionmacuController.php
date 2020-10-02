<?php

namespace App\Http\Controllers;
use App\Materia;
use App\Curso;
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
       
        $cursos=Curso::get();
      
        return \view('Distribucion.createmc',compact('materias','cursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //return $request->all();

        $request->validate([

            'descripcion' => [ 'string', 'max:150'],
            'estado' => ['required' ,'in:on,off'],
        ]);

        $distribucionmacu =new  Distribucionmacu;
        $distribucionmacu ->descripcion = $request->descripcion;
        $distribucionmacu ->estado = $request->estado;
        $distribucionmacu->curso_id=$request->cursos;
          
      

       $distribucionmacu->save();
       if($request->get('materia')){
        $distribucionmacu->materias()->sync($request->get('materia'));
      }
        return redirect('sistema/distribucionmacus ');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Distribucionmacu  $distribucionmacu
     * @return \Illuminate\Http\Response
     */
    public function show(Distribucionmacu $distribucionmacu)
    {
        return \view('Distribucion.showmacu');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Distribucionmacu  $distribucionmacu
     * @return \Illuminate\Http\Response
     */
    public function edit(Distribucionmacu $distribucionmacu)
    {
        $distribucionmacu_materia=[]; //creo una variable array para almacenar los datos relacionados de la tabla pivote entre materia y distribucion
      
        foreach($distribucionmacu->materias as $materia){   //realizo el recorrido
        $distribucionmacu_materia[]=$materia->id;
       }
        
        $materias= Materia::all();
        $cursos = Curso::get(); //todos los datos de la bd de cursos
        $distcursos=Distribucionmacu::find($distribucionmacu->id)->curso()->get(); //llama al curso que esta relacionado a esta distribucion

        return view('Distribucion.editmacu',compact('distribucionmacu','materias','cursos','distcursos','distribucionmacu_materia'));
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

        $request->validate([

           
            'descripcion'      => 'required|string|max:150',
            'estado'      => 'required|in:on,off',
        ]);

        $distribucionmacu->update($request->all());
   
        if($request->get('curso')){
          
            $distribucionmacu->curso_id = $request->curso;
          }

          if($request->get('materia')){
            $distribucionmacu->materias()->sync($request->get('materia'));
          }
         

        $distribucionmacu->save();
        return redirect('sistema/distribucionmacus');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Distribucionmacu  $distribucionmacu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distribucionmacu $distribucionmacu)
    {
        $distribucionmacu= Distribucionmacu::find($distribucionmacu->id);
        $distribucionmacu->delete();

        return redirect('sistema/distribucionmacus')->with('success','Haz eliminado una Asignación con exito');
    }
}