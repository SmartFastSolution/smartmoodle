@extends('layouts.nav')

@section('title', $datos->nombre)
@section('content')

<h1 class="text-center  mt-5 text-danger"> {{ $datos->nombre }}</h1>
<h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>

<form action="{{ route('taller33', ['idtaller' => $d]) }}" method="POST">
           @csrf
	<div class="container">
		<div class="row justify-content-center ">
			<div class="col-6 text-center">
				<h1>{{ $datos->pregunta1 }}</h1>
				<div class=" p-3 text-center border border-danger rounded-circle">
					<textarea name="respuesta1" class="form-group" id="" cols="30" rows="10"></textarea>
				</div>
			</div>
			<div class="col-6 text-center">
				
				
					<h1>{{ $datos->pregunta2 }}</h1>
					<div class=" p-3 text-center border border-danger rounded-circle">
					<textarea name="respuesta2" class="form-group" id="" cols="30" rows="10"></textarea>
				
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
        	<input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
    	</div>
	</div>
</form>

@endsection