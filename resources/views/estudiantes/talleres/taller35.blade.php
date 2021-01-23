@extends('layouts.nav')

@section('title', $datos->nombre)
@section('content')

{{-- >DESARROLLE  FÓRMULAS  DE  LA  ECUACIÓN  CONTABLE,  CON  EXACTITUD. --}}

	<div class="container">
	<h1 class="text-center text-danger display-1">{{ $datos->taller->nombre }}</h1>
        <div class="card border border-danger mb-3" >
          <div class="card-header font-weight-bold" style="font-size: 25px;"> 
            <h1 class="display-3">{{ auth()->user()->name }} {{ auth()->user()->apellido }}</h1></div>
          <div class="card-body">
            <h2 class="font-weight-bold "><span class="badge badge-danger">#</span>{{ $datos->enunciado }}</h2>
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
					<div class="col-7 text-center  align-self-auto">
						<span class="badge badge-danger "> <h5>{{ $datos->formula1 }}</h5></span>
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
						<span class="badge badge-danger"> <h5>{{ $datos->formula2 }}</h5></span>
					</div>
				</div>

				<div class="row">
					<div class="col-5 text-center">
						<table class="table table-bordered">
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
						<span class="badge badge-danger"><h5>{{ $datos->formula3 }} </h5></span>
					</div>
				</div>

				<div class="row">
					<div class="col-5 text-center">
						<table class="table table-bordered">
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
						<span class="badge badge-danger"> <h5>{{ $datos->formula4 }}</h5></span>
					</div>
				</div>

				<div class="row">
					<div class="col-5 text-center">
						<table class="table table-bordered">
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
						<span class="badge badge-danger"><h5>{{ $datos->formula5 }}</h5></span>
					</div>
				</div>

				<div class="row">
					<div class="col-5 text-center">
						<table class="table table-bordered">
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
						<span class="badge badge-danger"> <h5>{{ $datos->formula6 }}</h5> </span>
					</div>
				</div>
				<div class="row">
					<div class="col-5 text-center">
						<table class="table table-bordered">
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
						<span class="badge badge-danger"> <h5>{{ $datos->formula7 }}</h5> </span>
					</div>
				</div>


				<div class="row">
					<div class="col-5 text-center">
						<table class="table table-bordered">
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
						<span class="badge badge-danger"> <h5>{{ $datos->formula8 }}</h5></span>
					</div>
				</div>


				<div class="row">
					<div class="col-5 text-center">
						<table class="table table-bordered">
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
						<span class="badge badge-danger"> <h5>{{ $datos->formula9 }}</h5> </span>
					</div>
				</div>

			</div>

		</div>

          </div>
            <div class="row justify-content-center">
            <div class="col-5">
              <div class="form-group">
                <label for="exampleFormControlInput1">Calificacion</label>
                {{-- <input type="hidden" name="user_id" value="{{ $user->id }}"> --}}
                <input type="text"disabled value="{{ $relacion[0]->calificacion }}" class="form-control" name="calificacion" placeholder="Añada una nota al estudiante">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Retroalimentacion</label>
                <textarea disabled class="form-control" name="retroalimentacion" rows="3" placeholder="Agregue una retroalimentacion">{{ $relacion[0]->retroalimentacion }}</textarea>
              </div>   
            </div>
        </div>
        </div>
	</div>

@endsection