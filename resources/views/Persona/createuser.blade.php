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
    <div class="row">
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Formulario de Usuario</h3>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{route('users.index')}} ">

                        @csrf

                        <div class=" card-body">
                            <div class="form-group">
                                <label for="cedula">Cédula</label>
                                <input type="text" class="form-control" name="cedula" id="cedula" placeholder="Cédula"
                                    >
                            </div>
                            <div class="form-group">
                                <label for="fechanacimiento">Fecha Nacimiento</label>
                                <input type="text" class="form-control" name="fechanacimiento" id="fechanacimiento"
                                    placeholder="Fecha Nacimiento" >
                            </div>
                            <div class="form-group">
                                <label for="name">Primer Nombre</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Primer Nombre" >
                            </div>
                            <div class="form-group">
                                <label for="sname">Segundo Nombre</label>
                                <input type="text" class="form-control" name="sname" id="sname"
                                    placeholder="Segundo Nombre" >
                            </div>
                            <div class="form-group">
                                <label for="apellido">Primer Apellido</label>
                                <input type="text" class="form-control" name="apellido" id="apellido"
                                    placeholder="Primer Apellido" >
                            </div>
                            <div class="form-group">
                                <label for="sapellido">Segundo Apellido</label>
                                <input type="text" class="form-control" name="sapellido" id="sapellido"
                                    placeholder="Segundo Apellido" >
                            </div>
                            <div class="form-group">
                                <label for="domicilio">Domicilio</label>
                                <input type="text" class="form-control" name="domicilio" id="domicilio"
                                    placeholder="Domicilio" >
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" class="form-control" name="telefono" id="telefono"
                                    placeholder="Télefono" >
                            </div>
                            <div class="form-group">
                                <label for="celular">Celular</label>
                                <input type="text" class="form-control" name="celular" id="celular"
                                    placeholder="Celular" >
                            </div>
                            <div class="form-group">
                                <label for="titulo">Profesión</label>
                                <input type="text" class="form-control" name="titulo" id="titulo"
                                    placeholder="Profesión" >
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
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

                            <input type="submit" class="btn btn-dark " value="Guardar">

                        </div>


                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h1>asdad</h1>
        </div>
    </div>
</section>
























@endsection
@section('script')
@endsection