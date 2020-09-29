@extends('layouts.nav')

@section('title', $datos->taller->nombre)
@section('content')

<!-- LLENE  CON  LOS  SIGUIENTES  DATOS  LOS  RECIBOS  CORRECTAMENTE. -->
	<h1 class="text-center  mt-5 text-danger"> {{ $datos->taller->nombre }}</h1>
    <h3 class="text-center mt-5 mb-3 text-info">{{  $datos->enunciado }}  </h3>
<form action="{{ route('taller23', ['idtaller' => $d]) }}" method="POST">
 @csrf
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-3">
				<h3 class="text-center">Datos</h3>
							<div class="row">				
								<div class="col-6">
								<label>Valor :</label> ${{ $datos->valor }}<br>
								<label>Acreedor :</label> <br>{{ $datos->acreedor }}<br>
								<label>Deudor :</label> {{ $datos->deudor }}<br>
								<label>Descripcion :</label> {{ $datos->descripcion }}<br>
								<label>Direccion :</label> <br> {{ $datos->direccion }}<br>
								<label>Lugar y fecha :</label> <br> {{ $datos->lugar }}, {{ $datos->fecha }}<br>
								</div>
							</div>

			</div>
			<div class="col-8 border">
				<h1 class="text-center">RECIBO</h1>
				<div class="row justify-content-between">
					<div class="col-4  form-inline">
						No. <input type="text" name="no" size="5" class="form-control" name="">
					</div>
					<div class="col-4 form-inline mb-2">
						Por $  <input type="text" size="5" class="form-control" name="por">
					</div>
				</div>
				<div class="row mb-2">			
					<div class="col-4 text-left">
						<label class="col-form-label" for="">Recibi de:</label>
					</div>
					<div class="col-8">
						<input type="text" name="recibi" class="form-control">
					</div>
				</div>

				<div class="row mb-2">			
							<div class="col-4 text-left">
								<label class="col-form-label" for="">La suma de:</label>
							</div>
							<div class="col-8">
								<input type="text" name="cantidad" class="form-control">
							</div>
						</div>

						<div class="row mb-2">			
							<div class="col-4 text-left">
								<label class="col-form-label" for="">Por arriendo de</label>
							</div>
							<div class="col-8 form-inline">
							<p><input type="text" name="arriendo" class="form-control"> que ocupa <input type="text" name="ocupa" class="form-control"></p>
								
							</div>
						</div>

						<div class="row mb-2">			
							<div class="col-4 text-left">
								<label class="col-form-label" for="">En la casa de propiedad</label>
							</div>
							<div class="col-8">
								<input type="text" name="propiedad" class="form-control">
							</div>
						</div>

						<div class="row mb-2">			
							<div class="col-4 text-left">
								<label class="col-form-label" for="">situado en</label>
							</div>
							<div class="col-8 form-inline">
								<p><input type="text" class="form-control" name="situado" size="40">  canon cubierto del</p>
							</div>
						</div>
						<div class="row mb-2">			
							
							<div class="col-12 form-inline">
						<p><input type="text" name="cubierto" class="form-control"  size="30"> Hasta el <input type="text" name="hasta" class="form-control" size="50"></p>
								
							</div>
						</div>

						<div class="row mb-2 justify-content-center">			
							<div class="col-6 text-center">
								<p><input type="text" name="firma" class="form-control" size="40">  FIRMA</p>
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