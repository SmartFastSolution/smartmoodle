<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TallersController extends Controller
{
    public function taller1(){

    	return view('talleres.taller1');
    }
    public function store1(Request $request){
    	$resul = $request->all();

    	return($resul);

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

    	return view('talleres.taller6');
    }
     public function taller7(){

    	return view('talleres.taller7');
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
}
