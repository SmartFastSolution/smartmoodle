<?php

namespace App\Http\Controllers;

use App\Admin\TallerContabilidad;
use App\Contabilidad\BCARegistro;
use App\Contabilidad\BCRegistro;
use App\Contabilidad\BIActivo;
use App\Contabilidad\BIPasivo;
use App\Contabilidad\BIPatrimonio;
use App\Contabilidad\BalanceAjustado;
use App\Contabilidad\BalanceComprobacion;
use App\Contabilidad\BalanceInicial;
use App\Contabilidad\DGRDebe;
use App\Contabilidad\DGRHaber;
use App\Contabilidad\DGRegistro;
use App\Contabilidad\DiarioGeneral;
use App\Contabilidad\KPRegistro;
use App\Contabilidad\KardexPromedio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TallerContabilidadController extends Controller
{
    public function kardexPromedio(Request $request)
    {
        $id                 = Auth::id();
        $taller_id          = $request->id;
        $kardex             = $request->kardex_promedio;
        $kardexCompro       = KardexPromedio::where('user_id',$id)->where('taller_id', $taller_id)->count();
        if ($kardexCompro  == 0) {
        // $contenido          = TallerContabilidad::select('enunciado')->where('taller_id', $taller_id)->firstOrFail();
        $kardex_promedio            = new KardexPromedio;
        $kardex_promedio->taller_id            = $taller_id;
        $kardex_promedio->user_id              = $id;
        $kardex_promedio->nombre               = $request->nombre;
        $kardex_promedio->producto             = $request->producto;
        // $kardex_promedio->enunciado         = $contenido->enunciado;
        $kardex_promedio->inv_inicial_cantidad = $request->inv_inicial_cantidad;
        $kardex_promedio->adquisicion_cantidad = $request->adquisicion_cantidad;
        $kardex_promedio->ventas_cantidad      = $request->ventas_cantidad;
        $kardex_promedio->inv_final_cantidad   = $request->inv_final_cantidad;
        $kardex_promedio->inv_inicial_precio   = $request->inv_inicial_precio;
        $kardex_promedio->adquisicion_precio   = $request->adquisicion_precio;
        $kardex_promedio->ventas_precio        = $request->ventas_precio;
        $kardex_promedio->inv_final_precio     = $request->inv_final_precio;
        $kardex_promedio->save();

        $o = KardexPromedio::where('user_id', $id)->get()->last(); 

        foreach ($kardex as $key => $kardex_promedio) {
                  $datos=array(
                     'kardex_promedio_id'  => $o->id,
                     'fecha'               => $kardex_promedio['fecha'],
                     'movimiento'          => $kardex_promedio['movimiento'],
                     'tipo'                 => $kardex_promedio['tipo'],
                     'ingreso_cantidad'    => $kardex_promedio['ingreso_cantidad'],
                     'ingreso_precio'      => $kardex_promedio['ingreso_precio'],
                     'ingreso_total'       => $kardex_promedio['ingreso_total'],
                     'egreso_cantidad'     => $kardex_promedio['egreso_cantidad'],
                     'egreso_precio'       => $kardex_promedio['egreso_precio'],
                     'egreso_total'        => $kardex_promedio['egreso_total'],
                     'existencia_cantidad' => $kardex_promedio['existencia_cantidad'],
                     'existencia_precio'   => $kardex_promedio['existencia_precio'],
                     'existencia_total'    => $kardex_promedio['existencia_total'],
                     'created_at'          => now(),
                     'updated_at'          => now(),
                  );
                  KPRegistro::insert($datos);
            }
         return response(array(
                'success' => true,
                'estado'  => 'guardado',
                'message' => 'Kardex Promedio creado correctamente'
            ),200,[]);
        }elseif($kardexCompro  == 1){
        $ids                                 = [];
        $kardexComprob                       = KardexPromedio::where('user_id',$id)->where('taller_id', $taller_id)->first();
        $kardexComprob->nombre               = $request->nombre;
        $kardexComprob->producto             = $request->producto;
        // $kardexComprob->enunciado         = $contenido->enunciado;
        $kardexComprob->inv_inicial_cantidad = $request->inv_inicial_cantidad;
        $kardexComprob->adquisicion_cantidad = $request->adquisicion_cantidad;
        $kardexComprob->ventas_cantidad      = $request->ventas_cantidad;
        $kardexComprob->inv_final_cantidad   = $request->inv_final_cantidad;
        $kardexComprob->inv_inicial_precio   = $request->inv_inicial_precio;
        $kardexComprob->adquisicion_precio   = $request->adquisicion_precio;
        $kardexComprob->ventas_precio        = $request->ventas_precio;
        $kardexComprob->inv_final_precio     = $request->inv_final_precio;
        $kardexComprob->save();


        $registros= KPRegistro::where('kardex_promedio_id', $kardexComprob->id)->get();
        
        foreach($registros as $regis){
                $ids[]=$regis->id;
        }
        $deleteRegistros = KPRegistro::destroy($ids);
        $o = KardexPromedio::where('user_id', $id)->get()->last(); 
         foreach ($kardex as $key => $kardex_promedio) {
                    $datos=array(
                    'kardex_promedio_id'  => $o->id,
                     'fecha'               => $kardex_promedio['fecha'],
                     'movimiento'          => $kardex_promedio['movimiento'],
                     'tipo'                 => $kardex_promedio['tipo'],
                     'ingreso_cantidad'    => $kardex_promedio['ingreso_cantidad'],
                     'ingreso_precio'      => $kardex_promedio['ingreso_precio'],
                     'ingreso_total'       => $kardex_promedio['ingreso_total'],
                     'egreso_cantidad'     => $kardex_promedio['egreso_cantidad'],
                     'egreso_precio'       => $kardex_promedio['egreso_precio'],
                     'egreso_total'        => $kardex_promedio['egreso_total'],
                     'existencia_cantidad' => $kardex_promedio['existencia_cantidad'],
                     'existencia_precio'   => $kardex_promedio['existencia_precio'],
                     'existencia_total'    => $kardex_promedio['existencia_total'],
                     'created_at'          => now(),
                     'updated_at'          => now(),
                  );
                  KPRegistro::insert($datos);
            }



             return response(array(
                'success' => true,
                'estado' => 'actualizado',
                'message' => 'Balance de Comprobacion Ajustado actualizado correctamente'
            ),200,[]);

        }
    }

    public function obtenerKardexPromedio(Request $request)
    {
        $id         = Auth::id();
        $taller_id  = $request->id;
        $kardexpro = KardexPromedio::where('user_id',$id)->where('taller_id', $taller_id)->count();
        // $registros  = [];
        if ($kardexpro  == 1) {
            $kardexPromedio = KardexPromedio::select('id', 'nombre', 'producto', 'inv_inicial_cantidad', 'adquisicion_cantidad', 'ventas_cantidad', 'inv_final_cantidad', 'inv_inicial_precio', 'adquisicion_precio', 'ventas_precio', 'inv_final_precio',)->where('user_id',$id)->where('taller_id', $taller_id)->first();

            $obtener       = KPRegistro::select('fecha', 'movimiento', 'tipo', 'ingreso_cantidad', 'ingreso_precio', 'ingreso_total', 'egreso_cantidad', 'egreso_precio','egreso_total','existencia_cantidad','existencia_precio','existencia_total')->where('kardex_promedio_id', $kardexPromedio->id)->get();
        
            return response(array(
                'datos' => true,
                'informacion' => $kardexPromedio,
                'kardex_promedio' => $obtener
            ),200,[]);

         }else{
             return response(array(
                'datos' => false,
            ),200,[]);

         }
    }


    public function balanceAjustado(Request $request)
    {
        $id                 = Auth::id();
        $taller_id          = $request->id;
        $balances           = $request->balances;
        $balanceCompro      = BalanceAjustado::where('user_id',$id)->where('taller_id', $taller_id)->count();
        if ($balanceCompro  == 0) {
        $contenido          = TallerContabilidad::select('enunciado')->where('taller_id', $taller_id)->firstOrFail();
        $balance            = new BalanceAjustado;
        $balance->taller_id = $taller_id ;
        $balance->user_id   = $id;
        $balance->enunciado = $contenido->enunciado;
        $balance->total_debe  = $request->total_debe;
        $balance->total_haber = $request->total_haber;
        $balance->save();

        $o = BalanceAjustado::where('user_id', $id)->get()->last(); 

        foreach ($balances as $key => $balance) {
                  $datos=array(
                     'balance_ajustado_id' => $o->id,
                     'cuenta'                  => $balance['cuenta'],
                     'debe'                    => $balance['debe'],
                     'haber'                   => $balance['haber'],
                     'created_at'              => now(),
                     'updated_at'              => now(),
                  );
                  BCARegistro::insert($datos);
            }
         return response(array(
                'success' => true,
                'estado'  => 'guardado',
                'message' => 'Balance de Comprobacion Ajustado creado correctamente'
            ),200,[]);
        }elseif($balanceCompro  == 1){
        $ids                       = [];
        $balanceComprob            = BalanceAjustado::where('user_id',$id)->where('taller_id', $taller_id)->first();
        $balanceComprob->total_debe  = $request->total_debe;
        $balanceComprob->total_haber = $request->total_haber;
        $balanceComprob->save();


        $registros= BCARegistro::where('balance_ajustado_id', $balanceComprob->id)->get();
        
        foreach($registros as $regis){
                $ids[]=$regis->id;
        }
        $deleteRegistros = BCARegistro::destroy($ids);
        $o = BalanceAjustado::where('user_id', $id)->get()->last(); 
         foreach ($balances as $key => $balance) {
                  $datos=array(
                     'balance_ajustado_id' => $o->id,
                     'cuenta'                  => $balance['cuenta'],
                     'debe'                    => $balance['debe'],
                     'haber'                   => $balance['haber'],
                     'created_at'              => now(),
                     'updated_at'              => now(),
                  );
                  BCARegistro::insert($datos);
            }



             return response(array(
                'success' => true,
                'estado' => 'actualizado',
                'message' => 'Balance de Comprobacion Ajustado actualizado correctamente'
            ),200,[]);

        }
    }
    public function obtenerBalanceAjustado(Request $request)
    {
        $id         = Auth::id();
        $taller_id  = $request->id;
        $dioGeneral = BalanceAjustado::where('user_id',$id)->where('taller_id', $taller_id)->count();
        // $registros  = [];
        if ($dioGeneral  == 1) {
            $balanceCompro = BalanceAjustado::where('user_id',$id)->where('taller_id', $taller_id)->first();
            $obtener       = BCARegistro::select('cuenta','debe', 'haber')->where('balance_ajustado_id', $balanceCompro->id)->get();
        
            return response(array(
                'datos' => true,
                'bcomprobacionAjustado' => $obtener
            ),200,[]);

         }else{
             return response(array(
                'datos' => false,
            ),200,[]);

         }
    }
    public function balanceComprobacion(Request $request)
    {
        $id                 = Auth::id();
        $taller_id          = $request->id;
        $balances           = $request->balances;
        $balanceCompro      = BalanceComprobacion::where('user_id',$id)->where('taller_id', $taller_id)->count();
        if ($balanceCompro  == 0) {
        $contenido          = TallerContabilidad::select('enunciado')->where('taller_id', $taller_id)->firstOrFail();
        $balance            = new BalanceComprobacion;
        $balance->taller_id = $taller_id ;
        $balance->user_id   = $id;
        $balance->enunciado = $contenido->enunciado;
        $balance->sum_debe  = $request->sum_debe;
        $balance->sum_haber = $request->sum_haber;
        $balance->sal_debe  = $request->sal_debe;
        $balance->sal_haber = $request->sal_haber;
        $balance->save();

        $o = BalanceComprobacion::where('user_id', $id)->get()->last(); 

        foreach ($balances as $key => $balance) {
                  $datos=array(
                     'balance_comprobacion_id' => $o->id,
                     'cuenta'                  => $balance['cuenta'],
                     'suma_debe'               => $balance['suma_debe'],
                     'suma_haber'              => $balance['suma_haber'],
                     'saldo_debe'              => $balance['saldo_debe'],
                     'saldo_haber'             => $balance['saldo_haber'],
                     'created_at'              => now(),
                     'updated_at'              => now(),
                  );
                  BCRegistro::insert($datos);
            }
         return response(array(
                'success' => true,
                'estado' => 'guardado',
                'message' => 'Balance de Comprobacion creado correctamente'
            ),200,[]);
        }elseif($balanceCompro  == 1){
        $ids = [];
        $balanceComprob  = BalanceComprobacion::where('user_id',$id)->where('taller_id', $taller_id)->first();
        $balanceComprob->sum_debe  = $request->sum_debe;
        $balanceComprob->sum_haber = $request->sum_haber;
        $balanceComprob->sal_debe  = $request->sal_debe;
        $balanceComprob->sal_haber = $request->sal_haber;
        $balanceComprob->save();


        $registros= BCRegistro::where('balance_comprobacion_id', $balanceComprob->id)->get();
        
        foreach($registros as $regis){
                $ids[]=$regis->id;
        }
        $deleteRegistros = BCRegistro::destroy($ids);
        $o = BalanceComprobacion::where('user_id', $id)->get()->last(); 
         foreach ($balances as $key => $balance) {
                  $datos=array(
                     'balance_comprobacion_id' => $o->id,
                     'cuenta'                  => $balance['cuenta'],
                     'suma_debe'               => $balance['suma_debe'],
                     'suma_haber'              => $balance['suma_haber'],
                     'saldo_debe'              => $balance['saldo_debe'],
                     'saldo_haber'             => $balance['saldo_haber'],
                     'created_at'              => now(),
                     'updated_at'              => now(),
                  );
                  BCRegistro::insert($datos);
            }



             return response(array(
                'success' => true,
                'estado' => 'actualizado',
                'message' => 'Balance de Comprobacion actualizado correctamente'
            ),200,[]);

        }

    }
public function obtenerBalanceCompro(Request $request)
    {
        $id         = Auth::id();
        $taller_id  = $request->id;
        $dioGeneral = BalanceComprobacion::where('user_id',$id)->where('taller_id', $taller_id)->count();
        // $registros  = [];
        if ($dioGeneral  == 1) {
            $balanceCompro = BalanceComprobacion::where('user_id',$id)->where('taller_id', $taller_id)->first();
            $obtener       = BCRegistro::select('cuenta','suma_debe', 'suma_haber', 'saldo_debe', 'saldo_haber')->where('balance_comprobacion_id', $balanceCompro->id)->get();
        
            return response(array(
                'datos' => true,
                'bcomprobacion' => $obtener
            ),200,[]);

         }else{
             return response(array(
                'datos' => false,
            ),200,[]);

         }
    }

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

    if ($balanceInicial >= 1 ) { 
        $datos1 = BalanceInicial::where('user_id',$id)->where('taller_id', $taller_id)->where('tipo', 'horizontal')->count();
        $datos2 = BalanceInicial::where('user_id',$id)->where('taller_id', $taller_id)->where('tipo', 'vertical')->count();

        if ($tipo == 'horizontal' && $datos1 == 1) {
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
        }elseif ($tipo == 'vertical' && $datos2 == 1) {
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

