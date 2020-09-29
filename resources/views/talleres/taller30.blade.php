@extends('layouts.nav')

@section('title', 'Taller 31')
@section('contenido')

	<h1 class="text-center  mt-5 text-danger"> Taller #31</h1>
    <h3 class="text-center mt-5 mb-3 text-info">UTILIZA  LAS  ABREVIATURAS  COMERCIALES  EN   LA  CARTA, 
CORRECTAMENTE.</h3>

<form action="">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-8 border border-danger p-3">
				<ul class="nav justify-content-center">
					<li draggable="true" ondragstart="event.dataTransfer.setData('text/plain', 'Cheque')" class="nav-item mr-4">Cheque</li>
					<li draggable="true" ondragstart="event.dataTransfer.setData('text/plain', 'Cuenta')" class="nav-item mr-4">Cuenta</li>
					<li draggable="true" ondragstart="event.dataTransfer.setData('text/plain', 'Factura')" class="nav-item mr-4">Factura</li>
					<li draggable="true" ondragstart="event.dataTransfer.setData('text/plain', 'Artículos')" class="nav-item mr-4">Artículos</li>
					<li draggable="true" ondragstart="event.dataTransfer.setData('text/plain', 'Doctora')" class="nav-item mr-4">Doctora</li>
					<li draggable="true" ondragstart="event.dataTransfer.setData('text/plain', 'Factura')" class="nav-item mr-4">Factura</li>
					<li draggable="true" ondragstart="event.dataTransfer.setData('text/plain', 'Presente')" class="nav-item mr-4">Presente</li>
					<li draggable="true" ondragstart="event.dataTransfer.setData('text/plain', 'Economista')" class="nav-item mr-4">Economista</li>
					<li draggable="true" ondragstart="event.dataTransfer.setData('text/plain', 'Factura')" class="nav-item mr-4">Factura</li>
					<li draggable="true" ondragstart="event.dataTransfer.setData('text/plain', 'Cuenta corriente')" class="nav-item mr-4">Cuenta corriente</li>
					<li draggable="true" ondragstart="event.dataTransfer.setData('text/plain', 'Ustedes')" class="nav-item mr-4">Ustedes</li>
					<li draggable="true" ondragstart="event.dataTransfer.setData('text/plain', 'Banco')" class="nav-item mr-4">Banco</li>
				  <li draggable="true" ondragstart="event.dataTransfer.setData('text/plain', 'Remesa')" class="nav-item mr-4">
				    Remesa
				  </li>
				  <li draggable="true" ondragstart="event.dataTransfer.setData('text/plain', 'Compañía')" class="nav-item mr-4">
				    Compañía
				  </li>
				</ul>
				
			</div>
			<div class="col-7 border border-danger mt-3">
				<div class="row p-2">
					<div class="col-4">
						<img class="img-fluid" src="{{ asset('img/talleres/imagen-29.jpg') }}" alt="">
					</div>
					<div class="col-5 text-center">
						<h1 class="text-danger"><strong>COMUNICADO</strong></h1>
						<h5>“IMPORTADORA GARY S.A.”</h5>
						<h5>TELF: 2415287 - 2425689</h5>
					</div>
					<div class="col-6">
						<p>Guayaquil, 25 de Octubre del 201</p>
						<p>
							Doctora  <br>
							Carolina Robles <br>
							Gerente de "COMERCIAL XAVI” <br>
							Ciudad.
						</p>
					</div>
					<div class="col-12 form-inline">
						<p>Estimada <input type="text"  class="form-control"></p>
						
					</div>
					<div class="col-12 form-inline">
						<p class="text-justify">Es grato enviarle la <input type="text"  class="form-control"> o. 124 correspondiente  a cuatro  bultos  de mercaderías  que  hemos  enviado  por  vía terrestre, utilizando transportes ECUADOR, el 3 de Mayo del <input type="text"  class="form-control" size="5"> año</p>
					</div>

					<div class="col-12 form-inline">
						<p class="text-justify">
							Esta <input type="text"  class="form-control"> contiene <input type="text"  class="form-control m-1" size="7"> con  las  características señaladas  por <input type="text"  class="form-control m-1" size="7"> a  nuestra <input type="text"  class="form-control m-1" size="7">
						</p>
					</div>
					<div class="col-12 form-inline">
						<p class="text-justify">
							El  valor  de  la <input type="text"  class="form-control m-1" size="7"> asciende  a  la  cantidad  de $ 8.500; la hemos cargado a su <input type="text"  class="form-control m-1" size="7"> ogando nos envíe  un <input type="text"  class="form-control m-1" size="4"> certificado  por  dicho  valor.
						</p>
					</div>
					<div class="col-12 form-inline">
						<p class="text-justify">
							De  no  ser  posible  esperamos  que  el  valor  de  la <input type="text"  class="form-control m-1" size="7"> lo  deposite  en  nuestra <input type="text"  class="form-control m-1" size="7"> del <input type="text"  class="form-control m-1" size="7"> Produbanco  No. 40035873.
						</p>
					</div>
					<div class="col-12">
						<p class="text-justify">
							Sin  otro  particular  por  el  momento  aprovechamos  la oportunidad  para  reiterarles  nuestras  consideraciones  y aprecio.
						</p>
					</div>
					<div class="col-5 text-center">
						<h4>Cordialmente,</h4>
						<p>Diana  Flores <br>
						Gerente General</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection