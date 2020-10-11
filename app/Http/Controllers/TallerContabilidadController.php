<?php

namespace App\Http\Controllers;

use App\Admin\TallerContabilidad;
use App\Contabilidad\BIActivo;
use App\Contabilidad\BIPatrimonio;
use App\Contabilidad\BIPasivo;
use App\Contabilidad\BalanceInicial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TallerContabilidadController extends Controller
{
    public function balance_inicial(Request $request)
    {
        $id            = Auth::id();
        $taller_id     = $request->id;
        $balanceInicial    = BalanceInicial::where('user_id',$id)->where('taller_id', $taller_id)->count();
        if ($balanceInicial == 0) {


        
        
        $a_corriente   = $request->a_corriente;
        $a_nocorriente = $request->a_nocorriente;
        $p_corriente   = $request->p_corriente;
        $p_nocorriente = $request->p_nocorriente;
        $patrimonios   = $request->patrimonio;
        $haber         = [];
        $debe          = [];
        $patrimonio    = [];

		foreach ($a_corriente as $value) {
    		$haber[]= $value;
    			
    	}
    	foreach ($a_nocorriente as $value) {
    		$haber[]= $value;
    			
    	}
        foreach ($p_corriente as $values) {
            $debe[]= $values;
                
        }
        foreach ($p_nocorriente as $values) {
            $debe[]= $values;
                
        }
         foreach ($patrimonios as $valu) {
            $patrimonio[]= $valu;
                
        }
        $contenido                         = TallerContabilidad::select('enunciado')->where('taller_id', $taller_id)->firstOrFail();
        $binicial                          = new BalanceInicial; 
        $binicial->taller_id               = $taller_id;
        $binicial->user_id                 = $id;
        $binicial->enunciado               = $contenido->enunciado;
        $binicial->nombre                  = $request->nombre;
        $binicial->fecha                   = $request->fecha;
        $binicial->total_pasivo_patrimonio = $request->t_patrimonio;

		$binicial->save();
		if ($binicial == true) {
			   $o = BalanceInicial::get()->last(); 
               foreach ($haber as $key => $activos) {
               	//$data            = new BIActivo; 
				// $data->balance_inicial_id = $o->id;
				// $data->nom_cuenta   = $activos['nom_cuenta'];
				// $data->saldo = $activos['saldo'];
			 // $data->save();
                  $datos=array(
                     'balance_inicial_id' => $o->id,
                     'nom_cuenta'         => $activos['nom_cuenta'],
                     'saldo'              => $activos['saldo'],
                     'created_at'         => now(),
                     'updated_at'         => now(),
                  );
                  BIActivo::insert($datos);
               }
                foreach ($debe as $key => $pasivos) {
                  $datos=array(
                     'balance_inicial_id' => $o->id,
                     'nom_cuenta'         => $pasivos['nom_cuenta'],
                     'saldo'              => $pasivos['saldo'],
                     'created_at'         => now(),
                     'updated_at'         => now(),
                  );
                  BIPasivo::insert($datos);
               }
                 foreach ($patrimonio as $key => $patri) {
                     $datos               =array(
                     'balance_inicial_id' => $o->id,
                     'nom_cuenta'         => $patri['nom_cuenta'],
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
    }else{
         return response(array(
                'success' => false,
                'message' => 'No  puedes crear otro balance inicial'
            ),200,[]);
    }
}
    public function b_inicial_diario(Request $request)
    {
        $id                = Auth::id();
        $taller_id         = $request->id;

        $balanceInicial    = BalanceInicial::where('user_id',$id)->where('taller_id', $taller_id)->first();
        if ($balanceInicial->count()  == 1) {
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
        // BIActivo::where('balance_inicial_id', $balanceInicial->id)->get();
         return response(array(
            'datos' => true,
                'activos' => $activos,
                'pasivos' => $pasivo_patrimonio
            ),200,[]);
        }else{
             return response(array(
                'datos' => false,
            ),200,[]);
        }
     
    }
}
