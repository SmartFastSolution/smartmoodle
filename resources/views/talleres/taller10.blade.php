@extends('layouts.nav')

@section('title', $datos->taller->nombre)
@section('content')

<h1 class="text-center  mt-5 text-danger"> {{ $datos->taller->nombre }}</h1>
     <h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>

<form action="">
	<div class="container">
		@foreach ($datos->relacionarOptions as $opciones)
		<div class="row justify-content-center align-items-center mb-5">
			<div class="col-5 text-justify">
				
     				<label class="form-control-label"><span draggable="true" ondragstart="event.dataTransfer.setData('text/plain',{{ $opciones->orden }});" class="badge-danger badge-pill"> {{ $opciones->orden }} </span> {{ $opciones->definicion }}</label>
			</div>
			<div class="col-5">
				<div class="row align-items-center">
					<div class="col-6 text-center">
						<img src="{{ asset('img/talleres/imagen-11.jpg') }}">
					</div>
					<div class="col-6 text-center ">
						<label for="">{{ $opciones->enunciado }}</label><br>
						<input type="text" size="2" class="border-0 bg-info">
					</div>
				</div>
			</div>
		</div>
		@endforeach

		<div class="row justify-content-center align-items-center">
			<div class="col-5 text-justify">
				
     				<label class="form-control-label"><span class="badge-danger badge-pill">B.</span> El  hombre  en  su  primera etapa  aparece  recolectando frutos  y  alimentándose  de  la caza  y  de  la  pesca</label>
			</div>
			<div class="col-5">
				<div class="row align-items-center">
					<div class="col-6 text-center">
						<img src="{{ asset('img/talleres/imagen-12.jpg') }}">
					</div>
					<div class="col-6 text-center">
						<label for="">Organizacion Social</label><br>
						<input type="text" size="2" class="border-0 bg-info">
					</div>
				</div>
			</div>
		</div>
	</div>


</form>
@endsection