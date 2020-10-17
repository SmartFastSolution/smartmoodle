<?php

namespace App\Http\Controllers;

use App\Admin\TallerContabilidad;
use App\Contabilidad\BIActivo;
use App\Contabilidad\BIPatrimonio;
use App\Contabilidad\BIPasivo;
use App\Contabilidad\BalanceInicial;
use App\Contabilidad\DiarioGeneral;
use App\Contabilidad\DGRegistro;
use App\Contabilidad\DGRDebe;
use App\Contabilidad\DGRHaber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TallerContabilidadController extends Controller
{
    public function balance_inicial(Request $request)
    {
        $id            = Auth::id();
        $taller_id     = $request->id;
        $tipo          = $request->tipo;
        $balanceInicial    = BalanceInicial::where('user_id',$id)->where('taller_id', $taller_id)->where('tipo', $tipo)->count();

        if ($balanceInicial == 0) { 

        $a_corriente   = $request->a_corriente;
        $a_nocorriente = $request->a_nocorriente;
        $p_corriente   = $request->p_corriente;
        $p_nocorriente = $request->p_nocorriente;
        $patrimonios   = $request->patrimonio;

        $contenido = TallerContabilidad::select('enunciado')->where('taller_id', $taller_id)->firstOrFail();
        $binicial                          = new BalanceInicial; 
        $binicial->taller_id               = $taller_id;
        $binicial->user_id                 = $id;
        $binicial->tipo                    = $tipo;
        $binicial->enunciado               = $contenido->enunciado;
        $binicial->nombre                  = $request->nombre;
        $binicial->fecha                   = $request->fecha;
        $binicial->total_pasivo_patrimonio = $request->t_patrimonio;
		$binicial->save();

    if ($tipo == 'horizontal') {
        $a = BalanceInicial::where('user_id', $id)->where('tipo', $tipo)->get()->last(); 
        $diariogeneral                     = new DiarioGeneral;
        $diariogeneral->taller_id          = $taller_id;
        $diariogeneral->user_id            = $id;
        $diariogeneral->balance_inicial_id = $a->id;
        $diariogeneral->enunciado          = $contenido->enunciado;
        $diariogeneral->nombre             = $request->nombre;
        $diariogeneral->completado         = false;
        $diariogeneral->save();
    }    
		if ($binicial == true) {
			   $o = BalanceInicial::where('user_id', $id)->get()->last(); 
               foreach ($a_corriente as $key => $activos) {
                  $datos=array(
                     'balance_inicial_id' => $o->id,
                     'nom_cuenta'         => $activos['nom_cuenta'],
                     'saldo'              => $activos['saldo'],
                     'tipo'               => 'corriente',
                     'created_at'         => now(),
                     'updated_at'         => now(),
                  );
                  BIActivo::insert($datos);
               }
                foreach ($a_nocorriente as $key => $activo) {
                  $datos=array(
                     'balance_inicial_id' => $o->id,
                     'nom_cuenta'         => $activo['nom_cuenta'],
                     'saldo'              => $activo['saldo'],
                     'tipo'               => 'nocorriente',
                     'created_at'         => now(),
                     'updated_at'         => now(),
                  );
                  BIActivo::insert($datos);
               }
                foreach ($p_corriente as $key => $pasivos) {
                  $datos=array(
                     'balance_inicial_id' => $o->id,
                     'nom_cuenta'         => $pasivos['nom_cuenta'],
                     'saldo'              => $pasivos['saldo'],
                     'tipo'               => 'corriente',
                     'created_at'         => now(),
                     'updated_at'         => now(),
                  );
                  BIPasivo::insert($datos);
               }
               foreach ($p_nocorriente as $key => $pasivo) {
                  $datos=array(
                     'balance_inicial_id' => $o->id,
                     'nom_cuenta'         => $pasivo['nom_cuenta'],
                     'saldo'              => $pasivo['saldo'],
                     'tipo'               => 'nocorriente',
                     'created_at'         => now(),
                     'updated_at'         => now(),
                  );
                  BIPasivo::insert($datos);
               }
                 foreach ($patrimonios as $key => $patri) {
                     $datos               =array(
                     'balance_inicial_id' => $o->id,
                     'nom_cuenta'         => $patri['nom_cuenta'],
                     'saldo'              => $patri['saldo'],
                     'created_at'         => now(),
                     'updated_at'         => now(),
                  );
                  BIPatrimonio::insert($datos);
               }

             return response(array(
                'success' => true,
                'message' => 'Balance Inicial creado correctamente'
            ),200,[]);
			
		} 
    }else if($balanceInicial == 1){
       
        $o = BalanceInicial::where('user_id',$id)->where('taller_id', $taller_id)->where('tipo', $tipo)->first();
            $a_corriente   = $request->a_corriente;
            $a_nocorriente = $request->a_nocorriente;
            $p_corriente   = $request->p_corriente;
            $p_nocorriente = $request->p_nocorriente;
            $patrimonios   = $request->patrimonio;
            $o->fecha      = $request->fecha;
            $o->nombre     = $request->nombre;
            $o->save();

            $activ=BIActivo::where('balance_inicial_id', $o->id)->get();

            foreach($activ as $act){
                $ids[]=$act->id;
            }
            $activosdelete = BIActivo::destroy($ids);

            $pasi =  BIPasivo::where('balance_inicial_id', $o->id)->get();
            foreach($pasi as $pas){
                $ids1[]=$pas->id;
            }

            $pasivosdelete = BIPasivo::destroy($ids1);

            $patrim = BIPatrimonio::where('balance_inicial_id', $o->id)->get();
             foreach($patrim as $pas){
                $ids2[]=$pas->id;
            }
            $patrimoniodelete  = BIPatrimonio::destroy($ids2);

            foreach ($a_corriente as $key => $activos) {
                  $datos=array(
                     'balance_inicial_id' => $o->id,
                     'nom_cuenta'         => $activos['nom_cuenta'],
                     'saldo'              => $activos['saldo'],
                     'tipo'               => 'corriente',
                     'created_at'         => now(),
                     'updated_at'         => now(),
                  );
                  BIActivo::insert($datos);
               }
                foreach ($a_nocorriente as $key => $activo) {
                  $datos=array(
                     'balance_inicial_id' => $o->id,
                     'nom_cuenta'         => $activo['nom_cuenta'],
                     'saldo'              => $activo['saldo'],
                     'tipo'               => 'nocorriente',
                     'created_at'         => now(),
                     'updated_at'         => now(),
                  );
                  BIActivo::insert($datos);
               }
                foreach ($p_corriente as $key => $pasivos) {
                  $datos=array(
                     'balance_inicial_id' => $o->id,
                     'nom_cuenta'         => $pasivos['nom_cuenta'],
                     'saldo'              => $pasivos['saldo'],
                     'tipo'               => 'corriente',
                     'created_at'         => now(),
                     'updated_at'         => now(),
                  );
                  BIPasivo::insert($datos);
               }
               foreach ($p_nocorriente as $key => $pasivo) {
                  $datos=array(
                     'balance_inicial_id' => $o->id,
                     'nom_cuenta'         => $pasivo['nom_cuenta'],
                     'saldo'              => $pasivo['saldo'],
                     'tipo'               => 'nocorriente',
                     'created_at'         => now(),
                     'updated_at'         => now(),
                  );
                  BIPasivo::insert($datos);
               }
                 foreach ($patrimonios as $key => $patri) {
                     $datos               =array(
                     'balance_inicial_id' => $o->id,
                     'nom_cuenta'         => $patri['nom_cuenta'],
                     'saldo'              => $patri['saldo'],
                     'created_at'         => now(),
                     'updated_at'         => now(),
                  );
                  BIPatrimonio::insert($datos);
               }


        return response(array(
            'success'   =>  false,
            'tipo'      => $tipo,
            'message'   => 'Datos Actualizados Correctamente',             
            ),200,[]);
    }
}
public function obtenerbalance(Request $request)
{
    $id            = Auth::id();
    $taller_id     = $request->id;
    $tipo          = $request->tipo;
    $balanceInicial = BalanceInicial::where('user_id',$id)->where('taller_id', $taller_id)->count();

    if ($balanceInicial >= 1) { 
        if ($tipo == 'horizontal') {
                $datos = BalanceInicial::where('user_id',$id)->where('taller_id', $taller_id)->where('tipo', $tipo)->first();
    $a_corrientes      = BIActivo::select('nom_cuenta', 'saldo')->where('balance_inicial_id', $datos->id)->where('tipo', 'corriente')->get();
    $a_nocorrientes    = BIActivo::select('nom_cuenta', 'saldo')->where('balance_inicial_id', $datos->id)->where('tipo', 'nocorriente')->get();
    $p_corriente       = BIPasivo::select('nom_cuenta', 'saldo')->where('balance_inicial_id', $datos->id)->where('tipo', 'corriente')->get();
    $p_nocorriente     = BIPasivo::select('nom_cuenta', 'saldo')->where('balance_inicial_id', $datos->id)->where('tipo', 'nocorriente')->get();
    $patrimonios       = $datos->bPatrimonios;

        return response(array(
            'datos' => true,
                'nombre' => $datos->nombre,
                'fecha' => $datos->fecha,
                'total_pasivo_patrimonio' => $datos->total_pasivo_patrimonio,
                'a_corriente' => $a_corrientes,
                'a_nocorriente' => $a_nocorrientes,
                'p_corriente' => $p_corriente,
                'p_nocorriente' => $p_nocorriente,
                'patrimonios' => $patrimonios,
            ),200,[]);
        }elseif ($tipo == 'vertical') {
    $datos = BalanceInicial::where('user_id',$id)->where('taller_id', $taller_id)->where('tipo', $tipo)->first();
    $a_corrientes      = BIActivo::select('nom_cuenta', 'saldo')->where('balance_inicial_id', $datos->id)->where('tipo', 'corriente')->get();
    $a_nocorrientes    = BIActivo::select('nom_cuenta', 'saldo')->where('balance_inicial_id', $datos->id)->where('tipo', 'nocorriente')->get();
    $p_corriente       = BIPasivo::select('nom_cuenta', 'saldo')->where('balance_inicial_id', $datos->id)->where('tipo', 'corriente')->get();
    $p_nocorriente     = BIPasivo::select('nom_cuenta', 'saldo')->where('balance_inicial_id', $datos->id)->where('tipo', 'nocorriente')->get();
    $patrimonios       = $datos->bPatrimonios;

        return response(array(
            'datos' => true,
                'nombre' => $datos->nombre,
                'fecha' => $datos->fecha,
                'total_pasivo_patrimonio' => $datos->total_pasivo_patrimonio,
                'a_corriente' => $a_corrientes,
                'a_nocorriente' => $a_nocorrientes,
                'p_corriente' => $p_corriente,
                'p_nocorriente' => $p_nocorriente,
                'patrimonios' => $patrimonios,
            ),200,[]);
        }

    }else{
          return response(array(
            'datos' => false,
            ),200,[]);
    }
}
    public function b_inicial_diario(Request $request)
    {
        $id                = Auth::id();
        $taller_id         = $request->id;

        $conteo    = BalanceInicial::where('user_id',$id)->where('taller_id', $taller_id)->where('tipo', 'horizontal')->count();

        if ($conteo  == 1) {
        $balanceInicial    = BalanceInicial::where('user_id',$id)->where('taller_id', $taller_id)->where('tipo', 'horizontal')->first();
        $activos           = $balanceInicial->bActivos;
        $pasivo            = $balanceInicial->bPasivos;
        $patrimonios       = $balanceInicial->bPatrimonios;
        $pasivo_patrimonio = [];

        foreach ($pasivo as $valu) {
        $pasivo_patrimonio[]= $valu;       
        }
        foreach ($patrimonios as $valu) {
        $pasivo_patrimonio[]= $valu;       
        }

        // BIActivo::where('balance_inicial_id', $balanceInicial->id)->get();
         return response(array(
            'datos' => true,
                'nombre' => $balanceInicial->nombre,
                'fecha' => $balanceInicial->fecha,
                'activos' => $activos,
                'pasivos' => $pasivo_patrimonio
            ),200,[]);
        }else{
             return response(array(
                'datos' => false,
            ),200,[]);
        }
     
    }
    public function obtenerdiario(Request $request)
    {
        $id                = Auth::id();
        $taller_id         = $request->id;
        $dioGeneral    = DiarioGeneral::where('user_id',$id)->where('taller_id', $taller_id)->count();
        $registros = [];
        if ($dioGeneral  == 1) {
              $diairioGeneral    = DiarioGeneral::where('user_id',$id)->where('taller_id', $taller_id)->first();
        $obtener = DGRegistro::where('diario_general_id', $diairioGeneral->id)->orderBy('fecha')->get();
            foreach ($obtener as $key => $registro) {
                $regis = array(
                    'debe' => $registro->dgrDebe,
                    'haber'=>$registro->dgrHaber,
                    'comentario' => $registro->comentario
                );
                $registros[]= $regis;
            }
            return response(array(
                'datos' => true,
                'dgeneral' => $registros
            ),200,[]);
         }else{
             return response(array(
                'datos' => false,
            ),200,[]);

         }
    }

    public function diario(Request $request)
    {
        $id                = Auth::id();
        $taller_id         = $request->id;
        $registro = $request->registro;

        $diariogeneral = DiarioGeneral::where('user_id',$id)->where('taller_id', $taller_id)->count();
        if ($diariogeneral == 1) { 
        $cu = DiarioGeneral::where('user_id',$id)->where('taller_id', $taller_id)->first();

        $cuenta = DGRegistro::where('diario_general_id',$cu->id)->count();
                                             // SI YA ESTA CREADO EL REGISTRO DEL DIARIO GENERAL, PARA ESO PRIMERO DEBE TENER CONCLUIDO EL BALANCE INICIAL
if ($cuenta == 0) {
        $diariog = DiarioGeneral::where('user_id',$id)->where('taller_id', $taller_id)->first();
        
        $debe =[];
        $haber =[];
        foreach ($registro as $key => $value) {                         //RECORRER TODOS LOS REGISTROS EN EL ARRAY
            $regis=array(
                     'diario_general_id'  => $diariog->id,
                     'no_registro'        => $key + 1,
                     'comentario'         => $value['comentario'],
                     'fecha'              => $value['debe'][0]['fecha'],
                     'created_at'         => now(),
                     'updated_at'         => now(),
                  );
                  DGRegistro::insert($regis);                           //GUARDAR CADA REGISTRO EN LA BASE DE DATOS
        }
        $register = $diariog->dgRegistro;
        foreach ($registro as $key => $value) {                         ////RECORRER TODOS LOS REGISTROS EN EL ARRAY
            foreach ($value['debe'] as $key1 => $value1) {              ////RECORRER TODOS LAS CUENTAS DE DEBE QUE PERTENECEN A UN REGISTRO
                $regis1=array(
                     'd_g_registro_id'  => $register[$key]->id,
                     'nom_cuenta'        => $value1['nom_cuenta'],
                     'saldo'              => $value1['saldo'],
                     'fecha'              => $value1['fecha'],
                     'created_at'         => now(),
                     'updated_at'         => now(),
                  );
                  DGRDebe::insert($regis1);                             //GURDAR ESAS CUENTAS EN LA TABLA DEBE CON EL ID DEL REGISTRO AL QUE CORRESPONDEN
            }
              foreach ($value['haber'] as $key2 => $value2) {           ////RECORRER TODOS LAS CUENTAS DE HABER QUE PERTENECEN A UN REGISTRO
                $regis2=array(
                     'd_g_registro_id'  => $register[$key]->id,
                     'nom_cuenta'        => $value2['nom_cuenta'],
                     'saldo'              => $value2['saldo'],
                     'created_at'         => now(),
                     'updated_at'         => now(),
                  );
                  DGRHaber::insert($regis2);                            //GURDAR ESAS CUENTAS EN LA TABLA HABER CON EL ID DEL REGISTRO AL QUE CORRESPONDEN
            }
        }
        $diariog->completado = true;                                    //CAMBIAR EL VALOR DE COMPLETADO A TRUE /// ESTO SIGNIFICA QUE EL TALLER HA SIDO COMPLETADO
        $diariog->save();                                             //GUARDAR ESE CAMBIO
         return response(array(                                         //ENVIO DE RESPUESTA
                'success' => true,
                'message' => 'Diario General creado correctamente'
            ),200,[]);
}elseif ($cuenta >= 1) {
        $diariog = DiarioGeneral::where('user_id',$id)->where('taller_id', $taller_id)->first();
        $debe =[];
        $haber =[];

        $registros= DGRegistro::where('diario_general_id', $diariog->id)->get();
        
        foreach($registros as $act){
                $ids[]=$act->id;
        }
        $deleteRegistros = DGRegistro::destroy($ids);

        foreach($registro as $key => $value) {                         //RECORRER TODOS LOS REGISTROS EN EL ARRAY
            $regis=array(
                     'diario_general_id'  => $diariog->id,
                     'no_registro'        => $key + 1,
                     'comentario'         => $value['comentario'],
                     'fecha'              => $value['debe'][0]['fecha'],
                     'created_at'         => now(),
                     'updated_at'         => now(),
                  );
                  DGRegistro::insert($regis);                           //GUARDAR CADA REGISTRO EN LA BASE DE DATOS
        }

        $register = $diariog->dgRegistro;
        foreach ($registro as $key => $value) {                       ////RECORRER TODOS LOS REGISTROS EN EL ARRAY
            foreach ($value['debe'] as $key1 => $value1) {              ////RECORRER TODOS LAS CUENTAS DE DEBE QUE PERTENECEN A UN REGISTRO
                $regis1=array(
                     'd_g_registro_id'  => $register[$key]->id,
                     'nom_cuenta'        => $value1['nom_cuenta'],
                     'saldo'              => $value1['saldo'],
                     'fecha'              => $value1['fecha'],
                     'created_at'         => now(),
                     'updated_at'         => now(),
                  );
                  DGRDebe::insert($regis1);                             //GURDAR ESAS CUENTAS EN LA TABLA DEBE CON EL ID DEL REGISTRO AL QUE CORRESPONDEN
            }
              foreach ($value['haber'] as $key2 => $value2) {           ////RECORRER TODOS LAS CUENTAS DE HABER QUE PERTENECEN A UN REGISTRO
                $regis2=array(
                     'd_g_registro_id'  => $register[$key]->id,
                     'nom_cuenta'        => $value2['nom_cuenta'],
                     'saldo'              => $value2['saldo'],
                     'created_at'         => now(),
                     'updated_at'         => now(),
                  );
                  DGRHaber::insert($regis2);                            //GURDAR ESAS CUENTAS EN LA TABLA HABER CON EL ID DEL REGISTRO AL QUE CORRESPONDEN
            }      
}
   return response(array(
                'success' => 'act',
                'message' => 'Datos Actualizados Correctamente'
            ),200,[]);
}
         } else { 
                                                               // SI NO TIENE CREADO EL BALANCE INICIAL ANTES DE GUARDAR, LE SALDRA UNA NOTIFICACION INDICANDO DICHO PUNTO
            return response(array(
                'success' => false,
                'message' => 'Debes de crear el Balance Inicial primero'
            ),200,[]);
        }
    }
}

