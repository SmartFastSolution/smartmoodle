@extends('layouts.nav')

@section('title', 'Taller 38')
@section('contenido')

<h1 class="text-center  mt-5 text-danger"> Taller #38</h1>
<h3 class="text-center mt-5 mb-3 text-info">UEGO  DE  REALIZAR  LOS  EJERCICIOS,  DETERMINE  EL  TIPO  DE  SALDO 
CON  EXACTITUD.</h3>

<form action="">
	<div class="container">
		<div class="row justify-content-center ">
			
				<div class="col-12">
					<div class="row">
						<div class="col-8">
							<table class="table">
							  <thead>
							    <tr>
							     
							      <th colspan="10" scope="col">DEBE</th>
							      <th colspan="10" class="text-right"  scope="col">HABER</th>
							    
							    </tr>
							  </thead>
							  <tbody>
							 <tr>
							 	<td class="border-left-0 border-bottom-0 border-top-0 border" colspan="10">
							 		<div class="row">
							 			<div class="col-6">
							 				<h6>Compra  de Bienes</h6>
							 				<h6>Caja</h6>
							 				<h4>TOTAL</h4>
							 			</div>
							 			<div class="col-6 ">
							 				<h6 class="mb-4">$ 2.100</h6>
							 				<h6 class="border-left-0 border-right-0 border-top-0 border border-danger">$ 900</h6>
							 			</div>
							 		</div>
							 	</td>
							 	<td colspan="10">
							 		<div class="row">
							 			<div class="col-6">
							 				<h6>Compra  de Bienes</h6>
							 				<h6>Banco</h6>
							 				<h4>TOTAL</h4>
							 			</div>
							 			<div class="col-6">
							 				<h6 class="mb-4">$ 2.100</h6>
							 				<h6 class="border-left-0 border-right-0 border-top-0 border border-danger">$ 900</h6>
							 			</div>
							 		</div>
							 	</td>
							 </tr>
							  </tbody>
							</table>

						</div>
						<div class="col-4 text-center align-self-center">
							<div class="border bg-light p-2">
								<h5>SALDO :</h5>
								<input type="text" class="form-control">
							</div>

						</div>
					</div>
				</div>
			
		</div>
	</div>
</form>

@endsection