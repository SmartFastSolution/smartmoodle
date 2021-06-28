<?php

namespace App\Http\Controllers;

use App\Anexocaja;
use App\ArqueoExi;
use App\Cajadatos;
use App\Librobanco;
use App\Arqueocajas;
use App\ArqueoSaldo;
use App\Retencioniva;
use App\Nominaempleado;
use App\Movimientobanco;
use App\Provisionsocial;
use App\Movimientonomina;
use App\Conciliacionsaldo;
use App\Retencionivaventa;
use App\Conciliacioncheque;
use App\Conciliaciondebito;
use App\Retencionivacompra;
use App\Conciliacioncredito;
use App\Movimientoprovision;
use Illuminate\Http\Request;
use App\Conciliacionbancaria;
use App\Conciliaciondeposito;
use App\Contabilidad\BGActivo;
use App\Contabilidad\BGPasivo;
use App\Contabilidad\ERIngreso;
use App\Traits\kardexFifoTrait;
use App\Contabilidad\BCRegistro;
use App\Contabilidad\HTRegistro;
use App\Contabilidad\KPRegistro;
use App\Contabilidad\BCARegistro;
use App\Contabilidad\HojaTrabajo;
use App\Traits\MayorGeneralTrait;
use App\Traits\DiarioGeneralTrait;
use App\Traits\AsientosCierreTrait;
use App\Contabilidad\BalanceGeneral;
use App\Contabilidad\KardexPromedio;
use App\Traits\BalanceInicialTraits;
use App\Contabilidad\BalanceAjustado;
use App\Contabilidad\EstadoResultado;
use App\Admin\TallerModuloTransaccion;
use App\Contabilidad\BalanceComprobacion;


