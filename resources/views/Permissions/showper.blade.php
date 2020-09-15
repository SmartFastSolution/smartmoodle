@extends('layouts.master')
@section('title')
@endsection
@section('contenido')

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






@endsection
@section('script')
@endsection