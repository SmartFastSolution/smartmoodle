@extends('layouts.master')
@section('title')
@endsection
@section('contenido')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edicion de Roles</h1>
            </div>
            <div class="col-sm-6">

            </div>
        </div>
    </div>
</section>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> Parece que hay porblemas o Malas decisiones <br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="card card-outline-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Edicion de Informacion de Roles</h3>
                    </div>
                    <form method="POST" action="{{route('roles.update', $role->id)}}">
                        @method('PUT')
                        @csrf
                        <div class=" card-body">
                            <div class="form-group">
                                <label for="name">Rol Name</label>
                                <input type="text"  class="form-control" name="name" id="name" placeholder="Rol Name"
                                    value="{{$role->name}}">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Rol descripcion</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Rol descripcion"
                                    value="{{$role->descripcion}}">
                            </div>

                            <div class="form-group">
                                <h3>Acceso Completo</h3>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="fullaccesyes" name="fullacces" class="custom-control-input"
                                        value="yes" @if($role['fullacces']=="yes" ) checked
                                        @elseif(old('fullacces')=="yes" ) checked @endif>
                                    <label class="custom-control-label" for="fullaccesyes">SI</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="fullaccesno" name="fullacces" class="custom-control-input"
                                        value="no" @if($role['fullacces']=="no" ) checked @elseif(old('fullacces')=="no"
                                        ) checked @endif>
                                    <label class="custom-control-label" for="fullaccesno">No</label>
                                </div>
                            </div>

                            <div class="card-body">

                                <h4>Lista de Menú</h4>

                                @foreach($permissions as $permission)

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input"
                                        id="permission_{{$permission->id}}" value="{{$permission->id}}"
                                        name="permission[]" 
                                        @if( is_array(old('permission')) && in_array( " $permission->id ",old ('permission'))) checked
                                        @elseif (is_array( $permission_role ) && in_array( " $permission->id",
                                         $permission_role))
                                        checked @endif >

                                    <label class="custom-control-label" for="permission_{{$permission->id}}">
                                        {{$permission->id}}
                                        -
                                        {{$permission->namep}}
                                        <em>({{$permission->descripcionp}})</em>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            <input type="submit" class="btn btn-dark " value="Guardar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('script')
@endsection