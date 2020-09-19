<?php

namespace App\Http\Controllers;

use App\Admin\Taller2Relacionar;
use App\Admin\Taller2RelacionarOpcion;
use App\Admin\TallerCheque;
use App\Admin\TallerChequeEndoso;
use App\Admin\TallerCirculo;
use App\Admin\TallerClasificar;
use App\Admin\TallerCompletar;
use App\Admin\TallerCompletarEnunciado;
use App\Admin\TallerDefinirEnunciado;
use App\Admin\TallerDiferencia;
use App\Admin\TallerGusanillo;
use App\Admin\TallerIdentificarImagen;
use App\Admin\TallerIdentificarPersona;
use App\Admin\TallerRelacionar;
use App\Admin\TallerRelacionarOpcion;
use App\Admin\TallerSenalar;
use App\Admin\TallerSenalarOpcion;
use App\Admin\TallerSubrayar;
use App\Admin\TallerVerdaderoFalso;
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
   	$i = Taller::where('materia_id', $request->input('materia_id'))->count();
   	//return $request->all();
   	$taller1 = new Taller;
   	$taller1->nombre = 'Taller '.++$i;
   	$taller1->plantilla_id = $request->input('id_plantilla');
   	$taller1->materia_id = $request->input('materia_id');
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
   	$i = Taller::where('materia_id', $request->input('materia_id'))->count();
   	//return $request->all();
      $taller2 = new Taller;
   	$taller2->nombre = 'Taller '.++$i;
   	$taller2->plantilla_id = $request->input('id_plantilla');
   	$taller2->materia_id = $request->input('materia_id');
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
   	$i = Taller::where('materia_id', $request->input('materia_id'))->count();
   	//return $request->all();
      $taller3 = new Taller;
   	$taller3->nombre = 'Taller '.++$i;
   	$taller3->plantilla_id = $request->input('id_plantilla');
   	$taller3->materia_id = $request->input('materia_id');
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
      $i = Taller::where('materia_id', $request->input('materia_id'))->count();
      $taller4 = new Taller;
      $taller4->nombre = 'Taller '.++$i;
      $taller4->plantilla_id = $request->input('id_plantilla');
      $taller4->materia_id = $request->input('materia_id');
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
      $i = Taller::where('materia_id', $request->input('materia_id'))->count();
      $taller5 = new Taller;
      $taller5->nombre = 'Taller '.++$i;
      $taller5->plantilla_id = $request->input('id_plantilla');
      $taller5->materia_id = $request->input('materia_id');
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
        $i = Taller::where('materia_id', $request->input('materia_id'))->count();
      $taller6 = new Taller;
      $taller6->nombre = 'Taller '.++$i;
      $taller6->plantilla_id = $request->input('id_plantilla');
      $taller6->materia_id = $request->input('materia_id');
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
      $i = Taller::where('materia_id', $request->input('materia_id'))->count();
      $taller7 = new Taller;
      $taller7->nombre = 'Taller '.++$i;
      $taller7->plantilla_id = $request->input('id_plantilla');
      $taller7->materia_id = $request->input('materia_id');
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
      $taller8->materia_id = $request->input('materia_id');
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
      $i = Taller::where('materia_id', $request->input('materia_id'))->count();
      $taller9 = new Taller;
      $taller9->nombre = 'Taller '.++$i;
      $taller9->plantilla_id = $request->input('id_plantilla');
      $taller9->materia_id = $request->input('materia_id');
      $taller9->estado = 1;
      $taller9->save();
      if ($taller9 = true) {
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

         return redirect()->route('admin.create')->with('datos', 'Taller Creado Correctamente!'); 
      }
      

      }
      public function taller10(Request $request)
      {
if ($request->input('id_plantilla') == 10 ) {
         $i = Taller::where('materia_id', $request->input('materia_id'))->count();
         $taller10 = new Taller;
         $taller10->nombre = 'Taller '.++$i;
         $taller10->plantilla_id = $request->input('id_plantilla');
         $taller10->materia_id = $request->input('materia_id');
         $taller10->estado = 1;
         $taller10->save();

         if ($taller10 = true) {
             $a = Taller::get()->last();
         $taller_10 = new TallerRelacionar;
         $taller_10->taller_id = $a->id;
         $taller_10->enunciado = $request->input('enunciado');
         $taller_10->save();

         $o = TallerRelacionar::get()->last();
         $q= 0;

         $opcion1 = new TallerRelacionarOpcion;
         $opcion1->taller_relacionar_id = $o->id;
         $opcion1->orden = ++$q;
         $opcion1->enunciado = $request->input('enunciado1');
         $opcion1->definicion = $request->input('definicion1');
         if ($request->hasFile('img1')) {
            $imagen1 = $request->file('img1');
            $nombre1 = time().'_'.$imagen1->getClientOriginalName();
            $ruta1 = public_path().'/img/talleres';
            $imagen1->move($ruta1, $nombre1);
            $urlimagen1 = '/img/talleres/'.$nombre1;
            $opcion1->img = $urlimagen1;
         }
            $opcion1->save();


         $opcion2 = new TallerRelacionarOpcion;
         $opcion2->taller_relacionar_id = $o->id;
         $opcion2->orden = ++$q;
         $opcion2->enunciado = $request->input('enunciado2');
         $opcion2->definicion = $request->input('definicion2');
         if($request->hasFile('img2')) {
            $imagen2 = $request->file('img2');
            $nombre2 = time().'_'.$imagen2->getClientOriginalName();
            $ruta2 = public_path().'/img/talleres';
            $imagen2->move($ruta2, $nombre2);
            $urlimagen2 = '/img/talleres/'.$nombre2;
            $opcion2->img = $urlimagen2;
         }
         $opcion2->save();


        
         $opcion3 = new TallerRelacionarOpcion;
         $opcion3->taller_relacionar_id = $o->id;
         $opcion3->orden = ++$q;
         $opcion3->enunciado = $request->input('enunciado3');
         $opcion3->definicion = $request->input('definicion3');
          if($request->hasFile('img3')) {
            $imagen3 = $request->file('img3');
            $nombre3 = time().'_'.$imagen3->getClientOriginalName();
            $ruta3 = public_path().'/img/talleres';
            $imagen3->move($ruta3, $nombre3);
            $urlimagen3 = '/img/talleres/'.$nombre3;
            $opcion3->img = $urlimagen3;

         }
            $opcion3->save();
      
         $opcion4 = new TallerRelacionarOpcion;
         $opcion4->taller_relacionar_id = $o->id;
         $opcion4->orden = ++$q;
         $opcion4->enunciado = $request->input('enunciado4');
         $opcion4->definicion = $request->input('definicion4');
         if($request->hasFile('img4')) {
            $imagen4 = $request->file('img4');
            $nombre4 = time().'_'.$imagen4->getClientOriginalName();
            $ruta4 = public_path().'/img/talleres';
            $imagen4->move($ruta4, $nombre4);
            $urlimagen4 = '/img/talleres/'.$nombre4;
            $opcion4->img = $urlimagen4;
         }
            $opcion4->save();


     
         $opcion5 = new TallerRelacionarOpcion;
         $opcion5->taller_relacionar_id = $o->id;
         $opcion5->orden = ++$q;
         $opcion5->enunciado = $request->input('enunciado5');
         $opcion5->definicion = $request->input('definicion5');
          if($request->hasFile('img5')) {
            $imagen5 = $request->file('img5');
            $nombre5 = time().'_'.$imagen5->getClientOriginalName();
            $ruta5 = public_path().'/img/talleres';
            $imagen5->move($ruta5, $nombre5);
            $urlimagen5 = '/img/talleres/'.$nombre5;
            $opcion5->img = $urlimagen5;

         }
            $opcion5->save();

     
         $opcion6 = new TallerRelacionarOpcion;
         $opcion6->taller_relacionar_id = $o->id;
         $opcion6->orden = ++$q;
         $opcion6->enunciado = $request->input('enunciado6');
         $opcion6->definicion = $request->input('definicion6');
          if($request->hasFile('img6')) {
            $imagen6 = $request->file('img6');
            $nombre6 = time().'_'.$imagen6->getClientOriginalName();
            $ruta6 = public_path().'/img/talleres';
            $imagen6->move($ruta6, $nombre6);
            $urlimagen6 = '/img/talleres/'.$nombre6;
            $opcion6->img = $urlimagen6;
         }
            $opcion6->save(); 
      
         }

}elseif($request->input('id_plantilla') == 11 ) {
         $i = Taller::where('materia_id', $request->input('materia_id'))->count();
         $taller11 = new Taller;
         $taller11->nombre = 'Taller '.++$i;
         $taller11->plantilla_id = $request->input('id_plantilla');
         $taller11->materia_id = $request->input('materia_id');
         $taller11->estado = 1;
         $taller11->save();

      if ($taller11 = true) {

            $a = Taller::get()->last();
            $taller_11 = new Taller2Relacionar;
            $taller_11->taller_id = $a->id;
            $taller_11->enunciado = $request->input('enunciado');
            $taller_11->enunciado1 = $request->input('enunciado1');

             if($request->hasFile('img1')) {
            $imagen1 = $request->file('img1');
            $nombre1 = time().'_'.$imagen1->getClientOriginalName();
            $ruta1 = public_path().'/img/talleres';
            $imagen1->move($ruta1, $nombre1);
            $urlimagen1 = '/img/talleres/'.$nombre1;
         }
            $taller_11->img1 = $urlimagen1;
            $taller_11->enunciado2 = $request->input('enunciado2');
               if($request->hasFile('img2')) {
            $imagen2 = $request->file('img2');
            $nombre2 = time().'_'.$imagen2->getClientOriginalName();
            $ruta2 = public_path().'/img/talleres';
            $imagen2->move($ruta2, $nombre2);
            $urlimagen2 = '/img/talleres/'.$nombre2;
         }
            $taller_11->img2 = $urlimagen2;
            $taller_11->save();

         if ($taller_11 = true) {
            $o = Taller2Relacionar::get()->last();
            $q = 0;
               $opcion_1 = new Taller2RelacionarOpcion;
               $opcion_1->taller2_relacionar_id = $o->id;
               $opcion_1->orden = ++$q;
               $opcion_1->definicion = $request->input('definicion1');
               $opcion_1->save();

               $opcion_2 = new Taller2RelacionarOpcion;
               $opcion_2->taller2_relacionar_id = $o->id;
               $opcion_2->orden = ++$q;
               $opcion_2->definicion = $request->input('definicion2');
               $opcion_2->save();

               $opcion_3 = new Taller2RelacionarOpcion;
               $opcion_3->taller2_relacionar_id = $o->id;
               $opcion_3->orden = ++$q;
               $opcion_3->definicion = $request->input('definicion3');
               $opcion_3->save();

               $opcion_4 = new Taller2RelacionarOpcion;
               $opcion_4->taller2_relacionar_id = $o->id;
               $opcion_4->orden = ++$q;
               $opcion_4->definicion = $request->input('definicion4');
               $opcion_4->save();

               $opcion_5 = new Taller2RelacionarOpcion;
               $opcion_5->taller2_relacionar_id = $o->id;
               $opcion_5->orden = ++$q;
               $opcion_5->definicion = $request->input('definicion5');
               $opcion_5->save();

               $opcion_6 = new Taller2RelacionarOpcion;
               $opcion_6->taller2_relacionar_id = $o->id;
               $opcion_6->orden = ++$q;
               $opcion_6->definicion = $request->input('definicion6');
               $opcion_6->save();
return redirect()->route('admin.create')->with('datos', 'Taller Creado Correctamente!'); 
      
}
         }
}
      }
       public function taller12(Request $request)
      {
         $i = Taller::where('materia_id', $request->input('materia_id'))->count();
         $taller12 = new Taller;
         $taller12->nombre = 'Taller '.++$i;
         $taller12->plantilla_id = $request->input('id_plantilla');
         $taller12->materia_id = $request->input('materia_id');
         $taller12->estado = 1;
         $taller12->save();

           if ($taller12 = true) {
            $a = Taller::get()->last();
            $taller_12 = new TallerVerdaderoFalso;
            $taller_12->taller_id = $a->id;
            $taller_12->enunciado = $request->input('enunciado');
            $taller_12->enunciado1 = $request->input('descripcion1');
            $taller_12->enunciado2 = $request->input('descripcion2');
            $taller_12->enunciado3 = $request->input('descripcion3');
            $taller_12->enunciado4 = $request->input('descripcion4');
            $taller_12->enunciado5 = $request->input('descripcion5');
            $taller_12->save();
           }
      return redirect()->route('admin.create')->with('datos', 'Taller Creado Correctamente!'); 

      }
      public function taller13(Request $request)
      {
          $i = Taller::where('materia_id', $request->input('materia_id'))->count();
         $taller13 = new Taller;
         $taller13->nombre = 'Taller '.++$i;
         $taller13->plantilla_id = $request->input('id_plantilla');
         $taller13->materia_id = $request->input('materia_id');
         $taller13->estado = 1;
         $taller13->save();

           if ($taller13 = true) {
            $a = Taller::get()->last();
            $taller_13 = new TallerDefinirEnunciado;
            $taller_13->taller_id = $a->id;
            $taller_13->enunciado = $request->input('enunciado');
            $taller_13->concepto1 = $request->input('concepto1');
            $taller_13->concepto2 = $request->input('concepto2');
            $taller_13->concepto3 = $request->input('concepto3');
            $taller_13->concepto4 = $request->input('concepto4');
            $taller_13->save();
               return redirect()->route('admin.create')->with('datos', 'Taller Creado Correctamente!'); 
         }
      }
       public function taller14(Request $request)
      {
           $i = Taller::where('materia_id', $request->input('materia_id'))->count();
         $taller14 = new Taller;
         $taller14->nombre = 'Taller '.++$i;
         $taller14->plantilla_id = $request->input('id_plantilla');
         $taller14->materia_id = $request->input('materia_id');
         $taller14->estado = 1;
         $taller14->save();

           if ($taller14 = true) {
            $a = Taller::get()->last();

            $taller_14 = new TallerIdentificarPersona;
            $taller_14->taller_id = $a->id;
            $taller_14->enunciado = $request->input('enunciado');
            $taller_14->descripcion = $request->input('descripcion');
            $taller_14->save();
      return redirect()->route('admin.create')->with('datos', 'Taller Creado Correctamente!'); 

           }
      }
      public function taller15(Request $request)
      {
         $i = Taller::where('materia_id', $request->input('materia_id'))->count();
         $taller15 = new Taller;
         $taller15->nombre = 'Taller '.++$i;
         $taller15->plantilla_id = $request->input('id_plantilla');
         $taller15->materia_id = $request->input('materia_id');
         $taller15->estado = 1;
         $taller15->save();

           if ($taller15 = true) {
            $a = Taller::get()->last();

            $taller_15 = new TallerCheque;
            $taller_15->taller_id = $a->id;
            $taller_15->enunciado = $request->input('enunciado');
            $taller_15->girador = $request->input('girador');
            $taller_15->girado = $request->input('girado');
            $taller_15->cantidad = $request->input('cantidad');
            $taller_15->lugar = $request->input('lugar');
            $taller_15->fecha = $request->input('fecha');
            $taller_15->save();
      return redirect()->route('admin.create')->with('datos', 'Taller Creado Correctamente!'); 
      }
   }
   public function taller16(Request $request)
      {
         $i = Taller::where('materia_id', $request->input('materia_id'))->count();
         $taller16 = new Taller;
         $taller16->nombre = 'Taller '.++$i;
         $taller16->plantilla_id = $request->input('id_plantilla');
         $taller16->materia_id = $request->input('materia_id');
         $taller16->estado = 1;
         $taller16->save();

           if ($taller16 = true) {
            $a = Taller::get()->last();

            $taller_16 = new TallerChequeEndoso;
            $taller_16->taller_id = $a->id;
            $taller_16->enunciado = $request->input('enunciado');
            $taller_16->endoso = $request->input('endoso');
            $taller_16->save();
      return redirect()->route('admin.create')->with('datos', 'Taller Creado Correctamente!'); 
      }
      }
}
