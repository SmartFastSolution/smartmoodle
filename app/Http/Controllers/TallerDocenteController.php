<?php

namespace App\Http\Controllers;

use App\Admin\Respuesta\Abreviatura;
use App\Admin\Respuesta\AbreviaturaCarta;
use App\Admin\Respuesta\AbreviaturaEconomica;
use App\Admin\Respuesta\AbreviaturaEditorial;
use App\Admin\Respuesta\AbreviaturaRe;
use App\Admin\Respuesta\Activo4;
use App\Admin\Respuesta\AlternativaCorrecta;
use App\Admin\Respuesta\AlternativaCorrectaRes;
use App\Admin\Respuesta\AnalizarPregunta;
use App\Admin\Respuesta\AnalizarPreguntaDato;
use App\Admin\Respuesta\CertificadoDeposito;
use App\Admin\Respuesta\Cheque;
use App\Admin\Respuesta\ChequeEndoso;
use App\Admin\Respuesta\Circulo;
use App\Admin\Respuesta\Collage;
use App\Admin\Respuesta\CollageImg;
use App\Admin\Respuesta\Completar;
use App\Admin\Respuesta\CompletarEnunciado;
use App\Admin\Respuesta\CompletarEnunciadoRes;
use App\Admin\Respuesta\ConvertirCheque;
use App\Admin\Respuesta\DefinirEnunciado;
use App\Admin\Respuesta\DefinirEnunciadoRe;
use App\Admin\Respuesta\Diferencia;
use App\Admin\Respuesta\EscribirCuenta;
use App\Admin\Respuesta\Factura;
use App\Admin\Respuesta\FacturaDato;
use App\Admin\Respuesta\FormulasContable;
use App\Admin\Respuesta\Gusanillo;
use App\Admin\Respuesta\IdenTrasa;
use App\Admin\Respuesta\IdenTrasaDato;
use App\Admin\Respuesta\Identificar;
use App\Admin\Respuesta\IdentificarAbreviatura;
use App\Admin\Respuesta\IdentificarImgRes;
use App\Admin\Respuesta\IdentificarPersona;
use App\Admin\Respuesta\Lectura;
use App\Admin\Respuesta\LecturaDato;
use App\Admin\Respuesta\LetraCambio;
use App\Admin\Respuesta\MapaConceptual2;
use App\Admin\Respuesta\MapaConceptual;
use App\Admin\Respuesta\NotaPedido;
use App\Admin\Respuesta\NotaPedidoRe;
use App\Admin\Respuesta\NotaVenta;
use App\Admin\Respuesta\NotaVentaDato;
use App\Admin\Respuesta\OrdenIdea;
use App\Admin\Respuesta\OrdenIdeasDato;
use App\Admin\Respuesta\OrdenPago;
use App\Admin\Respuesta\Pagare;
use App\Admin\Respuesta\Palabra;
use App\Admin\Respuesta\Pasivo4;
use App\Admin\Respuesta\Patrimonio4;
use App\Admin\Respuesta\Pregunta;
use App\Admin\Respuesta\Recibo;
use App\Admin\Respuesta\Relacionar2;
use App\Admin\Respuesta\Relacionar2Re;
use App\Admin\Respuesta\Relacionar;
use App\Admin\Respuesta\RelacionarRe;
use App\Admin\Respuesta\Subrayar;
use App\Admin\Respuesta\SubrayarRes;
use App\Admin\Respuesta\TipoSaldo;
use App\Admin\Respuesta\TipoSaldoDato;
use App\Admin\Respuesta\ValeCaja;
use App\Admin\Respuesta\VerdaderoFalso;
use App\Admin\Respuesta\VerdaderoFalsoRe;
use App\Admin\Taller2Relacionar;
use App\Admin\TallerALectura;
use App\Admin\TallerAbreviatura;
use App\Admin\TallerAnalizar;
use App\Admin\TallerCertificadoDeposito;
use App\Admin\TallerCheque;
use App\Admin\TallerChequeEndoso;
use App\Admin\TallerCirculo;
use App\Admin\TallerCollage;
use App\Admin\TallerCompletarEnunciado;
use App\Admin\TallerConvertirCheque;
use App\Admin\TallerDefinirEnunciado;
use App\Admin\TallerDiferencia;
use App\Admin\TallerFactura;
use App\Admin\TallerGusanillo;
use App\Admin\TallerIdenTransa;
use App\Admin\TallerIdentificarPersona;
use App\Admin\TallerLetraCambio;
use App\Admin\TallerMConceptual;
use App\Admin\TallerNotaPedido;
use App\Admin\TallerNotaVenta;
use App\Admin\TallerOrdenIdea;
use App\Admin\TallerOrdenPago;
use App\Admin\TallerPagare;
use App\Admin\TallerPalabra;
use App\Admin\TallerPregunta;
use App\Admin\TallerRecibo;
use App\Admin\TallerRelacionar;
use App\Admin\TallerRelacionarOpcion;
use App\Admin\TallerSenalar;
use App\Admin\TallerSubrayar;
use App\Admin\TallerTipoSaldo;
use App\Admin\TallerValeCaja;
use App\Admin\TallerVerdaderoFalso;
use App\Admin\TallerescribirCuenta;
use App\Taller;
use App\TallerChequeRe;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TallerDocenteController extends Controller
{
     public function taller($plant, $id, $us){
     	foreach(auth()->user()->roles as $role){
        $rol =$role->descripcion;
        }
        $d = $id;
        $user   = User::findorfail($us);
        $consul = Taller::findorfail($id);
        $resp= auth()->user()->tallers->where('id', $id)->count();
     if ($rol != 'docente') {
        return abort(404); 
     }else{
        if ($plant == 1) {
        	
                
            $datos = Completar::where('user_id', $user->id)->where('taller_id', $consul->id)->firstOrfail();
            return view('docentes.talleres.taller1', compact('datos', 'd', 'user'));
        }elseif ($plant == 2) {

            
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrfail();
            return view('docente.talleres.taller2', compact('datos', 'd'));

        }elseif ($plant == 3) {
            
            
             $taller = TallerCompletarEnunciado::where('taller_id', $consul->id)->firstOrfail(); 
             $tallers = $taller->completarEnlist;
             $datos = CompletarEnunciado::where('user_id', $user->id)->where('taller_id', $consul->id)->firstOrfail();
               if ($consul->plantilla_id == $plant && $consul->id == $id) {
                 return view('docentes.talleres.taller3', compact('datos', 'd', 'tallers', 'user'));
             }else {
            return abort(404);   
             }

        }elseif ($plant == 4) {
            
            
             $taller = TallerDiferencia::where('taller_id', $consul->id)->firstOrfail();

             $datos = Diferencia::where('user_id', $user->id)->where('taller_id', $consul->id)->firstOrfail();
            return view('docentes.talleres.taller4', compact('datos', 'd', 'user', 'taller'));



        }elseif ($plant == 5) {
           
            
            $taller = TallerSenalar::where('taller_id', $consul->id)->firstOrFail();
            $datos  = AlternativaCorrecta::where('user_id', $user->id)->where('taller_id', $consul->id)->firstOrfail();

            return view('docentes.talleres.taller5', compact('datos', 'd' , 'user', 'taller'));


        }elseif ($plant == 6) {
            
           
            
            $datos = Identificar::where('user_id', $user->id)->where('taller_id', $consul->id)->firstOrfail();
            // $datos = TallerIdentificarImagen::where('taller_id', $consul->id)->firstOrFail();
            return view('docentes.talleres.taller6', compact('datos', 'd', 'user'));

        }elseif ($plant == 7) {
           
            
             $datos = Gusanillo::where('user_id', $user->id)->where('taller_id', $consul->id)->firstOrfail();
             // $datos = TallerGusanillo::where('taller_id', $consul->id)->firstOrFail();
            return view('docentes.talleres.taller7', compact('datos', 'd', 'user'));

        }elseif ($plant == 8) {
           
            
            $taller = TallerCirculo::where('taller_id', $consul->id)->firstOrFail();
             $datos = Circulo::where('user_id', $user->id)->where('taller_id', $consul->id)->firstOrfail();
            return view('docentes.talleres.taller8', compact('datos', 'd', 'user', 'taller'));
        }elseif ($plant == 9) {
            
            
            $taller = TallerSubrayar::where('taller_id', $consul->id)->firstOrFail();
             $datos = Subrayar::where('user_id', $user->id)->where('taller_id', $consul->id)->where('taller_id', $consul->id)->firstOrfail(); 
// return $taller->tallerSubraOps;
            return view('docentes.talleres.taller9', compact('datos', 'd', 'user', 'taller'));

        }elseif ($plant == 10) {
             
            // $d= 0;
            $i= 0;
            
            $taller = TallerRelacionar::where('taller_id', $consul->id)->firstOrFail();

             $datos = Relacionar::where('user_id', $user->id)->where('taller_id', $consul->id)->firstOrfail(); 
            return view('docentes.talleres.taller10', compact('datos', 'd', 'i', 'user', 'taller'));


        }elseif ($plant == 11) {
           
            $i= 0;
            
             $taller = Taller2Relacionar::where('taller_id', $consul->id)->firstOrFail();
             $datos = Relacionar2::where('user_id', $user->id)->where('taller_id', $consul->id)->firstOrfail(); 
             $letraA = Relacionar2Re::where('relacionar2_id', $datos->id)->where('letra', 'A')->get(); 
             $letraB = Relacionar2Re::where('relacionar2_id', $datos->id)->where('letra', 'B')->get(); 
             // return $letraA;
            return view('docentes.talleres.taller11', compact('datos', 'd', 'user', 'letraA','taller', 'letraB'));


        }elseif ($plant == 12) {
           
            
            $datos = VerdaderoFalso::where('user_id', $user->id)->where('taller_id', $consul->id)->firstOrfail(); 
            $taller = TallerVerdaderoFalso::where('taller_id', $consul->id)->firstOrFail();
            return view('docentes.talleres.taller12', compact('datos', 'd', 'user', 'taller'));

        }elseif ($plant == 13) {
            $taller = TallerDefinirEnunciado::where('taller_id', $consul->id)->firstOrFail();
            $datos = DefinirEnunciado::where('user_id', $user->id)->where('taller_id', $consul->id)->firstOrfail(); 
            return view('docentes.talleres.taller13', compact('datos', 'd', 'user', 'taller'));

        }elseif ($plant == 14) {

            $taller = TallerIdentificarPersona::where('taller_id', $consul->id)->firstOrFail();
            $datos = IdentificarPersona::where('user_id', $user->id)->where('taller_id', $consul->id)->firstOrfail(); 
            return view('docentes.talleres.taller14', compact('datos', 'd', 'taller', 'user'));

        }elseif ($plant == 15) {

            $taller = TallerCheque::where('taller_id', $consul->id)->firstOrFail();
             $datos = Cheque::where('user_id', $user->id)->where('taller_id', $consul->id)->firstOrfail(); 
            return view('docentes.talleres.taller15', compact('datos', 'd', 'user', 'taller'));

        }elseif ($plant == 16) {

            $taller = TallerChequeEndoso::where('taller_id', $consul->id)->firstOrFail();
             $datos = ChequeEndoso::where('user_id', $user->id)->where('taller_id', $consul->id)->firstOrfail(); 
            return view('docentes.talleres.taller16', compact('datos', 'd', 'user', 'taller'));
        }elseif ($plant == 17) {

            $taller = TallerConvertirCheque::where('taller_id', $consul->id)->firstOrFail();
             $datos = ConvertirCheque::where('user_id', $user->id)->where('taller_id', $consul->id)->firstOrfail(); 
            return view('docentes.talleres.taller17', compact('datos', 'd', 'user', 'taller'));
        }elseif ($plant == 18) {

            $taller = TallerLetraCambio::where('taller_id', $consul->id)->firstOrFail();
            $datos = LetraCambio::where('user_id', $user->id)->where('taller_id', $consul->id)->firstOrFail();
            return view('docentes.talleres.taller18', compact('datos', 'd', 'user', 'taller'));
        }elseif ($plant == 19) {
            
             $taller = TallerCertificadoDeposito::where('taller_id', $consul->id)->firstOrFail();
             $datos = CertificadoDeposito::where('user_id', $user->id)->where('taller_id', $consul->id)->firstOrFail();
            return view('docentes.talleres.taller19', compact('datos', 'd', 'user', 'taller'));

        }elseif ($plant == 20) {

            
             $taller = TallerPagare::where('taller_id', $consul->id)->firstOrFail();
             $datos = Pagare::where('user_id', $user->id)->where('taller_id', $consul->id)->firstOrFail();
            return view('docentes.talleres.taller20', compact('datos', 'd', 'taller', 'user'));
        }elseif ($plant == 21) {

             $taller = TallerValeCaja::where('taller_id', $consul->id)->firstOrFail();
             $datos = ValeCaja::where('user_id', $user->id)->where('taller_id', $consul->id)->firstOrFail();
            return view('docentes.talleres.taller21', compact('datos', 'd', 'user', 'taller'));


        }elseif ($plant == 22) {
            
             $datos = TallerNotaPedido::where('taller_id', $consul->id)->firstOrFail();
            return view('docentes.talleres.taller22', compact('datos', 'd'));


        }elseif ($plant == 23) {
            
             $datos = TallerRecibo::where('taller_id', $consul->id)->firstOrFail();
            return view('docente.talleres.taller23', compact('datos', 'd'));

        }elseif ($plant == 24) {

            
             $datos = TallerOrdenPago::where('taller_id', $consul->id)->firstOrFail();
            return view('docente.talleres.taller24', compact('datos', 'd'));

        }elseif ($plant == 25) {
            $i= 0;
            
             $datos = TallerFactura::where('taller_id', $consul->id)->firstOrfail();
            return view('docente.talleres.taller25', compact('datos', 'd', 'i'));

        }elseif ($plant == 26) {
             $i= 0;
            
             $datos = TallerNotaVenta::where('taller_id', $consul->id)->firstOrfail();
            return view('docente.talleres.taller26', compact('datos', 'd', 'i'));

        }elseif ($plant == 27) {

            
            $datos = TallerAbreviatura::where('taller_id', $consul->id)->firstOrFail();
            return view('docente.talleres.taller27', compact('datos', 'd'));

        }elseif ($plant == 28) {
        	
            
            $datos = IdentificarAbreviatura::where('user_id', $user->id)->firstOrfail();
                return view('docentes.talleres.taller28', compact('datos', 'd', 'user'));  
         
        }elseif ($plant == 29) {
        	
            
            $datos = AbreviaturaCarta::where('user_id', $user->id)->firstOrfail();
            if ($consul->plantilla_id == $plant && $consul->id = $id) {
                return view('docentes.talleres.taller29', compact('datos', 'd', 'user'));  
             }else { 
            return abort(404);   
             }

        }elseif ($plant == 30){

        	
            
            $datos = AbreviaturaEditorial::where('user_id', $user->id)->firstOrfail();
            if ($consul->plantilla_id == $plant && $consul->id = $id) {
            return view('docentes.talleres.taller30', compact('datos', 'd', 'user'));  
             }else {
            return abort(404);   
             }
            }elseif ($plant == 31) {

            
             $datos = TallerCollage::where('taller_id', $consul->id)->firstOrFail();
            return view('docente.talleres.taller31', compact('datos', 'd'));

        }elseif ($plant == 32) {
        	
          	
          	$datos = AbreviaturaEconomica::where('taller_id', $consul->id)->firstOrFail();
            if ($consul->plantilla_id == $plant && $consul->id = $id) {
            return view('docentes.talleres.taller32', compact('datos', 'd', 'user'));  
             }else {
            return abort(404);   
          }
        
        }elseif ($plant == 33) {
            
             $datos = TallerPregunta::where('taller_id', $consul->id)->firstOrFail();
            return view('docente.talleres.taller33', compact('datos', 'd'));
        }elseif ($plant == 34) {
            $datos = Taller::findorfail($id);
            if ($datos->plantilla_id == $plant && $datos->id = $id) {
            return view('docente.talleres.taller34', compact('datos', 'd'));  
             }else {
            return abort(404);   
             }
        }elseif ($plant == 35) {
        	
            
            $datos = FormulasContable::where('taller_id', $consul->id)->firstOrFail();
            if ($consul->plantilla_id == $plant && $consul->id = $id) {
            return view('docentes.talleres.taller35', compact('datos', 'd', 'user'));  
             }else {
            return abort(404);   
             }
        }elseif ($plant == 36) {
            $a = 0;
            
            $datos = TallerAnalizar::where('taller_id', $consul->id)->firstOrFail();
            return view('docentes.talleres.taller36', compact('datos', 'd', 'a'));

        }elseif ($plant == 37) {
                JavaScript::put([
                 'taller' => $d,
                ]);
            
             $datos = TallerContabilidad::where('taller_id', $consul->id)->firstOrFail();
            return view('docente.talleres.taller37', compact('datos', 'd'));

        }elseif ($plant == 38) {
            
             $datos = TallerALectura::where('taller_id', $consul->id)->firstOrFail();
            return view('docente.talleres.taller38', compact('datos', 'd'));

        }elseif ($plant == 39) {

            
             $datos = TallerPalabra::where('taller_id', $consul->id)->firstOrFail();
             $str = "VUEDRAGGABLES";

            $arr1 = str_split($datos->letra);
            $claves = array_keys($arr1);
            $letra= [];
            shuffle($arr1);
            foreach($claves as $contenido){
                $letra[$contenido] = $arr1[$contenido];
            }
            return view('docente.talleres.taller39', compact('datos', 'd', 'letra'));
        }elseif ($plant == 40) {
            $a = 0;
            
            $datos = TallerIdenTransa::where('taller_id', $consul->id)->firstOrFail();
            return view('docente.talleres.taller40', compact('datos', 'd', 'a'));

        }elseif ($plant == 41) {
        		$user   = User::findorfail($us);
				
				$datos  = MapaConceptual::where('taller_id', $id)->firstOrFail();
                return view('docentes.talleres.taller41', compact('datos', 'd', 'user'));  
        }elseif ($plant == 42) {
            $datos = Taller::findorfail($id);
            $ideas = TallerOrdenIdea::select('id','idea')->where('taller_id',$id)->get();
            // $ideas = $datos->tallerOrdenIdea;

            if ($datos->plantilla_id == $plant && $datos->id = $id) {
            return view('docente.talleres.taller42', compact('datos', 'd', 'ideas'));  
             }else {
            return abort(404);   
             }
        }elseif ($plant == 43) {
            
             $datos = TallerMConceptual::where('taller_id', $consul->id)->firstOrFail();
            return view('docente.talleres.taller43', compact('datos', 'd'));
        }elseif ($plant == 44) {

            
             $datos = docente.tallerescribirCuenta::where('taller_id', $consul->id)->firstOrFail();
            return view('docente.talleres.taller44', compact('datos', 'd'));
        }elseif ($plant == 45) {

            
             $datos = TallerSopaLetra::where('taller_id', $consul->id)->firstOrFail();
            $palabras = explode(',', $datos->palabras);
                
            return view('docente.talleres.taller45', compact('datos', 'd', 'palabras'));
        }elseif ($plant == 46) {
            
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('docente.talleres.taller46', compact('datos', 'd'));
        }elseif ($plant == 47) {
            
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('docente.talleres.taller47', compact('datos', 'd'));
        }elseif ($plant == 48) {
            
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('docente.talleres.taller48', compact('datos', 'd'));
        }elseif ($plant == 49) {
            
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('docente.talleres.taller49', compact('datos', 'd'));
        }elseif ($plant == 50) {
            
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('docente.talleres.taller50', compact('datos', 'd'));
        }elseif ($plant == 51) {
            
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('docente.talleres.taller51', compact('datos', 'd'));
        }elseif ($plant == 52) {
            
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('docente.talleres.taller52', compact('datos', 'd'));
        }elseif ($plant == 53) {
            
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('docente.talleres.taller53', compact('datos', 'd'));
        }elseif ($plant == 54) {
            
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('docente.talleres.taller54', compact('datos', 'd'));
        }elseif ($plant == 55) {
            
             $datos = TallerClasificar::where('taller_id', $consul->id)->firstOrFail();
            return view('docente.talleres.taller55', compact('datos', 'd'));
        
        }elseif ($plant == 57) {
            
     
        }
        }
    }
    public function store1(Request $request, $tallerid)
    {
    	$message = Taller::find($tallerid);
		$user = User::find($request->user_id);
		// $update=Item::find($item_id); 
		$update_imei=$user->tallers()->where('taller_id',$tallerid)->first(); 
		$update_imei->pivot->status = 'calificado';
		$update_imei->pivot->calificacion = $request->calificacion;
		$update_imei->pivot->retroalimentacion = $request->retroalimentacion;
		$update_imei->pivot->save();
		// // using ->sync for multiple messages
		// // $message2 = Messages::find(456); // for testing
		// $user->tallers()->updateExistingPivot([$tallerid => ['status' => 'completado', 'calificacion' => $request->califiacion, 'retroalimentacion' => $request->retroalimentacion ] ]);
           return redirect()->route('docente')->with('datos', 'Datos Enviados Correctamnete');
		}

}
