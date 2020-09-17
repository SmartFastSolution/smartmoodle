<?php

namespace App\Http\Controllers;

use App\Admin\TallerCirculo;
use App\Admin\TallerClasificar;
use App\Admin\TallerCompletar;
use App\Admin\TallerCompletarEnunciado;
use App\Admin\TallerDiferencia;
use App\Admin\TallerGusanillo;
use App\Admin\TallerIdentificarImagen;
use App\Admin\TallerSenalar;
use App\Admin\TallerSenalarOpcion;
use App\Admin\TallerSubrayar;
use App\Http\Controllers\Controller;
use App\Plantilla;
use App\Taller;
use Illuminate\Http\Request;

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

   	   return redirect()->route('admin.create')->with('datos', 'Plantilla creada correctamente!'); 
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
    return redirect()->route('admin.create')->with('datos', 'Taller creado correctamente!'); 
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

   		$taller_2 = new Taller;
   		$taller_2->taller_id = $i;
   		$taller_2->enunciado = $request->input('enunciado');
   		$taller_2->img = $urlimagen;
   		$taller_2->save();

   	}
    return redirect()->route('admin.create')->with('datos', 'Taller Creado Correctamente!'); 
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
    return redirect()->route('admin.create')->with('datos', 'Taller Creado Correctamente!'); 
   }

   public function taller4(Request $request)
   {
      $i = Taller::get()->count();
      $taller4 = new Taller;
      $taller4->nombre = 'Taller '.++$i;
      $taller4->plantilla_id = $request->input('id_plantilla');
      $taller4->id_materia = $request->input('id_materia');
      $taller4->estado = 1;
      $taller4->save();

      if ($taller4 = true) {
         if ($request->hasFile('img1')) {
            $imagen1 = $request->file('img1');
            $nombre1 = time().'_'.$imagen1->getClientOriginalName();
            $ruta1 = public_path().'/img/talleres';
            $imagen1->move($ruta1, $nombre1);
            $urlimagen1 = '/img/talleres/'.$nombre1;

               }
                if ($request->hasFile('img2')) {
            $imagen2 = $request->file('img2');
            $nombre2 = time().'_'.$imagen2->getClientOriginalName();
            $ruta2 = public_path().'/img/talleres';
            $imagen2->move($ruta2, $nombre2);
            $urlimagen2 = '/img/talleres/'.$nombre2;

               }
            $e = Taller::get()->count();
         $taller_4 = new TallerDiferencia;
         $taller_4->taller_id = $e;
         $taller_4->enunciado = $request->input('enunciado');
         $taller_4->img1 = $urlimagen1;
         $taller_4->img2 = $urlimagen2;
         $taller_4->save();
      }
    return redirect()->route('admin.create')->with('datos', 'Taller Creado Correctamente!'); 
   }
     public function taller5(Request $request)
   {
      $i = Taller::get()->count();
      $taller5 = new Taller;
      $taller5->nombre = 'Taller '.++$i;
      $taller5->plantilla_id = $request->input('id_plantilla');
      $taller5->id_materia = $request->input('id_materia');
      $taller5->estado = 1;
      $taller5->save();

       if ($taller5 = true) {
              $e = Taller::get()->count();
         $taller_5 = new TallerSenalar;
         $taller_5->taller_id = $e;
         $taller_5->enunciado = $request->input('enunciado');
         $taller_5->save();


         if ($taller_5 = true) {

      $a = TallerSenalar::get()->last();
      $opcion1 = new TallerSenalarOpcion;
      $opcion1->taller_senalar_id = $a->id;
      $opcion1->concepto = $request->input('concepto1');
      $opcion1->alternativa1 = $request->input('alternativac_1a');
      $opcion1->alternativa2 = $request->input('alternativac_1b');
      $opcion1->save();

      $opcion2 = new TallerSenalarOpcion;
      $opcion2->taller_senalar_id = $a->id;
      $opcion2->concepto = $request->input('concepto2');
      $opcion2->alternativa1 = $request->input('alternativac_2a');
      $opcion2->alternativa2 = $request->input('alternativac_2b');
      $opcion2->save();

       $opcion3 = new TallerSenalarOpcion;
      $opcion3->taller_senalar_id = $a->id;
      $opcion3->concepto = $request->input('concepto3');
      $opcion3->alternativa1 = $request->input('alternativac_3a');
      $opcion3->alternativa2 = $request->input('alternativac_3b');
      $opcion3->save();

       $opcion4 = new TallerSenalarOpcion;
      $opcion4->taller_senalar_id = $a->id;
      $opcion4->concepto = $request->input('concepto4');
      $opcion4->alternativa1 = $request->input('alternativac_4a');
      $opcion4->alternativa2 = $request->input('alternativac_4b');
      $opcion4->save();

       $opcion5 = new TallerSenalarOpcion;
      $opcion5->taller_senalar_id = $a->id;
      $opcion5->concepto = $request->input('concepto5');
      $opcion5->alternativa1 = $request->input('alternativac_5a');
      $opcion5->alternativa2 = $request->input('alternativac_5b');
      $opcion5->save();

       $opcion6 = new TallerSenalarOpcion;
      $opcion6->taller_senalar_id = $a->id;
      $opcion6->concepto = $request->input('concepto6');
      $opcion6->alternativa1 = $request->input('alternativac_6a');
      $opcion6->alternativa2 = $request->input('alternativac_6b');
      $opcion6->save();
      return redirect()->route('admin.create')->with('datos', 'Taller Creado Correctamente!'); 
   }

   }

   }
   public function taller6(Request $request)
   {
        $i = Taller::get()->count();
      $taller6 = new Taller;
      $taller6->nombre = 'Taller '.++$i;
      $taller6->plantilla_id = $request->input('id_plantilla');
      $taller6->id_materia = $request->input('id_materia');
      $taller6->estado = 1;
      $taller6->save();

      if ($taller6 = true) {
            $a = Taller::get()->last();
         $taller_6 = new TallerIdentificarImagen;
         $taller_6->taller_id = $a->id;
         $taller_6->enunciado = $request->input('enunciado');

         if ($request->hasFile('img1')) {
            $imagen1 = $request->file('img1');
            $nombre1 = time().'_'.$imagen1->getClientOriginalName();
            $ruta1 = public_path().'/img/talleres';
            $imagen1->move($ruta1, $nombre1);
            $urlimagen1 = '/img/talleres/'.$nombre1;

         $taller_6->img1 = $urlimagen1;

            }
         if ($request->hasFile('img2')) {
            $imagen2 = $request->file('img2');
            $nombre2 = time().'_'.$imagen2->getClientOriginalName();
            $ruta2 = public_path().'/img/talleres';
            $imagen2->move($ruta2, $nombre2);
            $urlimagen2 = '/img/talleres/'.$nombre2;

         $taller_6->img2 = $urlimagen2;

            }
             if ($request->hasFile('img3')) {
            $imagen3 = $request->file('img3');
            $nombre3 = time().'_'.$imagen3->getClientOriginalName();
            $ruta3 = public_path().'/img/talleres';
            $imagen3->move($ruta3, $nombre3);
            $urlimagen3 = '/img/talleres/'.$nombre3;

         $taller_6->img3 = $urlimagen3;

            }
             if ($request->hasFile('img4')) {
            $imagen4 = $request->file('img4');
            $nombre4 = time().'_'.$imagen4->getClientOriginalName();
            $ruta4 = public_path().'/img/talleres';
            $imagen4->move($ruta4, $nombre4);
            $urlimagen4 = '/img/talleres/'.$nombre4;

         $taller_6->img4 = $urlimagen4;

            }
             if ($request->hasFile('img5')) {
            $imagen5 = $request->file('img5');
            $nombre5 = time().'_'.$imagen5->getClientOriginalName();
            $ruta5 = public_path().'/img/talleres';
            $imagen5->move($ruta5, $nombre5);
            $urlimagen5 = '/img/talleres/'.$nombre5;

         $taller_6->img5 = $urlimagen5;

            }
             if ($request->hasFile('img6')) {
            $imagen6 = $request->file('img6');
            $nombre6 = time().'_'.$imagen6->getClientOriginalName();
            $ruta6 = public_path().'/img/talleres';
            $imagen6->move($ruta6, $nombre6);
            $urlimagen6 = '/img/talleres/'.$nombre6;

         $taller_6->img6 = $urlimagen6;

            }
             if ($request->hasFile('img7')) {
            $imagen7 = $request->file('img7');
            $nombre7 = time().'_'.$imagen7->getClientOriginalName();
            $ruta7 = public_path().'/img/talleres';
            $imagen7->move($ruta7, $nombre7);
            $urlimagen7 = '/img/talleres/'.$nombre7;

         $taller_6->img7 = $urlimagen7;

            }
             if ($request->hasFile('img8')) {
            $imagen8 = $request->file('img8');
            $nombre8 = time().'_'.$imagen8->getClientOriginalName();
            $ruta8 = public_path().'/img/talleres';
            $imagen8->move($ruta8, $nombre8);
            $urlimagen8 = '/img/talleres/'.$nombre8;

         $taller_6->img8 = $urlimagen8;

            }
             if ($request->hasFile('img9')) {
            $imagen9 = $request->file('img9');
            $nombre9 = time().'_'.$imagen9->getClientOriginalName();
            $ruta9 = public_path().'/img/talleres';
            $imagen9->move($ruta9, $nombre9);
            $urlimagen9 = '/img/talleres/'.$nombre9;

         $taller_6->img9 = $urlimagen9;

            }
             if ($request->hasFile('img10')) {
            $imagen10 = $request->file('img10');
            $nombre10 = time().'_'.$imagen10->getClientOriginalName();
            $ruta10 = public_path().'/img/talleres';
            $imagen10->move($ruta10, $nombre10);
            $urlimagen10 = '/img/talleres/'.$nombre10;
         $taller_6->img10 = $urlimagen10;


            }
         
       
         $taller_6->save();
         return redirect()->route('admin.create')->with('datos', 'Taller Creado Correctamente!'); 
      }


   }
     public function taller7(Request $request)
     {
      $i = Taller::get()->count();
      $taller7 = new Taller;
      $taller7->nombre = 'Taller '.++$i;
      $taller7->plantilla_id = $request->input('id_plantilla');
      $taller7->id_materia = $request->input('id_materia');
      $taller7->estado = 1;
      $taller7->save();

      if ($taller7 = true) {
         $a = Taller::get()->last();
         $taller_7 = new TallerGusanillo;
         $taller_7->taller_id = $a->id;
         $taller_7->enunciado = $request->input('enunciado');
         $taller_7->save();
         return redirect()->route('admin.create')->with('datos', 'Taller Creado Correctamente!'); 
      }
     }
      public function taller8(Request $request)
      {
            $i = Taller::get()->count();
      $taller8 = new Taller;
      $taller8->nombre = 'Taller '.++$i;
      $taller8->plantilla_id = $request->input('id_plantilla');
      $taller8->id_materia = $request->input('id_materia');
      $taller8->estado = 1;
      $taller8->save();

      if ($taller8 = true) {
          if ($request->hasFile('img')) {
            $imagen = $request->file('img');
            $nombre = time().'_'.$imagen->getClientOriginalName();
            $ruta = public_path().'/img/talleres';
            $imagen->move($ruta, $nombre);
            $urlimagen = '/img/talleres/'.$nombre;
         }
         $a = Taller::get()->last();
         $taller_8 = new TallerCirculo;
         $taller_8->taller_id = $a->id;
         $taller_8->enunciado = $request->input('enunciado');
         $taller_8->img = $urlimagen;
         $taller_8->save();
         return redirect()->route('admin.create')->with('datos', 'Taller Creado Correctamente!'); 
      }
      }
      public function taller9(Request $request)
      {
          $i = Taller::get()->count();
      $taller9 = new Taller;
      $taller9->nombre = 'Taller '.++$i;
      $taller9->plantilla_id = $request->input('id_plantilla');
      $taller9->id_materia = $request->input('id_materia');
      $taller9->estado = 1;
      $taller9->save();
      if ($taller9 = true) {

      }
      $a = Taller::get()->last();
         $taller_9 = new TallerSubrayar;
         $taller_9->taller_id = $a->id;
         $taller_9->enunciado = $request->input('enunciado');

         $taller_9->concepto1 = $request->input('concepto1');
         $taller_9->alternativas1 = $request->input('alternativas1');

         $taller_9->concepto2 = $request->input('concepto2');
         $taller_9->alternativas2 = $request->input('alternativas2');

         $taller_9->concepto3 = $request->input('concepto3');
         $taller_9->alternativas3 = $request->input('alternativas3');

         $taller_9->concepto4 = $request->input('concepto4');
         $taller_9->alternativas4 = $request->input('alternativas4');

         $taller_9->concepto5 = $request->input('concepto5');
         $taller_9->alternativas5 = $request->input('alternativas5');

         $taller_9->concepto6 = $request->input('concepto6');
         $taller_9->alternativas6 = $request->input('alternativas6');

         $taller_9->save();

         return redirect()->route('welcome')->with('datos', 'Taller Creado Correctamente!'); 

      }

}
