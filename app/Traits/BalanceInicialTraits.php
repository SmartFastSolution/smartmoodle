<?php

namespace App\Traits;

use App\Contabilidad\BalanceInicial;
use Illuminate\Support\Facades\Auth;

trait BalanceInicialTraits
{

    public function storeBalanceInicial($request, $id)
    {
        $taller_id = $request->id;
        $tipo      = $request->tipo;
        $mensaje   = BalanceInicial::where('user_id', $id)->where('taller_id', $taller_id)->count() == 1 ? 'Actualizado' : 'Creado';
        $balanceInicial = BalanceInicial::updateOrCreate(
            ['user_id' => $id, 'taller_id' => $taller_id, 'tipo' => $tipo],
            [
                'enunciado'                => $request->enunciado,
                'nombre'                   => $request->nombre,
                'fecha'                    => $request->fecha,
                'total_activo_corriente'   => $request->totales_totales['t_a_corriente'],
                'total_activo_nocorriente' => $request->totales_totales['t_a_nocorriente'],
                'total_pasivo_corriente'   => $request->totales_totales['t_p_corriente'],
                'total_pasivo_nocorriente' => $request->totales_totales['t_p_no_corriente'],
                'total_activo'             => $request->totales_iniciales['t_activo'],
                'total_pasivo'             => $request->totales_iniciales['t_pasivo'],
                'total_patrimonio'         => $request->totales_totales['t_patrimonio'],
                'total_pasivo_patrimonio' => $request->t_patrimonio,
                'datos' => $this->arrayDatosInicial(
                    $request->a_corriente,
                    $request->a_nocorriente,
                    $request->p_corriente,
                    $request->p_nocorriente,
                    $request->patrimonio
                )
            ]
        );
        return  array(
            'success' => true,
            'message' => "Balance Inicial {$mensaje} Correctamente"
        );
    }
    public function arrayDatosInicial(
        $a_corriente,
        $a_nocorriente,
        $p_corriente,
        $p_nocorriente,
        $patrimonio
    ) {
        $cuentas = array(
            'a_corriente' => $a_corriente,
            'a_nocorriente' => $a_nocorriente,
            'p_corriente' => $p_corriente,
            'p_nocorriente' => $p_nocorriente,
            'patrimonio' => $patrimonio,
        );
        return json_encode($cuentas);
    }
    public function getBalanceInicial($taller, $tipo, $id)
    {
        $balanceInicial = BalanceInicial::where('user_id', $id)->where('taller_id', $taller)->where('tipo', $tipo)->first();
        if (isset($balanceInicial)) {
            $cuenta = json_decode($balanceInicial->datos);
            $array = array(
                'datos'                   => true,
                'completo'                   => $balanceInicial,
                'nombre'                  => $balanceInicial->nombre,
                'tipo'                    => $tipo,
                'message'                 => "Balance Inicial {$tipo} Cargado Correctamente",
                'fecha'                   => $balanceInicial->fecha,
                'total_pasivo_patrimonio' => $balanceInicial->total_pasivo_patrimonio,
                'a_corriente'             => $cuenta->a_corriente,
                'a_nocorriente'           => $cuenta->a_nocorriente,
                'p_corriente'             => $cuenta->p_corriente,
                'p_nocorriente'           => $cuenta->p_nocorriente,
                'patrimonios'              => $cuenta->patrimonio,
            );
        } else {
            $array = array(
                'datos'    => false
            );
        }
        return $array;
    }
    /**
     * Undocumented function
     *
     * @param array $cuentas
     * @return array
     */
    public function filterCuentas(array $cuentas)
    {
        $datos = [];
        foreach ($cuentas as $k => $cuenta) {
            foreach ($cuenta as $v => $valores) {
                $valores->fecha = null;
                $datos[] = $valores;
            }
        }
        return $datos;
    }
}
