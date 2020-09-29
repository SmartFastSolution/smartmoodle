@extends('layouts.nav')

@section('title', 'Taller 33')
@section('contenido')

	<h1 class="text-center  mt-5 text-danger"> Taller #33</h1>
    <h3 class="text-center mt-5 mb-3 text-info">ESCRIBA  EN  LOS  CÍRCULOS  LOS  PERIODOS  CONTABLES, CON  EFICACIA.</h3>
<form action="">
	<div class="container ">
		<div class="row justify-content-center">
			<div class="col-4">
				<input type="text" class="form-control">
			</div>
		</div>
		<div class="row justify-content-between mt-3">
			<div class="col-4 align-self-center">
				<input type="text" class="form-control">
			</div>
			<div class="col-2">
				<img class="img-fluid" src="{{ asset('img/talleres/imagen-30.jpg') }}" alt="">
			</div>
			<div class="col-4 align-self-center">
				<input type="text" class="form-control ">
			</div>
		</div>
		<div class="row justify-content-around mt-3">
			<div class="col-4">
				<input type="text" class="form-control">
			</div>
			<div class="col-4">
				<input type="text" class="form-control">
			</div>
		</div>
	</div>
</form>

@endsection