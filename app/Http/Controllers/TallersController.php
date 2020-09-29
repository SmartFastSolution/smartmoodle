<?php

namespace App\Http\Controllers;

use App\Admin\TallerAbreviatura;
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
use App\Admin\TallerGusanillo;
use App\Admin\TallerIdentificarImagen;
use App\Admin\TallerIdentificarPersona;
use App\Admin\TallerLetraCambio;
use App\Admin\TallerNotaPedido;
use App\Admin\TallerNotaVenta;
use App\Admin\TallerPagare;
use App\Admin\TallerRecibo;
use App\Admin\TallerRelacionar;
use App\Admin\TallerSenalar;
use App\Admin\TallerSenalarOpcion;
use App\Admin\TallerSubrayar;
use App\Admin\TallerValeCaja;
use App\Admin\TallerVerdaderoFalso;
use App\Http\Controllers\Controller;
use App\Taller;
use App\TallerAbreviaturaDatoRe;
use App\TallerAbreviaturaRe;
use App\TallerCertificadoDepositoRe;
use App\TallerChequeEndosoRe;
use App\TallerChequeRe;
use App\TallerCirEjemploRe;
use App\TallerCirculoRe;
use App\TallerClasificarRes;
use App\TallerCollageRe;
use App\TallerCompletarRes;
use App\TallerCompleteEnRes;
use App\TallerConvertirChequeRe;
use App\TallerDefinirEnunciadoRe;
use App\TallerDiferenciaRes;
use App\TallerFacturaDatosRe;
use App\TallerFacturaRe;
use App\TallerGusanilloRe;
use App\TallerIdentificarImagenRe;
use App\TallerIdentificarPersonaRe;
use App\TallerLetraCambioRe;
use App\TallerNotaPedidoRe;
use App\TallerNotaVentaDatosRe;
use App\TallerNotaVentaRe;
use App\TallerOrdenPagoRe;
use App\TallerPagareRe;
use App\TallerReciboRe;
use App\TallerSubrayarRe;
use App\TallerValeCajaRe;
use App\TallerVerdaderoFalsoRe;
use Illuminate\Http\Request;

