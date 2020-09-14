@extends('layouts.master')

@section('title', 'Taller 14')
@section('contenido')

<h1 class="text-center  mt-5 text-danger"> Taller #14</h1>
     <h3 class="text-center mt-5 mb-3 text-info">DEFINA  LOS  ENUNCIADOS  EN  LOS  CUADROS,  CON  ORIGINALIDAD.</h3>

<form action="">
	
<div class="container">
	<div class="row justify-content-center border p-2 border-info">
		<div class="col-10">
			<div class="row justify-content-between">
				<div class="col-5 border-danger border mb-4">
					<h2 class="text-center mt-1 mb-3">Factura</h2>
					<textarea name="" class="form-control mb-2" id="" cols="30" rows="8"></textarea>
				</div>
				<div class="col-5 border-danger border mb-4">
					<h2 class="text-center mt-1 mb-3">Factura</h2>
					<textarea name="" class="form-control mb-2" id="" cols="30" rows="8"></textarea>
				</div>

				<div class="col-5 border-danger border mb-4">
					<h2 class="text-center mt-1 mb-3">Factura</h2>
					<textarea name="" class="form-control mb-2" id="" cols="30" rows="8"></textarea>
				</div>
				<div class="col-5 border-danger border mb-4">
					<h2 class="text-center mt-1 mb-3">Factura</h2>
					<textarea name="" class="form-control mb-2" id="" cols="30" rows="8"></textarea>
				</div>
			</div>
		</div>
		
	</div>
	    <div class="row justify-content-center">
        	<input type="submit" value="Enviar Respuestas" class="btn p-2 mt-3 btn-danger">
    	</div>
</div>

</form>
@endsection