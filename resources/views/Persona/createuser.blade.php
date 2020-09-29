@extends('layouts.nav')
  



@section('title', 'Crear Usuario')

@section('encabezado')
<h1>Crear Usuarios</h1>
@stop

@section('content')


   
    <div class="row justify-content-center">
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
        <div class="col-md-8">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Formulario de Usuario</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('users.store')}} ">
                        @csrf
                        <div class=" card-body">
                            <div class="form-group">
                                <label for="cedula">Cédula</label>
                                <input type="text" class="form-control" value="{{ old('cedula') }}" name="cedula"
                                    id="cedula" placeholder="Cédula">
                            </div>
                            <div class="form-group">
                                <label for="fechanacimiento">Fecha Nacimiento</label>
                                <input type="text" class="form-control" value="{{ old('fechanacimiento') }}"
                                    name="fechanacimiento" id="fechanacimiento" placeholder="Fecha Nacimiento">
                            </div>
                            <div class="form-group">
                                <label for="name">Primer Nombre</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}"
                                    placeholder="Primer Nombre">
                            </div>
                            <div class="form-group">
                                <label for="sname">Segundo Nombre</label>
                                <input type="text" class="form-control" name="sname" id="sname"
                                    value="{{ old('sname') }}" placeholder="Segundo Nombre">
                            </div>
                            <div class="form-group">
                                <label for="apellido">Primer Apellido</label>
                                <input type="text" class="form-control" name="apellido" id="apellido"
                                    value="{{ old('apellido') }}" placeholder="Primer Apellido">
                            </div>
                            <div class="form-group">
                                <label for="sapellido">Segundo Apellido</label>
                                <input type="text" class="form-control" name="sapellido" id="sapellido"
                                    value="{{ old('sapellido') }}" placeholder="Segundo Apellido">
                            </div>
                            <div class="form-group">
                                <label for="domicilio">Domicilio</label>
                                <input type="text" class="form-control" name="domicilio" id="domicilio"
                                    value="{{ old('domicilio') }}" placeholder="Domicilio">
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" class="form-control" name="telefono" id="telefono"
                                    value="{{ old('telefono') }}" placeholder="Télefono">
                            </div>
                            <div class="form-group">
                                <label for="celular">Celular</label>
                                <input type="text" class="form-control" name="celular" id="celular"
                                    value="{{ old('celular') }}" placeholder="Celular">
                                <div class="form-group">

                                    <div class="form-group">
                                        <label>Instituto</label>
                                        <select class="form-control select" name="instituto" style="width: 99%;">
                                            <option selected disabled>Elija una Unidad educativa...</option>
                                            @foreach($institutos as $instituto)
                                            <option value="{{$instituto->id}}">{{$instituto->nombre}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Rol</label>
                                        <select class="form-control select" name="role" style="width: 99%;">
                                            <option selected disabled>Elija un rol para el Usuario...</option>
                                            @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Correo Electrónico</label>
                                        <input type="text" class="form-control" name="email" id="email"
                                            value="{{ old('email') }}" placeholder="Email">
                                    </div>

                                    <div class=" form-group">
                                        <label for="password">Contraseña</label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            value="{{ old('password') }}" placeholder="Password" minlength="8">
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirmar Contraseña</label>
                                        <input type="password" class="form-control" name="password_confirmation"
                                            id="password_confirmation" placeholder="Confirmar Contraseña">
                                    </div>
                                    <h3>Estado del Usuario</h3>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="estadoon" name="estado" class="custom-control-input"
                                            value="on" @if(old('estado')=="on" ) checked @endif>
                                        <label class="custom-control-label" for="estadoon">Activo</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="estadooff" name="estado" class="custom-control-input"
                                            value="off" @if(old('estado')=="off" ) checked @endif>
                                        <label class="custom-control-label" for="estadooff">No Activo</label>
                                    </div>
                                    <br><br>

                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">Docente</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool"
                                                    data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class=" card-body">
                                                <div class="form-group">
                                                    <label for="titulo">Profesión</label>
                                                    <input type="text" class="form-control" name="titulo" id="titulo"
                                                        value="{{ old('titulo') }}" placeholder="Profesión">
                                                </div>
                                                <div class="form-group">
                                                    <label for="fcontrato">Fecha Contrato</label>
                                                    <input type="text" class="form-control" name="fcontrato"
                                                        value="{{ old('fcontrato') }}" id="fcontrato"
                                                        placeholder="Fecha Contrato">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">Estudiante</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool"
                                                    data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class=" card-body">
                                                <div class="form-group">
                                                    <label for="cirepre">Cedula Representante</label>
                                                    <input type="text" class="form-control" name="cirepre" id="cirepre"
                                                        value="{{ old('cirepre') }}" placeholder="Profesión">
                                                </div>
                                                <div class="form-group">
                                                    <label for="namerepre">Nombres del Representante</label>
                                                    <input type="text" class="form-control" name="namerepre"
                                                        value="{{ old('namerepre') }}" id="namerepre"
                                                        placeholder="Nombre del Representante">
                                                </div>
                                                <div class="form-group">
                                                    <label for="namema">Nombres de la Madre</label>
                                                    <input type="text" class="form-control" name="namema" id="namema"
                                                        value="{{ old('namema') }}" placeholder="Nombre de la Madre">
                                                </div>
                                                <div class="form-group">
                                                    <label for="namepa">Nombres del Padre</label>
                                                    <input type="text" class="form-control" name="namepa" id="namepa"
                                                        value="{{ old('namepa') }}" placeholder="Nombre del Padre">
                                                </div>
                                                <div class="form-group">
                                                    <label for="telefonorep">Teléfono Representante</label>
                                                    <input type="text" class="form-control" name="telefonorep"
                                                        value="{{ old('telefonorep') }}" id="telefonorep"
                                                        placeholder="Teléfono Representante">
                                                </div>
                                                <div class="form-group">
                                                    <label for="fregistro">Fecha Registro</label>
                                                    <input type="text" class="form-control" name="fregistro"
                                                        value="{{ old('fregistro') }}" id="fregistro"
                                                        placeholder="Fecha Registro">
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <input type="submit" class="btn btn-dark " value="Guardar">

                                </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">


        </div>
    </div>




@stop

@section('css')
    
@stop

@section('js')
    
@stop