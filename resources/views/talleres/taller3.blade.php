@extends('layouts.master')

@section('title', 'Taller 4')
@section('contenido')

    @foreach ($datos as $dato)
<h1 class="text-center  mt-5 text-danger">{{ $dato->taller->nombre }}</h1>
     <h3 class="text-center mt-5 text-info">{{ $dato->enunciado }}</h3>
     <form action="{{ route('taller3') }}" method="POST">
           @csrf
     	<div class="container">
     		<div class="row justify-content-center">
     			<div class="col-7">
     				<div class="row mt-4 p-2">
     					<div class="col-6 ">
     						<label class="col-form-label " for="">{{ $dato->enunciado1 }}</label>
     						
     					</div>
     					<div class="col-6">
     						<input type="text"  name="respuesta1" class="form-control inputcurrent">
     					</div>
     				</div>
                         <br>
     				<div class="row mt-4 p-2">
     					<div class="col-6">
     						<label class="col-form-label" for="">{{ $dato->enunciado2 }}:</label>
 
     					</div>
     					<div class="col-6">
     						<input type="text"  name="respuesta2" class="form-control inputcurrent">
     					</div>
     				</div>

     				<div class="row mt-4 p-2">
     					<div class="col-6">
     						<label class="col-form-label" for="">{{ $dato->enunciado3 }}</label>
 
     					</div>
     					<div class="col-6">
     						<input type="text" name="respuesta3" class="form-control inputcurrent">
     					</div>
     				</div>
<br>
     				<div class="row mt-4 p-2">
     					<div class="col-6">
     						<label class="col-form-label" for="">{{ $dato->enunciado4 }}</label>
 
     					</div>
     					<div class="col-6">
     						<input type="text" name="respuesta4" class="form-control inputcurrent">
     					</div>
     				</div>
<br>
     				<div class="row p-2">
     					<div class="col-6">
     						<label class="col-form-label" for="">{{ $dato->enunciado5 }}</label>
 
     					</div>
     					<div class="col-6">
     						<input type="text" name="respuesta5" class="form-control inputcurrent">
     					</div>
     				</div>
     			</div>
     		</div>
     		<div class="row justify-content-center">
        		<input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
    		 </div>
     	</div>
     </form>
@endforeach
@endsection