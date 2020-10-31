@extends('layouts.nav')

@section('title',  $datos->taller->nombre)
@section('content')

<!--IDENTIFICA  EL  ENUNCIADO  ESCRIBIENDO  (V) DE  VERDADERO   O  (F)  DE 
FALSO,  CON  CERTEZA. -->
     <form action="{{ route('taller1.docente', ['idtaller' => $d]) }}" method="POST">
           @csrf
     	<div class="container">
            <h1 class="text-center text-danger mt-5 display-1">{{ $datos->taller->nombre }}</h1>
        <div class="card border border-danger mb-3" >
          <div class="card-header font-weight-bold" style="font-size: 25px;"> <h1 class="display-3">{{ $user->name }} Salazar</h1></div>
          <div class="card-body">
            <h2 class="font-weight-bold "><span class="badge badge-danger">#</span>{{ $datos->enunciado }}</h2>
            <h6 class="text-muted"> Si el item esta en verde esta correcto, si esta en rojo es incorrecto</h6>

                    <div class="row justify-content-center">
          <div class="col-7">
             @foreach ($datos->verdadFalsoRes as $key => $element)
             <div class="row mt-4 p-2">
                  <div class="col-10 ">
                      <span class="badge badge-pill badge-info">{{$key + 1 }}</span> <label class="col-form-label " for="">{{ $element->enunciado }} </label>
                       
                  </div>
                  <div class="col-2">
                      <span class=" @if ($taller->tallerVerFalOp[$key]->respuesta === $element->respuesta)badge-success @else badge-danger @endif badge p-3">{{ $element->respuesta }}</span>
                  </div>
             </div>
             <br> 
             @endforeach      
          </div>
        </div>
          </div>
            <div class="row justify-content-center">
            <div class="col-5">
              <div class="form-group">
                <label for="exampleFormControlInput1">Calificacion</label>
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="text" class="form-control" name="calificacion" placeholder="Añada una nota al estudiante">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Retroalimentacion</label>
                <textarea class="form-control" name="retroalimentacion" rows="3" placeholder="Agregue una retroalimentacion"></textarea>
              </div>   
               <div class="row justify-content-center mb-5">
                <input type="submit" value="Calificar" class="btn p-2 mt-3 btn-danger">
             </div>
            </div>
        </div>
        </div>
     	</div>
     </form>

@endsection