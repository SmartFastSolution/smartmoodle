@extends('layouts.master')

@section('title', 'Creador de plantillas')
@section('contenido')


	<h1 class="text-center  mt-5"> Generador de plantillas</h1>
     
  <div id="tallerlist"> 


     	<div class="container" >
     		<div class="row justify-content-center">
     			<div class="col-10">
     				<h4>Elija la plantilla a utilizar</h4>
     				<select class="custom-select" v-model="numbreTaller" name="taller" id="">
     					<option  value="#taller1">Taller 1</option>
     					<option value="#taller2">Taller 2</option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     					<option value=""></option>
     				</select>
     			</div>
     		</div>
     		 <div class="row justify-content-center mt-4">
        <button type="button" class="btn btn-primary" data-toggle="modal" :data-target="numbreTaller">
  			Cargar Plantilla
		</button>
     </div>
     	</div>
@include('layouts.modal')
</div> 
@endsection