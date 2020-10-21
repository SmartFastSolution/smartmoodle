<?php

namespace App\Http\Controllers;

use App\Admin\Respuesta\AbreviaturaCarta;
use App\Admin\Respuesta\AbreviaturaEconomica;
use App\Admin\Respuesta\AbreviaturaEditorial;
use App\Admin\Respuesta\Completar;
use App\Admin\Respuesta\FormulasContable;
use App\Admin\Respuesta\IdentificarAbreviatura;
use App\Admin\Respuesta\MapaConceptual;
use App\Taller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TallerEstudianteController extends Controller
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
             $datos = TallerCompletarEnunciado::where('taller_id', $consul->id)->get();  
               if ($consul->plantilla_id == $plant && $consul->id == $id) {
                 return view('talleres.taller3', compact('datos', 'd', 'consul'));
             }else {
            return abort(404);   
             }

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
             $datos = Taller2Relacionar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller11', compact('datos', 'd'));


        }elseif ($plant == 12) {

            $consul = Taller::findorfail($id);
            $datos = TallerVerdaderoFalso::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller12', compact('datos', 'd'));

        }elseif ($plant == 13) {

            $consul = Taller::findorfail($id);
            $datos = TallerDefinirEnunciado::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller13', compact('datos', 'd'));

        }elseif ($plant == 14) {
            $consul = Taller::findorfail($id);
            $datos = TallerIdentificarPersona::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller14', compact('datos', 'd'));

        }elseif ($plant == 15) {
            $consul = Taller::findorfail($id);
             $datos = TallerCheque::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller15', compact('datos', 'd'));

        }elseif ($plant == 16) {
            $consul = Taller::findorfail($id);
             $datos = TallerChequeEndoso::where('taller_id', $consul->id)->firstOrFail();
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
             $datos = TallerPagare::where('taller_id', $consul->id)->firstOrFail();
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
             $datos = TallerOrdenPago::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller24', compact('datos', 'd'));

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

        }elseif ($plant == 28) {
              $datos = Taller::findorfail($id);
            if ($datos->plantilla_id == $plant && $datos->id = $id) {
                return view('talleres.taller28', compact('datos', 'd'));  
             }else {
                
            return abort(404);   
             }
        }elseif ($plant == 29) {
            $datos = Taller::findorfail($id);
            if ($datos->plantilla_id == $plant && $datos->id = $id) {
                return view('talleres.taller29', compact('datos', 'd'));  
             }else { 
            return abort(404);   
             }

        }elseif ($plant == 30){
            $datos = Taller::findorfail($id);
            if ($datos->plantilla_id == $plant && $datos->id = $id) {
            return view('talleres.taller30', compact('datos', 'd'));  
             }else {
            return abort(404);   
             }
            }elseif ($plant == 31) {

            $consul = Taller::findorfail($id);
             $datos = TallerCollage::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller31', compact('datos', 'd'));

        }elseif ($plant == 32) {
          $datos = Taller::findorfail($id);
            if ($datos->plantilla_id == $plant && $datos->id = $id) {
            return view('talleres.taller32', compact('datos', 'd'));  
             }else {
            return abort(404);   
             }
        }elseif ($plant == 33) {
            $consul = Taller::findorfail($id);
             $datos = TallerPregunta::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller33', compact('datos', 'd'));
        }elseif ($plant == 34) {
            $datos = Taller::findorfail($id);
            if ($datos->plantilla_id == $plant && $datos->id = $id) {
            return view('talleres.taller34', compact('datos', 'd'));  
             }else {
            return abort(404);   
             }
        }elseif ($plant == 35) {
            $datos = Taller::findorfail($id);
            if ($datos->plantilla_id == $plant && $datos->id = $id) {
            return view('talleres.taller35', compact('datos', 'd'));  
             }else {
            return abort(404);   
             }
        }elseif ($plant == 36) {
            $a = 0;
            $consul = Taller::findorfail($id);
            $datos = TallerAnalizar::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller36', compact('datos', 'd', 'a'));

        }elseif ($plant == 37) {
                JavaScript::put([
                 'taller' => $d,
                ]);
            $consul = Taller::findorfail($id);
             $datos = TallerContabilidad::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller37', compact('datos', 'd'));

        }elseif ($plant == 38) {
            $consul = Taller::findorfail($id);
             $datos = TallerALectura::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller38', compact('datos', 'd'));

        }elseif ($plant == 39) {

            $consul = Taller::findorfail($id);
             $datos = TallerPalabra::where('taller_id', $consul->id)->firstOrFail();
             $str = "VUEDRAGGABLES";

            $arr1 = str_split($datos->letra);
            $claves = array_keys($arr1);
            $letra= [];
            shuffle($arr1);
            foreach($claves as $contenido){
                $letra[$contenido] = $arr1[$contenido];
            }
            return view('talleres.taller39', compact('datos', 'd', 'letra'));
        }elseif ($plant == 40) {
            $a = 0;
            $consul = Taller::findorfail($id);
             $datos = TallerIdenTransa::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller40', compact('datos', 'd', 'a'));

        }elseif ($plant == 41) {
            $datos = Taller::findorfail($id);
            if ($datos->plantilla_id == $plant && $datos->id = $id) {
                return view('talleres.taller41', compact('datos', 'd'));  
             }else {
            return abort(404);   
             }

        }elseif ($plant == 42) {

            $datos = Taller::findorfail($id);
            $ideas = TallerOrdenIdea::select('id','idea')->where('taller_id',$id)->get();
            // $ideas = $datos->tallerOrdenIdea;

            if ($datos->plantilla_id == $plant && $datos->id = $id) {
            return view('talleres.taller42', compact('datos', 'd', 'ideas'));  
             }else {
            return abort(404);   
             }
        }elseif ($plant == 43) {
            $consul = Taller::findorfail($id);
             $datos = TallerMConceptual::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller43', compact('datos', 'd'));
        }elseif ($plant == 44) {

            $consul = Taller::findorfail($id);
             $datos = TallerEscribirCuenta::where('taller_id', $consul->id)->firstOrFail();
            return view('talleres.taller44', compact('datos', 'd'));
        }elseif ($plant == 45) {

            $consul = Taller::findorfail($id);
             $datos = TallerSopaLetra::where('taller_id', $consul->id)->firstOrFail();
            $palabras = explode(',', $datos->palabras);
                
            return view('talleres.taller45', compact('datos', 'd', 'palabras'));
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
        
        }elseif ($plant == 57) {
            
     
        }
    }
    public function store1(Request $request, $idtaller){
    $id                 =   Auth::id();
    $taller             =   Taller::where('id', $id)->firstOrfail();
    $taller1            =   new Completar; 
    $taller1->taller_id =   $idtaller;
    $taller1->user_id   =   $id;           
    $taller1->enunciado =   $taller->enunciado;           
    $taller1->respuesta =   $request->input('respuesta');   
    $taller1->save();

        $user= User::find($id);
        $user->tallers()->attach($idtaller,['status'=> 'completado']);
    return redirect()->route('estudiante')->with('datos', 'Datos Enviados Correctamente');
    }
    
    public function store28(Request $request, $idtaller){
    $id                     =   Auth::id();
    $taller28               =   new IdentificarAbreviatura; 
    $taller28->taller_id    =   $idtaller;
    $taller28->user_id      =   $id;           
    $taller28->enunciado    =  'EN EL PRESENTE TEXTO IDENTIFIQUE LAS ABREVIATURAS COMERCIALES Y ESCRÍBALAS EN LA SIGUIENTE CARTA, EFICAZMENTE.'; 
    $taller28->abreviatura1 =   $request->input('abreviatura1');   
    $taller28->abreviatura2 =   $request->input('abreviatura2');   
    $taller28->abreviatura3 =   $request->input('abreviatura3');   
    $taller28->abreviatura4 =   $request->input('abreviatura4');   
    $taller28->abreviatura5 =   $request->input('abreviatura5');   
    $taller28->abreviatura6 =   $request->input('abreviatura6');   
    $taller28->abreviatura7 =   $request->input('abreviatura7');   
    $taller28->abreviatura8 =   $request->input('abreviatura8');   
    $taller28->save();

    $user= User::find($id);
    $user->tallers()->attach($idtaller,['status'=> 'completado']);

    return redirect()->route('estudiante')->with('datos', 'Datos Enviados Correctamnete');
    }

    public function store29(Request $request, $idtaller){
    $id                      = Auth::id();
    $taller29                =   new AbreviaturaCarta; 
    $taller29->taller_id     =   $idtaller;
    $taller29->user_id       =   $id;           
    $taller29->enunciado     =  'UTILIZA LAS ABREVIATURAS COMERCIALES EN LA CARTA, CORRECTAMENTE'; 
    $taller29->abreviatura1  =   $request->input('abreviatura1');   
    $taller29->abreviatura2  =   $request->input('abreviatura2');   
    $taller29->abreviatura3  =   $request->input('abreviatura3');   
    $taller29->abreviatura4  =   $request->input('abreviatura4');   
    $taller29->abreviatura5  =   $request->input('abreviatura5');   
    $taller29->abreviatura6  =   $request->input('abreviatura6');   
    $taller29->abreviatura7  =   $request->input('abreviatura7');   
    $taller29->abreviatura8  =   $request->input('abreviatura8');   
    $taller29->abreviatura9  =   $request->input('abreviatura9');   
    $taller29->abreviatura10 =   $request->input('abreviatura10');   
    $taller29->abreviatura11 =   $request->input('abreviatura11');   
    $taller29->abreviatura12 =   $request->input('abreviatura12');   
    $taller29->abreviatura13 =   $request->input('abreviatura13');   
    $taller29->save();

    $user= User::find($id);

    $user->tallers()->attach($idtaller,['status'=> 'completado']);

    return redirect()->route('estudiante')->with('datos', 'Datos Enviados Correctamnete');
    }
    public function store30(Request $request, $idtaller){
    $id                      = Auth::id();
    $taller30                =   new AbreviaturaEditorial; 
    $taller30->taller_id     =   $idtaller;
    $taller30->user_id       =   $id;           
    $taller30->enunciado     =  'LOCALIZA LAS ABREVIATURAS EN EL EDITORIAL Y ESCRIBE EL SIGNIFICADO EN EL SIGUIENTE PÁRRAFO, CORRECTAMENTE.'; 
    $taller30->abreviatura1  =   $request->input('abreviatura1');   
    $taller30->abreviatura2  =   $request->input('abreviatura2');   
    $taller30->abreviatura3  =   $request->input('abreviatura3');   
    $taller30->abreviatura4  =   $request->input('abreviatura4');   
    $taller30->abreviatura5  =   $request->input('abreviatura5');   
    $taller30->abreviatura6  =   $request->input('abreviatura6');   
    $taller30->abreviatura7  =   $request->input('abreviatura7');   
    $taller30->abreviatura8  =   $request->input('abreviatura8');   
    $taller30->abreviatura9  =   $request->input('abreviatura9');   
    $taller30->abreviatura10 =   $request->input('abreviatura10');   
    $taller30->abreviatura11 =   $request->input('abreviatura11');   
    $taller30->save();

    $user= User::find($id);

    $user->tallers()->attach($idtaller,['status'=> 'completado']);

    return redirect()->route('estudiante')->with('datos', 'Datos Enviados Correctamnete');
    }

     public function store32(Request $request, $idtaller){
    $id                      = Auth::id();
    $taller32                =   new AbreviaturaEconomica; 
    $taller32->taller_id     =   $idtaller;
    $taller32->user_id       =   $id;           
    $taller32->enunciado     =  'ESCRIBA EN EL GUSANILLO ABREVIATURAS ECONÓMICAS SEGÚN EL ORDEN QUE SE INDICA EN FORMA CORRECTA.'; 
    $taller32->abreviaturaI1 =   $request->input('abreviaturaI1');   
    $taller32->abreviaturaI2 =   $request->input('abreviaturaI2');   
    $taller32->abreviaturaI3 =   $request->input('abreviaturaI3');   
    $taller32->abreviaturaI4 =   $request->input('abreviaturaI4');   
    $taller32->abreviaturaI5 =   $request->input('abreviaturaI5');   
    $taller32->abreviaturaC1 =   $request->input('abreviaturaC1');   
    $taller32->abreviaturaC2 =   $request->input('abreviaturaC2');   
    $taller32->abreviaturaC3 =   $request->input('abreviaturaC3');   
    $taller32->abreviaturaC4 =   $request->input('abreviaturaC4');   
    $taller32->abreviaturaC5 =   $request->input('abreviaturaC5');   
    $taller32->abreviaturaR1 =   $request->input('abreviaturaR1');   
    $taller32->abreviaturaR2 =   $request->input('abreviaturaR2');   
    $taller32->abreviaturaR3 =   $request->input('abreviaturaR3');   
    $taller32->abreviaturaR4 =   $request->input('abreviaturaR4');   
    $taller32->abreviaturaR5 =   $request->input('abreviaturaR5');   
    $taller32->save();

    $user= User::find($id);

    $user->tallers()->attach($idtaller,['status'=> 'completado']);

    return redirect()->route('estudiante')->with('datos', 'Datos Enviados Correctamnete');
    }

    public function store35(Request $request, $idtaller){
    $id                      = Auth::id();
    $taller35                =   new FormulasContable; 
    $taller35->taller_id     =   $idtaller;
    $taller35->user_id       =   $id;           
    $taller35->enunciado     =  'DESARROLLE FÓRMULAS DE LA ECUACIÓN CONTABLE, CON EXACTITUD'; 
    $taller35->formula1  =   $request->input('formula1');   
    $taller35->formula2  =   $request->input('formula2');   
    $taller35->formula3  =   $request->input('formula3');   
    $taller35->formula4  =   $request->input('formula4');   
    $taller35->formula5  =   $request->input('formula5');   
    $taller35->formula6  =   $request->input('formula6');   
    $taller35->formula7  =   $request->input('formula7');   
    $taller35->formula8  =   $request->input('formula8');   
    $taller35->formula9  =   $request->input('formula9');   
    $taller35->save();

    $user= User::find($id);

    $user->tallers()->attach($idtaller,['status'=> 'completado']);

    return redirect()->route('estudiante')->with('datos', 'Datos Enviados Correctamnete');
    }
        public function store41(Request $request, $idtaller){
    $id                  = Auth::id();
    $taller41            =   new MapaConceptual; 
    $taller41->taller_id =   $idtaller;
    $taller41->user_id   =   $id;           
    $taller41->enunciado =  'DESARROLLE EL MAPA CONCEPTUAL, CON AGILIDAD.'; 
    $taller41->vender    =   $request->input('vender');   
    $taller41->comprar   =   $request->input('comprar');   
    $taller41->seccion1a =   $request->input('seccion1a');   
    $taller41->seccion1b =   $request->input('seccion1b');   
    $taller41->seccion2a =   $request->input('seccion2a');   
    $taller41->seccion2b =   $request->input('seccion2b');   
    $taller41->seccion3a =   $request->input('seccion3a');   
    $taller41->seccion3b =   $request->input('seccion3b');   
    $taller41->save();

    $user= User::find($id);

    $user->tallers()->attach($idtaller,['status'=> 'completado']);

    return redirect()->route('estudiante')->with('datos', 'Datos Enviados Correctamnete');
    }
}