class TallersController extends Controller
{
    public function taller($plant, $id){
        $d = $id;
        if ($plant == 1) {
            $consul = Taller::findorfail($id);    
            $datos = TallerCompletar::where('taller_id', $consul->id)->firstOrfail();
            return view('talleres.taller1', compact('datos', 'd'));
         
        }elseif ($plant == 2) {
            $consul = Taller::findorfail($id);
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrfail();
            return view('talleres.taller2', compact('datos', 'd'));

        }elseif ($plant == 3) {
            $consul = Taller::findorfail($id);
             $datos = TallerCompletarEnunciado::where('taller_id', $consul->id)->firstOrfail();
            return view('talleres.taller3', compact('datos', 'd'));


        }elseif ($plant == 4) {
            $consul = Taller::findorfail($id);
             $datos = TallerDiferencia::where('taller_id', $consul->id)->firstOrfail();
            return view('talleres.taller4', compact('datos', 'd'));



        }elseif ($plant == 5) {
            $consul = Taller::findorfail($id);
             $datos = TallerSenalar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller5', compact('datos', 'd' ));


        }elseif ($plant == 6) {
            $i= 0;
            $consul = Taller::findorfail($id);
             $datos = TallerIdentificarImagen::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller6', compact('datos', 'd', 'i'));

        }elseif ($plant == 7) {

            $consul = Taller::findorfail($id);
             $datos = TallerGusanillo::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller7', compact('datos', 'd'));

        }elseif ($plant == 8) {
            $consul = Taller::findorfail($id);
             $datos = TallerCirculo::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller8', compact('datos', 'd'));


        }elseif ($plant == 9) {
            $consul = Taller::findorfail($id);
             $datos = TallerSubrayar::where('taller_id', $consul->id)->firstOrFail(); 

            return view('talleres.taller9', compact('datos', 'd'));

        }elseif ($plant == 10) {
            $d= 0;
            $i= 0;

            $consul = Taller::findorfail($id);
             $datos = TallerRelacionar::where('taller_id', $consul->id)->firstOrfail();
            return view('talleres.taller10', compact('datos', 'd', 'i'));


        }elseif ($plant == 11) {
              $d= 0;
            $i= 0;
            $consul = Taller::findorfail($id);
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller11', compact('datos', 'd'));


        }elseif ($plant == 12) {

            $consul = Taller::findorfail($id);
            return view('talleres.taller12', compact('datos', 'd'));
        }elseif ($plant == 13) {
            $consul = Taller::findorfail($id);
            return view('talleres.taller13', compact('datos', 'd'));

        }elseif ($plant == 14) {
            $consul = Taller::findorfail($id);
            return view('talleres.taller14', compact('datos', 'd'));

        }elseif ($plant == 15) {
            $consul = Taller::findorfail($id);
             $datos = TallerCheque::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller15', compact('datos', 'd'));

        }elseif ($plant == 16) {
            $consul = Taller::findorfail($id);
            return view('talleres.taller16', compact('datos', 'd'));
        }elseif ($plant == 17) {
            $consul = Taller::findorfail($id);
             $datos = TallerConvertirCheque::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller17', compact('datos', 'd'));

        }elseif ($plant == 18) {

            $consul = Taller::findorfail($id);
            $datos = TallerLetraCambio::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller18', compact('datos', 'd'));
        }elseif ($plant == 19) {
            $consul = Taller::findorfail($id);

             $datos = TallerCertificadoDeposito::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller19', compact('datos', 'd'));

        }elseif ($plant == 20) {

            $consul = Taller::findorfail($id);
            return view('talleres.taller20', compact('datos', 'd'));
        }elseif ($plant == 21) {

            $consul = Taller::findorfail($id);
             $datos = TallerValeCaja::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller21', compact('datos', 'd'));


        }elseif ($plant == 22) {
            $consul = Taller::findorfail($id);
             $datos = TallerNotaPedido::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller22', compact('datos', 'd'));


        }elseif ($plant == 23) {
            $consul = Taller::findorfail($id);
             $datos = TallerRecibo::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller23', compact('datos', 'd'));

        }elseif ($plant == 24) {

            $consul = Taller::findorfail($id);
        }elseif ($plant == 25) {
            $i= 0;
            $consul = Taller::findorfail($id);
             $datos = TallerFactura::where('taller_id', $consul->id)->firstOrfail();
            return view('talleres.taller25', compact('datos', 'd', 'i'));

        }elseif ($plant == 26) {
             $i= 0;
            $consul = Taller::findorfail($id);
             $datos = TallerNotaVenta::where('taller_id', $consul->id)->firstOrfail();
            return view('talleres.taller26', compact('datos', 'd', 'i'));

        }elseif ($plant == 27) {

            $consul = Taller::findorfail($id);
             $datos = TallerAbreviatura::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller27', compact('datos', 'd'));

        }elseif ($plant == 85) {
            $consul = Taller::findorfail($id);
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller28', compact('datos', 'd'));
        }elseif ($plant == 29) {
            $consul = Taller::findorfail($id);
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller29', compact('datos', 'd'));
        }elseif ($plant == 30) {
            $consul = Taller::findorfail($id);
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller30', compact('datos', 'd'));
        }elseif ($plant == 31) {
            $consul = Taller::findorfail($id);
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller31', compact('datos', 'd'));
        }elseif ($plant == 32) {
            $consul = Taller::findorfail($id);
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller32', compact('datos', 'd'));
        }elseif ($plant == 33) {
            $consul = Taller::findorfail($id);
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller33', compact('datos', 'd'));
        }elseif ($plant == 34) {

            $consul = Taller::findorfail($id);
             $datos = TallerCollage::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller34', compact('datos', 'd'));


        }elseif ($plant == 35) {
            $consul = Taller::findorfail($id);
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller35', compact('datos', 'd'));
        }elseif ($plant == 36) {
            $consul = Taller::findorfail($id);
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller36', compact('datos', 'd'));
        }elseif ($plant == 37) {
            $consul = Taller::findorfail($id);
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller37', compact('datos', 'd'));
        }elseif ($plant == 38) {
            $consul = Taller::findorfail($id);
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller38', compact('datos', 'd'));
        }elseif ($plant == 39) {
            $consul = Taller::findorfail($id);
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller39', compact('datos', 'd'));
        }elseif ($plant == 40) {
            $consul = Taller::findorfail($id);
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller40', compact('datos', 'd'));
        }elseif ($plant == 41) {
            $consul = Taller::findorfail($id);
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller41', compact('datos', 'd'));
        }elseif ($plant == 42) {
            $consul = Taller::findorfail($id);
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller42', compact('datos', 'd'));
        }elseif ($plant == 43) {
            $consul = Taller::findorfail($id);
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller43', compact('datos', 'd'));
        }elseif ($plant == 44) {
            $consul = Taller::findorfail($id);
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller44', compact('datos', 'd'));
        }elseif ($plant == 45) {
            $consul = Taller::findorfail($id);
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller45', compact('datos', 'd'));
        }elseif ($plant == 46) {
            $consul = Taller::findorfail($id);
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller46', compact('datos', 'd'));
        }elseif ($plant == 47) {
            $consul = Taller::findorfail($id);
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller47', compact('datos', 'd'));
        }elseif ($plant == 48) {
            $consul = Taller::findorfail($id);
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller48', compact('datos', 'd'));
        }elseif ($plant == 49) {
            $consul = Taller::findorfail($id);
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller49', compact('datos', 'd'));
        }elseif ($plant == 50) {
            $consul = Taller::findorfail($id);
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller50', compact('datos', 'd'));
        }elseif ($plant == 51) {
            $consul = Taller::findorfail($id);
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller51', compact('datos', 'd'));
        }elseif ($plant == 52) {
            $consul = Taller::findorfail($id);
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller52', compact('datos', 'd'));
        }elseif ($plant == 53) {
            $consul = Taller::findorfail($id);
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller53', compact('datos', 'd'));
        }elseif ($plant == 54) {
            $consul = Taller::findorfail($id);
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller54', compact('datos', 'd'));
        }elseif ($plant == 55) {
            $consul = Taller::findorfail($id);
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller55', compact('datos', 'd'));
        }elseif ($plant == 56) {
            $consul = Taller::findorfail($id);
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller56', compact('datos', 'd'));
        }
        
    }
    public function store1(Request $request, $idtaller){
    $taller1 = new TallerCompletarRes; 
    $taller1->taller_id  = $idtaller;
    $taller1->user_id =    '1';           
    $taller1->enunciado =  'COMPLETE EL ENUNCIADO CORRECTAMENTE.';           
    $taller1->respuesta =   $request->input('respuesta');   
    $taller1->save();

    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
    //return response($content = 'Taller completado correctamente', $status = 200);
    }

