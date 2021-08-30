<?php

namespace App\Traits;


use App\Contabilidad\MayorGeneral;

trait MayorGeneralTrait
{

    public function storeMayorGeneral($request, $id)
    {
        $taller_id     = $request->id;
        $registros      = $request->registro;
        $nombre = $request->nombre;
        $mensaje   = MayorGeneral::where('user_id', $id)->where('taller_id', $taller_id)->count() == 1 ? 'Actualizado' : 'Creado';
        $mayotgeneral = MayorGeneral::updateOrCreate(
            ['user_id' => $id, 'taller_id' => $taller_id],
            [
                'nombre'      => $request->nombre,
                'registros'      => json_encode($registros),
            ]
        );
        return  array(
            'success' => $mensaje == 'Actualizado' ? 'act' : true,
            'message' => "Mayor General {$mensaje} Correctamente"
        );
    }
    //     return json_encode($cuentas);
    // }
    public function getMayorGeneral($taller, $id)
    {
        $mayorGeneral = MayorGeneral::where('user_id', $id)->where('taller_id', $taller)->first();
        if (isset($mayorGeneral)) {
            if (isset($mayorGeneral->registros)) {
                $registros =  json_decode($mayorGeneral->registros);
            } else {
                $registros = [];
            }


            $array = array(
                'datos'        => true,
                'nombre'       => $mayorGeneral->nombre,
                'registros'    => $registros,
            );
        } else {
            $array = array(
                'datos'    => false
            );
        }
        return $array;
    }
}
