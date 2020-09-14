@extends('layouts.master')

@section('title', 'Taller 23')
@section('contenido')


	<h1 class="text-center  mt-5 text-danger"> Taller #23</h1>
    <h3 class="text-center mt-5 mb-3 text-info">LENE  CON  LOS  SIGUIENTES  DATOS  LA  NOTA  DE  PEDIDO, 
ADECUADAMENTE.</h3>


<form action="">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-2">
				 <img class="img-fluid" src="{{ asset('img/talleres/imagen-21.jpg') }}" alt="">
			</div>

			<div class="col-9 border border-warning">
				<div class="row">
					<div class="col-6 text-center p-3">
						<h1>COMERCIAL "PLAZA"</h1>
						<img class="img-fluid" src="{{ asset('img/talleres/imagen-22.jpg') }}" alt="">
						<h5 class="text-left">RUC. 0923568947001</h5><h5 class="text-left">Av. Quito y letamendi</h5>
						<h5 class="text-left">Tlfs: 2580465 - 2413864</h5>
					</div>
					<div class="col-6 text-center p-3">
						<h1>NOTA DE PEDIDA</h1>
						<h4>No. <input type="text" class="" size="5"></h4>
						<div class="row mb-2">			
							<div class="col-4 text-left">
								<label class="col-form-label" for="">Fecha:</label>
							</div>
							<div class="col-8">
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="row mb-2">			
							<div class="col-4 text-left">
								<label class="col-form-label" for="">Dependencia</label>
							</div>
							<div class="col-8">
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="row mb-2">			
							<div class="col-4 text-left">
								<label class="col-form-label" for="">Destino</label>
							</div>
							<div class="col-8">
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="row mb-2">			
							<div class="col-4 text-left">
								<label class="col-form-label" for="">Plazo de entrega</label>
							</div>
							<div class="col-8">
								<input type="text" class="form-control">
							</div>
						</div>
					</div>
				</div>

				<div class="row p-3">
					<table class="table table-bordered">
					  <thead>
					    <tr class="text-center">
					      <th scope="col">CANTIDAD</th>
					      <th scope="col">CODIGO</th>
					      <th scope="col">DESCRIPCION</th>
					      <th scope="col">PRECIO UNIT.</th>
					      <th scope="col">TOTAL</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <th><input type="text" class="form-control" name=""></th>
					      <td><input type="text" class="form-control" name=""></td>
					      <td><input type="text" class="form-control" name=""></td>
					      <td><input type="text" class="form-control" name=""></td>
					      <td><input type="text" class="form-control" name=""></td>
					    </tr>
					    <tr>
					      <th ><input type="text" class="form-control" name=""></th>
					      <td><input type="text" class="form-control" name=""></td>
					      <td><input type="text" class="form-control" name=""></td>
					      <td><input type="text" class="form-control" name=""></td>
					      <td><input type="text" class="form-control" name=""></td>
					    </tr>
					    <tr>
					      <th><input type="text" class="form-control" name=""></th>
					      <td><input type="text" class="form-control" name=""></td>
					      <td><input type="text" class="form-control" name=""></td>
					      <td><input type="text" class="form-control" name=""></td>
					      <td><input type="text" class="form-control" name=""></td>
					    </tr>
					  </tbody>
					</table>

				</div>
				<div class="row mb-3">
					<div class="col-4 align-self-center">
						<h4 class="">OBSERVACIONES</h4>
					</div>
					<div class="col-8">
						<input type="text" class="form-control">
					</div>
				</div>
				<div class="row justify-content-around">
					<div class="col-4 text-center">
						<input type="text" name="" class="form-control">
						<label >Ing. Fabrica</label>
					</div>
					<div class="col-4 text-center">
						<input type="text" name="" class="form-control">
						<label >Recibido</label>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection