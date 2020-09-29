@extends('layouts.nav')
<!-- ESCRIBIR EN EL GUSANILLO -->

@section('title', $datos->taller->nombre)
@section('content')

<h1 class="text-center  mt-5 text-danger"> {{ $datos->taller->nombre }}</h1>
     <h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}

<form action="{{ route('taller7', ['idtaller' => $d]) }}" method="POST">
    @csrf
	<div class="container">
		<div class="row align-items-center justify-content-center">
			<div class="col-2">
				<img class="text-center" src="{{ asset('img/talleres/imagen-8.jpg') }}" alt="">
			</div>
			<div class="col-3 mt-5 rounded-circle bg-danger p-5">
				<textarea name="respuesta1" class="form-control border-0" id="" cols="5" rows="5"></textarea>
			</div>
			<div class="col-3 mt-3 rounded-circle bg-info p-5">
				<textarea name="respuesta2" class="form-control border-0" id="" cols="5" rows="5"></textarea>
			</div>
			<div class="col-3 rounded-circle bg-success p-5">
				<textarea name="respuesta3" class="form-control border-0" id="" cols="5" rows="5"></textarea>
			</div>
		</div>
		<div class="row justify-content-center">
        		<input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
    		 </div>
	</div>
</form>

@endsection