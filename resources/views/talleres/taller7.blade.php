@extends('layouts.master')

@section('title', 'Taller 7')
@section('contenido')

<h1 class="text-center  mt-5 text-danger"> Taller #7</h1>
     <h3 class="text-center mt-5 mb-3 text-info">IDENTIFIQUE  LAS  PERSONAS  QUE  PUEDEN  EJERCER  EL  COMERCIO 
CORRECTAMENTE.</h3>

<form action="">
	<div class="container">
		<div class="row ">
			<div class="col-6">
				<div class="row ">
					<div class="col-4">
						<img src="{{ asset('img/talleres/imagen-4.jpg') }}" alt="Imagen 1">
					</div>
					<div class="col-4 align-self-center" >
						<input type="checkbox" class="form-control">
					</div>
				</div>

				<div class="row ">
					<div class="col-4">
						<img src="{{ asset('img/talleres/imagen-5.jpg') }}" alt="Imagen 1">
					</div>
					<div class="col-4 align-self-center" >
						<input type="checkbox" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="row ">
					<div class="col-4">
						<img src="{{ asset('img/talleres/imagen-6.jpg') }}" alt="Imagen 1">
					</div>
					<div class="col-4 align-self-center" >
						<input type="checkbox" class="form-control">
					</div>
				</div>

				<div class="row ">
					<div class="col-4">
						<img src="{{ asset('img/talleres/imagen-7.jpg') }}" alt="Imagen 1">
					</div>
					<div class="col-4 align-self-center" >
						<input type="checkbox" class="form-control">
					</div>
				</div>
			</div>
		</div>
	</div>


</form>


@endsection