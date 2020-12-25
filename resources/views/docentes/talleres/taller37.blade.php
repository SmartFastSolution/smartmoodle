@extends('layouts.nav')

@section('title', $datos->taller->nombre)
@section('content')

<form action="{{ route('taller1.docente', ['idtaller' => $d]) }}" method="POST">
    @csrf
  <div class="container">
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

@section('js')

@endsection

@endsection






@extends('layouts.nav')

@section('css')
<style>
::-webkit-scrollbar {
    width: 25px;     /* Tamaño del scroll en vertical */
    height: 8px;    /* Tamaño del scroll en horizontal */
 
}
/* Ponemos un color de fondo y redondeamos las esquinas del thumb */
::-webkit-scrollbar-thumb {
    background: #0FECDA;
    border-radius: 25px;
}
/* Cambiamos el fondo y agregamos una sombra cuando esté en hover */
::-webkit-scrollbar-thumb:hover {
    background: #2E09E9;

    box-shadow: 0 0 2px 1px rgba(0, 0, 0, 0.2);
}
/* Cambiamos el fondo cuando esté en active */
::-webkit-scrollbar-thumb:active {
    background-color: #0CCBDC;
}
/* Ponemos un color de fondo y redondeamos las esquinas del track */
::-webkit-scrollbar-track {
    background: #e1e1e1;
    border-radius: 4px;
}
/* Cambiamos el fondo cuando esté en active o hover */
::-webkit-scrollbar-track:hover,
::-webkit-scrollbar-track:active {
  background: #d4d4d4;
}
</style>
@endsection
@section('title', 'Talleres de contabilidad')
@section('content')
	 <div class="container mb-3" >
        
	 	<h1 class="text-center  mt-5">{{ $datos->taller->nombre }}</h1>
     <h3 class="text-center mt-3">{{ $datos->enunciado }}</h3>

  <div class="row justify-content-md-center">
    <div class="col-12 col-sm-12 col-md-2 mb-3">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action active" id="list-diario-list" data-toggle="list" href="#list-diario" role="tab" aria-controls="home">Balance Inicial</a>
          <a class="list-group-item list-group-item-action" id="list-balance_comp-list" data-toggle="list" href="#list-balance_comp" role="tab" aria-controls="profile">Balance de Comprobacion</a>
          <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Diario General</a>
          <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
        </div>
  </div>
  <div class="col-12 col-sm-12 col-md-10">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active border border-danger p-4" id="list-diario" role="tabpanel" aria-labelledby="list-diario-list">
        <ul class="nav nav-tabs" id="bInicial" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#b_horizontal" role="tab" aria-controls="b_horizontal" aria-selected="true">Balance Inicial Horizontal</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#b_vertical" role="tab" aria-controls="b_vertical" aria-selected="false">Balance Inicial Vertical</a>
          </li>
        </ul>
          <div class="tab-content" id="bInicialContent">
             @include('contabilidad.balanceinicial')
          </div> 
      </div>
      <div class="tab-pane fade" id="list-balance_comp" role="tabpanel" aria-labelledby="list-balance_comp-list">
  			@include('contabilidad.balancecomprobacion')
      </div>
   <div class="tab-pane fade border border-danger " id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
  			@include('contabilidad.diariogeneral') 	
   </div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
      	<form>
      		<input type="text">
      	</form>
      </div>
    </div>
  </div>

     </div>
 </div>

@include ('layouts.footer')

@endsection