@extends('layouts.nav')

@section('title', 'Vista Roles| SmartMoodle')

@section('encabezado')
<h1>Vista de Roles</h1>
@stop

@section('content')



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
                        <h3 class="card-title">Informacion del Rol</h3>
                    </div>
                    <form method="POST" action="{{route('roles.update', $role->id)}}">
                        @method('PUT')
                        @csrf


                        <div class=" card-body">
                            <div class="form-group">
                                <label for="name">Rol Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Rol Name"
                                    value="{{$role->name}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Rol Detalle</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion"
                                    placeholder="Rol Descripcion" value="{{$role->descripcion}}" readonly>
                            </div>
                            <div class="form-group">
                                <h3>Acceso Completo</h3>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="fullaccessyes" name="full-access"
                                        class="custom-control-input" value="yes" @if ( $role['full-access']=="yes" )
                                        checked @elseif (old('full-access')=="yes" ) checked @endif disabled>
                                    <label class="custom-control-label" for="fullaccessyes">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="fullaccessno" name="full-access"
                                        class="custom-control-input" value="no" @if ( $role['full-access']=="no" )
                                        checked @elseif (old('full-access')=="no" ) checked @endif disabled>
                                    <label class="custom-control-label" for="fullaccessno">No</label>
                                </div>
                            </div>

                           
                            <div class="form-group">
                                <h3>Estado del Usuario</h3>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="estadoon" name="estado" class="custom-control-input"
                                        value="on" @if($role['estado']=="on" ) checked @elseif(old('estado')=="on" )
                                        checked @endif disabled>
                                    <label class="custom-control-label" for="estadoon">Activo</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="estadooff" name="estado" class="custom-control-input"
                                        value="off" @if($role['estado']=="off" ) checked @elseif(old('estado')=="off" )
                                        checked @endif disabled>
                                    <label class="custom-control-label" for="estadooff">No Activo</label>
                                </div>
                            </div>
                            <div class="card-body">

                                <h4>Lista de Menú</h4>

                                @foreach($permissions as $permission)

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input"
                                        id="permission_{{$permission->id}}" value="{{$permission->id}}"
                                        name="permission[]" @if( is_array(old('permission')) &&
                                        in_array( " $permission->id " ,old ('permission'))) checked @elseif (is_array(
                                        $permission_role ) && in_array( " $permission->id" , $permission_role)) checked
                                        @endif disabled>

                                    <label class="custom-control-label" for="permission_{{$permission->id}}">

                                        {{$permission->id}}
                                        -
                                        {{$permission->namep}}
                                        <em>({{$permission->descripcionp}})</em>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            <div class="card-footer">
                                <a href="{{url()->previous()}}" class="btn btn-primary">Regesar</a>

                            </div>


                    </form>


                </div>
            </div>
        </div>
    </div>
</section>




@stop

@section('css')
   
@stop

@section('js')
    
@stop