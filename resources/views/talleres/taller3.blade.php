@extends('layouts.master')

@section('title', 'Taller 3')
@section('contenido')

<h1 class="text-center  mt-5"> Taller #3</h1>
     <h3 class="text-center mt-3">VALORA  TU  CRITERIO  PERSONAL.</h3>

<form action="{{ route('taller1') }}" method="POST">
    @csrf
     <div class="container">
     	<div class="row mt-4">
     		<div class="col-4">
     			<img class="border img-fluid" src="{{ asset('img/talleres/imagen-1.jpg') }}" alt="imagen 1">

     		</div>

     		<div class="col-8 ">
     		<textarea class="form-control inputdesign" name="respuesta" id="" cols="40" rows="5"
            >
            	
            </textarea>
     			
     		</div>


     	</div>
 <div class="row justify-content-center">
        <input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
     </div>

     </div>
</form>

@endsection