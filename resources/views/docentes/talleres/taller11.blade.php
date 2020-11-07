@extends('layouts.nav')


@section('title', 'Taller 12')
@section('content')


<form action="{{ route('taller1.docente', ['idtaller' => $d]) }}" method="POST">
    @csrf
	
	<div class="container-md">
	 	<h1 class="text-center text-danger display-1">{{ $datos->taller->nombre }}</h1>
        <div class="card border border-danger mb-3" >
          <div class="card-header font-weight-bold" style="font-size: 25px;"> <h1 class="display-3">{{ $user->name }} {{ $user->apellido }}</h1></div>
          <div class="card-body">
            <h2 class="font-weight-bold "><span class="badge badge-danger">#</span>{{ $datos->enunciado }}</h2>
         	<div class="row justify-content-center">
         		<div class="col-5">
         			<ul class="list-group">
					  <li class="list-group-item bg-primary" aria-disabled="true">{{ $taller->enunciado1 }}</li>
					  @foreach ($letraA as $element)
					  <li class="list-group-item">{{ $element->definicion }}</li>
					  @endforeach
					
					</ul>
         		</div>
         		<div class="col-5">
         			<ul class="list-group">
					  <li class="list-group-item bg-primary" aria-disabled="true">{{ $taller->enunciado2 }}</li>
					  @foreach ($letraB as $element)
					  <li class="list-group-item">{{ $element->definicion }}</li>
					  @endforeach
					
					</ul>
         		</div>
         	</div>

          </div>
            <div class="row justify-content-center">
            <div class="col-5">
              <div class="form-group">
                <label for="exampleFormControlInput1">Calificacion</label>
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="text" value="{{ $update_imei->pivot->calificacion }}" class="form-control" name="calificacion" placeholder="Añada una nota al estudiante">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Retroalimentacion</label>
                <textarea class="form-control" name="retroalimentacion" rows="3" placeholder="Agregue una retroalimentacion">{{ $update_imei->pivot->retroalimentacion }}</textarea>
              </div>   
               <div class="row justify-content-center mb-5">
                <input type="submit" value="Calificar" class="btn p-2 mt-3 btn-danger">
             </div>
            </div>
        </div>
        </div>

</form>

@endsection