      public function store2(Request $request){
    $taller1 = new TallerClasificarRes; 
    $taller1->taller_id  = '1';
    $taller1->user_id =    '1';           
    $taller1->enunciado =  'CLASIFIQUE  EL  COMERCIO,  CON  ORIGINALIDAD.';           
    $taller1->resp1 =   $request->input('resp1');   
    $taller1->resp2 =   $request->input('resp2');   
    $taller1->resp3 =   $request->input('resp3');   
    $taller1->resp4 =   $request->input('resp4');   
    $taller1->save();

    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
    //return response($content = 'Taller completado correctamente', $status = 200);
    }

        public function store3(Request $request){
    $taller1 = new TallerCompleteEnRes; 
    $taller1->taller_id  = '1';
    $taller1->user_id =    '1';           
    $taller1->enunciado =  'COMPLETE LOS ENUNCIADOS CORRECTAMENTE';           
    $taller1->respuesta1 =   $request->input('respuesta1');   
    $taller1->respuesta2 =   $request->input('respuesta2');   
    $taller1->respuesta3 =   $request->input('respuesta3');   
    $taller1->respuesta4 =   $request->input('respuesta4');   
    $taller1->respuesta5 =   $request->input('respuesta5');   
    $taller1->save();

    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
    //return response($content = 'Taller completado correctamente', $status = 200);
    }
     public function store4(Request $request, $idtaller){
       $contenido = TallerDiferencia::select('enunciado')->where('taller_id', $idtaller)->firstOrFail(); 
    $taller1 = new TallerDiferenciaRes; 
    $taller1->taller_id  = $idtaller;
    $taller1->user_id =    '1';           
    $taller1->enunciado =  $contenido;
    //$taller1->item_a =          'Personas Capaces';   
    //$taller1->item_b =          'personas incapaces';             
    $taller1->diferencia_1a =   $request->input('diferencia_1a');   
    $taller1->diferencia_2a =   $request->input('diferencia_2a');   
    $taller1->diferencia_3a =   $request->input('diferencia_3a');   
    $taller1->diferencia_1b =   $request->input('diferencia_1b');   
    $taller1->diferencia_2b =   $request->input('diferencia_2b');   
    $taller1->diferencia_3b =   $request->input('diferencia_3b');   
    $taller1->save();

    return redirect()->route('welcome')->with('datos', 'Taller completado correctamente!');
    //return response($content = 'Taller completado correctamente', $status = 200);
    }

