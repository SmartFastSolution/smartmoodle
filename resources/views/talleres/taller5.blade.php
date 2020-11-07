@extends('layouts.nav')

@section('title', $datos->taller->nombre)
@section('content')

<!--SEÑALE  LA  ALTERNATIVA  CORRECTA -->
<h1 class="text-center  mt-5 text-danger"> {{ $datos->taller->nombre }}</h1>
     <h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>
      <form action="{{ route('taller5', ['idtaller' => $d]) }}" method="POST">
      	@csrf
	<div class="container">
		<div class="row">
			@foreach ($datos->options as $key => $info)
			<div class="col-12">
				<div class="row bg-info border border-danger p-2">
					<div class="col-4 align-self-center">
						<label for="">{{ $info->concepto }} </label>
					</div>
					<div class="col-8">
						<div class="row">
							<div class="col-11">
								<label for="resp" class="form-check-label mb-4">{{ $info->alternativa1 }} 
								</label> <br>				
								<label for="resp2" class="form-check-label">{{ $info->alternativa2 }}
								</label>
							</div>
							<div class="col-1 form-check">
								<input type="radio" id="resp1" value="{{$info->alternativa1 }}" name="respuesta[{{ $key }}]" class="form-control mb-4">
								<input type="radio" id="resp2" value="{{$info->alternativa2 }}" name="respuesta[{{ $key }}]" class="form-control">
							</div>
						</div>
					</div>
				</div>
			</div>
				@endforeach
	</div>

		<div class="row justify-content-center">
        			<input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
    		 	</div>

	</div>
</form>
@endsection