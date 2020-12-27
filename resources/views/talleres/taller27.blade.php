@extends('layouts.nav')
@section('title', $datos->taller->nombre)
@section('content')

<!-- TALLER PARA ABREVIARURAS-->
	<h1 class="text-center  mt-5 text-danger font-weight-bold display-4">{{ $datos->taller->nombre }}</h1>
    <h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>

<form action="{{ route('taller27', ['idtaller' => $d]) }}" method="POST">
 @csrf
<div class="container">
	<div class="row">
		<div class="col-6">
			<div class="row">
				@foreach ($datos->abreviaturaImg as $dato)
					<div class="col-6 mb-3"><img class="img-fluid" width="250" style="box-shadow: 5px 5px 15px 0px  #27D5F4; border: outset;" src="{{ asset($dato->col_a) }}" alt=""></div>
					<div class="col-6 align-self-center"><input style="box-shadow: 5px 5px 15px 0px  #27F4AE; background-color: #9FC6E7" required type="text" name="col_a[]" class="form-control font-weight-bold"></div>
				@endforeach
			</div>
		</div>
		<div class="col-6">
			<div class="row">
				@foreach ($datos->abreviaturaImg as $dato)
					<div class="col-6 mb-3"><img class="img-fluid" width="250" style="box-shadow: 5px 5px 15px 0px  #27D5F4; border: outset;" src="{{ asset($dato->col_b) }}" alt=""></div>
					<div class="col-6 align-self-center"><input style="box-shadow: 5px 5px 15px 0px  #27F4AE; background-color: #9FC6E7" required type="text" name="col_b[]" class="form-control font-weight-bold"></div>
				@endforeach
			</div>
		</div>
	</div>
	<div class="row justify-content-center mb-3">
        <input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
     </div>
</div>	
</form>

@endsection
