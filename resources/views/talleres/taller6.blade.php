@extends('layouts.master')

@section('title', 'Taller 6')
@section('contenido')


<h1 class="text-center  mt-5 text-danger"> Taller #6</h1>
     <h3 class="text-center mt-5 mb-3 text-info">SEÑALE  LA  ALTERNATIVA  CORRECTA</h3>

      <form action="{{ route('taller6') }}" method="POST">
      	@csrf
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="row bg-info p-2">
					<div class="col-4 align-self-center">
						<label for="">COMERCIO</label>
					</div>
					<div class="col-8">
						<div class="row">
							<div class="col-11">
								<label for="resp1" class="form-check-label mb-4">Es  una  actividad  económica  que  consiste  en intercambiar  bienes,  valores  y  servicios producidos  para  el  consumo. 
								</label>				
								<label for="resp2" class="form-check-label">Es  una  actividad  económica  que  consiste  en intercambiar  fuentes  de inversión producidas  para  la  venta.
								</label>
							</div>
							<div class="col-1 form-check">
								<input type="radio" id="resp1" value="Es  una  actividad  económica  que  consiste  en intercambiar  bienes,  valores  y  servicios producidos  para  el  consumo. " name="comercio" class="form-control mb-4">
								<input type="radio" id="resp2" value="Es  una  actividad  económica  que  consiste  en intercambiar  fuentes  de inversión producidas  para  la  venta." name="comercio" class="form-control">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-12">
				<div class="row bg-danger p-2">
					<div class="col-4 align-self-center">
						<label for="">SECTOR
PRODUCCIÓN</label>
					</div>
					<div class="col-8">
						<div class="row">
							<div class="col-11">
								<label for="resp1" class="form-check-label mb-4">Se encarga de vender  materia prima  en  el mercado
								</label>				
								<label for="resp2" class="form-check-label">Se encarga de transformar la materia prima en  producto  final.
								</label>
							</div>
							<div class="col-1 form-check">
								<input type="radio" id="resp3" name="sector_produccion" value="Se encarga de vender  materia prima  en  el mercado" class="form-control mb-2">
								<input type="radio" id="resp3" name="sector_produccion" value="Se encarga de transformar la materia prima en  producto  final." class="form-control">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<div class="row justify-content-center">
        		<input type="submit" value="Enviar Respuestas" class="btn p-2 mt-3 btn-danger">
    		 </div>
	</div>

	</div>
</form>
@endsection