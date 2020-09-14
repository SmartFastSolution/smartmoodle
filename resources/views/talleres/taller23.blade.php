@extends('layouts.master')

@section('title', 'Taller 24')
@section('contenido')


	<h1 class="text-center  mt-5 text-danger"> Taller #24</h1>
    <h3 class="text-center mt-5 mb-3 text-info">LLENE  CON  LOS  SIGUIENTES  DATOS  LOS  RECIBOS  CORRECTAMENTE.</h3>
<form action="">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-2">
				 <img class="img-fluid" src="{{ asset('img/talleres/imagen-23.jpg') }}" alt="">
			</div>
			<div class="col-8 border">
				<h1 class="text-center">RECIBO</h1>
				<div class="row justify-content-between">
					<div class="col-4  form-inline">
						No. <input type="text" size="5" class="form-control" name="">
					</div>
					<div class="col-4 form-inline mb-2">
						Por $  <input type="text" size="5" class="form-control" name="">
					</div>
				</div>
				<div class="row mb-2">			
					<div class="col-4 text-left">
						<label class="col-form-label" for="">Recibi de:</label>
					</div>
					<div class="col-8">
						<input type="text" class="form-control">
					</div>
				</div>

				<div class="row mb-2">			
							<div class="col-4 text-left">
								<label class="col-form-label" for="">La suma de:</label>
							</div>
							<div class="col-8">
								<input type="text" class="form-control">
							</div>
						</div>

						<div class="row mb-2">			
							<div class="col-4 text-left">
								<label class="col-form-label" for="">Por arriendo de</label>
							</div>
							<div class="col-8 form-inline">
<p><input type="text" class="form-control"> que ocupa <input type="text" class="form-control"></p>
								
							</div>
						</div>

						<div class="row mb-2">			
							<div class="col-4 text-left">
								<label class="col-form-label" for="">En la casa de propiedad</label>
							</div>
							<div class="col-8">
								<input type="text" class="form-control">
							</div>
						</div>

						<div class="row mb-2">			
							<div class="col-4 text-left">
								<label class="col-form-label" for="">situado en</label>
							</div>
							<div class="col-8 form-inline">
								<p><input type="text" class="form-control" size="40">  canon cubierto del</p>
							</div>
						</div>
						<div class="row mb-2">			
							
							<div class="col-12 form-inline">
<p><input type="text" class="form-control"  size="30"> Hasta el <input type="text" class="form-control" size="50"></p>
								
							</div>
						</div>

						<div class="row mb-2 justify-content-center">			
							<div class="col-6 text-center">
								<p><input type="text" class="form-control" size="40">  FIRMA</p>
							</div>
						</div>

			</div>
		</div>
	</div>
</form>

@endsection