class TallerContabilidadDocenteController extends Controller
{
    use BalanceInicialTraits,
        kardexFifoTrait,
        DiarioGeneralTrait,
        MayorGeneralTrait,
        AsientosCierreTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function obtenerKardexFifo(Request $request)
    {
        $id         = $request->user;
        $taller_id  = $request->id;
        $producto_id = $request->producto_id;
        return response()->json($this->getarrayDatosKardexFifo($taller_id, $producto_id, $id), 201);
    }
    public function obtenerLibroCaja(Request $request)
    {

        $user_id = $request->user;
        $taller_id = $request->id;
        $obanexo = Anexocaja::where('user_id', $user_id)->where('taller_id', $taller_id)->count();
        if ($obanexo == 1) {
            $anexocaja = Anexocaja::where('user_id', $user_id)->where('taller_id', $taller_id)->first();
            $obtenerc  = Cajadatos::select('fecha', 'detalle', 'debe', 'haber', 'saldo')->where('anexocaja_id', $anexocaja->id)->get();

            return response(array(
                'datos' => true,
                'banexocaja' => $obtenerc,
                'nombre' => $anexocaja->nombre,
                'totaldebe' => $anexocaja->totaldebe,
                'totalhaber' => $anexocaja->totalhaber
            ), 200, []);
        } else {
            return response(array(
                'datos' => false,
            ), 200, []);
        }
    }
    public function obtenerKardexPromedio(Request $request)
    {
        $id         = $request->user;
        $taller_id  = $request->id;
        $producto_id  = $request->producto_id;
        $kardexpro = KardexPromedio::where('user_id', $id)->where('taller_id', $taller_id)->where('producto_id', $producto_id)->count();
        $producto = TallerModuloTransaccion::where('id', $producto_id)->first();

        // $registros  = [];
        if ($kardexpro  == 1) {

            $kardexPromedio = KardexPromedio::select('id', 'nombre', 'producto', 'inv_inicial_cantidad', 'adquisicion_cantidad', 'ventas_cantidad', 'inv_final_cantidad', 'inv_inicial_precio', 'adquisicion_precio', 'ventas_precio', 'inv_final_precio',)->where('user_id', $id)->where('taller_id', $taller_id)->first();

            $obtener       = KPRegistro::select('fecha', 'movimiento', 'tipo', 'ingreso_cantidad', 'ingreso_precio', 'ingreso_total', 'egreso_cantidad', 'egreso_precio', 'egreso_total', 'existencia_cantidad', 'existencia_precio', 'existencia_total')->where('kardex_promedio_id', $kardexPromedio->id)->get();

            return response(array(
                'datos' => true,
                'informacion' => $kardexPromedio,
                'kardex_promedio' => $obtener,
                'transacciones' => $producto

            ), 200, []);
        } else {
            return response(array(
                'datos' => false,
                'transacciones' => $producto

            ), 200, []);
        }
    }
    public function obtenerBalanceAjustado(Request $request)
    {
        $id         = $request->user;
        $taller_id  = $request->id;
        $dioGeneral = BalanceAjustado::where('user_id', $id)->where('taller_id', $taller_id)->count();
        // $registros  = [];
        if ($dioGeneral  == 1) {
            $balanceCompro = BalanceAjustado::where('user_id', $id)->where('taller_id', $taller_id)->first();
            $obtener       = BCARegistro::select('cuenta', 'cuenta_id', 'debe', 'haber')->where('balance_ajustado_id', $balanceCompro->id)->get();

            return response(array(
                'datos' => true,
                'nombre' => $balanceCompro->nombre,
                'fecha' => $balanceCompro->fecha,
                't_debe' => $balanceCompro->total_debe,
                't_haber' => $balanceCompro->total_haber,
                'bcomprobacionAjustado' => $obtener
            ), 200, []);
        } else {
            return response(array(
                'datos' => false,
            ), 200, []);
        }
    }
    public function obtenerBalanceCompro(Request $request)
    {
        $id         = $request->user;
        $taller_id  = $request->id;
        $dioGeneral = BalanceComprobacion::where('user_id', $id)->where('taller_id', $taller_id)->count();
        // $registros  = [];
        if ($dioGeneral  == 1) {
            $balanceCompro = BalanceComprobacion::where('user_id', $id)->where('taller_id', $taller_id)->first();
            $obtener       = BCRegistro::select('cuenta', 'cuenta_id', 'suma_debe', 'suma_haber', 'saldo_debe', 'saldo_haber')->where('balance_comprobacion_id', $balanceCompro->id)->get();

            return response(array(
                'datos' => true,
                'balanceCompro' => $balanceCompro,
                'bcomprobacion' => $obtener,
                'nombre' => $balanceCompro->nombre,
                'fecha' => $balanceCompro->fecha
            ), 200, []);
        } else {
            return response(array(
                'datos' => false,
            ), 200, []);
        }
    }
    public function obtenerHojaTraba(Request $request)
    {
        $id         = $request->user;
        $taller_id  = $request->id;
        $dioGeneral = HojaTrabajo::where('user_id', $id)->where('taller_id', $taller_id)->count();
        // $registros  = [];
        if ($dioGeneral  == 1) {
            $balanceCompro = HojaTrabajo::where('user_id', $id)->where('taller_id', $taller_id)->first();
            $obtener       = HTRegistro::select('cuenta', 'cuenta_id', 'bc_debe', 'bc_haber', 'ajuste_debe', 'ajuste_haber', 'ba_debe', 'ba_haber', 'er_debe', 'er_haber', 'bg_debe', 'bg_haber')->where('hoja_trabajo_id', $balanceCompro->id)->get();

            return response(array(
                'datos' => true,
                'totales' => $balanceCompro,
                'hojatrabajo' => $obtener,
                'nombre' => $balanceCompro->nombre,
            ), 200, []);
        } else {
            return response(array(
                'datos' => false,
            ), 200, []);
        }
    }
    public function obtenerbalance(Request $request)
    {
        $user_id           = $request->user;
        $taller_id     = $request->id;
        return response()->json($this->getBalanceInicial($taller_id, 'horizontal', $user_id), 200);
    }
    function balance_vertical(Request $request)
    {
        $user_id           = $request->user;
        $taller_id     = $request->id;
        return response()->json($this->getBalanceInicial($taller_id, 'vertical', $user_id), 200);
    }
    public function obtenerdiario(Request $request)
    {
        $id                = $request->user;
        $taller_id         = $request->id;
        return response($this->getDiarioGeneral($taller_id, $id), 200);
    }

