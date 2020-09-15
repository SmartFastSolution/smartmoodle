@extends('layouts.master')

@section('title', 'Taller 22')
@section('contenido')


<h1 class="text-center  mt-5 text-danger"> Taller #22</h1>
     <h3 class="text-center mt-5 mb-3 text-info">LLENE  CON  LOS  SIGUIENTES  DATOS  LOS  VALES,  CORRECTAMENTE.</h3>
<form action="">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-2">
				 <img class="img-fluid" src="{{ asset('img/talleres/imagen-20.jpg') }}" alt="">
			</div>
			<div class="col-9 border border-warning">
				<div class="row justify-content-end">
					<div class="col-12 text-center mt-2">
						<h2>VALE DE CAJA</h2>
					</div>
					<div class="col-4 form-inline">
						<label for="">Por $ </label> <input type="text" class="form-control" size="25">
					</div>
				</div>
				<div class="row justify-content-center mt-1">
					<div class="col-12">
						<div class="row justify-content-start">
							<div class="col-3"><label for="">A favor de </label> </div>
							<div class="col-9"><input type="text" class="form-control"></div>
						</div>
						
					</div>
				</div>
				<div class="row justify-content-center mt-1">
					<div class="col-12">
						<div class="row justify-content-start">
							<div class="col-3"><label for="">Por la cantidad de </label> </div>
							<div class="col-9"><input type="text" class="form-control"></div>
						</div>
						
					</div>
				</div>
				<div class="row justify-content-center mt-1">
					<div class="col-12">
						<div class="row justify-content-start">
							<div class="col-3"><label for="">A concepto de </label> </div>
							<div class="col-9"><input type="text" class="form-control"></div>
						</div>
						
					</div>
				</div>
				<div class="row justify-content-end mt-2">
					<div class="col-6 text-center">
						<input type="date" class="form-control" >
						<label for="">Fecha</label>
					</div>
				</div>
				<div class="row justify-content-lg-between">
					<div class="col-4 text-center">
						<input type="text" class="form-control" >
						<label >Vto. Bno.</label>
					</div>
					<div class="col-4 text-center">
						<input type="text" class="form-control" >
						<label >Recibi conforme</label>
					</div>

				</div>
			</div>
		</div>
	</div>
</form>

@endsection