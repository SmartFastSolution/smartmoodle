<?php

namespace App\Http\Controllers;

use App\Modulo\ModuloCheque;
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

    	return response(array(                                         //ENVIO DE RESPUESTA
                    'success' => true,
                    'estado' => 'guardado',
                    'cheques' => $cheques,
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
		}elseif ($tipo == 'factura') {
			
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
		}elseif ($tipo == 'factura') {
			
		}
    	return response(array(                                         //ENVIO DE RESPUESTA
                    'success' => true,
                    'estado' => 'elimina',
                    // 'cheques' => $cheque,
                    'message' => 'Documento eliminado correctamente'
                ),200,[]);


    }
}
