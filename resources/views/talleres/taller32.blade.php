@extends('layouts.nav')

@section('title', $datos->nombre)
@section('content')

<h1 class="text-center  mt-5 text-danger"> {{ $datos->nombre }}</h1>
<h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>
 <form action="{{ route('taller32', ['idtaller' => $d]) }}" method="POST">
           @csrf
	<div class="container">
		<div class="row ">
			<div class="col-2 gusano1"> <div class=" text-center border bg-light p-4 rounded-circle">
				<h6>Abreviaturas
				5
				Económicas
				con la letra
				I</h6>
			</div></div>
			<div class="col-2 gusano2"><textarea  name="abreviaturaI1" class="form-control  p-4 rounded-circle text-center align-text-bottom"></textarea></div>
			<div class="col-2 gusano3"><textarea name="abreviaturaI2"  class="form-control  p-4 rounded-circle text-center align-text-bottom"></textarea></div>
			<div class="col-2 gusano4"><textarea name="abreviaturaI3"  class="form-control p-4  rounded-circle text-center align-text-bottom"></textarea></div>
			<div class="col-2 gusano5"><textarea name="abreviaturaI4"  class="form-control  p-4 rounded-circle text-center align-text-bottom"></textarea></div>
			<div class="col-2 gusano6"><textarea name="abreviaturaI5"  class="form-control  p-4 rounded-circle text-center align-text-bottom"></textarea></div>
		
		</div>
		<div class="row ">
			<div class="col-2 gusano7"><textarea  name="abreviaturaC1" class="form-control  p-4 rounded-circle text-center align-text-bottom"></textarea> </div>
			<div class="col-2 gusano8"><textarea name="abreviaturaC2"  class="form-control  p-4 rounded-circle text-center align-text-bottom"></textarea></div>
			<div class="col-2 gusano9"><textarea name="abreviaturaC3"  class="form-control  p-4 rounded-circle text-center align-text-bottom"></textarea></div>
			<div class="col-2 gusano10"><textarea name="abreviaturaC4"  class="form-control p-4  rounded-circle text-center align-text-bottom"></textarea></div>
			<div class="col-2 gusano11"><textarea name="abreviaturaC5"  class="form-control p-4  rounded-circle text-center align-text-bottom"></textarea></div>
			<div class="col-2 gusano12">
				<div class=" text-center border bg-light p-4 rounded-circle">
				<h6>
				Abreviaturas
				Económicas
				5
				con la letra
				C</h6>
			</div>

				</div>
		</div>
			<div class="row ">
			<div class="col-2 gusano13"> <div class=" text-center border bg-light p-4 rounded-circle">
				<h6>
				Abreviaturas
				Económicas
				con la letra
				R</h6>
			</div></div>
			<div class="col-2 gusano14"><textarea name="abreviaturaR1"  class="form-control p-4  rounded-circle text-center align-text-bottom"></textarea></div>
			<div class="col-2 gusano15"><textarea name="abreviaturaR2"  class="form-control  p-4 rounded-circle text-center align-text-bottom"></textarea></div>
			<div class="col-2 gusano16"><textarea name="abreviaturaR3"  class="form-control  p-4 rounded-circle text-center align-text-bottom"></textarea></div>
			<div class="col-2 gusano17"><textarea name="abreviaturaR4"  class="form-control p-4  rounded-circle text-center align-text-bottom"></textarea></div>
			<div class="col-2 gusano18"><textarea name="abreviaturaR5"  class="form-control  p-4 rounded-circle text-center align-text-bottom"></textarea></div>
		</div>
		 <div class="row justify-content-center">
        	<input type="submit" value="Guardar Datos" class="btn p-2 mt-3 btn-danger">
    	</div>
	</div>
</form>
@endsection