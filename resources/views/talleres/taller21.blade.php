@extends('layouts.nav')


@section('title', $datos->taller->nombre)
@section('content')

<!-- LLENE  CON  LOS  SIGUIENTES  DATOS  LOS  VALES,  CORRECTAMENTE. -->
<h1 class="text-center  mt-5 text-danger">{{ $datos->taller->nombre }}</h1>
     <h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }} </h3>
<form action="{{ route('taller21', ['idtaller' => $d]) }}" method="POST">
          @csrf
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-3">
					<h3 class="text-center">Datos</h3>
					<div class="row">				
						<div class="col-6">
							<label>Valor :</label> ${{ $datos->valor }}<br>
							<label>Deudor :</label> {{ $datos->deudor }}<br>
							<label>Detalle :</label> {{ $datos->detalle }}<br>
							<label>Lugar y fecha :</label> {{ $datos->lugar }}, {{ $datos->fecha }}<br>
						</div>
					</div>
			</div>
			<div class="col-9 border border-warning">
				<div class="row justify-content-end">
					<div class="col-12 text-center mt-2">
						<h2>VALE DE CAJA</h2>
					</div>
					<div class="col-4 form-inline">
						<label for="">Por $ </label> <input type="text" name="por" class="form-control" size="20">
					</div>
				</div>
				<div class="row justify-content-center mt-1">
					<div class="col-12">
						<div class="row justify-content-start">
							<div class="col-3"><label for="">A favor de </label> </div>
							<div class="col-9"><input type="text" name="deudor" class="form-control"></div>
						</div>
						
					</div>
				</div>
				<div class="row justify-content-center mt-1">
					<div class="col-12">
						<div class="row justify-content-start">
							<div class="col-3"><label for="">Por la cantidad de </label> </div>
							<div class="col-9"><input name="cantidad" type="text" class="form-control"></div>
						</div>
						
					</div>
				</div>
				<div class="row justify-content-center mt-1">
					<div class="col-12">
						<div class="row justify-content-start">
							<div class="col-3"><label for="">A concepto de </label> </div>
							<div class="col-9"><input name="concepto" type="text" class="form-control"></div>
						</div>
						
					</div>
				</div>
				<div class="row justify-content-end mt-2">
					<div class="col-6 text-center">
						<input type="date" name="fecha" class="form-control" >
						<label for="">Fecha</label>
					</div>
				</div>
				<div class="row justify-content-lg-between">
					<div class="col-4 text-center">
						<input name="vto_bueno" type="text" class="form-control" >
						<label >Vto. Bno.</label>
					</div>
					<div class="col-4 text-center">
						<input name="conforme" type="text" class="form-control" >
						<label >Recibi conforme</label>
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