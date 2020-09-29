@extends('layouts.nav')

@section('title', 'Taller 46')
@section('contenido')

<h1 class="text-center  mt-5 text-danger"> Taller #46</h1>
<h3 class="text-center mt-5 mb-3 text-info">COMPLETA  EL  SIGUIENTE  MAPA  CONCEPTUAL  CORRECTAMENTE.</h3>
	<form action="">
		<div class="container">
			<div class="row justify-content-center ">
				<div class="col-5 text-center">
					<label class="text-center">CUENTAS PATRIMONIALES</label>
					<div class="border border-info">
						<textarea name="" id="" class="form-control text-justify"  cols="20" rows="5">Representa..
						</textarea>
					</div>
				</div>
			</div>

			<div class="row justify-content-center mb-2">
				<div class="col-12 text-center">
					<label class="text-center">Clasificación</label>
					<div class="row">
						<div class="col-4"><input type="text" class="form-control" name=""></div>
						<div class="col-4"><input type="text" class="form-control" name=""></div>
						<div class="col-4"><input type="text" class="form-control" name=""></div>
					</div>
				</div>
			</div>
			<div class="row justify-content-center ">
				<div class="col-12 text-center">
					
					<div class="row">
						<div class="col-4"><textarea class="form-control" cols="20" rows="5">Representa</textarea></div>
						<div class="col-4"><textarea class="form-control" cols="20" rows="5"></textarea></div>
						<div class="col-4"><textarea class="form-control" cols="20" rows="5"></textarea></div>
					</div>
				</div>
			</div>

		</div>
	</form>

@endsection