
@extends('layouts.nav')

@section('title', $datos->taller->nombre)
@section('content')

<h1 class="text-center  mt-5 text-danger"> {{ $datos->taller->nombre }}</h1>
<h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>
	<form action="{{ route('taller43', ['idtaller' => $d]) }}" method="POST">
           @csrf
		<div class="container">
			<div class="row justify-content-center ">
				<div class="col-6 text-center">
					<label class="text-center">{{ $datos->concepto }}</label>
					<div class="border border-info">
						<textarea name="" id="" class="form-control text-justify"  cols="20" rows="5">
						</textarea>
					</div>
				</div>
			</div>
			@if ($datos->cantidad == 3)
			<div class="row justify-content-center mb-2">
				<div class="col-12 text-center">
					<label class="text-center">Clasificación</label>
					<div class="row">
						<div class="col-4 "><input type="text" class="form-control border border-success" name="enunciado1"></div>
						<div class="col-4 "><input type="text" class="form-control border border-success" name="enunciado2"></div>
						<div class="col-4 "><input type="text" class="form-control border border-success" name="enunciado3"></div>
					</div>
				</div>
			</div>
			<div class="row justify-content-center ">
				<div class="col-12 text-center">
					<div class="row">
						<div class="col-4 "><textarea class="form-control border border-success" cols="20" name="respuesta1" rows="5"></textarea></div>
						<div class="col-4 "><textarea class="form-control border border-success" cols="20" name="respuesta2" rows="5"></textarea></div>
						<div class="col-4 "><textarea class="form-control border border-success" cols="20" name="respuesta3" rows="5"></textarea></div>
					</div>
				</div>
			</div>
			@elseif($datos->cantidad == 4)
					<div class="row justify-content-center mb-2">
				<div class="col-12 text-center">
					<label class="text-center">Clasificación</label>
					<div class="row">
						<div class="col-3 "><input type="text" class="form-control border border-success" name="enunciado1"></div>
						<div class="col-3 "><input type="text" class="form-control border border-success" name="enunciado2"></div>
						<div class="col-3 "><input type="text" class="form-control border border-success" name="enunciado3"></div>
						<div class="col-3 "><input type="text" class="form-control border border-success" name="enunciado4"></div>
					</div>
				</div>
			</div>
			<div class="row justify-content-center ">
				<div class="col-12 text-center">
					<div class="row">
						<div class="col-3 "><textarea class="form-control border border-success" cols="20" name="respuesta1" rows="5"></textarea></div>
						<div class="col-3 "><textarea class="form-control border border-success" cols="20" name="respuesta2" rows="5"></textarea></div>
						<div class="col-3 "><textarea class="form-control border border-success" cols="20" name="respuesta3" rows="5"></textarea></div>
						<div class="col-3 "><textarea class="form-control border border-success" cols="20" name="respuesta4" rows="5"></textarea></div>
					</div>
				</div>
			</div>
			@elseif($datos->cantidad == 5)
				<div class="row justify-content-center mb-2">
				<div class="col-12 text-center">
					<label class="text-center">Clasificación</label>
					<div class="row">
						<div class="col-3 "><input type="text" class="form-control border border-success" name="enunciado1"></div>
						<div class="col-2 "><input type="text" class="form-control border border-success" name="enunciado2"></div>
						<div class="col-2 "><input type="text" class="form-control border border-success" name="enunciado3"></div>
						<div class="col-2 "><input type="text" class="form-control border border-success" name="enunciado4"></div>
						<div class="col-3 "><input type="text" class="form-control border border-success" name="enunciado5"></div>
					</div>
				</div>
			</div>
			<div class="row justify-content-center ">
				<div class="col-12 text-center">
					<div class="row">
						<div class="col-3 "><textarea class="form-control border border-success" cols="20" name="respuesta1" rows="5"></textarea></div>
						<div class="col-2 "><textarea class="form-control border border-success" cols="20" name="respuesta2" rows="5"></textarea></div>
						<div class="col-2 "><textarea class="form-control border border-success" cols="20" name="respuesta3" rows="5"></textarea></div>
						<div class="col-2 "><textarea class="form-control border border-success" cols="20" name="respuesta4" rows="5"></textarea></div>
						<div class="col-3 "><textarea class="form-control border border-success" cols="20" name="respuesta5" rows="5"></textarea></div>
					</div>
				</div>
			</div>
			@elseif($datos->cantidad == 6)
						<div class="row justify-content-center mb-2">
				<div class="col-12 text-center">
					<label class="text-center">Clasificación</label>
					<div class="row">
						<div class="col-2"><input type="text" class="form-control border border-success" name="enunciado1"></div>
						<div class="col-2"><input type="text" class="form-control border border-success" name="enunciado2"></div>
						<div class="col-2"><input type="text" class="form-control border border-success" name="enunciado3"></div>
						<div class="col-2"><input type="text" class="form-control border border-success" name="enunciado4"></div>
						<div class="col-2"><input type="text" class="form-control border border-success" name="enunciado5"></div>
						<div class="col-2"><input type="text" class="form-control border border-success" name="enunciado6"></div>
					</div>
				</div>
			</div>
			<div class="row justify-content-center ">
				<div class="col-12 text-center">
					<div class="row">
						<div class="col-2"><textarea class="form-control border border-success" cols="20" name="respuesta1" rows="5"></textarea></div>
						<div class="col-2"><textarea class="form-control border border-success" cols="20" name="respuesta2" rows="5"></textarea></div>
						<div class="col-2"><textarea class="form-control border border-success" cols="20" name="respuesta3" rows="5"></textarea></div>
						<div class="col-2"><textarea class="form-control border border-success" cols="20" name="respuesta4" rows="5"></textarea></div>
						<div class="col-2"><textarea class="form-control border border-success" cols="20" name="respuesta5" rows="5"></textarea></div>
						<div class="col-2"><textarea class="form-control border border-success" cols="20" name="respuesta6" rows="5"></textarea></div>
					</div>
				</div>
			</div>

			@endif
		<div class="row justify-content-center">
        	<input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
    	</div>
		</div>
	</form>

@endsection