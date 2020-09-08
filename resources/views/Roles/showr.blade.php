@extends('layouts.master')
@section('title')
@endsection
@section('contenido')

<div class="container">

<div class="card">

<div class="card-header">

<h3>Nombre :{{ $rol->name}}</h3>
<h3>Apellido :{{ $rol->slug}}</h3>

</div>

<div class="card-body">
<h5 class="card-title">Roles</h5>
 <p class=card-text>
----------------------
</p>
</div>

<h5 class="card-title" >Permisos</h5>
<p class="card-text">

------------------------
</p>


</div>

<div class="card-footer">
<a href="{{url()->previous()}}" class="btn btn-primary">Regesar</a>

</div>

</div>







@endsection
@section('script')
@endsection