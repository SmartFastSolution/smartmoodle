@extends('layouts.nav')

@section('title', $datos->taller->nombre)
@section('content')
<!-- LLENE  CON  LOS  SIGUIENTES  DATOS  LOS  CERTIFICADOS DE DEPÓSITO 
ADECUADAMENTE -->
	<h1 class="text-center  mt-5 text-danger">{{ $datos->taller->nombre }}</h1>
    <h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }} </h3>

<form action="{{ route('taller19', ['idtaller' => $d]) }}" method="POST">
	@csrf
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-10 align-content-center">
				<h3 class="text-center">Datos</h3>
					<div class="row">
						<div class="col-6">
							<label>Valor :  </label> {{ $datos->valor }}  <br>
							<label>Beneficiario : </label> {{ $datos->beneficiario }}  <br>
					 		<label>Interes Anual :</label> {{ $datos->interes_anual }} 
						</div>					
						<div class="col-6">
							<label>Lugar y Fecha de Emision :</label> {{ $datos->lugar }}, {{ $datos->fecha_de_emision }}
							<label>Plazo Vencimiento :</label> {{ $datos->plazo_de_vencimiento }} <br>
					 		<label>Fecha de  Vencimiento :</label> {{ $datos->fecha_de_vencimiento }}
						</div>
					</div>
			</div>
			<div class="col-10 border border-warning">
				<div class="row justify-content-center">
						<div class="col-10 p-2  ">
							<div class="row">
								<div class="col-4">
									<h2>NO 017</h2>
								</div>
								<div class="col-4 text-center mt-2">
								<strong><h5 class="text-danger">CERTIFICADO DE DEPOSITO</h5></strong>	
								</div>
								<div class="col-4">
									<h5>BANCO DE MACHALA</h5>
								</div>
							</div>
							<div class="row p-1">
								<div class="col-6 form-inline">
									<p class="col-form-label" for="">Valor incial <input type="text" name="valor_inicial" class="form-control"></p> 
								</div>
								<div class="col-6 form-inline" >
									<p class="col-form-label" for="">CARACTER <input type="text" class="form-control" name="caracter">
										<h6 class="text-center">(Nominativa o a la orden )</h6>
									</p>
									
								</div>
							</div>
							<div class="row">
								<p class="form-inline text-justify">En  virtud  de  la  Facultad  contenida  en  el  numeral  séptimo  del  artículo  215  de  la  Ley  General  de Banco,  el  BANCO DE MACHALA,  emite  el  presente  Certificado  de  Depósito  y  reconoce  que  pagará contra presentacion de este titulo a <input type="text" name="beneficiario" class="form-control m-1" size="60">, cantidad de: <input type="text" name="cantidad" class="form-control m-1"> Dolares en el plazo de <input type="text" name="plazo" class="form-control m-1" size="3"> dias, a partir de <input type="date" size="10" name="fecha_de_emision" class="form-control m-1"> hasta el <input type="date" name="fecha_de_vencimiento" size="10" class="form-control m-1"> reconocimiento el interes actual del <input type="text" name="interes_anual" class="form-control m-1" size="3" name=""> que  será  pagadero  en <input name="plazo_de_vencimiento" type="text" class="form-control m-1" size="2"> dias
								</p>
								<p class="text-justify">El  Banco de Machala  declara  que  éste  Certificado de  Depósito  no es renovable  y  que dejará  de ganar  interés desde  la  fecha  de  su  vencimiento.
								El  propietario  de  este título  acepta  las condiciones estipuladas y se somete a lo  dispuesto  en  la  Ley General  de  Bancos  y  a  la  Resolución  No.  90-020  de la Superintendencia  de  Bancos  y  sus posteriores  modificatorias.</p>
							</div>
							<div class="row justify-content-end">
								<div class="col-8 text-center">
									<input type="text" name="lugar_fecha_emision" class="form-control">
									<h6 for="">Lugar y fecha de emision</h6>
								</div>
							</div>
							<div class="row justify-content-between">
								<div class="col-5 text-center">
									<input type="text" value="ING. JUAN PEREZ" disabled="" class="form-control" name="">
									<h6>FIRMA AUTORIZADA</h6>
								</div>
								<div class="col-5 text-center">
									<input type="text" value="ING. JUAN PEREZ" disabled="" class="form-control" name="">
									<h6>FIRMA AUTORIZADA</h6>
								</div>
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