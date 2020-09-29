@extends('layouts.nav')

@section('title', 'Taller 37')
@section('contenido')

<h1 class="text-center  mt-5 text-danger"> Taller #37</h1>
<h3 class="text-center mt-5 mb-3 text-info">ESCRIBA  LAS  PREGUNTAS  QUE  UTILIZARÁ  PARA  EL  RECONOCIMIENTO  DE 
CUENTAS,  CON  EFICACIA</h3>

<form action="">
	<div class="container">
		<div class="row justify-content-center ">
			<div class="col-6 text-center">
				<h1>Para el Deudor</h1>
				<div class=" p-3 text-center border border-danger rounded-circle">
					<textarea name="" class="form-group" id="" cols="30" rows="10"></textarea>
				</div>
			</div>
			<div class="col-6 text-center">
				
				
					<h1>Para el Acreedor</h1>
					<div class=" p-3 text-center border border-danger rounded-circle">
					<textarea name="" class="form-group" id="" cols="30" rows="10"></textarea>
				
				</div>
			</div>
		</div>
	</div>
</form>

@endsection