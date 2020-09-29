@extends('layouts.nav')

@section('title', $datos->taller->nombre )
@section('content')

<!-- LENE  CON  LOS  SIGUIENTES  DATOS  LA  NOTA  DE  PEDIDO, 
ADECUADAMENTE. -->
	<h1 class="text-center  mt-5 text-danger">{{  $datos->taller->nombre }} </h1>
    <h3 class="text-center mt-5 mb-3 text-info"> {{ $datos->enunciado }}</h3>

<form action="{{ route('taller22', ['idtaller' => $d]) }}" method="POST">
          @csrf
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-4">
						<h3 class="text-center">Datos</h3>
							<div class="row">				
								<div class="col-6">
									<label>Pedido :</label> {{ $datos->pedido }}<br>
									<label>Cantidad :</label> {{ $datos->cantidad }}<br>
									<label>Codigo :</label> {{ $datos->codigo }}<br>
									<label>Detalle :</label> {{ $datos->detalle }}<br>
									<label>Lugar y fecha :</label> {{ $datos->lugar }}, {{ $datos->fecha }}<br>

									<label>Firma de Bodeguero :</label> {{ $datos->firma }}<br>
									<label>Plazo de entrega :</label> {{ $datos->plazo_entrega }}<br>
								</div>
							</div>
			</div>

			<div class="col-8 border border-warning">
				<div class="row">
					<div class="col-6 text-center p-3">
						<h1>COMERCIAL "PLAZA"</h1>
						<img class="img-fluid" src="{{ asset('img/talleres/imagen-22.jpg') }}" alt="">
						<h5 class="text-left">RUC. 0923568947001</h5><h5 class="text-left">Av. Quito y letamendi</h5>
						<h5 class="text-left">Tlfs: 2580465 - 2413864</h5>
					</div>
					<div class="col-6 text-center p-3">
						<h1>NOTA DE PEDIDA</h1>
						<h4>No. <input type="text" name="no" class="" size="5"></h4>
						<div class="row mb-2">			
							<div class="col-4 text-left">
								<label class="col-form-label" for="">Fecha:</label>
							</div>
							<div class="col-8">
								<input type="text" name="fecha" class="form-control">
							</div>
						</div>
						<div class="row mb-2">			
							<div class="col-4 text-left">
								<label class="col-form-label" for="">Dependencia</label>
							</div>
							<div class="col-8">
								<input type="text" name="dependencia" class="form-control">
							</div>
						</div>
						<div class="row mb-2">			
							<div class="col-4 text-left">
								<label class="col-form-label" for="">Destino</label>
							</div>
							<div class="col-8">
								<input type="text" name="destino" class="form-control">
							</div>
						</div>
						<div class="row mb-2">			
							<div class="col-4 text-left">
								<label class="col-form-label" for="">Plazo de entrega</label>
							</div>
							<div class="col-8">
								<input type="text" name="plazo_entrega" class="form-control">
							</div>
						</div>
					</div>
				</div>

				<div class="row p-3">
					<table class="table table-bordered">
					  <thead>
					    <tr class="text-center">
					      <th scope="col">CANTIDAD</th>
					      <th scope="col">CODIGO</th>
					      <th scope="col">DESCRIPCION</th>
					      <th scope="col">PRECIO UNIT.</th>
					      <th scope="col">TOTAL</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <th><input name="cantidad" type="text" class="form-control" ></th>
					      <td><input name="codigo" type="text" class="form-control" ></td>
					      <td><input type="text" name="descripcion" class="form-control" ></td>
					      <td><input type="text" name="precio_unit" class="form-control" ></td>
					      <td><input name="total" type="text" class="form-control" ></td>
					    </tr>
					    <tr>
					      <th><input type="text" class="form-control" name=""></th>
					      <td><input type="text" class="form-control" name=""></td>
					      <td><input type="text" class="form-control" name=""></td>
					      <td><input type="text" class="form-control" name=""></td>
					      <td><input type="text" class="form-control" name=""></td>
					    </tr>
					    <tr>
					      <th><input type="text" class="form-control" name=""></th>
					      <td><input type="text" class="form-control" name=""></td>
					      <td><input type="text" class="form-control" name=""></td>
					      <td><input type="text" class="form-control" name=""></td>
					      <td><input type="text" class="form-control" name=""></td>
					    </tr>
					  </tbody>
					</table>

				</div>
				<div class="row mb-3">
					<div class="col-4 align-self-center">
						<h4 class="">OBSERVACIONES</h4>
					</div>
					<div class="col-8">
						<input name="observaciones" type="text" class="form-control">
					</div>
				</div>
				<div class="row justify-content-around">
					<div class="col-4 text-center">
						<input name="fabrica" type="text" name="" class="form-control">
						<label >Ing. Fabrica</label>
					</div>
					<div class="col-4 text-center">
						<input name="recibido" type="text" name="" class="form-control">
						<label >Recibido</label>
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