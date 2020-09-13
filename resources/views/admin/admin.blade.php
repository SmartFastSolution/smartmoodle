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
     					<option  value="#taller1">TALLER 1 - COMPLETE EL ENUNCIADO</option>
     					<option value="#taller2">TALLER 2 - CLASIFICAR CON ORIGINALIDAD</option>
     					<option value="#taller3">TALLER 3 - COMPLETE LOS ENUNCIADOS CORRECTAMENTE</option>
     					<option value="#taller4"></option>
     					<option value="#taller5"></option>
     					<option value="#taller6"></option>
     					<option value="#taller7"></option>
     					<option value="#taller8"></option>
     					<option value="#taller9"></option>
     					<option value="#taller10"></option>
     					<option value="#taller11"></option>
     					<option value="#taller12"></option>
     					<option value="#taller13"></option>
     					<option value="#taller14"></option>
     					<option value="#taller15"></option>
     					<option value="#taller16"></option>
     					<option value="#taller17"></option>
     					<option value="#taller18"></option>
     					<option value="#taller19"></option>
     					<option value="#taller20"></option>
     					<option value="#taller21"></option>
     					<option value="#taller22"></option>
     					<option value="#taller23"></option>
     					<option value="#taller24"></option>
     					<option value="#taller25"></option>
     					<option value="#taller26"></option>
     					<option value="#taller27"></option>
     					<option value="#taller28"></option>
     					<option value="#taller29"></option>
     					<option value="#taller30"></option>
     					<option value="#taller31"></option>
     					<option value="#taller32"></option>
     					<option value="#taller33"></option>
     					<option value="#taller34"></option>
     					<option value="#taller35"></option>
     					<option value="#taller36"></option>
     					<option value="#taller37"></option>
     					<option value="#taller38"></option>
     					<option value="#taller39"></option>
     					<option value="#taller40"></option>
     					<option value="#taller41"></option>
     					<option value="#taller42"></option>
     					<option value="#taller43"></option>
     					<option value="#taller44"></option>
     					<option value="#taller45"></option>
     					<option value="#taller46"></option>
     					<option value="#taller47"></option>
     					<option value="#taller48"></option>
     					<option value="#taller49"></option>
     					<option value="#taller50"></option>
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