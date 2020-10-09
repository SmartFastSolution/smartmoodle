<?php

namespace App\Http\Controllers;
use App\Materia;
use App\User;
use App\Instituto;
use App\Distribuciondo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DistribuciondoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $distribucions=Distribuciondo::orderBy('id','Asc')->paginate(5);
       
        return \view('DistribucionDocente.indexdocente',['distribucions'=>$distribucions,]);
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
        $user=User::get();
      
      
        return \view('DistribucionDocente.createdocente',compact('materias','user','institutos'));
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

        $distribuciondo =new  Distribuciondo;
        $distribuciondo ->instituto_id = $request->instituto;
        $distribuciondo ->user_id = $request->docente;
        $distribuciondo ->estado = $request->estado;
       
          
      

       $distribuciondo->save();

     
       if($request->get('materia')){
        $distribuciondo->materias()->sync($request->get('materia'));
      }
        return redirect('sistema/distribuciondos ');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Distribuciondo  $distribuciondo
     * @return \Illuminate\Http\Response
     */
    public function show(Distribuciondo $distribuciondo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Distribuciondo  $distribuciondo
     * @return \Illuminate\Http\Response
     */
    public function edit(Distribuciondo $distribuciondo)
    {
        $distd=Distribuciondo::find($distribuciondo->id);
        $user=  $distd->user()->first();
        $instituto=Distribuciondo::find($distribuciondo->id)->instituto()->first();
        $materias=  $distd->materias()->get();

        $materia_all = Materia::where('instituto_id', $instituto->id)->get();
       
      

        return \view('DistribucionDocente.editdocente', compact('distribuciondo','user','instituto','distd','materias','materia_all'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Distribuciondo  $distribuciondo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distribuciondo $distribuciondo)
    {
        $request->validate([

           
            
            'estado'      => 'required|in:on,off',
        ]);

        $distribuciondo->update($request->all());

        if($request->get('materia')){
            $distribuciondo->materias()->sync($request->get('materia'));
          }

          $distribuciondo->save();

          return redirect('sistema/distribuciondos ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Distribuciondo  $distribuciondo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distribuciondo $distribuciondo)
    {
       $distribuciondo= Distribuciondo::find($distribuciondo->id);
       $distribuciondo->delete();

        return redirect('sistema/distribuciondos ')->with('success','Haz eliminado una Asignación con exito');
    
    }
}
