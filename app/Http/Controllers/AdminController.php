<?php

namespace App\Http\Controllers;

use App\Admin\Taller2Relacionar;
use App\Admin\Taller2RelacionarOpcion;
use App\Admin\TallerAbreviatura;
use App\Admin\TallerAbreviaturaImg;
use App\Admin\TallerCertificadoDeposito;
use App\Admin\TallerCheque;
use App\Admin\TallerChequeEndoso;
use App\Admin\TallerCirculo;
use App\Admin\TallerClasificar;
use App\Admin\TallerCollage;
use App\Admin\TallerCompletar;
use App\Admin\TallerCompletarEnunciado;
use App\Admin\TallerConvertirCheque;
use App\Admin\TallerDefinirEnunciado;
use App\Admin\TallerDiferencia;
use App\Admin\TallerFactura;
use App\Admin\TallerFacturaDato;
use App\Admin\TallerGusanillo;
use App\Admin\TallerIdentificarImagen;
use App\Admin\TallerIdentificarPersona;
use App\Admin\TallerLetraCambio;
use App\Admin\TallerNotaPedido;
use App\Admin\TallerNotaVenta;
use App\Admin\TallerNotaVentaDato;
use App\Admin\TallerOrdenPago;
use App\Admin\TallerPagare;
use App\Admin\TallerRecibo;
use App\Admin\TallerRelacionar;
use App\Admin\TallerRelacionarOpcion;
use App\Admin\TallerSenalar;
use App\Admin\TallerSenalarOpcion;
use App\Admin\TallerSubrayar;
use App\Admin\TallerValeCaja;
use App\Admin\TallerVerdaderoFalso;
use App\Http\Controllers\Controller;
use App\Plantilla;
use App\Taller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function admin()
   {
         $g = 0;
   	  return view('admin.admin', compact('g'));
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
      $a = Taller::get()->last();

         $taller_1 = new TallerCompletar;
         $taller_1->taller_id = $a->id;
         $taller_1->enunciado = $request->input('enunciado');
         $taller_1->leyenda = $request->input('leyenda');
   		if ($request->hasFile('imagen')) {
   			$imagen = $request->file('imagen');
   			$nombre = time().'_'.$imagen->getClientOriginalName();
   			$ruta = public_path().'/img/talleres';
   			$imagen->move($ruta, $nombre);
   			$urlimagen = '/img/talleres/'.$nombre;
            $taller_1->img = $urlimagen;
   	   		}
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
      $a = Taller::get()->last();
   		$taller_2 = new TallerClasificar;
   		$taller_2->taller_id = $a->id;
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
      $a = Taller::get()->last();

   		$taller_3 = new TallerCompletarEnunciado;
   		$taller_3->taller_id = $a->id;
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
         $a = Taller::get()->last();
         $taller_4 = new TallerDiferencia;
         $taller_4->taller_id = $a->id;
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
         $b = Taller::get()->last();
         $taller_5 = new TallerSenalar;
         $taller_5->taller_id = $b->id;
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
return redirect()->route('admin.create')->with('datos', 'Taller Creado Correctamente!'); 

      
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
       public function taller17(Request $request)
      {
         $i = Taller::where('materia_id', $request->input('materia_id'))->count();
         $taller17 = new Taller;
         $taller17->nombre = 'Taller '.++$i;
         $taller17->plantilla_id = $request->input('id_plantilla');
         $taller17->materia_id = $request->input('materia_id');
         $taller17->estado = 1;
         $taller17->save();

           if ($taller17 = true) {
            $a = Taller::get()->last();

            $taller_17 = new TallerConvertirCheque;
            $taller_17->taller_id = $a->id;
            $taller_17->enunciado = $request->input('enunciado');
            $taller_17->nombre = $request->input('nombre');
            $taller_17->cantidad = $request->input('cantidad');
            $taller_17->numero = $request->input('numero');
            $taller_17->lugar = $request->input('lugar');
            $taller_17->fecha = $request->input('fecha');
            $taller_17->save();
      return redirect()->route('admin.create')->with('datos', 'Taller Creado Correctamente!'); 
      }
      }

      public function taller18(Request $request)
      {
         $i = Taller::where('materia_id', $request->input('materia_id'))->count();
         $taller18 = new Taller;
         $taller18->nombre = 'Taller '.++$i;
         $taller18->plantilla_id = $request->input('id_plantilla');
         $taller18->materia_id = $request->input('materia_id');
         $taller18->estado = 1;
         $taller18->save();

           if ($taller18 = true) {
            $a = Taller::get()->last();
            $taller_18 = new TallerLetraCambio;
            $taller_18->taller_id = $a->id;
            $taller_18->enunciado = $request->input('enunciado');
            $taller_18->valor = $request->input('valor');
            $taller_18->acreedor = $request->input('acreedor');
            $taller_18->deudor = $request->input('deudor');
            $taller_18->tasa_de_interes = $request->input('tasa_de_interes');
            $taller_18->fecha_de_vencimiento = $request->input('fecha_de_vencimiento');
            $taller_18->lugar = $request->input('lugar');
            $taller_18->fecha_de_emision = $request->input('fecha_de_emision');
            $taller_18->save();
      return redirect()->route('admin.create')->with('datos', 'Taller Creado Correctamente!'); 
      }
      }


      public function taller19(Request $request)
      {
         $i = Taller::where('materia_id', $request->input('materia_id'))->count();
         $taller19 = new Taller;
         $taller19->nombre = 'Taller '.++$i;
         $taller19->plantilla_id = $request->input('id_plantilla');
         $taller19->materia_id = $request->input('materia_id');
         $taller19->estado = 1;
         $taller19->save();

           if ($taller19 = true) {
            $a = Taller::get()->last();
            $taller_19 = new TallerCertificadoDeposito;
            $taller_19->taller_id = $a->id;
            $taller_19->enunciado = $request->input('enunciado');
            $taller_19->valor = $request->input('valor');
            $taller_19->beneficiario = $request->input('beneficiario');
            $taller_19->interes_anual = $request->input('interes_anual');
            $taller_19->lugar = $request->input('lugar');
            $taller_19->fecha_de_emision = $request->input('fecha_de_emision');
            $taller_19->plazo_de_vencimiento = $request->input('plazo_de_vencimiento');
            $taller_19->fecha_de_vencimiento = $request->input('fecha_de_vencimiento');
            $taller_19->save();
      return redirect()->route('admin.create')->with('datos', 'Taller Creado Correctamente!'); 
      }
      }

        public function taller20(Request $request)
      {
         $i = Taller::where('materia_id', $request->input('materia_id'))->count();
         $taller20 = new Taller;
         $taller20->nombre = 'Taller '.++$i;
         $taller20->plantilla_id = $request->input('id_plantilla');
         $taller20->materia_id = $request->input('materia_id');
         $taller20->estado = 1;
         $taller20->save();

           if ($taller20 = true) {
            $a                               = Taller::get()->last();
            $taller_20                       = new TallerPagare;
            $taller_20->taller_id            = $a->id;
            $taller_20->enunciado            = $request->input('enunciado');
            $taller_20->beneficiario         = $request->input('beneficiario');
            $taller_20->deudor               = $request->input('deudor');
            $taller_20->garante              = $request->input('garante');
            $taller_20->valor                = $request->input('valor');
            $taller_20->plazo_pago           = $request->input('plazo_pago');
            $taller_20->tasa_interes         = $request->input('tasa_interes');
            $taller_20->lugar                = $request->input('lugar');
            $taller_20->fecha_emision        = $request->input('fecha_emision');
            $taller_20->fecha_de_vencimiento = $request->input('fecha_de_vencimiento');
            $taller_20->save();
      return redirect()->route('admin.create')->with('datos', 'Taller Creado Correctamente!'); 
      }
      }

       public function taller21(Request $request)
      {
         $i = Taller::where('materia_id', $request->input('materia_id'))->count();
         $taller21 = new Taller;
         $taller21->nombre = 'Taller '.++$i;
         $taller21->plantilla_id = $request->input('id_plantilla');
         $taller21->materia_id = $request->input('materia_id');
         $taller21->estado = 1;
         $taller21->save();

           if ($taller21 = true) {
            $a                               = Taller::get()->last();
            $taller_21                       = new TallerValeCaja;
            $taller_21->taller_id            = $a->id;
            $taller_21->enunciado            = $request->input('enunciado');
            $taller_21->valor                = $request->input('valor');
            $taller_21->deudor               = $request->input('deudor');
            $taller_21->detalle              = $request->input('detalle');
            $taller_21->lugar                = $request->input('lugar');
            $taller_21->fecha                = $request->input('fecha');
            $taller_21->save();
      return redirect()->route('admin.create')->with('datos', 'Taller Creado Correctamente!'); 
      }
      }

        public function taller22(Request $request)
      {
         $i = Taller::where('materia_id', $request->input('materia_id'))->count();
         $taller22 = new Taller;
         $taller22->nombre = 'Taller '.++$i;
         $taller22->plantilla_id = $request->input('id_plantilla');
         $taller22->materia_id = $request->input('materia_id');
         $taller22->estado = 1;
         $taller22->save();

           if ($taller22 = true) {
            $a                               = Taller::get()->last();
            $taller_22                       = new TallerNotaPedido;
            $taller_22->taller_id            = $a->id;
            $taller_22->enunciado            = $request->input('enunciado');
            $taller_22->pedido               = $request->input('pedido');
            $taller_22->cantidad             = $request->input('cantidad');
            $taller_22->codigo               = $request->input('codigo');
            $taller_22->detalle              = $request->input('detalle');
            $taller_22->lugar                = $request->input('lugar');
            $taller_22->fecha                = $request->input('fecha');
            $taller_22->firma                = $request->input('firma');
            $taller_22->plazo_entrega        = $request->input('plazo_entrega');

            $taller_22->save();
      return redirect()->route('admin.create')->with('datos', 'Taller Creado Correctamente!'); 
      }
      }
       public function taller23(Request $request)
      {
         $i = Taller::where('materia_id', $request->input('materia_id'))->count();
         $taller23 = new Taller;
         $taller23->nombre = 'Taller '.++$i;
         $taller23->plantilla_id = $request->input('id_plantilla');
         $taller23->materia_id = $request->input('materia_id');
         $taller23->estado = 1;
         $taller23->save();

           if ($taller23 = true) {
            $a                               = Taller::get()->last();
            $taller_23                       = new TallerRecibo;
            $taller_23->taller_id            = $a->id;
            $taller_23->enunciado            = $request->input('enunciado');
            $taller_23->valor               = $request->input('valor');
            $taller_23->acreedor               = $request->input('acreedor');
            $taller_23->deudor             = $request->input('deudor');
            $taller_23->descripcion               = $request->input('descripcion');
            $taller_23->direccion              = $request->input('direccion');
            $taller_23->lugar                = $request->input('lugar');
            $taller_23->fecha                = $request->input('fecha');
            $taller_23->save();
      return redirect()->route('admin.create')->with('datos', 'Taller Creado Correctamente!'); 
      }
      }

       public function taller24(Request $request)
      {
         $i = Taller::where('materia_id', $request->input('materia_id'))->count();
         $taller24 = new Taller;
         $taller24->nombre = 'Taller '.++$i;
         $taller24->plantilla_id = $request->input('id_plantilla');
         $taller24->materia_id = $request->input('materia_id');
         $taller24->estado = 1;
         $taller24->save();

           if ($taller24 = true) {
            $a                               = Taller::get()->last();
            $taller_24                       = new TallerOrdenPago;
            $taller_24->taller_id            = $a->id;
            $taller_24->enunciado            = $request->input('enunciado');
            $taller_24->beneficiario               = $request->input('beneficiario');
            $taller_24->comprobante               = $request->input('comprobante');
            $taller_24->cantidad             = $request->input('cantidad');
            $taller_24->firmas               = $request->input('firmas');
            $taller_24->lugar                = $request->input('lugar');
            $taller_24->fecha                = $request->input('fecha');
            $taller_24->save();
      return redirect()->route('admin.create')->with('datos', 'Taller Creado Correctamente!'); 
      }
      }
        public function taller25(Request $request)
      {
         $i = Taller::where('materia_id', $request->input('materia_id'))->count();
         $taller25 = new Taller;
         $taller25->nombre = 'Taller '.++$i;
         $taller25->plantilla_id = $request->input('id_plantilla');
         $taller25->materia_id = $request->input('materia_id');
         $taller25->estado = 1;
         $taller25->save();

           if ($taller25 = true) {
            $a                               = Taller::get()->last();
            $taller_25                       = new TallerFactura;
            $taller_25->taller_id            = $a->id;
            $taller_25->enunciado            = $request->input('enunciado');
            $taller_25->cliente              = $request->input('cliente');
            $taller_25->ruc                  = $request->input('ruc');
            $taller_25->iva                  = $request->input('iva');
            $taller_25->descuento            = $request->input('descuento');
            $taller_25->remision             = $request->input('remision');
            $taller_25->fecha_emision        = $request->input('fecha_emision');
            $taller_25->save();

             if ($taller_25 = true) {
               $o = TallerFactura::get()->last();              
               foreach ($request->cant as $key=>$v) {
                  $datos=array(
                     'taller_factura_id'=> $o->id,
                     'cod_auxiliar'=> $request->cod_aux[$key],
                     'cantidad'=> $request->cant[$key],
                     'descripcion'=> $request->desc[$key],
                     'precio' => $request->precio[$key],
                     'created_at'=> now(),
                     'updated_at'=> now(),
                  );
                  TallerFacturaDato::insert($datos);
               }
             }

      return redirect()->route('admin.create')->with('datos', 'Taller Creado Correctamente!'); 
      }
      }

       public function taller26(Request $request)
      {
         $i = Taller::where('materia_id', $request->input('materia_id'))->count();
         $taller26 = new Taller;
         $taller26->nombre = 'Taller '.++$i;
         $taller26->plantilla_id = $request->input('id_plantilla');
         $taller26->materia_id = $request->input('materia_id');
         $taller26->estado = 1;
         $taller26->save();

           if ($taller26 = true) {
            $a                               = Taller::get()->last();
            $taller_26                       = new TallerNotaVenta;
            $taller_26->taller_id            = $a->id;
            $taller_26->enunciado            = $request->input('enunciado');
            $taller_26->nombre               = $request->input('nombre');
            $taller_26->ruc                  = $request->input('ruc');
            $taller_26->fecha                = $request->input('fecha');
            $taller_26->save();

             if ($taller_26 = true) {
               $o = TallerNotaVenta::get()->last();              
               foreach ($request->cant as $key=>$v) {
                  $datos=array(
                     'taller_nota_venta_id'=> $o->id,
                     'cantidad'=> $request->cant[$key],
                     'descripcion'=> $request->desc[$key],
                     'precio' => $request->precio[$key],
                     'created_at'=> now(),
                     'updated_at'=> now(),
                  );
                  TallerNotaVentaDato::insert($datos);
               }
             }

      return redirect()->route('admin.create')->with('datos', 'Taller Creado Correctamente!'); 
      }
      }
         public function taller27(Request $request)
      {
           $i = Taller::where('materia_id', $request->input('materia_id'))->count();
         $taller27 = new Taller;
         $taller27->nombre = 'Taller '.++$i;
         $taller27->plantilla_id = $request->input('id_plantilla');
         $taller27->materia_id = $request->input('materia_id');
         $taller27->estado = 1;
         $taller27->save();
      if ($taller27 = true) {
           
            $a                     = Taller::get()->last();
            $taller_27             = new TallerAbreviatura;
            $taller_27->taller_id  = $a->id;
            $taller_27->enunciado  = $request->input('enunciado');
            $taller_27->save();


      if ($taller_27 = true) {
         $o = TallerAbreviatura::get()->last(); 
         $urlimagen1 = [];
         $urlimagen2 = [];
         $files_a = $request->file('col_a');
         $files_b = $request->file('col_b');
 
         foreach ($files_a as $file_a) {
            $nombre = time().'_'.$file_a->getClientOriginalName();
            $ruta = public_path().'/img/talleres';
            $file_a->move($ruta, $nombre);

            $urlimagen1[]= '/img/talleres/'.$nombre;           
         }
         foreach ($files_b as $file_b) {
            $nombre = time().'_'.$file_b->getClientOriginalName();
            $ruta = public_path().'/img/talleres';
            $file_b->move($ruta, $nombre);

            $urlimagen2[]= '/img/talleres/'.$nombre;           
         }
            foreach ($urlimagen1 as  $key=>$v) {
                  $datos=array(
                     'taller_abreviatura_id' => $o->id,
                     'col_a' => $urlimagen1[$key],
                     'col_b'=> $urlimagen2[$key],
                     'created_at'=> now(),
                     'updated_at'=> now(),
                  );
                  TallerAbreviaturaImg::insert($datos);
               }
      return redirect()->route('admin.create')->with('datos', 'Taller Creado Correctamente!');  
}

}
}

   public function taller34(Request $request)
      {
          $i = Taller::where('materia_id', $request->input('materia_id'))->count();
         $taller34 = new Taller;
         $taller34->nombre = 'Taller '.++$i;
         $taller34->plantilla_id = $request->input('id_plantilla');
         $taller34->materia_id = $request->input('materia_id');
         $taller34->estado = 1;
         $taller34->save();
          if ($taller34 = true) {
            $a                               = Taller::get()->last();
            $taller_34                       = new TallerCollage;
            $taller_34->taller_id            = $a->id;
            $taller_34->enunciado            = $request->input('enunciado');
            $taller_34->save();
         }
      return redirect()->route('admin.create')->with('datos', 'Taller Creado Correctamente!');  
         

      }


}
