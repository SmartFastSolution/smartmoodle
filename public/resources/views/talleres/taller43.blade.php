
@extends('layouts.nav')

@section('title', $datos->taller->nombre)
@section('content')

<h1 class="text-center  mt-5 text-danger font-weight-bold display-4"> {{ $datos->taller->nombre }}</h1>
<h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>
	<form action="{{ route('taller43', ['idtaller' => $d]) }}" method="POST">
           @csrf
		<div class="container">
			<div class="row justify-content-center ">
				<div class="col-6 text-center">
					<h3 class="text-center">{{ $datos->concepto }}</h3>
					<div class="" style="box-shadow: 5px 5px 15px 0px  #087980;">
						<textarea required name="respuesta" id="" class="form-control text-justify"  cols="20" rows="5">
						</textarea>
					</div>
				</div>
			</div>
			@if ($datos->cantidad == 3)
			<div class="row justify-content-center mb-2">
				<div class="col-12 text-center">
					<h3 class="text-center">Clasificación</h3>
					<div class="row">
						<div class="col-4 "><input required type="text" class="form-control border border-success" name="enunciado1"></div>
						<div class="col-4 "><input required type="text" class="form-control border border-success" name="enunciado2"></div>
						<div class="col-4 "><input required type="text" class="form-control border border-success" name="enunciado3"></div>
					</div>
				</div>
			</div>
			<div class="row justify-content-center ">
				<div class="col-12 text-center">
					<div class="row">
						<div class="col-4 "><textarea required class="form-control" style="box-shadow: 5px 5px 15px 0px  #1FEB6C; border: none;" cols="20" name="respuesta1" rows="5"></textarea></div>
						<div class="col-4 "><textarea required class="form-control" style="box-shadow: 5px 5px 15px 0px  #1FEB6C; border: none;" cols="20" name="respuesta2" rows="5"></textarea></div>
						<div class="col-4 "><textarea required class="form-control" style="box-shadow: 5px 5px 15px 0px  #1FEB6C; border: none;" cols="20" name="respuesta3" rows="5"></textarea></div>
					</div>
				</div>
			</div>
			@elseif($datos->cantidad == 4)
					<div class="row justify-content-center mb-2">
				<div class="col-12 text-center">
					<h3 class="text-center">Clasificación</h3>
					<div class="row">
						<div class="col-3 "><input required type="text" class="form-control border border-success" name="enunciado1"></div>
						<div class="col-3 "><input required type="text" class="form-control border border-success" name="enunciado2"></div>
						<div class="col-3 "><input required type="text" class="form-control border border-success" name="enunciado3"></div>
						<div class="col-3 "><input required type="text" class="form-control border border-success" name="enunciado4"></div>
					</div>
				</div>
			</div>
			<div class="row justify-content-center ">
				<div class="col-12 text-center">
					<div class="row">
						<div class="col-3 "><textarea required class="form-control" style="box-shadow: 5px 5px 15px 0px  #1FEB6C; border: none;" cols="20" name="respuesta1" rows="5"></textarea></div>
						<div class="col-3 "><textarea required class="form-control" style="box-shadow: 5px 5px 15px 0px  #1FEB6C; border: none;" cols="20" name="respuesta2" rows="5"></textarea></div>
						<div class="col-3 "><textarea required class="form-control" style="box-shadow: 5px 5px 15px 0px  #1FEB6C; border: none;" cols="20" name="respuesta3" rows="5"></textarea></div>
						<div class="col-3 "><textarea required class="form-control" style="box-shadow: 5px 5px 15px 0px  #1FEB6C; border: none;" cols="20" name="respuesta4" rows="5"></textarea></div>
					</div>
				</div>
			</div>
			@elseif($datos->cantidad == 5)
				<div class="row justify-content-center mb-2">
				<div class="col-12 text-center">
					<h3 class="text-center">Clasificación</h3>
					<div class="row">
						<div class="col-3 "><input required type="text" class="form-control border border-success" name="enunciado1"></div>
						<div class="col-2 "><input required type="text" class="form-control border border-success" name="enunciado2"></div>
						<div class="col-2 "><input required type="text" class="form-control border border-success" name="enunciado3"></div>
						<div class="col-2 "><input required type="text" class="form-control border border-success" name="enunciado4"></div>
						<div class="col-3 "><input required type="text" class="form-control border border-success" name="enunciado5"></div>
					</div>
				</div>
			</div>
			<div class="row justify-content-center ">
				<div class="col-12 text-center">
					<div class="row">
						<div class="col-3 "><textarea required class="form-control" style="box-shadow: 5px 5px 15px 0px  #1FEB6C; border: none;" cols="20" name="respuesta1" rows="5"></textarea></div>
						<div class="col-2 "><textarea required class="form-control" style="box-shadow: 5px 5px 15px 0px  #1FEB6C; border: none;" cols="20" name="respuesta2" rows="5"></textarea></div>
						<div class="col-2 "><textarea required class="form-control" style="box-shadow: 5px 5px 15px 0px  #1FEB6C; border: none;" cols="20" name="respuesta3" rows="5"></textarea></div>
						<div class="col-2 "><textarea required class="form-control" style="box-shadow: 5px 5px 15px 0px  #1FEB6C; border: none;" cols="20" name="respuesta4" rows="5"></textarea></div>
						<div class="col-3 "><textarea required class="form-control" style="box-shadow: 5px 5px 15px 0px  #1FEB6C; border: none;" cols="20" name="respuesta5" rows="5"></textarea></div>
					</div>
				</div>
			</div>
			@elseif($datos->cantidad == 6)
						<div class="row justify-content-center mb-2">
				<div class="col-12 text-center">
					<h3 class="text-center">Clasificación</h3>
					<div class="row">
						<div class="col-2"><input required type="text" class="form-control border border-success" name="enunciado1"></div>
						<div class="col-2"><input required type="text" class="form-control border border-success" name="enunciado2"></div>
						<div class="col-2"><input required type="text" class="form-control border border-success" name="enunciado3"></div>
						<div class="col-2"><input required type="text" class="form-control border border-success" name="enunciado4"></div>
						<div class="col-2"><input required type="text" class="form-control border border-success" name="enunciado5"></div>
						<div class="col-2"><input required type="text" class="form-control border border-success" name="enunciado6"></div>
					</div>
				</div>
			</div>
			<div class="row justify-content-center ">
				<div class="col-12 text-center">
					<div class="row">
						<div class="col-2"><textarea required class="form-control" style="box-shadow: 5px 5px 15px 0px  #1FEB6C; border: none;" cols="20" name="respuesta1" rows="5"></textarea></div>
						<div class="col-2"><textarea required class="form-control" style="box-shadow: 5px 5px 15px 0px  #1FEB6C; border: none;" cols="20" name="respuesta2" rows="5"></textarea></div>
						<div class="col-2"><textarea required class="form-control" style="box-shadow: 5px 5px 15px 0px  #1FEB6C; border: none;" cols="20" name="respuesta3" rows="5"></textarea></div>
						<div class="col-2"><textarea required class="form-control" style="box-shadow: 5px 5px 15px 0px  #1FEB6C; border: none;" cols="20" name="respuesta4" rows="5"></textarea></div>
						<div class="col-2"><textarea required class="form-control" style="box-shadow: 5px 5px 15px 0px  #1FEB6C; border: none;" cols="20" name="respuesta5" rows="5"></textarea></div>
						<div class="col-2"><textarea required class="form-control" style="box-shadow: 5px 5px 15px 0px  #1FEB6C; border: none;" cols="20" name="respuesta6" rows="5"></textarea></div>
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
