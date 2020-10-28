@extends('layouts.nav')

@section('title', $datos->nombre)
@section('content')

	<h1 class="text-center  mt-5 text-danger">{{ $datos->nombre }}</h1>
    <h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>

   <form action="{{ route('taller28',  ['idtaller' => $d]) }}" method="POST">
           @csrf
	<div class="container mb-3">
		<div class="row justify-content-center">
			<div class="col-8 border border-danger p-3">
				<div class="row justify-content-end">
					<div  class="col-6 mt-3">
						<h4 draggable="true">Señor  Ingeniero.</h4>
						<h3>Sergio  Castro  Montero.</h3>
						<h4>GERENTE  DE  “DINAMO”.</h4>
						<h5>Ciudad.</h5>
						<h5>Estimado <strong>Señor</strong> </h5>
					</div>
					<div class="col-6">
						<h4>Guayaquil,  15  de  Julio  del  2019</h4>
					</div>
				</div
>				<div class="row">
					<div class="col-12">
						<p class="text-justify" style="font-size: 16px;">La  presente  tiene  por  objeto  saludarlo  y  a  la  vez  solicitarle  me envíe  la  <strong>cuenta</strong>  de  los  pedidos  según  <strong>Factura  número</strong>   1830 correspondiente  al <strong>presente</strong>    mes,  con  el  detalle  de  cada  uno  de los <strong>artículos</strong> artículos  entregados.  La  <strong>Factura</strong>   contiene  15  cocinas,  con las  características  ya  señaladas.    El  valor  de  la <strong>Factura</strong>    asciende  a  la  cantidad  de  $ 4.800  dicho  valor  será  depositado en  su <strong>cuenta  corriente </strong> </p>
						<p class="text-justify" style="font-size: 16px;">Nos  despedimos  de <strong> usted </strong> no  sin  antes  reiterarle  nuestra consideración  y  estima</p>
					</div>

				</div>
				<div class="row ">
					<div class="col-12 text-center">
						<h2>Cordialmente</h2>
						<h5>Ingeniero  David  Reinoso</h5>
						<h3>GERENTE  ADMINISTRATIVO</h3>
					</div>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-8">
						<h3 class="mt-3">Convertir</h3>
			</div>
		</div>


		<div class="row justify-content-center">
			<div class="col-8 border border-danger p-3">
				<div class="row justify-content-end">
					<div class="col-6 mt-3">
						<h4>Señor  Ingeniero.</h4>
						<h3>Sergio  Castro  Montero.</h3>
						<h4>GERENTE  DE  “DINAMO”.</h4>
						<h5>Ciudad.</h5>
						<h5>Estimado <strong>Señor</strong> </h5>
					</div>
					<div class="col-6">
						<h4>Guayaquil,  15  de  Julio  del  2019</h4>
					</div>
				</div>
				<div class="row">
					<div class="col-12 form-inline">
						<p class="text-justify" style="font-size: 16px;">La  presente  tiene  por  objeto  saludarlo  y  a  la  vez  solicitarle  me envíe  la  <input type="text" class="form-control m-1" size="5" name="abreviatura1">  de  los  pedidos  según  <input type="text" class="form-control m-1" size="5" name="abreviatura2">   1830 correspondiente  al <input type="text" class="form-control m-1" size="5" name="abreviatura3">    mes,  con  el  detalle  de  cada  uno  de los <input type="text" class="form-control m-1" size="5" name="abreviatura4"> artículos  entregados.  La  <input type="text" class="form-control m-1" size="5" name="abreviatura5">   contiene  15  cocinas,  con las  características  ya  señaladas.    El  valor  de  la <input type="text" class="form-control m-1" size="5" name="abreviatura6">    asciende  a  la  cantidad  de  $ 4.800  dicho  valor  será  depositado en  su <input type="text" class="form-control m-1" size="5" name="abreviatura7"> </p>
						<p class="text-justify" style="font-size: 16px;">Nos  despedimos  de <input type="text" class="form-control m-1" size="5" name="abreviatura8"> no  sin  antes  reiterarle  nuestra consideración  y  estima</p>
					</div>

				</div>
				<div class="row ">
					<div class="col-12 text-center">
						<h2>Cordialmente</h2>
						<h5>Ingeniero  David  Reinoso</h5>
						<h3>GERENTE  ADMINISTRATIVO</h3>
					</div>
				</div>
			</div>
		</div>
		 <div class="row justify-content-center">
        	<input type="submit" value="Guardar Datos" class="btn p-2 mt-3 btn-danger">
    	</div>
	</div>
</form>

@endsection