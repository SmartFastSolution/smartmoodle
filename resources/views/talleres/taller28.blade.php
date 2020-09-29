@extends('layouts.nav')

@section('title', 'Taller 29')
@section('contenido')

	<h1 class="text-center  mt-5 text-danger"> Taller #29</h1>
    <h3 class="text-center mt-5 mb-3 text-info">RELACIONE LOS ENUNCIADOS ESCRIBIENDO EN EL CUADRO EL LITERAL CORRESPONDIENTE</h3>
<form action="">
	<div class="container">
		<div class="row">
			<div class="col-8">
				<div class="row">
					<div class="col-2">
						<span class="badge badge-danger p-2">
							A.
						</span>
					</div>
					<div class="col-10">
						<h3 draggable="true" ondragstart="event.dataTransfer.setData('text/plain', $dato= 2)" >Limitada.</h3>

					</div>

					<div class="col-2">
						<span class="badge badge-danger p-2">
							B.
						</span>
					</div>
					<div class="col-10">
						<h3>Limitada.</h3>
					</div>

					<div class="col-2">
						<span class="badge badge-danger p-2">
							C.
						</span>
					</div>
					<div class="col-10">
						<h3>Limitada.</h3>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="row mb-2">
				<div class="col-3 align-self-center">
						<label class="">N/C.
						</label>
					</div>
					<div class="col-7">
						<input type="text" class="form-control">
					</div>
					</div>

					<div class="row mb-2">
				<div class="col-3 align-self-center">
						<label class="">Cta. Cte.
						</label>
					</div>
					<div class="col-7">
						<input type="text" class="form-control">
					</div>
					</div>

					<div class="row mb-2">
				<div class="col-3 align-self-center">
						<label class="">Ltda.
						</label>
					</div>
					<div class="col-7">
						<input type="text" class="form-control">
					</div>
					</div>
			</div>
		</div>
	</div>
</form>

 @endsection