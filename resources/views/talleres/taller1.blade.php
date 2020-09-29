@extends('layouts.nav')


@section('titulo', $datos->taller->nombre)
@section('content')

<form action="{{ route('taller1', ['idtaller' => $d]) }}" method="POST">
    @csrf
	 <div class="container">
        
	 	<h1 class="text-center  mt-5">{{ $datos->taller->nombre }}</h1>
     <h3 class="text-center mt-3">{{ $datos->enunciado }}</h3>

     <div class="row justify-content-md-center">
        <div class="col-2 ">
            <img src="{{ $datos->img }}" width="170" alt="">
        </div>
         <div class="col-6 ">
            <textarea class="form-control inputdesign" name="respuesta" id="" cols="40" rows="10">{{ $datos->leyenda }}

            </textarea>
        </div>

     </div>

     <div class="row justify-content-center">
        <input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
     </div>
 </div>
</form>
@endsection