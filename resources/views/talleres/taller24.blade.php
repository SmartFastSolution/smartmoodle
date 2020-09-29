@extends('layouts.nav')

@section('title', $datos->taller->nombre)
@section('content')

<!-- LLENE  CON  LOS  SIGUIENTES  DATOS  LA  ORDEN  DE  PAGO CORRECTAMENTE. -->
	<h1 class="text-center  mt-5 text-danger">{{ $datos->taller->nombre }}</h1>
    <h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>


     <form action="{{ route('taller24', ['idtaller' => $d]) }}" method="POST">
          @csrf
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-7">
				<h3 class="text-center">Datos</h3>
				<table class="table table-borderless">
				  <tbody>
				    <tr>
				      <td><label>Nombre del beneficiario :</label></td>
				      <td><label>Lugar y fecha :</label></td>
				      <td><label>Tipo y Numero de comprobante :</label></td>
				      <td><label>Cantidad :</label></td>
						<td><label>Firmas :</label></td>
				    </tr>

				    <tr>
				      <td>{{ $datos->beneficiario }}</td>
				      <td>{{ $datos->lugar }}, {{ $datos->fecha }}</td>
				      <td>{{ $datos->comprobante }}</td>
				      <td>${{ $datos->detalle }}</td>
				      <td>{{ $datos->firmas }}</td>
				    </tr>
				  </tbody>
				</table>				
			</div>
			<div class="col-10 border border-danger">
				<div class="row justify-content-center">
					<div class="col-10">
						<div class="row">
							<div class="col-8">
								<div class="row">
									<div class="col-4 align-self-center">
										<img class="img-fluid float-right" src="{{ asset('img/talleres/imagen-25.jpg') }}" alt="">
									</div>
									<div class="col-8">
										<h2>MIKEY  S.A.</h2>
										<h5>RUC. 1200548769001</h5>
										<h5>Tlfs: 2306168   2431129</h5>
										<h5>Casilla No 1840</h5>
									</div>
								</div>
							</div>
							<div class="col-4 align-self-center">
								<h1 class="text-center">ORDEN DE  PAGO</h1>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-3">
								<label for="">Señor (es)</label>
							</div>
							<div class="col-9">
								<input type="text" name="señor" class="form-control">
							</div>
						</div>

							<div class="row mb-3">
							<div class="col-3">
								<label for="">Fecha</label>
							</div>
							<div class="col-9">
								<input type="date" name="fecha" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-12 text-center">
								<h1>DATOS DE LA FACTURA</h1>
							</div>
						</div>

						<div class="row border border-danger mb-4">
							<table class="table table-bordered">
							  <thead >
							    <tr align="center" >
							      <th colspan="3">COMPROBANTES</th>
							      <th scope="col" style="vertical-align: middle;" rowspan="2">DEBE</th>
							      <th scope="col" style="vertical-align: middle;" rowspan="2">HABER</th>
							      <th scope="col"style="vertical-align: middle;"  rowspan="2">SALDO</th>
							    </tr>
							    <tr align="center">
								    <th>FECHA</th>
								    <th>NUMERO</th>
								    <th>TIPO</th>
							    </tr>
							  </thead>
							  <tbody>
							<tr>
								<td><input type="date" name="fecha_c" class="form-control"></td>
								<td><input type="text" name="numero" class="form-control"></td>
								<td><input type="text" name="tipo" class="form-control"></td>
								<td><input type="text" name="debe" class="form-control"></td>
								<td><input type="text" name="haber" class="form-control"></td>
								<td><input type="text" name="saldo" class="form-control"></td>
							</tr>
							  </tbody>
							</table>

						</div>
						<div class="row border border-danger mb-4">
							<table class="table table-bordered">
							  <thead >
							  	<tr align="center">
							  		<th >
							  			<h5>REVISADO</h5>
							  		</th>
							  		<th>
							  			<h5>AUTORIZADO</h5>
							  		</th>
							  		<th>
							  			<h5>VTO. BNO.</h5>
							  		</th>
							  	</tr>
							  </thead>
							  <tbody>
							  	<tr>
							  		<td><input type="text" name="revisado" class="form-control"></td>
							  		<td><input type="text"  name="autorizado"class="form-control"></td>
							  		<td><input type="text" name="vto_bueno" class="form-control"></td>
							  	</tr>
							  </tbody>

							</table>
						</div>
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