@extends('layouts.nav')

@section('title', $datos->taller->nombre)
@section('content')

<h1 class="text-center  mt-5 text-danger"> {{ $datos->taller->nombre }}</h1>
     <h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>

<form action="{{ route('taller10', ['idtaller' => $d]) }}" method="POST">
    @csrf
	<div class="container">
		@foreach ($datos->relacionarOptions as $key => $opciones)
		<div class="row justify-content-center align-items-center mb-5">
			<div class="col-5 text-justify">
				
     				<label class="form-control-label"><span draggable="true" ondragstart="event.dataTransfer.setData('text/plain',{{ $opciones->orden }});" class="badge-danger badge-pill"> {{ $opciones->orden }} </span> {{ $opciones->definicion_aleatoria }}</label>
			</div>
			<div class="col-5">
				<div class="row align-items-center">
					<div class="col-6 text-center">
						<img width="100" src="{{ asset($opciones->img) }}">
					</div>
					<div class="col-6 text-center ">
						<label for="">{{ $opciones->enunciado }}</label><br>
						<input type="text" required size="2" name="order[]" class="border-0 bg-info">
					</div>
				</div>
			</div>
		</div>
		@endforeach
		 <div class="row justify-content-center">
                  <input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
               </div>

	</div>


</form>
@endsection
