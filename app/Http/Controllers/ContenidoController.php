<?php

namespace App\Http\Controllers;

use App\Contenido;
use App\Materia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use League\CommonMark\Context;

class ContenidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Responses
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
        return \view('Contenido.createco',compact('materias'));

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
            'documentod'  => 'required|mimes:jpg,jpeg,gif,png,xls,xlsx,doc,docx,pdf|max:8000',
            'estado'      => 'required|in:on,off',
        ]);
     
        $contenido=(new Contenido)->fill($request->all());
       
        if($request->hasFile('documentod')){
         $contenido['documentod']= $request->file('documentod')->store('public');
        }
      
        if($request->get('materia')){
         
            $contenido->materia_id = $request->materia;
         }
        

         $contenido->save();

        return redirect('sistema/contenidos');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contenido  $contenido
     * @return \Illuminate\Http\Response
     */
    public function show(Contenido $contenido)
    {

        $materias=Materia::get();
        $materiacontenido=Contenido::find($contenido->id)->materia()->get();
        return \view('Contenido.showcon',['contenido'=>$contenido,'materias'=>$materias,'materiacontenido'=> $materiacontenido]);
    
        
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
            'documentod'  => 'mimes:jpg,jpeg,gif,png,xls,xlsx,doc,docx,pdf|max:8000',
            'estado'      => 'required|in:on,off',
        ]);
       
        $contenido->update($request->all());

      //validacion y que al momento de actualizar el documento no sea obligatorio subir el documento 
      //sino que se mantenga alli mismo y solo actualizar el documento requerido 
        if($request->hasFile('documentod')){

        Storage::delete('public'.$contenido->documentod);
         $contenido['documentod']= $request->file('documentod')->store('public');
        
        }else{ 
                unset($contenido->documentod); 
        }
      //al actualizar el contenido no sea necesario que materia tenga que ir requerido y se pueda mantener 
      //la que estuvo almacenada anteriormente
        if($request->get('materia')){
         
            $contenido->materia_id = $request->materia;
         }
        // hasta aqui 
       

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
           if(Storage::delete('public/',$contenido->documentod)){

           $contenido->delete($contenido->documentod);
            }

            
            return redirect('sistema/contenidos')->with('success','Haz eliminado un Contenido con exito');     


       
       
    }
}