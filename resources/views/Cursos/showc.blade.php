@extends('layouts.nav')
@section('title', 'Dashboard')

@section('encabezado')
    <h1>Dashboard</h1>
@stop


@section('content')


<h3>Nombre :{{  $curso->nombre}}</h3>
<h3>estado: {{ $curso->paralelo}}</h3>
<h3>estado: {{ $curso->estado}}</h3>


@stop

@section('css')
    
@stop

@section('js')
    
@stop