<?php

namespace App\Http\Controllers;
use App\Admin\Taller2Relacionar;
use App\Admin\TallerALectura;
use App\Admin\TallerALecturaOp;
use App\Admin\TallerAbreviatura;
use App\Admin\TallerAnalizar;
use App\Admin\TallerCelda;
use App\Admin\TallerCeldaClasificacion;
use App\Admin\TallerCeldaClasificar;
use App\Admin\TallerCertificadoDeposito;
use App\Admin\TallerCheque;
use App\Admin\TallerChequeEndoso;
use App\Admin\TallerCirculo;
use App\Admin\TallerClasificar;
use App\Admin\TallerCollage;
use App\Admin\TallerCompletar;
use App\Admin\TallerCompletarEnunciado;
use App\Admin\TallerContabilidad;
use App\Admin\TallerConvertirCheque;
use App\Admin\TallerDefinirEnunciado;
use App\Admin\TallerDiferencia;
use App\Admin\TallerEscribirCuenta;
use App\Admin\TallerFactura;
use App\Admin\TallerGusanillo;
use App\Admin\TallerIdenTransa;
use App\Admin\TallerIdenTransaOp;
use App\Admin\TallerIdentificarImagen;
use App\Admin\TallerIdentificarPersona;
use App\Admin\TallerLetraCambio;
use App\Admin\TallerMConceptual;
use App\Admin\TallerNotaPedido;
use App\Admin\TallerNotaVenta;
use App\Admin\TallerOrdenIdea;
use App\Admin\TallerOrdenPago;
use App\Admin\TallerPagare;
use App\Admin\TallerPalabra;
use App\Admin\TallerPartidaDoble;
use App\Admin\TallerPregunta;
use App\Admin\TallerRAlternativa;
use App\Admin\TallerRecibo;
use App\Admin\TallerRelacionar;
use App\Admin\TallerSenalar;
use App\Admin\TallerSenalarOpcion;
use App\Admin\TallerSopaLetra;
use App\Admin\TallerSubrayar;
use App\Admin\TallerValeCaja;
use App\Admin\TallerVerdaderoFalso;
use App\Http\Controllers\Controller;
use App\Materia;
use App\TalleLocalizarAbreRe;
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
use App\TallerIdentAbreRe;
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
use App\TallerUtilizarAbreRe;
use App\TallerValeCajaRe;
use App\TallerVerdaderoFalsoRe;
use Auth;
use Illuminate\Http\Request;
use JavaScript;

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
             $datos = TallerPartidaDoble::where('taller_id', $consul->id)->firstOrfail();
             $doble = $datos->partidaDobleEnn;
             $array =[];
             $recorrido = [];
             foreach ($doble as $key => $value) {
                 $array[$key] = [
                    'cuenta' =>'',
                    'debe' => array(),
                    'haber' => array(),
                    'total_debe' =>'',
                    'total_haber' =>'',

                 ];
             }
              foreach ($doble as $key => $value) {
                 $recorrido[$key] = [
                    'debe' => '',
                    'haber' => ''
                 ];
             }
            return view('talleres.taller2', compact('datos', 'd', 'array', 'recorrido'));

        }elseif ($plant == 3) {

            $consul = Taller::findorfail($id);
             $datos = TallerCompletarEnunciado::where('taller_id', $consul->id)->firstOrfail();  
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
            $k= 0;
            $i= 0;

            $consul = Taller::findorfail($id);
             $datos = TallerRelacionar::where('taller_id', $consul->id)->firstOrfail();
            return view('talleres.taller10', compact('datos', 'd', 'i'));


        }elseif ($plant == 11) {
            $K= 0;
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
             $datos = TallerCelda::where('taller_id', $consul->id)->firstOrFail();
             $clasificados = TallerCeldaClasificar::where('taller_celda_id', $datos->id)->get();
             $clasificaciones = TallerCeldaClasificacion::where('taller_celda_id', $datos->id)->get();

             // return $clasificaciones;
            return view('talleres.taller33', compact('datos', 'd', 'clasificados', 'clasificaciones'));
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
             // $str = "VUEDRAGGABLES";

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
            $datos = Taller::findorfail($id);
             // $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
             if ($datos->plantilla_id == $plant && $datos->id = $id) {
                return view('talleres.taller46', compact('datos', 'd'));  
             }else {
            return abort(404);   
             }
        }elseif ($plant == 47) {

            $letra = 'a';
            $miniscula = 'A';
            $numero = 0;
            $numer = 0;
            $consul = Taller::findorfail($id);
            $datos = TallerRAlternativa::where('taller_id', $consul->id)->firstOrFail();


            return view('talleres.taller47', compact('datos', 'd', 'letra', 'numero', 'miniscula', 'numer'));
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
    public function taller33(){
    
    return view('talleres.taller33');
    }

  
}
