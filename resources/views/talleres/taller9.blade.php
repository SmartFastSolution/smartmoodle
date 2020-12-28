@extends('layouts.nav')

@section('title', $datos->taller->nombre)
@section('content')
<!-- SUBRAYE  LA  ALTERNATIVA  CORRECTA. -->

<h1 class="text-center  mt-5 text-danger font-weight-bold display-4"> {{ $datos->taller->nombre }}</h1>
     <h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>

<form action="{{ route('taller9', ['idtaller' => $d]) }}" method="POST">
    @csrf
     	<div class="container">
      @foreach ($datos->TallerSubraOps as $key => $element)          
     		<div class="row mb-5 justify-content-center bg-secondary p-2" style="box-shadow: 5px 5px 15px 0px  #74ECF7;">
     			<div class="col align-content-center">
     				<span class="badge-danger badge-pill">{{ $key + 1 }}.</span>
     				<label class="form-control-label text-dark">{{ $element->concepto }}</label>
     				<div class="row justify-content-start">
              @foreach ($info = explode(',', $element->alternativas); as $e)            
     						<div class="col-2 align-content-center"><input type="radio" name="respuesta[{{ $key }}]" value="{{ $e }}"> <label>{{ $e }}</label></div>
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