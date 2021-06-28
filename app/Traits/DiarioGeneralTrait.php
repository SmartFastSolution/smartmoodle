<?php

namespace App\Traits;

use App\Contabilidad\DiarioGeneral;


trait DiarioGeneralTrait
{

    public function storeDiarioGeneral($request, $id)
    {
        $taller_id            =  $request->id;
        $registros            =  $request->registro;
        $mensaje              =  DiarioGeneral::where('user_id', $id)->where('taller_id', $taller_id)->count() == 1 ? 'Actualizado' : 'Creado';
        $diariogeneral        =  DiarioGeneral::updateOrCreate(
            ['user_id'        => $id, 'taller_id' => $taller_id],
            [
                'nombre'      => $request->nombre,
                'completado'  => false,
                'total_haber' => $request->total_haber,
                'total_debe'  => $request->total_debe,
                'datos'       => json_encode($registros),
            ]
        );
        return  array(
            'success' => $mensaje == 'Actualizado' ? 'act' : true,
            'message' => "Diario General {$mensaje} Correctamente"
        );
    }
    public function getDiarioGeneral($taller, $id)
    {
        $diarioGeneral = DiarioGeneral::where('user_id', $id)->where('taller_id', $taller)->first();
        if (isset($diarioGeneral)) {
            $registers         =  json_decode($diarioGeneral->datos);
            $normal            =  $this->getRegistros('normal', $registers);
            $inicial           =  $this->getRegistros('inicial', $registers);
            $ajustado          =  $this->getRegistros('ajustado', $registers);
            $array             =  array(
                'datos'        => true,
                'nombre'       => $diarioGeneral->nombre,
                'registros'    => $normal,
                'tieneinicial' => count($inicial) > 0 ? true    : false,
                'inicial'      => count($inicial)  ? $inicial[0] : [],
                'ajustado'     => $ajustado,
                't_haber'      => $diarioGeneral->total_haber,
                't_debe'       => $diarioGeneral->total_debe,
            );
        } else {
            $array = array(
                'datos'    => false
            );
        }
        return $array;
    }
    public function getRegistros($tipo, $registros)
    {
        $datos                     =  collect($registros);
        $filtros                   =  $datos->filter(function ($registro) use ($tipo) {
            return $registro->tipo == $tipo;
        })->values();
        return $filtros->all();
    }
}
