@extends('layouts.nav')

@section('title', $datos->nombre)
@section('content')
{{-- ORDENE  LAS  IDEAS  Y  ANÓTALAS  ADECUADAMENTE. --}}
<form action="{{ route('taller1.docente', ['idtaller' => $d]) }}" method="POST">
    @csrf
	 <div class="container-md">
	 	<h1 class="text-center text-danger display-1">{{ $datos->taller->nombre }}</h1>
        <div class="card border border-danger mb-3" >
          
          <div class="card-header "> 
            <div class="row">
              <div class="col-7" style="font-size: 25px;">
            <h1 class="display-3 font-weight-bold">{{ $user->name }} {{ $user->apellido }}</h1>
                
              </div>
              <div class="col-5">
                <table>
                  <tr>
                    <td width="200" class="font-weight-bold text-danger">Fecha de Entrega:</td>
                    <td>{{Carbon\Carbon::parse($datos->taller->fecha_entrega)->formatLocalized('%d de %B %Y ') }}</td>
                  </tr>
                  <tr>
                    <td width="200" class="font-weight-bold text-primary">Entregado:</td>
                    <td>{{Carbon\Carbon::parse($update_imei->pivot->fecha_entregado)->formatLocalized('%d de %B %Y ') }}</td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold text-info">Estado de entrega:</td>
                    <td > @if ($update_imei->pivot->fecha_entregado <= $datos->taller->fecha_entrega)
                      <span class="badge badge-success">PUNTUAL</span>
                      @else
                      <span class="badge badge-danger">ATRASADO</span>

                    @endif </td>
                  </tr>
                </table>
              </div>
            </div>

          </div>
          <div class="card-body">
            <h2 class="font-weight-bold "><span class="badge badge-danger">#</span>{{ $datos->enunciado }}</h2>
            <div class="jumbotron jumbotron-fluid">
            	<div class="row justify-content-center">
            		<div class="col-6">
            			<ul class="list-group">
            				@foreach ($datos->ordenIdeas as $ideas)
						  	<li class="list-group-item">{{ $ideas->ideas }}</li>
            				@endforeach
						</ul>
            		</div>
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
 </div>
</form>

@endsection
