<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TallerCompletarRes;
use App\TallerCompleteEnRes;
use App\TallerClasificarRes;
use App\TallerDiferencia;
use App\TallerSeñalar;
use App\TallerIdentificarRe;
use App\TallerGusanoRe;
use App\TallerCirEjemploRe;
use App\TallerSubrayarRe;

class TallersController extends Controller
{
    public function taller1(){

    	return view('talleres.taller1');
    }

    public function store1(Request $request){
    $taller1 = new TallerCompletarRes; 
    $taller1->taller_id  = '1';
    $taller1->user_id =    '1';           
    $taller1->enunciado =  'COMPLETE EL ENUNCIADO CORRECTAMENTE.';           
    $taller1->respuesta =   $request->input('respuesta');   
    $taller1->save();

    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
    //return response($content = 'Taller completado correctamente', $status = 200);
    }

      public function store2(Request $request){
    $taller1 = new TallerClasificarRes; 
    $taller1->taller_id  = '1';
    $taller1->user_id =    '1';           
    $taller1->enunciado =  'CLASIFIQUE  EL  COMERCIO,  CON  ORIGINALIDAD.';           
    $taller1->resp1 =   $request->input('resp1');   
    $taller1->resp2 =   $request->input('resp2');   
    $taller1->resp3 =   $request->input('resp3');   
    $taller1->resp4 =   $request->input('resp4');   
    $taller1->save();

    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
    //return response($content = 'Taller completado correctamente', $status = 200);
    }

        public function store4(Request $request){
    $taller1 = new TallerCompleteEnRes; 
    $taller1->taller_id  = '1';
    $taller1->user_id =    '1';           
    $taller1->enunciado =  'COMPLETE LOS ENUNCIADOS CORRECTAMENTE';           
    $taller1->respuesta1 =   $request->input('respuesta1');   
    $taller1->respuesta2 =   $request->input('respuesta2');   
    $taller1->respuesta3 =   $request->input('respuesta3');   
    $taller1->respuesta4 =   $request->input('respuesta4');   
    $taller1->respuesta5 =   $request->input('respuesta5');   
    $taller1->save();

    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
    //return response($content = 'Taller completado correctamente', $status = 200);
    }
     public function store5(Request $request){
    $taller1 = new TallerDiferencia; 
    $taller1->taller_id  = '1';
    $taller1->user_id =    '1';           
    $taller1->enunciado =  'COMPLETE LOS ENUNCIADOS CORRECTAMENTE';
    $taller1->item_a =          'Personas Capaces';   
    $taller1->item_b =          'personas incapaces';             
    $taller1->diferencia_1a =   $request->input('diferencia_1a');   
    $taller1->diferencia_2a =   $request->input('diferencia_2a');   
    $taller1->diferencia_3a =   $request->input('diferencia_3a');   
    $taller1->diferencia_1b =   $request->input('diferencia_1b');   
    $taller1->diferencia_2b =   $request->input('diferencia_2b');   
    $taller1->diferencia_3b =   $request->input('diferencia_3b');   
    $taller1->save();

    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
    //return response($content = 'Taller completado correctamente', $status = 200);
    }

    public function store6(Request $request){

     $encoitem1 = 'Comercio/'.$request->input('comercio');   
     $encoitem2 = 'SECTOR PRODUCCIÓN/'.$request->input('sector_produccion');   
    $taller1 = new TallerSeñalar; 
    $taller1->taller_id  = '1';
    $taller1->user_id =    '1';           
    $taller1->enunciado =  'SEÑALE  LA  ALTERNATIVA  CORRECTA.';            
    $taller1->item_1 =   $encoitem1;
    $taller1->item_2 =   $encoitem2;   
    $taller1->save();

    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
    //return response($content = 'Taller completado correctamente', $status = 200);
    }
    public function store7(Request $request)
    {
    $taller7 = new TallerIdentificarRe; 
    $taller7->taller_id  = '1';
    $taller7->user_id =    '1';           
    $taller7->enunciado =  'ESCRIBA  EN  EL  GUSANILLO  LAS  PROHIBICIONES  DEL  COMERCIANTE,  CON EFICACIA';            
    $taller7->foto1 =   $request->input('foto1');   
    $taller7->foto2 =   $request->input('foto2');   
    $taller7->foto3 =   $request->input('foto3');   
    $taller7->foto4 =   $request->input('foto4');   
    $taller7->foto5 =   $request->input('foto5');   
    $taller7->foto6 =   $request->input('foto6');  
    $taller7->save();

    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
    }
    public function store8(Request $request)
    {
    $taller8 = new TallerGusanoRe; 
    $taller8->taller_id  = '1';
    $taller8->user_id =    '1';           
    $taller8->enunciado =  'ESCRIBA  EN  EL  GUSANILLO  LAS  PROHIBICIONES  DEL  COMERCIANTE,  CON EFICACIA';           
    $taller8->respuesta1 =   $request->input('respuesta1');   
    $taller8->respuesta2 =   $request->input('respuesta2');   
    $taller8->respuesta3 =   $request->input('respuesta3');    
    $taller8->save();

    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
    }
        public function store9(Request $request)
    {
    $taller9 = new TallerCirEjemploRe; 
    $taller9->taller_id  = '1';
    $taller9->user_id =    '1';           
    $taller9->enunciado =  'SUBRAYE LA ALTERNATIVA CORRECTA.';           
    $taller9->respuesta1 =   $request->input('respuesta1');   
    $taller9->respuesta2 =   $request->input('respuesta2');   
    $taller9->respuesta3 =   $request->input('respuesta3');    
    $taller9->respuesta4 =   $request->input('respuesta4');    
    $taller9->save();

    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
    }
    public function store10(Request $request)
    {

     $encoitem1 = 'Persona incapaz de ejercer el comercio/'.$request->input('item');   
     $encoitem2 = 'Adquirir un bien/'.$request->input('item1');  
     $encoitem3 = 'Persona capaz de ejercer el comercio/'.$request->input('item2');  
    $taller10 = new TallerSubrayarRe; 
    $taller10->taller_id  = '1';
    $taller10->user_id =    '1';           
    $taller10->enunciado =  'SUBRAYE LA ALTERNATIVA CORRECTA.';           
    $taller10->item =   $encoitem1;   
    $taller10->item1 =   $encoitem2;  
    $taller10->item2 =   $encoitem3;       
    $taller10->save();

    return redirect()->route('welcome')->with('datos', 'Programa creado correctamente!');
    }
    public function taller2(){

    	return view('talleres.taller2');
    }

