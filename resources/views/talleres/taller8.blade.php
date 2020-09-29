@extends('layouts.nav')


@section('title', 'Taller 9')
@section('content')

<!--ESCRIBA  EN  LOS  CÍRCULOS  EJEMPLOS. -->

<h1 class="text-center  mt-5 text-danger">{{ $datos->taller->nombre }}</h1>
     <h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>

<form action="{{ route('taller8', ['idtaller' => $d]) }}" method="POST">
    @csrf
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4 mt-5">
                <input class="form-control inputdesign" name="respuesta1" id="">
            </div>
        </div>

         <div class="row row justify-content-md-center">
        <div class="col-4 mt-5">
            <input class="form-control inputdesign" name="respuesta2" id="">
        </div>
            <div class="col-3 text-center mt-3 mb-3 ">
                <img src="{{ asset('img/talleres/imagen-10.jpg') }}" alt="">
            </div>
        <div class="col-4 mt-5">
            <input class="form-control inputdesign" name="respuesta3" id=""
            >
        </div>

    </div>

    <div class="row justify-content-center">
            <div class="col-4 m-2">
                <input class="form-control inputdesign" name="respuesta4" id="">
            </div>
        </div>
        <div class="row justify-content-center">
        	<input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
    	</div>
    </div>
</form>


@endsection