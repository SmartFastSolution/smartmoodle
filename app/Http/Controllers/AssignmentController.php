<?php

namespace App\Http\Controllers;

use App\Materia;
use App\User;
use App\Instituto;
use App\Assignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
  
    public function index()
    {
        $as=Assignment::all();
       
        return \view('Asignacion.index',compact('as'));
       
    }

   
    public function create()
    {
        $institutos = Instituto::get();
        $materias=Materia::get();
        $user=User::get();

        return \view('Asignacion.create',compact('materias','user','institutos'));
    }

  
    public function store(Request $request)
    {
        $request->validate([ 
            'instituto' =>['required'],
            'estudiante' => ['required','unique:assignments,user_id'],
            'materia' =>    ['required'],
            'estado' =>   ['required' ,'in:on,off'],
        ]);

         $as = new Assignment;
         $as ->instituto_id = $request->instituto;
         $as ->user_id = $request->estudiante;
         $as ->estado = $request->estado;
         $as->save();

         if($request->get('materia')){
            $as->materias()->sync($request->get('materia'));
          }
            return redirect('sistema/assignments ')->with('success','Haz Creado una Asignación con exito!');

    }

   
    public function show(Assignment $assignment)
    {

        $as1= Assignment::find($assignment->id);
        $user = $as1->user()->first();
        $instituto = Assignment::find($assignment->id)->instituto()->first();
        $materias= $as1->materias()->get();
        $materia_all = Materia::where('instituto_id', $instituto->id)->get();
        
        return view('Asignacion.show', compact('assignment','as1','user','instituto','materias','materia_all'));
  


        return \view('Asignacion.show');
    }

    public function edit(Assignment $assignment)
    {
        $as1= Assignment::find($assignment->id);
        $user = $as1->user()->first();
        $instituto = Assignment::find($assignment->id)->instituto()->first();
        $materias= $as1->materias()->get();
        $materia_all = Materia::where('instituto_id', $instituto->id)->get();
        
        return view('Asignacion.edit', compact('assignment','as1','user','instituto','materias','materia_all'));
    }

  
    public function update(Request $request, Assignment $assignment)
    {
        $request->validate([            
            'estado'      => 'required|in:on,off',
        ]);

        $assignment->update($request->all());

         
        if($request->get('materia')){
            $assignment->materias()->sync($request->get('materia'));
          }

          $assignment->save();

          return redirect('sistema/assignments ')->with('success','Haz Actualizado una Asignación con exito!');

    }

   
    public function destroy(Assignment $assignment)
    {
        $assignment= Assignment::find($assignment->id);
        $assignment->delete();
 
         return redirect('sistema/assignments ')->with('success','Haz eliminado una Asignación con exito!');
     
    }
}
