@extends('layouts.nav')


@section('title', 'Taller 12')
@section('content')

<h1 class="text-center  mt-5 text-danger"> Taller #12</h1>
     <h3 class="text-center mt-5 mb-3 text-info">RELACIONE  LOS  ENUNCIADOS  ESCRIBIENDO  EN  EL  CÍRCULO  EL  LITERAL 
QUE  CORRESPONDA</h3>

<form action="">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-3">
				<div class="mb-5">
					<label class="form-control-label"><span class="badge-danger badge-pill">A.</span> ACTUALIZACIÓN DEL  RUC</label><br>
					<img src="{{ asset('img/talleres/imagen-11.jpg') }}"><br><br>
				</div>

				<div>
					<label class="form-control-label"><span class="badge-danger badge-pill">A.</span> ACTUALIZACIÓN DEL  RUC</label><br>
					<img src="{{ asset('img/talleres/imagen-11.jpg') }}"><br><br>
				</div>
					
			</div>
			<div class="col-6">
				<div class="row">
					<div class="col-10">
						<li class="list-inline mb-4">Declaración Judicial por incapacidad del Contribuyente.</li>
					</div>
					<div class="col-2">
						<input type="text" class="text-center" size="2">
					</div>
				</div>
				<div class="row">
					<div class="col-10">
						<li class="list-inline mb-4">Cierre  de  establecimientos.</li>
					</div>
					<div class="col-2">
						<input type="text" class="text-center" size="2">
					</div>
				</div>
			</div>
		</div>

	</div>

</form>

@endsection