    public function store5(Request $request){

    
 
    }
    public function store6(Request $request, $idtaller)
    {
       $contenido = TallerIdentificarImagen::select('enunciado')->where('taller_id', $idtaller)->firstOrFail(); 
    $taller6 = new TallerIdentificarImagenRe; 
    $taller6->taller_id  = $idtaller;
    $taller6->user_id =    '1';           
    $taller6->enunciado =  $contenido->enunciado;  
    if ($request->input('foto1')) {
    $taller6->foto1 =   $request->input('foto1'); 
     }elseif ($request->input('foto2')) {
    $taller6->foto2 =   $request->input('foto2');
    }elseif ($request->input('foto3')) {
    $taller6->foto3 =   $request->input('foto3'); 
    }elseif ($request->input('foto4')) {
    $taller6->foto4 =   $request->input('foto4');   
    }elseif ($request->input('foto5')) {
    $taller6->foto5 =   $request->input('foto5');          
    }elseif ($request->input('foto6')) {
    $taller6->foto6 =   $request->input('foto6');      
    }elseif ($request->input('foto7')) {
    $taller6->foto7 =   $request->input('foto7');     
    } elseif ($request->input('foto8')) {
    $taller6->foto8 =   $request->input('foto8');   
    } elseif ($request->input('foto9')) {
    $taller6->foto9 =   $request->input('foto9');  
    } elseif ($request->input('foto10')) {
    $taller6->foto10 =   $request->input('foto10');    
    }      
    $taller6->save();

    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
    }
    public function store7(Request $request, $idtaller)
    {
    $contenido = TallerGusanillo::select('enunciado')->where('taller_id', $idtaller)->firstOrFail(); 
    $taller7 = new TallerGusanilloRe; 
    $taller7->taller_id  = $idtaller;
    $taller7->user_id    =    '1';           
    $taller7->enunciado  =  $contenido->enunciado;                       
    $taller7->respuesta1 =   $request->input('respuesta1');   
    $taller7->respuesta2 =   $request->input('respuesta2');   
    $taller7->respuesta3 =   $request->input('respuesta3');    
    $taller7->save();

    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
    }

        public function store8(Request $request, $idtaller)
    {
    $contenido = TallerCirculo::select('enunciado')->where('taller_id', $idtaller)->firstOrFail(); 
    $taller8 = new TallerCirculoRe; 
    $taller8->taller_id  = $idtaller;
    $taller8->user_id    =    '1';           
    $taller8->enunciado  =  $contenido->enunciado;                       
    $taller8->respuesta1 =   $request->input('respuesta1');   
    $taller8->respuesta2 =   $request->input('respuesta2');   
    $taller8->respuesta3 =   $request->input('respuesta3');    
    $taller8->respuesta4 =   $request->input('respuesta4');    
    $taller8->save();

    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
    }

    public function store10(Request $request)
    {

     $encoitem1 = 'Persona incapaz de ejercer el comercio/'.$request->input('item');   
     $encoitem2 = 'Adquirir un bien/'.$request->input('item1');  
     $encoitem3 = 'Persona capaz de ejercer el comercio/'.$request->input('item2');  
    $taller10 = new TallerSubrayarRe; 
    $taller10->taller_id  = '1';
    $taller10->user_id =    '1';           
    $taller10->enunciado =  'SUBRAYE LA ALTERNATIVA CORRECTA.';           
    $taller10->item =   $encoitem1;   
    $taller10->item1 =   $encoitem2;  
    $taller10->item2 =   $encoitem3;       
    $taller10->save();

    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
    }
    public function store12(Request $request,  $idtaller)
    {
        $contenido = TallerVerdaderoFalso::select('enunciado')->where('taller_id', $idtaller)->firstOrFail(); 

        $taller12 = new TallerVerdaderoFalsoRe; 
        $taller12->taller_id    =     $idtaller;
        $taller12->user_id      =     '1'; 
        $taller12->enunciado    =      $contenido->enunciado; 
         $taller12->enunciado1  =   $request->input('enunciado1');
         $taller12->enunciado2  =    $request->input('enunciado2');
         $taller12->enunciado3  =    $request->input('enunciado3');
         $taller12->enunciado4  =    $request->input('enunciado4');
         $taller12->enunciado5  =    $request->input('enunciado5');
         $taller12->save();
    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');


    }
    public function store13(Request $request,  $idtaller)
    {
        $contenido = TallerDefinirEnunciado::select('enunciado')->where('taller_id', $idtaller)->firstOrFail();
        $taller13 = new TallerDefinirEnunciadoRe; 
        $taller13->taller_id    =   $idtaller;
        $taller13->user_id      =   '1'; 
        $taller13->enunciado    =   $contenido->enunciado; 
        $taller13->respuesta1   =   $request->input('respuesta1');
        $taller13->respuesta2   =   $request->input('respuesta2');
        $taller13->respuesta3   =   $request->input('respuesta3');
        $taller13->respuesta4   =   $request->input('respuesta4');
        $taller13->save();

    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
    }

