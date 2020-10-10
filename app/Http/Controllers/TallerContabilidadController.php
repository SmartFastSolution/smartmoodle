<?php

namespace App\Http\Controllers;

use App\Admin\TallerContabilidad;
use App\Contabilidad\BIActivo;
use App\Contabilidad\BalanceInicial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TallerContabilidadController extends Controller
{
    public function balance_inicial(Request $request)
    {
		$id            = 1;
		$taller_id     = $request->id;
		$a_corriente   = $request->a_corriente;
		$a_nocorriente = $request->a_nocorriente;
		$p_corriente   = $request->p_corriente;
		$p_nocorriente = $request->p_nocorriente;
		$debe          = [];
		foreach ($a_corriente as $value) {
    		$debe[]= $value;
    			
    	}
    	foreach ($a_nocorriente as $value) {
    		$debe[]= $value;
    			
    	}
		$contenido           = TallerContabilidad::select('enunciado')->where('taller_id', $taller_id)->firstOrFail();
		$binicial            = new BalanceInicial; 
		$binicial->taller_id = $taller_id;
		$binicial->user_id   = $id;
		$binicial->enunciado = $contenido->enunciado;
		$binicial->nombre    = $request->nombre;
		$binicial->fecha     = $request->fecha;
		$binicial->save();
		if ($binicial == true) {
			   $o = BalanceInicial::get()->last(); 

               foreach ($debe as $key => $activos) {
    //            	$data            = new BIActivo; 
				// $data->balance_inicial_id = $o->id;
				// $data->nom_cuenta   = $activos['nom_cuenta'];
				// $data->saldo = $activos['saldo'];
			
				// $data->save();
                  $datos=array(
                     'balance_inicial_id'=> $o->id,
                     'nom_cuenta'=> $activos['nom_cuenta'],
                     'saldo'=> $activos['saldo'],
                     'created_at'=> now(),
                     'updated_at'=> now(),
                  );
                  BIActivo::insert($datos);
               }

            return $id;
			
		}
    	// foreach ($a_corriente as $value) {
    	// 	$debe[]= $value;
    			
    	// }
    	// foreach ($a_nocorriente as $value) {
    	// 	$debe[]= $value;
    			
    	// }

    	
    
}
}
