@extends('layouts.nav')

@section('title',  $datos->taller->nombre)
@section('content')

<!--IDENTIFICA  EL  ENUNCIADO  ESCRIBIENDO  (V) DE  VERDADERO   O  (F)  DE 
FALSO,  CON  CERTEZA. -->
<h1 class="text-center  mt-5 text-danger">{{ $datos->taller->nombre }}</h1>
     <h3 class="text-center mt-5 text-info">{{ $datos->enunciado }}</h3>

     <form action="{{ route('taller12', ['idtaller' => $d]) }}" method="POST">
           @csrf
     	<div class="container">
     		<div class="row justify-content-center">
     			<div class="col-7">
                         @foreach ($datos->tallerVerFalOp as $element)
                         <div class="row mt-4 p-2">
                              <div class="col-10 ">
                                   <label class="col-form-label " for="">{{ $element->descripcion }} </label>
                                   
                              </div>
                              <div class="col-2">
                                   <select name="enunciado1" id="" class="inputcurrent p-2">
                                        <option value="V" class="p-2">V</option>
                                        <option value="F" class="p-2">F</option>
                                   </select>
                              </div>
                         </div>
                         <br> 
                         @endforeach			
     			</div>
     		</div>
     		<div class="row justify-content-center">
        		<input type="submit" value="Enviar Respuestas" class="btn p-2 mt-3 btn-danger">
    		 </div>
     	</div>
     </form>

@endsection