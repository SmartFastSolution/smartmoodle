@extends('layouts.master')

@section('title', 'Taller 16')
@section('contenido')


<h1 class="text-center  mt-5 text-danger"> Taller #16</h1>
     <h3 class="text-center mt-5 mb-3 text-info">CON LOS SIGUIENTES DATOS LLENE EL CHEQUE AL PORTADOR, CON CERTEZA.</h3>

<form action="">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-2">
				 <img class="img-fluid" src="{{ asset('img/talleres/imagen-14.jpg') }}" alt="">
			</div>
			<div class="col-9 border">
				<div class="row ">
					<div class="col-6">
						<img class="img-fluid" src="{{ asset('img/talleres/imagen-15.jpg') }}" alt="">
					</div>	
					<div class="col-2 align-self-center">
						<p>16457 <br>
							152
						</p>
					</div>	
				</div>
				<div class="row">
					<div class="col-2">
						<label class="text-capitalize" for="">PAGUESE A LA ORDEN DE:</label>
						
					</div>
					<div class="col-8">
						<input type="text" class="form-control">
					</div>
					<div class="col-2">
						<label for="">
							CHEQUE 0145
						</label><br>
						<div class="row">
							<div class="col-2"><label for="">
							US
						</label></div>
							<div class="col-8"><input type="text" class="form-control" size="2"></div>
						</div>
						
					</div>

				</div>
				<div class="row mb-2">
					<div class="col-2">
						<label for="">LA SUMA DE</label>
					</div>
					<div class="col-8">
						<input type="text" class="form-control"> 
					</div>
					<div class="col-2">
						DOLARES
					</div>
				</div>
				<div class="row">
					<div class="col-6 align-self-start pb-5">
						<div class="row">
							<div class="col-6"><input class="form-control" type="text"></div>
							<div class="col-6"><input class="form-control" type="date"></div>
						</div>
							<div class="row">
							<div class="col-6"> <label for="">CIUDAD</label> </div>
							<div class="col-6 text-center"> <label for="">FECHA</label> </div>
						</div>
					</div>
					<div class="col-6 col align-self-end text-center">
						<input class="form-control" type="text">
						<label class="" for="">FIRMA</label>
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