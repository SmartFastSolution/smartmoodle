@extends('layouts.nav')
<!--TALLER PARA ESCRIBIR DIFERENCIAS -->
@section('title', $datos->taller->nombre)
@section('content')


<h1 class="text-center  mt-5 text-danger">{{ $datos->taller->nombre }}</h1>
     <h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>


<form action="{{ route('taller4',['idtaller' => $d]) }}" method="POST">
    @csrf
	<div class="container">
		<div class="row">
			<div class="col-6 border-right border-info ">
				<div class="row justify-content-center">
					<img class="mt-3 img-fluid" with="10" src="{{ asset($datos->img1) }}" alt="">
				</div>
				<div class="row">
					<div class="col">
						<input class="form-control mb-3 mt-3" name="diferencia_1a" type="text">
				       <input class="form-control mb-3" name="diferencia_2a" type="text">
				      <input class="form-control mb-3" name="diferencia_3a" type="text">

					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="row justify-content-center">
					<img class="mt-3 img-fluid" with="100" src="{{ asset($datos->img2) }}" alt="">
				</div>
				<div class="row">
					<div class="col">
						<input class="form-control mb-3 mt-3" name="diferencia_1b" type="text">
				       <input class="form-control mb-3" name="diferencia_2b" type="text">
				      <input class="form-control mb-3" name="diferencia_3b" type="text">

					</div>
				</div>

			</div>
		</div>
		<div class="row justify-content-center">
        		<input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
    	</div>
	</div>

</form>
@endsection