@extends('layouts.master')

@section('title', 'Taller 1')
@section('contenido')

<form action="{{ route('taller1') }}" method="POST">
    @csrf
	 <div class="container">
	 	<h1 class="text-center  mt-5"> Taller #1</h1>
     <h3 class="text-center mt-3">COMPLETE  EL  ENUNCIADO  CORRECTAMENTE.</h3>

     <div class="row justify-content-md-center">
         <div class="col-10 mt-5 mb-5">
            <textarea class="form-control inputdesign" name="respuesta" id="" cols="40" rows="10">El  Comercio  es  importante  porque

            </textarea>
        </div>

     </div>

     <div class="row justify-content-center">
        <input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
     </div>

 </div>
</form>
@endsection