<?php

namespace App\Http\Controllers;

use App\Admin\TallerContabilidad;
use App\Anexocaja;
use App\Arqueocajas;
use App\Cajadatos;
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
use App\Contabilidad\KFRegistro;
use App\Contabilidad\KFRMovimiento;
use App\Contabilidad\KardexPromedio;

use App\Movimientocajas;

use App\Contabilidad\KardexFIfo;
use App\Librobanco;
use App\Movimientobanco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TallerContabilidadController extends Controller
{
        public function kardexFifo(Request $request)
    {
        $id            = Auth::id();
        $taller_id     = $request->id;
        $producto_id   = $request->producto_id;
        $transacciones = $request->kardex_fifo;
        $conteokardex  = KardexFifo::where('user_id',$id)->where('taller_id', $taller_id)->where('producto_id', $producto_id)->count();
        if ($conteokardex == 0) { 

        $kardexfifo                       = new KardexFifo;
        $kardexfifo->taller_id            = $taller_id;
        $kardexfifo->user_id              = $id;
        $kardexfifo->producto_id          = $request->producto_id;
        $kardexfifo->nombre               = $request->nombre;
        $kardexfifo->producto             = $request->producto;
        $kardexfifo->inv_inicial_cantidad = $request->inv_inicial_cantidad;
        $kardexfifo->adquisicion_cantidad = $request->adquisicion_cantidad;
        $kardexfifo->ventas_cantidad      = $request->ventas_cantidad;
        $kardexfifo->inv_final_cantidad   = $request->inv_final_cantidad;
        $kardexfifo->inv_inicial_precio   = $request->inv_inicial_precio;
        $kardexfifo->adquisicion_precio   = $request->adquisicion_precio;
        $kardexfifo->ventas_precio        = $request->ventas_precio;
        $kardexfifo->inv_final_precio     = $request->inv_final_precio;
        $kardexfifo->save();

        $kardexF = KardexFifo::where('user_id', $id)->get()->last();
            foreach ($transacciones as $key => $value) {                         //RECORRER TODOS LOS REGISTROS EN EL ARRAY
                $regis=array(
                         'kardex_fifo_id'     => $kardexF->id,
                         'no_registro'        => $key + 1,
                         // 'comentario'         => $value['comentario'],
                         // 'fecha'              => $value['debe']['fecha'],
                         'created_at'         => now(),
                         'updated_at'         => now(),
                    );
                KFRegistro::insert($regis);                           //GUARDAR CADA REGISTRO EN LA BASE DE DATOS
            }
            $register = $kardexF->kfRegistro;
            foreach ($transacciones as $key => $value) {                         ////RECORRER TODOS LOS REGISTROS EN EL ARRAY
                foreach ($value as $key1 => $value1) {              ////RECORRER TODOS LAS CUENTAS DE DEBE QUE PERTENECEN A UN REGISTRO
                    $regis1=array(
                         'k_f_registro_id'     => $register[$key]->id,
                         'fecha'               => $value1['fecha'],
                         'movimiento'          => $value1['movimiento'],
                         'tipo'                => $value1['tipo'],
                         'ingreso_cantidad'    => $value1['ingreso_cantidad'],
                         'ingreso_precio'      => $value1['ingreso_precio'],
                         'ingreso_total'       => $value1['ingreso_total'],
                         'egreso_cantidad'     => $value1['egreso_cantidad'],
                         'egreso_precio'       => $value1['egreso_precio'],
                         'egreso_total'        => $value1['egreso_total'],
                         'existencia_cantidad' => $value1['existencia_cantidad'],
                         'existencia_precio'   => $value1['existencia_precio'],
                         'existencia_total'    => $value1['existencia_total'],
                         'created_at'          => now(),
                         'updated_at'          => now(),
                      );
                KFRMovimiento::insert($regis1);                             //GURDAR ESAS CUENTAS EN LA TABLA DEBE CON EL ID DEL REGISTRO AL QUE CORRESPONDEN
                }
            }                                           //GUARDAR ESE CAMBIO
             return response(array(                                         //ENVIO DE RESPUESTA
                    'success' => true,
                    'estado' => 'guardado',
                    'message' => 'Kardex Fifo creado correctamente'
                ),200,[]);
            
    }else{
    $kardexfifod  = KardexFifo::where('user_id',$id)->where('taller_id', $taller_id)->where('producto_id', $producto_id)->first();
    $idkardex = $kardexfifod->id;
    $kardexfifod->delete();
       $kardexfifo                       = new KardexFifo;
        $kardexfifo->id                    = $idkardex;
        $kardexfifo->taller_id            = $taller_id;
        $kardexfifo->user_id              = $id;
        $kardexfifo->producto_id          = $request->producto_id;
        $kardexfifo->nombre               = $request->nombre;
        $kardexfifo->producto             = $request->producto;
        $kardexfifo->inv_inicial_cantidad = $request->inv_inicial_cantidad;
        $kardexfifo->adquisicion_cantidad = $request->adquisicion_cantidad;
        $kardexfifo->ventas_cantidad      = $request->ventas_cantidad;
        $kardexfifo->inv_final_cantidad   = $request->inv_final_cantidad;
        $kardexfifo->inv_inicial_precio   = $request->inv_inicial_precio;
        $kardexfifo->adquisicion_precio   = $request->adquisicion_precio;
        $kardexfifo->ventas_precio        = $request->ventas_precio;
        $kardexfifo->inv_final_precio     = $request->inv_final_precio;
        $kardexfifo->save();

        $kardexF = KardexFifo::where('user_id', $id)->where('producto_id', $producto_id)->get()->last();
            foreach ($transacciones as $key => $value) {                         //RECORRER TODOS LOS REGISTROS EN EL ARRAY
                $regis=array(
                         'kardex_fifo_id'     => $kardexF->id,
                         'no_registro'        => $key + 1,
                         // 'comentario'         => $value['comentario'],
                         // 'fecha'              => $value['debe']['fecha'],
                         'created_at'         => now(),
                         'updated_at'         => now(),
                    );
                KFRegistro::insert($regis);                           //GUARDAR CADA REGISTRO EN LA BASE DE DATOS
            }
            $register = $kardexF->kfRegistro;
            foreach ($transacciones as $key => $value) {                         ////RECORRER TODOS LOS REGISTROS EN EL ARRAY
                foreach ($value as $key1 => $value1) {              ////RECORRER TODOS LAS CUENTAS DE DEBE QUE PERTENECEN A UN REGISTRO
                    $regis1=array(
                         'k_f_registro_id'     => $register[$key]->id,
                         'fecha'               => $value1['fecha'],
                         'movimiento'          => $value1['movimiento'],
                         'tipo'                => $value1['tipo'],
                         'ingreso_cantidad'    => $value1['ingreso_cantidad'],
                         'ingreso_precio'      => $value1['ingreso_precio'],
                         'ingreso_total'       => $value1['ingreso_total'],
                         'egreso_cantidad'     => $value1['egreso_cantidad'],
                         'egreso_precio'       => $value1['egreso_precio'],
                         'egreso_total'        => $value1['egreso_total'],
                         'existencia_cantidad' => $value1['existencia_cantidad'],
                         'existencia_precio'   => $value1['existencia_precio'],
                         'existencia_total'    => $value1['existencia_total'],
                         'created_at'          => now(),
                         'updated_at'          => now(),
                      );
                KFRMovimiento::insert($regis1);                             //GURDAR ESAS CUENTAS EN LA TABLA DEBE CON EL ID DEL REGISTRO AL QUE CORRESPONDEN
                }
            }                                           //GUARDAR ESE CAMBIO
             return response(array(                                         //ENVIO DE RESPUESTA
                    'success' => true,
                    'estado' => 'actualizado',
                    'message' => 'Kardex Fifo actualizado correctamente'
                ),200,[]);
            


    }
}
    public function obtenerKardexFifo(Request $request)
    {
        $id         = Auth::id();
        $taller_id  = $request->id;
        $producto_id = $request->producto_id;
        $kardexFifo = KardexFifo::where('user_id',$id)->where('taller_id', $taller_id)->where('producto_id', $producto_id)->count();
        $registros  = [];
        if ($kardexFifo  >= 1) {
              $kardex  = KardexFifo::select('id', 'nombre', 'producto', 'inv_inicial_cantidad', 'adquisicion_cantidad', 'ventas_cantidad', 'inv_final_cantidad', 'inv_inicial_precio', 'adquisicion_precio', 'ventas_precio', 'inv_final_precio')->where('user_id',$id)->where('taller_id', $taller_id)->where('producto_id', $producto_id)->first();

        $obtener = KFRegistro::where('kardex_fifo_id', $kardex->id)->get();
            foreach ($obtener as $key => $registro) {
                $registros[$key]= $registro->kfrMovimientos;
            }
            return response(array(
                'datos' => true,
                'kardex_fifo' => $registros,
                'informacion' => $kardex
            ),200,[]);

         }else{
             return response(array(
                'datos' => false,
            ),200,[]);

         }
    }

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
                     'balance_ajustado_id'     => $o->id,
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
if ($diariogeneral == 1){ 
        $cu = DiarioGeneral::where('user_id',$id)->where('taller_id', $taller_id)->first();
        $cuenta = DGRegistro::where('diario_general_id',$cu->id)->count();

                                             // SI YA ESTA CREADO EL REGISTRO DEL DIARIO GENERAL, PARA ESO PRIMERO DEBE TENER CONCLUIDO EL BALANCE INICIAL
     if ($cuenta == 0) {

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
    public function AnexoCaja(Request $request)
    {
       $user_id = Auth::id();
       $taller_id            = $request->id;
       $nombre               =$request->nombre;
       $libros_cajas         =$request->libros_caja;
       $anexocaja            = Anexocaja::where('user_id', $user_id)->where('taller_id',$taller_id)->count();
       if($anexocaja == 0){
          $mc   = new Anexocaja;
          $mc->taller_id = $taller_id;
          $mc->user_id   = $user_id;
          $mc->nombre    = $nombre;
          $mc->totaldebe      = $request->debe;
          $mc->totalhaber     = $request->haber;    
          $mc->save();

          $a = Anexocaja::where('user_id', $user_id)->get()->last();

          foreach($libros_cajas as $key=>$lc){

            $datos = array(
               'anexocaja_id'      => $a->id,
               'fecha'             =>$lc['fecha'],
               'detalle'           =>$lc['detalle'],
               'debe'              =>$lc['debe'],
               'haber'             =>$lc['haber'],
               'saldo'             =>$lc['saldo'],
               'created_at'        => now(),
               'updated_at'        => now(),

            );
            Cajadatos::insert($datos);
           }
          return response(array(
            'success' => true,
            'estado'  => 'guardado',
            'message' => 'Anexo Libro Caja creado correctamente'
        ),200,[]);

       } elseif($anexocaja == 1){
        
        $ids                 =[];
       $accanexo             = Anexocaja::where('user_id', $user_id)->where('taller_id', $taller_id)->first();
       $accanexo->nombre     =$request->nombre;
       $accanexo->totaldebe  = $request->debe;
       $accanexo->totalhaber = $request->haber;
       $accanexo->save();

       $registros= Cajadatos::where('anexocaja_id', $accanexo->id)->get();

       foreach($registros as $r){
          $ids[]= $r->id;
       }
        $deleteregistros = Cajadatos::destroy($ids);
        $a = Anexocaja::where('user_id', $user_id)->get()->last();

        foreach($libros_cajas as $key=>$lc){

          $datos = array(
             'anexocaja_id'  =>$a->id,
             'fecha'         =>$lc['fecha'],
             'detalle'       =>$lc['detalle'],
             'debe'          =>$lc['debe'],
             'haber'         =>$lc['haber'],
             'saldo'         =>$lc['saldo'],
             'created_at'              => now(),
             'updated_at'              => now(),

          );
          Cajadatos::insert($datos);
         }
        return response(array(
          'success' => true,
          'estado'  => 'actualizado',
          'message' => 'Anexo Libro Caja Actualizado correctamente'
      ),200,[]);
       }
    }

    public function obtenerLibroCaja(Request $request){
     
        $user_id =Auth::id();        
        $taller_id = $request->id;
    
        $obanexo = Anexocaja::where('user_id', $user_id)->where('taller_id', $taller_id)->count();
            if($obanexo == 1){
           $anexocaja = Anexocaja::where('user_id', $user_id)->where('taller_id', $taller_id)->first();
           $obtenerc  = Cajadatos::select('fecha','detalle','debe','haber','saldo')->where('anexocaja_id',$anexocaja->id)->get();

           return response(array(
            'datos' => true,
            'banexocaja' => $obtenerc,
            'nombre' =>$anexocaja->nombre
        ),200,[]);
        }else{
            return response(array(
               'datos' => false,
           ),200,[]);

        }

    }

    public function ArqueoCaja(Request $request){
        $uid           = Auth::id();
        $taller_id     = $request->id;
        $arqueos_cajas = $request->arqueos_caja;
        $ar  = Arqueocajas::where('user_id', $uid)->where('taller_id',$taller_id)->count();      
       if($ar == 0){
          $a = new Arqueocajas;
          $a->taller_id = $taller_id;
          $a->user_id   = $uid;
          $a->totaldebe = $request->debe;
          $a->totalhaber= $request->haber;
          $a->save();

          $e= Arqueocajas::where('user_id', $uid)->get()->last();

          foreach($arqueos_cajas as $key=>$i){

            $datos = array(
                'arqueocaja_id' =>$e->id,
                'cuenta'        =>$i['cuenta'],
                'comentario'    =>$i['comentario'],
                'debe'          =>$i['debe'],
                'haber'         =>$i['haber'],
                'created_at'        => now(),
                'updated_at'        => now(),
 
            );
            Movimientocajas::insert($datos);
          }
          return response(array(
            'success' => true,
            'estado'  => 'guardado',
            'message' => 'Anexo Arqueo de Caja creado correctamente'
        ),200,[]);

        } elseif($ar == 1){
            
            $ids     =[];
            $ar      = Arqueocajas::where('user_id', $uid)->where('taller_id',$taller_id)->first();
            $ar->totaldebe      = $request->debe;
            $ar->totalhaber      = $request->haber;
            $ar->save();

            $r = Movimientocajas::where('arqueocaja_id', $ar->id)->get();

            foreach($r as $i){
               $ids[]=$i->id;
            }
            $deteletearqueo = Movimientocajas::destroy($ids);
            $e = Arqueocajas::where('user_id', $uid)->get()->last();

            foreach($arqueos_cajas as $key=>$i){
                $datos = array(
                    'arqueocaja_id' =>$e->id,
                    'cuenta'        =>$i['cuenta'],
                    'comentario'    =>$i['comentario'],
                    'debe'          =>$i['debe'],
                    'haber'         =>$i['haber'],
                    'created_at'        => now(),
                    'updated_at'        => now(),
                     );
                     Movimientocajas::insert($datos); 
            }
            return response(array(
                'success' => true,
                'estado'  => 'actualizado',
                'message' => 'Anexo Arqueo de Caja Actualizado correctamente'
            ),200,[]);
        }
     }

     public function obtenerArqueo (Request $request){
         $user_id    = Auth::id();
         $taller_id  = $request->id;

         $ar  = Arqueocajas::where('user_id', $user_id)->where('taller_id',$taller_id)->count();

          if($ar==1){
            $a = Arqueocajas::where('user_id', $user_id)->where('taller_id',$taller_id)->first();
            $e = Movimientocajas::select('cuenta','comentario','debe','haber')->where('arqueocaja_id', $a->id)->get();
         
            return response(array(
                'datos' => true,
                'arqueocaja' => $e,
            ),200,[]);
        }else{
            return response(array(
               'datos' => false,
           ),200,[]);

        }

     }



     public function LibroBanco (Request $request){

       $uid = Auth::id();
       $taller_id  = $request->id;
       $nombre     = $request->nombre;
       $lb_bancos  = $request->lb_banco;
       $lb         =Librobanco::where('user_id', $uid)->where('taller_id', $taller_id)->count();
       if($lb == 0){
         $b = new Librobanco;
         $b->taller_id = $taller_id;
         $b->user_id   = $uid;
         $b->nombre    = $nombre;
         $b->totaldebe      = $request->debe;
         $b->totalhaber     = $request->haber;    
         $b->save();
         
         $mb = Librobanco::where('user_id', $uid)->get()->last();

         foreach($lb_bancos as $key=>$i){

            $datos = array (
                'librobanco_id'  =>$mb->id,
                'fecha'             =>$i['fecha'],
                'detalle'           =>$i['detalle'],
                'cheque'            =>$i['cheque'],
                'debe'              =>$i['debe'],
                'haber'             =>$i['haber'],
                'saldo'             =>$i['saldo'],
                'created_at'        => now(),
                'updated_at'        => now(),
            );
            Movimientobanco::insert($datos);
         }
         return response(array(
            'success' => true,
            'estado'  => 'guardado',
            'message' => 'Anexo Libro Banco creado correctamente'
        ),200,[]);


       }elseif($lb == 1){

        $ids           =[];
        $lb            =Librobanco::where('user_id', $uid)->where('taller_id', $taller_id)->first();
        $lb->nombre    =$request->nombre;
        $lb->totaldebe  = $request->debe;
        $lb->totalhaber = $request->haber;
        $lb->save();


        $rgb = Movimientobanco::where('librobanco_id', $lb->id)->get();

        foreach($rgb as $r){
            $ids[]= $r->id;
         }

         $deletebanco= Movimientobanco::destroy($ids);

         $a = Librobanco::where('user_id', $uid)->get()->last();

         foreach($lb_bancos as $key=>$i){
            $datos = array (
                'librobanco_id'  =>$a->id,
                'fecha'             =>$i['fecha'],
                'detalle'           =>$i['detalle'],
                'cheque'            =>$i['cheque'],
                'debe'              =>$i['debe'],
                'haber'             =>$i['haber'],
                'saldo'             =>$i['saldo'],
                'created_at'        => now(),
                'updated_at'        => now(),
            );
            Movimientobanco::insert($datos);
        }
        return response(array(
           'success' => true,
           'estado'  => 'actualizado',
           'message' => 'Anexo Libro Banco Actualizado correctamente'
       ),200,[]);

       }

     }


     public function obtenerLbanco (Request $request){
         $uid = Auth::id();
         $taller_id = $request->id;
         $lb =Librobanco::where('user_id', $uid)->where('taller_id', $taller_id)->count();

         if($lb == 1){
             $lbs = Librobanco::where('user_id', $uid)->where('taller_id', $taller_id)->first();
             $mb  = Movimientobanco::select('fecha','detalle','cheque','debe','haber','saldo')->where('librobanco_id',$lbs->id)->get();
       
             return response(array(
                'datos' => true,
                'mb' => $mb,
                'nombre' =>$lbs->nombre
            ),200,[]);
            }else{
                return response(array(
                   'datos' => false,
               ),200,[]);
    
            }

     }


}