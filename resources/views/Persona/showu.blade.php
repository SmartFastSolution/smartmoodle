
@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Detalles de Usuarios</h1>
@stop

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header">

            <h3>Nombre :{{  $user->name}}</h3>
            <h3>Apellido :{{ $user->sname}}</h3>
            <h3>Apellido :{{ $user->sapellido}}</h3>
            <h3>telefono :{{ $user->telefono}}</h3>
            <h3>estado: {{ $user->estado}}</h3>
        </div>




    </div>

    <div class="card-footer">
        <a href="{{url()->previous()}}" class="btn btn-primary">Regesar</a>

    </div>

</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop