@extends('layouts.nav')
@section('title', 'Taller '.$datos->taller->id)
@section('content')
<!--TALLER IDENTIFICAR IMAGENES -->

<h1 class="text-center  mt-5 text-danger"> Taller {{ $datos->taller->id }}</h1>
     <h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>

<form action="{{ route('taller6',['idtaller' => $d]) }}" method="POST">
    @csrf	
    <div class="container">
		<div class="row justify-content-center">
			@foreach ($datos->tallerimg as $element)
				<div class="col-6">
				<div class="row justify-content-center">
					<div class="col-4">
						<img src="{{ asset($element->col_a) }}" width="100" alt="Imagen 1">
					</div>
					<div class="col-4 align-self-center" >
						<input type="checkbox" name="imgs[]" value="{{ $element->col_a }}" class="form-control">
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-4">
						<img src="{{ asset($element->col_b) }}" width="100" alt="Imagen 1">
					</div>
					<div class="col-4 align-self-center" >
						<input type="checkbox" name="imgs[]" value="{{ $element->col_b }}" class="form-control">
					</div>
				</div>
			</div>
			@endforeach
		</div>
		 <div class="row justify-content-center">
        	<input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
     	</div>
	</div>


</form>


@endsection