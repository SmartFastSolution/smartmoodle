@extends('layouts.nav')

@section('title', {{ $datos->nombre }})
@section('content')

	<h1 class="text-center  mt-5 text-danger">{{ $datos->nombre }}</h1>
	<h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>
<form action="">
	<div class="container">
		<div class="row justify-content-center mb-2">
			<div class="col-10">
				<div class="row justify-content-center">
					<div class="col-6  align-self-center">
						<h4  class="text-center bg-success p-2 rounded">FORMAS DE TRANSACCIONES</h4 >
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-4 align-self-center">
						<h5 class="bg-warning border border-secondary p-1 rounded text-center">VENDER</h5>
						<input type="text" class="form-control">
					</div>
					<div class="col-4 text-center">
						<img class="img-fluid" src="{{ asset('img/talleres/imagen-32.jpg') }}" alt="">
					</div>
					<div class="col-4 align-self-center">
						<h5 class="bg-warning border border-secondary p-1 rounded text-center">COMPRAR</h5>
						<input type="text" class="form-control">
					</div>
				</div>

				<div class="row justify-content-lg-between">
					<div class="col-3 align-self-center text-center border-danger border p-3">
						<h5>1</h5>
						<input type="text" class="form-control">
						<img class="img-fluid mb-1 mt-1 " src="{{ asset('img/talleres/imagen-32.jpg') }}" alt="">
						<input type="text" class="form-control">
					</div>
					<div class="col-3 align-self-center text-center border-danger border p-3">
						<h5>2</h5>

						<input type="text" class="form-control">
						<img class="img-fluid mb-1 mt-1 " src="{{ asset('img/talleres/imagen-32.jpg') }}" alt="">
						<input type="text" class="form-control">
					</div>
					<div class="col-3 align-self-center text-center border-danger border p-3">
						<h5>3</h5>

						<input type="text" class="form-control">
						<img class="img-fluid mb-1 mt-1 " src="{{ asset('img/talleres/imagen-32.jpg') }}" alt="">
						<input type="text" class="form-control">
					</div>
				</div>
		
				
			</div>
		</div>
	</div>
</form>

@endsection