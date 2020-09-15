@extends('layouts.master')

@section('title', 'Taller 17')
@section('contenido')


<h1 class="text-center  mt-5 text-danger"> Taller #17</h1>
     <h3 class="text-center mt-5 mb-3 text-info">ENDOSE  EL  CHEQUE  A  NOMBRE DE  LA  ING. ISABEL  PANTOJA</h3>

     <form action="">
     	<div class="container">
     		<div class="row justify-content-center">
     			<div class="col-5 border-success border">
     				<div class="text-center">
     					<h2>ESPACIO PARA ENDOSO</h2>
     			<h6 class="mt-0">(en caso de requerirse)</h6>
     				</div>

     				<div class="text-justify">
     					ENSOSO A: 
     				</div>
     			
		        </div>
     		</div>
     		<div class="row justify-content-center">
     			<div class="col-5 border border-success">
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
	     			<div class="col-5 border-success border ">
	     				<div class="text-center mt-1">
	     					<h5 class="text-gray-dark">ESPACIO PARA DEPOSITANTE O PERSONA QUE COBRA</h5>
	     				</div>
					</div>
     			</div>
     			<div class="row justify-content-center">
     			<div class="col-5 border border-success">
     				<div class="row justify-content-center mt-3 mb-2">
     					<div class="col-8 text-center">
     						<input type="text" class="form-control">
     						<label for="">Firma</label>
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