@extends('layouts.nav')

@section('title', 'Dashboard')
@section('encabezado')
    <h1>Dashboard</h1>
@stop

@section('content')


<h3>Nombre :{{  $nivels->nombre}}</h3>

<h3>estado: {{ $nivels->estado}}</h3>



@stop

@section('css')
    
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop