@extends('layouts.nav')


@section('title', 'Taller 12')
@section('content')

<h1 class="text-center  mt-5 text-danger"> {{ $datos->taller->nombre }}</h1>
     <h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>

<form action="{{ route('taller11', ['idtaller' => $d]) }}" method="POST">
    @csrf
	<div class="container">
		<div class="row justify-content-center">

			<div class="col-4">
				<div class="mb-5">
					<label class="form-control-label"><span class="badge-danger badge-pill">A.</span> {{ $datos->enunciado1 }} </label><br>
					<img width="300" src="{{ asset($datos->img1) }}"><br><br>
				</div>

				<div>
					<label class="form-control-label"><span class="badge-danger badge-pill">B.</span> {{ $datos->enunciado2 }} </label><br>
					<img width="300" src="{{ asset($datos->img2) }}"><br><br>
				</div>
					
			</div>

			<div class="col-6">
				@foreach ($datos->relacionar2Options as $element)
				<div class="row">
					<div class="col-10">
						<li class="list-inline mb-4">{{ $element->definicion }}</li>
					</div>
					<div class="col-2">
						<input type="text" required class="text-center" size="2" name="letra[]">
					</div>
				</div>
			@endforeach
			</div>
		</div>
		 <div class="row justify-content-center">
              <input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
          </div>

	</div>

</form>

@endsection