    public function store14(Request $request,  $idtaller)
    {
        $contenido = TallerIdentificarPersona::select('enunciado')->where('taller_id', $idtaller)->firstOrFail();
        $taller14 = new TallerIdentificarPersonaRe; 
        $taller14->taller_id      =   $idtaller;
        $taller14->user_id        =   '1'; 
        $taller14->enunciado      =   $contenido->enunciado; 
        $taller14->girador        =   $request->input('girador');
        $taller14->girado         =   $request->input('girado');
        $taller14->beneficiario   =   $request->input('beneficiario');
        $taller14->save();

    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
    }
      public function store15(Request $request,  $idtaller)
    {
        $contenido = TallerCheque::select('enunciado')->where('taller_id', $idtaller)->firstOrFail();
        $taller15 = new TallerChequeRe; 
        $taller15->taller_id      =   $idtaller;
        $taller15->user_id        =   '1'; 
        $taller15->enunciado      =   $contenido->enunciado; 
        $taller15->girador        =   $request->input('girador');
        $taller15->girado         =   $request->input('girado');
        $taller15->cantidad       =   $request->input('cantidad');
        $taller15->lugar          =   $request->input('lugar');
        $taller15->fecha          =   $request->input('fecha');
        $taller15->save();
    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
        

    }
     public function store16(Request $request,  $idtaller)
    {
        $contenido = TallerChequeEndoso::select('enunciado')->where('taller_id', $idtaller)->firstOrFail();
        $taller16 = new TallerChequeEndosoRe; 
        $taller16->taller_id      =   $idtaller;
        $taller16->user_id        =   '1'; 
        $taller16->enunciado      =   $contenido->enunciado; 
        $taller16->endoso        =   $request->input('endoso');
        $taller16->firma        =   $request->input('firma');
        $taller16->save();
    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
    }
      public function store17(Request $request,  $idtaller)
    {
        $contenido = TallerConvertirCheque::select('enunciado')->where('taller_id', $idtaller)->firstOrFail();
        $taller17 = new TallerConvertirChequeRe; 
        $taller17->taller_id      =   $idtaller;
        $taller17->user_id        =   '1'; 
        $taller17->enunciado      =   $contenido->enunciado; 
        $taller17->endoso        =   $request->input('endoso');
        $taller17->firma        =   $request->input('firma');
        $taller17->save();
    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
    }
      public function store18(Request $request,  $idtaller)
    {
        $contenido = TallerLetraCambio::select('enunciado')->where('taller_id', $idtaller)->firstOrFail();
        $taller18 = new TallerLetraCambioRe; 
        $taller18->taller_id      =   $idtaller;
        $taller18->user_id        =   '1'; 
        $taller18->enunciado      =   $contenido->enunciado; 
        $taller18->vencimiento        =   $request->input('vencimiento');
        $taller18->numero        =   $request->input('numero');
        $taller18->por        =   $request->input('por');
        $taller18->ciudad        =   $request->input('ciudad');
        $taller18->fecha        =   $request->input('fecha');
        $taller18->orden_de        =   $request->input('orden_de');
        $taller18->cantidad        =   $request->input('cantidad');
        $taller18->direccion        =   $request->input('direccion');
        $taller18->ciudad2        =   $request->input('ciudad2');
        $taller18->atentamente        =   $request->input('atentamente');
        $taller18->save();
    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
    }
       public function store19(Request $request,  $idtaller)
    {
        $contenido = TallerCertificadoDeposito::select('enunciado')->where('taller_id', $idtaller)->firstOrFail();
        $taller19 = new TallerCertificadoDepositoRe; 
        $taller19->taller_id      =   $idtaller;
        $taller19->user_id        =   '1'; 
        $taller19->enunciado      =   $contenido->enunciado; 
        $taller19->valor_inicial        =   $request->input('valor_inicial');
        $taller19->caracter        =   $request->input('caracter');
        $taller19->beneficiario        =   $request->input('beneficiario');
        $taller19->cantidad        =   $request->input('cantidad');
        $taller19->plazo        =   $request->input('plazo');
        $taller19->interes_anual        =   $request->input('interes_anual');
        $taller19->fecha_emision        =   $request->input('fecha_emision');
        $taller19->plazo_de_vencimiento        =   $request->input('plazo_de_vencimiento');
        $taller19->fecha_de_vencimiento        =   $request->input('fecha_de_vencimiento');
        $taller19->atentamente        =   $request->input('atentamente');
        $taller19->save();
    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
    }

