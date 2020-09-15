@extends('layouts.master')

@section('title', 'Taller 20')
@section('contenido')

	<h1 class="text-center  mt-5 text-danger"> Taller #20</h1>
    <h3 class="text-center mt-5 mb-3 text-info">LENE  CON  LOS  SIGUIENTES  DATOS  LOS  CERTIFICADOS DE DEPÓSITO 
ADECUADAMENTE</h3>

<form action="">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-6">
				 <img class="img-fluid" src="{{ asset('img/talleres/imagen-17.jpg') }}" alt="">
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
									<p class="col-form-label" for="">Valor incial <input type="text" class="form-control"></p> 
								</div>
								<div class="col-6 form-inline" >
									<p class="col-form-label" for="">CARACTER <input type="text" class="form-control">
<h6 class="text-center">(Nominativa o a la orden )</h6>
									</p>
									
								</div>
							</div>
							<div class="row">
								<p class="form-inline text-justify">En  virtud  de  la  Facultad  contenida  en  el  numeral  séptimo  del  artículo  215  de  la  Ley  General  de Banco,  el  BANCO DE MACHALA,  emite  el  presente  Certificado  de  Depósito  y  reconoce  que  pagará contra presentacion de este titulo a <input type="text" class="form-control m-1" size="60">, cantidad de: <input type="text" class="form-control m-1"> Dolares en el plazo de <input type="text" class="form-control m-1" size="3"> dias, a partir de <input type="date" size="10" class="form-control m-1"> hasta el <input type="date" size="10" class="form-control m-1"> reconocimiento el interes actual del <input type="text" class="form-control m-1" size="3" name=""> que  será  pagadero  en <input type="text" class="form-control m-1" size="2"> dias
								</p>
								<p class="text-justify">El  Banco de Machala  declara  que  éste  Certificado de  Depósito  no es renovable  y  que dejará  de ganar  interés desde  la  fecha  de  su  vencimiento.
								El  propietario  de  este título  acepta  las condiciones estipuladas y se somete a lo  dispuesto  en  la  Ley General  de  Bancos  y  a  la  Resolución  No.  90-020  de la Superintendencia  de  Bancos  y  sus posteriores  modificatorias.</p>
							</div>
							<div class="row justify-content-end">
								<div class="col-8 text-center">
									<input type="text" class="form-control">
									<h6 for="">Lugar y fecha de emision</h6>
								</div>
							</div>
							<div class="row justify-content-between">
								<div class="col-5 text-center">
									<input type="text" class="form-control" name="">
									<h6>FIRMA AUTORIZADA</h6>
								</div>
								<div class="col-5 text-center">
									<input type="text" class="form-control" name="">
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