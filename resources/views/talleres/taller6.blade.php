@extends('layouts.nav')
@section('title', 'Taller '.$datos->taller->id)
@section('content')
<!--TALLER IDENTIFICAR IMAGENES -->

<h1 class="text-center  mt-5 text-danger"> Taller {{ $datos->taller->id }}</h1>
     <h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>

<form action="{{ route('taller6',['idtaller' => $d]) }}" method="POST">
    @csrf	
    <div class="container">
		<div class="row justify-content-center">
			<div class="col-6">
				<div class="row justify-content-center">
					<div class="col-4">
						<img src="{{ asset($datos->img1) }}" width="100" alt="Imagen 1">
					</div>
					<div class="col-4 align-self-center" >
						<input type="checkbox" name="foto{{++$i}}" value="{{ $datos->img1 }}" n class="form-control">
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-4">
						<img src="{{ asset($datos->img2) }}" width="100" alt="Imagen 1">
					</div>
					<div class="col-4 align-self-center" >
						<input type="checkbox" name="foto{{++$i}}" value="{{ $datos->img2 }}" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="row justify-content-center">
					<div class="col-4">
						<img src="{{ asset($datos->img3) }}" width="100" alt="Imagen 1">
					</div>
					<div class="col-4 align-self-center" >
						<input type="checkbox" name="foto{{++$i}}" value="{{ $datos->img3 }}" class="form-control">
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-4">
						<img src="{{ asset($datos->img4) }}" width="100" alt="Imagen 1">
					</div>
					<div class="col-4 align-self-center" >
						<input type="checkbox" name="foto{{++$i}}" value="{{ $datos->img4 }}" class="form-control">
					</div>
				</div>
			</div>


			<div class="col-6">
				@if($datos->img5 != null)
					<div class="row justify-content-center">
					<div class="col-4">
						<img src="{{ asset($datos->img5) }}" width="100" alt="Imagen 1">
					</div>
					<div class="col-4 align-self-center" >
						<input type="checkbox" name="foto{{++$i}}" value="{{ $datos->img5 }}" class="form-control">
					</div>
				</div>
				@elseif($datos->img6 != null)
				<div class="row justify-content-center">
					<div class="col-4">
						<img src="{{ asset($datos->img6) }}" width="100" alt="Imagen 1">
					</div>
					<div class="col-4 align-self-center" >
						<input type="checkbox" name="foto{{++$i}}" value="{{ $datos->img6 }}" class="form-control">
					</div>
				</div>
			</div>
				@elseif($datos->img7 != null)
				<div class="col-6">
				<div class="row justify-content-center">
					<div class="col-4">
						<img src="{{ asset($datos->img7) }}" width="100" alt="Imagen 1">
					</div>
					<div class="col-4 align-self-center" >
						<input type="checkbox" name="foto{{++$i}}" value="{{ $datos->img7 }}" class="form-control">
					</div>
				</div>
				@elseif($datos->img8 != null)
				<div class="row justify-content-center">
					<div class="col-4">
						<img src="{{ asset($datos->img8) }}" width="100" alt="Imagen 1">
					</div>
					<div class="col-4 align-self-center" >
						<input type="checkbox" name="foto{{++$i}}" value="{{ $datos->img8 }}" class="form-control">
					</div>
				</div>
			</div>
				@elseif($datos->img9 != null)
				<div class="col-6">
				<div class="row justify-content-center">
					<div class="col-4">
						<img src="{{ asset($datos->img9) }}" width="100" alt="Imagen 1">
					</div>
					<div class="col-4 align-self-center" >
						<input type="checkbox" name="foto{{++$i}}" value="{{ $datos->img9 }}" class="form-control">
					</div>
				</div>
				@elseif($datos->img10 != null)
				<div class="row justify-content-center">
					<div class="col-4">
						<img src="{{ asset($datos->img10) }}" width="100" alt="Imagen 1">
					</div>
					<div class="col-4 align-self-center" >
						<input type="checkbox" name="foto{{++$i}}" value="{{ $datos->img10 }}" class="form-control">
					</div>
				</div>

				@endif
			</div>
		</div>
		 <div class="row justify-content-center">
        <input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
     </div>
	</div>


</form>


@endsection