@extends('layouts.master')

@section('title', 'Taller 18')
@section('contenido')


<h1 class="text-center  mt-5 text-danger"> Taller #18</h1>
     <h3 class="text-center mt-5 mb-3 text-info">CONVIERTA  Y  COMPLETE  EL  CHEQUE  CERTIFICADO  CORRECTAMENTE</h3>

<form action="">
	 <div class="container">
	 	<div class="row">
     		<div class="col-8 ">
     			<div class="border border-info p-2">
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
						<input type="text" class="form-control" disabled value="Sra.  Lucía  Méndez">
					</div>
					<div class="col-2">
						<label for="">
							CHEQUE 0145
						</label><br>
						<div class="row">
							<div class="col-2"><label for="">
							US
						</label></div>
							<div class="col-8"><input type="text" value="750.00" disabled class="form-control" size="2"></div>
						</div>
						
					</div>

				</div>
				<div class="row mb-2">
					<div class="col-2">
						<label for="">LA SUMA DE</label>
					</div>
					<div class="col-8">
						<input type="text" value="Setecientos  Cincuenta" disabled class="form-control"> 
					</div>
					<div class="col-2">
						DOLARES
					</div>
				</div>
				<div class="row">
					<div class="col-6 align-self-start pb-5">
						<div class="row">
							<div class="col-6"><input class="form-control" type="text" disabled value="Guayaquil"></div>
							<div class="col-6"><input class="form-control" type="text" disabled value="12/02/20"></div>
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

			<div class="col-4">
				<div class="row justify-content-center">
     			    <div class="col-10 border-success border">
     				<div class="text-center">
     					<h4>ESPACIO PARA ENDOSO</h4>
     			<h6 class="mt-0">(en caso de requerirse)</h6>
     				</div>

     				<div class="text-justify">
     					ENSOSO A: 
     				</div>
     			
		        </div>
     		</div>
     		<div class="row justify-content-center">
     			<div class="col-10 border border-success">
     				<div class="row justify-content-center mt-3 mb-2">
     					<div class="col-8 text-center">
     						<input type="text" class="form-control">
     						<label for="">Nombre</label>
     					</div>
     					<div class="col-8 text-center">
     						<input type="text" class="form-control">
     						<label for="">Firma del endosante</label>
     						<h6>(1 beneficiario)</h6>
     					</div>
     				</div>
     			</div>
     		</div>
     			<div class="row justify-content-center ">
	     			<div class="col-10 border-success border ">
	     				<div class="text-center mt-1">
	     					<h5 class="text-gray-dark">ESPACIO PARA DEPOSITANTE O PERSONA QUE COBRA</h5>
	     				</div>
					</div>
     			</div>
     			<div class="row justify-content-center">
     			<div class="col-10 border border-success">
     				<div class="row justify-content-center mt-3 mb-2">
     					<div class="col-8 text-center">
     						<input type="text" class="form-control">
     						<label for="">Firma</label>
     					</div>
     					
     				</div>
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