      public function store20(Request $request,  $idtaller)
    {
        $contenido = TallerPagare::select('enunciado')->where('taller_id', $idtaller)->firstOrFail();
        $taller20 = new TallerPagareRe; 
        $taller20->taller_id      =   $idtaller;
        $taller20->user_id        =   '1'; 
        $taller20->enunciado      =   $contenido->enunciado; 
        $taller20->cantidad        =   $request->input('cantidad');
        $taller20->resp1        =   $request->input('resp1');
        $taller20->resp2        =   $request->input('resp2');
        $taller20->resp3        =   $request->input('resp3');
        $taller20->resp4        =   $request->input('resp4');
        $taller20->resp5        =   $request->input('resp5');
        $taller20->resp6        =   $request->input('resp6');
        $taller20->resp7        =   $request->input('resp7');
        $taller20->resp8        =   $request->input('resp8');
        $taller20->resp9        =   $request->input('resp9');
        $taller20->resp10        =   $request->input('resp10');
        $taller20->resp11        =   $request->input('resp11');
        $taller20->resp12        =   $request->input('resp12');
        $taller20->resp13        =   $request->input('resp13');
        $taller20->resp14        =   $request->input('resp14');
        $taller20->resp15        =   $request->input('resp15');
        $taller20->resp16        =   $request->input('resp16');
        $taller20->resp17        =   $request->input('resp17');
        $taller20->resp18        =   $request->input('resp18');
        $taller20->resp19        =   $request->input('resp19');  
        $taller20->save();
    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
    }
     public function store21(Request $request,  $idtaller)
    {
        $contenido = TallerValeCaja::select('enunciado')->where('taller_id', $idtaller)->firstOrFail();
        $taller21 = new TallerValeCajaRe; 
        $taller21->taller_id      =   $idtaller;
        $taller21->user_id        =   '1'; 
        $taller21->enunciado      =   $contenido->enunciado; 
        $taller21->por        =   $request->input('por');
        $taller21->deudor        =   $request->input('deudor');
        $taller21->cantidad        =   $request->input('cantidad');
        $taller21->concepto        =   $request->input('concepto');
        $taller21->fecha        =   $request->input('fecha');
        $taller21->vto_bueno        =   $request->input('vto_bueno');
        $taller21->conforme        =   $request->input('conforme');
        $taller21->save();
    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
    }

