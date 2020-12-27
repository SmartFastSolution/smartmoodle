@extends('layouts.nav')


@section('title',  $datos->taller->nombre )
@section('content')

<!-- IDENTIFIQUE  LAS  PERSONAS  QUE  INTERVIENEN  EN  EL  CHEQUE,  CON CERTEZA -->
<h1 class="text-center  mt-5 text-danger">{{ $datos->taller->nombre }}</h1>
     <h3 class="text-center mt-5 mb-3 text-info"> {{ $datos->enunciado }} </h3>
<form action="{{ route('taller14', ['idtaller' => $d]) }}" method="POST">
 @csrf
<div class="container p-2" style="box-shadow: 5px 5px 15px 0px  #EB5389">
	<div class="row justify-content-center" >
		<div class="col-8">
			<p class="text-justify font-italic" style="font-size: 20px">{{ $datos->descripcion }} </p>		
		</div>
	</div>

	<div class="row justify-content-center">
		<div class="col-7">
			<div class="row">
				<div class="col-2">
					<label class="mb-4 form-control-label" for="">Girador</label>
					<label class="mb-4 form-control-label" for="">Girado</label>
					<label class="mb-4 form-control-label" for="">Beneficiario</label>
				</div>
				<div class="col-8">
					<input required type="text" name="girador" class="form-control mb-2 border-left-0 border-right-0 border-top-0 border-bottom border-success">
					<input required type="text" name="girado" class="form-control mb-2 border-left-0 border-right-0 border-top-0 border-bottom border-success">
					<input required type="text" name="beneficiario" class="form-control mb-2 border-left-0 border-right-0 border-top-0 border-bottom border-success">
				</div>
			</div>
		
		</div>
	</div>
	 <div class="row justify-content-center">
        <input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
     </div>
</div>

</form>
@endsection
