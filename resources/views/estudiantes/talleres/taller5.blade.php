@extends('layouts.nav')

@section('title', $datos->taller->nombre)
@section('content')

<!--SEÑALE  LA  ALTERNATIVA  CORRECTA -->
	<div class="container">
			 	<h1 class="text-center text-danger display-1">{{ $datos->taller->nombre }}</h1>
        <div class="card border border-danger mb-3" >
          <div class="card-header font-weight-bold" style="font-size: 25px;"> 
            <h1 class="display-3">{{ auth()->user()->name }}{{ auth()->user()->apellido }}</h1></div>
          <div class="card-body">
            <h2 class="font-weight-bold "><span class="badge badge-danger">#</span>{{ $datos->enunciado }}</h2>
            	<table class="table">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Enunciado</th>
				      <th scope="col">Respuesta</th>
				      <th scope="col">Estado De Respuesta</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach ($datos->alternativaRes  as  $key => $data)
				    <tr>
				      <th scope="row"></th>
				      <td>{{ $data->concepto }}</td>
				      <td>{{ $data->respuesta }}</td>
				      <td width="200"> @if ($taller->options[$key]->respuesta == $data->respuesta )Correcta @else Incorrecta @endif</td>
				    </tr>
				  	@endforeach
				  </tbody>
				</table>
          </div>
            <div class="row justify-content-center">
            <div class="col-5">
              <div class="form-group">
                <label for="exampleFormControlInput1">Calificacion</label>
                {{-- <input type="hidden" name="user_id" value="{{ $user->id }}"> --}}
                <input type="text" value="{{ $relacion[0]->calificacion }}"  disabled class="form-control" name="calificacion" placeholder="Añada una nota al estudiante">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Retroalimentacion</label>
                <textarea disabled="" class="form-control" name="retroalimentacion" rows="3" placeholder="Agregue una retroalimentacion">{{ $relacion[0]->retroalimentacion }}</textarea>
              </div>   
            </div>
        </div>
        </div>
	</div>
@endsection