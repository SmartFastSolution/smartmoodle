@extends('layouts.nav')

@section('title', $datos->taller->nombre)
@section('content')

<h1 class="text-center  mt-5 text-danger"> {{ $datos->taller->nombre }}</h1>
<h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>

<form action="{{ route('taller36', ['idtaller' => $d]) }}" method="POST">
           @csrf
	<div class="container">
		<div class="row justify-content-center ">
			@foreach ($datos->tallerAnalizarOp as $enunciados)
				<div class="col-10">
					<h2> <strong>{{ ++$a }} </strong> {{ $enunciados->enunciado }} </h2>
					<textarea name="analisis[]" cols="30" rows="10" class="form-control"></textarea>
				</div>
			@endforeach
		</div>
		 <div class="row justify-content-center">
        	<input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
    	</div>
	</div>
</form>


@endsection