     public function store22(Request $request,  $idtaller)
    {
        $contenido = TallerNotaPedido::select('enunciado')->where('taller_id', $idtaller)->firstOrFail();
        $taller22 = new TallerNotaPedidoRe; 
        $taller22->taller_id      =   $idtaller;
        $taller22->user_id        =   '1'; 
        $taller22->enunciado      =   $contenido->enunciado; 
        $taller22->no             =   $request->input('no');
        $taller22->fecha          =   $request->input('fecha');
        $taller22->dependencia    =   $request->input('dependencia');
        $taller22->destino        =   $request->input('destino');
        $taller22->plazo_entrega  =   $request->input('plazo_entrega');
        $taller22->cantidad       =   $request->input('cantidad');
        $taller22->codigo         =   $request->input('codigo');
        $taller22->descripcion    =   $request->input('descripcion');
        $taller22->precio_unit    =   $request->input('precio_unit');
        $taller22->total          =   $request->input('total');
        $taller22->observaciones  =   $request->input('observaciones');
        $taller22->fabrica        =   $request->input('fabrica');
        $taller22->recibido       =   $request->input('recibido');
        $taller22->save();
    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
    }
    public function store23(Request $request,  $idtaller)
    {
        $contenido = TallerRecibo::select('enunciado')->where('taller_id', $idtaller)->firstOrFail();
        $taller23 = new TallerReciboRe; 
        $taller23->taller_id  =   $idtaller;
        $taller23->user_id    =   '1'; 
        $taller23->enunciado  =   $contenido->enunciado; 
        $taller23->no         =   $request->input('no');
        $taller23->por        =   $request->input('por');
        $taller23->recibi     =   $request->input('recibi');
        $taller23->cantidad   =   $request->input('cantidad');
        $taller23->arriendo   =   $request->input('arriendo');
        $taller23->propiedad  =   $request->input('propiedad');
        $taller23->situado    =   $request->input('situado');
        $taller23->hasta      =   $request->input('hasta');
        $taller23->firma      =   $request->input('firma');
        $taller23->save();
    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
    }
     public function store24(Request $request,  $idtaller)
    {
        $contenido = TallerOrdenPago::select('enunciado')->where('taller_id', $idtaller)->firstOrFail();
        $taller24 = new TallerOrdenPagoRe; 
        $taller24->taller_id =  $idtaller;
        $taller24->user_id   =  '1'; 
        $taller24->enunciado =  $contenido->enunciado; 
        $taller24->señor        =  $request->input('señor');
        $taller24->fecha       =  $request->input('fecha');
        $taller24->fecha_c    =  $request->input('fecha_c');
        $taller24->numero  =  $request->input('numero');
        $taller24->tipo  =  $request->input('tipo');
        $taller24->debe =  $request->input('debe');
        $taller24->haber   =  $request->input('haber');
        $taller24->saldo     =  $request->input('saldo');
        $taller24->save();
    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
    }
    public function store25(Request $request,  $idtaller)
    {
        $contenido = TallerFactura::select('enunciado')->where('taller_id', $idtaller)->firstOrFail();
        $taller25 = new TallerFacturaRe; 
        $taller25->taller_id        =  $idtaller;
        $taller25->user_id          =  '1'; 
        $taller25->enunciado        =  $contenido->enunciado; 
        $taller25->nombre           =  $request->input('nombre');
        $taller25->fecha_emision    =  $request->input('fecha_emision');
        $taller25->ruc              =  $request->input('ruc');
        $taller25->direccion              =  $request->input('direccion');
        $taller25->telefono              =  $request->input('telefono');
        $taller25->email              =  $request->input('email');
        $taller25->subtotal_12          =  $request->input('subtotal_12');
        $taller25->subtotal_0          =  $request->input('subtotal_0');
        $taller25->subtotal_iva          =  $request->input('subtotal_iva');
        $taller25->subtotal_siniva          =  $request->input('subtotal_siniva');
        $taller25->subtotal_sin_imp          =  $request->input('subtotal_sin_imp');
        $taller25->descuento_total          =  $request->input('descuento_total');
        $taller25->ice          =  $request->input('ice');
        $taller25->iva12          =  $request->input('iva12');
        $taller25->irbpnr          =  $request->input('irbpnr');
        $taller25->propina          =  $request->input('propina');
        $taller25->valor_total          =  $request->input('valor_total');
        $taller25->save();

        if ($taller25 = true) {

               $o = TallerFacturaRe::firstOrFail()->last();              
              foreach ($request->codigo as $key=>$v) {
                  $datos=array(
                     'taller_factura_re_id'=> $o->id,
                     'codigo'=> $request->codigo[$key],
                     'cod_aux'=> $request->cod_aux[$key],
                     'cantidad' => $request->cantidad[$key],
                     'precio' => $request->precio[$key],
                     'descuento' => $request->descuento[$key],
                     'valor' => $request->valor[$key],
                     'created_at'=> now(),
                     'updated_at'=> now(),
                  );
                  TallerFacturaDatosRe::insert($datos);
               }
        }


    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
    }
     public function store26(Request $request,  $idtaller)
    {
        $contenido = TallerNotaVenta::select('enunciado')->where('taller_id', $idtaller)->firstOrFail();
        $taller26 = new TallerNotaVentaRe; 
        $taller26->taller_id        =  $idtaller;
        $taller26->user_id          =  '1'; 
        $taller26->enunciado        =  $contenido->enunciado; 
        $taller26->nombre           =  $request->input('nombre');
        $taller26->ruc              =  $request->input('ruc');
        $taller26->fecha            =  $request->input('fecha');
        $taller26->total            =  $request->input('total');
        $taller26->valido           =  $request->input('valido');
        $taller26->save();

        if ($taller26 = true) {

               $o = TallerNotaVentaRe::firstOrFail()->last(); 
                            
              foreach ($request->cantidad as $key=>$v) {
                  $datos=array(
                     'taller_nota_venta_re_id'=> $o->id,
                     'cantidad' => $request->cantidad[$key],
                     'descripcion' => $request->descripcion[$key],
                     'precio' => $request->precio[$key],
                     'valor_venta' => $request->valor_venta[$key],
                     'created_at'=> now(),
                     'updated_at'=> now(),
                  );
                  TallerNotaVentaDatosRe::insert($datos);
               }
        }

        
    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
    }
     public function store27(Request $request,  $idtaller)
    {
        $contenido = TallerAbreviatura::select('enunciado')->where('taller_id', $idtaller)->firstOrFail();
        $taller27 = new TallerAbreviaturaRe; 
        $taller27->taller_id        =  $idtaller;
        $taller27->user_id          =  '1'; 
        $taller27->enunciado        =  $contenido->enunciado; 
        $taller27->save();

        if ($taller27 = true) {

               $o = TallerAbreviaturaRe::firstOrFail()->last(); 
                            
              foreach ($request->col_a as $key=>$v) {
                  $datos=array(
                     'taller_abreviatura_re_id'=> $o->id,
                     'col_a_res' => $request->col_a[$key],
                     'col_b_res' => $request->col_b[$key],
                     'created_at'=> now(),
                     'updated_at'=> now(),
                  );
                  TallerAbreviaturaDatoRe::insert($datos);
               }
        }

        
    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
    }
     public function store34(Request $request,  $idtaller)
      {
         $imagen = $request->file('file');
            $nombre = time().'_'.$imagen->getClientOriginalName();
            $ruta = public_path().'/img/talleres';
            $imagen->move($ruta, $nombre);

            $urlimagen = '/img/talleres/'.$nombre;
        
        $contenido = TallerCollage::select('enunciado')->where('taller_id', $idtaller)->firstOrFail();
        $taller34 = new TallerCollageRe; 
        $taller34->taller_id        =  $idtaller;
        $taller34->user_id          =  '1'; 
        $taller34->enunciado        =  $contenido->enunciado; 
        $taller34->url_img        =  $urlimagen; 
        $taller34->save();

      }


