@extends('layouts.nav')

@section('title', 'Taller 34')
@section('contenido')

	<h1 class="text-center  mt-5 text-danger"> Taller #34</h1>
    <h3 class="text-center mt-5 mb-3 text-info">ESCRIBA  LAS  CUENTAS  QUE  IDENTIFICAN  LAS  FIGURAS,  CON  AGILIDAD.</h3>

<form action="">
	<div class="container ">
		<div class="row justify-content-center">
			<div class="col-6">
				<div class="row">
				<div class="col-5 align-self-center">
					<img class="img-fluid" src="{{ asset('img/talleres/imagen-31.jpg') }}" alt="">
				</div>
				<div class="col-7 align-self-center">
				
					<input type="text" class="form-control">
				</div>
			</div>
			</div>
			<div class="col-6">
				<div class="row">
					<div class="col-5 align-self-center">
					<img class="img-fluid" src="{{ asset('img/talleres/imagen-31.jpg') }}" alt="">
				</div>
				<div class="col-7 align-self-center">
					
					<input type="text" class="form-control">
				</div>
				</div>
			</div>
		</div>
	</div>
</form>
 @endsection