    public function obtenermayor(Request $request)
    {
        $id         = $request->user;
        $taller_id  = $request->id;
        return response($this->getMayorGeneral($taller_id, $id), 200);
    }
    public function obtenerEstado(Request $request)
    {
        $id         = $request->user;
        $taller_id  = $request->id;
        $mayorGeneral = EstadoResultado::where('user_id', $id)->where('taller_id', $taller_id)->count();
        $registros  = [];
        $cierres    = [];
        if ($mayorGeneral  == 1) {
            $mgeneral = EstadoResultado::where('user_id', $id)->where('taller_id', $taller_id)->first();


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
            ), 200, []);
        } else {
            return response(array(
                'datos' => false,
            ), 200, []);
        }
    }
    public function obtenerbalanceGeneral(Request $request)
    {
        $id            = $request->user;
        $taller_id     = $request->id;
        $balanceGeneral = BalanceGeneral::where('user_id', $id)->where('taller_id', $taller_id)->count();

        if ($balanceGeneral >= 1) {

            $datos = BalanceGeneral::where('user_id', $id)->where('taller_id', $taller_id)->first();

            $a_corrientes      = BGActivo::select('cuenta', 'cuenta2', 'resta', 'cuenta_id', 'saldo', 'total_saldo', 'cuenta_id2', 'saldo2', 'total_saldo2', 'tipo')->where('balance_general_id', $datos->id)->where('tipo', 'corriente')->get();

            $a_nocorrientes    = BGActivo::select('cuenta', 'cuenta2', 'resta', 'cuenta_id', 'saldo', 'total_saldo', 'cuenta_id2', 'saldo2', 'total_saldo2', 'tipo')->where('balance_general_id', $datos->id)->where('tipo', 'nocorriente')->get();

            $p_corriente       = BGPasivo::select('cuenta', 'cuenta_id', 'saldo')->where('balance_general_id', $datos->id)->where('tipo', 'corriente')->get();

            $p_nocorriente     = BGPasivo::select('cuenta', 'cuenta_id', 'saldo')->where('balance_general_id', $datos->id)->where('tipo', 'nocorriente')->get();

            $patrimonios       = $datos->bgPatrimonios;

            return response(array(
                'datos'                   => true,
                'nombre'                  => $datos->nombre,
                'fecha'                   => $datos->fecha,
                'total_pasivo_patrimonio' => $datos->total_pasivo_patrimonio,
                'a_corriente'             => $a_corrientes,
                'a_nocorriente'           => $a_nocorrientes,
                'p_corriente'             => $p_corriente,
                'p_nocorriente'           => $p_nocorriente,
                'patrimonios'             => $patrimonios,
                'bgneral'                 => $datos,
                't_activo'                => $datos->t_activo,
                't_pasivo'                => $datos->t_pasivo,
                't_a_corriente'           => $datos->t_a_corriente,
                't_a_nocorriente'         => $datos->t_a_nocorriente,
                't_p_corriente'           => $datos->t_p_corriente,
                't_p_no_corriente'        => $datos->t_p_no_corriente,
                't_patrimonio'            => $datos->t_patrimonio,
            ), 200, []);
        } else {
            return response(array(
                'datos' => false,
            ), 200, []);
        }
    }
    public function obtenerAsientoCierre(Request $request)
    {
        $id         = $request->user;
        $taller_id  = $request->id;
        return response($this->getAsientoCierre($taller_id, $id), 200);
    }
    public function obtenerArqueo(Request $request)
    {
        $user_id    = $request->user;
        $taller_id  = $request->id;

        $ar  = Arqueocajas::where('user_id', $user_id)->where('taller_id', $taller_id)->count();

        if ($ar == 1) {
            $a = Arqueocajas::where('user_id', $user_id)->where('taller_id', $taller_id)->first();
            $sa = ArqueoSaldo::select('detalle', 's_debe', 's_haber')->where('arqueocaja_id', $a->id)->get();
            $ex = ArqueoExi::select('detalle', 'e_debe', 'e_haber')->where('arqueocaja_id', $a->id)->get();

            return response(array(
                'datos' => true,
                'saldo' => $sa,
                'exis' =>  $ex,
                'totaldebe' => $a->totaldebe,
                'totalhaber' => $a->totalhaber
            ), 200, []);
        } else {
            return response(array(
                'datos' => false,
            ), 200, []);
        }
    }

    public function obtenerLbanco(Request $request)
    {
        $uid = $request->user;
        $taller_id = $request->id;
        $lb = Librobanco::where('user_id', $uid)->where('taller_id', $taller_id)->count();

        if ($lb == 1) {
            $lbs = Librobanco::where('user_id', $uid)->where('taller_id', $taller_id)->first();
            $mb  = Movimientobanco::select('fecha', 'detalle', 'cheque', 'debe', 'haber', 'saldo')->where('librobanco_id', $lbs->id)->get();

            return response(array(
                'datos'      => true,
                'mb'         => $mb,
                'nombre'     => $lbs->nombre,
                'n_banco'    => $lbs->n_banco,
                'c_banco'    => $lbs->c_banco,
                'totaldebe'  => $lbs->totaldebe,
                'totalhaber' => $lbs->totalhaber
            ), 200, []);
        } else {
            return response(array(
                'datos' => false,
            ), 200, []);
        }
    }
    public function ObtenerConciliacionB(Request $request)
    {
        $id = $request->user;
        $taller_id = $request->id;
        $cb  = Conciliacionbancaria::where('user_id', $id)->where('taller_id', $taller_id)->count();

        if ($cb == 1) {
            $a     = Conciliacionbancaria::where('user_id', $id)->where('taller_id', $taller_id)->first();
            $saldo     = Conciliacionsaldo::select('fecha', 'detalle', 'saldo')->where('conciliacionbancaria_id',  $a->id)->get();
            $debito    = Conciliaciondebito::select('fecha', 'detalle', 'saldo')->where('conciliacionbancaria_id',  $a->id)->get();
            $credito   = Conciliacioncredito::select('fecha', 'detalle', 'saldo')->where('conciliacionbancaria_id',  $a->id)->get();
            $cheque    = Conciliacioncheque::select('fecha', 'detalle', 'saldo')->where('conciliacionbancaria_id',  $a->id)->get();
            $deposito  = Conciliaciondeposito::select('fecha', 'detalle', 'saldo')->where('conciliacionbancaria_id',  $a->id)->get();

            return response(array(
                'datos'   => true,
                'saldo'   => $saldo,
                'debito'  => $debito,
                'credito' => $credito,
                'cheque'  => $cheque,
                'deposito' => $deposito,
                'nombre'  => $a->nombre,
                'fecha'   => $a->fecha,
                'n_banco' => $a->n_banco,
            ), 200, []);
        } else {
            return response(array(
                'datos' => false,
            ), 200, []);
        } //fin else

    } //fin metodo obtener

    public function ObtenerRetencionIva(Request $request)
    {
        $id = $request->user;
        $taller_id = $request->id;
        $rt = Retencioniva::where('user_id', $id)->where('taller_id', $taller_id)->count();

        if ($rt == 1) {

            $r = Retencioniva::where('user_id', $id)->where('taller_id', $taller_id)->first();
            $compra = Retencionivacompra::select('fecha_c', 'detalle', 'proveedor', 'base_im', 'porcentaje', 'v_retenido', 'iva', 'ret_10', 'ret_20', 'ret_30', 'ret_70', 'ret_100')->where('retencioniva_id',  $r->id)->get();
            $venta = Retencionivaventa::select('fecha_v', 'detalle', 'cliente', 'base_im', 'porcentaje', 'v_retenido', 'iva', 'ret_10', 'ret_20', 'ret_30', 'ret_70', 'ret_100')->where('retencioniva_id',  $r->id)->get();

            return response(array(
                'datos'        => true,
                'compra'       => $compra,
                'venta'        => $venta,
                'nombre'       => $r->nombre,
                'contribuyente' => $r->contribuyente,
                'fecha'        => $r->fecha,
                'ruc'          => $r->ruc,
                't_ivacompra'  => $r->t_ivacompra,
                't_ivaventa'   => $r->t_ivaventa,
                't_reten'      => $r->t_reten,
                'result_iva'   => $r->result_iva,
                'total'        => $r->total,

            ), 200, []);
        } else {
            return response(array(
                'datos' => false,
            ), 200, []);
        } //fin else



    } //fin metodo obtener retencion del iva

    public function obtenerNomina(Request $request)
    {
        $id = $request->user;
        $taller_id     = $request->id;

        $no = Nominaempleado::where('user_id', $id)->where('taller_id', $taller_id)->count();

        if ($no == 1) {

            $n = Nominaempleado::where('user_id', $id)->where('taller_id', $taller_id)->first();
            $m = Movimientonomina::select('nombre_e', 'cargo', 'sueldo', 's_tiempo', 'ingresos', 'iees', 'pres_iees', 'pres_cia', 'anticipo', 'imp_renta', 'egresos', 'neto_pagar')->where('nominaempleado_id',  $n->id)->get();

            return response(array(
                'datos'   => true,
                'nomina'   => $m,
                'nombre'  => $n->nombre,
                'fecha'   => $n->fecha,

            ), 200, []);
        } else {
            return response(array(
                'datos' => false,
            ), 200, []);
        } //fin else

    } //fin metodo obtener



    public function ObtenerProvison(Request $request)
    {

        $id = $request->user;
        $taller_id     = $request->id;
        $no = Provisionsocial::where('user_id', $id)->where('taller_id', $taller_id)->count();

        if ($no == 1) {

            $n = Provisionsocial::where('user_id', $id)->where('taller_id', $taller_id)->first();
            $m = Movimientoprovision::select('nombre_em', 'dias', 'v_recibido', 'd_tercero', 'd_cuarto', 'vacaciones', 'f_reserva')->where('provisionsocial_id',  $n->id)->get();

            return response(array(
                'datos'   => true,
                'pro'   => $m,


            ), 200, []);
        } else {
            return response(array(
                'datos' => false,
            ), 200, []);
        } //fin else

    } //end provision obtener


}
