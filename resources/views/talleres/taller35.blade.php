@extends('layouts.nav')

@section('title', $datos->nombre)
@section('content')

{{-- >DESARROLLE  FÓRMULAS  DE  LA  ECUACIÓN  CONTABLE,  CON  EXACTITUD. --}}
<h1 class="text-center  mt-5 text-danger font-weight-bold display-4"> {{ $datos->nombre }}</h1>
<h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>

 <form action="{{ route('taller35', ['idtaller' => $d]) }}" method="POST">
           @csrf
	<div class="container">
		<div class="row justify-content-center ">
			<div class="col-8">
				<div class="row">
					<div class="col-5 text-center">
						<table class="table " style="box-shadow: 5px 5px 15px 0px  #087980;">
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
					<div class="col-7 text-center  align-items-center">
						<input style="box-shadow: 5px 5px 15px 0px  #FF1C87;" type="text" name="formula1"   class="form-control">
					</div>
				</div>

				<div class="row">
					<div class="col-5 text-center">
						<table class="table " style="box-shadow: 5px 5px 15px 0px  #087980;">
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
						<input style="box-shadow: 5px 5px 15px 0px  #FF1C87;" type="text" name="formula2"   class="form-control">
					</div>
				</div>

				<div class="row">
					<div class="col-5 text-center">
						<table class="table " style="box-shadow: 5px 5px 15px 0px  #087980;">
						  <thead>
						    <tr>
							    <th colspan="2" scope="col">
							      Activo <br>
							     	?
							  	</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						    	<td>
						    		Pasivo <br>
						    		$31.000
						    	</td>
						    	<td>
						    		Patrimonio <br>
						    		17.000
						    	</td>
						    </tr>
						  </tbody>
						</table>
					</div>
					<div class="col-7 text-center">
						<input style="box-shadow: 5px 5px 15px 0px  #FF1C87;" type="text" name="formula3"   class="form-control">
					</div>
				</div>

				<div class="row">
					<div class="col-5 text-center">
						<table class="table " style="box-shadow: 5px 5px 15px 0px  #087980;">
						  <thead>
						    <tr>
							    <th colspan="2" scope="col">
							      Activo <br>
							     	$76.000
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
						    		$18.600
						    	</td>
						    </tr>
						  </tbody>
						</table>
					</div>
					<div class="col-7 text-center">
						<input style="box-shadow: 5px 5px 15px 0px  #FF1C87;" type="text" name="formula4"   class="form-control">
					</div>
				</div>

				<div class="row">
					<div class="col-5 text-center">
						<table class="table " style="box-shadow: 5px 5px 15px 0px  #087980;">
						  <thead>
						    <tr>
							    <th colspan="2" scope="col">
							      Activo <br>
							     	?
							  	</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						    	<td>
						    		Pasivo <br>
					    			$33.400
						    	</td>
						    	<td>
						    		Patrimonio <br>
						    		$23.500
						    	</td>
						    </tr>
						  </tbody>
						</table>
					</div>
					<div class="col-7 text-center">
						<input style="box-shadow: 5px 5px 15px 0px  #FF1C87;" type="text"  name="formula5"  class="form-control">
					</div>
				</div>

				<div class="row">
					<div class="col-5 text-center">
						<table class="table " style="box-shadow: 5px 5px 15px 0px  #087980;">
						  <thead>
						    <tr>
							    <th colspan="2" scope="col">
							      Activo <br>
							     	$61.900
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
						    		$22.000
						    	</td>
						    </tr>
						  </tbody>
						</table>
					</div>
					<div class="col-7 text-center">
						<input style="box-shadow: 5px 5px 15px 0px  #FF1C87;" type="text" name="formula6"   class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-5 text-center">
						<table class="table " style="box-shadow: 5px 5px 15px 0px  #087980;">
						  <thead>
						    <tr>
							    <th colspan="2" scope="col">
							      Activo <br>
							     	?
							  	</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						    	<td>
						    		Pasivo <br>
					    			$16.800
						    	</td>
						    	<td>
						    		Patrimonio <br>
						    		$9.100
						    	</td>
						    </tr>
						  </tbody>
						</table>
					</div>
					<div class="col-7 text-center align-content-center">
						<input style="box-shadow: 5px 5px 15px 0px  #FF1C87;" type="text" name="formula7"   class="form-control">
					</div>
				</div>


				<div class="row">
					<div class="col-5 text-center">
						<table class="table " style="box-shadow: 5px 5px 15px 0px  #087980;">
						  <thead>
						    <tr>
							    <th colspan="2" scope="col">
							      Activo <br>
							     	$99.000
							  	</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						    	<td>
						    		Pasivo <br>
					    			$45.600
						    	</td>
						    	<td>
						    		Patrimonio <br>
						    		?
						    	</td>
						    </tr>
						  </tbody>
						</table>
					</div>
					<div class="col-7 text-center align-content-center">
						<input style="box-shadow: 5px 5px 15px 0px  #FF1C87;" type="text" name="formula8"   class="form-control">
					</div>
				</div>


				<div class="row">
					<div class="col-5 text-center">
						<table class="table " style="box-shadow: 5px 5px 15px 0px  #087980;">
						  <thead>
						    <tr>
							    <th colspan="2" scope="col">
							      Activo <br>
							     	?
							  	</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						    	<td>
						    		Pasivo <br>
					    			$44.200
						    	</td>
						    	<td>
						    		Patrimonio <br>
						    		$27.750
						    	</td>
						    </tr>
						  </tbody>
						</table>
					</div>
					<div class="col-7 text-center align-content-center">
						<input style="box-shadow: 5px 5px 15px 0px  #FF1C87;" type="text" name="formula9"   class="form-control">
					</div>
				</div>

			</div>

		</div>
		 <div class="row justify-content-center mb-3">
        	<input  type="submit" value="Guardar Datos" class="btn p-2 mt-3 btn-danger">
    	</div>
	</div>
</form>
@endsection