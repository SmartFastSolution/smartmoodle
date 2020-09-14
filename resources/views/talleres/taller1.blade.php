@extends('layouts.master')

@section('title', 'Taller '.$d)
@section('contenido')

<form action="{{ route('taller1') }}" method="POST">
    @csrf
	 <div class="container">
        @foreach ($datos as $dato)
	 	<h1 class="text-center  mt-5">{{ $dato->taller->nombre }}</h1>
     <h3 class="text-center mt-3">{{ $dato->enunciado }}</h3>

     <div class="row justify-content-md-center">
         <div class="col-10 mt-5 mb-5">
            <textarea class="form-control inputdesign" name="respuesta" id="" cols="40" rows="10">{{ $dato->leyenda }}

            </textarea>
        </div>

     </div>

     <div class="row justify-content-center">
        <input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
     </div>
      @endforeach
 </div>
</form>
@endsection