<?php

namespace App\Traits;

use App\Contabilidad\KardexFifo;
use App\Admin\TallerModuloTransaccion;

use function GuzzleHttp\json_decode;

trait kardexFifoTrait
{

    public function storeKardexFifo($request, $id)
    {
        $taller_id     = $request->id;
        $producto_id   = $request->producto_id;
        $transacciones = $request->kardex_fifo;
        $mensaje   =  KardexFifo::where('user_id', $id)->where('taller_id', $taller_id)->where('producto_id', $producto_id)->count() == 1 ? 'actualizado' : 'guardado';
        $kardeFifo = KardexFifo::updateOrCreate(
            ['user_id' => $id, 'taller_id' => $taller_id, 'producto_id' => $producto_id],
            [
                'nombre'               => $request->nombre,
                'producto'             => $request->producto,
                'inv_inicial_cantidad' => $request->inv_inicial_cantidad,
                'adquisicion_cantidad' => $request->adquisicion_cantidad,
                'ventas_cantidad'      => $request->ventas_cantidad,
                'inv_final_cantidad'   => $request->inv_final_cantidad,
                'inv_inicial_precio'   => $request->inv_inicial_precio,
                'adquisicion_precio'   => $request->adquisicion_precio,
                'ventas_precio'        => $request->ventas_precio,
                'inv_final_precio'     => $request->inv_final_precio,
                'transacciones'        => json_encode($transacciones)
            ]
        );
        return  array(
            'success' => true,
            'estado' => $mensaje,
            'message' => "Kardex Fifo {$mensaje} Correctamente"
        );
    }

    public function getarrayDatosKardexFifo($taller, $producto, $id)
    {
        $kardexFifo = KardexFifo::where('user_id', $id)->where('taller_id', $taller)->where('producto_id', $producto)->first();
        if (isset($kardexFifo)) {
            $producto =  TallerModuloTransaccion::where('id', $producto)->first();
            return array(
                'datos' => true,
                'kardex_fifo' => json_decode($kardexFifo->transacciones),
                'informacion' => $kardexFifo,
                'transacciones' => $producto
            );
        } else {
            $producto = TallerModuloTransaccion::where('id', $producto)->first();
            return array(
                'datos' => false,
                'transacciones' => $producto
            );
        }
    }
}
