@extends('layouts.nav')

@section('title', $datos->taller->nombre)
@section('content')
     <form action="{{ route('taller1.docente', ['idtaller' => $d]) }}" method="POST">
           @csrf
     	<div class="container mb-4">
    <h1 class="text-center text-danger mt-5 display-1">{{ $datos->taller->nombre}}</h1>
        <div class="card border border-danger mb-3" >
          <div class="card-header font-weight-bold" style="font-size: 25px;"> <h1 class="display-3">{{ $user->name }} Salazar</h1></div>
          <div class="card-body">
            <h2 class="font-weight-bold "><span class="badge badge-danger">#</span>{{ $datos->enunciado }}</h2>
                  @foreach ($datos->completarRes as $key => $dato)                      
                    <div class="row mt-4 p-2 justify-content-center">
                        <div class="col-4 align-self-center">
                            <label class="col-form-label " for="">{{ $tallers[$key]->enunciados }}</label>                           
                        </div>
                        <div class="col-4">
                            <div class="card">
                              <div class="card-body">
                               {{ $dato->respuesta }}
                              </div>
                            </div>
                        </div>
                    </div>
                         <br>
                @endforeach
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