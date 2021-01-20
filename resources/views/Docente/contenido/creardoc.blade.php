@extends('layouts.nav')

@section('title', 'Unidades Docente | SmartMoodle')




@section('title', 'Administracion - Docente')

@section('content')


<section class="content">
    <div class="container">


        <h1 class="font-weight-light" style="color:red;"> @isset ( auth()->user()->instituto->nombre)
            {{ auth()->user()->instituto->nombre}}
            @endisset</h1>

        <h2 class="font-weight-light">
            @foreach(auth()->user()->roles as $role)
            {{$role->name}} | {{ auth()->user()->name, }}
            {{ auth()->user()->apellido, }}
            @endforeach</h2>
    </div>
</section>


<section class="content">
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="font-weight-light">Subir Archivo</h1>
                <div class="row">
                    <div class="col-md-10">
                        <form method="POST" action="{{route('documentacion.docentestore')}} " enctype="multipart/form-data">
                            @csrf
                            <div class=" card-body">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre"
                                        value="{{ old('nombre') }}" placeholder="Añadir nombre del contenido">
                                </div>

                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input type="text" class="form-control" name="descripcion" id="descripcion"
                                        value="{{ old('descripcion') }}" placeholder="Añadir una Descripción">
                                </div>

                                <div class="form-group">
                                    <label>Seleccionar Materia</label>
                                    <select class="form-control select2" name="materia" style="width: 99%;">
                                        <option selected disabled>Elija la Materia...</option>
                                        @foreach($materias as $materia)
                                        @foreach($materia->distribucionmacus as $d)
                                        <option value="{{$materia->id}}">
                                            {{$d->curso->nombre}} -{{$materia->nombre}}</option>
                                        @endforeach
                                        @endforeach
                                    </select>
                                </div>
                                                     
                                <!-- subir imagen en laravel prueba 1 -->
                                <div class="form-group">
                                    <label for="archivo">Añadir Documento(s)</label>
                                    <input type="file" class="form-control-file" name="archivo" id="archivo">
                                    {!! $errors->first('documento','<span style="color:red">:message</span>')!!}

                                    <small class="form-text text-muted">
                                    Limite de 50MB por Documento
                                    </small>
                                </div>

                                <a href="{{route('documentacion.docente')}}" class="btn btn-primary">Atras</a>
                                <input type="submit" class="btn btn-dark " value="Guardar">                              
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