@extends('layouts.nav')
<!--TALLER PARA ESCRIBIR DIFERENCIAS -->
@section('title', $datos->taller->nombre)
@section('content')
	<div class="container">
	<h1 class="text-center text-danger display-1">{{ $datos->taller->nombre }}</h1>
        <div class="card border border-danger mb-3" >
          <div class="card-header font-weight-bold" style="font-size: 25px;"> 
          	<h1 class="display-3">{{ auth()->user()->name }} {{ auth()->user()->apellido }}</h1></div>
          <div class="card-body">
            <h2 class="font-weight-bold "><span class="badge badge-danger">#</span>{{ $datos->enunciado }}</h2>
          			<div class="row">
			<div class="col-6 border-right border-info ">
				<div class="row justify-content-cente mb-4">
					<img class="mt-3 img-fluid" with="100" src="{{ asset($taller->img1) }}" alt="">
				</div>
				<div class="row">
					<div class="col">
						<ul class="list-group">
						  <li class="list-group-item">{{ $datos->diferencia_1a}}</li>
						  <li class="list-group-item">{{ $datos->diferencia_2a}}</li>
						  <li class="list-group-item">{{ $datos->diferencia_3a}}</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="row justify-content-center mb-4">
					<img class="mt-3 img-fluid" with="100" src="{{ asset($taller->img2) }}" alt="">
				</div>
				<div class="row">
					<div class="col">
						<ul class="list-group">
						  <li class="list-group-item">{{ $datos->diferencia_1b}}</li>
						  <li class="list-group-item">{{ $datos->diferencia_2b}}</li>
						  <li class="list-group-item">{{ $datos->diferencia_3b}}</li>
						</ul>
					</div>
				</div>

			</div>
		</div>
          </div>
            <div class="row justify-content-center">
            <div class="col-5">
              <div class="form-group">
                <label for="exampleFormControlInput1">Calificacion</label>
                {{-- <input type="hidden" name="user_id" value="{{ $user->id }}"> --}}
                <input type="text"  disabled  value="{{ $relacion[0]->calificacion }}" class="form-control" name="calificacion" placeholder="Añada una nota al estudiante">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Retroalimentacion</label>
                <textarea  disabled class="form-control" name="retroalimentacion" rows="3" placeholder="Agregue una retroalimentacion">{{ $relacion[0]->retroalimentacion }}</textarea>
              </div>   
            </div>
        </div>
        </div>		
	</div>
@endsection