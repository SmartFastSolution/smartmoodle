<?php

namespace App\Traits;

use App\Contabilidad\AsientoCierre;

trait AsientosCierreTrait
{

    public function storeAsientoCierre($request, $id)
    {
        $taller_id     = $request->id;
        $registros      = $request->registro;
        $mensaje   = AsientoCierre::where('user_id', $id)->where('taller_id', $taller_id)->count() == 1 ? 'Actualizado' : 'Creado';
        $asientoCierre = AsientoCierre::updateOrCreate(
            ['user_id' => $id, 'taller_id' => $taller_id],
            [
                'nombre'      => $request->nombre,
                'total_haber' => $request->total_haber,
                'total_debe'  => $request->total_debe,
                'registros'       => json_encode($registros),
            ]
        );
        return  array(
            'success' => $mensaje == 'Actualizado' ? 'act' : true,
            'message' => "Asiento de Cierre {$mensaje} Correctamente"
        );
    }
    public function getAsientoCierre($taller, $id)
    {
        $asientoCierre = AsientoCierre::where('user_id', $id)->where('taller_id', $taller)->first();
        if (isset($asientoCierre)) {
            if (isset($asientoCierre->registros)) {
                $registers = $this->getRegistrosAsientoCierre(json_decode($asientoCierre->registros));
            } else {
                $registers = [];
            }

            $array = array(
                'datos'        => true,
                'nombre'       => $asientoCierre->nombre,
                'registros'    => $registers,
                't_haber'   => $asientoCierre->total_haber,
                't_debe'   => $asientoCierre->total_debe,
            );
        } else {
            $array = array(
                'datos'    => false
            );
        }
        return $array;
    }
    public function getRegistrosAsientoCierre($registros)
    {
        $datos = collect($registros)->sortBy('fecha');
        return $datos->values()->all();
    }
}
