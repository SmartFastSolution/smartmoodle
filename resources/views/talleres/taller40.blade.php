@extends('layouts.nav')

@section('title', $datos->taller->nombre)
@section('content')

<h1 class="text-center  mt-5 text-danger display-4 font-weight-bold"> {{ $datos->taller->nombre }}</h1>
<h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>


<form action="{{ route('taller40', ['idtaller' => $d]) }}" method="POST">
           @csrf
	<div class="container">
		<div class="row justify-content-center ">
			<div class="col-8">

			@foreach ($datos->tallerIdenTranOp as $enunciados)
				<div class="row mb-2 p-3" style="box-shadow: 5px 5px 15px 0px  #479C91">
					<div class="col-10">
						<p style="font-size: 20px"><span class="badge badge-danger p-1" >{{ ++$a }}</span > {{ $enunciados->enunciado }}</p>
					</div>
					<div class="col-2">
						<input required type="text" name="respuestas[]" style="box-shadow: 5px 5px 15px 0px  #087980; background-color: #75E3F7" class="form-control text-center font-weight-bold">
					</div>
				</div>
			@endforeach
			</div>
		</div>
		<div class="row justify-content-center mb-3">
        	<input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
    	</div>
	</div>
</form>

@endsection
