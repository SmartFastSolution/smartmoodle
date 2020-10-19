@extends('layouts.nav')

@section('title', $datos->taller->nombre)
@section('content')

<h1 class="text-center  mt-5 text-danger">{{ $datos->taller->nombre }}</h1>
<h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>

<form action="">
	<div class="container">
		<div class="row justify-content-center ">
			<div class="col-8">
				{!! $datos->lectura !!}
			</div>	
			<div class="col-8">
				@foreach ($datos->tallerLecturaOp as $enunciados)
				<strong>
					<h4>{{ $enunciados->enunciado }}</h4>
					<textarea class="form-control"></textarea>
				</strong>
				@endforeach
				
			</div>
		</div>
	</div>
</form>

@endsection