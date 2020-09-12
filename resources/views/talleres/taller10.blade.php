@extends('layouts.master')

@section('title', 'Taller 10')
@section('contenido')


<h1 class="text-center  mt-5 text-danger"> Taller #10</h1>
     <h3 class="text-center mt-5 mb-3 text-info">SUBRAYE  LA  ALTERNATIVA  CORRECTA.</h3>

<form action="{{ route('taller10') }}" method="POST">
    @csrf
     	<div class="container">
     		<div class="row mb-4 justify-content-center ">
     			<div class="col-10">
     				<span class="badge-danger badge-pill">1.</span>
     				<label class="form-control-label">Persona  incapaz  de  ejercer  el  comercio :</label>
     				<div class="row">
     						<div class="col-4"><input type="radio" name="item" value="niño"> <label>Niño</label></div>
     						<div class="col-4"><input type="radio" name="item" value="profesional"> <label>Profesional</label></div>
     						<div class="col-4"><input type="radio" name="item" value="obrero"> <label>Obrero</label></div>
     					</div>	
     			</div>
     		</div>

     		<div class="row mb-4  justify-content-center   ">
     			<div class="col-10">
     				<span class="badge-danger badge-pill">2.</span>
     				<label class="form-control-label">Adquirir  un  bien :</label>
     				<div class="row">
     						<div class="col-4"><input type="radio" name="item1" value="vender"> <label>Vender</label></div>
     						<div class="col-4"><input type="radio" name="item1" value="cambiar"> <label>Cambiar</label></div>
     						<div class="col-4"><input type="radio" name="item1" value="comprar"> <label>Comprar</label></div>
     					</div>	
     			</div>
     		</div>
     		<div class="row mb-4 justify-content-center  ">
     			<div class="col-10">
     				<span class="badge-danger badge-pill">3.</span>
     				<label class="form-control-label">Persona  capaz  de  ejercer  el  comercio :</label>
     				<div class="row">
     						<div class="col-4"><input type="radio" name="item2" value="un profesional"> <label>Un Profesional</label></div>
     						<div class="col-4"><input type="radio" name="item2" value="un niño"> <label>Un Niño</label></div>
     						<div class="col-4"><input type="radio" name="item2" value="un reo"> <label>Un Reo</label></div>
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