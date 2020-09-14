@extends('layouts.master')
@section('title')
@endsection
@section('contenido')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edicion de Usuarios</h1>
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
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edicion de Informacion del Usuario</h3>
                    </div>




                    <form method="POST" action="{{route('users.update', $user->id)}} ">
                        @method('PUT')
                        @csrf

                        <div class=" card-body">
                            <div class="form-group">
                                <label for="cedula">Cédula</label>
                                <input class="form-control" name="cedula" id="cedula" placeholder="Cédula"
                                    value="{{$user->cedula}}" required>
                            </div>
                            <div class="form-group">
                                <label for="fechanacimiento">Fecha Nacimiento</label>
                                <input class="form-control" name="fechanacimiento" id="fechanacimiento"
                                    placeholder="Fecha Nacimiento" value="{{$user->fechanacimiento}}" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Primer Nombre</label>
                                <input class="form-control" name="name" id="name" placeholder="Primer Nombre"
                                    value="{{$user->name}}" required>
                            </div>
                            <div class="form-group">
                                <label for="sname">Segundo Nombre</label>
                                <input class="form-control" name="sname" id="sname" placeholder="Segundo Nombre"
                                    value="{{$user->sname}}" required>
                            </div>
                            <div class="form-group">
                                <label for="apellido">Primer Apellido</label>
                                <input class="form-control" name="apellido" id="apellido" placeholder="Primer Apellido"
                                    value="{{$user->apellido}}" required>
                            </div>
                            <div class="form-group">
                                <label for="sapellido">Segundo Apellido</label>
                                <input class="form-control" name="sapellido" id="sapellido"
                                    placeholder="Segundo Apellido" value="{{$user->sapellido}}" required>
                            </div>
                            <div class="form-group">
                                <label for="domicilio">Domicilio</label>
                                <input class="form-control" name="domicilio" id="domicilio" placeholder="Domicilio"
                                    value="{{$user->domicilio}}" required>
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input class="form-control" name="telefono" id="telefono" placeholder="Télefono"
                                    value="{{$user->telefono}}" required>
                            </div>
                            <div class="form-group">
                                <label for="celular">Celular</label>
                                <input class="form-control" name="celular" id="celular" placeholder="Celular"
                                    value="{{$user->celular}}" required>
                            </div>
                        </div>
                      

                        <div class="form-group">
                            <label>Rol</label>
                            <select class="form-control select2" style="width: 100%;">
                                <option selected="selected">Elija un rol para el Usuario</option>
                                @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                               
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="titulo">Profesión</label>
                            <input class="form-control" name="titulo" id="titulo" placeholder="Profesión"
                                value="{{$user->titulo}}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" name="email" id="email" placeholder="Email"
                                value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password" value="{{$user->password}}" minlength="8">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirmar Contraseña</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                id="password_confirmation" placeholder="Confirmar Contraseña">
                        </div>
                        <h3>Estado del Usuario</h3>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="estadoon" name="estado" class="custom-control-input" value="on"
                                @if($user['estado']=="on" ) checked @elseif(old('estado')=="on" ) checked @endif>
                            <label class="custom-control-label" for="estadoon">Activo</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="estadooff" name="estado" class="custom-control-input" value="off"
                                @if($user['estado']=="off" ) checked @elseif(old('estado')=="off" ) checked @endif>
                            <label class="custom-control-label" for="estadooff">No Activo</label>
                        </div>

                        <input type="submit" class="btn btn-dark " value="Guardar">

                </div>


                </form>

            </div>
        </div>
    </div>
    </div>
</section>


@endsection
@section('script')
@endsection