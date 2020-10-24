@extends('layouts.nav')


@section('title', $datos->taller->nombre)
@section('content')

<!-- LLENE  CON  LOS  SIGUIENTES  DATOS  EL  PAGARÉ  CORRECTAMENTE -->
	<h1 class="text-center  mt-5 text-danger">{{ $datos->taller->nombre }}</h1>
    <h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }} </h3>

<form action="{{ route('taller20', ['idtaller' => $d]) }}" method="POST">
	@csrf
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-10 align-self-center">
    				<h3 class="text-center">Datos</h3>
					<div class="row">
						<div class="col-6">
							<label>Beneficiario : </label> 
							<span draggable="true" ondragstart="event.dataTransfer.setData('text/plain', '{{ $datos->beneficiario }}')" ondragend="this.classList.add('text-muted');">
								{{ $datos->beneficiario }}
							</span>
							<br>
							<label>Deudor :  </label> 
								<span draggable="true" ondragstart="event.dataTransfer.setData('text/plain', '{{ $datos->deudor }}')" ondragend="this.classList.add('text-muted');">
									{{ $datos->deudor }}
								</span>
							<br>
					 		<label>Garante :</label>
					 		<span draggable="true" ondragstart="event.dataTransfer.setData('text/plain', '{{ $datos->garante }}')" ondragend="this.classList.add('text-muted');">
								{{ $datos->garante }}
							</span>
						</div>					
						<div class="col-6">
							<label>Valor :</label> 
							<span draggable="true" ondragstart="event.dataTransfer.setData('text/plain', '{{ $datos->valor }}')" ondragend="this.classList.add('text-muted');">
								{{ $datos->beneficiario }}
							</span>
							${{ $datos->valor }}<br>
							<label>Plazo de Pago :</label> 
							<span draggable="true" ondragstart="event.dataTransfer.setData('text/plain', '{{ $datos->plazo_pago }}')" ondragend="this.classList.add('text-muted');">
								{{ $datos->plazo_pago }}
							</span><br>
					 		<label>Taza de interes :</label> 
					 		<span draggable="true" ondragstart="event.dataTransfer.setData('text/plain', '{{ $datos->tasa_interes }}')" ondragend="this.classList.add('text-muted');">
								{{ $datos->tasa_interes}}%
							</span>
						</div>
						<div class="col-12">
							<label>Lugar y fecha de emision :</label>
							<span draggable="true" ondragstart="event.dataTransfer.setData('text/plain', '{{ $datos->lugar }}, {{ $datos->fecha_emision }}')" ondragend="this.classList.add('text-muted');">
								{{ $datos->lugar }}, {{ $datos->fecha_emision }}
							</span>
							 <br>
							<label>Fecha de vencimiento :</label> 
							<span draggable="true" ondragstart="event.dataTransfer.setData('text/plain', '{{ $datos->fecha_de_vencimiento }}')" ondragend="this.classList.add('text-muted');">
								{{ $datos->fecha_de_vencimiento }}
							</span>
							<br>
						</div>
					</div>
				</div>
				<div class="col-10 border border-warning">
					<div class="row justify-content-center">
						<div class="col-10 p-2  ">
							<div class="row justify-content-center">
								<div class="col-4">
									<img class="img-fluid" src="{{ asset('img/talleres/imagen-19.jpg') }}" alt="">
								</div>
							</div>
							<div class="row justify-content-around">
								<div class="col-5">
									<span class="border border-right-0 border-left-0 border-success">No. 1</span>
								</div>
								<div class="col-4 form-inline">
									<label for="">Por $<input required   name="cantidad" type="text" class="form-control"></label>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<p class="form-inline text-justify">
										Deb <input required   name="resp1" type="text" class="form-control m-1" size="1"> y pagar <input required   name="resp2" type="text" class="form-control m-1" size="2"> de la fecha en <input required   name="resp3" type="text" class="form-control m-1" size="5"> fijos en esta ciudad o en el lugar en que<input required   name="resp4" type="text" class="form-control m-1" size="5"> reconvenga a la orden de <input required   name="resp5" type="text" class="form-control m-1" size="60"> la cantidad de <input required   name="resp6" type="text" class="form-control m-1" size="60"> por igual valor que ten <input required   type="text" name="resp7" class="form-control m-1" size="1"> recibido, en calidad de préstamo y en dinero efectivo para destinarlo a negocios de comercio; esta cantidad  <input required   type="text" name="resp8" class="form-control m-1" size="1"> obli <input required   type="text" name="resp8" class="form-control m-1" size="1">a devolveria al vencimiento del plazo expresado, enmonedas de este curso legal.
									</p>
									<p class="form-inline text-justify">
										Tambien <input required   type="text" name="resp9" class="form-control m-1" size="1"> oblig <input required   type="text" name="resp10" class="form-control m-1" size="1"> a pagar el interes del <input required   type="text" name="resp11" class="form-control m-1" size="1"> por ciento anual desde el vencimiento hasta la completa cancelacion y en el caso de mora, a pagar todos los gastos judiciales y extrajudiciales que ocasione el cobro, bastando para terminar el montode tales gastos la sola afirmacion del agreedor.</p>
									<p class="form-inline text-justify">

										Al fiel cumplimiento de lo acordado <input required   type="text" name="resp12" class="form-control m-1" size="1"> oblig <input required   type="text" name="resp13" class="form-control m-1" size="1"> con todos v bienes presentes y futuros, y ademas, renunci<input required   type="text" name="resp14" class="form-control m-1" size="1"> domicilio y toda ley o excepcion que pudiera favorecer <input required   type="text" name="resp15" class="form-control m-1" size="1"> en jucio o fuera de el.
									</p>
									<p class="form-inline text-justify">

										Renuncia <input required   type="text" name="resp16" class="form-control m-1" size="1"> tambien al derecho de interponer el recurso de apelacion y el de hecho de las providencias que se expidieron en el juicio a que diere lugar, estipul <input required   type="text" name="resp17" class="form-control m-1" size="1"> expresamente que el tenedor no podra ser obligado a recibir el pago por partes ni aun por <input required   type="text" name="resp18" class="form-control m-1" size="1"> herederos o sucesores, sin protesto
									</p>
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<label for="">Ciudad</label><input required   class="form-control" name="resp19" type="text">
								</div>
								<div class="col-6">
									<label for="">Fecha Vencimiento</label><input required   class="form-control" name="resp20" type="text">
									
								</div>
							
							</div>
						</div>
					</div>
				</div>
    		</div>
    		<div class="row justify-content-center">
        	<input required   type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
    	</div>
    	</div>
    </form>

@endsection