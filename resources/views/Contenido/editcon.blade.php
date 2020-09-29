@extends('layouts.nav')

@section('title', 'Edición de Contenido')

@section('encabezado')
    <h1>Editar Contenido</h1>
@stop

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Editar Contenidos</h1>
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
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Formulario Contenidos</h3>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{route('contenidos.update', $contenido->id)}} "
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class=" card-body">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre"
                                    value="{{$contenido->nombre}}" placeholder="Añadir nombre del contenido">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion"
                                    value="{{$contenido->descripcion}}" placeholder="Añadir una Descripción">
                            </div>

                            <div class="form-group">
                                <label>Editar Materia</label>
                                <select class="form-control select" name="materia" style="width: 99%;">
                                    @foreach($materiacontenido as $materiac)
                                    <option selected disabled value="{{ $materiac->id }}">{{ $materiac->nombre }}
                                    </option>
                                    @endforeach
                                    @foreach($materias as $materia)
                                    <option value="{{$materia->id}}">{{$materia->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- subir imagen en laravel prueba 1 -->
                            <div class="form-group">
                                <label for="documentod">
                                    <br>
                                    {{$contenido->documentod}}
                                    <br>
                                    <a target="_blank"
                                        href="{{Storage::url($contenido['documentod'])}}">{{ $contenido['nombre']}}</a>
                                    <br>
                                    <input multiple type="file" name="documentod" value="{{old('documentod')}}">
                                    {!! $errors->first('documento','<span style="color:red">:message</span>')!!}
                                </label>
                            </div>


                            <!-- fin de la prueba imagen en laravel  -->

                            <div class="form-group">
                                <label for="nombre">Estado </label>
                                <br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="estadoon" name="estado" class="custom-control-input"
                                        value="on" @if($contenido['estado']=="on" ) checked @elseif(old('estado')=="on"
                                        ) checked @endif>
                                    <label class="custom-control-label" for="estadoon">Activo</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="estadooff" name="estado" class="custom-control-input"
                                        value="off" @if($contenido['estado']=="off" ) checked
                                        @elseif(old('estado')=="off" ) checked @endif>
                                    <label class="custom-control-label" for="estadooff">No Activo</label>
                                </div>
                                <br><br><br>
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