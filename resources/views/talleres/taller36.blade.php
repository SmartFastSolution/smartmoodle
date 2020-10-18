@extends('layouts.nav')

@section('title', $datos->taller->nombre)
@section('content')

<h1 class="text-center  mt-5 text-danger"> {{ $datos->taller->nombre }}</h1>
<h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>

<form action="">
	<div class="container">
		<div class="row justify-content-center ">
			@foreach ($datos->tallerAnalizarOp as $enunciados)
				<div class="col-10">
					<h2> <strong>{{ ++$a }} </strong> {{ $enunciados->enunciado }} </h2>
					<textarea name="analisis[]" cols="30" rows="10" class="form-control"></textarea>
				</div>
			@endforeach
		</div>
	</div>
</form>


@endsection