@extends('layouts.nav')

@section('title', $datos->taller->nombre)
@section('content')

<form action="{{ route('taller1.docente', ['idtaller' => $d]) }}" method="POST">
    @csrf
		<div class="container">
	<h1 class="text-center text-danger mt-5 display-1">{{ $datos->taller->nombre }}</h1>
        <div class="card border border-danger mb-3" >
          <div class="card-header font-weight-bold" style="font-size: 25px;"> <h1 class="display-3">{{ $user->name }} Salazar</h1></div>
          <div class="card-body">
            <h2 class="font-weight-bold "><span class="badge badge-danger">#</span>{{ $datos->enunciado }}</h2>

          		<div class="row justify-content-center ">
          			@if ($taller->cuenta == 'activo')
          				<div class="col-3">
          					<h1 class="text-center">ACTIVOS</h1>
          					<ul class="list-group">
          					@foreach ($datos->activos as $element)
								  <li class="list-group-item">{{ $element->cuenta }}</li>
          					@endforeach
          				</ul>
          				</div>
          			@elseif ($taller->cuenta == 'pasivo')
          				<div class="col-3">
          					<h1 class="text-center">PASIVOS</h1>
          					<ul class="list-group">
          					@foreach ($datos->pasivos as $element)
								  <li class="list-group-item">{{ $element->cuenta }}</li>
          					@endforeach
          				</ul>
          				</div>
					@elseif ($taller->cuenta == 'patrimonio')
						<div class="col-3">
							<h1 class="text-center">PATRIMONIO</h1>
								<ul class="list-group">
          					@foreach ($datos->patrimonios as $element)
								  <li class="list-group-item">{{ $element->cuenta }}</li>
          					@endforeach
          				</ul>
          				</div>
          			@endif
          		</div>
            </div>
            <div class="row justify-content-center">
            <div class="col-5">
              <div class="form-group">
                <label for="exampleFormControlInput1">Calificacion</label>
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="text" class="form-control" name="calificacion" placeholder="Añada una nota al estudiante">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Retroalimentacion</label>
                <textarea class="form-control" name="retroalimentacion" rows="3" placeholder="Agregue una retroalimentacion"></textarea>
              </div>   
               <div class="row justify-content-center mb-5">
                <input type="submit" value="Calificar" class="btn p-2 mt-3 btn-danger">
             </div>
            </div>
        </div>
        </div>
		</div>
	</form>
@endsection