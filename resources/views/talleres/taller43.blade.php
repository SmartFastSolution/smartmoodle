
@extends('layouts.nav')

@section('title', $datos->taller->nombre)
@section('content')

<h1 class="text-center  mt-5 text-danger"> {{ $datos->taller->nombre }}</h1>
<h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>
	<form action="">
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
						<div class="col-4 "><input type="text" class="form-control border border-success" name=""></div>
						<div class="col-4 "><input type="text" class="form-control border border-success" name=""></div>
						<div class="col-4 "><input type="text" class="form-control border border-success" name=""></div>
					</div>
				</div>
			</div>
			<div class="row justify-content-center ">
				<div class="col-12 text-center">
					<div class="row">
						<div class="col-4 "><textarea class="form-control border border-success" cols="20" rows="5"></textarea></div>
						<div class="col-4 "><textarea class="form-control border border-success" cols="20" rows="5"></textarea></div>
						<div class="col-4 "><textarea class="form-control border border-success" cols="20" rows="5"></textarea></div>
					</div>
				</div>
			</div>
			@elseif($datos->cantidad == 4)
					<div class="row justify-content-center mb-2">
				<div class="col-12 text-center">
					<label class="text-center">Clasificación</label>
					<div class="row">
						<div class="col-3 "><input type="text" class="form-control border border-success" name=""></div>
						<div class="col-3 "><input type="text" class="form-control border border-success" name=""></div>
						<div class="col-3 "><input type="text" class="form-control border border-success" name=""></div>
						<div class="col-3 "><input type="text" class="form-control border border-success" name=""></div>
					</div>
				</div>
			</div>
			<div class="row justify-content-center ">
				<div class="col-12 text-center">
					<div class="row">
						<div class="col-3 "><textarea class="form-control border border-success" cols="20" rows="5"></textarea></div>
						<div class="col-3 "><textarea class="form-control border border-success" cols="20" rows="5"></textarea></div>
						<div class="col-3 "><textarea class="form-control border border-success" cols="20" rows="5"></textarea></div>
						<div class="col-3 "><textarea class="form-control border border-success" cols="20" rows="5"></textarea></div>
					</div>
				</div>
			</div>
			@elseif($datos->cantidad == 5)
				<div class="row justify-content-center mb-2">
				<div class="col-12 text-center">
					<label class="text-center">Clasificación</label>
					<div class="row">
						<div class="col-2 "><input type="text" class="form-control border border-success" name=""></div>
						<div class="col-2 "><input type="text" class="form-control border border-success" name=""></div>
						<div class="col-3 "><input type="text" class="form-control border border-success" name=""></div>
						<div class="col-2 "><input type="text" class="form-control border border-success" name=""></div>
						<div class="col-2 "><input type="text" class="form-control border border-success" name=""></div>
					</div>
				</div>
			</div>
			<div class="row justify-content-center ">
				<div class="col-12 text-center">
					<div class="row">
						<div class="col-2 "><textarea class="form-control border border-success" cols="20" rows="5"></textarea></div>
						<div class="col-2 "><textarea class="form-control border border-success" cols="20" rows="5"></textarea></div>
						<div class="col-3 "><textarea class="form-control border border-success" cols="20" rows="5"></textarea></div>
						<div class="col-2 "><textarea class="form-control border border-success" cols="20" rows="5"></textarea></div>
						<div class="col-2 "><textarea class="form-control border border-success" cols="20" rows="5"></textarea></div>
					</div>
				</div>
			</div>
			@elseif($datos->cantidad == 6)
						<div class="row justify-content-center mb-2">
				<div class="col-12 text-center">
					<label class="text-center">Clasificación</label>
					<div class="row">
						<div class="col-2"><input type="text" class="form-control border border-success" name=""></div>
						<div class="col-2"><input type="text" class="form-control border border-success" name=""></div>
						<div class="col-2"><input type="text" class="form-control border border-success" name=""></div>
						<div class="col-2"><input type="text" class="form-control border border-success" name=""></div>
						<div class="col-2"><input type="text" class="form-control border border-success" name=""></div>
						<div class="col-2"><input type="text" class="form-control border border-success" name=""></div>
					</div>
				</div>
			</div>
			<div class="row justify-content-center ">
				<div class="col-12 text-center">
					<div class="row">
						<div class="col-2"><textarea class="form-control border border-success" cols="20" rows="5"></textarea></div>
						<div class="col-2"><textarea class="form-control border border-success" cols="20" rows="5"></textarea></div>
						<div class="col-2"><textarea class="form-control border border-success" cols="20" rows="5"></textarea></div>
						<div class="col-2"><textarea class="form-control border border-success" cols="20" rows="5"></textarea></div>
						<div class="col-2"><textarea class="form-control border border-success" cols="20" rows="5"></textarea></div>
						<div class="col-2"><textarea class="form-control border border-success" cols="20" rows="5"></textarea></div>
					</div>
				</div>
			</div>

			@endif
	
		</div>
	</form>

@endsection