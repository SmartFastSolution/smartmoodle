<?php

namespace App\Http\Controllers;
use App\Materia;
use App\Curso;
use App\Instituto;
use App\Distribucionmacu;
use App\Distrima;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DistrimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distrimas= Distrima::orderBy('id','Asc')->paginate(5);
       
        //dd($distrimas);
        return \view('DistribucionAlumno.indexdma',['distrimas'=>$distrimas,]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $institutos = Instituto::get();
        $materias=Materia::get();  
        $cursos=Curso::get();
        $users=User::get();
        $distribucion=Distribucionmacu::get();
        return \view('DistribucionAlumno.createma',compact('materias','cursos','institutos','users'));
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

           
            'estado' => ['required' ,'in:on,off'],
        ]);

        $distrima =new  Distrima;
        $distrima ->instituto_id = $request->instituto;
        $distrima ->estado = $request->estado;
        
        $distrima ->user_id = $request->estudiante;
        $distrima->save();
        if($request->get('asignacion')){
            $distrima->distribumacus()->sync($request->get('asignacion'));
          }
        return redirect('sistema/distrimas ');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Distrima  $distrima
     * @return \Illuminate\Http\Response
     */
    public function show(Distrima $distrima)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Distrima  $distrima
     * @return \Illuminate\Http\Response
     */
    public function edit(Distrima $distrima)
    {

        $distma=Distrima::find($distrima->id);
        $user=$distma->user()->first();

        $instituto=Distrima::find($distrima->id)->instituto()->first();

        $distribumacu_all=Distribucionmacu::where('instituto_id', $instituto->id)->get();
        $distribucion= $distma->distribumacus()->first();

        return \view('DistribucionAlumno.editdisma',compact('distrima','distma','instituto','distribumacu_all','user','distribucion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Distrima  $distrima
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distrima $distrima)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Distrima  $distrima
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distrima $distrima)
    {
       $distrima= Distribucionmacu::find($distrima->id);
       $distrima->delete();

        return redirect('sistema/distrimas')->with('success','Haz eliminado una Asignación con exito');
    }
}