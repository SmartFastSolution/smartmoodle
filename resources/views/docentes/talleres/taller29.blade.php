@extends('layouts.nav')

@section('title',  $datos->nombre )
@section('content')

	<h1 class="text-center  mt-5 text-danger"> {{ $datos->nombre }}</h1>
    <h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>

  <form action="{{ route('taller1.docente', ['idtaller' => $d]) }}" method="POST">
           @csrf
	<div class="container mb-4">
		<div class="row justify-content-center">
			<div class="card border border-danger mb-3" >
          <div class="card-header font-weight-bold" style="font-size: 25px;"> <h1 class="display-3">{{ $user->name }} Salazar</h1></div>
          <div class="card-body">
            <h2 class="font-weight-bold "><span class="badge badge-danger">#</span>{{ $datos->enunciado }}</h2>
            	<h5 class="text-muted">Las respuestas que estan en verde, estan correctas</h5>
            <div class="row justify-content-center">
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
						<p>Estimada <span class="@if ($datos->abreviatura1 == 'Cheque')
							badge badge-success @else badge badge-danger
						@endif">{{ $datos->abreviatura1 }}</span></p>
						
					</div>
					<div class="col-12 form-inline">
						<p class="text-justify">Es grato enviarle la <span class="@if ($datos->abreviatura2 == 'Cheque')
							badge badge-success @else badge badge-danger
						@endif">{{ $datos->abreviatura2 }}</span> o. 124 correspondiente  a cuatro  bultos  de mercaderías  que  hemos  enviado  por  vía terrestre, utilizando transportes ECUADOR, el 3 de Mayo del <span class="@if ($datos->abreviatura3 == 'Cheque')
							badge badge-success @else badge badge-danger
						@endif">{{ $datos->abreviatura3 }}</span> año</p>
					</div>
					<div class="col-12 form-inline">
						<p class="text-justify">
							Esta <span class="@if ($datos->abreviatura4 == 'Cheque')
							badge badge-success @else badge badge-danger
						@endif">{{ $datos->abreviatura4 }}</span> contiene <span class="@if ($datos->abreviatura5 == 'Cheque')
							badge badge-success @else badge badge-danger
						@endif">{{ $datos->abreviatura5 }}</span> con  las  características señaladas  por <span class="@if ($datos->abreviatura6 == 'Cheque')
							badge badge-success @else badge badge-danger
						@endif">{{ $datos->abreviatura6 }}</span> a  nuestra <span class="@if ($datos->abreviatura7 == 'Cheque')
							badge badge-success @else badge badge-danger
						@endif">{{ $datos->abreviatura7 }}</span>
						</p>
					</div>
					<div class="col-12 form-inline">
						<p class="text-justify">
							El  valor  de  la <span class="@if ($datos->abreviatura8 == 'Cheque')
							badge badge-success @else badge badge-danger
						@endif">{{ $datos->abreviatura8 }}</span> asciende  a  la  cantidad  de $ 8.500; la hemos cargado a su <span class="@if ($datos->abreviatura9 == 'Cheque')
							badge badge-success @else badge badge-danger
						@endif">{{ $datos->abreviatura9 }}</span> ogando nos envíe  un <span class="@if ($datos->abreviatura10 == 'Cheque')
							badge badge-success @else badge badge-danger
						@endif">{{ $datos->abreviatura10 }}</span> certificado  por  dicho  valor.
						</p>
					</div>
					<div class="col-12 form-inline">
						<p class="text-justify">
							De  no  ser  posible  esperamos  que  el  valor  de  la <span class="@if ($datos->abreviatura1 == 'Cheque')
							badge badge-success @else badge badge-danger
						@endif">{{ $datos->abreviatura11 }}</span> lo  deposite  en  nuestra <span class="@if ($datos->abreviatura11 == 'Cheque')
							badge badge-success @else badge badge-danger
						@endif">{{ $datos->abreviatura12 }}</span> del <span class="@if ($datos->abreviatura12 == 'Cheque')
							badge badge-success @else badge badge-danger
						@endif">{{ $datos->abreviatura13 }}</span> Produbanco  No. 40035873.
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
            <div class="row justify-content-center">
            <div class="col-5">
              <div class="form-group">
                <label for="exampleFormControlInput1">Calificacion</label>
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="text" class="form-control" name="calificacion" placeholder="Añada una nota al estudiante">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Retroalimentacion</label>
                <textarea class="form-control" name="retroalimentacion" rows="3" placeholder="Agregue una retroalimentacion"></textarea>
              </div>   
               <div class="row justify-content-center mb-5">
                <input type="submit" value="Calificar" class="btn p-2 mt-3 btn-danger">
             </div>
            </div>
        </div>
        </div>
		</div>
	</div>
</form>
@endsection