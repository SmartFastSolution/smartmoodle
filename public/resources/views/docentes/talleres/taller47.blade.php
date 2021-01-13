@extends('layouts.nav')

@section('titulo', $datos->taller->nombre)
@section('content')

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
        <div class="row">
           <div class="col-4 align-self-center">
               <ul class="list-group list-group-flush ">
                @foreach ($taller->enunciados as $enunciado)
                 
                  <li class="list-group-item bg-transparent border-bottom-0"><span class="badge badge-danger">{{ ++$numero }}. </span> {{ $enunciado->enunciado }}</li>
                    
                @endforeach
                </ul>
           </div>
           <div class="col-8">
               <ul class="list-group list-group-flush ">
                @foreach ($taller->definiciones as $definicion)
                 
                  <li class="list-group-item bg-transparent border-bottom-0 text-justify"><span class="badge badge-info">{{ $letra++ }}. </span> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
                    
                @endforeach
                </ul>
           </div>
       </div>
       <div class="row justify-content-center">
           <div class="col-8 align-self-center">
            <h2 class="font-weight-bold"></h2>
           <table class="table table-bordered">
               <thead >
                   <tr>
                       <th class="bg-dark">Respuesta Correcta</th>
                       <th class="bg-info">Respuesta Enviada</th>
                   </tr>
               </thead>
               <tbody>
                   <tr>
                       <td>{{ $taller->alternativa_correcta }}</td>
                       <td>{{ $datos->respuesta }}</td>
                   </tr>
               </tbody>
           </table>
           </div>
       </div>

          </div>
            <div class="row justify-content-center">
            <div class="col-5">
              <div class="form-group">
                <label for="exampleFormControlInput1">Calificacion</label>
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="text" class="form-control" value="{{ $update_imei->pivot->calificacion }}" name="calificacion" placeholder="Añada una nota al estudiante">
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