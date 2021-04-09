@extends('layouts.nav')
 {{-- EN EL SIGUIENTE COLLAGE APLIQUE FIGURAS QUE SE  RELACIONEN CON CONTABILIDAD HOTELERA, CON EFICACIA --}}
@section('title', $datos->taller->nombre)
@section('content')
    <li class="d-none">
        @if (Auth::check())
        @foreach (auth()->user()->roles as $role)
        {{ $rol = $role->descripcion}}
        @endforeach
        @endif
    </li>
<div class="container">
      <h1 class="text-center text-danger display-1">{{ $datos->taller->nombre }}</h1>
        <div class="card border border-danger mb-3" >
          <div class="card-header font-weight-bold" style="font-size: 25px;"> 
            <h1 class="display-3">{{ auth()->user()->name }} {{ auth()->user()->apellido }}</h1></div>
            <h2 class="font-weight-bold "><span class="badge badge-danger">#</span>{{ $datos->enunciado }}</h2>
            <div class="row justify-content-center">
              				<div class="col-9">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>N°</th>
                  <th >NOMBRE DEL ARCHIVO</th>
									<th class="text-center">ARCHIVO</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($datos->rarchivos as $key => $archivo)
								<tr>
									<td>{{ $key + 1 }}</td>
									<td>{{ $archivo->nombre }}</td>
                  <td class="text-center">
                    @if ($archivo->extension == 'pdf')
                    <a href="{{ $archivo->urlarchivo }}" target="_blanK" class="btn btn-outline-danger"><i class="fas fa-file-pdf"></i></a>
                    @elseif ($archivo->extension == 'docx')
                    <a href="{{ $archivo->urlarchivo }}" target="_blanK" class="btn btn-outline-primary"><i class="fas fa-file-word"></i></a>
                    @elseif ($archivo->extension == 'txt')
                    <a href="{{ $archivo->urlarchivo }}" target="_blanK" class="btn btn-outline-secondary"><i class="fas fa-file-alt"></i></a>
                    @elseif ($archivo->extension == 'xlsx')
                    <a href="{{ $archivo->urlarchivo }}" target="_blanK" class="btn btn-outline-success"><i class="fas fa-file-excel"></i></a>
                    @elseif ($archivo->extension == 'ppt')
                    <a href="{{ $archivo->urlarchivo }}" target="_blanK" class="btn btn-outline-danger"><i class="fas fa-file-powerpoint"></i></a>
                    @elseif ($archivo->extension == 'png' || 'jpg' || 'jpge')
                    <a href="{{ $archivo->urlarchivo }}" target="_blanK" class="btn btn-outline-primary"><i class="fas fa-file-image"></i></a>
                    @else
                    <a href="{{ $archivo->urlarchivo }}" target="_blanK" class="btn btn-outline-info"><i class="fas fa-file"></i></a>
                    @endif
                  </td>
							
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>

            </div>
         
           @if ($rol === 'estudiante')
            <div class="row justify-content-center">
            <div class="col-5">
              <div class="form-group">
                <label for="exampleFormControlInput1">Calificación</label>
                {{-- <input type="hidden" name="user_id" value="{{ $user->id }}"> --}}
                <input type="text" disabled value="{{ $relacion[0]->calificacion }}" class="form-control" name="calificacion" placeholder="Añada una nota al estudiante">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Retroalimentación</label>
                <textarea class="form-control" disabled="" name="retroalimentacion" rows="3" placeholder="Agregue una retroalimentacion">{{ $relacion[0]->retroalimentacion }}</textarea>
              </div>   
            </div>
        </div>
        @endif
        </div>
        </div>
	</div>

 @endsection