    public function taller3(){

    	return view('talleres.taller3');
    }

    public function taller4(){

    	return view('talleres.taller4');
    }
    public function taller5(){

    	return view('talleres.taller5');
    }
    public function taller6(){
        $dato = TallerSeñalar::where('id', 1)->get();
            foreach ($dato as $value) { 
                $info = explode('/', $value->item_1);
                 //$for1 = $info[0];
                //$for2 =  $info[1];
                
                } 
        //return view('talleres.taller6', compact('for1', 'for2'));
    return view('talleres.taller6', compact('info'));
    }
     public function taller7(){
        $i= 0;

    	return view('talleres.taller7', compact('i'));
    }
      public function taller8(){

    	return view('talleres.taller8');
    }

      public function taller9(){

    	return view('talleres.taller9');
    } public function taller10(){

    	return view('talleres.taller10');
    }
    public function taller11(){

    	return view('talleres.taller11');
    }
    public function taller12(){

    	return view('talleres.taller12');
    }

     public function taller13(){

    	return view('talleres.taller13');
    }
      public function taller14(){

    	return view('talleres.taller14');
    }

    public function taller15(){

    	return view('talleres.taller15');
    }
    public function taller16(){

    	return view('talleres.taller16');
    }
    public function taller17(){

    	return view('talleres.taller17');
    }
    public function taller18(){

    	return view('talleres.taller18');
    }
    public function taller19(){

    	return view('talleres.taller19');
    }
    public function taller20(){

    	return view('talleres.taller20');
    }
     public function taller21(){

        return view('talleres.taller21');
    }
     public function taller22(){

        return view('talleres.taller22');
    }
     public function taller23(){

        return view('talleres.taller23');
    }
     public function taller24(){

        return view('talleres.taller24');
    }
     public function taller25(){

        return view('talleres.taller25');
    }
    public function taller26(){

        return view('talleres.taller26');
    }
    public function taller27(){

        return view('talleres.taller27');
    }
    public function taller28(){

        return view('talleres.taller28');
    }
    public function taller29(){

        return view('talleres.taller29');
    }
    public function taller30(){

        return view('talleres.taller30');
    }
     public function taller31(){

        return view('talleres.taller31');
    }
     public function taller32(){

        return view('talleres.taller32');
    }
     public function taller33(){

        return view('talleres.taller33');
    }
     public function taller34(){

        return view('talleres.taller34');
    }
     public function taller35(){

        return view('talleres.taller35');
    }
    public function taller36(){

        return view('talleres.taller36');
    }
    public function taller37(){

        return view('talleres.taller37');
    }
    public function taller38(){

        return view('talleres.taller38');
    }
    public function taller39(){

        return view('talleres.taller39');
    }
    public function taller40(){

        return view('talleres.taller40');
    }
    public function taller41(){

        return view('talleres.taller41');
    }
    public function taller42(){

        return view('talleres.taller42');
    }
    public function taller43(){

        return view('talleres.taller43');
    }
    public function taller44(){

        return view('talleres.taller44');
    }
     public function taller45(){

        return view('talleres.taller45');
    }
     public function taller46(){

        return view('talleres.taller46');
    }
     public function taller47(){

        return view('talleres.taller47');
    }
     public function taller48(){

        return view('talleres.taller48');
    }
     public function taller49(){

        return view('talleres.taller49');
    }
     public function taller50(){

        return view('talleres.taller50');
    }
     public function taller51(){

        return view('talleres.taller51');
    }
     public function taller52(){

        return view('talleres.taller52');
    }
     public function taller53(){

        return view('talleres.taller53');
    }
     public function taller54(){

        return view('talleres.taller54');
    }
     public function taller55(){

        return view('talleres.taller55');
    }
     public function taller56(){

        return view('talleres.taller56');
    }

}
