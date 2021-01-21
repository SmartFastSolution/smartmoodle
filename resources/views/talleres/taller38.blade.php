@extends('layouts.nav')
@section('css')
<style type="text/css">

.text {
   /* width:500px;*/
    overflow:hidden;
    background-color:#FFF;
    color:#222;
    font-family:Courier, monospace;
    font-weight:normal;
    font-size:16px;
    resize:none;
    line-height:25px;
    padding-left:50px;
    padding-right:50px;
    padding-top:20px;
    padding-bottom:15px;
    background-image:/*url(https://static.tumblr.com/maopbtg/E9Bmgtoht/lines.png),*/ url(https://static.tumblr.com/maopbtg/nBUmgtogx/paper.png);
    background-repeat: repeat;
    -webkit-border-radius:12px;
    border-radius:12px;
    -webkit-box-shadow: 0px 2px 14px #000;
    box-shadow: 0px 2px 14px #000;
    border-top:1px solid #FFF;
    border-bottom:1px solid #FFF;
}

</style>
@endsection

@section('title', $datos->taller->nombre)
@section('content')

<h1 class="text-center  mt-5 text-danger">{{ $datos->taller->nombre }}</h1>
<h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>

<form action="{{ route('taller38', ['idtaller' => $d]) }}" method="POST">
           @csrf
	<div class="container">
		<div class="row justify-content-center ">
			<div class="col-8 mb-5">
				{!! $datos->lectura !!}
			</div>	
			<div class="col-8 ">
				@foreach ($datos->tallerLecturaOp as $enunciados)
				<strong class="mt-2">
					<h4>{{ $enunciados->enunciado }}</h4>
					<textarea  class="form-control text" name="respuestas[]"></textarea>
				</strong>
				@endforeach
			</div>
		</div>
		<div class="row justify-content-center">
        	<input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
    	</div>
	</div>
</form>

@endsection
