<?php

namespace App\Http\Controllers;
use App\Taller;
use App\Materia;
use App\Plantilla;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materias= Materia::orderBy('id','Asc')->paginate(5);
    
        return view('Materias.indexm',['materias'=>$materias]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
         
        return \view('Materias.createm');
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
            'slug'      => 'required|string|max:60',
            'descripcion'      => 'required|string|max:150',
            'estado'      => 'required|in:on,off',
        ]);

        $materia = Materia::create($request->all());
   
        
        return \redirect('sistema/materias');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function show ($id)
    {
        // $tallers=Taller::get();()
        // dd($tallers);
        $materia =Materia::where('id', $id)->firstOrfail();
        //$taller=Taller::all(array("id","materia_id","nombre" ));
        $tallers=Taller::get();
        //$tallers=Taller::get();
         return view ('Materias.showm',['materia'=>$materia,'tallers'=>$tallers,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function edit(Materia $materia)
    {
       
        return view('Materias.editm',['materias'=>$materia]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materia $materia)
    {
     
        $request->validate([

            'nombre'      => 'required|string|max:60',
            'slug'      => 'required|string|max:60',
            'descripcion'      => 'required|string|max:150',
            'estado'      => 'required|in:on,off',
        ]);

        $materia->update($request->all());
   
        return \redirect('sistema/materias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materia $materia)
    {
        
        $materia= Materia::find($materia->id);
        $materia->delete();

        return redirect('sistema/materias')->with('success','Haz eliminado una Materia con exito');
  

    }
}