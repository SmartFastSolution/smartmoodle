@extends('layouts.master')

@section('title', 'Taller 27')
@section('contenido')

<h1 class="text-center  mt-5 text-danger"> Taller #27</h1>
  
<h3 class="text-center mt-5 mb-3 text-info">LLENE  CON  LOS  SIGUIENTES  DATOS  LA  ORDEN  DE  PAGO CORRECTAMENTE</h3>

<form action="">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-6">
				 <img class="img-fluid" src="{{ asset('img/talleres/imagen-28.jpg') }}" alt="">
			</div>
			<div class="col-8 border border-danger p-5">
				<div class="row ">
					<div class="col-6 text-center">
						<h1>TECNOLOGY  S.A.</h1>
						<h6>Ing. Diego Arcos Quezada <br>
Contribuyente Régimen Simplificado</h6>

<input type="text" class="form-control">
<h5>Dirección  Matriz :  Malecón y Olmedo</h5>
					</div>
					<div class="col-6">
						<table class="table table-bordered">
						  <tbody>
						 <tr>
						 	<td>R.U.C</td>
						 	<td>0938489125001</td>
						 </tr>
						 <tr>
						 	<td colspan="2" align="center">
						 		NOTA DE VENTA <br>
						 		<h6>No. 002-3470</h6>

						 	</td>
						 	
						 </tr>
						 <tr>
						 	<td>AUT. SRI:</td>
						 	<td>241899176
						 	</td>
						 </tr>
						  </tbody>
						</table>
					</div>
				</div>
				<div class="row mb-2">
					<input type="text" class="form-control">
				</div>
				<div class="row">
					<div class="col-2 text-right"> <label>Sr (es):</label> </div>
					<div class="col-4"> <input type="text" class="form-control" name=""></div>
					<div class="col-2 text-right"> <label>R.U.C/C.I. :</label> </div>
					<div class="col-4"> <input type="text" class="form-control" name=""></div>
				</div>
				<div class="row justify-content-start mt-2">
					<div class="col-2 text-right">
						<label for="">FECHA :</label>
					</div>
					<div class="col-5">
						<input type="text" class="form-control">
					</div>
				</div>
				<div class="row mt-4">
					<table class="table table-bordered">
					  <thead>
					    <tr align="center">
					      <th scope="col">CANT.</th>
					      <th scope="col">DESCRIPCIÓN</th>
					      <th scope="col">P. UNITARIO </th>
					      <th scope="col">VALOR VENTA</th>

					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <th scope="row"><input type="text" class="form-control" name=""></th>
					      <td><input type="text" class="form-control" name=""></td>
					      <td><input type="text" class="form-control" name=""></td>
					      <td><input type="text" class="form-control" disabled name=""></td>
					    </tr>
					  </tbody>
					</table>
				</div>
				<div class="row justify-content-end mb-2">
					<div class="col-3 text-right"><label for="">VALOR TOTAL</label></div>
					<div class="col-3"><input type="text" class="form-control"> </div>
				</div>
				<div class="row mb-2 justify-content-end">
					<input type="text" class="form-control">
					<label for="">VÁLIDO PARA SU EMISIÓN HASTA FEBRERO/2021</label>
				</div>
				<div class="row mb-2 justify-content-start">
					<div class="col-6 text-center">
						<h6>Imprenta  Falcao</h6>
						<h6>RUC:  0957742891001 No. Autorización 0518</h6>
					</div>

				</div>
			</div>
		</div>
	</div>	
</form>
@endsection