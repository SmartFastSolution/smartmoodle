@extends('layouts.nav')

@section('title', 'Contenido |SmartMoodle')

@section('encabezado')
<h1>Añadir Contenido</h1>
@stop

@section('content')


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
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Formulario Contenidos</h3>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{route('contenidos.index')}} " enctype="multipart/form-data">
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
                                <label>Añadir Materia</label>
                                <select class="form-control select" name="materia" style="width: 99%;">
                                    <option selected disabled>Elija la Materia...</option>
                                    @foreach($materias as $materia)
                                    <option value="{{$materia->id}}">{{$materia->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- subir imagen en laravel prueba 1 -->
                            <div class="form-group">
                                <label for="documentod">Añadir Documento(s)</label>
                                <input type="file" class="form-control-file" name="documentod" id="documentod">
                                {!! $errors->first('documento','<span style="color:red">:message</span>')!!}

                                <div class="descripcion">
                                    Limite de 8MB por Documento
                                </div>
                            </div>

                            <!-- fin de la prueba imagen en laravel  -->

                            <div class="form-group">
                                <label for="nombre">Estado </label>
                                <br>
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
                            </div>
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