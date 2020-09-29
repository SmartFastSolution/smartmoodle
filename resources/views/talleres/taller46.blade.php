@extends('layouts.nav')

@section('title', 'Taller 47')
@section('contenido')

<h1 class="text-center  mt-5 text-danger"> Taller #47</h1>
<h3 class="text-center mt-5 mb-3 text-info">ESCRIBA  CUENTAS  DE  ACTIVO,  CON  AGILIDAD.</h3>
	<form action="">
		<div class="container">
			<div class="row justify-content-center ">
				<div class="col-10">
					<div class="row mb-3">
						<div class="col-4 align-self-center"><textarea class="form-control area1"></textarea></div>
						<div class="col-4 border border-success rounded-circle p-3">
							<p class="text-center">Activo <br> Corriente</p>
						</div>
						<div class="col-4 align-self-center"><textarea class="form-control area1"></textarea></div>
					</div>

					<div class="row mb-3">
						<div class="col-4 align-self-center"><textarea class="form-control area"></textarea></div>
						<div class="col-4 border border-info rounded-circle p-3">
							<p class="text-center">Activo <br>no <br> Corriente</p>
						</div>
						<div class="col-4 align-self-center"><textarea class="form-control area"></textarea></div>
					</div>

					<div class="row justify-content-center">
						<div class="col-4 align-self-center"><textarea class="form-control area"></textarea></div>
					</div>
				</div>
			</div>
		</div>
	</form>
@endsection