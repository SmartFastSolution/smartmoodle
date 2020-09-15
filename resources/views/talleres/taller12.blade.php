@extends('layouts.master')

@section('title', 'Taller 13')
@section('contenido')


<h1 class="text-center  mt-5 text-danger"> Taller #13</h1>
     <h3 class="text-center mt-5 text-info">DENTIFICA  EL  ENUNCIADO  ESCRIBIENDO  (V) DE  VERDADERO   O  (F)  DE 
FALSO,  CON  CERTEZA.</h3>
     <form action="">
     	<div class="container">
     		<div class="row justify-content-center">
     			<div class="col-7">
     				<div class="row mt-4 p-2">
     					<div class="col-10 ">
     						<label class="col-form-label " for="">Los  trámites  del  RUC  se  realizan  en  forma</label>
     						
     					</div>
     					<div class="col-2">
                                   <select name="" id="" class="inputcurrent p-2">
                                        <option value="V" class="p-2">V</option>
                                        <option value="F" class="p-2">F</option>
                                   </select>
     					</div>
     				</div>
<br>
     				<div class="row mt-4 p-2">
     					<div class="col-10">
     						<label class="col-form-label" for="">El  RUC  está  compuesto  por :</label>
 
     					</div>
     					<div class="col-2">
     						<select name="" id="" class="inputcurrent p-2">
                                        <option value="V" class="p-2">V</option>
                                        <option value="F" class="p-2">F</option>
                                   </select>
     					</div>
     				</div>

     				<div class="row mt-4 p-2">
     					<div class="col-10">
     						<label class="col-form-label" for="">Los  trámites  del  RUC  se 
realizan  en  forma</label>
 
     					</div>
     					<div class="col-2">
     						<select name="" id="" class="inputcurrent p-2">
                                        <option value="V" class="p-2">V</option>
                                        <option value="F" class="p-2">F</option>
                                   </select>
     					</div>
     				</div>
<br>
     				<div class="row mt-4 p-2">
     					<div class="col-10">
     						<label class="col-form-label" for="">El  Comerciante  debe  inscribir 
el  RUC  en  un  periodo  de </label>
 
     					</div>
     					<div class="col-2">
     						<select name="" id="" class="inputcurrent p-2">
                                        <option value="V" class="p-2">V</option>
                                        <option value="F" class="p-2">F</option>
                                   </select>
     					</div>
     				</div>
<br>
     				<div class="row p-2">
     					<div class="col-10">
     						<label class="col-form-label" for="">l  RUC  se  lo  obtiene  en</label>
 
     					</div>
     					<div class="col-2">
     						<select name="" id="" class="inputcurrent p-2">
                                        <option value="V" class="p-2">V</option>
                                        <option value="F" class="p-2">F</option>
                                   </select>
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