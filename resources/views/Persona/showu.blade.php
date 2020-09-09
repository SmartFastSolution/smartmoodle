@extends('layouts.master')
@section('title')
@endsection
@section('contenido')

<div class="container">

<div class="card">

<div class="card-header">

<h3>Nombre :{{  $user->name}}</h3>
<h3>Apellido :{{ $user->sname}}</h3>
<h3>Apellido :{{ $user->sapellido}}</h3>
<h3>telefono :{{ $user->telefono}}</h3>
<h3>email: {{ $user->email}}</h3>
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