<?php

namespace App\Http\Controllers;

use App\Admin\TallerContabilidad;
use App\Contabilidad\BIActivo;
use App\Contabilidad\BIPatrimonio;
use App\Contabilidad\BIPasivo;
use App\Contabilidad\BalanceInicial;
use App\Contabilidad\DiarioGeneral;
use App\Contabilidad\DGRegistro;
use App\Contabilidad\DGRDebe;
use App\Contabilidad\DGRHaber;
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


        $a = BalanceInicial::where('user_id', $id)->get()->last(); 
        $diariogeneral                     = new DiarioGeneral;
        $diariogeneral->taller_id          = $taller_id;
        $diariogeneral->user_id            = $id;
        $diariogeneral->balance_inicial_id = $a->id;
        $diariogeneral->enunciado          = $contenido->enunciado;
        $diariogeneral->nombre             = $request->nombre;
        $diariogeneral->completado         = false;
        $diariogeneral->save();
        
		if ($binicial == true) {
			   $o = BalanceInicial::where('user_id', $id)->get()->last(); 
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
    }else if($balanceInicial == 1){
        

        
    }
    // else{
    //      return response(array(
    //             'success' => false,
    //             'message' => 'No  puedes crear otro balance inicial'
    //         ),200,[]);
    // }
}
    public function b_inicial_diario(Request $request)
    {
        $id                = Auth::id();
        $taller_id         = $request->id;
        $conteo    = BalanceInicial::where('user_id',$id)->where('taller_id', $taller_id)->count();

        if ($conteo  == 1) {
        $balanceInicial    = BalanceInicial::where('user_id',$id)->where('taller_id', $taller_id)->first();
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
                'nombre' => $balanceInicial->nombre,
                'activos' => $activos,
                'pasivos' => $pasivo_patrimonio
            ),200,[]);
        }else{
             return response(array(
                'datos' => false,
            ),200,[]);
        }
     
    }
    public function obtenerdiario(Request $request)
    {
        $id                = Auth::id();
        $taller_id         = $request->id;
        $dioGeneral    = DiarioGeneral::where('user_id',$id)->where('taller_id', $taller_id)->count();
        $registros = [];
         if ($dioGeneral  == 1) {
              $diairioGeneral    = DiarioGeneral::where('user_id',$id)->where('taller_id', $taller_id)->first();
            foreach ($diairioGeneral->dgRegistro as $key => $registro) {
                $regis = array(
                    'debe' => $registro->dgrDebe,
                    'haber'=>$registro->dgrHaber
                );

                $registros[]= $regis;
            }
            return response(array(
                'datos' => true,
                'dgeneral' => $registros
            ),200,[]);


         }else{
             return response(array(
                'datos' => false,
            ),200,[]);

         }
    }

    public function diario(Request $request)
    {
        $id                = Auth::id();
        $taller_id         = $request->id;
        $diariogeneral = DiarioGeneral::where('user_id',$id)->where('taller_id', $taller_id)->count();


        if ($diariogeneral == 1) {                                      // SI YA ESTA CREADO EL REGISTRO DEL DIARIO GENERAL, PARA ESO PRIMERO DEBE TENER CONCLUIDO EL BALANCE INICIAL
        $diariog = DiarioGeneral::where('user_id',$id)->where('taller_id', $taller_id)->first();
        $registro = $request->registro;
        $debe =[];
        $haber =[];
        foreach ($registro as $key => $value) {                         //RECORRER TODOS LOS REGISTROS EN EL ARRAY
            $regis=array(
                     'diario_general_id'  => $diariog->id,
                     'no_registro'        => $key + 1,
                     'comentario'         => '',
                     'fecha'              => $value['debe'][0]['fecha'],
                     'created_at'         => now(),
                     'updated_at'         => now(),
                  );
                  DGRegistro::insert($regis);                           //GUARDAR CADA REGISTRO EN LA BASE DE DATOS
        }
        $register = $diariog->dgRegistro;
        foreach ($registro as $key => $value) {                         ////RECORRER TODOS LOS REGISTROS EN EL ARRAY
            foreach ($value['debe'] as $key1 => $value1) {              ////RECORRER TODOS LAS CUENTAS DE DEBE QUE PERTENECEN A UN REGISTRO
                $regis1=array(
                     'd_g_registro_id'  => $register[$key]->id,
                     'nom_cuenta'        => $value1['nom_cuenta'],
                     'saldo'              => $value1['saldo'],
                     'fecha'              => $value1['fecha'],
                     'created_at'         => now(),
                     'updated_at'         => now(),
                  );
                  DGRDebe::insert($regis1);                             //GURDAR ESAS CUENTAS EN LA TABLA DEBE CON EL ID DEL REGISTRO AL QUE CORRESPONDEN
            }
              foreach ($value['haber'] as $key2 => $value2) {           ////RECORRER TODOS LAS CUENTAS DE HABER QUE PERTENECEN A UN REGISTRO
                $regis2=array(
                     'd_g_registro_id'  => $register[$key]->id,
                     'nom_cuenta'        => $value2['nom_cuenta'],
                     'saldo'              => $value2['saldo'],
                     'created_at'         => now(),
                     'updated_at'         => now(),
                  );
                  DGRHaber::insert($regis2);                            //GURDAR ESAS CUENTAS EN LA TABLA HABER CON EL ID DEL REGISTRO AL QUE CORRESPONDEN
            }
        }
        $diariog->completado = true;                                    //CAMBIAR EL VALOR DE COMPLETADO A TRUE /// ESTO SIGNIFICA QUE EL TALLER HA SIDO COMPLETADO
        $diariog->save();                                               //GUARDAR ESE CAMBIO
         return response(array(                                         //ENVIO DE RESPUESTA
                'success' => true,
                'message' => 'Diario General creado correctamente'
            ),200,[]);

         } else {                                                       // SI NO TIENE CREADO EL BALANCE INICIAL ANTES DE GUARDAR, LE SALDRA UNA NOTIFICACION INDICANDO DICHO PUNTO
            return response(array(
                'success' => false,
                'message' => 'Debes de crear el Balance Inicial primero'
            ),200,[]);
        }
    }
}
