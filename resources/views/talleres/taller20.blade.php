@extends('layouts.master')

@section('title', 'Taller 21')
@section('contenido')

	<h1 class="text-center  mt-5 text-danger"> Taller #21</h1>
    <h3 class="text-center mt-5 mb-3 text-info">LLENE  CON  LOS  SIGUIENTES  DATOS  EL  PAGARÉ  CORRECTAMENTE</h3>

    <form action="">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-6">
				 	<img class="img-fluid" src="{{ asset('img/talleres/imagen-18.jpg') }}" alt="">
				</div>
				<div class="col-10 border border-warning">
					<div class="row justify-content-center">
						<div class="col-10 p-2  ">
							<div class="row justify-content-center">
								<div class="col-4">
									<img class="img-fluid" src="{{ asset('img/talleres/imagen-19.jpg') }}" alt="">
								</div>
							</div>
							<div class="row justify-content-around">
								<div class="col-5">
									<span class="border border-right-0 border-left-0 border-success">No. 1</span>
								</div>
								<div class="col-4 form-inline">
									<label for="">Por $<input type="text" class="form-control"></label>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<p class="form-inline text-justify">
										Deb <input type="text" class="form-control m-1" size="1"> y pagar <input type="text" class="form-control m-1" size="2"> de la fecha en <input type="text" class="form-control m-1" size="5"> fijos en esta ciudad o en el lugar en que<input type="text" class="form-control m-1" size="5"> reconvenga a la orden de <input type="text" class="form-control m-1" size="60"> la cantidad de <input type="text" class="form-control m-1" size="60"> por igual valor que ten <input type="text" class="form-control m-1" size="1"> recibido, en calidad de préstamo y en dinero efectivo para destinarlo a negocios de comercio; esta cantidad que 
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
    		</div>
    	</div>
    </form>

@endsection