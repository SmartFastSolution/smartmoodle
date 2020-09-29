@extends('layouts.nav')

@section('title', $datos->taller->nombre)
@section('content')
<!-- DEFINA  LOS  ENUNCIADOS  EN  LOS  CUADROS,  CON  ORIGINALIDAD. -->

<h1 class="text-center  mt-5 text-danger"> {{ $datos->taller->nombre }}</h1>
     <h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado}} </h3>

<form action="{{ route('taller13', ['idtaller' => $d]) }}" method="POST">
@csrf
<div class="container">
	<div class="row justify-content-center border p-2 border-info">
		<div class="col-10">
			<div class="row justify-content-between">
				<div class="col-5 border-danger border mb-4">
					<h2 class="text-center mt-1 mb-3"> {{ $datos->concepto1 }}</h2>
					<textarea name="respuesta1" class="form-control mb-2" id="" cols="30" rows="8"></textarea>
				</div>
				<div class="col-5 border-danger border mb-4">
					<h2 class="text-center mt-1 mb-3"> {{ $datos->concepto2 }}</h2>
					<textarea name="respuesta2" class="form-control mb-2" id="" cols="30" rows="8"></textarea>
				</div>

				<div class="col-5 border-danger border mb-4">
					<h2 class="text-center mt-1 mb-3"> {{ $datos->concepto3 }}</h2>
					<textarea name="respuesta3" class="form-control mb-2" id="" cols="30" rows="8"></textarea>
				</div>
				
				<div class="col-5 border-danger border mb-4">
					<h2 class="text-center mt-1 mb-3"> {{ $datos->concepto4 }}</h2>
					<textarea name="respuesta4" class="form-control mb-2" id="" cols="30" rows="8"></textarea>
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