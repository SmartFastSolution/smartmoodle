@extends('layouts.nav')

@section('title', $datos->taller->nombre)
{{-- @section('title','Taller 33') --}}
@section('content')

<h1 class="text-center  mt-5 text-danger font-weight-bold display-4"> {{ $datos->taller->nombre }}</h1>
<h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>

{{-- <h1 class="text-center  text-danger"> Taller 33</h1>
<h3 class="text-center mt-5 mb-3 text-info">CLASIFIQUE EL COMERCIO CON ORITGINALIDAD</h3> --}}

<form action="{{ route('taller33', ['idtaller' => $d]) }}" method="POST">
           @csrf
	<div class="container">
		<div class="row justify-content-center ">
			<table class="table table-bordered">
			  <thead  class="bg-warning text-center">
			    <tr >
			      <th valign="middle" scope="col">COMERCIO</th>
			     	@foreach ($clasificaciones as $clasificacion)
			      		<th scope="col">{{ $clasificacion->clasificaciones }}</th>
			     	@endforeach
			    </tr>
			  </thead>
			  <tbody>
			    
			    	@foreach ($clasificados as $key => $clasificado)
			    	<tr>
			      		<th scope="row" class="bg-warning">{{$clasificado->clasificados}}</th>
			      		@foreach ($clasificaciones as $k => $clasificacion)
			      			<td><input type="radio" class="custom-checkbok form-control" value="{{ $clasificacion->id }}" name="clasificacion[{{ $key}}]"></td>
			      		@endforeach
			      	</tr>
			    	@endforeach
			      
			  
			   
			  </tbody>
			</table>
		</div>
		<div class="row justify-content-center mb-3">
        	<input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
    	</div>
	</div>
</form>

@endsection
