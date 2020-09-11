@extends('layouts.master')
@section('title')
@endsection
@section('contenido')

<div class="container">

    <div class="card">

        <div class="card-header">

            <h3>Nombre :{{  $instituto->nombre}}</h3>
            <h3>Apellido :{{ $instituto->descripcion}}</h3>
            <h3>Apellido :{{ $instituto->provincia}}</h3>
            <h3>email: {{ $instituto->email}}</h3>
            <h3>Estado: {{ $instituto->estado}}</h3>
        </div>




    </div>

    <div class="card-footer">
        <a href="{{url()->previous()}}" class="btn btn-primary">Regesar</a>

    </div>

</div>






@endsection
@section('script')
@endsection