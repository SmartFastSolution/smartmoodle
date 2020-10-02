@extends('layouts.nav')

@section('title', 'Edicion Curso')

@section('encabezado')
    <h1>Editar Curso</h1>
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
                    <h3 class="card-title">Formulario Curso</h3>
                </div>
                <div class="card-body">


                    <form method="POST" action="{{route('cursos.update', $curso->id)}} ">
                        @method('PUT')
                        @csrf
                        <div class=" card-body">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre"
                                    value="{{$curso->nombre}}" placeholder="Edición del Curso">
                            </div>
                            <div class="form-group">
                                <label for="paralelo">Paralelo</label>
                                <input type="text" class="form-control" name="paralelo" id="paralelo"
                                    value="{{$curso->paralelo}}" placeholder="Edición del Paralelo">
                            </div>

                            <div class="form-group">
                                    <label>Paralelo</label>
                                    <select class="form-control select" name="nivel" style="width: 99%;">
                                        @foreach($nivelcurso as $nivelc)
                                        <option selected disabled value="{{ $nivelc->id }}">{{ $nivelc->nombre }}
                                        </option>
                                        @endforeach
                                        @foreach($nivels as $nivel)
                                        <option value="{{$nivel->id}}">{{$nivel->nombre}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <br>
                                <label>Estado del Curso</label>
                                <br>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="estadoon" name="estado" class="custom-control-input" value="on"
                                    @if($curso['estado']=="on" ) checked @elseif(old('estado')=="on" ) checked @endif>
                                <label class="custom-control-label" for="estadoon">Activo</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="estadooff" name="estado" class="custom-control-input"
                                    value="off" @if($curso['estado']=="off" ) checked @elseif(old('estado')=="off" )
                                    checked @endif>
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
