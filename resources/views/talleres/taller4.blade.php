@extends('layouts.master')

@section('title', 'Taller 4')
@section('contenido')


<h1 class="text-center  mt-5 text-danger"> Taller #4</h1>
     <h3 class="text-center mt-5 text-info">COMPLETE  LOS  ENUNCIADOS  CORRECTAMENTE</h3>
     <form action="">
     	<div class="container">
     		<div class="row justify-content-center">
     			<div class="col-7">
     				<div class="row mt-4 p-2">
     					<div class="col-6 ">
     						<label class="col-form-label " for="">Los  trámites  del  RUC  se  realizan  en  forma</label>
     						
     					</div>
     					<div class="col-6">
     						<input type="text" class="form-control inputcurrent">
     					</div>
     				</div>
<br>
     				<div class="row mt-4 p-2">
     					<div class="col-6">
     						<label class="col-form-label" for="">El  RUC  está  compuesto  por :</label>
 
     					</div>
     					<div class="col-6">
     						<input type="text" class="form-control inputcurrent">
     					</div>
     				</div>

     				<div class="row mt-4 p-2">
     					<div class="col-6">
     						<label class="col-form-label" for="">Los  trámites  del  RUC  se 
realizan  en  forma</label>
 
     					</div>
     					<div class="col-6">
     						<input type="text" class="form-control inputcurrent">
     					</div>
     				</div>
<br>
     				<div class="row mt-4 p-2">
     					<div class="col-6">
     						<label class="col-form-label" for="">El  Comerciante  debe  inscribir 
el  RUC  en  un  periodo  de </label>
 
     					</div>
     					<div class="col-6">
     						<input type="text" class="form-control inputcurrent">
     					</div>
     				</div>
<br>
     				<div class="row p-2">
     					<div class="col-6">
     						<label class="col-form-label" for="">l  RUC  se  lo  obtiene  en</label>
 
     					</div>
     					<div class="col-6">
     						<input type="text" class="form-control inputcurrent">
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