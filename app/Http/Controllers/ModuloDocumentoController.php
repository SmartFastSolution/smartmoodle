<?php

namespace App\Http\Controllers;

use App\Modulo\ModuloCheque;
use App\Modulo\ModuloFactura;
use App\Modulo\ModuloNotaCredito;
use App\User;
use Auth;
use Illuminate\Http\Request;

class ModuloDocumentoController extends Controller
{
    public function cheque(Request $request)
    {
    	$userID = Auth::id();
    	$tallerID = $request->id;
    // $conteo = ModuloCheque::where('taller_id', $tallerID)->where('user_id', $userID)->count();
    	// if ($conteo == 0) {
			$cheque                 = new  ModuloCheque;
			$cheque->taller_id      =  $tallerID;
			$cheque->user_id        =  $userID;
			$cheque->modulo         =  $request->modulo;
			$cheque->tipo_documento =  $request->tipo_documento;
			$cheque->tipo_cheque    =  $request->tipo_cheque;
			$cheque->banco          =  $request->banco;
			$cheque->girador        =  $request->girador;
			$cheque->cantidad       =  $request->cantidad;
			$cheque->n_cheque       =  $request->n_cheque;
			$cheque->cantidad_letra =  $request->cantidad_letra;
			$cheque->ciudad         =  $request->ciudad;
			$cheque->fecha          =  $request->fecha;
			$cheque->firma          =  $request->firma;
			$cheque->save();

			 return response(array(                                         //ENVIO DE RESPUESTA
                    'success' => true,
                    'estado' => 'guardado',
                    'cheque' => $cheque,
                    'message' => 'Kardex Fifo actualizado correctamente'
                ),200,[]);
    	// }else {
    		
    	// }
    	
    }
    public function documentos(Request $request)
    {
    	$user = User::find(Auth::id());
    	$tallerID = $request->id;

    	$cheques = $user->cheques->where('taller_id', $tallerID);
        $nota_creditos = $user->creditos->where('taller_id', $tallerID);
        $facturas = $user->facturas->where('taller_id', $tallerID);



    	return response(array(                                         //ENVIO DE RESPUESTA
                    'success' => true,
                    'estado' => 'guardado',
                    'cheques' => $cheques,
                    'creditos' => $nota_creditos,
                    'facturas' => $facturas,
                    'message' => 'Kardex Fifo actualizado correctamente'
                ),200,[]);
    }
        public function vista(Request $request)
    {
        $user = User::find($request->user);
        $tallerID = $request->id;

        $cheques = $user->cheques->where('taller_id', $tallerID);
        $nota_creditos = $user->creditos->where('taller_id', $tallerID);
        $facturas = $user->facturas->where('taller_id', $tallerID);



        return response(array(                                         //ENVIO DE RESPUESTA
                    'success' => true,
                    'estado' => 'guardado',
                    'cheques' => $cheques,
                    'creditos' => $nota_creditos,
                    'facturas' => $facturas,
                    'message' => 'Kardex Fifo actualizado correctamente'
                ),200,[]);
    }
        public function edicion(Request $request)
    {
    
		$tipo = $request->tipo;
		$id = $request->id;

		if ($tipo == 'cheque') {
			$cheque                 = ModuloCheque::find($id);
			$cheque->modulo         =  $request->modulo;
			$cheque->tipo_documento =  $request->tipo_documento;
			$cheque->tipo_cheque    =  $request->tipo_cheque;
			$cheque->banco          =  $request->banco;
			$cheque->girador        =  $request->girador;
			$cheque->cantidad       =  $request->cantidad;
			$cheque->n_cheque       =  $request->n_cheque;
			$cheque->cantidad_letra =  $request->cantidad_letra;
			$cheque->ciudad         =  $request->ciudad;
			$cheque->fecha          =  $request->fecha;
			$cheque->firma          =  $request->firma;
			$cheque->save();
		}elseif ($tipo == 'nota_credito') {

            $nota_credito                     = ModuloNotaCredito::find($id);
            $nota_credito->modulo             =  $request->modulo;
            $nota_credito->tipo_documento     =  $request->tipo_documento;
            $nota_credito->razon_social       =  $request->razon_social;
            $nota_credito->fecha_emision      =  $request->fecha_emision;
            $nota_credito->ruc                =  $request->ruc;
            $nota_credito->comprobante        =  $request->comprobante;
            $nota_credito->razon_modificacion =  $request->razon_modificacion;
            $nota_credito->emision            =  $request->emision;
            $nota_credito->datos              = json_encode($request->datos);
            $nota_credito->totales            = json_encode($request->totales);
            $nota_credito->save();

			
		}
        elseif ($tipo == 'factura') {

            $factura                     = ModuloFactura::find($id);
            $factura->modulo             =  $request->modulo;
            $factura->tipo_documento     =  $request->tipo_documento;
            $factura->razon_social       =  $request->razon_social;
            $factura->fecha_emision      =  $request->fecha_emision;
            $factura->ruc                =  $request->ruc;
            $factura->guia_remision      =  $request->guia_remision;
            $factura->datos              = json_encode($request->datos);
            $factura->totales            = json_encode($request->totales);
            $factura->save();

            
        }
    	return response(array(                                         //ENVIO DE RESPUESTA
                    'success' => true,
                    'estado' => 'guardado',
                    // 'cheques' => $cheque,
                    'message' => 'Documento actualizado correctamente'
                ),200,[]);


    }
        public function eliminar(Request $request)
    {
    
		$tipo = $request->tipo;
		$id = $request->id;

		if ($tipo === 'Cheque') {
			$cheque                 = ModuloCheque::find($id);
			$cheque->delete();
		}elseif ($tipo === 'Nota de Credito') {
			$nota_credito = ModuloNotaCredito::find($id);
            $nota_credito->delete();
		}elseif ($tipo === 'Factura') {
            $factura = ModuloFactura::find($id);
            $factura->delete();
        }
    	return response(array(                                         //ENVIO DE RESPUESTA
                    'success' => true,
                    'estado' => 'elimina',
                    // 'cheques' => $cheque,
                    'message' => 'Documento eliminado correctamente'
                ),200,[]);


    }
    public function nota_credito(Request $request)
    {
        $userID = Auth::id();
        $tallerID = $request->id;
  
            $nota_credito                     = new  ModuloNotaCredito;
            $nota_credito->taller_id          =  $tallerID;
            $nota_credito->user_id            =  $userID;
            $nota_credito->modulo             =  $request->modulo;
            $nota_credito->tipo_documento     =  $request->tipo_documento;
            $nota_credito->razon_social       =  $request->razon_social;
            $nota_credito->fecha_emision      =  $request->fecha_emision;
            $nota_credito->ruc                =  $request->ruc;
            $nota_credito->comprobante        =  $request->comprobante;
            $nota_credito->razon_modificacion =  $request->razon_modificacion;
            $nota_credito->emision            =  $request->emision;
            $nota_credito->datos              = json_encode($request->datos);
            $nota_credito->totales            = json_encode($request->totales);
            $nota_credito->save();
             return response(array(  
                    'success' => true,
                    'estado' => 'guardado',
                    'nota_credito' => $nota_credito,
                    'message' => 'Kardex Fifo actualizado correctamente'
                ),200,[]);
    }
        public function factura(Request $request)
    {
            $userID = Auth::id();
            $tallerID = $request->id;
            $factura                     = new  ModuloFactura;
            $factura->taller_id          =  $tallerID;
            $factura->user_id            =  $userID;
            $factura->modulo             =  $request->modulo;
            $factura->tipo_documento     =  $request->tipo_documento;
            $factura->razon_social       =  $request->razon_social;
            $factura->fecha_emision      =  $request->fecha_emision;
            $factura->ruc                =  $request->ruc;
            $factura->guia_remision      =  $request->guia_remision;
            $factura->datos              = json_encode($request->datos);
            $factura->totales            = json_encode($request->totales);
            $factura->save();
             return response(array(  
                    'success' => true,
                    'estado' => 'guardado',
                    'factura' => $factura,
                    'message' => 'Kardex Fifo actualizado correctamente'
                ),200,[]);
    }
}
