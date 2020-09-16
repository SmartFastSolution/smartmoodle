@extends('layouts.master')
@section('title')
@endsection
@section('contenido')


<h3>Nombre :{{  $curso->nombre}}</h3>
<h3>estado: {{ $curso->paralelo}}</h3>
<h3>estado: {{ $curso->estado}}</h3>


@endsection
@section('script')
@endsection