@extends('layouts.master')

@section('title', 'Taller 19')
@section('contenido')


<h1 class="text-center  mt-5 text-danger"> Taller #19</h1>
     <h3 class="text-center mt-5 mb-3 text-info">LLENE  CON  LOS SIGUIENTES DATOS LAS LETRAS  DE  CAMBIO CORRECTAMENTE</h3>

<form action="">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-2">
				 <img class="img-fluid" src="{{ asset('img/talleres/imagen-16.jpg') }}" alt="">
			</div>
			<div class="col-9 border border-info p-3">
				<div class="row mb-2">
					<div class="col-5 mt-3">
						<h2>LETRA DE CAMBIO</h2>
					</div>	
					<div class="col-7 align-self-center">
						<div class="row mb-2">
							<div class="col-3 text-right"><label for="" class="col-form-label">Vence el:</label></div>
							<div class="col-8"><input type="text" class="form-control"></div>
						</div>
						<div class="row">
							<div class="col-3 text-right"><label for="" class="col-form-label">No:</label></div>
							<div class="col-3"><input type="text" class="form-control"></div>
							<div class="col-5 border border-info p-2">
								<div class="row">
									<div class="col-2"><label class="col-form-label" for="">POR:</label></div>
									<div class="col-8"><input type="text" class="form-control"></div>
								</div>
								

							</div>
						</div>						
					</div>	
				</div>
				<div class="row">
					<div class="col-12 text-center ">
						<div class="row mb-1">
							<div class="col-6"><input type="text" class="form-control"></div>
							<div class="col-6"><input type="date" class="form-control"></div>
						</div>				
						<h6>Ciudad y fecha</h6>
					</div>
					<div class="col-12 ">						
							<input type="text" class="form-control">								
						<h6>A la orden de</h6>
					</div>
					<div class="col-12 ">						
							<input type="text" class="form-control">								
						<h6>De</h6>
					</div>
					<div class="col-12 ">						
							<input type="text" class="form-control">								
						<h6>La Cantidad de</h6>
					</div>
					<div class="col-12 form-inline">						
							<p class="col-form-label">Con  el  interés  del <input type="text" class="form-control"> por  ciento  anual,   desde <input type="text" class="form-control"> Sin protesto.   Exímese  de presentación  para  aceptación  y  pago  así  como  de  avisos  por  falta  de  estos  hechos.</p>
					</div>
					<div class="col-12 ">						
							<div class="row mb-1">
							<div class="col-6"><input type="text" class="form-control"></div>
							<div class="col-6"><input type="text" class="form-control"></div>
							</div>	

							<div class="row mb-1">
							<div class="col-6"><h6>Direccion</h6></div>
							<div class="col-6 text-right"><h6>Ciudad</h6></div>
							</div>	
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-5 text-center">
						<input type="text" class="form-control">
						<h1>Atentamente</h1>
					</div>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
        	<input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
    	</div>
	</div>
</form>
@endsection