@extends('layouts.nav')

@section('title', 'Editar Usuario')

@section('encabezado')
<h1>Edicion de Usuarios</h1>
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
                            <div class="form-group">

                                <div class="form-group">
                                    <label>Instituto</label>
                                    <select class="form-control select" name="instituto" style="width: 99%;">
                                        @foreach($institutouser as $instuser)
                                        <option selected disabled value="{{ $instuser->id }}">{{ $instuser->nombre }}
                                        </option>
                                        @endforeach
                                        @foreach($institutos as $instituto)
                                        <option value="{{$instituto->id}}">{{$instituto->nombre}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="roles" id="roles">
                                        @foreach($roles as $role)
                                        <option value="{{ $role->id }}"
                                            @isset($user->roles[0]->name)
                                            @if($role->name == $user->roles[0]->name)
                                            selected 
                                            @endif
                                            @endisset
                                            >{{ $role->name }}</option>
                                        @endforeach
                                    </select>
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
                                    <input type="radio" id="estadoon" name="estado" class="custom-control-input"
                                        value="on" @if($user['estado']=="on" ) checked @elseif(old('estado')=="on" )
                                        checked @endif>
                                    <label class="custom-control-label" for="estadoon">Activo</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="estadooff" name="estado" class="custom-control-input"
                                        value="off" @if($user['estado']=="off" ) checked @elseif(old('estado')=="off" )
                                        checked @endif>
                                    <label class="custom-control-label" for="estadooff">No Activo</label>
                                </div>
                                <br><br>
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">Docente</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                    class="fas fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class=" card-body">
                                            <div class="form-group">
                                                <label for="titulo">Profesión</label>
                                                <input class="form-control" name="titulo" id="titulo"
                                                    placeholder="Profesión" value="{{$user->titulo}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="fcontrato">Fecha Contrato</label>
                                                <input type="text" class="form-control" name="fcontrato" id="fcontrato"
                                                    placeholder="Fecha Contrato" value="{{$user->fcontrato}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">Estudiante</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                    class="fas fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class=" card-body">
                                            <div class="form-group">
                                                <label for="cirepre">Cedula Representante</label>
                                                <input type="text" class="form-control" name="cirepre" id="cirepre"
                                                    placeholder="Profesión" value="{{$user->cirepre}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="namerepre">Nombres del Representante</label>
                                                <input type="text" class="form-control" name="namerepre" id="namerepre"
                                                    placeholder="Nombre del Representante" value="{{$user->namerepre}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="namema">Nombres de la Madre</label>
                                                <input type="text" class="form-control" name="namema" id="namema"
                                                    placeholder="Nombre de la Madre" value="{{$user->namema}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="namepa">Nombres del Padre</label>
                                                <input type="text" class="form-control" name="namepa" id="namepa"
                                                    placeholder="Nombre del Padre" value="{{$user->namepa}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="telefonorep">Teléfono Representante</label>
                                                <input type="text" class="form-control" name="telefonorep"
                                                    id="telefonorep" placeholder="Teléfono Representante"
                                                    value="{{$user->telefonorep}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="fregistro">Fecha Registro</label>
                                                <input type="text" class="form-control" name="fregistro" id="fregistro"
                                                    placeholder="Fecha Registro" value="{{$user->fregistro}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-dark " value="Guardar">
                            </div>
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
    <script> console.log('Hi!'); </script>
@stop