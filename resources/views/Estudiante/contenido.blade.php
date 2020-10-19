@extends('layouts.estapp')

@section('title', 'Perfil | SmartMoodle')



@section('content')

<section class="content">
    <div class="container">
        <div class="card border-0 shadow my-4">

            <h1 class="font-weight-light" style="color:red;"> {{ auth()->user()->instituto->nombre}}</h1>
            @foreach(auth()->user()->distrimas as $distrimas)
            @foreach($distrimas->distribumacus as $dis1)

            <h2 class="font-weight-light"> <strong> {{$dis1->curso->nombre}} {{$dis1->nivel->nombre}}</strong></h2>
            @endforeach
            @endforeach

            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="font-weight-light"> <strong>Unidades</strong></h3>
                </div>

                <div class="row">

                    @foreach($contenidos->where('materia_id', $materia->id) as $contenido)
                    <!-- ./col -->
                    <br>
                    {{$contenido->nombre}}
                    -
                    {{$contenido->descripcion}}
                    <br>
                    <!-- ./col -->

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>







@stop
@section('css')
@stop
@section('js')

@stop