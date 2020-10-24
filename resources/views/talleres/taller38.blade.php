@extends('layouts.nav')

@section('title', $datos->taller->nombre)
@section('content')

<h1 class="text-center  mt-5 text-danger">{{ $datos->taller->nombre }}</h1>
<h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>

<form action="{{ route('taller38', ['idtaller' => $d]) }}" method="POST">
           @csrf
	<div class="container">
		<div class="row justify-content-center ">
			<div class="col-8">
				{!! $datos->lectura !!}
			</div>	
			<div class="col-8">
				@foreach ($datos->tallerLecturaOp as $enunciados)
				<strong>
					<h4>{{ $enunciados->enunciado }}</h4>
					<textarea class="form-control" name="respuestas[]"></textarea>
				</strong>
				@endforeach
			</div>
		</div>
		<div class="row justify-content-center">
        	<input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
    	</div>
	</div>
</form>

@endsection