@extends('layouts.master')

@section('title', 'Taller 28')
@section('contenido')

	<h1 class="text-center  mt-5 text-danger"> Taller #28</h1>
    <h3 class="text-center mt-5 mb-3 text-info">ESCRIBA  EL  SIGNIFICADO  DE  LAS  SIGUIENTES  ABREVIATURAS COMERCIALES,  CON  AGILIDAD</h3>

<form action="">
<div class="container">
	<div class="row">
		<div class="col-6">
			<div class="row">
				<div class="col-6"><img class="img-fluid" src="{{ asset('img/talleres/imagen-4.jpg') }}" alt=""></div>
				<div class="col-6 align-self-center"><input type="text" class="form-control"></div>

				<div class="col-6"><img class="img-fluid" src="{{ asset('img/talleres/imagen-4.jpg') }}" alt=""></div>
				<div class="col-6 align-self-center"><input type="text" class="form-control"></div>

				<div class="col-6"><img class="img-fluid" src="{{ asset('img/talleres/imagen-4.jpg') }}" alt=""></div>
				<div class="col-6 align-self-center"><input type="text" class="form-control"></div>

			</div>
		</div>
		<div class="col-6">
			<div class="row">
				<div class="col-6"><img class="img-fluid" src="{{ asset('img/talleres/imagen-4.jpg') }}" alt=""></div>
				<div class="col-6 align-self-center"><input type="text" class="form-control"></div>

				<div class="col-6"><img class="img-fluid" src="{{ asset('img/talleres/imagen-4.jpg') }}" alt=""></div>
				<div class="col-6 align-self-center"><input type="text" class="form-control"></div>

				<div class="col-6"><img class="img-fluid" src="{{ asset('img/talleres/imagen-4.jpg') }}" alt=""></div>
				<div class="col-6 align-self-center"><input type="text" class="form-control"></div>
			</div>
		</div>
	</div>
</div>	
</form>

@endsection