@extends('layouts.nav')

@section('title', $datos->taller->nombre)
@section('content')
<!-- SUBRAYE  LA  ALTERNATIVA  CORRECTA. -->

<h1 class="text-center  mt-5 text-danger"> {{ $datos->taller->nombre }}</h1>
     <h3 class="text-center mt-5 mb-3 text-info">{{ $datos->enunciado }}</h3>

<form action="{{ route('taller10') }}" method="POST">
    @csrf
     	<div class="container">
     		<div class="row mb-4 justify-content-center ">
     			<div class="col-10">
     				<span class="badge-danger badge-pill">1.</span>
     				<label class="form-control-label">{{ $datos->concepto1 }}</label>
     				<div class="row">
                              @foreach ($info = explode(',', $datos->alternativas1); as $e)            
     						<div class="col-4"><input type="radio" name="item1" value="niño"> <label>{{ $e }}</label></div>
                              @endforeach
     				</div>	
     			</div>
     		</div>

     		<div class="row mb-4  justify-content-center   ">
     			<div class="col-10">
     				<span class="badge-danger badge-pill">2.</span>
     				<label class="form-control-label">{{ $datos->concepto2 }}</label>
     				<div class="row">
     					@foreach ($info = explode(',', $datos->alternativas2); as $e)            
                              <div class="col-4"><input type="radio" name="item2" value="niño"> <label>{{ $e }}</label></div>
                              @endforeach
     				</div>	
     			</div>
     		</div>
     		<div class="row mb-4 justify-content-center  ">
     			<div class="col-10">
     				<span class="badge-danger badge-pill">3.</span>
     				<label class="form-control-label">{{ $datos->concepto3 }}</label>
     				<div class="row">
     					@foreach ($info = explode(',', $datos->alternativas3); as $e)            
                                   <div class="col-4"><input type="radio" name="item3" value="niño"> <label>{{ $e }}</label></div>
                              @endforeach	
     				</div>	
     			</div>
     		</div>
               <div class="row mb-4 justify-content-center  ">
                    <div class="col-10">
                         <span class="badge-danger badge-pill">4.</span>
                         <label class="form-control-label">{{ $datos->concepto4 }}</label>
                         <div class="row">
                                 @foreach ($info = explode(',', $datos->alternativas4); as $e)            
                                   <div class="col-4"><input type="radio" name="item4" value="niño"> <label>{{ $e }}</label></div>
                              @endforeach
                         </div>    
                    </div>
               </div>
               <div class="row mb-4 justify-content-center  ">
                    <div class="col-10">
                         <span class="badge-danger badge-pill">5.</span>
                         <label class="form-control-label">{{ $datos->concepto5 }}</label>
                         <div class="row">
                                @foreach ($info = explode(',', $datos->alternativas5); as $e)            
                                   <div class="col-4"><input type="radio" name="item5" value="niño"> <label>{{ $e }}</label></div>
                              @endforeach   
                         </div>    
                    </div>
               </div>
               <div class="row mb-4 justify-content-center  ">
                    <div class="col-10">
                         <span class="badge-danger badge-pill">6.</span>
                         <label class="form-control-label">{{ $datos->concepto6 }}</label>
                         <div class="row">
                                 @foreach ($info = explode(',', $datos->alternativas6); as $e)            
                                   <div class="col-4"><input type="radio" name="item6" value="niño"> <label>{{ $e }}</label></div>
                              @endforeach  
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