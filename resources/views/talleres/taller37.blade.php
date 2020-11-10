@extends('layouts.nav')

@section('css')

@endsection
@section('title', 'Talleres de contabilidad')
@section('content')
<div class="container mb-3">

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
                <div class="tab-pane fade show active border border-danger p-4" id="list-diario" role="tabpanel"
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
                <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                    <form>
                        <input type="text">
                    </form>
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