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
use App\Contabilidad\ERIngreso;
use App\Contabilidad\EstadoResultado;
use App\Contabilidad\HTRegistro;
use App\Contabilidad\HojaTrabajo;
use App\Contabilidad\KFRMovimiento;
use App\Contabilidad\KFRegistro;
use App\Contabilidad\KPRegistro;
use App\Contabilidad\KardexFIfo;
use App\Contabilidad\KardexPromedio;
use App\Contabilidad\MGRMovimiento;
use App\Contabilidad\MGRegistro;
use App\Contabilidad\MayorGeneral;
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
        $producto_id  = $request->producto_id;
        $kardexCompro       = KardexPromedio::where('user_id',$id)->where('taller_id', $taller_id)->where('producto_id', $producto_id)->count();
        if ($kardexCompro  == 0) {
        // $contenido          = TallerContabilidad::select('enunciado')->where('taller_id', $taller_id)->firstOrFail();
        $kardex_promedio            = new KardexPromedio;
        $kardex_promedio->taller_id            = $taller_id;
        $kardex_promedio->user_id              = $id;
        $kardex_promedio->nombre               = $request->nombre;
        $kardex_promedio->producto             = $request->producto;
        $kardex_promedio->producto_id          = $request->producto_id;
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
        $kardexComprob                       = KardexPromedio::where('user_id',$id)->where('taller_id', $taller_id)->where('producto_id', $producto_id)->first();
        $kardexComprob->nombre               = $request->nombre;
        $kardexComprob->producto             = $request->producto;
        $kardexComprob->producto_id          = $request->producto_id;
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
        $producto_id  = $request->producto_id;
        $kardexpro = KardexPromedio::where('user_id',$id)->where('taller_id', $taller_id)->where('producto_id', $producto_id)->count();
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
        $balance->nombre = $request->nombre;
        $balance->total_debe  = $request->total_debe;
        $balance->total_haber = $request->total_haber;
        $balance->save();

        $o = BalanceAjustado::where('user_id', $id)->get()->last(); 

        foreach ($balances as $key => $balance) {
                  $datos=array(
                     'balance_ajustado_id' => $o->id,
                     'cuenta'                  => $balance['cuenta'],
                     'cuenta_id'                  => $balance['cuenta_id'],
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
        $balanceComprob->nombre = $request->nombre;
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
                     'cuenta_id'                  => $balance['cuenta_id'],
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
            $obtener       = BCARegistro::select('cuenta', 'cuenta_id','debe', 'haber')->where('balance_ajustado_id', $balanceCompro->id)->get();
        
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
        $balance->nombre    = $request->nombre;
        $balance->fecha     = $request->fecha;
        $balance->sum_debe  = $request->sum_debe;
        $balance->sum_haber = $request->sum_haber;
        $balance->sal_debe  = $request->sal_debe;
        $balance->sal_haber = $request->sal_haber;
        $balance->save();

        $o = BalanceComprobacion::where('user_id', $id)->get()->last(); 

        foreach ($balances as $key => $balance) {
                  $datos=array(
                     'balance_comprobacion_id' => $o->id,
                     'cuenta_id'               => $balance['cuenta_id'],
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
        $balanceComprob->nombre    = $request->nombre;
        $balanceComprob->fecha     = $request->fecha;
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
                     'cuenta_id'               => $balance['cuenta_id'],
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
            $obtener       = BCRegistro::select('cuenta','cuenta_id', 'suma_debe', 'suma_haber', 'saldo_debe', 'saldo_haber')->where('balance_comprobacion_id', $balanceCompro->id)->get();
        
            return response(array(
                'datos' => true,
                'bcomprobacion' => $obtener,
                'nombre' => $balanceCompro->nombre,
                'fecha' => $balanceCompro->fecha
            ),200,[]);

         }else{
             return response(array(
                'datos' => false,
            ),200,[]);

         }
    }

        public function hojaTrabajo(Request $request)
    {
        $id                              = Auth::id();
        $taller_id                       = $request->id;
        $registros                       = $request->registros;
        $hojaTra                         = HojaTrabajo::where('user_id',$id)->where('taller_id', $taller_id)->count();
        if ($hojaTra                     == 0) {
        // $contenido                    = TallerContabilidad::select('enunciado')->where('taller_id', $taller_id)->firstOrFail();
        $hojaTrabajo                     = new HojaTrabajo;
        $hojaTrabajo->taller_id          = $taller_id ;
        $hojaTrabajo->user_id            = $id;
        // $hojaTrabajo->enunciado       = $contenido->enunciado;
        $hojaTrabajo->nombre             = $request->nombre;
        // $hojaTrabajo->fecha           = $request->fecha;
        $hojaTrabajo->bc_total_debe      = $request->bc_total_debe;
        $hojaTrabajo->bc_total_haber     = $request->bc_total_haber;
        $hojaTrabajo->ajuste_total_debe  = $request->ajuste_total_debe;
        $hojaTrabajo->ajuste_total_haber = $request->ajuste_total_haber;
        $hojaTrabajo->ba_total_debe      = $request->ba_total_debe;
        $hojaTrabajo->ba_total_haber     = $request->ba_total_haber;
        $hojaTrabajo->er_total_debe      = $request->er_total_debe;
        $hojaTrabajo->er_total_haber     = $request->er_total_haber;
        $hojaTrabajo->bg_total_debe      = $request->bg_total_debe;
        $hojaTrabajo->bg_total_haber     = $request->bg_total_haber;
        $hojaTrabajo->save();

        $o = HojaTrabajo::where('user_id', $id)->get()->last(); 

        foreach ($registros as $key => $balance) {
                  $datos=array(
                     'hoja_trabajo_id' => $o->id,
                     'cuenta_id'               => $balance['cuenta_id'],
                     'cuenta'                  => $balance['cuenta'],
                     'bc_debe'                 => $balance['bc_debe'],
                     'bc_haber'                => $balance['bc_haber'],
                     'ajuste_debe'             => $balance['ajuste_debe'],
                     'ajuste_haber'            => $balance['ajuste_haber'],
                     'ba_debe'                 => $balance['ba_debe'],
                     'ba_haber'                => $balance['ba_haber'],
                     'er_debe'                 => $balance['er_debe'],
                     'er_haber'                => $balance['er_haber'],
                     'bg_debe'                 => $balance['bg_debe'],
                     'bg_haber'                => $balance['bg_haber'],
                     'created_at'              => now(),
                     'updated_at'              => now(),
                  );
                  HTRegistro::insert($datos);
            }
         return response(array(
                'success' => true,
                'estado' => 'guardado',
                'message' => 'Hoja de Trabajo creada correctamente'
            ),200,[]);
        }elseif($balanceCompro  == 1){
        $ids                                = [];
        $balanceComprob                     = HojaTrabajo::where('user_id',$id)->where('taller_id', $taller_id)->first();
        $balanceComprob->nombre             = $request->nombre;
        $balanceComprob->nombre             = $request->nombre;
        // $balanceComprob->fecha           = $request->fecha;
        $balanceComprob->bc_total_debe      = $request->bc_total_debe;
        $balanceComprob->bc_total_haber     = $request->bc_total_haber;
        $balanceComprob->ajuste_total_debe  = $request->ajuste_total_debe;
        $balanceComprob->ajuste_total_haber = $request->ajuste_total_haber;
        $balanceComprob->ba_total_debe      = $request->ba_total_debe;
        $balanceComprob->ba_total_haber     = $request->ba_total_haber;
        $balanceComprob->er_total_debe      = $request->er_total_debe;
        $balanceComprob->er_total_haber     = $request->er_total_haber;
        $balanceComprob->bg_total_debe      = $request->bg_total_debe;
        $balanceComprob->bg_total_haber     = $request->bg_total_haber;
        $balanceComprob->save();


        $registros= HTRegistro::where('hoja_trabajo_id', $balanceComprob->id)->get();
        
        foreach($registros as $regis){
                $ids[]=$regis->id;
        }
        $deleteRegistros = HTRegistro::destroy($ids);
        $o = HojaTrabajo::where('user_id', $id)->get()->last(); 
         foreach ($registros as $key => $balance) {
                  $datos=array(
                    'hoja_trabajo_id' => $o->id,
                     'cuenta_id'               => $balance['cuenta_id'],
                     'cuenta'                  => $balance['cuenta'],
                     'bc_debe'                 => $balance['bc_debe'],
                     'bc_haber'                => $balance['bc_haber'],
                     'ajuste_debe'             => $balance['ajuste_debe'],
                     'ajuste_haber'            => $balance['ajuste_haber'],
                     'ba_debe'                 => $balance['ba_debe'],
                     'ba_haber'                => $balance['ba_haber'],
                     'er_debe'                 => $balance['er_debe'],
                     'er_haber'                => $balance['er_haber'],
                     'bg_debe'                 => $balance['bg_debe'],
                     'bg_haber'                => $balance['bg_haber'],
                     'created_at'              => now(),
                     'updated_at'              => now(),
                  );
                  HTRegistro::insert($datos);
            }



             return response(array(
                'success' => true,
                'estado' => 'actualizado',
                'message' => 'Hoja de Trabajo actualizada correctamente'
            ),200,[]);

        }

    }

    public function obtenerHojaTraba(Request $request)
    {
        $id         = Auth::id();
        $taller_id  = $request->id;
        $dioGeneral = HojaTrabajo::where('user_id',$id)->where('taller_id', $taller_id)->count();
        // $registros  = [];
        if ($dioGeneral  == 1) {
            $balanceCompro = HojaTrabajo::where('user_id',$id)->where('taller_id', $taller_id)->first();
            $obtener       = HTRegistro::select('cuenta','cuenta_id', 'bc_debe', 'bc_haber', 'ajuste_debe', 'ajuste_haber' , 'ba_debe', 'ba_haber', 'er_debe', 'er_haber', 'bg_debe', 'bg_haber')->where('hoja_trabajo_id', $balanceCompro->id)->get();
        
            return response(array(
                'datos' => true,
                'hojatrabajo' => $obtener,
                'nombre' => $balanceCompro->nombre,
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

    // if ($tipo == 'horizontal') {
    //     $a = BalanceInicial::where('user_id', $id)->where('tipo', $tipo)->get()->last(); 
    //     $diariogeneral                     = new DiarioGeneral;
    //     $diariogeneral->taller_id          = $taller_id;
    //     $diariogeneral->user_id            = $id;
    //     $diariogeneral->balance_inicial_id = $a->id;
    //     $diariogeneral->enunciado          = $contenido->enunciado;
    //     $diariogeneral->nombre             = $request->nombre;
    //     $diariogeneral->completado         = false;
    //     $diariogeneral->save();
    // }    
		if ($binicial == true) {
			   $o = BalanceInicial::where('user_id', $id)->get()->last(); 
               foreach ($a_corriente as $key => $activos) {
                  $datos=array(
                     'balance_inicial_id' => $o->id,
                     'nom_cuenta'         => $activos['nom_cuenta'],
                     'cuenta_id'          => $activos['cuenta_id'],
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
                     'cuenta_id'          => $activo['cuenta_id'],
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
                     'cuenta_id'          => $pasivos['cuenta_id'],
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
                     'cuenta_id'          => $pasivo['cuenta_id'],
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
                     'cuenta_id'          => $patri['cuenta_id'],
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
                     'cuenta_id'         => $activos['cuenta_id'],
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
                     'cuenta_id'         => $activo['cuenta_id'],

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
                     'cuenta_id'         => $pasivos['cuenta_id'],
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
                     'cuenta_id'         => $pasivo['cuenta_id'],
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
                     'cuenta_id'         => $patri['cuenta_id'],
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
    $a_corrientes      = BIActivo::select('nom_cuenta', 'cuenta_id', 'saldo')->where('balance_inicial_id', $datos->id)->where('tipo', 'corriente')->get();
    $a_nocorrientes    = BIActivo::select('nom_cuenta', 'cuenta_id', 'saldo')->where('balance_inicial_id', $datos->id)->where('tipo', 'nocorriente')->get();
    $p_corriente       = BIPasivo::select('nom_cuenta', 'cuenta_id', 'saldo')->where('balance_inicial_id', $datos->id)->where('tipo', 'corriente')->get();
    $p_nocorriente     = BIPasivo::select('nom_cuenta', 'cuenta_id', 'saldo')->where('balance_inicial_id', $datos->id)->where('tipo', 'nocorriente')->get();
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
    $a_corrientes      = BIActivo::select('nom_cuenta', 'cuenta_id', 'saldo')->where('balance_inicial_id', $datos->id)->where('tipo', 'corriente')->get();
    $a_nocorrientes    = BIActivo::select('nom_cuenta', 'cuenta_id', 'saldo')->where('balance_inicial_id', $datos->id)->where('tipo', 'nocorriente')->get();
    $p_corriente       = BIPasivo::select('nom_cuenta', 'cuenta_id', 'saldo')->where('balance_inicial_id', $datos->id)->where('tipo', 'corriente')->get();
    $p_nocorriente     = BIPasivo::select('nom_cuenta', 'cuenta_id', 'saldo')->where('balance_inicial_id', $datos->id)->where('tipo', 'nocorriente')->get();
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
        $balanceInicial    = BalanceInicial::where('user_id',$id)->where('taller_id', $taller_id)->where('tipo', 'horizontal')->get()->last();
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

        $inicial = array(
        'tipo' => 'inicial',
        'fecha' => $balanceInicial->fecha,
        'comentario' => 'Para registrar el B.I de '.$balanceInicial->nombre,
        'debe' => $activos,
        'haber' => $pasivo_patrimonio
        );

        // BIActivo::where('balance_inicial_id', $balanceInicial->id)->get();
         // return response(array(
         //    'datos' => true,
         //        'nombre' => $balanceInicial->nombre,
         //        'fecha' => $balanceInicial->fecha,
         //        'tipo' => 'balance_inicial',
         //        'activos' => $activos,
         //        'pasivos' => $pasivo_patrimonio
         //    ),200,[]);

               return response(array(
            'datos' => true,
                'inicial' => $inicial
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
        $ajustes = [];
        if ($dioGeneral  == 1) {
        $diairioGeneral    = DiarioGeneral::where('user_id',$id)->where('taller_id', $taller_id)->first();
        $normal = DGRegistro::where('diario_general_id', $diairioGeneral->id)->where('tipo', 'normal')->orderBy('fecha')->get();
            foreach ($normal as $key => $registro) {
                $regis = array(
                    'debe' => $registro->dgrDebe,
                    'haber'=>$registro->dgrHaber,
                    'tipo' => $registro->tipo,
                    'fecha' => $registro->fecha,
                    'comentario' => $registro->comentario
                );
                $registros[]= $regis;
            }
         $ajustado = DGRegistro::where('diario_general_id', $diairioGeneral->id)->where('tipo', 'ajustado')->orderBy('fecha')->get();
            foreach ($ajustado as $key => $registro) {
                $regis = array(
                    'debe' => $registro->dgrDebe,
                    'haber'=>$registro->dgrHaber,
                    'tipo' => $registro->tipo,
                    'fecha' => $registro->fecha,
                    'comentario' => $registro->comentario
                );
                $ajustes[]= $regis;
            }
            $iniciales = DGRegistro::where('diario_general_id', $diairioGeneral->id)->where('tipo', 'inicial')->orderBy('fecha')->first();
            
                $regis = array(
                    'debe'       => $iniciales->dgrDebe,
                    'haber'      =>$iniciales->dgrHaber,
                    'tipo'       => $iniciales->tipo,
                    'fecha'      => $iniciales->fecha,
                    'comentario' => $iniciales->comentario
                );
                $inicial= $regis;
            
            return response(array(
                'datos'     => true,
                'nombre'    => $diairioGeneral->nombre,
                'registros' => $registros,
                'inicial'   => $inicial,
                'ajustes'   => $ajustes,
            ),200,[]);
         }else{
             return response(array(
                'datos' => false,
            ),200,[]);

         }
    }

    public function diario(Request $request)
    {
        $id            = Auth::id();
        $taller_id     = $request->id;
        $registro      = $request->registro;
        
        $diariogeneral = DiarioGeneral::where('user_id',$id)->where('taller_id', $taller_id)->count();

    if ($diariogeneral == 1){ 
        $cu = DiarioGeneral::where('user_id',$id)->where('taller_id', $taller_id)->first();
        $cuenta = DGRegistro::where('diario_general_id',$cu->id)->count();

        $diariog = DiarioGeneral::where('user_id',$id)->where('taller_id', $taller_id)->first();
        $debe =[];
        $haber =[];
        $ids=[];
        $diariog->nombre = $request->nombre;
        $diariog->total_debe = $request->total_debe;
        $diariog->total_haber = $request->total_haber;
        $diariog->save();


        $registros= DGRegistro::where('diario_general_id', $diariog->id)->get();
        
        foreach($registros as $act){
                $ids[]=$act->id;
        }
        $deleteRegistros = DGRegistro::destroy($ids);

                foreach ($registro as $key => $value) {                         //RECORRER TODOS LOS REGISTROS EN EL ARRAY
            $regis=array(
                     'diario_general_id' => $diariog->id,
                     'no_registro'       => $key + 1,
                     'comentario'        => $value['comentario'],
                     'fecha'             => $value['fecha'],
                     'tipo'              => $value['tipo'],
                     'created_at'        => now(),
                     'updated_at'        => now(),
                );
                DGRegistro::insert($regis);                           //GUARDAR CADA REGISTRO EN LA BASE DE DATOS
        }
        $register = $diariog->dgRegistro;
        foreach ($registro as $key => $value) {                         ////RECORRER TODOS LOS REGISTROS EN EL ARRAY
            foreach ($value['debe'] as $key1 => $value1) {              ////RECORRER TODOS LAS CUENTAS DE DEBE QUE PERTENECEN A UN REGISTRO
                $regis1=array(
                     'd_g_registro_id' => $register[$key]->id,
                     'cuenta_id'       => $value1['cuenta_id'],
                     'nom_cuenta'      => $value1['nom_cuenta'],
                     'saldo'           => $value1['saldo'],
                     'fecha'           => $value1['fecha'],
                     'created_at'      => now(),
                     'updated_at'      => now(),
                  );
                DGRDebe::insert($regis1);                             //GURDAR ESAS CUENTAS EN LA TABLA DEBE CON EL ID DEL REGISTRO AL QUE CORRESPONDEN
            }
              foreach ($value['haber'] as $key2 => $value2) {           ////RECORRER TODOS LAS CUENTAS DE HABER QUE PERTENECEN A UN REGISTRO
                $regis2=array(
                     'd_g_registro_id'  => $register[$key]->id,
                     'cuenta_id'       => $value2['cuenta_id'],
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
    }else{ 
        $diariogeneral               = new DiarioGeneral;
        $diariogeneral->taller_id    = $taller_id;
        $diariogeneral->user_id      = $id;
        // $diariogeneral->enunciado = $contenido->enunciado;
        $diariogeneral->nombre       = $request->nombre;
        $diariogeneral->completado   = false;
        $diariogeneral->total_haber  = $request->total_haber;
        $diariogeneral->total_debe   = $request->total_debe;

        $diariogeneral->save();

        $diariog = DiarioGeneral::where('user_id',$id)->where('taller_id', $taller_id)->first();
        
        $debe =[];
        $haber =[];
        foreach ($registro as $key => $value) {                         //RECORRER TODOS LOS REGISTROS EN EL ARRAY
            $regis=array(
                     'diario_general_id' => $diariog->id,
                     'no_registro'       => $key + 1,
                     'comentario'        => $value['comentario'],
                     'fecha'             => $value['fecha'],
                     'tipo'              => $value['tipo'],
                     'created_at'        => now(),
                     'updated_at'        => now(),
                );
                DGRegistro::insert($regis);                           //GUARDAR CADA REGISTRO EN LA BASE DE DATOS
        }
        $register = $diariog->dgRegistro;
        foreach ($registro as $key => $value) {                         ////RECORRER TODOS LOS REGISTROS EN EL ARRAY
            foreach ($value['debe'] as $key1 => $value1) {              ////RECORRER TODOS LAS CUENTAS DE DEBE QUE PERTENECEN A UN REGISTRO
                $regis1=array(
                     'd_g_registro_id' => $register[$key]->id,
                     'cuenta_id'       => $value1['cuenta_id'],
                     'nom_cuenta'      => $value1['nom_cuenta'],
                     'saldo'           => $value1['saldo'],
                     'fecha'           => $value1['fecha'],
                     'created_at'      => now(),
                     'updated_at'      => now(),
                  );
                DGRDebe::insert($regis1);                             //GURDAR ESAS CUENTAS EN LA TABLA DEBE CON EL ID DEL REGISTRO AL QUE CORRESPONDEN
            }
              foreach ($value['haber'] as $key2 => $value2) {           ////RECORRER TODOS LAS CUENTAS DE HABER QUE PERTENECEN A UN REGISTRO
                $regis2=array(
                     'd_g_registro_id'  => $register[$key]->id,
                     'cuenta_id'       => $value2['cuenta_id'],
                     'nom_cuenta'        => $value2['nom_cuenta'],
                     'saldo'              => $value2['saldo'],
                     'created_at'         => now(),
                     'updated_at'         => now(),
                  );
                  DGRHaber::insert($regis2);                            //GURDAR ESAS CUENTAS EN LA TABLA HABER CON EL ID DEL REGISTRO AL QUE CORRESPONDEN
            }
        }
        // $diariog->completado = true;                                    //CAMBIAR EL VALOR DE COMPLETADO A TRUE /// ESTO SIGNIFICA QUE EL TALLER HA SIDO COMPLETADO
        // $diariog->save();                                             //GUARDAR ESE CAMBIO
         return response(array(                                         //ENVIO DE RESPUESTA
                'success' => true,
                'message' => 'Diario General creado correctamente'
            ),200,[]);
                                                              // SI NO TIENE CREADO EL BALANCE INICIAL ANTES DE GUARDAR, LE SALDRA UNA NOTIFICACION INDICANDO DICHO P
        }
    }

      public function mayorGeneral(Request $request)
    {
        $id            = Auth::id();
        $taller_id     = $request->id;
        $registro      = $request->registro;
        $nombre = $request->nombre;
        
        $mayorgeneral = MayorGeneral::where('user_id',$id)->where('taller_id', $taller_id)->count();

    if ($mayorgeneral == 1){ 
        $cu = MayorGeneral::where('user_id',$id)->where('taller_id', $taller_id)->first();
        $cuenta = MGRegistro::where('mayor_general_id',$cu->id)->count();

        $mayorg = MayorGeneral::where('user_id',$id)->where('taller_id', $taller_id)->first();
        $debe =[];
        $haber =[];
        $ids =[];
        $mayorg->nombre = $nombre;
        $mayorg->save();


        $registros= MGRegistro::where('mayor_general_id', $mayorg->id)->get();
        
        foreach($registros as $act){
                $ids[]=$act->id;
        }
        $deleteRegistros = MGRegistro::destroy($ids);

                foreach ($registro as $key => $value) {                         //RECORRER TODOS LOS REGISTROS EN EL ARRAY
            $regis=array(
                     'mayor_general_id' => $mayorg->id,
                     'cuenta_id'        => $value['cuenta_id'],
                     'cuenta'           => $value['cuenta'],
                     'no_registro'      => $key + 1,
                     'total_debe'       => $value['total_debe'],
                     'total_haber'      => $value['total_haber'],
                     'total_saldo'      => $value['total_saldo'],
                     'created_at'       => now(),
                     'updated_at'       => now(),
                );
                MGRegistro::insert($regis);                           
        }
        $register = $mayorg->mgRegistro;

        foreach ($registro as $key => $value) { 
              
            foreach ($value['registros'] as $key1 => $value1) {              
                $regis1=array(
                     'm_g_registro_id' => $register[$key]->id,
                     'tipo'            => 'normal',
                     'fecha'           => $value1['fecha'],
                     'detalle'         => $value1['detalle'],
                     'debe'            => $value1['debe'],
                     'haber'           => $value1['haber'],
                     'saldo'           => $value1['saldo'],
                     'created_at'      => now(),
                     'updated_at'      => now(),
                  );
                MGRMovimiento::insert($regis1);                             
            }
              foreach ($value['cierres'] as $key2 => $value2) {           
                $regis2=array(
                     'm_g_registro_id' => $register[$key]->id,
                     'tipo'            => 'cierre',
                     'fecha'           => $value1['fecha'],
                     'detalle'         => $value1['detalle'],
                     'debe'            => $value1['debe'],
                     'haber'           => $value1['haber'],
                     'saldo'           => $value1['saldo'],
                     'created_at'      => now(),
                     'updated_at'      => now(),
                  );
                  MGRMovimiento::insert($regis2);                            
            }
        }
        return response(array(
                'success' => 'act',
                'message' => 'Datos Actualizados Correctamente'
            ),200,[]);
    }else{ 
        $mayorgeneral               = new MayorGeneral;
        $mayorgeneral->taller_id    = $taller_id;
        $mayorgeneral->user_id      = $id;
        $mayorgeneral->nombre       = $nombre;
        $mayorgeneral->save();

        $mayorg = MayorGeneral::where('user_id',$id)->where('taller_id', $taller_id)->first();
        
        $debe =[];
        $haber =[];
        foreach ($registro as $key => $value) {                         
            $regis=array(
                    'mayor_general_id' => $mayorg->id,
                     'cuenta_id'        => $value['cuenta_id'],
                     'cuenta'           => $value['cuenta'],
                     'no_registro'      => $key + 1,
                     'total_debe'       => $value['total_debe'],
                     'total_haber'      => $value['total_haber'],
                     'total_saldo'      => $value['total_saldo'],
                     'created_at'       => now(),
                     'updated_at'       => now(),
                );
                DGRegistro::insert($regis);                          
        }
        $register = $mayorg->mgRegistro;

         foreach ($registro as $key => $value) { 
              
            foreach ($value['registros'] as $key1 => $value1) {              
                $regis1=array(
                     'm_g_registro_id' => $register[$key]->id,
                     'tipo'            => 'normal',
                     'fecha'           => $value1['fecha'],
                     'detalle'         => $value1['detalle'],
                     'debe'            => $value1['debe'],
                     'haber'           => $value1['haber'],
                     'saldo'           => $value1['saldo'],
                     'created_at'      => now(),
                     'updated_at'      => now(),
                  );
                MGRMovimiento::insert($regis1);                             
            }
              foreach ($value['cierres'] as $key2 => $value2) {           
                $regis2=array(
                     'm_g_registro_id' => $register[$key]->id,
                     'tipo'            => 'cierre',
                     'fecha'           => $value1['fecha'],
                     'detalle'         => $value1['detalle'],
                     'debe'            => $value1['debe'],
                     'haber'           => $value1['haber'],
                     'saldo'           => $value1['saldo'],
                     'created_at'      => now(),
                     'updated_at'      => now(),
                  );
                  MGRMovimiento::insert($regis2);                            
            }
        }
        // $mayorg->completado = true;                                    //CAMBIAR EL VALOR DE COMPLETADO A TRUE /// ESTO SIGNIFICA QUE EL TALLER HA SIDO COMPLETADO
        // $mayorg->save();                                             //GUARDAR ESE CAMBIO
         return response(array(                                         //ENVIO DE RESPUESTA
                'success' => true,
                'message' => 'Mayor General creado correctamente'
            ),200,[]);
                                                              // SI NO TIENE CREADO EL BALANCE INICIAL ANTES DE GUARDAR, LE SALDRA UNA NOTIFICACION INDICANDO DICHO P
        }
    }
        public function obtenermayor(Request $request)
    {
        $id         = Auth::id();
        $taller_id  = $request->id;
        $mayorGeneral = MayorGeneral::where('user_id',$id)->where('taller_id', $taller_id)->count();
        $registros  = [];
        $cierres    = [];
        if ($mayorGeneral  == 1) {
        $mgeneral = MayorGeneral::where('user_id',$id)->where('taller_id', $taller_id)->first();


        $normal  = MGRegistro::where('mayor_general_id', $mgeneral->id)->get();
            foreach ($normal as $key => $registro) {
                $normales = MGRMovimiento::where('m_g_registro_id', $registro->id)->where('tipo', 'normal')->get();
                $cierres = MGRMovimiento::where('m_g_registro_id', $registro->id)->where('tipo', 'cierre')->get();
                $regis = array(
                    'cuenta_id'   => $registro->cuenta_id,
                    'cuenta'      =>$registro->cuenta,
                    'registros'   =>$normales,
                    'cierres'     =>$cierres,
                    'total_debe'  => $registro->total_debe,
                    'total_haber' => $registro->total_haber,
                    'total_saldo' => $registro->total_saldo,
                );
                $registros[]= $regis;
            }
            
            return response(array(
                'datos'     => true,
                'nombre'    => $mgeneral->nombre,
                'registros' => $registros,
            ),200,[]);
         }else{
             return response(array(
                'datos' => false,
            ),200,[]);

         }
    }

      public function estadoResultado(Request $request)
    {
        $id         = Auth::id();
        $taller_id  = $request->id;
        $registro   = $request->registro;
        $nombre     = $request->nombre;
        $fecha      = $request->fecha;
        $ingresos   = $request->ingresos;
        $gastos     = $request->gastos;
        $utilidades = $request->utilidades;
        $totales    = $request->totales;
        
        $mayorgeneral = EstadoResultado::where('user_id',$id)->where('taller_id', $taller_id)->count();

    if ($mayorgeneral == 1){ 
        $cu = EstadoResultado::where('user_id',$id)->where('taller_id', $taller_id)->first();
        $estadoResul = EstadoResultado::where('user_id',$id)->where('taller_id', $taller_id)->first();
        $ids =[];
        $estadoResul->nombre                = $nombre;
        $estadoResul->fecha                 = $fecha;
        $estadoResul->venta                 = $request->venta;
        $estadoResul->costo_venta           = $request->costo_venta;
        $estadoResul->utilidad_bruta_ventas = $totales['utilidad_bruta_ventas'];
        $estadoResul->utilidad_neta_o       = $totales['utilidad_neta_o'];
        $estadoResul->utilidad_ejercicio    = $totales['utilidad_ejercicio'];
        $estadoResul->utilidad_liquida      = $totales['utilidad_liquida'];
        $estadoResul->total_ingresos        = $totales['ingreso'];
        $estadoResul->total_gastos          = $totales['gasto'];
        $estadoResul->save();
        $registros= ERIngreso::where('estado_resultado_id', $estadoResul->id)->get();
        foreach($registros as $act){
                $ids[]=$act->id;
        }

        $deleteRegistros = ERIngreso::destroy($ids);
            foreach ($ingresos as $key => $value) {                         
                $regis=array(
                     'estado_resultado_id' => $estadoResul->id,
                     'tipo'                => 'ingresos',
                     'cuenta_id'           => $value['cuenta_id'],
                     'cuenta'              => $value['cuenta'],
                     'saldo'               => $value['saldo'],
                     'created_at'          => now(),
                     'updated_at'          => now(),
                );
                ERIngreso::insert($regis);                          
        }
        // $register = $estadoResul->mgRegistro;
              
            foreach ($gastos as $key1 => $value1) {              
                $regis1=array(
                     'estado_resultado_id' => $estadoResul->id,
                     'tipo'                => 'gastos',
                     'cuenta_id'           => $value['cuenta_id'],
                     'cuenta'              => $value['cuenta'],
                     'saldo'               => $value['saldo'],
                     'created_at'          => now(),
                     'updated_at'          => now(),
                  );
                ERIngreso::insert($regis1);                             
            }
        if (count($utilidades) > 0) {
            foreach ($utilidades as $key2 => $value2) {           
                $regis2=array(
                     'estado_resultado_id' => $estadoResul->id,
                     'tipo'                => 'utilidades',
                     'cuenta_id'           => $value['cuenta_id'],
                     'cuenta'              => $value['cuenta'],
                     'saldo'               => $value['saldo'],
                     'created_at'          => now(),
                     'updated_at'          => now(),
                  );
                  ERIngreso::insert($regis2);                            
            }  
        }
        return response(array(
                'success' => 'actualizado',
                'message' => 'Datos Actualizados Correctamente'
            ),200,[]);
    }else{ 
        $estadoResultado                        = new EstadoResultado;
        $estadoResultado->taller_id             = $taller_id;
        $estadoResultado->user_id               = $id;
        $estadoResultado->nombre                = $nombre;
        $estadoResultado->fecha                 = $fecha;
        $estadoResultado->venta                 = $request->venta;
        $estadoResultado->costo_venta           = $request->costo_venta;
        $estadoResultado->utilidad_bruta_ventas = $totales['utilidad_bruta_ventas'];
        $estadoResultado->utilidad_neta_o       = $totales['utilidad_neta_o'];
        $estadoResultado->utilidad_ejercicio    = $totales['utilidad_ejercicio'];
        $estadoResultado->utilidad_liquida      = $totales['utilidad_liquida'];
        $estadoResultado->total_ingresos        = $totales['ingreso'];
        $estadoResultado->total_gastos          = $totales['gasto'];
        $estadoResultado->save();
        $mayorg = EstadoResultado::where('user_id',$id)->where('taller_id', $taller_id)->first();
        
        foreach ($ingresos as $key => $value) {                         
            $regis=array(
                     'estado_resultado_id' => $mayorg->id,
                     'tipo'                => 'ingresos',
                     'cuenta_id'           => $value['cuenta_id'],
                     'cuenta'              => $value['cuenta'],
                     'saldo'               => $value['saldo'],
                     'created_at'          => now(),
                     'updated_at'          => now(),
                );
                ERIngreso::insert($regis);                          
        }
        // $register = $mayorg->mgRegistro;
              
            foreach ($gastos as $key1 => $value1) {              
                $regis1=array(
                     'estado_resultado_id' => $mayorg->id,
                     'tipo'                => 'gastos',
                     'cuenta_id'           => $value1['cuenta_id'],
                     'cuenta'              => $value1['cuenta'],
                     'saldo'               => $value1['saldo'],
                     'created_at'          => now(),
                     'updated_at'          => now(),
                  );
                ERIngreso::insert($regis1);                             
            }
        if (count($utilidades > 0)) {
            foreach ($utilidades as $key2 => $value2) {           
                $regis2=array(
                     'estado_resultado_id' => $mayorg->id,
                     'tipo'                => 'utilidades',
                     'cuenta_id'           => $value2['cuenta_id'],
                     'cuenta'              => $value2['cuenta'],
                     'saldo'               => $value2['saldo'],
                     'created_at'          => now(),
                     'updated_at'          => now(),
                  );
                  ERIngreso::insert($regis2);                            
            }  
        }
         return response(array(                                   
                'success' => true,
                'message' => 'Estado Resultado creado correctamente'
            ),200,[]);
                                                        
        }
    }

public function obtenerEstado(Request $request)
    {
        $id         = Auth::id();
        $taller_id  = $request->id;
        $mayorGeneral = EstadoResultado::where('user_id',$id)->where('taller_id', $taller_id)->count();
        $registros  = [];
        $cierres    = [];
        if ($mayorGeneral  == 1) {
        $mgeneral = EstadoResultado::where('user_id',$id)->where('taller_id', $taller_id)->first();


        // $normal  = ERIngreso::where('ESTA', $mgeneral->id)->get();
           
                $ingresos   = ERIngreso::where('estado_resultado_id', $mgeneral->id)->where('tipo', 'ingresos')->get();
                $gastos     = ERIngreso::where('estado_resultado_id', $mgeneral->id)->where('tipo', 'gastos')->get();
                $utilidades = ERIngreso::where('estado_resultado_id', $mgeneral->id)->where('tipo', 'utilidades')->get();
                    
            return response(array(
                'datos'           => true,
                'estadoresultado' => $mgeneral,
                'ingresos'        => $ingresos,
                'gastos'          => $gastos,
                'utilidades'      => $utilidades,
            ),200,[]);
         }else{
             return response(array(
                'datos' => false,
            ),200,[]);

         }
    }
}

