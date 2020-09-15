<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\TallerCompletar;
use App\Taller;
use App\Plantilla;
use App\Admin\TallerClasificar;
use App\Admin\TallerCompletarEnunciado;

class AdminController extends Controller
{
   public function admin()
   {
   	  return view('admin.admin');
   }
   public function plantilla(Request $request)
   {
   	$i = Plantilla::get()->count();
   	  $plantilla = new Plantilla;
   	  $plantilla->nombre = 'TALLER '.++$i.' - '.$request->input('nombre');
   	  $plantilla->descripcion = $request->input('descripcion');
   	  $plantilla->save();

   	   return redirect()->route('admin')->with('datos', 'Plantilla creada correctamente!'); 
   }
   public function taller1(Request $request)
   {
   	$i = Taller::get()->count();
   	//return $request->all();
   	$taller1 = new Taller;
   	$taller1->nombre = 'Taller '.++$i;
   	$taller1->plantilla_id = $request->input('id_plantilla');
   	$taller1->id_materia = $request->input('id_materia');
   	$taller1->estado = 1;
   	$taller1->save();

   	if ($taller1 = true) {
   		if ($request->hasFile('imagen')) {
   			$imagen = $request->file('imagen');
   			$nombre = time().'_'.$imagen->getClientOriginalName();
   			$ruta = public_path().'/img/talleres';
   			$imagen->move($ruta, $nombre);
   			$urlimagen = '/img/talleres/'.$nombre;

   	   		}

   		$taller_1 = new TallerCompletar;
   		$taller_1->taller_id = $i;
   		$taller_1->enunciado = $request->input('enunciado');
   		$taller_1->leyenda = $request->input('leyenda');
   		$taller_1->save();

   	}
    return redirect()->route('welcome')->with('datos', 'Taller creado correctamente!'); 
   }

     public function taller2(Request $request)
   {
   	$i = Taller::get()->count();
   	//return $request->all();
   $taller2 = new Taller;
   	$taller2->nombre = 'Taller '.++$i;
   	$taller2->plantilla_id = $request->input('id_plantilla');
   	$taller2->id_materia = $request->input('id_materia');
   	$taller2->estado = 1;
   	$taller2->save();

   	if ($taller2 = true) {
   		if ($request->hasFile('imagen')) {
   			$imagen = $request->file('imagen');
   			$nombre = time().'_'.$imagen->getClientOriginalName();
   			$ruta = public_path().'/img/talleres';
   			$imagen->move($ruta, $nombre);
   			$urlimagen = '/img/talleres/'.$nombre;

   	   		}

   		$taller_2 = new TallerClasificar;
   		$taller_2->taller_id = $i;
   		$taller_2->enunciado = $request->input('enunciado');
   		$taller_2->img = $urlimagen;
   		$taller_2->save();

   	}
    return redirect()->route('welcome')->with('datos', 'Taller Creado Correctamente!'); 
   }

    public function taller3(Request $request)
   {
   	$i = Taller::get()->count();
   	//return $request->all();
   $taller3 = new Taller;
   	$taller3->nombre = 'Taller '.++$i;
   	$taller3->plantilla_id = $request->input('id_plantilla');
   	$taller3->id_materia = $request->input('id_materia');
   	$taller3->estado = 1;
   	$taller3->save();

   	if ($taller3 = true) {
   		$taller_3 = new TallerCompletarEnunciado;
   		$taller_3->taller_id = $i;
   		$taller_3->enunciado = $request->input('enunciado');
   		$taller_3->enunciado1 = $request->input('enunciado1');
   		$taller_3->enunciado2 = $request->input('enunciado2');
   		$taller_3->enunciado3 = $request->input('enunciado3');
   		$taller_3->enunciado4 = $request->input('enunciado4');
   		$taller_3->enunciado5 = $request->input('enunciado5');
   		$taller_3->save();
   	}
    return redirect()->route('welcome')->with('datos', 'Taller Creado Correctamente!'); 
   }

}
