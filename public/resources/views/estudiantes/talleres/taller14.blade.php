@extends('layouts.nav')

@section('title',  $datos->taller->nombre )
@section('content')

<!-- IDENTIFIQUE  LAS  PERSONAS  QUE  INTERVIENEN  EN  EL  CHEQUE,  CON CERTEZA -->
<div class="container">
	<h1 class="text-center text-danger  display-1">{{ $datos->taller->nombre }}</h1>
        <div class="card border border-danger mb-3" >
          <div class="card-header font-weight-bold" style="font-size: 25px;"> 
            <h1 class="display-3">{{ auth()->user()->name }}{{ auth()->user()->apellido }}</h1></div>
          <div class="card-body">
            <h2 class="font-weight-bold "><span class="badge badge-danger">#</span>{{ $datos->enunciado }}</h2>
			<table class="table">
			<thead >
				<tr class=" text-center thead-dark">
					 <th>Girador</th>
					<th>Girado</th>
					<th>Beneficiario</th>
				</tr>
			</thead>
			<tbody>
				<tr class="text-center">
					<td>{{ $datos->girador }}</td>
					<td>{{ $datos->girado }}</td>
					<td>{{ $datos->beneficiario}}</td>
				</tr>
			</tbody>
		</table>
          </div>
            <div class="row justify-content-center">
            <div class="col-5">
              <div class="form-group">
                <label for="exampleFormControlInput1">Calificacion</label>
                {{-- <input type="hidden" name="user_id" value="{{ $user->id }}"> --}}
                <input type="text" disabled value="{{ $relacion[0]->calificacion }}" class="form-control" name="calificacion" placeholder="Añada una nota al estudiante">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Retroalimentacion</label>
                <textarea disabled class="form-control" name="retroalimentacion" rows="3" placeholder="Agregue una retroalimentacion"> {{ $relacion[0]->retroalimentacion }}</textarea>
              </div>   
            </div>
        </div>
        </div>
</div>
@endsection