@extends('layouts.master')

@section('title', 'Taller 11')
@section('contenido')

<h1 class="text-center  mt-5 text-danger"> Taller #11</h1>
     <h3 class="text-center mt-5 mb-3 text-info">RELACIONE LOS ENUNCIADOS ESCRIBIENDO EN EL CUADRO EL LITERAL
CORRESPONDIENTE</h3>

<form action="">
	<div class="container">
		<div class="row justify-content-center align-items-center mb-5">
			<div class="col-5 text-justify">
				
     				<label class="form-control-label"><span class="badge-danger badge-pill">A.</span> El hombre fue perfeccionando los instrumentos de trabajo que sirvieron para producir mercaderías</label>
			</div>
			<div class="col-5">
				<div class="row align-items-center">
					<div class="col-6 text-center">
						<img src="{{ asset('img/talleres/imagen-11.jpg') }}">
					</div>
					<div class="col-6 text-center ">
						<label for="">Trueque</label><br>
						<input type="text" size="2" class="border-0 bg-info">
					</div>
				</div>
			</div>
		</div>

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