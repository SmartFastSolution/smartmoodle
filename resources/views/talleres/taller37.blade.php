@extends('layouts.nav')

@section('css')
<style type="text/css">
    #calApp {
  display: flex;
  align-items: center;
  justify-content: center;
 /* height: 100vh;
  width: 100vw;*/
}
.calculator {
  display: grid;
  grid-template-rows: repeat(7, minmax(35px, auto));
  grid-template-columns: repeat(4, 35px);
  grid-gap: 12px;
  padding: 35px;
  font-family: "Poppins";
  font-weight: 300;
  font-size: 18px;
  background-color: #ffffff;
  border-radius: 10px;
  box-shadow: 0px 3px 80px -30px rgba(13, 81, 134, 1);
}

.boton,
.zero {
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #484848;
  background-color: #f4faff;
  border-radius: 5px;
  border: 1px solid  #E42D2D;
}

.display,
.answer {
  grid-column: 1 / 5;
  display: flex;
  align-items: center;
}

.display {
  color: #0B0202;
  border-bottom: 1px solid #e1e1e1;
  margin-bottom: 15px;
  overflow: hidden;
  text-overflow: clip;
}

.answer {
  font-weight: 500;
  color: #146080;
  font-size: 55px;
  height: 65px;
}

.zero {
  grid-column: 1 / 3;
}

.operator {
  background-color: #d9efff;
  color: #3fa9fc;
}
</style>
@endsection
@section('title', 'Talleres de contabilidad')
@section('content')
<div class="container mb-3">

    <h1 class="text-center m-2">{{ $datos->taller->nombre }}</h1>
    <h3 class="text-center mt-3">{{ $datos->enunciado }}</h3>

    <div class="row justify-content-md-center">
        <div class="col-12 col-sm-12 col-md-2 mb-3">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-kardex-list" data-toggle="list" href="#list-kardex" role="tab" aria-controls="kardex">Kardex</a>
                <a class="list-group-item list-group-item-action " id="list-kardex-promedio-list" data-toggle="list" href="#list-kardex-promedio" role="tab" aria-controls="kardex-promedio">Kardex Promedio</a>
                <a class="list-group-item list-group-item-action " id="list-diario-list" data-toggle="list" href="#list-diario" role="tab" aria-controls="home">Balance Inicial</a>
                <a class="list-group-item list-group-item-action" id="list-balance_comp-list" data-toggle="list" href="#list-balance_comp" role="tab" aria-controls="profile">Balance de Comprobacion</a>
                <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Diario General</a>

                <a class="list-group-item list-group-item-action" id="list-mayor-general-list" data-toggle="list" href="#list-mayor-general" role="tab" aria-controls="mayor-general">Mayor General</a>
                <a class="list-group-item list-group-item-action" id="list-balance-ajustado-list" data-toggle="list" href="#list-balance-ajustado" role="tab" aria-controls="balance-ajustado">Balance Ajustado</a>

            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-10">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane show active fade" id="list-kardex" role="tabpanel" aria-labelledby="list-kardex-list">
                    @include('contabilidad.kardex')
                </div>
                   <div class="tab-pane fade" id="list-kardex-promedio" role="tabpanel" aria-labelledby="list-kardex-promedio-list">
                    @include('contabilidad.kardex_promedio')
                </div>
                <div class="tab-pane fade border border-danger p-4" id="list-diario" role="tabpanel"
                    aria-labelledby="list-diario-list">

                    <ul class="nav nav-tabs" id="bInicial" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#b_horizontal" role="tab"
                                aria-controls="b_horizontal" aria-selected="true">Balance Inicial Horizontal</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#b_vertical" role="tab"
                                aria-controls="b_vertical" aria-selected="false">Balance Inicial Vertical</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="bInicialContent">
                        @include('contabilidad.balanceinicial')
                    </div>
                </div>
                <div class="tab-pane fade" id="list-balance_comp" role="tabpanel"
                    aria-labelledby="list-balance_comp-list">
                    @include('contabilidad.balancecomprobacion')
                </div>
                <div class="tab-pane fade border border-danger " id="list-messages" role="tabpanel"
                    aria-labelledby="list-messages-list">
                    @include('contabilidad.diariogeneral')
                </div>
                <div class="tab-pane fade border border-danger " id="list-mayor-general" role="tabpanel"
                    aria-labelledby="list-mayor-general-list">
                    @include('contabilidad.mayorgeneral')
                </div>
                <div class="tab-pane fade" id="list-balance-ajustado" role="tabpanel" aria-labelledby="list-balance-ajustado-list">
                    @include('contabilidad.balanceajustado')
                </div>
            </div>
        </div>

    </div>

    {{--   <div class="row justify-content-center">
        <input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
     </div> --}}
    {{--  @include ('layouts.modacontabilidad') --}}
</div>

@include ('layouts.footer')
@section('js')
<script type="text/javascript" src="{{ asset('js/tallercontabilidad.js') }}"></script>

@endsection
@endsection