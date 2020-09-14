@extends('layouts.master')

@section('title', 'Taller 26')
@section('contenido')

	<h1 class="text-center  mt-5 text-danger"> Taller #26</h1>
    <h3 class="text-center mt-5 mb-3 text-info">LLENE  CON  LOS  SIGUIENTES  DATOS  LA  ORDEN  DE  PAGO CORRECTAMENTE</h3>

	<form action="">
		<div class="container">
		<div class="row justify-content-center">
			<div class="col-6">
				 <img class="img-fluid" src="{{ asset('img/talleres/imagen-24.jpg') }}" alt="">
			</div>
			<div class="col-8 border border-danger">
				<div class="row p-3 justify-content-between">
					<div class="col-5">
					 	<img class="img-fluid" src="{{ asset('img/talleres/imagen-27.jpg') }}" alt="">
					 	<div class="row">
					 		<div class="col-12 rounded border-success border text-left">
					 			<h5>Venta de materiales de construccion</h5>
					 			<h6>Dirección Matriz :  Av. 17 de Septiembre</h6>
					 			<h6>Dirección  Sucursal :  Juan  Montalvo  y  24  de  Mayo</h6>
					 			<h6>Contribuyente Especial N°        25489</h6>
					 			<h6>OBLIGADO  A  LLEVAR  CONTABILIDAD   SI</h6>
					 		</div>
					 	</div>
					</div>

					<div class="col-6 rounded border-success border text-left p-2">

						<h6>R.U.C.  0925487699001</h6>
						<h5>FACTURA</h5>
						<h6>No. 001-001-000000002</h6>
						<h6>NÚMERO DE AUTORIZACIÓN: <br> 2101201710240109254876990011045896723</h6>
						<h6>FECHA Y HORA DE AUTORIZACIÓN <br>
						21/01/2017    10:24:01  a.m.</h6>
						<h6>AMBIENTE :  PRODUCCIÓN</h6>
						<h6>EMISIÓN :  NORMAL</h6>
						<h6>CLAVE DE ACCESO :</h6>
					</div>
				</div>
				<div class="row p-3 m-0 mb-2 border border-info">
					<div class="col-7">
						<div class="row">
							<div class="col-5"><h6>RAZÓN SOCIAL/NOMBRES Y APELLIDOS</h6></div>
							<div class="col-7"><input type="text " class="form-control"></div>
						</div>
						<div class="row">
							<div class="col-5"><label class="col-form-label" for="">FECHA EMISIÓN :</label></div>
							<div class="col-7"><input type="text " class="form-control"></div>
						</div>
					</div>
					<div class="col-5">
						<div class="row mb-3">
							<div class="col-5"><h6>R.U.C/C.I. :</h6></div>
							<div class="col-7"><input type="text " class="form-control"></div>
						</div>
						<div class="row">
							<div class="col-5"><label class="col-form-label" for="">GUÍA DE REMISIÓN :</label></div>
							<div class="col-7"><input type="text " class="form-control"></div>
						</div>
					</div>
				</div>

				<div class="row p-3  mb-2">
					<table class="table table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">CÓDIGO</th>
					      <th scope="col">CÓD. AUXILIAR</th>
					      <th scope="col">CANT.</th>
					      <th scope="col">P. UNITARIO</th>
					      <th>DESCUENTO</th>
					      <th>VALOR VENTA</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<tr>
					  		<td><input type="text" class="form-control"></td>
					  		<td><input type="text" class="form-control"></td>
					  		<td><input type="text" class="form-control"></td>
					  		<td><input type="text" class="form-control"></td>
					  		<td><input type="text" class="form-control"></td>
					  		<td><input type="text" class="form-control"></td>
					  	</tr>
					  	<tr>
					  		<td><input type="text" class="form-control"></td>
					  		<td><input type="text" class="form-control"></td>
					  		<td><input type="text" class="form-control"></td>
					  		<td><input type="text" class="form-control"></td>
					  		<td><input type="text" class="form-control"></td>
					  		<td><input type="text" class="form-control"></td>
					  	</tr>
					  	<tr>
					  		<td><input type="text" class="form-control"></td>
					  		<td><input type="text" class="form-control"></td>
					  		<td><input type="text" class="form-control"></td>
					  		<td><input type="text" class="form-control"></td>
					  		<td><input type="text" class="form-control"></td>
					  		<td><input type="text" class="form-control"></td>
					  	</tr>
					  	<tr>
					  		<td><input type="text" class="form-control"></td>
					  		<td><input type="text" class="form-control"></td>
					  		<td><input type="text" class="form-control"></td>
					  		<td><input type="text" class="form-control"></td>
					  		<td><input type="text" class="form-control"></td>
					  		<td><input type="text" class="form-control"></td>
					  	</tr>
					  
					  </tbody>
					</table>
				</div>	
			</div>
		</div>
	</form>
@endsection