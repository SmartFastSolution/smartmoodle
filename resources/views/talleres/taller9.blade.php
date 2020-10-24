@extends('layouts.nav')

@section('title', $datos->taller->nombre)
@section('content')
<!-- SUBRAYE  LA  ALTERNATIVA  CORRECTA. -->

<h1 class="text-center  mt-5 text-danger"> {{ $datos->taller->nombre }}</h1>
     <h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>

<form action="{{ route('taller9', ['idtaller' => $d]) }}" method="POST">
    @csrf
     	<div class="container">
      @foreach ($datos->TallerSubraOps as $key => $element)          
     		<div class="row mb-4 justify-content-center ">
     			<div class="col-10">
     				<span class="badge-danger badge-pill">{{ $key + 1 }}.</span>
     				<label class="form-control-label">{{ $element->concepto }}</label>
     				<div class="row">
              @foreach ($info = explode(',', $element->alternativas); as $e)            
     						<div class="col-4"><input type="radio" name="respuesta[{{ $key }}]" value="{{ $e }}"> <label>{{ $e }}</label></div>
              @endforeach
     				</div>	
     			</div>
     		</div>
      @endforeach
     	</div>
               <div class="row justify-content-center">
                  <input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
               </div>
     	</div>

     	


     </form>

@endsection