@extends('layouts.nav')

@section('title', $datos->taller->nombre)
@section('content')


<form action="{{ route('taller1.docente', ['idtaller' => $d]) }}" method="POST">
    @csrf
	<div class="container">
			 	<h1 class="text-center text-danger display-1">{{ $datos->taller->nombre }}</h1>
        <div class="card border border-danger mb-3" >
          <div class="card-header font-weight-bold" style="font-size: 25px;"> <h1 class="display-3">{{ $user->name }} {{ $user->apellido }}</h1></div>
          <div class="card-body">
            <h2 class="font-weight-bold "><span class="badge badge-danger">#</span>{{ $datos->enunciado }}</h2>
           	<table class="table">
                <thead class="thead-dark">
                    <tr>
                      <th scope="col">Enunciado</th>
                      <th scope="col">Imagen</th>
                      <th scope="col">Respuesta</th>
                      <th scope="col">Estado De Respuesta</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos->relacionarres  as  $key => $data)
                    <tr>
                      <th scope="row">{{ $data->enunciado }}</th>
                      <td><img width="100" src="{{ $data->img }}" alt=""></td>
                      <td>{{ $data->definicion }}</td>
                      <td width="200"> @if ($data->definicion == $data->definicion_aleatoria )Correcta @else Incorrecta @endif</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
          </div>
            <div class="row justify-content-center">
	            <div class="col-5">
	              <div class="form-group">
	                <label for="exampleFormControlInput1">Calificacion</label>
	                <input type="hidden" name="user_id" value="{{ $user->id }}">
	                <input type="text" value="{{ $update_imei->pivot->calificacion }}" class="form-control" name="calificacion" placeholder="Añada una nota al estudiante">
	              </div>
	              <div class="form-group">
	                <label for="exampleFormControlTextarea1">Retroalimentacion</label>
	                <textarea class="form-control" name="retroalimentacion" rows="3" placeholder="Agregue una retroalimentacion">{{ $update_imei->pivot->retroalimentacion }}</textarea>
	              </div>   
	               <div class="row justify-content-center mb-5">
	                <input type="submit" value="Calificar" class="btn p-2 mt-3 btn-danger">
	             </div>
	            </div>
        	</div>
        </div>

		{{-- @foreach ($datos->relacionarOptions as $key => $opciones)
		<div class="row justify-content-center align-items-center mb-5">
			<div class="col-5 text-justify">
				
     				<label class="form-control-label"><span draggable="true" ondragstart="event.dataTransfer.setData('text/plain',{{ $opciones->orden }});" class="badge-danger badge-pill"> {{ $opciones->orden }} </span> {{ $opciones->definicion_aleatoria }}</label>
			</div>
			<div class="col-5">
				<div class="row align-items-center">
					<div class="col-6 text-center">
						<img  width="100" src="{{ asset($opciones->img) }}">
					</div>
					<div class="col-6 text-center ">
						<label for="">{{ $opciones->enunciado }}</label><br>
						<input type="text" size="2" name="order[]" class="border-0 bg-info">
					</div>
				</div>
			</div>
		</div>
		@endforeach --}}
	</div>


</form>
@endsection