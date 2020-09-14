@extends('layouts.master')

@section('title', 'Taller 7')
@section('contenido')

<h1 class="text-center  mt-5 text-danger"> Taller #7</h1>
     <h3 class="text-center mt-5 mb-3 text-info">IDENTIFIQUE  LAS  PERSONAS  QUE  PUEDEN  EJERCER  EL  COMERCIO 
CORRECTAMENTE.</h3>

<form action="{{ route('taller7') }}" method="POST">
    @csrf	
    <div class="container">
		<div class="row justify-content-center">
			<div class="col-6">
				<div class="row justify-content-center">
					<div class="col-4">
						<img src="{{ asset('img/talleres/imagen-4.jpg') }}" alt="Imagen 1">
					</div>
					<div class="col-4 align-self-center" >
						<input type="checkbox" name="foto{{++$i}}" value="img/talleres/imagen-4.jpg" n class="form-control">
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-4">
						<img src="{{ asset('img/talleres/imagen-5.jpg') }}" alt="Imagen 1">
					</div>
					<div class="col-4 align-self-center" >
						<input type="checkbox" name="foto{{++$i}}" value="img/talleres/imagen-5.jpg" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="row justify-content-center">
					<div class="col-4">
						<img src="{{ asset('img/talleres/imagen-6.jpg') }}" alt="Imagen 1">
					</div>
					<div class="col-4 align-self-center" >
						<input type="checkbox" name="foto{{++$i}}" value="img/talleres/imagen-6.jpg" class="form-control">
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-4">
						<img src="{{ asset('img/talleres/imagen-7.jpg') }}" alt="Imagen 1">
					</div>
					<div class="col-4 align-self-center" >
						<input type="checkbox" name="foto{{++$i}}" value="img/talleres/imagen-7.jpg" class="form-control">
					</div>
				</div>
			</div>
		</div>
		 <div class="row justify-content-center">
        <input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
     </div>
	</div>


</form>


@endsection