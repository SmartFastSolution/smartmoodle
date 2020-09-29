@extends('layouts.nav')

@section('title', 'Detalle Menú')

@section('encabezado')
    <h1>Detalle Menú</h1>
@stop

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header">

            <h3>Nombre :{{  $permisos->namep}}</h3>
            <h3>descripcion :{{  $permisos->descripcionp}}</h3>
           
            <h3>Estado: {{ $permisos->estado}}</h3>
        </div>


    </div>

    <div class="card-footer">
        <a href="{{url()->previous()}}" class="btn btn-primary">Regesar</a>

    </div>

</div>



@stop

@section('css')
    
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop