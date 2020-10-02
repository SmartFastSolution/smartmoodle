@extends('layouts.nav')

@section('title', 'Editar Usuario')

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
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="font-weight-light">Editar Usuario</h1>
                <div class="row">
                    <div class="col-md-10">

                        <form method="POST" action="{{route('users.update', $user->id)}} ">
                            @method('PUT')
                            @csrf

                            <div class=" card-body">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="cedula">Cédula</label>
                                        <input class="form-control" name="cedula" id="cedula" placeholder="Cédula"
                                            value="{{$user->cedula}}" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="name"> Nombres</label>
                                        <input class="form-control" name="name" id="name" placeholder="Primer Nombre"
                                            value="{{$user->name}}" required>
                                    </div>

                                    <div class="col">
                                        <label for="apellido">Apellidos</label>
                                        <input class="form-control" name="apellido" id="apellido"
                                            placeholder="Primer Apellido" value="{{$user->apellido}}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="domicilio">Domicilio</label>
                                    <input class="form-control" name="domicilio" id="domicilio" placeholder="Domicilio"
                                        value="{{$user->domicilio}}" required>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="telefono">Teléfono Fijo</label>
                                        <input class="form-control" name="telefono" id="telefono" placeholder="Télefono"
                                            value="{{$user->telefono}}" required>
                                    </div>
                                    <div class="col">
                                        <label for="celular">Teléfono</label>
                                        <input class="form-control" name="celular" id="celular" placeholder="Celular"
                                            value="{{$user->celular}}" required>
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="form-group">
                                        <label>Instituto</label>
                                        <select class="form-control select" name="instituto" style="width: 99%;">
                                            @foreach($institutouser as $instuser)
                                            <option selected disabled value="{{ $instuser->id }}">
                                                {{ $instuser->nombre }}
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
                                            <option value="{{ $role->id }}" @isset($user->roles[0]->name)
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
                                        <label for="titulo">Profesión</label>
                                        <input class="form-control" name="titulo" id="titulo" placeholder="Profesión"
                                            value="{{$user->titulo}}" required>
                                    </div>

                                </div>
                                <input type="submit" class="btn btn-dark " value="Actualizar">
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
<script>
console.log('Hi!');
</script>
@stop