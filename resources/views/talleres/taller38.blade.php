@extends('layouts.nav')

@section('title', 'Taller 38')
@section('contenido')

<h1 class="text-center  mt-5 text-danger"> Taller #38</h1>
<h3 class="text-center mt-5 mb-3 text-info">DESARROLLE  FÓRMULAS  DE  LA  ECUACIÓN  CONTABLE,  CON  EXACTITUD.</h3>

<form action="">
	<div class="container">
		<div class="row justify-content-center ">
			<div class="col-8">
				<div class="row">
					<div class="col-5 text-center">
						<table class="table table-bordered">
						  <thead>
						    <tr>
							    <th colspan="2" scope="col">
							      Activo <br>
							      65000
							  	</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						    	<td>
						    		Pasivo <br>
						    		29000

						    	</td>
						    	<td>
						    		Patrimonio <br>
						    		?
						    	</td>
						    </tr>
						  </tbody>
						</table>
					</div>
					<div class="col-7 text-center">
						<h3>PN = A - P</h3>
						<input type="text" class="form-control">
					</div>
				</div>

				<div class="row">
					<div class="col-5 text-center">
						<table class="table table-bordered">
						  <thead>
						    <tr>
							    <th colspan="2" scope="col">
							      Activo <br>
							      54.000
							  	</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						    	<td>
						    		Pasivo <br>
						    		?

						    	</td>
						    	<td>
						    		Patrimonio <br>
						    		15.000
						    	</td>
						    </tr>
						  </tbody>
						</table>
					</div>
					<div class="col-7 text-center">
						<h3>PN = A - P</h3>
						<input type="text" class="form-control">
					</div>
				</div>
			</div>

		</div>
	</div>
</form>
@endsection