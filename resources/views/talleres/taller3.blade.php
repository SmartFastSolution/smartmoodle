@extends('layouts.nav')

@section('title', 'Taller'.$consul->id)
@section('content')
<h1 class="text-center  mt-5 text-danger">Taller {{ $consul->id }}</h1>
     <h3 class="text-center mt-5 text-info">{{ $consul->nombre }}</h3>
     <form action="{{ route('taller3', ['idtaller' => $d]) }}" method="POST">
           @csrf
     	<div class="container mb-4">
     		<div class="row justify-content-center">
     			<div class="col-7">
                @foreach ($datos as $dato)                      
     				<div class="row mt-4 p-2">
     					<div class="col-6 align-self-center">
     						<label class="col-form-label " for="">{{ $dato->enunciado1 }}</label>   						
     					</div>
     					<div class="col-6">
                            <textarea name="respuesta[]" class="form-control inputcurrent" id="" cols="30" rows="5"></textarea>
     					</div>
     				</div>
                         <br>
                @endforeach
     				
     			</div>
     		</div>
     		<div class="row justify-content-center">
        		<input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
    		 </div>
     	</div>
     </form>
@endsection