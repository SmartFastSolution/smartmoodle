@extends('layouts.master')

@section('title', 'Taller 10')
@section('contenido')


<h1 class="text-center  mt-5 text-danger"> Taller #10</h1>
     <h3 class="text-center mt-5 mb-3 text-info">SUBRAYE  LA  ALTERNATIVA  CORRECTA.</h3>


     <form action="">
     	<div class="container">
     		<div class="row mb-4 justify-content-center ">
     			<div class="col-10">
     				<span class="badge-danger badge-pill">1.</span>
     				<label class="form-control-label">Persona  incapaz  de  ejercer  el  comercio :</label>
     				<div class="row">
     						<div class="col-4"><input type="radio" name="select"> <label>Niño</label></div>
     						<div class="col-4"><input type="radio" name="select"> <label>Profesional</label></div>
     						<div class="col-4"><input type="radio" name="select"> <label>Obrero</label></div>
     					</div>	
     			</div>
     		</div>

     		<div class="row mb-4  justify-content-center   ">
     			<div class="col-10">
     				<span class="badge-danger badge-pill">2.</span>
     				<label class="form-control-label">Adquirir  un  bien :</label>
     				<div class="row">
     						<div class="col-4"><input type="radio" name="select"> <label>Vender</label></div>
     						<div class="col-4"><input type="radio" name="select"> <label>Cambiar</label></div>
     						<div class="col-4"><input type="radio" name="select"> <label>Comprar</label></div>
     					</div>	
     			</div>
     		</div>
     		<div class="row mb-4 justify-content-center  ">
     			<div class="col-10">
     				<span class="badge-danger badge-pill">3.</span>
     				<label class="form-control-label">Persona  capaz  de  ejercer  el  comercio :</label>
     				<div class="row">
     						<div class="col-4"><input type="radio" name="select"> <label>Un Profesional</label></div>
     						<div class="col-4"><input type="radio" name="select"> <label>Un Niño</label></div>
     						<div class="col-4"><input type="radio" name="select"> <label>Un Reo</label></div>
     					</div>	
     			</div>
     		</div>
     	</div>

     	</div>

     	


     </form>

@endsection