    public function taller5(){
            $dato = TallerSeñalar::where('id', 1)->firstOrFail();
            foreach ($dato as $value) { 
                $info = explode('/', $value->item_1);
                 //$for1 = $info[0];
                //$for2 =  $info[1];
                
                } 
        //return view('talleres.taller6', compact('for1', 'for2'));
    	return view('talleres.taller5', compact('info'));
    }
    public function taller6(){
       $i= 0;
    return view('talleres.taller6', compact('i'));
    }
     public function taller7(){
     

    	return view('talleres.taller7');
    }
      public function taller8(){

    	return view('talleres.taller8');
    }

      public function taller9(){

    	return view('talleres.taller9');
    } public function taller10(){

    	return view('talleres.taller10');
    }
    public function taller11(){

    	return view('talleres.taller11');
    }
    public function taller12(){

    	return view('talleres.taller12');
    }

     public function taller13(){

    	return view('talleres.taller13');
    }
      public function taller14(){

    	return view('talleres.taller14');
    }

    public function taller15(){

    	return view('talleres.taller15');
    }
    public function taller16(){

    	return view('talleres.taller16');
    }
    public function taller17(){

    	return view('talleres.taller17');
    }
    public function taller18(){

    	return view('talleres.taller18');
    }
    public function taller19(){

    	return view('talleres.taller19');
    }
    public function taller20(){

    	return view('talleres.taller20');
    }
     public function taller21(){

        return view('talleres.taller21');
    }
     public function taller22(){

        return view('talleres.taller22');
    }
     public function taller23(){

        return view('talleres.taller23');
    }
     public function taller24(){

        return view('talleres.taller24');
    }
     public function taller25(){

        return view('talleres.taller25');
    }
    public function taller26(){

        return view('talleres.taller26');
    }
    public function taller27(){

        return view('talleres.taller27');
    }
    public function taller28(){

        return view('talleres.taller28');
    }
    public function taller29(){

        return view('talleres.taller29');
    }
    public function taller30(){

        return view('talleres.taller30');
    }
     public function taller31(){

        return view('talleres.taller31');
    }
     public function taller32(){

        return view('talleres.taller32');
    }
     public function taller33(){

        return view('talleres.taller33');
    }
     public function taller34(){

        return view('talleres.taller34');
    }
     public function taller35(){

        return view('talleres.taller35');
    }
    public function taller36(){

        return view('talleres.taller36');
    }
    public function taller37(){

        return view('talleres.taller37');
    }
    public function taller38(){

        return view('talleres.taller38');
    }
    public function taller39(){

        return view('talleres.taller39');
    }
    public function taller40(){

        return view('talleres.taller40');
    }
    public function taller41(){

        return view('talleres.taller41');
    }
    public function taller42(){

        return view('talleres.taller42');
    }
    public function taller43(){

        return view('talleres.taller43');
    }
    public function taller44(){

        return view('talleres.taller44');
    }
     public function taller45(){

        return view('talleres.taller45');
    }
     public function taller46(){

        return view('talleres.taller46');
    }
     public function taller47(){

        return view('talleres.taller47');
    }
     public function taller48(){

        return view('talleres.taller48');
    }
     public function taller49(){

        return view('talleres.taller49');
    }
     public function taller50(){

        return view('talleres.taller50');
    }
     public function taller51(){

        return view('talleres.taller51');
    }
     public function taller52(){

        return view('talleres.taller52');
    }
     public function taller53(){

        return view('talleres.taller53');
    }
     public function taller54(){

        return view('talleres.taller54');
    }
     public function taller55(){

        return view('talleres.taller55');
    }
     public function taller56(){

        return view('talleres.taller56');
    }

}
