@extends('layouts.nav')

@section('title', $datos->taller->nombre)
@section('content')

<h1 class="text-center  mt-5 text-danger"> {{ $datos->taller->nombre }}</h1>
<h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>

<form action="">
	<div class="container">
		<div class="row justify-content-center ">
			<div class="col-8">

			@foreach ($datos->tallerIdenTranOp as $enunciados)
				<div class="row mb-2">
					<div class="col-10">
						<p><span class="badge badge-danger p-1" >{{ ++$a }}</span > {{ $enunciados->enunciado }}</p>
					</div>
					<div class="col-2">
						<input type="text" name="enun[]" class="form-control">
					</div>
				</div>
			@endforeach
			</div>
		</div>
	</div>
</form>

@endsection