@extends('layouts.master')
@section('title')
@endsection
@section('contenido')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Crear Usuarios</h1>
            </div>
            <div class="col-sm-6">

            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
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
    <div class="row">
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
                                <input type="text" class="form-control" name="cedula" id="cedula" placeholder="Cédula">
                            </div>
                            <div class="form-group">
                                <label for="fechanacimiento">Fecha Nacimiento</label>
                                <input type="text" class="form-control" name="fechanacimiento" id="fechanacimiento"
                                    placeholder="Fecha Nacimiento">
                            </div>
                            <div class="form-group">
                                <label for="name">Primer Nombre</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Primer Nombre">
                            </div>
                            <div class="form-group">
                                <label for="sname">Segundo Nombre</label>
                                <input type="text" class="form-control" name="sname" id="sname"
                                    placeholder="Segundo Nombre">
                            </div>
                            <div class="form-group">
                                <label for="apellido">Primer Apellido</label>
                                <input type="text" class="form-control" name="apellido" id="apellido"
                                    placeholder="Primer Apellido">
                            </div>
                            <div class="form-group">
                                <label for="sapellido">Segundo Apellido</label>
                                <input type="text" class="form-control" name="sapellido" id="sapellido"
                                    placeholder="Segundo Apellido">
                            </div>
                            <div class="form-group">
                                <label for="domicilio">Domicilio</label>
                                <input type="text" class="form-control" name="domicilio" id="domicilio"
                                    placeholder="Domicilio">
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" class="form-control" name="telefono" id="telefono"
                                    placeholder="Télefono">
                            </div>
                            <div class="form-group">
                                <label for="celular">Celular</label>
                                <input type="text" class="form-control" name="celular" id="celular"
                                    placeholder="Celular">
                                    <div class="form-group">
                       
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
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                            </div>

                            <div class=" form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Password" minlength="8">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirmar Contraseña</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="password_confirmation" placeholder="Confirmar Contraseña">
                            </div>
                            <h3>Estado del Usuario</h3>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="estadoon" name="estado" class="custom-control-input" value="on"
                                    @if(old('estado')=="on" ) checked @endif>
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
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class=" card-body">
                                        <div class="form-group">
                                            <label for="titulo">Profesión</label>
                                            <input type="text" class="form-control" name="titulo" id="titulo"
                                                placeholder="Profesión">
                                        </div>
                                        <div class="form-group">
                                            <label for="fcontrato">Fecha Contrato</label>
                                            <input type="text" class="form-control" name="fcontrato" id="fcontrato"
                                                placeholder="Fecha Contrato">
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
                                                placeholder="Profesión">
                                        </div>
                                        <div class="form-group">
                                            <label for="namerepre">Nombres del Representante</label>
                                            <input type="text" class="form-control" name="namerepre" id="namerepre"
                                                placeholder="Nombre del Representante">
                                        </div>
                                        <div class="form-group">
                                            <label for="namema">Nombres de la Madre</label>
                                            <input type="text" class="form-control" name="namema" id="namema"
                                                placeholder="Nombre de la Madre">
                                        </div>
                                        <div class="form-group">
                                            <label for="namepa">Nombres del Padre</label>
                                            <input type="text" class="form-control" name="namepa" id="namepa"
                                                placeholder="Nombre del Padre">
                                        </div>
                                        <div class="form-group">
                                            <label for="telefonorep">Teléfono Representante</label>
                                            <input type="text" class="form-control" name="telefonorep" id="telefonorep"
                                                placeholder="Teléfono Representante">
                                        </div>
                                        <div class="form-group">
                                            <label for="fregistro">Fecha Registro</label>
                                            <input type="text" class="form-control" name="fregistro" id="fregistro"
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
</section>




@endsection
@section('script')
@endsection