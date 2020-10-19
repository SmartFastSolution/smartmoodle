@extends('layouts.nav')

@section('title', $datos->taller->nombre)
@section('content')

<h1 class="text-center  mt-5 text-danger"> {{ $datos->taller->nombre }}</h1>
<h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>
	<form action="">
		<div class="container">
			<div class="row justify-content-center ">
				@if ($datos->cuenta == 'activo')
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

				@elseif ($datos->cuenta == 'pasivo')
					<div class="col-10">
					<div class="row mb-3">
						<div class="col-4 align-self-center"><textarea class="form-control area1"></textarea></div>
						<div class="col-4 border border-success rounded-circle p-3">
							<p class="text-center">Pasivo <br> Corriente</p>
						</div>
						<div class="col-4 align-self-center"><textarea class="form-control area1"></textarea></div>
					</div>

					<div class="row mb-3">
						<div class="col-4 align-self-center"><textarea class="form-control area"></textarea></div>
						<div class="col-4 border border-info rounded-circle p-3">
							<p class="text-center">Pasivo <br>no <br> Corriente</p>
						</div>
						<div class="col-4 align-self-center"><textarea class="form-control area"></textarea></div>
					</div>

					<div class="row justify-content-center">
						<div class="col-4 align-self-center"><textarea class="form-control area"></textarea></div>
					</div>
				</div>
				@elseif ($datos->cuenta == 'patrimonio')
					<div class="col-10">
					<div class="row mb-3">
						<div class="col-4 align-self-center"><textarea class="form-control area1"></textarea></div>
						<div class="col-4 border border-success rounded-circle p-3">
							<p class="text-center">Patromonio</p>
						</div>
						<div class="col-4 align-self-center"><textarea class="form-control area1"></textarea></div>
					</div>
					<div class="row justify-content-center">
						<div class="col-4 align-self-center"><textarea class="form-control area"></textarea></div>
					</div>
				</div>
				@endif
				
			</div>
		</div>
	</form>
@endsection